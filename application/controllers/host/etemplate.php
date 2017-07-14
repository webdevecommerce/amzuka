<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| This controller contains the functions related to email template management
| @author J2V
|
**/

class Etemplate extends MY_Controller {

	function __construct(){
    parent::__construct();
		$this->load->helper(array('cookie','date','form'));
		$this->load->library(array('encrypt','form_validation'));		
		$this->load->model('etemplate_model');
		if ($this->checkPrivileges('etemplate',$this->privStatus) == FALSE){
			redirect(ADMIN_PATH);
		}
  }
	
  /**
	| 
	| This function loads the templates list page
	|
	**/
	public function index(){	
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			redirect(ADMIN_PATH.'/etemplate/display_template');
		}
	}
	
	
	/**
	| 
	| This function loads the templates list page
	|
	**/
	public function display_template(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$this->data['heading'] = 'Email Template List';
			$condition = array();
			$this->data['templateList'] = $this->etemplate_model->get_all_details(E_TEMPLATE,$condition);
			$this->load->view(ADMIN_PATH.'/etemplate/display_template',$this->data);
		}
	}
	
	/**
	| 
	| This function loads the add/edit E-mail template form
	|
	**/
	public function add_edit_template_form(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$template_id = $this->uri->segment(4,0);
			$edit_mode=FALSE;
			if($template_id!=''){
				$condition = array('id' => $template_id);
				$this->data['template_details'] = $this->etemplate_model->get_all_details(E_TEMPLATE,$condition);
				if ($this->data['template_details']->num_rows() <=0){
					$this->setErrorMessage('error','Template records not found');
					redirect(ADMIN_PATH.'/etemplate/display_template');
				}
				$edit_mode=TRUE;
				$this->data['heading'] = 'Edit E-mail Template';
			}else{
				$this->data['heading'] = 'Add New E-mail Template';
			}
			$this->data['edit_mode']=$edit_mode;
			$this->load->view(ADMIN_PATH.'/etemplate/add_edit_template',$this->data);
		}
	}
	
	/**
	| 
	|	This function insert and edit a templates
	|
	**/
	public function insertEditTemplate(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			#echo '<pre>'; print_r($_POST); die;
			$etemplate_id = $this->input->post('etemplate_id');
			$excludeArr = array("etemplate_id","status","email_description");
			$status = $this->input->post('status');
			$dataArr = array();
			if(isset($status) && $status=='on'){
				$dataArr['status']='Active';
			}else{
				$dataArr['status']='Inactive';
			}			
			if ($etemplate_id == ''){
				$dataArr['dateAdded'] = date("Y-m-d H:i:s");
			}
				
			$email_description=str_replace("'base_url()'",base_url(),$this->input->post('email_description'));
			
			/* $email_content_new = str_replace("'.","{",$email_description);
			$description = str_replace(".'","}",$email_content_new); */
			$dataArr['description'] =$email_description;	
			
			if ($etemplate_id == ''){
				$condition = array();			
				$this->etemplate_model->commonInsertUpdate(E_TEMPLATE,'insert',$excludeArr,$dataArr,$condition);
				$etemplate_id=$this->etemplate_model->get_last_insert_id();
				$email_content=$this->etemplate_model->get_all_details(E_TEMPLATE,array('id'=>$etemplate_id));
				$email_content_new = str_replace("{","'.",addslashes($email_content->row()->description));
				$description = str_replace("}",".'",$email_content_new);
				$config = "<?php \$message .= '";
				$config .= "$description";
				$config .= "';  ?>";
				$file = 'email/template'.$etemplate_id.'.php';
				file_put_contents($file, $config);
				$this->setErrorMessage('success','Email template added successfully');
			}else {
				$condition = array('id' => $etemplate_id);
				$this->etemplate_model->commonInsertUpdate(E_TEMPLATE,'update',$excludeArr,$dataArr,$condition);
				$email_content=$this->etemplate_model->get_all_details(E_TEMPLATE,array('id'=>$etemplate_id));
				$email_content_new = str_replace("{","'.",addslashes($email_content->row()->description));
				$description = str_replace("}",".'",$email_content_new);
				$config = "<?php \$message .= '";
				$config .= "$description";
				$config .= "';  ?>";
				$file = 'email/template'.$etemplate_id.'.php';
				file_put_contents($file, $config);
				$this->setErrorMessage('success','Email template updated successfully');
			}
			redirect(ADMIN_PATH.'/etemplate/display_template');
		}
	}
	
	/**
	| 
	|	This function loads the template view page
	|
	**/
	public function view_template(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$this->data['heading'] = 'View Email Template';
			$etemplate_id = $this->uri->segment(4,0);
			$condition = array('id' => $etemplate_id);
			$this->data['template_details'] = $this->etemplate_model->get_all_details(E_TEMPLATE,$condition);
			if ($this->data['template_details']->num_rows() == 1){
				$this->load->view(ADMIN_PATH.'/etemplate/view_template',$this->data);
			}else {
				redirect(ADMIN_PATH);
			}
		}
	}
	
	
	/**
	| 
	| This function change the E-mail template status
	|
	**/
	public function change_etemplate_status(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$mode = $this->uri->segment(4,0);
			$etemplate_id = $this->uri->segment(5,0);
			$status = ($mode == '0')?'Inactive':'Active';
			$newdata = array('status' => $status);
			$condition = array('id' => $etemplate_id);
			$this->etemplate_model->update_details(E_TEMPLATE,$newdata,$condition);
			$this->setErrorMessage('success','E-mail template Status Changed Successfully');
			redirect(ADMIN_PATH.'/etemplate/display_template');
		}
	}
	
	/**
	| 
	|	This function delete the template record from db
	|
	**/
	public function delete_template(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$etemplate_id = $this->uri->segment(4,0);
			$condition = array('id' => $etemplate_id);
			$this->etemplate_model->commonDelete(E_TEMPLATE,$condition);
			$this->setErrorMessage('success','Email template deleted successfully');
			redirect(ADMIN_PATH.'/etemplate/display_template');
		}
	}

}

/* End of file etemplate.php */
/* Location: ./application/controllers/admin/etemplate.php */