<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| This controller contains the functions related to Orders management
| @author J2V
|
**/

class Orders extends MY_Controller {

	function __construct(){
    parent::__construct();
		$this->load->helper(array('cookie','date','form'));
		$this->load->library(array('encrypt','form_validation'));		
		$this->load->model('order_model');
		
		if ($this->checkPrivileges('orders',$this->privStatus) == FALSE){
			redirect(ADMIN_PATH);
		}
  }
	
	/**
	| 
	| This function loads the Order list page
	|
	**/
  public function index(){	
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			redirect(ADMIN_PATH.'/orders/display_orders');
		}
	}
	
	/**
	| 
	| This function loads the Orders list page
	|
	**/
	public function display_orders(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$this->data['heading'] = 'Orders Lists';
			$condition = array();
			$this->data['couponList'] = $this->order_model->get_all_details(ORDERS,$condition);
			$this->load->view(ADMIN_PATH.'/orders/display_orders',$this->data);
		}
	}
	
	
	/**
	| 
	| This function loads the view Orders
	|
	**/
	public function view_orders(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			$order_id = $this->uri->segment(4,0);
			$condition = array('id' => $order_id);
			$this->data['order_details'] = $this->order_model->get_all_details(ORDERS,$condition);
			if($this->data['order_details']->num_rows()<=0){
				redirect(ADMIN_PATH);
			}
			
			$this->data['heading'] = 'View Order';
			$this->load->view(ADMIN_PATH.'/orders/view_orders',$this->data);
		}
	}
	
	/**
	| 
	| This function change the Order status
	|
	**/
	public function change_orders_status(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else{
			$mode = $this->uri->segment(4,0);
			$orders_id = $this->uri->segment(5,0);
			$status = ($mode == '0')?'Inactive':'Active';
			$newdata = array('status' => $status);
			$condition = array('id' => $orders_id);
			$this->order_model->update_details(ORDERS,$newdata,$condition);
			$this->setErrorMessage('success','Order Status Changed Successfully');
			redirect(ADMIN_PATH.'/options/display_options');
		}
	}
	
	
}

/* End of file orders.php */
/* Location: ./application/controllers/admin/orders.php */