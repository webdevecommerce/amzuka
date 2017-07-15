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
				<li class="active"><a href="#category_info" data-toggle="tab">Content</a></li>
				<li><a href="#category_seo" data-toggle="tab">SEO</a></li>
				</li>
			</ul>
		</div>

		<div class="col-xs-9">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="category_info">
					<div class="form-horizontal form-label-left form-view">
						<input type="hidden"  name="category_id" value="<?php echo $category_details->row()->id; ?>" />
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name 
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12"><?php  echo $category_details->row()->name; ?></div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_image">Image</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<?php if($category_details->row()->image!=''){ ?>
									<div class=" clearfix">
										<div class="col-sm-12"><br/>
											<img src="<?php echo base_url().CATEGORY_PATH.$category_details->row()->image; ?>" alt="<?php echo $category_details->row()->image;?>" class="col-sm-3" />
										</div>
									</div>
								<?php }else{ ?>
									<div class=" clearfix">
										<div class="col-sm-12"><br/>
											<img src="<?php echo base_url().CATEGORY_DEFAULT; ?>" alt="<?php echo CATEGORY_DEFAULT;?>" class="col-sm-3" />
										</div>
									</div>
									
								<?php }  ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="isChild">Hierarchy </label>
							<div class="col-md-9 col-sm-9 col-xs-12"><?php if($cat_tree!=''){ echo $cat_tree;}else{ echo 'N/A'; } ?></div>
						</div>
						
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status 
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12"><?php echo $category_details->row()->status; ?></div>
						</div>
					</div>				
				</div>
								
				<div class="tab-pane" id="category_seo">
					<div class="form-horizontal form-label-left form-view">
						<input type="hidden"  name="category_id" value="<?php echo $category_details->row()->id; ?>" />
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="seo_title">SEO Title 
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12"><?php  echo $category_details->row()->seo_title; ?></div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="seo_keyword">SEO Keyword 
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12"><?php  echo $category_details->row()->seo_keyword; ?></div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="seo_description">SEO Description 
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12"><?php  echo $category_details->row()->seo_description; ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php 
$this->load->view(ADMIN_PATH.'/templates/footer',$this->data); 
?>