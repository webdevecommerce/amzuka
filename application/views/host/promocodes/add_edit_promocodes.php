<?php 
$this->load->view(ADMIN_PATH.'/templates/header',$this->data); 
?>

<div class="x_panel">
	<div class="x_title">
		<div class="clearfix"></div>
	</div>
	<div class="x_content">

		<div class="col-xs-12">
			<?php
			$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'promocode_add_edit', 'enctype' => 'multipart/form-data','data-parsley-validate'=>'');
			echo form_open_multipart(ADMIN_PATH.'/promocodes/insertEditPromoCode', $attributes)
			?>
				<input type="hidden"  name="promocodes_id" value="<?php if($edit_mode)echo $promocode_details->row()->id; ?>" />
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="promo_code">Promo Code <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="promo_code" id="promo_code" required class="form-control col-md-7 col-xs-12" value="<?php echo $promo_code_val; ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="validity_from_date">Valid From <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<fieldset>
							<div class="control-group">
								<div class="controls">
									<div class="col-md-11 xdisplay_inputx form-group has-feedback">
										<input type="text" class="form-control has-feedback-left" id="validity_from_date" name="validity_from_date" placeholder="Promocode Validity From" required readonly="readonly" aria-describedby="inputSuccess2Status" value="<?php if($edit_mode) echo $promocode_details->row()->validity_from_date; ?>">
										<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
										<span id="inputSuccess2Status" class="sr-only">(success)</span>
									</div>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="validity_to_date">Valid To <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">						
						<fieldset>
							<div class="control-group">
								<div class="controls">
									<div class="col-md-11 xdisplay_inputx form-group has-feedback">
										<input type="text" class="form-control has-feedback-left" id="validity_to_date" name="validity_to_date" placeholder="Promocode valid to date" required readonly="readonly" aria-describedby="inputSuccess2Status" value="<?php if($edit_mode) echo $promocode_details->row()->validity_to_date; ?>">
										<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
										<span id="inputSuccess2Status" class="sr-only">(success)</span>
									</div>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="max_no_of_usage">Usage limit Per Coupon <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="number" name="max_no_of_usage" id="max_no_of_usage" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $promocode_details->row()->max_no_of_usage; ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="max_no_of_usage_per_user">Usage limit Per User <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="number" name="max_no_of_usage_per_user" id="max_no_of_usage_per_user" required  class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $promocode_details->row()->max_no_of_usage_per_user; ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Flat Discount? <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="checkbox">
							<label>
								<input type="checkbox" class="js-switch" <?php if($edit_mode) if($promocode_details->row()->type=='Flat') echo 'checked'; ?> name="type" /> Flat?
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount">Discount Value<span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="number" name="amount" id="amount" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $promocode_details->row()->amount; ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="checkbox">
							<label>
								<input type="checkbox" class="js-switch" <?php if($edit_mode) if($promocode_details->row()->status=='Active') echo 'checked'; ?> name="status" /> Active
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


<?php 
$this->load->view(ADMIN_PATH.'/templates/footer',$this->data); 
?>