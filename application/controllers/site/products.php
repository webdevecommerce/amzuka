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
				print_r($productArr->row());die;
				redirect(ADMIN_PATH.'/product/display_products');
		
	}
	
	public function productDetail(){
			$id= $this->uri->segment(2);
			$this->data['productArr'] = $this->product_model->get_all_details(PRODUCT,array('id' => $id));
			$this->data['rootCategories'] = $this->product_model->get_all_details(CATEGORIES,array('rootID'=>0,'status'=>'Active'));
			$this->data['subCategories'] = $this->product_model->get_all_details(CATEGORIES,array('rootID !=' => 0,'status'=>'Active'));
			//echo '<pre>'; print_r($this->data['productArr']->result());die;
			$this->load->view('site/product/product_detail',$this->data);
		
	}
	
}


/* End of file products.php */
/* Location: ./application/controllers/products.php */
?>