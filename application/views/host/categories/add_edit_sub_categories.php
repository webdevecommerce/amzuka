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
					<?php
					$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'category_info_form', 'enctype' => 'multipart/form-data','data-parsley-validate'=>'');
					echo form_open_multipart(ADMIN_PATH.'/categories/insertEditSubCategory', $attributes)
					?>
						<input type="hidden"  name="category_id" value="<?php if($edit_mode)echo $categories_details->row()->id; ?>" />
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="name" id="name" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $categories_details->row()->name; ?>" />
							</div>
						</div>
						<?php /* <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_image">Image <?php if(!$edit_mode) { ?><span class="required">*</span><?php } ?>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="file" name="category_image" <?php if(!$edit_mode) { ?>required <?php } ?> class="">
								<?php if($edit_mode) {if($categories_details->row()->image!=''){ ?>
									<div class=" clearfix">
										<div class="col-sm-8"><br/>
											<img src="<?php echo base_url().CATEGORY_PATH.$categories_details->row()->image; ?>" alt="<?php echo $categories_details->row()->image;?>" class="col-sm-6" />
										</div>
									</div>
								<?php } } ?>
							</div>
						</div> */ ?>
						
						<?php if(!$edit_mode){ ?>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="isChild">Is Subcategory? </label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<div class="checkbox">
									<label>
										<input type="checkbox" class="js-switch" name="isChild" id="isChild" />
									</label>
								</div>
							</div>
						</div>
						<?php }else{ ?>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="isChild">Category hierarchy </label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<?php echo $cat_tree; ?>
								<!--<a href="javascript:void(0);" id="editBtn">Edit</a>-->
							</div>
						</div>
						<div class="form-group" id="edit" style="display:block;">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="isChild">Is Subcategory?  </label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<div class="checkbox">
									<label>
										<input type="checkbox" class="js-switch" name="isChild" id="isChild_sub" <?php if($categories_details->row()->rootID!=0){ echo "checked"; } else { echo "unchecked"; }  ?>/><?php echo $row->name; ?>
									</label>
								</div>
							</div>
						</div>
						<?php } ?>
						
						<div class="form-group" id="catGroup" style="display:<?php if($categories_details->row()->rootID!=0){echo" block";}else { echo "none";} ?>" >
							<?php if($root_categories->num_rows()>0){ ?>
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="parent">Parent Category
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select id="parent-0" name="rootCat[]" class="cat-ddl form-control" onchange="getServices(0)">
									<option value="">Select Category</option>
									<?php foreach($root_categories->result() as $row){ 
			
									?>
									<option value="<?php echo $row->id; ?>" <?php if($categories_details->row()->rootID==$row->id){ echo "selected"; } ?>><?php echo $row->name; ?></option>
									<?php }  ?>
								</select>
							</div>
							<?php }else{ ?> 
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="parent">&nbsp;</label>
							<div class="col-md-9 col-sm-9 col-xs-12"><code>No Categories found</code></div>
							<?php } ?>
						</div>
						
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<div class="checkbox">
									<label>
										<input type="checkbox" class="js-switch" <?php if($edit_mode) if($categories_details->row()->status=='Active') echo 'checked'; ?> name="status" checked>
									</label>
								</div>
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Filters <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12 filters">
							<?php foreach($filters_details->result() as $row){ if($row->id != $this->config->item('filter_id_color')  && $row->id != $this->config->item('filter_id_size')){ ?>
									<label>
									
										<input type= "checkbox"  name="filters[]" value="<?php echo $row->id; ?>" <?php if(in_array($row->id,$filterArray)) echo "checked"; ?>/><?php echo ucfirst($row->filter_name); ?>
									
									</label>
							<?php }} ?>
								
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
								
				<div class="tab-pane" id="category_seo">
					<?php
					$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'category_seo_form', 'enctype' => 'multipart/form-data','data-parsley-validate'=>'');
					echo form_open_multipart(ADMIN_PATH.'/categories/insertEditCategory', $attributes)
					?>
						<input type="hidden"  name="category_id" value="<?php if($edit_mode)echo $categories_details->row()->id; ?>" />
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="seo_title">SEO Title <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="seo_title" id="seo_title" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $categories_details->row()->seo_title; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="seo_keyword">SEO Keyword <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="seo_keyword" id="seo_keyword" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $categories_details->row()->seo_keyword; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="seo_description">SEO Description <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="seo_description" id="seo_description" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $categories_details->row()->seo_description; ?>" />
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
<style>
.filters label{
	display:table-row;
	margin-left:10px;
}
</style>

<?php 
$this->load->view(ADMIN_PATH.'/templates/footer',$this->data); 
?>