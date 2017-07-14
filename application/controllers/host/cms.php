<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| This controller contains the functions related to admin management
| @author J2V
|
**/

class Cms extends MY_Controller {

	function __construct(){
    parent::__construct();
		$this->load->helper(array('cookie','date','form'));
		$this->load->library(array('encrypt','form_validation'));		
		$this->load->model('cms_model');
		
		if ($this->checkPrivileges('cms',$this->privStatus) == FALSE){
			redirect(ADMIN_PATH);
		}
  }
	
	/**
	| 
	| This function loads the cms list page
	|
	**/
  public function index(){	
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			redirect(ADMIN_PATH.'/cms/display_cms');
		}
	}
	
	/**
	| 
	| This function loads the cms list page
	|
	**/
	public function display_cms(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$this->data['heading'] = 'Static Pages';
			$condition = array();
			$this->data['pageList'] = $this->cms_model->get_all_details(CMS,$condition);
			$this->load->view(ADMIN_PATH.'/cms/display_cms',$this->data);
		}
	}
	
	/**
	| 
	| This function loads the add/edit CMS Page form
	|
	**/
	public function add_edit_cms_form(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$page_id = $this->uri->segment(4,0);
			$edit_mode=FALSE;
			if($page_id!=''){
				$condition = array('id' => $page_id);
				$this->data['page_details'] = $this->cms_model->get_all_details(CMS,$condition);
				if ($this->data['page_details']->num_rows() <=0){
					$this->setErrorMessage('error','Page details not found');
					redirect(ADMIN_PATH.'/cms/display_cms');
				}
				$edit_mode=TRUE;
				$this->data['heading'] = 'Edit CMS Page';
			}else{
				$this->data['heading'] = 'Add New CMS Page';
			}
			$this->data['edit_mode']=$edit_mode;
			$this->load->view(ADMIN_PATH.'/cms/add_edit_cms',$this->data);
		}
	}
	
	/**
	| 
	| This function insert and edit a cms page
	|
	**/
	public function insertEditCms(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$cms_id = $this->input->post('cms_id');
			$parent_id = $this->input->post('parent');
			$page_name = $this->input->post('page_name');
			$status = $this->input->post('status');
			
			if(isset($status) && $status=='on'){
				$newstatus='Publish';
			}else{
				$newstatus='UnPublish';
			}
			
			$parent = '0';
			$category = 'Main';
			if ($parent_id != ''){
				$parent = $parent_id;
				$category = 'Sub';
			}
			if ($cms_id == ''){
				$condition = array('page_name' => $page_name);
			}else {
				$condition = array('page_name' => $page_name,'id !=' => $cms_id);
			}
			$duplicate_name = $this->cms_model->get_all_details(CMS,$condition);
			if ($duplicate_name->num_rows() > 0){
				$this->setErrorMessage('error','Page name already exists');
				redirect(ADMIN_PATH.'/cms/display_cms');
			}
			$excludeArr = array("cms_id");
			$datestring = "%Y-%m-%d";
			$time = time();
			
			$seourl = url_title($page_name, '-', TRUE);
			$dataArr = array(
					'status' => $newstatus,
					'seourl' => $seourl,
					'parent' => $parent,
					'category' => $category
				);
			
			$condition = array('id' => $cms_id);
			if ($cms_id == ''){
				$this->cms_model->commonInsertUpdate(CMS,'insert',$excludeArr,$dataArr,$condition);
				$this->setErrorMessage('success','Page added successfully');
				if ($seourl == ''){
					$cms_id = $this->cms_model->get_last_insert_id();
					$seourl = $cms_id.'/'.str_replace(' ','',$page_name);
					$this->cms_model->update_details(CMS,array('seourl'=>$seourl),array('id'=>$cms_id));
				}
			}else {
				$this->cms_model->commonInsertUpdate(CMS,'update',$excludeArr,$dataArr,$condition);
				$this->setErrorMessage('success','Page updated successfully');
			}
			redirect(ADMIN_PATH.'/cms/display_cms');
		}
	}
	
	/**
	| 
	| This function change the cms page status
	|
	**/
	public function change_cms_status(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$mode = $this->uri->segment(4,0);
			$cms_id = $this->uri->segment(5,0);
			$status = ($mode == '0')?'UnPublish':'Publish';
			$newdata = array('status' => $status);
			$condition = array('id' => $cms_id);
			$this->cms_model->update_details(CMS,$newdata,$condition);
			$this->setErrorMessage('success','Page Status Changed Successfully');
			redirect(ADMIN_PATH.'/cms/display_cms');
		}
	}
	
	/**
	| 
	| This function delete the cms page from db
	|
	**/
	public function delete_cms(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$cms_id = $this->uri->segment(4,0);
			$condition = array('id' => $cms_id);
			$this->cms_model->commonDelete(CMS,$condition);
			$this->setErrorMessage('success','Page deleted successfully');
			redirect(ADMIN_PATH.'/cms/display_cms');
		}
	}
}

/* End of file cms.php */
/* Location: ./application/controllers/admin/cms.php */