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
				$this->data['heading'] = 'Add New Product';
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
			//echo "<pre>"; print_r($_POST); die;
			$category_id = $this->input->post('category_id');
			$sub_category_id = $this->input->post('sub_category_id');
			$status = $this->input->post('status');
			$product_name = $this->input->post('product_name');
			$product_image = $this->input->post('product_image');
			$product_featured = $this->input->post('product_featured');
			$stock_count = $this->input->post('stock_count');
			$tax = $this->input->post('tax');
			$shipping_cost = $this->input->post('shipping_cost');
			$price = $this->input->post('price');
			$filters = $this->input->post('filters');
			
			
			
			if(isset($tax) && $tax <= 0){
				$tax = 0;
			}
			
			if(isset($shipping_cost) && $shipping_cost <= 0){
				$shipping_cost = 0;
			}
			
			if(isset($status) && $status=='on'){
				$newstatus='Publish';
			}else{
				$newstatus='Unpublish';
			}
			if(isset($product_featured) && $product_featured=='on'){
				$featuredstatus='yes';
			}else{
				$featuredstatus='no';
			}
			$excludeArr = array('product_id','filters','sub_category_id','stock_count','tax');
			$dataArr = array(
					'product_name' => $product_name,
					'category_id'=>$category_id,
					'sub_category_id'=>$sub_category_id,
					'product_featured'=>$featuredstatus,
					'price'=>$price,
					'quantity'=>$stock_count,
					'tax_cost'=>$tax,
					'shipping_cost'=>$shipping_cost,
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
			
			//print_r($dataArr);die;
			
			//print_r($filters);die;
			
			//die;
			
			if ($product_id == ''){
				$dataArr['created']=date("Y-m-d H:i:s");
				$condition = array();
				$this->product_model->commonInsertUpdate(PRODUCT,'insert',$excludeArr,$dataArr,$condition);
				$produc_id = $this->db->insert_id();
				$this->setErrorMessage('success','Product added successfully');
			}else {
				$condition = array('id' => $product_id);
				$this->product_model->commonInsertUpdate(PRODUCT,'update',$excludeArr,$dataArr,$condition);
				$this->setErrorMessage('success','Product updated successfully');
			}
			
			$this->product_model->insert_product_filters($filters,$produc_id);
			
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
	
	/* This will fetch all sub category of main category */
	
	public function fetch_sub_categories_id(){
		$cat_id = $_POST['category_id'];
		$sub_categories = $this->product_model->get_all_details(CATEGORIES,array('rootId'=>$cat_id));
		if($sub_categories->num_rows() > 0){
			$status = 1;
		}else{
			$status = 0;
		}
		echo json_encode(array('data' => $sub_categories->result_array(),'status' => $status));
	}
	
	/* This will get filters of sub category */

	public function fetch_filters_of_subcategory(){
		$allFilters = array();
		$sub_cat_id = $_POST['sub_category_id'];
		$sub_categories = $this->product_model->get_selected_fields(CATEGORIES,array('filters'),array('id'=>$sub_cat_id));
		if($sub_categories->row_array()['filters'] != ''){
			$filtersId = explode(",",$sub_categories->row_array()['filters']);
			if(!empty(array_filter($filtersId))){
				foreach($filtersId as $key => $filter_value){
					$filter_array = $this->get_filters_with_value($filter_value);
					if($filter_array->num_rows() > 0){
						if(array_filter($filter_array->result_array())){
							$allFilters[] = $this->formatting_filter_array($filter_array->result_array());
						}
					}
				}
				
			}
		}
		
		if(!empty(array_filter($allFilters))){
			$status = 1;
		}else{
			$status = 0;
		}
		echo json_encode(array('data' => $allFilters,'status' => $status));
	}
	
	private function get_filters_with_value($filter_id = ''){
		if($filter_id !=''){
			$query = 'SELECT fv.id as fv_id,fv.value as fv_value,f.id as filter_id,f.filter_name FROM '.FILTER_VALUES.' fv '.
									' INNER JOIN '.FILTERS.' f '.
									' ON fv.filter_id = f.id AND fv.filter_id = '.$filter_id;
			return $result = $this->db->query($query);
		}
	}
	
	private function formatting_filter_array($filter_array = array()){
		
		$newArray = [];
		$first = true;
		foreach ($filter_array as $item) {
				if ($first) {
						$first = false;
						$newArray = [
								'filter_id' => $item['filter_id'],
								'filter_value' => $item['filter_name'],
								'filter_values' => []
						];
				}

				$newArray['filter_values'][] = [
						'fv_id' => $item['fv_id'],
						'fv_value' => $item['fv_value'],
				];
		}
			return $newArray;
//		print_r($newArray);die;
	
	/* 	$newArray = array_reduce($filter_array,function($carry,$item){
			// create key so as to distinct values from each other
			$key = $item['filter_id'] . '-' . $item['filter_name'];

			// check if created key exists in `$carry`, 
			// if not - we init it with some data
			if (empty($carry[$key])) {
					$carry[$key] = [
							'filter_id' => $item['filter_id'],
							'filter_name' => $item['filter_name'],
							'filter_values' => []
					];
			}

			// add values to `filter_values`
			$carry[$key]['filter_values'][] = [
					'fv_id' => $item['fv_id'],
					'fv_value' => $item['fv_value'],
			];

			return $carry;
	}, []); */
	
	}
	
	
	
}

/* End of file products.php */
/* Location: ./application/controllers/admin/products.php */
