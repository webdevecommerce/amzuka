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
				<li class="active"><a href="#basic_pan" data-toggle="tab">Basic</a></li>
				<li><a href="#logo_pan" data-toggle="tab">Logo & Favicon</a></li>
				<li><a href="#sociam_pan" data-toggle="tab">Social Media</a></li>
				<li><a href="#seo_pan" data-toggle="tab">SEO</a></li>
				</li>
			</ul>
		</div>

		<div class="col-xs-9">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="basic_pan">
					<?php
					$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'admin_basic_settings', 'enctype' => 'multipart/form-data','data-parsley-validate'=>'');
					echo form_open_multipart(ADMIN_PATH.'/settings/global_settings', $attributes)
					?>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="site_title">Site Title <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="site_title" id="site_title" required data-parsley-type="alphanum" class="form-control col-md-7 col-xs-12" value="<?php echo $settings->row()->site_title; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="site_contact_mail">Site Contact Email <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="email" name="site_contact_mail" id="site_contact_mail" data-parsley-trigger="change" required class="form-control col-md-7 col-xs-12" value="<?php echo $settings->row()->site_contact_mail; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="site_contact_number">Site Contact Number <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="site_contact_number" id="site_contact_number" data-parsley-trigger="change" required class="form-control col-md-7 col-xs-12" value="<?php echo $settings->row()->site_contact_number; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="copyright_content">Copyright Content <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="copyright_content" id="copyright_content" data-parsley-trigger="change" required class="form-control col-md-7 col-xs-12" value="<?php echo $settings->row()->copyright_content; ?>" />
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
				
				
				<div class="tab-pane" id="logo_pan">
					<?php
					$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'admin_logo_settings', 'enctype' => 'multipart/form-data','data-parsley-validate'=>'');
					echo form_open_multipart(ADMIN_PATH.'/settings/global_settings', $attributes)
					?>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo_image">Site Logo <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="file" name="logo_image" id="logo_image" />
							</div>
							<div class=" clearfix">
								<div class="col-md-6 col-sm-6 col-xs-12"><br/>
									<img src="<?php echo base_url().'images/logo/'.$logo; ?>" alt="<?php echo $title;?>" class="col-sm-4" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="favicon_image">Site Favicon <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="file" name="favicon_image" id="favicon_image" />
							</div>
							<div class=" clearfix">
								<div class="col-md-6 col-sm-6 col-xs-12"><br/>
									<img src="<?php echo base_url().'images/logo/'.$favicon; ?>" alt="<?php echo $title;?>" class="col-sm-4" />
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
				
				
				<div class="tab-pane" id="sociam_pan">
					<?php
					$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'admin_logo_settings', 'enctype' => 'multipart/form-data','data-parsley-validate'=>'');
					echo form_open_multipart(ADMIN_PATH.'/settings/global_settings', $attributes)
					?>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook_link">Facebook Link<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="url" name="facebook_link" id="facebook_link" required class="form-control col-md-7 col-xs-12" value="<?php echo $settings->row()->facebook_link; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="twitter_link">Twitter Link<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="url" name="twitter_link" id="twitter_link" required class="form-control col-md-7 col-xs-12" value="<?php echo $settings->row()->twitter_link; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="googleplus_link">Google+ Link<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="url" name="googleplus_link" id="googleplus_link" required class="form-control col-md-7 col-xs-12" value="<?php echo $settings->row()->googleplus_link; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="linkedin_link">Linkedin Link<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="url" name="linkedin_link" id="linkedin_link" required class="form-control col-md-7 col-xs-12" value="<?php echo $settings->row()->linkedin_link; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="pinterest_link">Pinterest Link<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="url" name="pinterest_link" id="pinterest_link" required class="form-control col-md-7 col-xs-12" value="<?php echo $settings->row()->pinterest_link; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="instagram_link">Instagram Link<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="url" name="instagram_link" id="instagram_link" required class="form-control col-md-7 col-xs-12" value="<?php echo $settings->row()->instagram_link; ?>" />
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
				
				<div class="tab-pane" id="seo_pan">
					<?php
					$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'admin_logo_settings', 'enctype' => 'multipart/form-data','data-parsley-validate'=>'');
					echo form_open_multipart(ADMIN_PATH.'/settings/global_settings', $attributes)
					?>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_title">Meta Title <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="meta_title" id="meta_title" required class="form-control col-md-7 col-xs-12" value="<?php echo $settings->row()->meta_title; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_keyword">Meta Keyword <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="meta_keyword" id="meta_keyword" required class="form-control col-md-7 col-xs-12" value="<?php echo $settings->row()->meta_keyword; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_description">Meta Description <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="meta_description" id="meta_description" required class="form-control col-md-7 col-xs-12" value="<?php echo $settings->row()->meta_description; ?>" />
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