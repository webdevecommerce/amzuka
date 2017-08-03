<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| This model contains all db functions related to Category management
| @author J2V
|
**/

class Categories_model extends MY_Model{
	public function __construct() {
		parent::__construct();
	}
	
	public function get_all_product_filters(){
		$query = " SELECT 	f.id as filter_id,f.filter_name,GROUP_CONCAT(fv.value) as filter_values from ".FILTERS." f INNER JOIN ".FILTERVALUES." fv ON f.id = fv.filter_id  GROUP BY f.filter_name";
		return $this->db->query($query);
	}
	
	// Main listing page query selector
	public function get_product_details(){
		$query = "SELECT p.product_name,p.price,p.product_seo,p.quantity,p.id,p.image,p.sale_price, GROUP_CONCAT(pfv.available_filters) as size_id, GROUP_CONCAT(fv.value) as size_value, GROUP_CONCAT(pfv.size_stock) as size_stock from product p LEFT JOIN product_filter_values pfv on ( pfv.filter_id = ".$this->config->item('filter_id_size')." and p.id = pfv.product_id ) LEFT JOIN filter_values fv on pfv.available_filters = fv.id group by p.id";
		//." LEFT JOIN filter_values fv ON pfv.filter_id = fv.filter_id";
		return $this->db->query($query);
	}

}