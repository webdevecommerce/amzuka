<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| This model contains all db functions related to Product management
| @author J2V
|
**/

class Site_product_model extends MY_Model{
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_product_avail_colors($product_id = ''){
				$colorQuery = " SELECT	pf.filter_id,pf.product_id,pf.available_filters,pf.id,fv.value from ".PRODUCT_FILTERS." pf INNER JOIN ".FILTERVALUES.' fv ON pf.available_filters = fv.id WHERE pf.product_id = '.$this->data['product']->row()->id.' AND pf.filter_id = '.$this->config->item('filter_id_color') ; 
					
				return $this->db->query($colorQuery);
			
	}
	public function get_product_avail_size($product_id = ''){
			$sizeQuery = " SELECT	pf.filter_id,pf.product_id,pf.size_stock,pf.available_filters,pf.id,fv.value from ".PRODUCT_FILTERS." pf INNER JOIN ".FILTERVALUES.' fv ON pf.available_filters = fv.id WHERE pf.product_id = '.$this->data['product']->row()->id.' AND pf.filter_id = '.$this->config->item('filter_id_size');
			
			return $this->db->query($sizeQuery);
	}

}
