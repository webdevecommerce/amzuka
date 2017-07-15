<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| This controller contains the functions related to admin management
| @author J2V
|
**/

class Login extends MY_Controller {
	function __construct(){
    parent::__construct();
		$this->load->helper(array('cookie','date','form'));
		$this->load->library(array('encrypt','form_validation'));		
		$this->load->model('admin_model');
  }
    
  /**
  | 
  | This function check the admin login session and load the templates
	| If session exists then load the dashboard
  | Otherwise load the login form
  |
	**/
  public function index(){
		if ($this->checkLogin('A') == ''){
			$this->check_admin_session();
		}
		if ($this->checkLogin('A') == ''){
			$this->data['heading'] = 'Admin Login';
			$this->load->view(ADMIN_PATH.'/templates/login',$this->data);
		}else {
			redirect(ADMIN_PATH.'/dashboard');
		}
	}
	
	/**
  | 
  | This function validate the admin login form
	| If details are correct then load the dashboard
  | Otherwise load the login form and show the error message
  |
	**/
	public function admin_login(){
		$this->form_validation->set_rules('admin_email', 'Username', 'required');
		$this->form_validation->set_rules('admin_password', 'Password', 'required');
		if ($this->form_validation->run() === FALSE){
			$this->data['heading'] = 'Admin Login';
			$this->load->view(ADMIN_PATH.'/templates/login',$this->data);
		}else {
			$name = $this->input->post('admin_email');
			$pwd = md5($this->input->post('admin_password'));
			$mode = SUBADMIN;
			if ($name == $this->config->item('email')){
				$mode = ADMIN;
			}
			$condition = array('email' => $name, 'admin_password' => $pwd, 'is_verified' => 'Yes', 'status' => 'Active');
			$query = $this->admin_model->get_all_details($mode,$condition);
			if ($query->num_rows() == 1){
				$priv = unserialize($query->row()->privileges);
				$admindata = array(
								APPNAMES.'_session_admin_id' => $query->row()->id,
								APPNAMES.'_session_admin_name' => $query->row()->admin_name,
								APPNAMES.'_session_admin_email' => $query->row()->email,
								APPNAMES.'_session_admin_image' => $query->row()->admin_image,
								APPNAMES.'_session_admin_mode' => $mode,
								APPNAMES.'_session_admin_privileges' => $priv
							);
				$this->session->set_userdata($admindata);
				$datestring = "%Y-%m-%d %h:%i:%s";
				$time = time();
				$newdata = array(
	               'last_login_date' => mdate($datestring,$time),
	               'last_login_ip' => $this->input->ip_address()
	            );
	      $condition = array('id' => $query->row()->id);
				$this->admin_model->update_details($mode,$newdata,$condition);
				if ($this->input->post('remember') != ''){
					$adminid = $this->encrypt->encode($query->row()->id);
					$cookie = array(
					    'name'   => APPNAMES.'_admin_session',
					    'value'  => $adminid,
					    'expire' => 86400,
					    'secure' => FALSE
					);
					
					$this->input->set_cookie($cookie); 
				}
				$this->setErrorMessage('success','Login Success');
				redirect(ADMIN_PATH.'/dashboard');
			}else {
				$this->setErrorMessage('error','Invalid Login Details');
			}
			redirect(ADMIN_PATH);
		}
	}
	
	/**
	|
	| This function remove all admin details from session and cookie and load the login form
	|
	**/
	public function admin_logout(){
		$datestring = "%Y-%m-%d %h:%i:%s";
		$time = time();
		$newdata = array(
               'last_logout_date' => mdate($datestring,$time)
            );
		$mode = SUBADMIN;
		if ($this->session->userdata(APPNAMES.'_session_admin_name') == $this->config->item('admin_name')){
			$mode = ADMIN;
		}
        $condition = array('id' => $this->checkLogin('A'));
		$this->admin_model->update_details($mode,$newdata,$condition);
		$admindata = array(
						APPNAMES.'_session_admin_id' => '',
						APPNAMES.'_session_admin_name' => '',
						APPNAMES.'_session_admin_email' => '',
						APPNAMES.'_session_admin_mode' => '',
						APPNAMES.'_session_admin_image' => '',
						APPNAMES.'_session_admin_privileges' => ''
					);
		$this->session->unset_userdata($admindata);
		$cookie = array(
		    'name'   => APPNAMES.'_admin_session',
		    'value'  => '',
		    'expire' => -86400,
		    'secure' => FALSE
		);
		
		$this->input->set_cookie($cookie);
		$this->setErrorMessage('success','Successfully logout from your account');
		redirect(ADMIN_PATH);
	}
	
	/**
	| 
	| This function loads the forgot password form
	|
	**/
	public function admin_forgot_password_form(){	
		if ($this->checkLogin('A') == ''){
			$this->data['heading'] = 'Forgot Password';
			$this->load->view(ADMIN_PATH.'/templates/forgot_password',$this->data);
		}else {
			redirect(ADMIN_PATH.'/dashboard');
		}
	}
	
	/**
	|
	| This function validate the forgot password form
	| If email is correct then generate new password and send it to the email given
	|
	**/
	public function admin_forgot_password(){
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if ($this->form_validation->run() === FALSE){
			$this->setErrorMessage('error','Invalid Email Address');
			redirect(ADMIN_PATH.'/login/admin_forgot_password_form');
		}else {
			$email = $this->input->post('email');
			$mode = SUBADMIN;
			if ($email == $this->config->item('email')){
				$mode = ADMIN;
			}
			$condition = array('email' => $email);
			$query = $this->admin_model->get_all_details($mode,$condition);
			if ($query->num_rows() == 1){
				$new_pwd = 'admin';
				#$new_pwd = $this->get_rand_str('6');
				$newdata = array('admin_password' => md5($new_pwd));
				$condition = array('email' => $email);
				$this->admin_model->update_details($mode,$newdata,$condition);
				#$this->send_admin_pwd($new_pwd,$query);
				$this->setErrorMessage('success','New password sent to your mail');
			}else {
				$this->setErrorMessage('error','Email id not matched in our records');
				redirect(ADMIN_PATH.'/login/admin_forgot_password_form');
			}
			redirect(ADMIN_PATH);
		}
	}
	
	/**
	|
	| This function check the admin details in browser cookie
	|
	**/
	public function check_admin_session(){
		$admin_session = $this->input->cookie(APPNAMES.'_admin_session',FALSE);
		if ($admin_session != ''){
			$admin_id = $this->encrypt->decode($admin_session);
			$mode = $admin_session[APPNAMES.'_session_admin_mode'];
			$condition = array('id' => $admin_id);
			$query = $this->admin_model->get_all_details($mode,$condition);
			if ($query->num_rows() == 1){
				$priv = unserialize($query->row()->privileges);
				$admindata = array(
								APPNAMES.'_session_admin_id' => $query->row()->id,
								APPNAMES.'_session_admin_name' => $query->row()->admin_name,
								APPNAMES.'_session_admin_email' => $query->row()->email,
								APPNAMES.'_session_admin_mode' => $mode,
								APPNAMES.'_session_admin_privileges' => $priv
							);
				$this->session->set_userdata($admindata);
				$datestring = "%Y-%m-%d %h:%i:%s";
				$time = time();
				$newdata = array(
	               'last_login_date' => mdate($datestring,$time),
	               'last_login_ip' => $this->input->ip_address()
	            );
				$condition = array('id' => $query->row()->id);
				$this->admin_model->update_details(ADMIN,$newdata,$condition);
				$adminid = $this->encrypt->encode($query->row()->id);
				$cookie = array(
				    'name'   => APPNAMES.'_admin_session',
				    'value'  => $adminid,
				    'expire' => 86400,
				    'secure' => FALSE
				);
				
				$this->input->set_cookie($cookie); 
			}
		}
	}
	
	/**
	|
	|	This function send the new password to admin email
	|
	**/
	public function send_admin_pwd($pwd='',$query){
		$newsid='1';
		$template_values=$this->admin_model->get_newsletter_template_details($newsid);
		$subject = 'From: '.$this->config->item('email_title')	.' - '.$template_values['news_subject'];
		$adminnewstemplateArr=array('email_title'=> $this->config->item('email_title'),'logo'=> $this->data['logo']);
		extract($adminnewstemplateArr);
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>'.$template_values['news_subject'].'</title>
			<body>';
		include('./mailtemplate/template'.$newsid.'.php');	
		
		$message .= '</body>
			</html>';
		if($template_values['sender_name']=='' && $template_values['sender_email']==''){
			$sender_email=$this->config->item('site_contact_mail');
			$sender_name=$this->config->item('site_title');
		}else{
			$sender_name=$template_values['sender_name'];
			$sender_email=$template_values['sender_email'];
		}
		
		$email_values = array('mail_type'=>'html',
							'from_mail_id'=>$sender_email,
							'mail_name'=>$sender_name,
							'to_mail_id'=>$query->row()->email,
							'subject_message'=>'Password Reset',
							'body_messages'=>$message
							);
		$email_send_to_common = $this->admin_model->common_email_send($email_values);
	}
		
	/**
	|
	|	This function loads the admin profile form
	|
	**/
	public function admin_profile_settings_form(){
		if ($this->checkLogin('A') == ''){
			redirect(ADMIN_PATH);
		}else {
			if ($this->checkPrivileges('admin','2') == TRUE){
				$mode = $this->data['adminType'];
				$admin_id=$this->checkLogin('A');
				$this->data['profile']=$this->admin_model->get_admin_profile($mode,$admin_id);
				$this->data['mode'] = $mode;
				$this->data['heading'] = 'Admin Profile';
				$this->load->view(ADMIN_PATH.'/settings/profile_settings',$this->data);
			}else {
				redirect(ADMIN_PATH);
			}
		}
	}
	
	/**
	|
	|	This function validate the edit admin profile form
	|	If details are correct then update the admin details
	|
	**/
	public function edit_admin_profile(){
		if ($this->checkLogin('A')!=''){
			$email = $this->input->post('email');
			$admin_name = $this->input->post('admin_name');
			$mode = $this->data['adminType'];
			$id=$this->checkLogin('A');
			$condition = array('id' => $id);
			$query = $this->admin_model->get_all_details($mode,$condition);
			if ($query->num_rows() == 1){				
				$chknameExist = $this->admin_model->check_admin_exist('admin_name',$admin_name,$mode,$id);
				if($chknameExist){
					$this->setErrorMessage('error','This name already exist');
					redirect(ADMIN_PATH.'/login/admin_profile_settings_form');
				}	
				$chkemailExist = $this->admin_model->check_admin_exist('email',$email,$mode,$id);
				if($chknameExist){
					$this->setErrorMessage('error','This email already exist');
					redirect(ADMIN_PATH.'/login/admin_profile_settings_form');
				}
				
				$dataArr = array('email' => $email,'admin_name'=>$admin_name);
				$profiledata = array(APPNAMES.'_session_admin_email' => $email,APPNAMES.'_session_admin_name' => $admin_name);
				if($_FILES['profile_image']['size']>0){
					$config['encrypt_name'] = TRUE;
					$config['overwrite'] = FALSE;
					$config['allowed_types'] = 'jpg|jpeg|gif|png';
					$config['max_size'] = 2000;
					$config['upload_path'] = './images/profile';
					$this->load->library('upload', $config);
					if ( $this->upload->do_upload('profile_image')){
						$profileDetails = $this->upload->data();
						$dataArr['admin_image'] = $profileDetails['file_name'];
						$profiledata[APPNAMES.'_session_admin_image'] = $profileDetails['file_name'];
					}else{
						$profileDetails = $this->upload->display_errors();
						$this->setErrorMessage('error',strip_tags($profileDetails));
						redirect(ADMIN_PATH.'/login/admin_profile_settings_form');
					}
				}
				
				$this->admin_model->update_details($mode,$dataArr,$condition);
				if($mode===ADMIN){					
					$this->admin_model->saveAdminSettings();
				}
				$this->session->set_userdata($profiledata);
				$this->setErrorMessage('success','Profile has been updated successfully');
			}else {
				$this->setErrorMessage('error','Cannot update your profile');
			}
			redirect(ADMIN_PATH.'/login/admin_profile_settings_form');
		}else{
			redirect(ADMIN_PATH);
		}
	}
	
	/**
	|
	|	This function validate the change password form
	|	If details are correct then change the admin password
	|
	**/
	public function change_admin_password(){
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('new_password', 'New Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Retype Password', 'required');
		if ($this->form_validation->run() === FALSE){
			$this->setErrorMessage('error','Fields are required');
			redirect(ADMIN_PATH.'/login/admin_profile_settings_form');
		}else {
			$pwd = md5($this->input->post('password'));
			$mode = $this->data['adminType'];
			$id=$this->checkLogin('A');
			$condition = array('id' => $id, 'admin_password' => $pwd);
			$query = $this->admin_model->get_all_details($mode,$condition);
			if ($query->num_rows() == 1){
				$new_pwd = $this->input->post('new_password');
				$newdata = array('admin_password' => md5($new_pwd));
				$condition = array('id' => $id);
				$this->admin_model->update_details($mode,$newdata,$condition);  				
				$this->setErrorMessage('success','Password changed successfully');
			}else {
				$this->setErrorMessage('error','Invalid current password');
			}
			redirect(ADMIN_PATH.'/login/admin_profile_settings_form');
		}
	}
	
}

/* End of file login.php */
/* Location: ./application/controllers/admin/login.php */