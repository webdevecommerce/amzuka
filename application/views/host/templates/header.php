<?php $this->load->view(ADMIN_PATH.'/templates/commonheader');  ?>
 <div class="container body">
		<div class="main_container">
      <!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i></a>
						</div>

						<ul class="nav navbar-nav navbar-right">
							<li class="">
								<?php
								if($LoggedAdminImage!=''){
									$profile_image=base_url().PROFILE_PATH.$LoggedAdminImage;
								}else{
									$profile_image=base_url().PROFILE_DEFAULT;
								}
								?>
								<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<img src="<?php echo $profile_image; ?>" alt=""><?php echo ucfirst($LoggedAdmin); ?>
									<span class=" fa fa-angle-down"></span>
								</a>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									<li><a href="<?php echo ADMIN_PATH; ?>/login/admin_profile_settings_form"> Profile</a></li>
									<li><a href="<?php echo ADMIN_PATH; ?>/settings/global_settings_form">Settings</a></li>
									<li><a href="<?php echo ADMIN_PATH; ?>/settings/smtp_settings">SMTP Details</a></li>
									<li><a href="<?php echo ADMIN_PATH; ?>/login/admin_logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- /top navigation -->
			
      <!-- START aside-->
			<?php $this->load->view(ADMIN_PATH.'/templates/sidebar');  ?>      
      <!-- End aside-->
			
      
			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3><?php echo $heading; ?></h3>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">