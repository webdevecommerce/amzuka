<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| This controller contains the Landing page related functions
| @author J2V
|
**/

class Landing extends MY_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model(array('landing_model'));		
		$this->data['loginCheck'] = $this->checkLogin('U');
	}
	/**
	|
	|Site Index Page
	|	
	**/
	public function index(){
		
		$this->data['sliders'] = $this->landing_model->get_all_details(SLIDER,array('status'=>'Publish'));
		$this->data['heading'] = 'Home';
		
		echo "In Progress"; die;
		
		$this->load->view('site/landing/landing',$this->data);
	}
}

/* End of file landing.php */
/* Location: ./application/controllers/site/landing.php */