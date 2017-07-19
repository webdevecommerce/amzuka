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
		</div>
		<?php 

		$this->load->view('site/header.php');?>
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
			<a href="index.html">home</a><span class="divider">&nbsp;</span><a href="#">women</a>
		</div>
		</section>
		<!-- //end Breadcrumbs -->
		<!-- Two columns content -->
		<section class="container">
		<div class="row">
			<!-- Right column -->
			<section class="col-sm-8 col-md-9 col-lg-10 content-center">
			<div class="category-slider slick-style5">
				<div class="carousel-item">
					<img src="<?=base_url()?>images/category-banner3.jpg" alt="">
				</div>
				<div class="carousel-item">
					<img src="<?=base_url()?>images/category-banner4.jpg" alt="">
				</div>
			</div>
			<div class="divider divider-lg">
			</div>
			<h1>Women</h1>
			<!-- Description -->
			<p>
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, laoreet sit amet, nunc. Ut sit amet turpis. In est arcu, sollicitudin eu, vehicula venenatis, tempor vitae, est. Praesent vitae dui. Morbi id tellus. Aenean dapibus, pede ac blandit tincidunt, ante nisi viverra libero, sit amet iaculis nisi tortor non orci. Ut in nibh. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed in velit et lacus ullamcorper imperdiet.
			</p>
			<!-- //end Description -->
			<div class="divider-sm">
			</div>
			<!-- Categories -->
			<div class="row">
				<div class="col-xs-6 col-sm-3">
					<div class="category">
						<a href="listing.html"><img src="<?=base_url()?>images/products/category-img-01.jpg" alt=""></a>
						<h4><a href="listing.html">Suits & Blazers</a></h4>
					</div>
				</div>
				<div class="col-xs-6 col-sm-3">
					<div class="category">
						<a href="listing.html"><img src="<?=base_url()?>images/products/category-img-02.jpg" alt=""></a>
						<h4><a href="listing.html">T-Shirts & Vests</a></h4>
					</div>
				</div>
				<div class="col-xs-6 col-sm-3">
					<div class="category">
						<a href="listing.html"><img src="<?=base_url()?>images/products/category-img-03.jpg" alt=""></a>
						<h4><a href="listing.html">Underwear & Socks</a></h4>
					</div>
				</div>
				<div class="col-xs-6 col-sm-3">
					<div class="category">
						<a href="listing.html"><img src="<?=base_url()?>images/products/category-img-04.jpg" alt=""></a>
						<h4><a href="listing.html">Jackets & Coats</a></h4>
					</div>
				</div>
			</div>
			<!-- //end Categories -->
			<div class="divider-sm">
			</div>
			</section>
			<!-- //end Right column -->
			<!-- Left column -->
			<aside class="col-sm-4 col-md-3 col-lg-2 content-aside">
			<div class="panel-group accordion-simple">
				<div class="panel">
					<div class="panel-heading">
						<a data-toggle="collapse" href="#box1"><span class="arrow-down">+</span><span class="arrow-up">-</span> CATEGORY </a>
					</div>
					<div id="box1" class="panel-collapse in">
						<div class="panel-body">
							<ul class="simple-list">
								<li><a href="listing.html">Suits & Blazers (15)</a></li>
								<li><a href="listing.html">T-Shirts & Vests (15)</a></li>
								<li><a href="listing.html">Underwear & Socks (15)</a></li>
								<li><a href="listing.html">Jackets & Coats (15)</a></li>
							</ul>
						</div>
					</div>
				</div>
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
				<div class="panel">
					<div class="panel-heading">
						<a data-toggle="collapse" class="collapsed" href="#box3"><span class="arrow-down">+</span><span class="arrow-up">-</span> POPULAR TAGS</a>
					</div>
					<div id="box3" class="panel-collapse collapse">
						<div class="panel-body">
							<!-- Popular tags -->
							<div class="cloud-tags">
								<a href="listing.html" style="font-size: 0.92em">Camera</a><a href="listing.html" style="font-size: 1.31em">Coats</a><a href="listing.html" style="font-size: 1.15em">Jackets</a><a href="listing.html" style="font-size: 1.15em">Jeans</a><a href="listing.html" style="font-size: 1.15em">Lingerie</a><a href="listing.html" style="font-size: 1.15em">Shirts</a><a href="listing.html" style="font-size: 1.15em">Shorts</a><a href="listing.html" style="font-size: 1.15em">Skirts</a><a href="listing.html" style="font-size: 1.23em">Tops</a><a href="listing.html" style="font-size: 0.77em">Apple</a><a href="listing.html" style="font-size: 1.08em">Awesome</a><a href="listing.html" style="font-size: 0.92em">Cool t-shirt</a><a href="listing.html" style="font-size: 0.92em">Dresses</a><a href="listing.html" style="font-size: 0.92em">Good laptop</a><a href="listing.html" style="font-size: 0.92em">Mobile</a><a href="listing.html" style="font-size: 0.92em">Nice notebook</a><a href="listing.html" style="font-size: 1.12em">Phone</a>
							</div>
							<!-- //end Popular tags -->
						</div>
					</div>
				</div>
				<div class="panel">
					<div class="panel-heading">
						<a data-toggle="collapse" class="collapsed" href="#box22"><span class="arrow-down">+</span><span class="arrow-up">-</span> PRICE SELECT</a>
					</div>
					<div id="box22" class="panel-collapse collapse">
						<div class="panel-body">
							<ul class="simple-list">
								<li>							<input name="checkbox-price-1" type="checkbox" value="">
							<span class="label">$0.00 - $10,000.00 (13)</span></li>
							<li>
							<input name="checkbox-price-2" type="checkbox" value="">

<span class="label">$10,000.00 - $20,000.00 (2)</span></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="panel">
					<div class="panel-heading">
						<a data-toggle="collapse" class="collapsed" href="#box4"><span class="arrow-down">+</span><span class="arrow-up">-</span> COMPARE PRODUCTS </a>
					</div>
					<div id="box4" class="panel-collapse collapse">
						<div class="panel-body">
							<p>
								You have no items to compare.
							</p>
						</div>
					</div>
				</div>
				<div class="panel">
					<div class="panel-heading">
						<a data-toggle="collapse" class="collapsed" href="#box5"><span class="arrow-down">+</span><span class="arrow-up">-</span> COMMUNITY POLL</a>
					</div>
					<div id="box5" class="panel-collapse collapse">
						<div class="panel-body">
							<form >
								<p>
									<strong>WHAT IS YOUR FAVORITE MAGENTO FEATURE?</strong>
								</p>
								<div class="radio">
									<label>
									<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
									Layered Navigation </label>
								</div>
								<div class="radio">
									<label>
									<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
									Price Rules </label>
								</div>
								<div class="radio">
									<label>
									<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
									Category Management </label>
								</div>
								<div class="radio">
									<label>
									<input type="radio" name="optionsRadios" id="optionsRadios4" value="option4">
									Compare Products </label>
								</div>
								<button class="btn btn-cool">Vote</button>
							</form>
						</div>
					</div>
				</div>
				<div class="panel">
					<div class="panel-heading">
						<a data-toggle="collapse" class="collapsed" href="#box23"><span class="arrow-down">+</span><span class="arrow-up">-</span> BESTSELLERS </a>
					</div>
					<div id="box23" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="products-widget vertical">
								<div class="slides slick-style2">
									<div class="carousel-item">
										<div class="product">
											<div class="preview-image-outer">
												<a href="product.html" class="preview-image"><img class="img-responsive" src="<?=base_url()?>images/products/product-02.jpg" alt=""></a>
											</div>
											<p class="name">
												<a href="product.html">Product Example</a>
											</p>
											<span class="price new">$214.99</span><span class="price old">$214.99</span>
											<div class="rating">
												<i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i>
											</div>
										</div>
									</div>
									<div class="carousel-item">
										<div class="product">
											<div class="preview-image-outer">
												<a href="product.html" class="preview-image"><img class="img-responsive" src="<?=base_url()?>images/products/product-01.jpg" alt=""></a>
											</div>
											<p class="name">
												<a href="product.html">Product Example</a>
											</p>
											<span class="price new">$214.99</span><span class="price old">$214.99</span>
											<div class="rating">
												<i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i>
											</div>
										</div>
									</div>
									<div class="carousel-item">
										<div class="product">
											<div class="preview-image-outer">
												<a href="product.html" class="preview-image"><img class="img-responsive" src="<?=base_url()?>images/products/product-03.jpg" alt=""></a>
											</div>
											<p class="name">
												<a href="product.html">Product Example</a>
											</p>
											<span class="price new">$214.99</span><span class="price old">$214.99</span>
											<div class="rating">
												<i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i>
											</div>
										</div>
									</div>
									<div class="carousel-item">
										<div class="product">
											<div class="preview-image-outer">
												<a href="product.html" class="preview-image"><img class="img-responsive" src="<?=base_url()?>images/products/product-04.jpg" alt=""></a>
											</div>
											<p class="name">
												<a href="product.html">Product Example</a>
											</p>
											<span class="price new">$214.99</span><span class="price old">$214.99</span>
											<div class="rating">
												<i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i>
											</div>
										</div>
									</div>
									<div class="carousel-item">
										<div class="product">
											<div class="preview-image-outer">
												<a href="product.html" class="preview-image"><img class="img-responsive" src="<?=base_url()?>images/products/product-05.jpg" alt=""></a>
											</div>
											<p class="name">
												<a href="product.html">Product Example</a>
											</p>
											<span class="price new">$214.99</span><span class="price old">$214.99</span>
											<div class="rating">
												<i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i>
											</div>
										</div>
									</div>
									<div class="carousel-item">
										<div class="product">
											<div class="preview-image-outer">
												<a href="product.html" class="preview-image"><img class="img-responsive" src="<?=base_url()?>images/products/product-06.jpg" alt=""></a>
											</div>
											<p class="name">
												<a href="product.html">Product Example</a>
											</p>
											<span class="price new">$214.99</span><span class="price old">$214.99</span>
											<div class="rating">
												<i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i><i class="icon flaticon-star129 icon-xs"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
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
</body>
</html>