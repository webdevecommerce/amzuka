<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| This controller contains the functions related to sub-admin management
| @author J2V
|
**/

class Subadmin extends MY_Controller {

	function __construct(){
    parent::__construct();
		$this->load->helper(array('cookie','date','form'));
		$this->load->library(array('encrypt','form_validation'));		
		$this->load->model('subadmin_model');
		if ($this->checkPrivileges('subadmin',$this->privStatus) == FALSE){
			redirect(ADMIN_PATH);
		}
  }
    
	/**
	|
	|	This function loads the subadmin users list
	|
	**/
	public function display_sub_admin(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$this->data['heading'] = 'Sub Admin Users List';
			$condition = array();
			$this->data['subadminList'] = $this->subadmin_model->get_all_details(SUBADMIN,$condition);
			$this->load->view(ADMIN_PATH.'/subadmin/display_subadmin',$this->data);
		}
	}
	
	
	/**
	|
	|	This function loads the edit sub-admin form
	|
	**/
	public function add_edit_subadmin_form(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$adminid = $this->uri->segment(4,0);		
			$edit_mode=FALSE;			
			if($adminid!=''){
				$condition = array('id' => $adminid);
				$this->data['admin_details'] = $this->subadmin_model->get_all_details(SUBADMIN,$condition);
				if ($this->data['admin_details']->num_rows() == 1){
					$this->data['privArr'] = unserialize($this->data['admin_details']->row()->privileges);
					if (!is_array($this->data['privArr'])){
						$this->data['privArr'] = array();
					}
					$this->data['heading'] = 'Edit Subadmin';
				}else {
					redirect(ADMIN_PATH);
				}
				$edit_mode=TRUE;
			}else{
				$this->data['heading'] = 'Add Subadmin';
			}
			$this->data['edit_mode']=$edit_mode;
			$this->load->view(ADMIN_PATH.'/subadmin/add_edit_subadmin',$this->data);
		}
	}
	
	/**
	|
	|	This function insert and edit a sub-admin and privileges
	|
	**/
	public function insertEditSubadmin(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			#echo '<pre>'; print_r($_POST); die;
			$subadminid = $this->input->post('subadminid');
			$admin_name = $this->input->post('admin_name');
			$status = $this->input->post('status');
			if($this->input->post('admin_password')!=''){
				$admin_password = md5($this->input->post('admin_password'));
			}
			$email = $this->input->post('email');
			if ($subadminid == ''){
				$condition = array('email' => $email);
				$duplicate_admin= $this->subadmin_model->get_all_details(ADMIN,$condition);
				if ($duplicate_admin->num_rows() > 0){
					$this->setErrorMessage('error','Admin email already exists');
					redirect(ADMIN_PATH.'/subadmin/add_edit_subadmin_form/'.$subadminid);
				}else {
					$duplicate_email = $this->subadmin_model->get_all_details(SUBADMIN,$condition);
					if ($duplicate_email->num_rows() > 0){
						$this->setErrorMessage('error','Sub Admin email already exists');
						redirect(ADMIN_PATH.'/subadmin/add_edit_subadmin_form/'.$subadminid);
					}else {
						$condition = array('admin_name' => $admin_name);
						$duplicate_adminname = $this->subadmin_model->get_all_details(ADMIN,$condition);
						if ($duplicate_adminname->num_rows() > 0){
							$this->setErrorMessage('error','Admin name already exists');
							redirect(ADMIN_PATH.'/subadmin/add_edit_subadmin_form/'.$subadminid);
						}else {
							$duplicate_name = $this->subadmin_model->get_all_details(SUBADMIN,$condition);
							if ($duplicate_name->num_rows() > 0){
								$this->setErrorMessage('error','Sub Admin name already exists');
								redirect(ADMIN_PATH.'/subadmin/add_edit_subadmin_form/'.$subadminid);
							}
						}
					}
				}
			}				
			$excludeArr = array("email","subadminid","admin_name","admin_password","confirm_password","status","profile_image");
			$privArr = array();
			foreach ($this->input->post() as $key => $val){
				if (!in_array($key, $excludeArr)){
					$privArr[$key] = $val;
				}
			}
			$inputArr = array('privileges' => serialize($privArr));
			$datestring = "%Y-%m-%d %H:%i:%s";
			$time = time();
			
			if(isset($status) && $status=='on'){
				$newstatus='Active';
			}else{
				$newstatus='Inactive';
			}
			
			$admindata = array(
					'admin_name'	=>	$admin_name,
					'email'	=>	$email,
					'modified'	=>	mdate($datestring,$time),
					'admin_type'	=>	'sub',
					'is_verified'	=>	'Yes',
					'status'	=>	$newstatus
				);
			if($admin_password!=''){
				$admindata['admin_password']= $admin_password;
			}
			if ($subadminid == ''){
				$admindata['created']= mdate($datestring,$time);
			}
			$dataArr = array_merge($admindata,$inputArr);
			
			if($_FILES['profile_image']['size']>0){
				#$config['encrypt_name'] = TRUE;
				$config['overwrite'] = FALSE;
				$config['allowed_types'] = 'jpg|jpeg|gif|png';
				$config['max_size'] = 2000;
				$config['upload_path'] = './images/profile';
				$this->load->library('upload', $config);
				if ( $this->upload->do_upload('profile_image')){
					$profileDetails = $this->upload->data();
					$dataArr['admin_image'] = $profileDetails['file_name'];
				}else{
					$profileDetails = $this->upload->display_errors();
					$this->setErrorMessage('error',strip_tags($profileDetails));
					redirect(ADMIN_PATH.'/subadmin/add_edit_subadmin_form/'.$subadminid);
				}
			}
			
			$condition = array('id' => $subadminid);
			$this->subadmin_model->add_edit_subadmin($dataArr,$condition);
			if ($subadminid == ''){
				$this->setErrorMessage('success','Subadmin added successfully');
			}else {
				$this->setErrorMessage('success','Subadmin updated successfully');
			}
			redirect(ADMIN_PATH.'/subadmin/display_sub_admin');
		}
	}
	
	/**
	|
	|	This function loads the sub-admin view page
	|
	**/
	public function view_subadmin(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$this->data['heading'] = 'View Subadmin';
			$adminid = $this->uri->segment(4,0);
			$condition = array('id' => $adminid);
			$this->data['admin_details'] = $this->subadmin_model->get_all_details(SUBADMIN,$condition);
			if ($this->data['admin_details']->num_rows() == 1){
				$this->data['privArr'] = unserialize($this->data['admin_details']->row()->privileges);
				if (!is_array($this->data['privArr'])){
					$this->data['privArr'] = array();
				}
				$this->load->view(ADMIN_PATH.'/subadmin/view_subadmin',$this->data);
			}else {
				redirect(ADMIN_PATH);
			}
		}
	}
	
	/**
	|
	|	This function change the subadmin user status
	|
	**/
	public function change_subadmin_status(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$mode = $this->uri->segment(4,0);
			$adminid = $this->uri->segment(5,0);
			$status = ($mode == '0')?'Inactive':'Active';
			$newdata = array('status' => $status);
			$condition = array('id' => $adminid);
			$this->subadmin_model->update_details(SUBADMIN,$newdata,$condition);
			$this->setErrorMessage('success','Sub Admin Status Changed Successfully');
			redirect(ADMIN_PATH.'/subadmin/display_sub_admin');
		}
	}
	
	/**
	|
	|This function delete the sub-admin record from db
	|
	**/
	public function delete_subadmin(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$subadmin_id = $this->uri->segment(4,0);
			$condition = array('id' => $subadmin_id);
			$this->subadmin_model->commonDelete(SUBADMIN,$condition);
			$this->setErrorMessage('success','Subadmin deleted successfully');
			redirect(ADMIN_PATH.'/subadmin/display_sub_admin');
		}
	}
}

/* End of file subadmin.php */
/* Location: ./application/controllers/admin/subadmin.php */