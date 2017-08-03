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
			$this->data['sizeFilters'] = $this->categories_model->get_all_details(FILTERVALUES,array('filter_id' => $this->config->item('filter_id_size')));
			
			$this->data['colorFilters'] = $this->categories_model->get_all_details(FILTERVALUES,array('filter_id' => $this->config->item('filter_id_color')));
			//print_r($this->data['colorFilters']->result());die;
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
			$size = $this->input->post('size');
			$color = $this->input->post('color');
	
			//print_r($filters);di;

			$product_seo = url_title($product_name, '-', TRUE);
			$product_name_check = $this->product_model->get_all_details(PRODUCT,array('product_seo'=>$product_seo,'category_id'=>$category_id));
			if($product_name_check->num_rows > 0){
				$this->setErrorMessage('error','Product name already exists in this category' );
				redirect(ADMIN_PATH.'/products/add_edit_product_form');
			}
			
			$sizeStock = array_values($size);
			$availSize = array_keys($size);
			$availColors = array_keys($color);
			//$availSizeArr = array_fill_keys($availSize,$this->config->item(''));

			//print_r($availSize);die;
			
			
			
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
			$excludeArr = array('product_id','filters','sub_category_id','stock_count','tax','size','color');
			$dataArr = array(
					'product_name' => $product_name,
					'product_seo' => url_title($product_name, '-', TRUE),
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
				$data = getimagesize($_FILES['product_image']['tmp_name']);
			
				$width = $data[0];
				$height = $data[1];
			if($width==800 && $height==1077)
			{
				$config['encrypt_name'] = TRUE;
				$config['overwrite'] = FALSE;
				$config['allowed_types'] = 'jpg|jpeg|gif|png';
				$config['max_size'] = 2000;
				$config['upload_path'] = './images/products/800x1077';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('product_image')){
					$productDetails = $this->upload->data();
					$this->resize_image_one($productDetails);
					
					$dataArr['image'] = $productDetails['file_name'];
				}else{
					$productDetails = $this->upload->display_errors();
					$this->setErrorMessage('error',strip_tags($productDetails));
					redirect(ADMIN_PATH.'/products/add_edit_product_form/'.$product_id);
				}
			}else{
				$this->setErrorMessage('error','Please upload image in 800x1077 size...');
					redirect(ADMIN_PATH.'/products/add_edit_product_form');
				
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
			$this->product_model->insert_product_filters($availSize,$produc_id,'size',$sizeStock);
			$this->product_model->insert_product_filters($availColors,$produc_id,'color');
			
			redirect(ADMIN_PATH.'/products/display_products');
		}
	}
	
	
	/* public function resize_image_one($image_data){
    $this->load->library('image_lib');
    $w = $image_data['image_width']; // original image's width
    $h = $image_data['image_height']; // original images's height
	$image_name = $image_data['file_name'];
    $n_w = 170; // destination image's width
    $n_h = 220; // destination image's height

    $source_ratio = $w / $h;
    $new_ratio = $n_w / $n_h;
    if($source_ratio != $new_ratio){

        $config['image_library'] = 'gd2';
        $config['source_image'] = './images/products/800x1077/'.$image_name;
        $config['maintain_ratio'] = FALSE;
        if($new_ratio > $source_ratio || (($new_ratio == 1) && ($source_ratio < 1))){
            $config['width'] = $w;
            $config['height'] = round($w/$new_ratio);
            $config['y_axis'] = round(($h - $config['height'])/2);
            $config['x_axis'] = 0;

        } else {

            $config['width'] = round($h * $new_ratio);
            $config['height'] = $h;
            $size_config['x_axis'] = round(($w - $config['width'])/2);
            $size_config['y_axis'] = 0;

        }

        $this->image_lib->initialize($config);
        $this->image_lib->crop();
        $this->image_lib->clear();
    }
    $config['image_library'] = 'gd2';
	$config['source_image'] = './images/products/800x1077/'.$image_name;
    $config['new_image'] = './images/products/170x220/'.$image_name;
    $config['maintain_ratio'] = TRUE;
    $config['width'] = $n_w;
    $config['height'] = $n_h;
    $this->image_lib->initialize($config);

    if (!$this->image_lib->resize()){

        echo $this->image_lib->display_errors();

    }
} */

		public function resize_image_one($image_data){
    $this->load->library('image_lib');
    $w = $image_data['image_width']; // original image's width
    $h = $image_data['image_height']; // original images's height
	$image_name = $image_data['file_name'];
 

 /* First size */
 $configSize1['image_library']   = 'gd2';
$configSize1['source_image'] = './images/products/800x1077/'.$image_name;
    $configSize1['new_image'] = './images/products/170x220/'.$image_name;
 $configSize1['maintain_ratio']  = TRUE;
 $configSize1['width']           = 170;
 $configSize1['height']          = 220;

 $this->image_lib->initialize($configSize1);
 $this->image_lib->resize();
 $this->image_lib->clear();

 /* Second size */    
 $configSize2['image_library']   = 'gd2';
$configSize2['source_image'] = './images/products/800x1077/'.$image_name;
    $configSize2['new_image'] = './images/products/390x525/'.$image_name;
 $configSize2['create_thumb']    = TRUE;
 $configSize2['maintain_ratio']  = TRUE;
 $configSize2['width']           = 390;
 $configSize2['height']          = 525;

 $this->image_lib->initialize($configSize2);
 $this->image_lib->resize();
 $this->image_lib->clear();
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
		if($cat_id!='') {
		$sub_categories = $this->product_model->get_all_details(CATEGORIES,array('rootId'=>$cat_id));
		if($sub_categories->num_rows() > 0){
			$status = 1;
		}else{
			$status = 0;
		}
		echo json_encode(array('data' => $sub_categories->result_array(),'status' => $status));
	}
		else {
			echo json_encode(array('status' => 0));
	}
	}
	
	/* This will get filters of sub category */

	public function fetch_filters_of_subcategory(){
		$allFilters = array();
		$sub_cat_id = $_POST['sub_category_id'];
		$sub_categories = $this->product_model->get_selected_fields(CATEGORIES,array('filters'),array('id'=>$sub_cat_id));
		if($sub_categories->row_array()['filters'] != ''){
			$filtersId = explode(",",$sub_categories->row_array()['filters']);
			
			/* Mandatory filters for all product, So manuaaly pushed it */
			//array_push($filtersId,$this->config->item('filter_id_size'));
			//array_push($filtersId,$this->config->item('filter_id_color'));
			/* Mandatory filters for all product, So manuaaly pushed it */
			
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
