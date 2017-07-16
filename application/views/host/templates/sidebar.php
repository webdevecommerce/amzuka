<?php
$currentMgt=$this->uri->segment(2);
$currentPage=$this->uri->segment(3);
extract($privileges);
?>	

				<div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
						<?php
						if($LoggedAdminImage!=''){
							$profile_image=base_url().PROFILE_PATH.$LoggedAdminImage;
						}else{
							$profile_image=base_url().PROFILE_DEFAULT;
						}
						?>
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url().'images/logo/'.$logo; ?>" alt="Image" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome To</span>
                <h2><?php echo $WebsiteTitle;?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="<?php echo ADMIN_PATH; ?>/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
									<?php if((isset($users) && is_array($users)) || $allPrev==1){ ?>
									<li <?php if($currentMgt=='users'){ ?>class="active"<?php } ?>>
										<a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu <?php if($currentMgt=='users'){ ?>nav-open<?php } ?>">
											<?php if((in_array(0,$users)) || $allPrev==1){ ?>
                      <li <?php if($currentPage=='display_users' || $currentPage=='view_users'){ ?>class="current-page"<?php } ?>><a href="<?php echo ADMIN_PATH; ?>/users/display_users">Users List</a></li>
											<?php } ?>
											<?php if((in_array(1,$users)) || $allPrev==1){ ?>
                      <li <?php if($currentPage=='add_edit_user_form'){ ?>class="current-page"<?php } ?>><a href="<?php echo ADMIN_PATH; ?>/users/add_edit_user_form">Add New User</a></li>
											<?php } ?>
                    </ul>
                  </li>
									<?php } ?>
									<?php if((isset($categories) && is_array($categories)) || $allPrev==1){ ?>
									<li <?php if($currentMgt=='categories'){ ?>class="active"<?php } ?>>
										<a><i class="fa fa-cogs"></i> Categories <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu <?php if($currentMgt=='categories'){ ?>nav-open<?php } ?>">
											<?php if((in_array(0,$categories)) || $allPrev==1){ ?>
                      <li <?php if($currentPage=='display_categories' || $currentPage=='view_categories'){ ?>class="current-page"<?php } ?>><a href="<?php echo ADMIN_PATH; ?>/categories/display_categories">Categorise List</a></li>
											<?php } ?>
											<?php if((in_array(1,$categories)) || $allPrev==1){ ?>
                      <li <?php if($currentPage=='add_edit_categories_form'){ ?>class="current-page"<?php } ?>><a href="<?php echo ADMIN_PATH; ?>/categories/add_edit_categories_form">Add Category</a></li>
											<?php } ?>
                    </ul>
                  </li>
									<?php } ?>
									<?php if((isset($filters) && is_array($filters)) || $allPrev==1){ ?>
									<li <?php if($currentMgt=='filters'){ ?>class="active"<?php } ?>>
										<a><i class="fa fa-cogs"></i> Filters <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" <?php if($currentMgt=='filters'){ ?> style ="display: block;"<?php } ?>>
											<?php if((in_array($filters)) || $allPrev==1){ //echo $currentPage;die; ?>
                      <li <?php if($currentPage=='add_edit_filters_form' || $currentPage=='editFilter' || $currentPage=='addFilterValues' || $currentPage=='editFilterValue'){ ?>class="current-page"<?php } ?>><a href="<?php echo ADMIN_PATH; ?>/filters/add_edit_filters_form">Filters</a></li>
											<?php } ?>
                    </ul>
                  </li>
									<?php } ?>
									<?php if((isset($options) && is_array($options)) || $allPrev==1){ ?>
									<li <?php if($currentMgt=='options'){ ?>class="active"<?php } ?>>
										<a><i class="fa fa-tasks"></i> Options <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu <?php if($currentMgt=='options'){ ?>nav-open<?php } ?>">
											<?php if((in_array(0,$options)) || $allPrev==1){ ?>
                      <li <?php if($currentPage=='display_options' || $currentPage=='view_options'){ ?>class="current-page"<?php } ?>><a href="<?php echo ADMIN_PATH; ?>/options/display_options">Options List</a></li>
											<?php } ?>
											<?php if((in_array(1,$options)) || $allPrev==1){ ?>
                      <li <?php if($currentPage=='add_edit_options_form'){ ?>class="current-page"<?php } ?>><a href="<?php echo ADMIN_PATH; ?>/options/add_edit_options_form">Add New Options</a></li>
											<?php } ?>
                    </ul>
                  </li>
									<?php } ?>
									<?php if((isset($products) && is_array($products)) || $allPrev==1){ ?>
									<li <?php if($currentMgt=='products'){ ?>class="active"<?php } ?>>
										<a><i class="fa fa-soccer-ball-o"></i> Products <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu <?php if($currentMgt=='products'){ ?>nav-open<?php } ?>">
											<?php if((in_array(0,$products)) || $allPrev==1){ ?>
                      <li <?php if($currentPage=='display_products' || $currentPage=='view_product'){ ?>class="current-page"<?php } ?>><a href="<?php echo ADMIN_PATH; ?>/products/display_products">Product List</a></li>
											<?php } ?>
											<?php if((in_array(1,$products)) || $allPrev==1){ ?>
                      <li <?php if($currentPage=='add_edit_product_form'){ ?>class="current-page"<?php } ?>><a href="<?php echo ADMIN_PATH; ?>/products/add_edit_product_form">Add New Product</a></li>
											<?php } ?>
                    </ul>
                  </li>
									<?php } ?>
									<?php if((isset($orders) && is_array($orders)) || $allPrev==1){ ?>
									<li <?php if($currentMgt=='orders'){ ?>class="active"<?php } ?>>
										<a  href="<?php echo ADMIN_PATH; ?>/orders/display_orders"><i class="fa fa-database"></i> Orders</a>
                  </li>
									<?php } ?>
									<?php if((isset($promocodes) && is_array($promocodes)) || $allPrev==1){ ?>
									<li <?php if($currentMgt=='promocodes'){ ?>class="active"<?php } ?>>
										<a><i class="fa fa-ticket"></i> Promocodes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu <?php if($currentMgt=='promocodes'){ ?>nav-open<?php } ?>">
											<?php if((in_array(0,$promocodes)) || $allPrev==1){ ?>
                      <li <?php if($currentPage=='display_promocodes' || $currentPage=='view_promocodes'){ ?>class="current-page"<?php } ?>><a href="<?php echo ADMIN_PATH; ?>/promocodes/display_promocodes">Promocode List</a></li>
											<?php } ?>
											<?php if((in_array(1,$promocodes)) || $allPrev==1){ ?>
                      <li <?php if($currentPage=='add_edit_promocodes_form'){ ?>class="current-page"<?php } ?>><a href="<?php echo ADMIN_PATH; ?>/promocodes/add_edit_promocodes_form">Add New Promocode</a></li>
											<?php } ?>
                    </ul>
                  </li>
									<?php } ?>
									<?php if((isset($slider) && is_array($slider)) || $allPrev==1){ ?>
									<li <?php if($currentMgt=='slider'){ ?>class="active"<?php } ?>>
										<a><i class="fa fa-image"></i> Sliders <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu <?php if($currentMgt=='slider'){ ?>nav-open<?php } ?>">
											<?php if((in_array(0,$slider)) || $allPrev==1){ ?>
                      <li <?php if($currentPage=='display_sliders' || $currentPage=='view_slider'){ ?>class="current-page"<?php } ?>><a href="<?php echo ADMIN_PATH; ?>/slider/display_sliders">Slider List</a></li>
											<?php } ?>
											<?php if((in_array(1,$slider)) || $allPrev==1){ ?>
                      <li <?php if($currentPage=='add_edit_slide_form'){ ?>class="current-page"<?php } ?>><a href="<?php echo ADMIN_PATH; ?>/slider/add_edit_slide_form">Add New Slide</a></li>
											<?php } ?>
                    </ul>
                  </li>
									<?php } ?>
									<?php if((isset($cms) && is_array($cms)) || $allPrev==1){ ?>
									<li <?php if($currentMgt=='cms'){ ?>class="active"<?php } ?>>
										<a><i class="fa fa-file"></i> Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu <?php if($currentMgt=='cms'){ ?>nav-open<?php } ?>">
											<?php if((in_array(0,$cms)) || $allPrev==1){ ?>
                      <li <?php if($currentPage=='display_cms' || $currentPage=='view_slider'){ ?>class="current-page"<?php } ?>><a href="<?php echo ADMIN_PATH; ?>/cms/display_cms">Page List</a></li>
											<?php } ?>
											<?php if((in_array(1,$cms)) || $allPrev==1){ ?>
                      <li <?php if($currentPage=='add_edit_cms_form'){ ?>class="current-page"<?php } ?>><a href="<?php echo ADMIN_PATH; ?>/cms/add_edit_cms_form">Add New Page</a></li>
											<?php } ?>
                    </ul>
                  </li>
									<?php } ?>
									<?php if((isset($etemplate) && is_array($etemplate)) || $allPrev==1){ ?>
									<li <?php if($currentMgt=='etemplate'){ ?>class="active"<?php } ?>>
										<a><i class="fa fa-newspaper-o"></i> Email Templates <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu <?php if($currentMgt=='etemplate'){ ?>nav-open<?php } ?>">
											<?php if((in_array(0,$etemplate)) || $allPrev==1){ ?>
                      <li <?php if($currentPage=='display_template' || $currentPage=='view_slider'){ ?>class="current-page"<?php } ?>><a href="<?php echo ADMIN_PATH; ?>/etemplate/display_template">Template List</a></li>
											<?php } ?>
											<?php if((in_array(1,$etemplate)) || $allPrev==1){ ?>
                      <li <?php if($currentPage=='add_edit_template_form'){ ?>class="current-page"<?php } ?>><a href="<?php echo ADMIN_PATH; ?>/etemplate/add_edit_template_form">Add New Template</a></li>
											<?php } ?>
                    </ul>
                  </li>
									<?php } ?>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>