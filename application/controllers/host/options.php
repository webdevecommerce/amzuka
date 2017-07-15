<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| This controller contains the functions related to Options management
| @author J2V
|
**/

class Options extends MY_Controller {

	function __construct(){
    parent::__construct();
		$this->load->helper(array('cookie','date','form'));
		$this->load->library(array('encrypt','form_validation'));		
		$this->load->model('options_model');
		
		if ($this->checkPrivileges('options',$this->privStatus) == FALSE){
			redirect(ADMIN_PATH);
		}
  }
	
	/**
	| 
	| This function loads the Coupon list page
	|
	**/
  public function index(){	
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			redirect(ADMIN_PATH.'/coupon/display_options');
		}
	}
	
	/**
	| 
	| This function loads the Coupon list page
	|
	**/
	public function display_options(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$this->data['heading'] = 'Options Lists';
			$condition = array();
			$this->data['optionList'] = $this->options_model->get_all_details(OPTIONS,$condition);
			$this->load->view(ADMIN_PATH.'/options/display_options',$this->data);
		}
	}
	
	/**
	| 
	| This function loads the add/edit Options form
	|
	**/
	public function add_edit_options_form(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$option_id = $this->uri->segment(4,0);
			$edit_mode=FALSE;
			if($option_id!=''){
				$this->data['option_details'] = $this->plans_model->get_all_details(PLANS,$condition);
				if ($this->data['option_details']->num_rows() <=0){
					redirect(ADMIN_PATH);
				}				
				$edit_mode=TRUE;
				$this->data['heading'] = 'Edit Options';
			}else{
				$this->data['heading'] = 'Add New Options';
			}
			$this->data['edit_mode']=$edit_mode;
			$this->load->view(ADMIN_PATH.'/options/add_edit_options',$this->data);
		}
	}
	
	/**
	| 
	| This function insert and edit a Options
	|
	**/
	public function insertEditOptions(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			echo "<pre>"; print_r($_POST); die;
		}
	}
	
	/**
	| 
	| This function loads the view Coupon
	|
	**/
	public function view_options(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$option_id = $this->uri->segment(4,0);
			$condition = array('id' => $option_id);
			$this->data['option_details'] = $this->options_model->get_all_details(OPTIONS,$condition);
			if($this->data['option_details']->num_rows()<=0){
				redirect(ADMIN_PATH);
			}
			
			$this->data['heading'] = 'View Options';
			$this->load->view(ADMIN_PATH.'/options/view_options',$this->data);
		}
	}
	
	/**
	| 
	| This function change the Option status
	|
	**/
	public function change_options_status(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else{
			$mode = $this->uri->segment(4,0);
			$option_id = $this->uri->segment(5,0);
			$status = ($mode == '0')?'Inactive':'Active';
			$newdata = array('status' => $status);
			$condition = array('id' => $option_id);
			$this->options_model->update_details(OPTIONS,$newdata,$condition);
			$this->setErrorMessage('success','Option Status Changed Successfully');
			redirect(ADMIN_PATH.'/options/display_options');
		}
	}
	
	/**
	| 
	| This function delete the Option from db
	|
	**/
	public function delete_option(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$option_id = $this->uri->segment(4,0);
			$condition = array('id' => $option_id);
			$this->options_model->commonDelete(OPTIONS,$condition);
			$this->setErrorMessage('success','Option deleted successfully');
			redirect(ADMIN_PATH.'/options/display_options');
		}
	}
	
}

/* End of file options.php */
/* Location: ./application/controllers/admin/options.php */