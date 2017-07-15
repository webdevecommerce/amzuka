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
				<li class="active"><a href="#page_content" data-toggle="tab">Content</a></li>
				<li><a href="#page_seo" data-toggle="tab">SEO</a></li>
				</li>
			</ul>
		</div>

		<div class="col-xs-9">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="page_content">
					<?php
					$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'page_content', 'enctype' => 'multipart/form-data','data-parsley-validate'=>'');
					echo form_open_multipart(ADMIN_PATH.'/cms/insertEditCms', $attributes)
					?>
						<input type="hidden"  name="cms_id" value="<?php if($edit_mode)echo $page_details->row()->id; ?>" />
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="page_name">Name <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="page_name" id="page_name" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $page_details->row()->page_name; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="page_title">Title <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="page_title" id="page_title" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $page_details->row()->page_title; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="css_descrip">CSS/Script
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<textarea name="css_descrip" class="form-control col-md-12 col-xs-12" ><?php if($edit_mode) echo $page_details->row()->css_descrip; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Content <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<textarea name="description" required class="ckeditor" ><?php if($edit_mode) echo $page_details->row()->description; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<div class="checkbox">
									<label>
										<input type="checkbox" class="js-switch" <?php if($edit_mode) if($page_details->row()->status=='Publish') echo 'checked'; ?> name="status" />Publish
									</label>
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
								
				<div class="tab-pane" id="page_seo">
					<?php
					$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'page_seo', 'enctype' => 'multipart/form-data','data-parsley-validate'=>'');
					echo form_open_multipart(ADMIN_PATH.'/cms/insertEditCms', $attributes)
					?>
						<input type="hidden"  name="cms_id" value="<?php if($edit_mode)echo $page_details->row()->id; ?>" />
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_title">Meta Title <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="meta_title" id="meta_title" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $page_details->row()->meta_title; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_keyword">Meta Keyword <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="meta_keyword" id="meta_keyword" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $page_details->row()->meta_keyword; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_description">Meta Description <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="meta_description" id="meta_description" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $page_details->row()->meta_description; ?>" />
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-9 col-sm-9 col-xs-12">
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