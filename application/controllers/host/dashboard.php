<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| 	This controller contains admin dashboard functions
| 	@author J2V
|
**/

class Dashboard extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('cookie','date','form'));
		$this->load->library(array('encrypt','form_validation'));		
		$this->load->model('dashboard_model');
		$this->load->model('admin_model');
  }
  public function index(){	
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			redirect(ADMIN_PATH.'/dashboard/admin_dashboard');
		}
	}
	
	public function admin_dashboard(){		
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {			
			$this->data['heading'] = 'Dashboard';
			$this->load->view(ADMIN_PATH.'/templates/dashboard',$this->data);
		}	
	}
}