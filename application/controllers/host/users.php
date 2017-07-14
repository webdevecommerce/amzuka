<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| 	This controller contains admin Users functions
| 	@author J2V
|
**/

class Users extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('cookie','date','form'));
		$this->load->library(array('encrypt','form_validation'));		
		$this->load->model('users_model');
		if ($this->checkPrivileges('users',$this->privStatus) == FALSE){
			redirect(ADMIN_PATH);
		}
	}
    
	/**
	* 
	* This function loads the users list page
	*
	**/
	public function index(){	
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			redirect(ADMIN_PATH.'/users/display_users');
		}
	}
	
	/**
	|
	|Loading the Users List
	|	
	**/
	public function display_users(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$this->data['heading'] = 'User List';
			$condition = array();
			$this->data['usersList'] = $this->users_model->get_all_details(USERS,$condition);
			$this->load->view(ADMIN_PATH.'/users/display_users',$this->data);
		}
	}
	
	/**
	|
	|	This function change the users status
	|	
	**/
	public function change_user_status(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$mode = $this->uri->segment(4,0);
			$user_id = $this->uri->segment(5,0);
			$status = ($mode == '0')?'Inactive':'Active';
			$newdata = array('status' => $status);
			$condition = array('id' => $user_id);
			$this->users_model->update_details(USERS,$newdata,$condition);
			$this->setErrorMessage('success','User Status Changed Successfully');
			redirect(ADMIN_PATH.'/users/display_users');
		}
	}
	
	/**
	|
	|	This function loads the users view page
	|	
	**/
	public function view_user(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$this->data['heading'] = 'View User';
			$user_id = $this->uri->segment(4,0);
			$condition = array('id' => $user_id);
			$this->data['users_details'] = $this->users_model->get_all_details(USERS,$condition);			
			if ($this->data['users_details']->num_rows() == 1){
				$this->load->view(ADMIN_PATH.'/users/view_user',$this->data);
			}else {
				redirect(ADMIN_PATH);
			}
		}
	}
	
	/**
	|
	|	This function loads the users view page
	|	
	**/
	public function delete_user(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$user_id = $this->uri->segment(4,0);
			$condition = array('id' => $user_id);
			$this->users_model->commonDelete(USERS,$condition);
			$this->setErrorMessage('success','User deleted successfully');
			redirect(ADMIN_PATH.'/users/display_users');
		}
	}
	
	/**
	| 
	| This function loads the add/edit Users form
	|
	**/
	public function add_edit_user_form(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$user_id = $this->uri->segment(4,0);
			$edit_mode=FALSE;
			if($user_id!=''){
				$condition = array('id' => $user_id);
				$this->data['users_details'] = $this->users_model->get_all_details(USERS,$condition);
				if ($this->data['users_details']->num_rows() <=0){
					$this->setErrorMessage('error','User records not found');
					redirect(ADMIN_PATH.'/users/display_users');
				}
				$edit_mode=TRUE;
				$this->data['heading'] = 'Edit Users';
			}else{
				$this->data['heading'] = 'Add New Users';
			}
			$this->data['edit_mode']=$edit_mode;
			$this->load->view(ADMIN_PATH.'/users/add_edit_users',$this->data);
		}
	}
	
	/**
	| 
	| This function insert and edit a Users
	|
	**/
	public function insertEdituser(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$user_id = $this->input->post('user_id');
			$status = $this->input->post('status');
			$email = strtolower($this->input->post('email'));
			$full_name = $this->input->post('full_name');
			$password = $this->input->post('password');
			$phone = $this->input->post('phone');
			
			if(isset($status) && $status=='on'){
				$newstatus='Active';
			}else{
				$newstatus='Inactive';
			}
						
			if($user_id==''){
				$duplicate_email = $this->users_model->get_all_details(USERS,array('email'=>$email));
			}else{
				$duplicate_email = $this->users_model->get_all_details(USERS,array('id !='=>$user_id,'email'=>$email));
			}
			
			if ($duplicate_email->num_rows()>0){
				$this->setErrorMessage('error','This Email address already registered');
				redirect(ADMIN_PATH.'/users/display_users');
			}
			$excludeArr = array('password','status','phone','user_id');
			$dataArr = array('full_name'=>$full_name,
											'email' => $email ,
											'dail_code' => '+91',
											'phone_no' => $phone
											);
			if ($user_id == ''){
				$dataArr['status']='Active';
				$dataArr['password']=md5($password);
				$dataArr['created']=date("Y-m-d H:i:s");
				$this->users_model->commonInsertUpdate(USERS,'insert',$excludeArr,$dataArr,$condition);
				$this->setErrorMessage('success','User added successfully');
			}else {
				$condition = array('id' => $user_id);
				$this->users_model->commonInsertUpdate(USERS,'update',$excludeArr,$dataArr,$condition);
				$this->setErrorMessage('success','User updated successfully');
			}
			redirect(ADMIN_PATH.'/users/display_users');
		}
	}
	
	
	/**
	| 
	| This function loads the Change Users Password form
	|
	**/
	public function change_user_password_form(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$user_id = $this->uri->segment(4,0);
			if($user_id!=''){
				$condition = array('id' => $user_id);
				$this->data['users_details'] = $this->users_model->get_all_details(USERS,$condition);
				if ($this->data['users_details']->num_rows() <=0){
					$this->setErrorMessage('error','User records not found');
					redirect(ADMIN_PATH.'/users/display_users');
				}
			}else{
				$this->setErrorMessage('error','User records not found');
				redirect(ADMIN_PATH.'/users/display_users');
			}
			$this->data['heading'] = 'Change Users password';
			$this->load->view(ADMIN_PATH.'/users/change_password',$this->data);
		}
	}
	
	/**
	| 
	| This function updates the user password
	|
	**/
	public function change_password(){
		if($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$user_id = $this->input->post('user_id');
			$password = $this->input->post('password');
			$confirm_password = $this->input->post('confirm_password');
			if($password!==$confirm_password){
				$this->setErrorMessage('error','Entered Password Doesn\'t matched');
				redirect(ADMIN_PATH.'/users/change_user_password_form/'.$user_id);
			}
			$passwordArr = array('password'=>md5($password));
			$condition = array('id'=>$user_id);
			if ($user_id != ''){
				$this->users_model->update_details(USERS,$passwordArr,$condition);
				$this->setErrorMessage('success','Password changed successfully');
			}
			redirect(ADMIN_PATH.'/users/add_edit_user_form/'.$user_id);
		}
	}
}

/* End of file users.php */
/* Location: ./application/controllers/admin/users.php */