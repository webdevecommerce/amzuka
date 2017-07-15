<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| This controller contains the functions related to slider management
| @author J2V
|
**/

class Slider extends MY_Controller {

	function __construct(){
    parent::__construct();
		$this->load->helper(array('cookie','date','form'));
		$this->load->library(array('encrypt','form_validation'));		
		$this->load->model('slider_model');
		
		if ($this->checkPrivileges('slider',$this->privStatus) == FALSE){
			redirect(ADMIN_PATH);
		}
  }
	
	/**
	| 
	| This function loads the slider list page
	|
	**/
  public function index(){	
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			redirect(ADMIN_PATH.'/slider/display_sliders');
		}
	}
	
	/**
	| 
	| This function loads the slider list page
	|
	**/
	public function display_sliders(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$this->data['heading'] = 'Sliders List';
			$condition = array();
			$this->data['sliderList'] = $this->slider_model->get_all_details(SLIDER,$condition);
			$this->load->view(ADMIN_PATH.'/slider/display_sliders',$this->data);
		}
	}
	
	/**
	| 
	| This function loads the add/edit slider form
	|
	**/
	public function add_edit_slide_form(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$slide_id = $this->uri->segment(4,0);
			$edit_mode=FALSE;
			if($slide_id!=''){
				$condition = array('id' => $slide_id);
				$this->data['slider_details'] = $this->slider_model->get_all_details(SLIDER,$condition);
				if ($this->data['slider_details']->num_rows() <=0){
					redirect(ADMIN_PATH);
				}
				$edit_mode=TRUE;
				$this->data['heading'] = 'Edit Slider';
			}else{
				$this->data['heading'] = 'Add New Slider';
			}
			$this->data['edit_mode']=$edit_mode;
			$this->load->view(ADMIN_PATH.'/slider/add_edit_slider',$this->data);
		}
	}
	
	/**
	| 
	| This function insert and edit a Slide
	|
	**/
	public function insertEditSlide(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$slide_id = $this->input->post('slide_id');
			$status = $this->input->post('status');
			
			if(isset($status) && $status=='on'){
				$newstatus='Publish';
			}else{
				$newstatus='Unpublish';
			}
			
			$excludeArr = array("slide_id","slider_image");			
			$dataArr = array(
					'status' => $newstatus,
					'added_by' => $this->session->userdata(APPNAMES.'_session_admin_name')
				);			
			if($_FILES['slider_image']['size']>0){
				$config['encrypt_name'] = TRUE;
				$config['overwrite'] = FALSE;
				$config['allowed_types'] = 'jpg|jpeg|gif|png';
				$config['max_size'] = 2000;
				$config['upload_path'] = './images/slider';
				$this->load->library('upload', $config);
				if ( $this->upload->do_upload('slider_image')){
					$sliderDetails = $this->upload->data();
					$dataArr['slide'] = $sliderDetails['file_name'];
				}else{
					$sliderDetails = $this->upload->display_errors();
					$this->setErrorMessage('error',strip_tags($sliderDetails));
					redirect(ADMIN_PATH.'/slider/add_edit_slide_form/'.$slide_id);
				}
			}
			if ($slide_id == ''){
				$dataArr['dateAdded']=date("Y-m-d H:i:s");
				$this->slider_model->commonInsertUpdate(SLIDER,'insert',$excludeArr,$dataArr,$condition);
				$this->setErrorMessage('success','Slider added successfully');
			}else {
				$condition = array('id' => $slide_id);
				$this->slider_model->commonInsertUpdate(SLIDER,'update',$excludeArr,$dataArr,$condition);
				$this->setErrorMessage('success','Slider updated successfully');
			}
			redirect(ADMIN_PATH.'/slider/display_sliders');
		}
	}
	
	/**
	| 
	| This function loads the view slider page
	|
	**/
	public function view_slider(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$slide_id = $this->uri->segment(4,0);
			$condition = array('id' => $slide_id);
			$this->data['slider_details'] = $this->slider_model->get_all_details(SLIDER,$condition);
			if ($this->data['slider_details']->num_rows() <=0){
				redirect(ADMIN_PATH);
			}
			$this->data['heading'] = 'View Slider';
			$this->load->view(ADMIN_PATH.'/slider/view_slider',$this->data);
		}
	}
	
	/**
	| 
	| This function change the Slider status
	|
	**/
	public function change_slider_status(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$mode = $this->uri->segment(4,0);
			$slide_id = $this->uri->segment(5,0);
			$status = ($mode == '0')?'Unpublish':'Publish';
			$newdata = array('status' => $status);
			$condition = array('id' => $slide_id);
			$this->slider_model->update_details(SLIDER,$newdata,$condition);
			$this->setErrorMessage('success','Slider Status Changed Successfully');
			redirect(ADMIN_PATH.'/slider/display_sliders');
		}
	}
	
	/**
	| 
	| This function delete the slider from db
	|
	**/
	public function delete_slider(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$slide_id = $this->uri->segment(4,0);
			$condition = array('id' => $slide_id);
			$this->slider_model->commonDelete(SLIDER,$condition);
			$this->setErrorMessage('success','Slider deleted successfully');
			redirect(ADMIN_PATH.'/slider/display_sliders');
		}
	}
}

/* End of file slider.php */
/* Location: ./application/controllers/admin/slider.php */