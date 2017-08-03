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
<title>Coolbaby template</title>
<link rel="shortcut icon" href="favicon.ico">
<!-- Bootstrap core CSS -->
<link href="<?=base_url()?>css/site/bootstrap.css" rel="stylesheet">
<!-- CSS modules -->
<link rel="stylesheet" href="<?=base_url()?>fonts/flaticon/flaticon.css">
<link rel="stylesheet" href="<?=base_url()?>css/site/slick.css"/>
<link rel="stylesheet" href="<?=base_url()?>css/site/liMarquee.css">
<link rel="stylesheet" href="<?=base_url()?>css/site/colorbox.css">
<link rel="stylesheet" href="<?=base_url()?>css/site/magnific-popup.css">
<link rel="stylesheet" href="<?=base_url()?>css/site/jquery.nouislider.css">
<link rel="stylesheet" href="<?=base_url()?>css/site/cloudzoom.css">


<!-- Custom styles for this template -->
<link href="<?=base_url()?>css/site/coolbaby.css" rel="stylesheet">
</head>
<body class="responsive">
<?php #$product = $productArr->result(); ?>
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
<!-- Off Canvas Menu -->

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
		</div>
		<?php $this->load->view('site/header.php'); ?>
		
		<!-- Navbar height -->
		<div class="navbar-height">
		</div>
		<!-- //end Navbar height -->
		</header>
		<!-- //end Navbar -->
		<!-- Services -->
		<section class="services-block hidden-xs">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-lg-4">
					<a href="index.html" class="item anim-icon"><span class="icon"><img src="<?=base_url()?>images/anim-icon-1.gif" data-hover="<?=base_url()?>images/anim-icon-1-hover.gif" alt=""/></span><span class="title">Free shipping on orders over $200</span></a>
				</div>
				<div class="col-xs-12 col-sm-4 col-lg-4">
					<a href="index.html" class="item anim-icon"><span class="icon"><img src="<?=base_url()?>images/anim-icon-2.gif" data-hover="<?=base_url()?>images/anim-icon-2-hover.gif" alt=""/></span><span class="title">30-day returns</span></a>
				</div>
				<div class="col-xs-12 col-sm-4 col-lg-4">
					<a href="index.html" class="item anim-icon"><span class="icon"><img src="<?=base_url()?>images/anim-icon-3.gif" data-hover="<?=base_url()?>images/anim-icon-3-hover.gif" alt=""/></span><span class="title">24/7 Support </span></a>
				</div>
			</div>
		</div>
		</section>
		<!-- //end Services -->
		<!-- Breadcrumbs-->
		<section class="breadcrumbs">
		<div class="container">
			<a href="index.html">home</a><span class="divider">&nbsp;</span><a href="#">women</a><span class="divider">&nbsp;</span>Hilfiger Denim Martina Bomber Jacket
		</div>
		</section>
		<!-- //end Breadcrumbs -->
		<section class="container product-view">
		<div class="product-images-cell">
			<div class="single-carousel-outer">
				<div id="hover-left">
				</div>
				<div id="hover-right">
				</div>
				<div class="single-product-carousel slick-style4">
					<div class="carousel-item">
						<img class="cloudzoom" src="<?php echo base_url().'images/products/390x525/'.$product->row()->image; ?>" data-cloudzoom="zoomImage: '<?php echo base_url().'images/products/800x1077/'.$product->row()->image; ?>', autoInside : 991, zoomSizeMode: 'image'" alt=""/>
					</div>
					<div class="carousel-item">
						<img class="cloudzoom" src="<?php echo base_url().'images/products/390x525/'.$product->row()->image; ?>" data-cloudzoom="zoomImage: '<?php echo base_url().'images/products/800x1077/'.$product->row()->image; ?>', autoInside : 991, zoomSizeMode: 'image'" alt=""/>
					</div>
					<div class="carousel-item">
						<img class="cloudzoom" src="<?php echo base_url().'images/products/390x525/'.$product->row()->image; ?>" data-cloudzoom="zoomImage: '<?php echo base_url().'images/products/800x1077/'.$product->row()->image; ?>', autoInside : 991, zoomSizeMode: 'image'" alt=""/>
					</div>
					<div class="carousel-item">
						<img class="cloudzoom" src="<?php echo base_url().'images/products/390x525/'.$product->row()->image; ?>" data-cloudzoom="zoomImage: '<?php echo base_url().'images/products/800x1077/'.$product->row()->image; ?>', autoInside : 991, zoomSizeMode: 'image'" alt=""/>
					</div>
					<div class="carousel-item">
						<img class="cloudzoom" src="<?php echo base_url().'images/products/390x525/'.$product->row()->image; ?>" data-cloudzoom="zoomImage: '<?php echo base_url().'images/products/800x1077/'.$product->row()->image; ?>', autoInside : 991, zoomSizeMode: 'image'" alt=""/>
					</div>
					<div class="carousel-item">
						<img class="cloudzoom" src="<?php echo base_url().'images/products/390x525/'.$product->row()->image; ?>" data-cloudzoom="zoomImage: '<?php echo base_url().'images/products/800x1077/'.$product->row()->image; ?>', autoInside : 991, zoomSizeMode: 'image'" alt=""/>
					</div>
				</div>
			</div>
			<div class="slider-nav-outer">
				<div class="wrapper">
					<div class="slider-nav">
						<div class="carousel-item">
							<img src="<?php echo base_url().'images/products/390x525/'.$product->row()->image; ?>" alt="">
						</div>
						<div class="carousel-item">
							<img src="<?=base_url()?>images/products/productpage-img2.jpg" alt="">
						</div>
						<div class="carousel-item">
							<img src="<?=base_url()?>images/products/productpage-img3.jpg" alt="">
						</div>
						<div class="carousel-item">
							<img src="<?=base_url()?>images/products/productpage-img1.jpg" alt="">
						</div>
						<div class="carousel-item">
							<img src="<?=base_url()?>images/products/productpage-img2.jpg" alt="">
						</div>
						<div class="carousel-item">
							<img src="<?=base_url()?>images/products/productpage-img3.jpg" alt="">
						</div>
					</div>
					<div class="video-link">
						<a href="http://www.youtube.com/watch?v=t_zhV1JeF9U" class="video-popup"><span class="img-outer"><img src="<?=base_url()?>images/products/product-video.jpg" alt=""></span></a>
					</div>
				</div>
			</div>
		</div>
		
		<div class="product-info-cell">
			<h2><?php echo $product->row()->product_name; ?></h2>
			<span class="price old">$<?php echo $product->row()->sale_price; ?></span><span class="price new">$<?php echo $product->row()->price; ?></span>
			<div class="rating">
				<i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i>
			</div>
			<p>
				<span><strong>In Stock</strong></span><span style="color:<?php if($product->row()->quantity >0){ echo "green"; }else{ echo "red"; } ?>"> <?php echo $product->row()->quantity; ?></span>
			</p>
			<div class="line-divider">
			</div>
			<div class="divider divider-sm">
			</div>
			<form action="#">
				<div class="product-options">
					<?php foreach($sizeArr->result() as $size){ if($size->size_stock > 0) {  ?>
						<i class="icon icon-size"><?php echo $size->value; ?></i>
					<?php }else{ ?>
						<i class="disable icon icon-size" style="color:#e4dddd;"><?php echo $size->value; ?></i>
					<?php }} ?>
					<!-- <i class="disable icon icon-size">S</i><i class="icon icon-size">M</i><i class="disable icon icon-size">L</i><i class="disable icon icon-size">XL</i><i class="disable icon icon-size">XXL</i> -->
				</div>
				<div class="product-options">
					<?php foreach($colorArr->result() as $color){  ?>
						<i class="icon icon-color" style="background:<?php echo $color->value; ?>"></i>
					<?php } ?>
					<!-- <i class="icon icon-color icon-color-pink"></i><i class="icon icon-color icon-color-white"></i><i class="icon icon-color icon-color-grey"></i><i class="icon icon-color icon-color-marine"></i> -->
				</div>
				<div class="form-inputs">
					<label>Qty:</label>
					<input type="text" class="form-control input-quantity" value="1">
					<button class="btn btn-cool btn-lg" type="submit"><i class="icon flaticon-shopping66"></i>ADD TO CART</button>
				</div>
			</form>
			<div class="divider divider-sm">
			</div>
			<div class="panel-group accordion-simple" id="product-accordion">
				<div class="panel">
					<div class="panel-heading">
						<a data-toggle="collapse" data-parent="#product-accordion" href="#product-description" class="collapsed"><span class="arrow-down">+</span><span class="arrow-up">-</span> Description </a>
					</div>
					<div id="product-description" class="panel-collapse collapse">
						<div class="panel-body">
							 <?php echo $product->row()->description; ?>
						</div>
					</div>
				</div>
				<div class="panel">
					<div class="panel-heading">
						<a data-toggle="collapse" data-parent="#product-accordion" href="#product-size" class="collapsed"><span class="arrow-down">+</span><span class="arrow-up">-</span> Size & Fit </a>
					</div>
					<div id="product-size" class="panel-collapse collapse">
						<div class="panel-body">
							 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						</div>
					</div>
				</div>
				<div class="panel">
					<div class="panel-heading">
						<a data-toggle="collapse" data-parent="#product-accordion" href="#product-with" class="collapsed"><span class="arrow-down">+</span><span class="arrow-up">-</span> Shown With </a>
					</div>
					<div id="product-with" class="panel-collapse collapse">
						<div class="panel-body">
							 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						</div>
					</div>
				</div>
				<div class="panel">
					<div class="panel-heading">
						<a data-toggle="collapse" data-parent="#product-accordion" href="#product-shipping" class="collapsed"><span class="arrow-down">+</span><span class="arrow-up">-</span> Shipping &amp; Returns </a>
					</div>
					<div id="product-shipping" class="panel-collapse collapse">
						<div class="panel-body">
							 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						</div>
					</div>
				</div>
			</div>
			<div class="divider divider-xs">
			</div>
			<div class="social-buttons">
				<span class="pull-left">Share:&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<ul class="socials">
					<li><a href="#"><span class="icon flaticon-facebook12"></span></a></li>
					<li><a href="#"><span class="icon flaticon-twitter20"></span></a></li>
					<li><a href="#"><span class="icon flaticon-google10"></span></a></li>
					<li><a href="#"><span class="icon flaticon-pinterest9"></span></a></li>
				</ul>
			</div>
			<div class="clearfix">
			</div>
		</div>
		</section>
		<!-- New Products -->
		<section class="container content slider-products">
		<div class="dotted-line right-space">
		</div>
		<!-- Products list -->
		<div class="pull-left vertical_title_outer right-space">
			<div>
				<span>New Products</span>
			</div>
		</div>
		<div class="pull-left carousel_outer">
			<div class="product-carousel">
				<div class="carousel-item">
					<div class="product-preview">
						<div class="preview">
							<div class="preview-image-outer">
								<a href="product.html" class="preview-image"><img class="img-responsive img-default" src="<?=base_url()?>images/products/product-01.jpg" alt=""><img class="img-responsive img-second" src="<?=base_url()?>images/products/product-02.jpg" alt=""></a>
							</div>
							<a href="_ajax_view-product.html" class="quick-view"><span>Quick View</span></a>
						</div>
						<h3 class="title"><a href="product.html">Product Example</a></h3>
						<div class="product-options">
							<i class="icon icon-color icon-color-pink"></i><i class="icon icon-color icon-color-white"></i><i class="icon icon-color icon-color-grey"></i><i class="icon icon-color icon-color-marine"></i>
						</div>
						<span class="price new">$214.99</span><span class="price old">$214.99</span>
						<ul class="product-controls-list">
							<li><a href="#"><span class="icon flaticon-bars34"></span></a></li>
							<li><a href="#"><span class="icon flaticon-heart68"></span></a></li>
							<li><a href="#drop-shopcart" class='add-to-cart open-cart'><span class="icon flaticon-shopping66"></span></a></li>
						</ul>
						<div class="rating">
							<i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="product-preview">
						<div class="preview">
							<div class="label label-sale">
								<span>Sale</span>
							</div>
							<div class="label label-sale-percent">
								<span>-25%</span>
							</div>
							<div class="label label-new">
								<span>New</span>
							</div>
							<div class="preview-image-outer">
								<a href="product.html" class="preview-image"><img class="img-responsive img-default" src="<?=base_url()?>images/products/product-02.jpg" alt=""><img class="img-responsive img-second" src="<?=base_url()?>images/products/product-02.jpg" alt=""></a>
							</div>
							<a href="_ajax_view-product.html" class="quick-view"><span>Quick View</span></a>
						</div>
						<h3 class="title"><a href="product.html">Product Example</a></h3>
						<span class="price new">$214.99</span><span class="price old">$214.99</span>
						<ul class="product-controls-list">
							<li><a href="#"><span class="icon flaticon-bars34"></span></a></li>
							<li><a href="#"><span class="icon flaticon-heart68"></span></a></li>
							<li><a href="#drop-shopcart" class='add-to-cart open-cart'><span class="icon flaticon-shopping66"></span></a></li>
						</ul>
						<div class="rating">
							<i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="product-preview">
						<div class="preview">
							<div class="preview-image-outer">
								<a href="product.html" class="preview-image"><img class="img-responsive img-default" src="<?=base_url()?>images/products/product-03.jpg" alt=""><img class="img-responsive img-second" src="<?=base_url()?>images/products/product-02.jpg" alt=""></a>
							</div>
							<a href="_ajax_view-product.html" class="quick-view"><span>Quick View</span></a>
						</div>
						<div class="countdown_box">
							<div class="countdown_inner">
								<div class="title">
									special price valid:
								</div>
								<div id="countdown1">
								</div>
							</div>
						</div>
						<h3 class="title"><a href="product.html">Product Example</a></h3>
						<span class="price new">$214.99</span><span class="price old">$214.99</span>
						<ul class="product-controls-list">
							<li><a href="#"><span class="icon flaticon-bars34"></span></a></li>
							<li><a href="#"><span class="icon flaticon-heart68"></span></a></li>
							<li><a href="#drop-shopcart" class='add-to-cart open-cart'><span class="icon flaticon-shopping66"></span></a></li>
						</ul>
						<div class="rating">
							<i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="product-preview">
						<div class="preview">
							<div class="preview-image-outer">
								<a href="product.html" class="preview-image"><img class="img-responsive img-default" src="<?=base_url()?>images/products/product-04.jpg" alt=""><img class="img-responsive img-second" src="<?=base_url()?>images/products/product-02.jpg" alt=""></a>
							</div>
							<a href="_ajax_view-product.html" class="quick-view"><span>Quick View</span></a>
						</div>
						<h3 class="title"><a href="product.html">Product Example</a></h3>
						<span class="price new">$214.99</span><span class="price old">$214.99</span>
						<ul class="product-controls-list">
							<li><a href="#"><span class="icon flaticon-bars34"></span></a></li>
							<li><a href="#"><span class="icon flaticon-heart68"></span></a></li>
							<li><a href="#drop-shopcart" class='add-to-cart open-cart'><span class="icon flaticon-shopping66"></span></a></li>
						</ul>
						<div class="rating">
							<i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="product-preview">
						<div class="preview">
							<div class="preview-image-outer">
								<a href="product.html" class="preview-image"><img class="img-responsive img-default" src="<?=base_url()?>images/products/product-05.jpg" alt=""><img class="img-responsive img-second" src="<?=base_url()?>images/products/product-02.jpg" alt=""></a>
							</div>
							<a href="_ajax_view-product.html" class="quick-view"><span>Quick View</span></a>
						</div>
						<h3 class="title"><a href="product.html">Product Example</a></h3>
						<span class="price new">$214.99</span><span class="price old">$214.99</span>
						<ul class="product-controls-list">
							<li><a href="#"><span class="icon flaticon-bars34"></span></a></li>
							<li><a href="#"><span class="icon flaticon-heart68"></span></a></li>
							<li><a href="#drop-shopcart" class='add-to-cart open-cart'><span class="icon flaticon-shopping66"></span></a></li>
						</ul>
						<div class="rating">
							<i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="product-preview">
						<div class="preview">
							<div class="preview-image-outer">
								<a href="product.html" class="preview-image"><img class="img-responsive img-default" src="<?=base_url()?>images/products/product-06.jpg" alt=""><img class="img-responsive img-second" src="<?=base_url()?>images/products/product-02.jpg" alt=""></a>
							</div>
							<a href="_ajax_view-product.html" class="quick-view"><span>Quick View</span></a>
						</div>
						<h3 class="title"><a href="product.html">Product Example</a></h3>
						<span class="price new">$214.99</span><span class="price old">$214.99</span>
						<ul class="product-controls-list">
							<li><a href="#"><span class="icon flaticon-bars34"></span></a></li>
							<li><a href="#"><span class="icon flaticon-heart68"></span></a></li>
							<li><a href="#drop-shopcart" class='add-to-cart open-cart'><span class="icon flaticon-shopping66"></span></a></li>
						</ul>
						<div class="rating">
							<i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="product-preview">
						<div class="preview">
							<div class="preview-image-outer">
								<a href="product.html" class="preview-image"><img class="img-responsive img-default" src="<?=base_url()?>images/products/product-01.jpg" alt=""><img class="img-responsive img-second" src="<?=base_url()?>images/products/product-02.jpg" alt=""></a>
							</div>
							<a href="_ajax_view-product.html" class="quick-view"><span>Quick View</span></a>
						</div>
						<h3 class="title"><a href="product.html">Product Example</a></h3>
						<span class="price new">$214.99</span><span class="price old">$214.99</span>
						<ul class="product-controls-list">
							<li><a href="#"><span class="icon flaticon-bars34"></span></a></li>
							<li><a href="#"><span class="icon flaticon-heart68"></span></a></li>
							<li><a href="#drop-shopcart" class='add-to-cart open-cart'><span class="icon flaticon-shopping66"></span></a></li>
						</ul>
						<div class="rating">
							<i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="product-preview">
						<div class="preview">
							<div class="preview-image-outer">
								<a href="product.html" class="preview-image"><img class="img-responsive img-default" src="<?=base_url()?>images/products/product-02.jpg" alt=""><img class="img-responsive img-second" src="<?=base_url()?>images/products/product-02.jpg" alt=""></a>
							</div>
							<a href="_ajax_view-product.html" class="quick-view"><span>Quick View</span></a>
						</div>
						<h3 class="title"><a href="product.html">Product Example</a></h3>
						<span class="price new">$214.99</span><span class="price old">$214.99</span>
						<ul class="product-controls-list">
							<li><a href="#"><span class="icon flaticon-bars34"></span></a></li>
							<li><a href="#"><span class="icon flaticon-heart68"></span></a></li>
							<li><a href="#drop-shopcart" class='add-to-cart open-cart'><span class="icon flaticon-shopping66"></span></a></li>
						</ul>
						<div class="rating">
							<i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="product-preview">
						<div class="preview">
							<div class="preview-image-outer">
								<a href="product.html" class="preview-image"><img class="img-responsive img-default" src="<?=base_url()?>images/products/product-03.jpg" alt=""><img class="img-responsive img-second" src="<?=base_url()?>images/products/product-02.jpg" alt=""></a>
							</div>
							<a href="_ajax_view-product.html" class="quick-view"><span>Quick View</span></a>
						</div>
						<h3 class="title"><a href="product.html">Product Example</a></h3>
						<span class="price new">$214.99</span><span class="price old">$214.99</span>
						<ul class="product-controls-list">
							<li><a href="#"><span class="icon flaticon-bars34"></span></a></li>
							<li><a href="#"><span class="icon flaticon-heart68"></span></a></li>
							<li><a href="#drop-shopcart" class='add-to-cart open-cart'><span class="icon flaticon-shopping66"></span></a></li>
						</ul>
						<div class="rating">
							<i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="product-preview">
						<div class="preview">
							<div class="preview-image-outer">
								<a href="product.html" class="preview-image"><img class="img-responsive img-default" src="<?=base_url()?>images/products/product-04.jpg" alt=""><img class="img-responsive img-second" src="<?=base_url()?>images/products/product-02.jpg" alt=""></a>
							</div>
							<a href="_ajax_view-product.html" class="quick-view"><span>Quick View</span></a>
						</div>
						<h3 class="title"><a href="product.html">Product Example</a></h3>
						<span class="price new">$214.99</span><span class="price old">$214.99</span>
						<ul class="product-controls-list">
							<li><a href="#"><span class="icon flaticon-bars34"></span></a></li>
							<li><a href="#"><span class="icon flaticon-heart68"></span></a></li>
							<li><a href="#drop-shopcart" class='add-to-cart open-cart'><span class="icon flaticon-shopping66"></span></a></li>
						</ul>
						<div class="rating">
							<i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="product-preview">
						<div class="preview">
							<div class="preview-image-outer">
								<a href="product.html" class="preview-image"><img class="img-responsive img-default" src="<?=base_url()?>images/products/product-05.jpg" alt=""><img class="img-responsive img-second" src="<?=base_url()?>images/products/product-02.jpg" alt=""></a>
							</div>
							<a href="_ajax_view-product.html" class="quick-view"><span>Quick View</span></a>
						</div>
						<h3 class="title"><a href="product.html">Product Example</a></h3>
						<span class="price new">$214.99</span><span class="price old">$214.99</span>
						<ul class="product-controls-list">
							<li><a href="#"><span class="icon flaticon-bars34"></span></a></li>
							<li><a href="#"><span class="icon flaticon-heart68"></span></a></li>
							<li><a href="#drop-shopcart" class='add-to-cart open-cart'><span class="icon flaticon-shopping66"></span></a></li>
						</ul>
						<div class="rating">
							<i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="product-preview">
						<div class="preview">
							<div class="preview-image-outer">
								<a href="product.html" class="preview-image"><img class="img-responsive img-default" src="<?=base_url()?>images/products/product-06.jpg" alt=""><img class="img-responsive img-second" src="<?=base_url()?>images/products/product-02.jpg" alt=""></a>
							</div>
							<a href="_ajax_view-product.html" class="quick-view"><span>Quick View</span></a>
						</div>
						<h3 class="title"><a href="product.html">Product Example</a></h3>
						<span class="price new">$214.99</span><span class="price old">$214.99</span>
						<ul class="product-controls-list">
							<li><a href="#"><span class="icon flaticon-bars34"></span></a></li>
							<li><a href="#"><span class="icon flaticon-heart68"></span></a></li>
							<li><a href="#drop-shopcart" class='add-to-cart open-cart'><span class="icon flaticon-shopping66"></span></a></li>
						</ul>
						<div class="rating">
							<i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i>
						</div>
					</div>
				</div>
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
		</div>
		<!-- //end Products list -->
		<div class="clearfix">
		</div>
		</section>
		<!-- //end New Products -->
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
		<?php $this->load->view('site/footer.php'); ?>
		<div id="outer-overlay">
		</div>
		<!-- //end Footer -->
	</div>
</div>
<!--[if lt IE 9]>
    <script src="<?=base_url()?>js/html5shiv.js"></script>
    <script src="<?=base_url()?>js/respond.min.js"></script>
<![endif]-->
<script src="<?=base_url()?>js/site/jquery-1.11.3.min.js"></script>
<script src="<?=base_url()?>js/site/modernizr.custom.02163.js"></script>
<script src="<?=base_url()?>js/site/jquery.finger.min.js"></script>
<script src="<?=base_url()?>js/site/doubletaptogo.js"></script>
<script src="<?=base_url()?>js/site/bootstrap.min.js"></script>
<script src="<?=base_url()?>js/site/jquery.easing.1.3.min.js"></script>
<script src="<?=base_url()?>js/site/slick.min.js"></script>
<script src="<?=base_url()?>js/site/jquery.parallax.min.js"></script>
<script src="<?=base_url()?>js/site/jquery.inview.min.js"></script>
<script src="<?=base_url()?>js/site/jquery.liMarquee.min.js"></script>
<script src="<?=base_url()?>js/site/jquery.colorbox-min.js"></script>
<script src="<?=base_url()?>js/site/jquery.magnific-popup.min.js"></script>
<script src="<?=base_url()?>js/site/jquery.isotope.min.js"></script>
<script src="<?=base_url()?>js/site/jquery.plugin.min.js"></script>
<script src="<?=base_url()?>js/site/jquery.countdown.min.js"></script>
<script src="<?=base_url()?>js/site/cloudzoom.js"></script>
<script src="<?=base_url()?>js/site/coolbaby.js"></script>
</body>
</html>