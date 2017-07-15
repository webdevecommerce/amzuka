<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| This model contains all db functions related to admin management
| @author J2V
|
**/

class Admin_model extends MY_Model{
	public function __construct(){
		parent::__construct();
	}
	
	public function add_edit_subadmin($dataArr='',$condition=''){
		if ($condition['id'] != ''){
			$this->db->where($condition);
			$this->db->update(ADMIN,$dataArr);
		}else {
			$this->db->insert(ADMIN,$dataArr);
		}
	}
	
	public function get_admin_profile($mode='',$admin_id=''){
		$this->db->select('id,admin_name,email,admin_image');
		$this->db->from($mode);	
		$this->db->where('id',$admin_id);
		$result = $this->db->get();
		return $result;
	}
	
	public function check_admin_exist($col='',$value='',$mode='',$admin_id=''){
		$exist=FALSE;
		
		$this->db->select('admin_name,email');
		$this->db->from(ADMIN);	
		if($mode===ADMIN){
			$this->db->where('id !=',$admin_id);
		}
		if($col=='email'){
				$this->db->where('email',$value);
		}
		if($col=='admin_name'){
				$this->db->where('admin_name',$value);
		}
		$admincheck = $this->db->get();
		if($admincheck->num_rows()>0){
			$exist=TRUE;
		}
		
		$this->db->select('admin_name,email');
		$this->db->from(SUBADMIN);	
		if($mode===SUBADMIN){
			$this->db->where('id !=',$admin_id);
		}
		if($col=='email'){
				$this->db->where('email',$value);
		}
		if($col=='admin_name'){
				$this->db->where('admin_name',$value);
		}
		$subadmincheck = $this->db->get();
		if($subadmincheck->num_rows()>0){
			$exist=TRUE;
		}
		return $exist;
	}
	
	/**
  |
	|	This function save the admin details and site settings into a file
	|
	**/
   public function saveAdminSettings(){
		$getAdminSettingsDetails = $this->getAdminSettings();
		$config = '<?php ';
		foreach($getAdminSettingsDetails->row() as $key => $val){
			$value = addslashes($val);
			$config .= "\n\$config['$key'] = '$value'; ";
		}
		$config .= "\n\$config['base_url'] = '".base_url()."'; ";
		$config .= ' ?>';
		$file = 'settings/admin_settings.php';
		file_put_contents($file, $config);
   }
}