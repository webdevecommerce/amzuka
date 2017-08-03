<?php 

//echo $addedProducts = $_COOKIE['amzuka_carted_products']; die;
#echo count_non_user_cart_proudcts(); die; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo $heading; ?></title>
<link rel="shortcut icon" href="favicon.ico">
<!-- Bootstrap core CSS -->
<link href="<?=base_url()?>css/site/bootstrap.css" rel="stylesheet">
<!-- CSS modules -->
<link rel="stylesheet" href="<?=base_url()?>fonts/flaticon/flaticon.css">
<link rel="stylesheet" href="<?=base_url()?>css/site/slick.css"/>
<link rel="stylesheet" href="<?=base_url()?>css/site/liMarquee.css">
<link rel="stylesheet" href="<?=base_url()?>css/site/colorbox.css">
<link rel="stylesheet" href="<?=base_url()?>css/site/jquery.nouislider.css">
<!-- Custom styles for this template -->
<link href="<?=base_url()?>css/site/coolbaby.css" rel="stylesheet">
</head>
<body class="responsive">
<div class="loader">
	<div class="fond">
		<div class="contener_general">
			<div class="contener_mixte">
				<div class="ballcolor ball_1">
					 &nbsp;
				</div>
			</div>
			<div class="contener_mixte">
				<div class="ballcolor ball_2">
					 &nbsp;
				</div>
			</div>
			<div class="contener_mixte">
				<div class="ballcolor ball_3">
					 &nbsp;
				</div>
			</div>
			<div class="contener_mixte">
				<div class="ballcolor ball_4">
					 &nbsp;
				</div>
			</div>
		</div>
	</div>
</div>

<!-- //end Off Canvas Menu -->
<div id="outer">
	<div id="outer-canvas">
		<!-- Navbar -->
		<header>
		<!-- Search -->
		<div id="openSearch">
			<div class="container">
				<div class="inside">
					<form id="searchHeader" method="get" action="#">
						<div class="input-outer">
							<input type="text" class="search-input" value="SEARCH..." onblur="if (this.value == '') {this.value = 'SEARCH...';}" onfocus="if(this.value == 'SEARCH...') {this.value = '';}">
						</div>
						<div class="button-outer">
							<button type="button" class="pull-right search-close"><i class="icon">&#10005;</i></button>
							<button type="submit" class="pull-right"><i class="icon icon-xl flaticon-zoom45"></i></button>
						</div>
					</form>
				</div>
			</div>
		</div >
		<?php 

		$this->load->view('site/header.php');?>
		<!-- Navbar height -->
		<div class="navbar-height">
		</div>
		<!-- //end Navbar height -->
		</header
		<!-- //end Navbar -->
	<!-- Services -->
	<section class="services-block hidden-xs">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-lg-4">
				<a href="index.html" class="item anim-icon"><span class="icon"><img src="<?php echo base_url(); ?>images/anim-icon-1.gif" data-hover="<?php echo base_url(); ?>images/anim-icon-1-hover.gif" alt=""/></span><span class="title">Free shipping on orders over $200</span></a>
			</div>
			<div class="col-xs-12 col-sm-4 col-lg-4">
				<a href="index.html" class="item anim-icon"><span class="icon"><img src="<?php echo base_url(); ?>images/anim-icon-2.gif" data-hover="<?php echo base_url(); ?>images/anim-icon-2-hover.gif" alt=""/></span><span class="title">30-day returns</span></a>
			</div>
			<div class="col-xs-12 col-sm-4 col-lg-4">
				<a href="index.html" class="item anim-icon"><span class="icon"><img src="<?php echo base_url(); ?>images/anim-icon-3.gif" data-hover="<?php echo base_url(); ?>images/anim-icon-3-hover.gif" alt=""/></span><span class="title">24/7 Support </span></a>
			</div>
		</div>
	</div>
	</section>
	<!-- //end Services -->
	<!-- Breadcrumbs-->
	<section class="breadcrumbs">
	<div class="container">
		<a href="index.html">home</a><span class="divider">&nbsp;</span><a href="#"><?=$heading?></a>
	</div>
	</section>
	<!-- //end Breadcrumbs -->
	<!-- Two columns content -->
	<section class="container">
	<div class="row">
		<!-- Right column -->
		<section class="col-sm-8 col-md-9 col-lg-10 content-center">
		<h1><?php echo $heading; ?></h1>
	
		<!-- //end Description -->
		<!-- Filters -->
		<div class="filters-panel">
			<div class="row">
				<div class="col-sm-3 col-md-3 col-lg-4 hidden-xs">
					<div class="view-mode">
						<a href="#" class="view-grid active icon flaticon-tiles"></a><a href="#" class="view-list icon flaticon-menu29"></a>
					</div>
				</div>
				<div class="col-sm-3 col-md-3 col-lg-4 hidden-xs">
					 Show
					<div class="btn-group btn-select perpage-select">
						<a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="value">15</span><span class="caret min"></span></a><a href="#" class="icon flaticon-left33 sort-icon sort-icon-up"></a><a href="#" class="icon flaticon-left33 sort-icon sort-icon-down"></a>
						<ul class="dropdown-menu">
							<li><a href="#">30</a></li>
							<li><a href="#">50</a></li>
							<li><a href="#">100</a></li>
							<li><a href="#">All</a></li>
						</ul>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
					<div class="pagination pull-right text-right">
						<a href="#" class="icon flaticon-left33 pagination-prev"></a><a href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#" class="icon flaticon-play45 pagination-next"></a>
					</div>
				</div>
			</div>
		</div>
		<!-- //end Filters -->
		<!-- Listing products -->
		
		<div class="products-list">
		<?php foreach($product_details->result() as $product) { ?>
			<div class="product-preview-outer">
				<div class="product-preview">
					<div class="preview">
						<div class="preview-image-outer">
							<a href="<?php echo base_url().'view/'.$product->product_seo; ?>" class="preview-image"><img class="img-responsive img-default" src="<?php echo base_url(); ?>images/products/170x220/<?php echo $product->image; ?>" alt=""><img class="img-responsive img-second" src="<?php echo base_url(); ?>images/products/170x220/<?php echo $product->image; ?>" alt=""></a>
						</div>
						<a href="_ajax_view-product.html" class="quick-view"><span>Quick View</span></a>
					</div>
					<h3 class="title"><a href="<?php echo base_url().'view/'.$product->product_seo; ?>"><?php echo $product->product_name; ?></a></h3>
						
					<span class="price new product_price"><?php echo $product->price; ?></span>
					<?php if($product->price > $product->sale_price && $produc->sale_price > 0) : ?>
					<span class="price old"><?php echo $product->price; ?></span>
					<?php endif; ?>
					<div class="product-controls-list">
					<?php 
						$k = 0;
						$sizeStock = explode(",",$product->size_stock);
						$sizeValue = explode(",",$product->size_value);
						$sizeId = explode(",",$product->size_id);
						foreach($sizeValue as $size){ 
								if($sizeStock[$k] > 0) {  ?>
										<i class="icon icon-size active_product_size" data-size-id = "<?php echo $sizeId[$k]; ?>"><?php echo $size; ?></i>
								<?php }else{ ?>
											<i class="disable icon icon-size" style="color:#e4dddd;"><?php echo $size; ?></i>
								<?php 
								}
							  $k++;
							} 
					?>
					<input type="hidden" name="product_selected_sizes" class="product_selected_sizes" value="">
					<!-- <i class="disable icon icon-size">S</i><i class="icon icon-size">M</i><i class="disable icon icon-size">L</i><i class="disable icon icon-size">XL</i><i class="disable icon icon-size">XXL</i> -->
				</div>
					<ul class="product-controls-list">
						<li><a href="#"><span class="icon flaticon-heart68"></span></a></li>
						<?php if($product->quantity > 0 ) { ?>
						<li><a href="#drop-shopcart" class='add-to-cart open-cart' data-product-id="<?php echo $product->id; ?>"><span class="icon flaticon-shopping66"></span></a></li>
						<?php } ?>
					</ul>
					
					<div class="rating">
						<i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i>
					</div>
					<?php if($product->quantity <= 0 ) { ?>
					<div class="out_of_stock">
						<p class="out_of_stock_text"> Out of stock</p>
					</div>
					<?php } ?>
				</div>
			</div>
		<?php }	?>
			
			<!--
-->
		</div>
		<!-- product view ajax container -->
		<div class="product-view-ajax-container">
		</div>
		<!-- //end product view ajax container -->
		<!-- Product view compact -->
		<div class="product-view-ajax">
			<div class="layar">
			</div>
			<div class="product-view-container">
			</div>
		</div>
		<!-- //end Product view compact -->
		<!-- //end Listing products -->
		<!-- Filters -->
		<div class="filters-panel">
			<div class="row">
				<div class="col-sm-3 col-md-3 col-lg-4 hidden-xs">
					<div class="view-mode">
						<a href="#" class="view-grid active"><img src="<?php echo base_url(); ?>images/icon-grid.png" alt=""></a><a href="#" class="view-list"><img src="<?php echo base_url(); ?>images/icon-list.png" alt=""></a>
					</div>
				</div>
				<div class="col-sm-3 col-md-3 col-lg-4 hidden-xs">
					 Show
					<div class="btn-group btn-select perpage-select">
						<a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="value">15</span><span class="caret min"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">30</a></li>
							<li><a href="#">50</a></li>
							<li><a href="#">100</a></li>
							<li><a href="#">All</a></li>
						</ul>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
					<div class="pagination pull-right text-right">
						<a href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a>
					</div>
				</div>
			</div>
		</div>
		<!-- //end Filters -->
		</section>
		<!-- //end Right column -->
		<!-- Left column -->
		<aside class="col-sm-4 col-md-3 col-lg-2 content-aside">
		<div class="panel-group accordion-simple">
			<div class="panel">
				<div class="panel-heading">
					<a data-toggle="collapse" href="#box2"><span class="arrow-down">+</span><span class="arrow-up">-</span> PRICE SLIDER</a>
				</div>
				<div id="box2" class="panel-collapse in">
					<div class="panel-body">
						<div class="slider-range">
							<div class="min">
								$<span id="value-lower">19</span>
							</div>
							<div class="max">
								$<span id="value-upper">3000</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel">
				<div class="panel-heading">
					<a data-toggle="collapse" href="#box21"><span class="arrow-down">+</span><span class="arrow-up">-</span> COLOR </a>
				</div>
				<div id="box21" class="panel-collapse in">
					<div class="panel-body">
						<ul class="simple-list">
							<li class="color black"><a href="listing.html">Black (9)</a></li>
							<li class="color brown"><a href="listing.html">Brown (2)</a></li>
							<li class="color white"><a href="listing.html">White (1)</a></li>
							<li class="color gray"><a href="listing.html">Gray (3)</a></li>
						</ul>
					</div>
				</div>
			</div>
			<?php $i = 0; foreach($filters->result_array() as $filter){?>
				<div class="panel">
					<div class="panel-heading">
						<a data-toggle="collapse" class="collapsed" href="#filter<?php echo $i; ?>"><span class="arrow-down">+</span><span class="arrow-up">-</span><?php echo $filter['filter_name']; ?></a>
					</div>
					<div id="filter<?=$i;?>" class="panel-collapse collapse">
						<div class="panel-body">
							<ul class="simple-list">
								<?php foreach(explode(",",$filter['filter_values']) as $filter_value){ ?>
										<?php if($filter['filter_id'] == 12){ ?>
													<li style="padding:0px !important">
													<span class="product-color-box" style="background:<?php echo $filter_value; ?>" data-color-id="<?php echo $filter_value; ?>"></span>
											<?php }else{ ?>
														<li>
														<input name="checkbox-price-1" type="checkbox" value="">
														<span class="label"><?php echo $filter_value; ?></span>
											<?php } ?>
										</li>
								<?php } ?>
								
							</ul>
						</div>
					</div>
				</div>
			<?php $i++; } ?>
		</div>
		</aside>
		<!-- //end Left column -->
	</div>
	</section>
	<!-- //end Two columns content -->
	<!-- Subscribe -->
	<section class="content container">
	<div class="subscribe">
		<div class="row collapsed-block">
			<div class="col-sm-12 col-md-3 col-lg-3">
				<h3>NEWSLETTER SIGNUP <a class="expander visible-sm visible-xs" href="#TabBlock-1">+</a></h3>
			</div>
			<div class="col-sm-12 col-md-9 col-lg-9 tabBlock" id="TabBlock-1">
				<form class="form-inline" >
					<div class="row">
						<div class="col-sm-5 col-md-5">
							<input type="text" class="form-control pull-right" value="Your E-mail..." onblur="if (this.value == '') {this.value = 'Your E-mail...';}" onfocus="if(this.value == 'Your E-mail...') {this.value = '';}">
							<div class="divider divider-sm visible-xs">
							</div>
						</div>
						<div class="col-sm-2 col-md-2">
							<button type="submit" class="button btn-cool"><span class="icon flaticon-new78"></span>subscribe</button>
							<div class="divider divider-sm visible-xs">
							</div>
						</div>
						<div class="col-sm-5 col-md-4">
							<p>
								Enter your email and we'll send you a coupon with 10% off your next order.
							</p>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	</section>
	<!-- //end Subscribe -->
	<!-- Footer -->
		<?php $this->load->view('site/footer.php');?>
		<div id="outer-overlay">
		</div>
		<!-- //end Footer -->
	</div>
</div>
<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
<![endif]-->
<script src="<?=base_url()?>js/site/jquery-1.11.3.min.js"></script>
<script src="<?=base_url()?>js/site/modernizr.custom.02163.js"></script>
<script src="<?=base_url()?>js/site/jquery.finger.min.js"></script>
<script src="<?=base_url()?>js/site/doubletaptogo.js"></script>
<script src="<?=base_url()?>js/site/bootstrap.min.js"></script>
<script src="<?=base_url()?>js/site/jquery.easing.1.3.min.js"></script>
<script src="<?=base_url()?>js/site/jquery.nouislider.all.min.js"></script>
<script src="<?=base_url()?>js/site/slick.min.js"></script>
<script src="<?=base_url()?>js/site/jquery.inview.min.js"></script>
<script src="<?=base_url()?>js/site/jquery.liMarquee.min.js"></script>
<script src="<?=base_url()?>js/site/jquery.colorbox-min.js"></script>
<script src="<?=base_url()?>js/site/jquery.isotope.min.js"></script>
<script src="<?=base_url()?>js/site/jquery.plugin.min.js"></script>
<script src="<?=base_url()?>js/site/jquery.countdown.min.js"></script>
<script src="<?=base_url()?>js/site/coolbaby.js"></script>

<script type="text/javascript">
	jQuery(document).ready(function($){
		
			var sizeArr = '';
				  
			$(".add-to-cart").on("click",function(){
					var product_id = $(this).attr('data-product-id');
					$.ajax({
						url: "<?php echo base_url(); ?>site/products/addProductsToCart",
						method: "POST",
						data: {"product_id": product_id},
						success:function(data){
							$(".cart-count").text(data);
							//count = "<?php echo count_non_user_cart_proudcts(); ?>";
							//alert(count);
						}
					});
			});
			 
			/* When selecting product size*/
				$(".active_product_size").click(function(){
					$(this).css("background","goldenrod");
					var productSelectedSize = $(this).closest("div.product-controls-list").find(".product_selected_sizes");
					sizeArr = productSelectedSize.val() +","+$(this).attr('data-size-id');
					productSelectedSize.val(sizeArr);
					console.dir(sizeArr);
				});
			
			/* When selecting product size --- Ends here*/
	});
</script>

<style>
.product-color-box{float:left;height:32px;width:32px;border:1px solid rgba(0, 0, 0, .2);margin:2px !important; cursor:pointer}
.icon.icon-size{line-height: 16px;width: auto;padding: 3px;}
</style>

</body>
</html>