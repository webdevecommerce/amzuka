<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| This model contains all db functions related to Product management
| @author J2V
|
**/

class Product_model extends MY_Model{
	public function __construct() {
		parent::__construct();
	}
	
	
 
/* Added by sunil*/
 public function getProductDetails($cat_id){
		$this->db->select('*');
    $this->db->from('product');
		$this->db->where("FIND_IN_SET( '$cat_id' , category_id) ");
		$query = $this->db->get();
		return $query;
 }

}
