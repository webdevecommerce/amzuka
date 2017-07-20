<div class="navbar-main-menu-outer hidden-xs">
				<div class="container">
					<dl class="navbar-main-menu">
						<dt class="item"><a href="<?php echo base_url(); ?>" class="btn-main"><span class="icon icon-xl flaticon-home113"></span></a></dt>
						<dd></dd>
						<?php  //echo '<pre>';print_r($rootCategories->result());die; ?> 
						<?php
						foreach($rootCategories->result() as $cat) { ?>
						<dt class="item"><a href="#" class="btn-main line"><?php echo $cat->name;?></a></dt>
						<dd class="item-content">
						<div class="megamenuClose">
						</div>
						<div class="navbar-main-submenu">
							<div class="wrapper-border">
								<div class="row">
									<!-- caregories -->
									<div class="col-sm-12 col-md-9">
										<div class="row">
										<?php foreach($subCategories->result() as $subcat) {
											if($cat->id == $subcat->rootID) {?>
												<div class="col-xs-6 col-md-4 col-lg-3">
													<div class="submenu-block">
													<span class="icon"><!--<img src="<?=base_url()?>images/icon-category1.png" alt=""> --></span><a class="name" href="<?php echo base_url(); ?><?php echo $cat->url_title; ?>/<?php echo $subcat->url_title;?>"><?php echo $subcat->name;?></a>
													</div>
												</div>
										<?php }
										}?>
										</div>
									</div>
								
									<!-- //end caregories -->
									<!-- html block -->
									<div class="col-md-3 hidden-sm hidden-xs">
										<div class="img-fullheight">
											<img class="img-responsive" src="<?=base_url()?>images/menu-img-right-2.png" alt="">
										</div>
									</div>
									<!-- //end html block -->
								</div>
							</div>
						</div>
						</dd>
						<?php } ?>
					</dl>
				</div>
			</div>