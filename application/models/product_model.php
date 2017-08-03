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
 
 
 
	public function insert_product_filters($filters = array(), $product_id = '', $staticFilters = '',$sizeStock = array()){
		 if(!empty($filters)){
			 
			 if(!empty($sizeStock)){
					$insertion_query  = 'INSERT INTO '.PRODUCT_FILTERS.' (`product_id`, `filter_id`, `available_filters`,	`size_stock`) VALUES';
			 }else{
					$insertion_query  = 'INSERT INTO '.PRODUCT_FILTERS.' (`product_id`, `filter_id`, `available_filters`) VALUES';
			 }
			 
			  $first = true;
				$c = 0;
				foreach( $filters as $key => $val ){
					if(!$first){
						$insertion_query .= ", ";
					}
					if($staticFilters != ''){
							if($staticFilters == 'color'){
								$key = $this->config->item('filter_id_color');
							}else{
								$key = $this->config->item('filter_id_size');
							}
					}
					if(!empty($sizeStock) && $staticFilters = 'size'){
						$insertion_query .= "(  '".$product_id."', '". $key."', '".$val."', '".$sizeStock[$c]."' )";
					}else{
						$insertion_query .= "(  '".$product_id."', '". $key."', '".$val."' )";
					}
					$first = false;
					$c++;
				}
				
				$insertion_query .= ";";
				$this->db->query($insertion_query);
				
		}
	}


	public function insertSizeStock(){
		
	 if(!empty($filters)){
			 $insertion_query  = 'INSERT INTO '.PRODUCT_FILTERS.' (`product_id`, `filter_id`, `available_filters`) VALUES';
			 $first = true;
				foreach( $filters as $key => $val ){
					if(!$first){
						$insertion_query .= ", ";
					}
					if($staticFilters != ''){
							if($staticFilters == 'color'){
								$key = $this->config->item('filter_id_size');
							}else{
								$key = $this->config->item('filter_id_color');
							}
					}
					$insertion_query .= "(  '".$product_id."', '". $key."', '".$val."' )";
					$first = false;
				}
				$insertion_query .= ";";
				$this->db->query($insertion_query);
				
		}
	}
 
 
	public function get_product_filter_values($product_id = ''){
			
	}

}
