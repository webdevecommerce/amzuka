<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| 	This controller contains admin dashboard functions
| 	@author J2V
|
**/

class Provider extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('cookie','date','form'));
		$this->load->library(array('encrypt','form_validation'));		
		$this->load->model('provider_model');
		if ($this->checkPrivileges('provider',$this->privStatus) == FALSE){
			redirect(ADMIN_PATH);
		}
	}
    
	/**
	* 
	* This function loads the provider list page
	*
	**/
	public function index(){	
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			redirect(ADMIN_PATH.'/provider/display_provider');
		}
	}
	
	/**
	|
	|Loading the Providers List
	|	
	**/
	public function display_provider(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$this->data['heading'] = 'Provider List';
			$condition = array();
			$this->data['providerList'] = $this->provider_model->get_all_details(PROVIDERS,$condition);
			$this->load->view(ADMIN_PATH.'/provider/display_provider',$this->data);
		}
	}
	
	/**
	|
	|	This function change the provider status
	|	
	**/
	public function change_provider_status(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$mode = $this->uri->segment(4,0);
			$provider_id = $this->uri->segment(5,0);
			$status = ($mode == '0')?'Inactive':'Active';
			$newdata = array('status' => $status);
			$condition = array('id' => $provider_id);
			$this->provider_model->update_details(PROVIDERS,$newdata,$condition);
			$this->setErrorMessage('success','Provider Status Changed Successfully');
			redirect(ADMIN_PATH.'/provider/display_provider');
		}
	}
	
	/**
	|
	|	This function loads the provider view page
	|	
	**/
	public function view_provider(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$this->data['heading'] = 'View Provider';
			$provider_id = $this->uri->segment(4,0);
			$condition = array('id' => $provider_id);
			$this->data['provider_details'] = $this->provider_model->get_all_details(PROVIDERS,$condition);			
			if ($this->data['provider_details']->num_rows() == 1){
				$this->load->view(ADMIN_PATH.'/provider/view_provider',$this->data);
			}else {
				redirect(ADMIN_PATH);
			}
		}
	}
	
	/**
	|
	|	This function loads the provider view page
	|	
	**/
	public function delete_provider(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$provider_id = $this->uri->segment(4,0);
			$condition = array('id' => $provider_id);
			$this->provider_model->commonDelete(PROVIDERS,$condition);
			$this->setErrorMessage('success','Provider deleted successfully');
			redirect(ADMIN_PATH.'/provider/display_provider');
		}
	}
	
	/**
	| 
	| This function get the Category
	|
	**/
	public function get_category(){
		$returnArr['status']='0';
		$returnArr['response']='';
		$category_id = $this->input->post('category_id');
		$parentPos = $this->input->post('parentPos');
		$condition = array('rootID' => $category_id);
		$categoryList = $this->provider_model->get_all_details(CATEGORY,$condition);
		if($categoryList->num_rows()>0){
			$message ='<select id="parent-'.$parentPos.'" name="category_id[]" class="cat-ddl form-control" onchange="getCategoryPrd('.$parentPos.')">';
			$message .='<option value="">Select Category</option>';
			$catArr = array();
			foreach($categoryList->result() as $row){
				$message .='<option value="'.$row->id.'">'.$row->name.'</option>';
			}
			$message .='</select>';
			$returnArr['response']=$message;
			$returnArr['status']='1';
		}
		echo json_encode($returnArr);			
	}
	
}

/* End of file provider.php */
/* Location: ./application/controllers/admin/provider.php */