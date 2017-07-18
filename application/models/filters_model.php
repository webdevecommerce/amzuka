<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| This model contains all db functions related to Category management
| @author J2V
|
**/

class Filters_model extends MY_Model{
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

}