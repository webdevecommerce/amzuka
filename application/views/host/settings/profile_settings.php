<?php 
$this->load->view(ADMIN_PATH.'/templates/header',$this->data); 
?>

<div class="x_panel">
	<div class="x_title">
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<div class="col-xs-3">
			<!-- required for floating -->
			<!-- Nav tabs -->
			<ul class="nav nav-tabs tabs-left">
				<li class="active"><a href="#profile_pan" data-toggle="tab">Profile</a></li>
				<li><a href="#password_pan" data-toggle="tab">Password</a></li>
				</li>
			</ul>
		</div>

		<div class="col-xs-9">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="profile_pan">
					<?php
					$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'admin_profile', 'enctype' => 'multipart/form-data','data-parsley-validate'=>'');
					echo form_open_multipart(ADMIN_PATH.'/login/edit_admin_profile', $attributes)
					?>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_name">User Name <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="admin_name" id="admin_name" required data-parsley-type="alphanum" class="form-control col-md-7 col-xs-12" value="<?php echo $profile->row()->admin_name; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="email" name="email" id="email" data-parsley-trigger="change" required class="form-control col-md-7 col-xs-12" value="<?php echo $profile->row()->email; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="profile_image">Profile Image <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="file" name="profile_image" id="profile_image" />
							</div>
							<?php
							if($LoggedAdminImage!=''){
								$profile_image=base_url().PROFILE_PATH.$LoggedAdminImage;
							}else{
								$profile_image=base_url().PROFILE_DEFAULT;
							}
							?>
							<div class=" clearfix">
								<div class="col-md-6 col-sm-6 col-xs-12"><br/>
									<img src="<?php echo $profile_image; ?>" alt="<?php echo $title;?>" class="col-sm-4" />
								</div>
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="submit" class="validateForm btn btn-success">Submit</button>
							</div>
						</div>
					</form>				
				</div>
				
				
				<div class="tab-pane" id="password_pan">
					<?php
					$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'admin_password_change', 'enctype' => 'multipart/form-data','data-parsley-validate'=>'');
					echo form_open_multipart(ADMIN_PATH.'/login/change_admin_password', $attributes)
					?>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Current Password <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="password" name="password" id="password" required class="form-control col-md-7 col-xs-12" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_password">New Password <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="password" name="new_password" id="new_password" required class="form-control col-md-7 col-xs-12" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirm_password">Confirm Password <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="password" name="confirm_password" id="confirm_password" required data-parsley-equalto='#new_password' class="form-control col-md-7 col-xs-12" />
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="submit" class="validateForm btn btn-success">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<?php 
$this->load->view(ADMIN_PATH.'/templates/footer',$this->data); 
?>