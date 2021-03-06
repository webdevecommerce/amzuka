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
			$condition = array();
			$edit_mode=FALSE;
			$condition = array('rootID' => '0');
			$this->data['root_categories'] = $this->categories_model->get_all_details(CATEGORIES,$condition);
			$product_id = $this->uri->segment(4,0);
			if($product_id!=''){
				$condition = array('id' => $categories_id);
				$this->data['product_details'] = $this->product_model->get_all_details(PRODUCT,$condition);
				$edit_mode=TRUE;
				$this->data['heading'] = 'Edit Categories';
			}else{
				$this->data['heading'] = 'Add New Products';
			}
			$this->data['edit_mode']=$edit_mode;
			$this->load->view(ADMIN_PATH.'/products/add_edit_products',$this->data);
		}
	}
	
	/**
	* 
	* This function insert and edit product
	*
	**/
	public function insertEditProduct(){
		//echo "<pre>";print_r($_POST);die;
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			#echo "<pre>"; print_r($_POST); die;
			$category_id = $this->input->post('category_id');
			$status = $this->input->post('status');
			$product_name = $this->input->post('product_name');
			$product_image = $this->input->post('product_image');
			$product_featured = $this->input->post('product_featured');
			$sale_price = $this->input->post('sale_price');
			$price = $this->input->post('price');
			
			if(isset($status) && $status=='on'){
				$newstatus='Publish';
			}else{
				$newstatus='Inpublish';
			}
			if(isset($product_featured) && $product_featured=='on'){
				$featuredstatus='yes';
			}else{
				$featuredstatus='no';
			}
			$excludeArr = array('product_id');
			$dataArr = array(
					'product_name' => $product_name,
					'category_id'=>$category_id,
					'product_featured'=>$featuredstatus,
					'sale_price'=>$sale_price,
					'price'=>$price,
					'status'=>$newstatus
				);
			if ($_FILES['product_image']['size']>0) {
				$config['encrypt_name'] = TRUE;
				$config['overwrite'] = FALSE;
				$config['allowed_types'] = 'jpg|jpeg|gif|png';
				$config['max_size'] = 2000;
				$config['upload_path'] = './images/products';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('product_image')){
					$productDetails = $this->upload->data();
					$dataArr['image'] = $productDetails['file_name'];
				}else{
					$productDetails = $this->upload->display_errors();
					$this->setErrorMessage('error',strip_tags($productDetails));
					redirect(ADMIN_PATH.'/products/add_edit_product_form/'.$product_id);
				}
			}
			if ($product_id == ''){
				$dataArr['created']=date("Y-m-d H:i:s");
				$condition = array();
				$this->product_model->commonInsertUpdate(PRODUCT,'insert',$excludeArr,$dataArr,$condition);
				$this->setErrorMessage('success','Product added successfully');
			}else {
				$condition = array('id' => $product_id);
				$this->product_model->commonInsertUpdate(PRODUCT,'update',$excludeArr,$dataArr,$condition);
				$this->setErrorMessage('success','Product updated successfully');
			}
			redirect(ADMIN_PATH.'/products/display_products');
		}
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