<?php 

if(!function_exists('count_non_user_cart_proudcts')){
	function count_non_user_cart_proudcts(){
		$addedProducts = $_COOKIE['amzuka_carted_products'];
		$product_count = count(explode(",",$addedProducts)) + 1;
		return $product_count;
	}
}

?>