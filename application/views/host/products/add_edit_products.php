<?php 
$this->load->view(ADMIN_PATH.'/templates/header',$this->data); 
?>

<div class="x_panel">
	<div class="x_title">
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
			<div class="col-xs-9">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="category_info">
					<?php
					$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'category_info_form', 'enctype' => 'multipart/form-data','data-parsley-validate'=>'');
					echo form_open_multipart(ADMIN_PATH.'/products/insertEditProduct', $attributes)
					?>
						<input type="hidden"  name="product_id" value="<?php if($edit_mode)echo $product_details->row()->id; ?>" />
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Product Name <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="product_name" id="product_name" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $product_details->row()->name; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_image">Image <?php if(!$edit_mode) { ?><span class="required">*</span><?php } ?>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="file" name="product_image" <?php if(!$edit_mode) { ?>required <?php } ?> class="">
								<?php if($edit_mode) {if($categories_details->row()->image!=''){ ?>
									<div class=" clearfix">
										<div class="col-sm-8"><br/>
											<img src="<?php echo base_url().CATEGORY_PATH.$categories_details->row()->image; ?>" alt="<?php echo $product_details->row()->image;?>" class="col-sm-6" />
										</div>
									</div>
								<?php } } ?>
							</div>
						</div>
						<?php //echo '<pre>'; print_r($root_categories);die; ?>
						<div class="form-group" id="catGroup" >
							<?php if($root_categories->num_rows()>0){ ?>
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="parent"> Category
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select id="parent-0" name="category_id" class="cat-ddl form-control">
									<option value="">Select Category</option>
									<?php foreach($root_categories->result() as $row){ ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
									<?php } ?>
								</select>
							</div>
							<?php }else{ ?> 
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="parent">&nbsp;</label>
							<div class="col-md-9 col-sm-9 col-xs-12"><code>No Categories found</code></div>
							<?php } ?>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Price<span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="price" id="price" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $product_details->row()->price; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sale Price<span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="sale_price" id="sale_price" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $product_details->row()->sale_price; ?>" />
							</div>
						</div>
						<!--<div class="form-group" id="catGroup" >
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="parent"> Choose Size
							</label>
							<select name="size" id="sizeVal" multiple>
								<option value="small">Small</option>
								<option value="medium">Medium</option>
								<option value="large">Large</option>
							</select>
						</div>-->
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Featured <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<div class="checkbox">
									<label>
										<input type="checkbox" class="js-switch" <?php if($edit_mode) if($product_details->row()->status=='yes') echo 'checked'; ?> name="product_featured" />
									</label>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<div class="checkbox">
									<label>
										<input type="checkbox" class="js-switch" <?php if($edit_mode) if($product_details->row()->status=='Publish') echo 'checked'; ?> name="status" />
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
		
	</div>
</div>
<link rel="stylesheet" href="css/host/picker.min.css">

<script type="text/javascript" src="js/host/picker.min.js"></script>

<?php 
$this->load->view(ADMIN_PATH.'/templates/footer',$this->data); 
?>
