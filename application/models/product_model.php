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
	
	
	
 public function insert_product_filters($filters = array(), $product_id = ''){
	 
	 if(!empty($filters)){
		 $insertion_query  = 'INSERT INTO '.PRODUCT_FILTERS.' (`product_id`, `filter_id`, `available_filters`) VALUES';
		 $first = true;
			foreach( $filters as $key => $val ){
				if(!$first){
					$insertion_query .= ", ";
				}
				$insertion_query .= "(  '".$product_id."', '". $key."', '".$val."' )";
				$first = false;
			}
			$insertion_query .= ";";
			$this->db->query($insertion_query);
			
	 }
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