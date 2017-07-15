<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| This controller contains the functions related to Plans management
| @author J2V
|
**/

class Plans extends MY_Controller {

	function __construct(){
    parent::__construct();
		$this->load->helper(array('cookie','date','form'));
		$this->load->library(array('encrypt','form_validation'));		
		$this->load->model('plans_model');
		
		if ($this->checkPrivileges('plans',$this->privStatus) == FALSE){
			redirect(ADMIN_PATH);
		}
  }
	
	/**
	| 
	| This function loads the plans list page
	|
	**/
  public function index(){	
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			redirect(ADMIN_PATH.'/plans/display_plans');
		}
	}
	
	/**
	| 
	| This function loads the plans list page
	|
	**/
	public function display_plans(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$this->data['heading'] = 'Plans Lists';
			$condition = array();
			$this->data['plansList'] = $this->plans_model->get_all_details(PLANS,$condition);
			$this->load->view(ADMIN_PATH.'/plans/display_plans',$this->data);
		}
	}
	
	/**
	| 
	| This function loads the add/edit Plans form
	|
	**/
	public function add_edit_plans_form(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$plan_id = $this->uri->segment(4,0);
			$edit_mode=FALSE;
			if($plan_id!=''){
				$condition = array('id' => $plan_id);
				$this->data['plan_details'] = $this->plans_model->get_all_details(PLANS,$condition);
				if ($this->data['plan_details']->num_rows() <=0){
					redirect(ADMIN_PATH);
				}
				$edit_mode=TRUE;
				$this->data['heading'] = 'Edit Plan';
			}else{
				$this->data['heading'] = 'Add New Plan';
			}
			$this->data['edit_mode']=$edit_mode;
			$this->load->view(ADMIN_PATH.'/plans/add_edit_plan',$this->data);
		}
	}
	
	/**
	| 
	| This function insert and edit a Plans
	|
	**/
	public function insertEditPlans(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			#echo "<pre>"; print_r($_POST); die;
			$plan_id = $this->input->post('plan_id');
			$status = $this->input->post('status');
			$plan_name = $this->input->post('plan_name');
			$plan_duration = $this->input->post('plan_duration');
			$plan_duration_type = $this->input->post('plan_duration_type');
			
			if(isset($status) && $status=='on'){
				$newstatus='Active';
			}else{
				$newstatus='Inactive';
			}
						
			
			if($plan_id==''){
				$duplicate_name = $this->plans_model->get_all_details(PLANS,array('plan_name'=>$plan_name));
			}else{
				$duplicate_name = $this->plans_model->get_all_details(PLANS,array('id !='=>$plan_id,'plan_name'=>$plan_name));
			}			
			if ($duplicate_name->num_rows()>0){
				$this->setErrorMessage('error','Plan name already exist.');
				redirect(ADMIN_PATH.'/plans/add_edit_plans_form/'.$plan_id);
			}	
			
			if($plan_id==''){
				$plan_duration_chk = $this->plans_model->get_all_details(PLANS,array('plan_duration'=>$plan_duration,'plan_dur_type'=>$plan_duration_type));
			}else{
				$plan_duration_chk = $this->plans_model->get_all_details(PLANS,array('id !='=>$plan_id,'plan_duration'=>$plan_duration,'plan_dur_type'=>$plan_duration_type));
			}			
			if ($plan_duration_chk->num_rows()>0){
				$this->setErrorMessage('error','Plan Duration already exist.');
				redirect(ADMIN_PATH.'/plans/add_edit_plans_form/'.$plan_id);
			}
			
			$excludeArr = array("plan_id","plan_duration_type","status");
			
			$plan_dur_type = "";
			if($plan_duration_type=="Day"){
				$plan_dur_type = "Day";
			}
			if($plan_duration_type=="Month"){
				$plan_dur_type = "Month";
			}
			if($plan_duration_type=="Year"){
				$plan_dur_type = "Year";
			}
			if($plan_duration_type=="lifetime"){
				$plan_dur_type = "Lifetime";
			}
						
			if ($plan_dur_type==""){
				$this->setErrorMessage('error','Plan Duration should not be empty.');
				redirect(ADMIN_PATH.'/plans/add_edit_plans_form/'.$plan_id);
			}
			
			$dataArr = array(
					'status' => $newstatus,
					'plan_dur_type'=>$plan_dur_type
				);
			
			if ($plan_id == ''){
				$dataArr['created']=date("Y-m-d H:i:s");
				$this->plans_model->commonInsertUpdate(PLANS,'insert',$excludeArr,$dataArr,$condition);
				$this->setErrorMessage('success','Plan added successfully');
			}else {
				$condition = array('id' => $plan_id);
				$this->plans_model->commonInsertUpdate(PLANS,'update',$excludeArr,$dataArr,$condition);
				$this->setErrorMessage('success','Plan updated successfully');
			}
			redirect(ADMIN_PATH.'/plans/display_plans');
		}
	}
	
	/**
	| 
	| This function loads the view Plans
	|
	**/
	public function view_plans(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$plan_id = $this->uri->segment(4,0);
			$condition = array('id' => $plan_id);
			$this->data['plans_details'] = $this->plans_model->get_all_details(PLANS,$condition);
			if ($this->data['plans_details']->num_rows() <=0){
				redirect(ADMIN_PATH);
			}
			
			$this->data['heading'] = 'View Plans';
			$this->load->view(ADMIN_PATH.'/plans/view_plans',$this->data);
		}
	}
	
	/**
	| 
	| This function change the Plans status
	|
	**/
	public function change_plans_status(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$mode = $this->uri->segment(4,0);
			$plan_id = $this->uri->segment(5,0);
			$status = ($mode == '0')?'Inactive':'Active';
			$newdata = array('status' => $status);
			$condition = array('id' => $plan_id);
			$this->plans_model->update_details(PLANS,$newdata,$condition);
			$this->setErrorMessage('success','Plan Status Changed Successfully');
			redirect(ADMIN_PATH.'/plans/display_plans');
		}
	}
	
	/**
	| 
	| This function delete the Plans from db
	|
	**/
	public function delete_plans(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$plan_id = $this->uri->segment(4,0);
			$condition = array('id' => $plan_id);
			$this->plans_model->commonDelete(PLANS,$condition);
			$this->setErrorMessage('success','Plan deleted successfully');
			redirect(ADMIN_PATH.'/plans/display_plans');
		}
	}
	
}

/* End of file plans.php */
/* Location: ./application/controllers/admin/plans.php */