<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| This controller contains the cms page related functions
| @author J2V
|
**/

class Cms extends MY_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model(array('cms_model'));		
		$this->data['loginCheck'] = $this->checkLogin('U');
	}
	/**
	|
	|Loading the cms pages
	|	
	**/
	public function load_pages(){
		$page_url = $this->uri->segment(2,0);
		$this->data['pageInfo'] = $this->cms_model->get_all_details(CMS,array('seourl'=>$page_url));
		if($this->data['pageInfo']->num_rows()>0){
			if($this->data['pageInfo']->row()->status=='Publish'){
				$this->data['heading'] = $this->data['pageInfo']->row()->page_title;
				$this->data['meta_title'] = $this->data['pageInfo']->row()->meta_title;
				$this->data['meta_keyword'] = $this->data['pageInfo']->row()->meta_keyword;
				$this->data['meta_description'] = $this->data['pageInfo']->row()->meta_description;
				$this->load->view('site/cms/cms',$this->data);
			}else{
				show_404();
			}
		}else{
			show_404();
		}
	}
}

/* End of file cms.php */
/* Location: ./application/controllers/site/cms.php */