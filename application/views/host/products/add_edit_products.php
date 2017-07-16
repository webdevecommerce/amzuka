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
								<select id="prod_cat" required name="category_id" class="cat-ddl form-control">
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
						<div class="form-group" id="subCatGroup" >
							<?php if($root_categories->num_rows()>0){ ?>
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="parent"> Sub Category
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select id="prod_sub_cat" required name="sub_category_id" class="cat-ddl form-control">
									<option value="">Select Sub Category</option>
								</select>
							</div>
							<?php }else{ ?> 
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="parent">&nbsp;</label>
							<div class="col-md-9 col-sm-9 col-xs-12"><code>No Categories found</code></div>
							<?php } ?>
						</div>
						<div class="form-group" id="filterGroup" >
								<div id="allfilterOptions">
									
								</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Price<span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="price" id="price" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $product_details->row()->price; ?>" />
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Stock count<span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="stock_count" id="stock_count" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $product_details->row()->stock_count; ?>" />
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tax (%)<span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="tax" id="tax" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $product_details->row()->tax; ?>" />
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Shipping Cost<span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="shipping_cost" id="shipping_cost" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $product_details->row()->shipping_cost; ?>" />
							</div>
						</div>
						
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
										<input type="checkbox" class="js-switch" checked name="status" />
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			$("#prod_cat").change(function(){
					  cat_id = $(this).val();
						$.ajax({
								url: "<?php echo base_url(); ?>host/products/fetch_sub_categories_id",
								data: { 'category_id' : cat_id },
								method:"POST",
								dataType:"JSON",
								success: function(response){
									if(response.status == '1'){
											$("#prod_sub_cat")
										.find('option')
										.remove()
										.end()
										.append('<option value="">Select Sub Category</option>')
										$.each(response.data,function(i,item){
											$("#prod_sub_cat").append($('<option>',{
													value:item.id,
													text:item.name
											}));
										});
									}else{
										$("#prod_sub_cat")
										.find('option')
										.remove()
										.end()
										.append('<option value="">No Sub Categories Found</option>')
									}
								}
						});
				});
				
					$("#prod_sub_cat").change(function(){
					  cat_id = $(this).val();
						$.ajax({
								url: "<?php echo base_url(); ?>host/products/fetch_filters_of_subcategory",
								data: { 'sub_category_id' : cat_id },
								method:"POST",
								dataType:"JSON",
								success: function(response){
									if(response.status == '1'){
										
										$("#allfilterOptions").html('');
										for( key in response.data){
											selectDiv = '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="parent">'+response.data[key].filter_value+'</label>';
											selectDiv += '<div class="col-md-9 col-sm-9 col-xs-12" class="dropdown">';
											selectDiv += '<select class="cat-ddl form-control" name="filters['+response.data[key].filter_id+']">';
											for(k in response.data[key].filter_values){
												selectDiv += '<option value='+response.data[key].filter_values[k].fv_id+'>'+response.data[key].filter_values[k].fv_value+'</option>';
											}
											
											selectDiv += '</select></div>';
											$('#allfilterOptions').append(selectDiv);
										}
									}else{
										
									}
								}
						});
				});
	
				
				
		});
</script>

<?php 
$this->load->view(ADMIN_PATH.'/templates/footer',$this->data); 
?>

