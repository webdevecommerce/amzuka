<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| This controller contains the functions related to Categories management
| @author J2V
|
**/

class Categories extends MY_Controller {

	function __construct(){
    parent::__construct();
		$this->load->helper(array('cookie','date','form'));
		$this->load->library(array('encrypt','form_validation'));		
		$this->load->model('categories_model');
		
		if ($this->checkPrivileges('categories',$this->privStatus) == FALSE){
			redirect(ADMIN_PATH);
		}
  }
	
	/**
	| 
	| This function loads the categories list page
	|
	**/
  public function index(){	
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			redirect(ADMIN_PATH.'/categories/display_categories');
		}
	}
	
	/**
	| 
	| This function loads the categories list page
	|
	**/
	public function display_categories(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$this->data['heading'] = 'Categories Lists';
			$condition = array();
			$this->data['categoriesList'] = $this->categories_model->get_all_details(CATEGORIES,$condition);
			$this->load->view(ADMIN_PATH.'/categories/display_categories',$this->data);
		}
	}
	
	/**
	| 
	| This function loads the add/edit Category form
	|
	**/
	public function add_edit_categories_form(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$categories_id = $this->uri->segment(4,0);
			$edit_mode=FALSE;
			$condition = array('rootID' => '0');
			$this->data['root_categories'] = $this->categories_model->get_all_details(CATEGORIES,$condition);
			if($categories_id!=''){
				$condition = array('id' => $categories_id);
				$this->data['categories_details'] = $this->categories_model->get_all_details(CATEGORIES,$condition);
				if ($this->data['categories_details']->num_rows() <=0){
					redirect(ADMIN_PATH);
				}
				$cId = $this->data['categories_details']->row()->rootID;
				$cat_tree='';
				if($cId>0){
					$catTra = array();
					$sub_categories = $this->categories_model->get_all_details(CATEGORIES,array('id'=>$cId));
					if($sub_categories->num_rows()>0){
						$catTra[] = $sub_categories->row()->name;
						$having_subCat=1;
						while($having_subCat>0){							
							$sub_categories = $this->categories_model->get_all_details(CATEGORIES,array('id'=>$sub_categories->row()->rootID));
							if($sub_categories->num_rows()==0){
								$having_subCat=0;
							}else{
								$catTra[] = $sub_categories->row()->name;
							}
						}
					}
					$catTra = array_reverse($catTra);
					$cat_tree= @implode(' > ',$catTra);
				}
				$this->data['cat_tree'] = $cat_tree;				
				
				$edit_mode=TRUE;
				$this->data['heading'] = 'Edit Categories';
			}else{
				$this->data['heading'] = 'Add New Categories';
			}
			$this->data['edit_mode']=$edit_mode;
			$this->load->view(ADMIN_PATH.'/categories/add_edit_categories',$this->data);
		}
	}
	
	/**
	| 
	| This function insert and edit a Category
	|
	**/
	public function insertEditCategory(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			#echo "<pre>"; print_r($_POST); die;
			$category_id = $this->input->post('category_id');
			$status = $this->input->post('status');
			$name = $this->input->post('name');
			$isChild = $this->input->post('isChild');
			
			if(isset($status) && $status=='on'){
				$newstatus='Active';
			}else{
				$newstatus='Inactive';
			}
			
			if(isset($isChild) && $isChild=='on'){
				$isChild='Yes';
			}else{
				$isChild='No';
			}
						
			
			$urlBase = $url_title = url_title($name, '-', TRUE);
			$url_check = '0';
			if($category_id==''){
				$duplicate_url = $this->categories_model->get_all_details(CATEGORIES,array('url_title'=>$url_title));
			}else{
				$duplicate_url = $this->categories_model->get_all_details(CATEGORIES,array('id !='=>$category_id,'url_title'=>$url_title));
			}
			
			if ($duplicate_url->num_rows()>0){
				$url_title = $urlBase.'-'.$duplicate_url->num_rows();
			}
			
			$excludeArr = array("category_id","category_image","isChild","status","rootCat","catH");
			
			$dataArr = array(
					'status' => $newstatus,
					'url_title'=>$url_title
				);
			
			if ($category_id == ''){
				$dataArr['rootID'] = 0;				
				if($isChild =='Yes'){
					$rootCat = $this->input->post('rootCat');
					$rootCat = array_unique(array_filter($rootCat));
					$rootID = intval($rootCat[count($rootCat)-1]);
					$dataArr['rootID'] = $rootID;
				}
			}else{
				$catH = $this->input->post('catH');				
				if($catH==1){
					if($isChild =='Yes'){
						$rootCat = $this->input->post('rootCat');
						$rootCat = array_unique(array_filter($rootCat));
						$rootID = intval($rootCat[count($rootCat)-1]);
						$dataArr['rootID'] = $rootID;
					}else{
						$dataArr['rootID'] = 0;
					}
				}else{
					unset($dataArr['rootID']);
				}
			}
			
			if($_FILES['category_image']['size']>0){
				$config['encrypt_name'] = TRUE;
				$config['overwrite'] = FALSE;
				$config['allowed_types'] = 'jpg|jpeg|gif|png';
				$config['max_size'] = 2000;
				$config['upload_path'] = './images/category';
				$this->load->library('upload', $config);
				if ( $this->upload->do_upload('category_image')){
					$categoryDetails = $this->upload->data();
					$dataArr['image'] = $categoryDetails['file_name'];
				}else{
					$categoryDetails = $this->upload->display_errors();
					$this->setErrorMessage('error',strip_tags($categoryDetails));
					redirect(ADMIN_PATH.'/categories/add_edit_categories_form/'.$category_id);
				}
			}
			if ($category_id == ''){
				$dataArr['dateAdded']=date("Y-m-d H:i:s");
				$this->categories_model->commonInsertUpdate(CATEGORIES,'insert',$excludeArr,$dataArr,$condition);
				$this->setErrorMessage('success','Category added successfully');
			}else {
				$condition = array('id' => $category_id);
				$this->categories_model->commonInsertUpdate(CATEGORIES,'update',$excludeArr,$dataArr,$condition);
				$this->setErrorMessage('success','Category updated successfully');
			}
			redirect(ADMIN_PATH.'/categories/display_categories');
		}
	}
	
	/**
	| 
	| This function loads the view Category
	|
	**/
	public function view_category(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$category_id = $this->uri->segment(4,0);
			$condition = array('id' => $category_id);
			$this->data['category_details'] = $this->categories_model->get_all_details(CATEGORIES,$condition);
			if ($this->data['category_details']->num_rows() <=0){
				redirect(ADMIN_PATH);
			}
			$cId = $this->data['category_details']->row()->rootID;
			$cat_tree='';
			if($cId>0){
				$catTra = array();
				$sub_categories = $this->categories_model->get_all_details(CATEGORIES,array('id'=>$cId));
				if($sub_categories->num_rows()>0){
					$catTra[] = $sub_categories->row()->name;
					$having_subCat=1;
					while($having_subCat>0){							
						$sub_categories = $this->categories_model->get_all_details(CATEGORIES,array('id'=>$sub_categories->row()->rootID));
						if($sub_categories->num_rows()==0){
							$having_subCat=0;
						}else{
							$catTra[] = $sub_categories->row()->name;
						}
					}
				}
				$catTra = array_reverse($catTra);
				$cat_tree= @implode(' > ',$catTra);
			}
			$this->data['cat_tree'] = $cat_tree;
			
			$this->data['heading'] = 'View Category';
			$this->load->view(ADMIN_PATH.'/categories/view_category',$this->data);
		}
	}
	
	/**
	| 
	| This function change the Category status
	|
	**/
	public function change_category_status(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$mode = $this->uri->segment(4,0);
			$category_id = $this->uri->segment(5,0);
			$status = ($mode == '0')?'Inactive':'Active';
			$newdata = array('status' => $status);
			$condition = array('id' => $category_id);
			$this->categories_model->update_details(CATEGORIES,$newdata,$condition);
			$this->setErrorMessage('success','Category Status Changed Successfully');
			redirect(ADMIN_PATH.'/categories/display_categories');
		}
	}
	
	/**
	| 
	| This function delete the Category from db
	|
	**/
	public function delete_category(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$category_id = $this->uri->segment(4,0);
			$condition = array('id' => $category_id);
			$this->categories_model->commonDelete(CATEGORIES,$condition);
			$this->setErrorMessage('success','Category deleted successfully');
			redirect(ADMIN_PATH.'/categories/display_categories');
		}
	}
	
	/**
	| 
	| This function return the child Category
	|
	**/
	public function get_child_category(){
		$returnArr['status']='0';
		$returnArr['response']='';
		$category_id = $this->input->post('category_id');
		$parentPos = $this->input->post('parentPos');
		$condition = array('rootID' => $category_id);
		$categoryList = $this->categories_model->get_all_details(CATEGORIES,$condition);
		if($categoryList->num_rows()>0){
			$message ='<select id="parent-'.$parentPos.'" name="rootCat[]" class="cat-ddl form-control" onchange="getCategory('.$parentPos.')">';
			$message .='<option value="">Select Category</option>';
			$catArr = array();
			foreach($categoryList->result() as $row){
				$message .='<option value="'.$row->id.'">'.$row->name.'</option>';
			}
			$message .='</select>';
			$returnArr['response']=$message;
			$returnArr['status']='1';
		}
		echo json_encode($returnArr);			
	}
	
	/**
	| 
	| This function change the Category Position
	|
	**/	
	public function changePosition(){
		if ($this->checkLogin('A') != ''){
			$catID = $this->input->post('catID');
			$pos = $this->input->post('pos');
			$this->categories_model->update_details(CATEGORIES,array('cat_position'=>$pos),array('id'=>$catID));
		}
	}
	
	/**
	| 
	| This function change the Category Is Featured or Not
	|
	**/	
	public function featured_category(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$mode = $this->uri->segment(4,0);
			$category_id = $this->uri->segment(5,0);
			$featured = ($mode == '0')?'No':'Yes';
			$newdata = array('featured' => $featured);
			$condition = array('id' => $category_id);
			$this->categories_model->update_details(CATEGORIES,$newdata,$condition);
			$this->setErrorMessage('success','Category Featured Status Changed Successfully');
			redirect(ADMIN_PATH.'/categories/display_categories');
		}
	}
}

/* End of file categories.php */
/* Location: ./application/controllers/admin/categories.php */