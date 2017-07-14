<?php 
$this->load->view(ADMIN_PATH.'/templates/header',$this->data); 
?>

<div class="x_panel">
	<div class="x_title">
		<div class="clearfix"></div>
	</div>
	<div class="x_content">

		<div class="col-xs-12">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="category_info">
					<?php
					$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'option_form', 'enctype' => 'multipart/form-data','data-parsley-validate'=>'');
					echo form_open_multipart(ADMIN_PATH.'/options/insertEditOptions', $attributes)
					?>
						<input type="hidden"  name="option_id" value="<?php if($edit_mode)echo $option_details->row()->id; ?>" />
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="option_name">Name <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="option_name" id="option_name" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $option_details->row()->option_name; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="parent">Option Type<span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select id="option_values" name="option_values" required class="form-control">
									<option value="">Select Option Type</option>
									<option value="text">Input</option>
									<option value="select">Dropdown</option>
									<option value="radiobutton">Radio Button</option>
									<option value="checkbox">Check Box</option>
								</select>
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<div class="checkbox">
									<label>
										<input type="checkbox" class="js-switch" <?php if($edit_mode) if($option_details->row()->status=='Active') echo 'checked'; ?> name="status" />
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
		</div>
	</div>
</div>


<?php 
$this->load->view(ADMIN_PATH.'/templates/footer',$this->data); 
?>