<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| This controller contains the functions related to Promo Code management
| @author J2V
|
**/

class Promocodes extends MY_Controller {

	function __construct(){
    parent::__construct();
		$this->load->helper(array('cookie','date','form'));
		$this->load->library(array('encrypt','form_validation'));		
		$this->load->model('promocodes_model');
		
		if ($this->checkPrivileges('promocodes',$this->privStatus) == FALSE){
			redirect(ADMIN_PATH);
		}
  }
	
	/**
	| 
	| This function loads the Promocode list page
	|
	**/
  public function index(){	
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			redirect(ADMIN_PATH.'/promocodes/display_promocodes');
		}
	}
	
	/**
	| 
	| This function loads the Promocode list page
	|
	**/
	public function display_promocodes(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$this->data['heading'] = 'Promo Code Lists';
			$condition = array();
			$this->data['PromocodeList'] = $this->promocodes_model->get_all_details(PROMOCODES,$condition);
			$this->load->view(ADMIN_PATH.'/promocodes/display_promocodes',$this->data);
		}
	}
	
	/**
	| 
	| This function loads the add/edit Promocode form
	|
	**/
	public function add_edit_promocodes_form(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$edit_mode=FALSE;
			$promocodes_id = $this->uri->segment(4,0);
			$promo_code_val = $this->promocodes_model->get_random_promo_code();
			if($promocodes_id!=''){
				$condition = array('id' => $promocodes_id);
				$this->data['promocode_details'] = $this->promocodes_model->get_all_details(PROMOCODES,$condition);
				if ($this->data['promocode_details']->num_rows() <=0){
					redirect(ADMIN_PATH);
				}
				if($this->data['promocode_details']->row()->no_of_usage>0){
					$this->setErrorMessage('error','You cannot edit this Promocode, already in usage');
					redirect(ADMIN_PATH.'/promocodes/view_promocode/'.$promocodes_id);
				}
				
				$promo_code_val = $this->data['promocode_details']->row()->promo_code;
				$edit_mode=TRUE;
				$this->data['heading'] = 'Edit Promocode';
			}else{
				$this->data['heading'] = 'Add New Promocode';
			}
			$this->data['promo_code_val']=$promo_code_val;
			$this->data['edit_mode']=$edit_mode;
			$this->load->view(ADMIN_PATH.'/promocodes/add_edit_promocodes',$this->data);
		}
	}
	
	/**
	| 
	| This function insert and edit a Plans
	|
	**/
	public function insertEditPromoCode(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			#echo "<pre>"; print_r($_POST); die;
			$promocodes_id = $this->input->post('promocodes_id');
			$status = $this->input->post('status');
			$type = $this->input->post('type');
			$promo_code = $this->input->post('promo_code');
			
			if(isset($type) && $type=='on'){
				$newtype='Flat';
			}else{
				$newtype='Percent';
			}
			if(isset($status) && $status=='on'){
				$newstatus='Active';
			}else{
				$newstatus='Inactive';
			}
						
			
			if($promocodes_id==''){
				$duplicate_code = $this->promocodes_model->get_all_details(PROMOCODES,array('promo_code'=>$promo_code));
			}else{
				$duplicate_code = $this->promocodes_model->get_all_details(PROMOCODES,array('id !='=>$promocodes_id,'promo_code'=>$promo_code));
			}			
			if ($duplicate_code->num_rows()>0){
				$this->setErrorMessage('error','Promo Code already exist.');
				redirect(ADMIN_PATH.'/plans/add_edit_coupon_form/'.$promocodes_id);
			}	
						
			$excludeArr = array("promocodes_id","status","type");
			
			$dataArr = array(
					'status' => $newstatus,
					'type'	=>	$newtype
				);
				
			
			if ($promocodes_id == ''){
				$dataArr['no_of_usage']=0;
				$dataArr['created']=date("Y-m-d H:i:s");
				$this->promocodes_model->commonInsertUpdate(PROMOCODES,'insert',$excludeArr,$dataArr,$condition);
				$this->setErrorMessage('success','Promocode added successfully');
			}else {
				$condition = array('id' => $promocodes_id);
				$this->promocodes_model->commonInsertUpdate(PROMOCODES,'update',$excludeArr,$dataArr,$condition);
				$this->setErrorMessage('success','Pomocode  updated successfully');
			}
			redirect(ADMIN_PATH.'/promocodes/display_promocodes');
		}
	}
	
	/**
	| 
	| This function loads the view Promocode
	|
	**/
	public function view_promocode(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$promocode_id = $this->uri->segment(4,0);
			$condition = array('id' => $promocode_id);
			$this->data['promocode_details'] = $this->promocodes_model->get_all_details(PROMOCODES,$condition);
			if ($this->data['promocode_details']->num_rows() <=0){
				redirect(ADMIN_PATH);
			}
			
			$this->data['heading'] = 'View Promocode';
			$this->load->view(ADMIN_PATH.'/promocodes/view_promocode',$this->data);
		}
	}
	
	/**
	| 
	| This function change the Promocode status
	|
	**/
	public function change_promocodes_status(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$mode = $this->uri->segment(4,0);
			$promocode_id = $this->uri->segment(5,0);
			$status = ($mode == '0')?'Inactive':'Active';
			$newdata = array('status' => $status);
			$condition = array('id' => $promocode_id);
			$this->promocodes_model->update_details(PROMOCODES,$newdata,$condition);
			$this->setErrorMessage('success','Promocode Status Changed Successfully');
			redirect(ADMIN_PATH.'/promocodes/display_promocodes');
		}
	}
	
	/**
	| 
	| This function delete the Promocode from db
	|
	**/
	public function delete_promocode(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$promocode_id = $this->uri->segment(4,0);
			$condition = array('id' => $promocode_id);
			$this->promocodes_model->commonDelete(PROMOCODES,$condition);
			$this->setErrorMessage('success','Promocode deleted successfully');
			redirect(ADMIN_PATH.'/promocodes/display_promocodes');
		}
	}
	
}

/* End of file promocodes.php */
/* Location: ./application/controllers/admin/promocodes.php */