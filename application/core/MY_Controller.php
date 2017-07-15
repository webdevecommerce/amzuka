<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

error_reporting(-1);


/**
| 
| This controller contains the common functions
| @author J2V
|
**/


date_default_timezone_set('Asia/Kolkata');


class MY_Controller extends CI_Controller {
	public $data = array();
	public $privStatus=0;
	function __construct(){ 
    parent::__construct(); 
		ob_start();
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		$this->load->helper( array('url', 'text', 'cookie'));
		$this->load->library(array('pagination', 'session','curl'));
		
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		/**
		| Connecting Model
		**/
		$this->load->model(array('landing_model'));
		
		/**
		| 	Connecting Database|
		**/
		$this->load->database();
		
		
		$this->data['datestring'] = "Y-m-d H:i:s";
		
		/********	Site Informations Begins	********/
		$this->data['title'] = $this->config->item('meta_title');;
		$this->data['heading'] = '';
		$this->data['flash_data'] = $this->session->flashdata('sErrMSG');
		$this->data['flash_data_type'] = $this->session->flashdata('sErrMSGType');
		$this->data['adminPrevArr'] = $this->config->item('adminPrev');
		$this->data['adminEmail'] = $this->config->item('email');	
		$this->data['privileges'] = $this->session->userdata(APPNAMES.'_session_admin_privileges');
		$this->data['subAdminMail'] = $this->session->userdata(APPNAMES.'_session_admin_email');	
		$this->data['adminType'] = $this->session->userdata(APPNAMES.'_session_admin_mode');	
		$this->data['LoggedAdmin'] = $this->session->userdata(APPNAMES.'_session_admin_name');	
		$this->data['LoggedAdminImage'] = $this->session->userdata(APPNAMES.'_session_admin_image');	
		$this->data['loginID'] = $this->session->userdata(APPNAMES.'_session_user_id');	
		$this->data['allPrev'] = '0';
		$this->data['logo'] = $this->config->item('logo_image');
		$this->data['favicon'] = $this->config->item('favicon_image');
		$this->data['copyright_content'] = $this->config->item('copyright_content');
		$this->data['siteContactMail'] = $this->config->item('site_contact_mail');
		$this->data['siteContactNumber'] = $this->config->item('site_contact_number');
		$this->data['WebsiteTitle'] = $this->config->item('site_title');
		$this->data['siteTitle'] = $this->config->item('site_title');
		$this->data['meta_title'] = $this->config->item('meta_title');
		$this->data['meta_keyword'] = $this->config->item('meta_keyword');
		$this->data['meta_description'] = $this->config->item('meta_description');
		
		if ($this->session->userdata(APPNAMES.'_session_admin_name') == $this->config->item('admin_name')){
			$this->data['allPrev'] = '1';
		}
		
  }
	
	/**
	| 
	| 	This function set the error message and type in session
	| 	@param String $type
	| 	@param String $msg
	|
	**/
  public function setErrorMessage($type='',$msg=''){
		($type == 'success') ? $msgVal = 'message-green' : $msgVal = 'message-red';
		$this->session->set_flashdata('sErrMSGType', $msgVal);
		$this->session->set_flashdata('sErrMSG', $msg);
	}
	
	/**
	|
  | 	This function return the session value based on param
  | 	@param String $type
	|
  **/
	public function checkLogin($type=''){
		if ($type == 'A'){
			return $this->session->userdata(APPNAMES.'_session_admin_id');
		}else if ($type == 'P'){
			return $this->session->userdata(APPNAMES.'_session_admin_privileges');
		}else if ($type == 'U'){
			return $this->session->userdata(APPNAMES.'_session_user_id');
		}else if ($type == 'T'){
			return $this->session->userdata(APPNAMES.'_session_temp_id');
		}
  }

	/**
	|
	| 	This function return the random string
	| 	@param Integer $length
	|
	**/
	public function get_rand_str($length = 6) {
		return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	}
	
	/**
	|
  | 	This function check the admin privileges
  | 	@param String $name
  | 	@param Integer $right	->	0 for view, 1 for add, 2 for edit, 3 delete
	|
  **/
	public function checkPrivileges($name='',$right=''){
		$prev = '0';
		$privileges = $this->session->userdata(APPNAMES.'_session_admin_privileges');
		extract($privileges);
		$userName =  $this->session->userdata(APPNAMES.'_session_admin_name');
		$adminName = $this->config->item('admin_name');
		if (isset(${$name}) && is_array(${$name}) && in_array($right, ${$name})){
			$prev = '1';
		}
		if ($userName == $adminName){
			$prev = '1';
		}
		if ($prev == '1'){
			return TRUE;
		}else {
			return FALSE;
		}
	}
   	
}