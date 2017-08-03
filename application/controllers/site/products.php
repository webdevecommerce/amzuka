<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| 	This controller contains admin dashboard functions
| 	@author J2V
|
**/

class Products extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('cookie','date','form'));
		$this->load->library(array('encrypt','form_validation'));		
		$this->load->model('product_model');
		$this->load->model('categories_model');
		
	}
    
	/**
	* 
	* This function loads the product list page
	*
	**/
	public function index(){	
				//$product_seo = $this->uri->segment(1);
				$product_seo = 'very-different';
				
				$productArr = $this->product_model->get_all_details(PRODUCT,array('product_seo' => $product_seo));
				redirect(ADMIN_PATH.'/product/display_products');
		
	}
	
	public function productDetail(){
			$product_seo= $this->uri->segment(2);
			$this->data['product'] = $this->product_model->get_all_details(PRODUCT,array('product_seo' => $product_seo));
			//print_r($this->data['product']->row()->quantity);die;
			$this->data['rootCategories'] = $this->product_model->get_all_details(CATEGORIES,array('rootID'=>0,'status'=>'Active'));
			$this->data['subCategories'] = $this->product_model->get_all_details(CATEGORIES,array('rootID !=' => 0,'status'=>'Active'));
		
			$this->data['filterValues'] = $this->product_model->get_product_filter_values($this->data['product']->row()->id);
			//print_r($this->data['filterValues']);die;
			$this->load->model('site_product_model');
			$this->data['sizeArr']  = $this->site_product_model->get_product_avail_size();
			$this->data['colorArr'] = $this->site_product_model->get_product_avail_colors();
			$this->load->view('site/product/product_detail',$this->data);
	}
	
	
	
	public function addProductsToCart(){
			$product_id = $this->input->post('product_id');
			// User Not found save cart details on cookie
			//Check session 
			//unset($_COOKIE['amzuka_carted_products']);
			// empty value and expiration one hour before
			//$res = setcookie('amzuka_carted_products', '', time() - 3600);
			$addedProducts = $this->input->cookie('amzuka_carted_product',TRUE);
			if($addedProducts != ''){
					//If already exists
					$product_count = count(explode(",",$addedProducts)) + 1;
					$addedProducts .= ",".$product_id;
					setcookie("amzuka_carted_product",$addedProducts,time()+31556926,'/amzuka');
			}else{
					$product_count = 1;
					setcookie("amzuka_carted_product",$product_id,time()+31556926,'/amzuka');
			}
			echo $product_count;
	}
	
}
/* End of file products.php */
/* Location: ./application/controllers/products.php */
?>