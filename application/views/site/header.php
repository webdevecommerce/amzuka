<div id="newsLine">
			<div class="container">
				<div class="row">
					<div class="col-sm-3 col-md-2 hidden-xs">
						<div class="title upper">
							<i class="icon flaticon-news"></i>News
						</div>
					</div>
					<div class="col-xs-5 col-sm-6 col-md-7 col-xs-push-1 col-sm-push-0">
						<div id="newsCarousel" class="slick-style1">
							<div class="item upper">
								<div class="marquee">
									<span class="date">10.10.2015.</span> Fusce eu dui. Integer vel nibh sit amet turpis vulputate aliquet. Phasellus id nisi vitae odio pretium aliquam.
								</div>
							</div>
							<div class="item upper">
								<div class="marquee">
									<span class="date">14.10.2015.</span> Fusce eu dui. Integer vel nibh sit amet turpis vulputate aliquet. Phasellus id nisi vitae odio pretium aliquam.
								</div>
							</div>
							<div class="item upper">
								<div class="marquee">
									<span class="date">20.10.2015.</span> Fusce eu dui. Integer vel nibh sit amet turpis vulputate aliquet. Phasellu id nisi vitae odio pretium aliquam.
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-5 col-sm-3 col-md-2 top-link pull-right">
						<div class="btn-outer btn-search">
							<a href="#" class="btn btn-xs btn-default" data-toggle="dropdown"><span class="icon icon-lg flaticon-zoom45"></span></a>
						</div>
						<div class="btn-outer btn-shopping-cart">
							<a href="#drop-shopcart" class="btn btn-xs btn-default open-cart" data-toggle="dropdown"><span class="icon icon-md flaticon-shopping66"></span><span class="badge cart-count"><?php echo $cart_count; ?></span></a>
							<div class="hidden">
								<div id="drop-shopcart" class="shoppingcart-box">
									<div class="title">
										Shopping cart
									</div>
									<div class=" hidden" id="liTemplate">
										<div class="item animate-delay fadeInRight">
											<div class="image">
											</div>
											<div class="description">
												<span class="product-name"></span><strong class="price"></strong>
											</div>
											<div class="buttons">
												<a href="#" class="icon icon-sm flaticon-write13"></a><a href="#" class="icon icon-sm flaticon-recycle59 remove-from-cart"></a>
											</div>
										</div>
									</div>
									<div class="list animate-delay-outer">
										
									</div>
									<div class="total">
										Total: <strong>$44.95</strong>
									</div>
									<div class="empty">
										Shopping cart is empty
									</div>
									<a href="checkout.html" class="btn btn-cool">Proceed to Checkout</a>
									<div class="view-link">
										<a href="shopping-cart.html">View shopping cart </a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Back to top -->
		<div class="back-to-top">
			<span class="arrow-up"><img src="<?=base_url()?>images/icon-scroll-arrow.png" alt=""></span><img src="<?=base_url()?>images/icon-scroll-mouse.png" alt="">
		</div>
		<!-- //end Back to top -->
		<section class="navbar">
		<div class="background">
			<div class="container">
				<div class="row">
					<div class="header-left col-sm-5 col-md-8">
						<div class="row">
							<div class="navbar-welcome col-md-6 compact-hidden hidden-sm hidden-xs">
								Default welcome msg!
							</div>
							<!-- Mobile menu Button-->
							<div class="col-xs-2 visible-xs">
								<div class="expand-nav compact-hidden">
									<a href="#off-canvas-menu" id="off-canvas-menu-toggle"><span class="icon icon-xl flaticon-menu29"></span></a>
								</div>
							</div>
							<!-- //end Mobile menu Button -->
							<!-- Logo -->
							<div class="navbar-logo col-xs-10 col-sm-10 col-md-6 text-center">
								<a href="index.html"><img src="<?=base_url()?>images/logo.png" alt="Coolbaby"></a>
							</div>
							<!-- //end Logo -->
							<div class="clearfix visible-xs">
							</div>
							<!-- Secondary menu -->
							<div class="top-link pull-right compact-visible">
								<div class="btn-outer btn-shopping-cart">
									<a href="#product-cart-count" class="btn btn-xs btn-default open-cart" data-toggle="dropdown"><span class="icon icon-md flaticon-shopping66"></span><span class="badge cart-count"><?php echo $cart_count; ?></span></a>
								</div>
							</div>
						</div>
					</div>
					<div class="navbar-secondary-menu col-sm-7 col-md-4 compact-hidden">
						<div class="btn-group">
							<a href="#" title="Account" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown"><span class="icon icon-lg flaticon-business137"></span><span class="drop-title">Account</span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Account</a></li>
								<li><a href="#">Wishlist</a></li>
								<li><a href="#">Checkout</a></li>
								<li class="divider"></li>
								<li><a href="page-logination.html">Log In</a></li>
								<li><a href="page-logination.html">Sign Up</a></li>
							</ul>
						</div>
						<div class="btn-group">
							<a href="#" title="Language" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown"><span class="icon icon-md flaticon-oval33"></span><span class="drop-title">Language</span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#"><span class="icon-flag icon-flag-en">&nbsp;</span> English</a></li>
								<li><a href="#"><span class="icon-flag icon-flag-de">&nbsp;</span> German</a></li>
								<li><a href="#"><span class="icon-flag icon-flag-fr">&nbsp;</span> French</a></li>
								<li><a href="#"><span class="icon-flag icon-flag-da">&nbsp;</span> Danish</a></li>
								<li><a href="#"><span class="icon-flag icon-flag-el">&nbsp;</span> Greek</a></li>
								<li><a href="#"><span class="icon-flag icon-flag-es">&nbsp;</span> Spanish</a></li>
								<li><a href="#"><span class="icon-flag icon-flag-it">&nbsp;</span> Italian</a></li>
								<li><a href="#"><span class="icon-flag icon-flag-nl">&nbsp;</span> Dutch</a></li>
								<li><a href="#"><span class="icon-flag icon-flag-pl">&nbsp;</span> Polish</a></li>
								<li><a href="#"><span class="icon-flag icon-flag-pt">&nbsp;</span> Portuguese</a></li>
								<li><a href="#"><span class="icon-flag icon-flag-ru">&nbsp;</span> Russian</a></li>
								<li><a href="#"><span class="icon-flag icon-flag-sv">&nbsp;</span> Swedish</a></li>
							</ul>
						</div>
						<div class="btn-group">
							<a href="#" title="Currency" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown"><span class="icon">$</span><span class="drop-title">Currency</span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">($) US Dollars</a></li>
								<li><a href="#">(€) Euro</a></li>
								<li><a href="#">(&pound;) British Pounds</a></li>
							</ul>
						</div>
						<div class="btn-group">
							<a href="#" title="Compare" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown"><span class="icon icon-lg flaticon-bars34"></span><span class="drop-title">Compare</span></a>
							<div class="dropdown-menu shoppingcart-box empty" role="menu">
								 No items to compare
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Main menu -->
			<?php $this->load->view('site/main_menu.php');?>
			<!-- //end Main menu -->
		</div>
		</section>