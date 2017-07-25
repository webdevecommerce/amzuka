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
		$this->load->model(array('categories_model'));		
		$this->data['loginCheck'] = $this->checkLogin('U');
		$this->data['rootCategories'] = $this->landing_model->get_all_details(CATEGORIES,array('rootID'=>0,'status'=>'Active'));
		$this->data['subCategories'] = $this->landing_model->get_all_details(CATEGORIES,array('rootID !=' => 0,'status'=>'Active'));
	}
	
	public function index(){
		$category = $this->uri->segment(1);
		$sub_category = $this->uri->segment(2);
		if($category != '' && $sub_category != '' && $category != 'product_detail'){
				$this->data['rootCategory'] = $this->categories_model->get_all_details(CATEGORIES,array('rootID'=>0,'status'=>'Active','url_title' => $this->uri->segment(1)));
				//echo $this->data['rootCategories']->num_rows();die;
				if($this->data['rootCategory']->num_rows() > 0){
						$this->data['subCategory'] = $this->categories_model->get_all_details(CATEGORIES,array('rootID !=' => 0,'status'=>'Active','url_title' => $this->uri->segment(2)));
						if($this->data['subCategory']->num_rows() > 0){
								$this->data['product_details'] = $this->categories_model->get_all_details(PRODUCTS,array('category_id' => $this->data['rootCategory']->row()->id, 'sub_category_id' => $this->data['subCategory']->row()->id));
								if($this->data['product_details']->num_rows() > 0){
									
									$this->data['heading'] = $this->data['subCategory']->row()->name;
									$this->load->view('site/category/view_categories',$this->data);
									
								}else{
									echo 'product not found';
								}
						}else{
							echo 'product not found';
						}
				}else{
					echo 'product not found';
				}
		}
	}
	
	
	public function viewCategory($cat_url,$subcat_url){
		
	}
	
	/**
	|
	|Site Index Page
	|	
	**/
}

/* End of file landing.php */
/* Location: ./application/controllers/site/landing.php */