<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
| 
| This model contains all db functions related to Promo Code management
| @author J2V
|
**/

class Promocodes_model extends MY_Model{
	public function __construct() {
		parent::__construct();
	}
	
	public function get_random_promo_code() {
		$code_cc = $this->get_rand_str(10);
		$codeChk = $this->get_all_details(PROMOCODES,array('promo_code'=>$code_cc));
		while($codeChk->num_rows()>0){
			$code_cc = $this->get_rand_str(10);
			$codeChk = $this->get_all_details(PROMOCODES,array('promo_code'=>$code_cc));
		}
		return $code_cc;
	}
}