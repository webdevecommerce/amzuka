<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| This controller contains the functions related to settings management
| @author J2V
|
**/

class Settings extends MY_Controller {
	function __construct(){
    parent::__construct();
		$this->load->helper(array('cookie','date','form'));
		$this->load->library(array('encrypt','form_validation'));		
		$this->load->model('admin_model');
  }
    
  /**
  | 
  | This function check the admin login session and load the templates
  |
	**/
  public function index(){
		$this->data['heading'] = 'Settings';
		if ($this->checkLogin('A') == ''){
			$this->load->view(ADMIN_PATH.'/templates/login',$this->data);
		}else {
			redirect(ADMIN_PATH.'/settings/global_settings_form');
		}
	}
		
	/**
	|
	|	This function loads the settings form
	|
	**/
	public function global_settings_form(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			if ($this->checkPrivileges('admin','2') == TRUE){
				$this->data['heading'] = 'Common Site Settings';
				$this->data['settings'] = $result = $this->admin_model->getAdminSettings();
				$this->load->view(ADMIN_PATH.'/settings/edit_site_settings',$this->data);
			}else {
				redirect(ADMIN_PATH);
			}
		}
	}
	
	/**
	|
	|	This function validates the settings form
	|
	**/
	public function global_settings(){
		if ($this->checkLogin('A') != ''){
			$chkSettings=$this->admin_model->get_all_details(ADMIN_SETTINGS,array('id' => '1'));
			$dataArr = array();
			$config['encrypt_name'] = TRUE;
			$config['overwrite'] = FALSE;
		  $config['allowed_types'] = 'jpg|jpeg|gif|png';
		  $config['max_size'] = 2000;
		  $config['upload_path'] = './images/logo';
		  $this->load->library('upload', $config);
			if(isset($_FILES['logo_image']) && $_FILES['logo_image']['size']>0){
				if ( $this->upload->do_upload('logo_image')){
					$logoDetails = $this->upload->data();
					$dataArr['logo_image'] = $logoDetails['file_name'];
				}
			}
			if(isset($_FILES['favicon_image']) && $_FILES['favicon_image']['size']>0){
				if ( $this->upload->do_upload('favicon_image')){
					$faviconDetails = $this->upload->data();
					$dataArr['favicon_image'] = $faviconDetails['file_name'];
				}
			}
			$excludeArr = array('logo_image','favicon_image');
			$condition = array('id'=>'1');
			if($chkSettings->num_rows()==0){
				$this->admin_model->commonInsertUpdate(ADMIN_SETTINGS,'insert',$excludeArr,$dataArr,$condition);
				$this->setErrorMessage('success','Settings are inserted successfully');
			}else{
				$this->admin_model->commonInsertUpdate(ADMIN_SETTINGS,'update',$excludeArr,$dataArr,$condition);
				$this->setErrorMessage('success','Settings are updated successfully');
			}
			$this->admin_model->saveAdminSettings();			
			redirect(ADMIN_PATH.'/settings/global_settings_form');
		}else {
			redirect(ADMIN_PATH);
		}
	}
	
	
	/**
	|
	|	This function loads the smtp settings form
	|
	**/
	public function smtp_settings(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			if ($this->checkPrivileges('admin','2') == TRUE){
				$this->data['heading'] = 'SMTP Settings';
				$this->data['settings'] = $result = $this->admin_model->getAdminSettings();
				$this->load->view(ADMIN_PATH.'/settings/smtp_settings',$this->data);
			}else {
				redirect(ADMIN_PATH);
			}
		}
	}
	
	/**
	|
	|	This function save the smtp settings 
	|
	**/
	public function save_smtp_settings(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			if ($this->checkPrivileges('admin','2') == TRUE){
				$smtp_settings_val = $_POST;
				$configVal = '<?php ';
				foreach($smtp_settings_val as $key => $val){
					$value = addslashes($val);
					$configVal .= "\n\$config['$key'] = '$value'; ";
				}
				$configVal .= "\n ?>";
				$file = 'settings/smtp_settings.php';
				file_put_contents($file, $configVal);
				
				$this->admin_model->commonInsertUpdate(ADMIN_SETTINGS,'update',array(),array(),array("id"=>1));
				
				$this->setErrorMessage('success','SMTP settings updated successfully');
				redirect(ADMIN_PATH.'/settings/smtp_settings');
			
			}else {
				redirect(ADMIN_PATH);
			}
		}
	}
	
}

/* End of file settings.php */
/* Location: ./application/controllers/admin/settings.php */