<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
| 
| This controller contains the functions related to Categories management
| @author J2V
|
**/

class Filters extends MY_Controller {

	function __construct(){
    parent::__construct();
		$this->load->helper(array('cookie','date','form'));
		$this->load->library(array('encrypt','form_validation'));		
		$this->load->model('filters_model');
		$this->load->model('filtervalues_model');
		
		if ($this->checkPrivileges('filters',$this->privStatus) == FALSE){
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
			redirect(ADMIN_PATH.'/categories/display_filters');
		}
	}
	
	/**
	| 
	| This function loads the categories list page
	|
	**/
	public function display_filters(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$this->data['heading'] = 'Filters Lists';
			$condition = array();
			$this->data['categoriesList'] = $this->categories_model->get_all_details(FILTERS,$condition);
			$this->load->view(ADMIN_PATH.'/filters/display_filters',$this->data);
		}
	}
	
	/**
	| 
	| This function loads the add/edit Category form
	|
	**/
	public function add_edit_filters_form(){ //echo 'ds';die;
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$condition = array();
			$this->data['filters_details'] = $this->filters_model->get_all_details(FILTERS,$condition);
			$this->data['heading'] = 'Add New Filters';
			$this->load->view(ADMIN_PATH.'/filters/add_filters',$this->data);
		}
	}
	
	/**
	| 
	| This function insert and edit a Category
	|
	**/
	public function insertFilter(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$filter_name = $this->input->post('filter_name');
			$status = $this->input->post('status');
			if(isset($status) && $status=='on'){
				$newstatus='Active';
			}else{
				$newstatus='Inactive';
			}
			$excludeArr = array();
			$dataArr = array(
					'status' => $newstatus,
					'filter_name' => $filter_name
				);
			$dataArr['status'] = $newstatus;
			$dataArr['created_at']=date("Y-m-d H:i:s");
			$this->filters_model->commonInsertUpdate(FILTERS,'insert',$excludeArr,$dataArr,$condition);
			$this->setErrorMessage('success','Filter added successfully');
			redirect(ADMIN_PATH.'/filters/add_edit_filters_form');
		}
	}
	
	public function editFilter($id){
		$condition = array('id' => $id);
		$this->data['filter_details'] = $this->filters_model->get_all_details(FILTERS,$condition);
		$this->load->view(ADMIN_PATH.'/filters/edit_filters',$this->data);
	}
	
	public function updateFilter(){
			if ($this->checkLogin('A') == ''){
				redirect(ADMIN_PATH);
			}else {
				$id = $this->input->post('id');
				$status = $this->input->post('status');
				$filter_name = $this->input->post('filter_name');
				if(isset($status) && $status=='on'){
						$newstatus='Active';
				}else{
						$newstatus='Inactive';
				}	
				$condition = array('id' => $id);
				$excludeArr = array();
				$dataArr = array(
					'status' => $newstatus,
					'filter_name' => $filter_name
				);
				$this->filters_model->commonInsertUpdate(FILTERS,'update',$excludeArr,$dataArr,$condition);
				$this->setErrorMessage('success','Filter updated successfully');
				redirect(ADMIN_PATH.'/filters/add_edit_filters_form');
		}
	}
	
	public function deleteFilter($id){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			
			$condition = array('filter_id' => $id);
			$this->filtervalues_model->commonDelete(FILTERVALUES,$condition);
			$condition = array('id' => $id);
			$this->filters_model->commonDelete(FILTERS,$condition);
			$this->setErrorMessage('success','Filter deleted successfully');
			redirect(ADMIN_PATH.'/filters/add_edit_filters_form');
		}
	}
	
	public function addFilterValues($id){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$condition = array('filter_id' => $id);
			$chk_filter = $this->filtervalues_model->get_all_details(FILTERVALUES,$condition);
			//echo '<pre>';print_r($chk_filter);die;
			if($chk_filter->num_rows() > 0){
				$this->data['filter_values'] = $this->filtervalues_model->get_all_details(FILTERVALUES,$condition);
			}else{
				$this->data['filter_values'] = array();
			}
			$this->data['heading'] = 'Add New Filters Values';
			$this->data['cur_id'] = $id;
			$this->load->view(ADMIN_PATH.'/filtersvalues/add_filter_values',$this->data);
		}
	}
	
	public function insertFilterValue(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$filter_value = $this->input->post('value');
			$filter_id = $this->input->post('filter_id');
			$dataArr = array(
					'value' => $filter_value,
					'filter_id'=>$filter_id
				);
			$excludeArr = array();
			$dataArr['created_at']=date("Y-m-d H:i:s");
			$this->filtervalues_model->commonInsertUpdate(FILTERVALUES,'insert',$excludeArr,$dataArr,$condition);
			$this->setErrorMessage('success','Filter value added successfully');
			redirect(ADMIN_PATH.'/filters/addFilterValues/'.$filter_id);
		}
	}
	
	public function editFilterValue($id){
		$condition = array('id' => $id);
		$this->data['filtervalues_details'] = $this->filtervalues_model->get_all_details(FILTERVALUES,$condition);
		$this->load->view(ADMIN_PATH.'/filtersvalues/edit_filtersvaluses',$this->data);
	}
	
	public function updateFilterValue(){
			if ($this->checkLogin('A') == ''){
				redirect(ADMIN_PATH);
			}else {
				$id = $this->input->post('id');
				$filter_value = $this->input->post('value');
				$filter_id = $this->input->post('filter_id');
				$condition = array('id' => $id);
				$excludeArr = array();
				$dataArr = array(
					'value' => $filter_value
				);
				$this->filtervalues_model->commonInsertUpdate(FILTERVALUES,'update',$excludeArr,$dataArr,$condition);
				$this->setErrorMessage('success','Filter value updated successfully');
				redirect(ADMIN_PATH.'/filters/addFilterValues/'.$filter_id);
		}
	}
	
	public function deleteFilterValue($id,$filter_id){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$condition = array('id' => $id);
			$this->filtervalues_model->commonDelete(FILTERVALUES,$condition);
			$this->setErrorMessage('success','Filter value deleted successfully');
			redirect(ADMIN_PATH.'/filters/addFilterValues/'.$filter_id);
		}
	}
}

/* End of file categories.php */
/* Location: ./application/controllers/admin/categories.php */