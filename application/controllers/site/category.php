<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| This controller contains the Landing page related functions
| @author J2V
|
**/

class Category extends MY_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper(array('cookie','date','form','email'));
		$this->load->library(array('encrypt','form_validation','session'));		
		$this->load->model(array('categories_model'));		
		$this->load->model(array('product_model'));		
		$this->data['loginCheck'] = $this->checkLogin('U');
	}
	
	
	public function viewCategory($cat_url,$subcat_url){
		//echo $cat_url.'---'.$subcat_url;die;
		
		$this->data['rootCategories'] = $this->categories_model->get_all_details(CATEGORIES,array('rootID'=>0,'status'=>'Active'));
		$this->data['subCategories'] = $this->categories_model->get_all_details(CATEGORIES,array('rootID !=' => 0,'status'=>'Active'));
		
		$this->data['get_cat_details'] = $this->categories_model->get_all_details(CATEGORIES,array('url_title'=>$cat_url));
		$cat_id = $this->data['get_cat_details']->result();
		$this->data['product_details'] = $this->product_model->getProductDetails($cat_id[0]->id);
		//echo '<pre>'; print_r($this->data['product_details']);die;
		$this->data['heading'] = 'Home';
		$this->load->view('site/category/view_categories',$this->data);
	}
	
	/**
	|
	|Site Index Page
	|	
	**/
}

/* End of file landing.php */
/* Location: ./application/controllers/site/landing.php */