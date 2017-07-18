<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| 	This model contains all common database related functions
| 	@author J2V
|
**/

class MY_Model extends CI_Model {
	/**
	|
	|	This function connect the database and load the functions from CI_Model
	|
	**/
	public function __construct(){
		parent::__construct();
	}
	/**
	|
	|	Simple function for inserting data into a table
	| 	@param String $table
	| 	@param Array $data
	|
	**/
	public function simple_insert($table='',$data=''){
		return $this->db->insert($table,$data);
	}
	
	/**
	| 
	| 	This function update the table contents based on param
	| 	@param String $table
	| 	@param Array $data
	| 	@param Array $condition
	|
	**/
	public function update_details($table='',$data='',$condition=''){
		$this->db->where($condition);
		$this->db->update($table,$data);
	}
	
	/**
	| 
	| 	This function do the delete operation
	| 	@param String $table
	| 	@param Array $condition
	|
	**/
	public function commonDelete($table='',$condition=''){
		$this->db->delete($table,$condition);
	}
	
	
	/**
	| 
	| 	This function do all insert and edit operations
	| 	@param String $table
	| 	@param String $mode
	| 	@param Array $excludeArr
	| 	@param Array $dataArr
	| 	@param Array $condition
	|
	**/
	public function commonInsertUpdate($table='',$mode='',$excludeArr='',$dataArr='',$condition=''){
		$inputArr = array();
		foreach ($this->input->post() as $key => $val){
			if (!in_array($key, $excludeArr)){
				$inputArr[$key] = $val;
			}
		}
		$finalArr = array_merge($inputArr,$dataArr);
		if ($mode == 'insert'){
			return $this->db->insert($table,$finalArr);
		}else if ($mode == 'update'){
			if(!empty($finalArr)){
				$this->db->where($condition);
				return $this->db->update($table,$finalArr);
			}
		}
	}
	
	/**
	| 
	| 	This function returns the table contents based on data
	| 	@param String $table
	| 	@param Array $condition
	| 	@param Array $sortArr
	|
	**/
	public function get_all_details($table='',$condition='',$sortArr='',$limitOffset=''){
		if ($sortArr != '' && is_array($sortArr)){
			foreach ($sortArr as $sortRow){
				if (is_array($sortRow)){
					$this->db->order_by($sortRow['field'],$sortRow['type']);
				}
			}
		}
		if ($sortArr != '' && is_array($sortArr)){
			$offset = 0; if(array_key_exists('offset',$limitOffset)) $offset = $limitOffset['offset'];
			$limit = 0; if(array_key_exists('limit',$limitOffset))  $limit = $limitOffset['limit'];
			$this->db->limit($limit, $offset);
		}
		return $this->db->get_where($table,$condition);
	}	
	
	
	/**
	| 
	| 	This function returns the selected fields
	| 	@param String $table
	| 	@param Array $condition
	| 	@param Array $sortArr
	|
	**/
	public function get_selected_fields($table='',$selectArray= array(),$condition='',$sortArr='',$limitOffset=''){
		if ($sortArr != '' && is_array($sortArr)){
			foreach ($sortArr as $sortRow){
				if (is_array($sortRow)){
					$this->db->order_by($sortRow['field'],$sortRow['type']);
				}
			}
		}
		if ($sortArr != '' && is_array($sortArr)){
			$offset = 0; if(array_key_exists('offset',$limitOffset)) $offset = $limitOffset['offset'];
			$limit = 0; if(array_key_exists('limit',$limitOffset))  $limit = $limitOffset['limit'];
			$this->db->limit($limit, $offset);
		}
		if(!empty($selectArray)){
			$this->db->select($selectArray);
		}
		return $this->db->get_where($table,$condition);
	}
	
	/**
	| 
	| 	For getting last insert id
	|
	**/
	public function get_last_insert_id(){
		return $this->db->insert_id();
	}
	
	/**
    |
    | 	This function return the session value based on param
    | 	@param String $type
	|
    **/
    public function checkLogin($type=''){
    	if ($type == 'A'){
    		return $this->session->userdata(APPNAMES.'_session_admin_id');
    	}else if ($type == 'P'){
    		return $this->session->userdata(APPNAMES.'_session_admin_privileges');
    	}else if ($type == 'U'){
    		return $this->session->userdata(APPNAMES.'_session_user_id');
    	}else if ($type == 'T'){
    		return $this->session->userdata(APPNAMES.'_session_temp_id');			
    	}
    }
	
	/**
    |
    | 	This function return the admin settings details
	|
    **/
	public function getAdminSettings(){
		$this->db->select('*');
		$this->db->from(ADMIN);
		$this->db->join(ADMIN_SETTINGS,ADMIN_SETTINGS.'.id = '.ADMIN.'.id','left');		
		$this->db->where(ADMIN_SETTINGS.'.id','1');
		$result = $this->db->get();
		unset($result->row()->admin_password);
		return $result;
	}
	
	/**
  |
  | 	Common function for executing mysql query
	|		@param String $Query
	|
  **/
	public function ExecuteQuery($Query){
		return $this->db->query($Query); 
	}	
	
	/**
	|
	| 	Get Email templates details
	| 	@param Interger $template_id
	|
	**/
	public function get_email_template_details($template_id = '') {
		$condition = array('id'=>$template_id);
		$res =  $this->db->get_where(E_TEMPLATE,$condition);
		return $res->row();
	}
	
	/**
	|
	| 	Generate random string
	| 	@param Interger $length
	|
	**/
	public function get_rand_str($length = '5') {
		return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	}
	
	/**
  |
  | 	Email Sending Function
	|
  **/
	public function common_email_send($eamil_vaues = array()){
		if (is_file('settings/smtp_settings.php')){
			include('smtp_settings.php');
		}
		// Set SMTP Configuration
		if($config['smtp_user'] != '' && $config['smtp_pass'] != ''){
			$emailConfig = array(
				'protocol' => 'smtp',
				'smtp_host' => $config['smtp_host'],
				'smtp_port' => $config['smtp_port'],
				'smtp_user' => $config['smtp_user'],
				'smtp_pass' => $config['smtp_pass'],
				'auth' => true
			);
		}
		// Set your email information
		$from = array('email' => $eamil_vaues['from_mail_id'],'name' => $eamil_vaues['mail_name']);
		$to = $eamil_vaues['to_mail_id'];
		$subject = $eamil_vaues['subject_message'];
		$message = stripslashes($eamil_vaues['body_messages']);
		#echo $message; die;
		// Load CodeIgniter Email library
		if($config['smtp_user'] != '' && $config['smtp_pass'] != ''){			
			$this->load->library('email', $emailConfig);
		}else {
			$this->load->library('email');
		}
		//Sometimes you have to set the new line character for better result			
		$this->email->set_newline("\r\n");
		//Set email preferences
		$this->email->set_mailtype($eamil_vaues['mail_type']);
		$this->email->from($from['email'],$from['name']);
		$this->email->to($to);
		if($eamil_vaues['cc_mail_id'] != ''){
			$this->email->cc($eamil_vaues['cc_mail_id']); 
		}
		if($eamil_vaues['bcc_mail_id'] != ''){
			$this->email->bcc($eamil_vaues['bcc_mail_id']); 
		}

		$this->email->subject($subject);
		$this->email->message($message);
		//Ready to send email and check whether the email was successfully sent
			
		if (!$this->email->send()){
			// Raise error message
			//show_error($this->email->print_debugger());
			$this->load->library('email');
			$this->email->set_newline("\r\n");
			// Set email preferences
			$this->email->set_mailtype($eamil_vaues['mail_type']);
			$this->email->from($from['email'],$from['name']);
			$this->email->to($to);				
			if($eamil_vaues['cc_mail_id'] != ''){
				$this->email->cc($eamil_vaues['cc_mail_id']); 
			}	
			if($eamil_vaues['bcc_mail_id'] != ''){
				$this->email->bcc($eamil_vaues['bcc_mail_id']); 
			}				 
			$this->email->subject($subject);
			$this->email->message($message);
			$this->email->send();
		}else{
			#echo 'Success to send email';
			return 1;
		}
	}
}


?>