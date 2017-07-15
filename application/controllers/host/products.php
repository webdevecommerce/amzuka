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
			redirect(ADMIN_PATH.'/product/display_products');
		}
	}
	
	/**
	* 
	* This function loads the product list page
	*
	**/
	public function display_products(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$this->data['heading'] = 'Product List';
			$condition = array();
			$this->data['productList'] = $this->product_model->get_all_details(PRODUCT,$condition);
			$this->load->view(ADMIN_PATH.'/products/display_products',$this->data);
		}
	}
	
	/**
	* 
	* This function loads the add new product form
	*
	**/
	public function add_edit_product_form(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {		
			$this->load->view(ADMIN_PATH.'/products/add_edit_products',$this->data);
		}
	}
	
	/**
	* 
	* This function insert and edit product
	*
	**/
	public function insertEditProduct(){
		echo "<pre>";print_r($_POST);
	}
	
	/**
	* 
	* This function change the affiliate product status
	*/
	public function change_user_product_status(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$mode = $this->uri->segment(4,0);
			$product_id = $this->uri->segment(5,0);
			$status = ($mode == '0')?'UnPublish':'Publish';
			$newdata = array('status' => $status);
			$condition = array('seller_product_id' => $product_id);
			$this->product_model->update_details(USER_PRODUCTS,$newdata,$condition);
			$this->setErrorMessage('success','Product Status Changed Successfully');
			redirect(ADMIN_PATH.'/product/display_user_product_list');
		}
	}
	
	/**
	 * 
	 * This function loads the product view page
	 */
	public function view_product(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$this->data['heading'] = 'View Product';
			$product_id = $this->uri->segment(4,0);
			$condition = array('id' => $product_id);
			$this->data['product_details'] = $this->product_model->get_all_details(PRODUCT,$condition);
			$this->data['shiptoDetail'] = $this->product_model->get_all_details(SUB_SHIPPING,array('product_id' => $product_id))->result();
			
			if ($this->data['product_details']->num_rows() == 1){
				$this->data['catList'] = $this->product_model->get_cat_list($this->data['product_details']->row()->category_id);
				$this->load->view(ADMIN_PATH.'/products/view_product',$this->data);
			}else {
				redirect(ADMIN_PATH);
			}
		}
	}
	
	/**
	 * 
	 * This function delete the selling product record from db
	 */
	public function delete_product(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$product_id = $this->uri->segment(4,0);
			$condition = array('id' => $product_id);
			$old_product_details = $this->product_model->get_all_details(PRODUCT,array('id'=>$product_id));
			$this->update_old_list_values($product_id,array(),$old_product_details);
			$this->update_user_product_count($old_product_details);
			$this->product_model->commonDelete(PRODUCT,$condition);
			$this->product_model->commonDelete(SUBPRODUCT,array('product_id' => $product_id));
			$this->setErrorMessage('success','Product deleted successfully');
			redirect(ADMIN_PATH.'/products/display_products');
		}
	}
	
}

/* End of file products.php */
/* Location: ./application/controllers/admin/products.php */