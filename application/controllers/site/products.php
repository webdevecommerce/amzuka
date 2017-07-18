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
		if ($this->checkPrivileges('product',$this->privStatus) == FALSE){
			redirect(ADMIN_PATH);
		}
	}
    
	/**
	* 
	* This function loads the product list page
	*
	**/
	public function index(){	
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
				//$product_seo = $this->uri->segment(1);
				$product_seo = 'very-different';
				
				$productArr = $this->product_model->get_all_details(PRODUCT,array('product_seo' => $product_seo));
				print_r($productArr->row());die;
				redirect(ADMIN_PATH.'/product/display_products');
		}
	}
	
	
}


/* End of file products.php */
/* Location: ./application/controllers/products.php */
?>