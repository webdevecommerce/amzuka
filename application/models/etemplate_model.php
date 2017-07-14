<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| This model contains all db functions related to email template management
| @author J2V
|
**/
 
class Etemplate_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_newsletter_details($table='',$data=''){
		$query =  $this->db->get_where($table,$data);
		return $result = $query->result_array();
	}
}