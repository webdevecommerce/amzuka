<?php 
$this->load->view(ADMIN_PATH.'/templates/header',$this->data); 
?>

<div class="x_panel">
	<div class="x_title">
		<div class="clearfix"></div>
	</div>
	<div class="x_content">

		<div class="col-xs-12">
			<div class="form-horizontal form-label-left form-view">
				<input type="hidden"  name="promocodes_id" value="<?php echo $promocode_details->row()->id; ?>" />
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="promo_code">Promo Code 
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12"><?php echo $promocode_details->row()->promo_code; ?></div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="validity_from_date">Valid From 
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12"><?php echo $promocode_details->row()->validity_from_date; ?></div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="validity_to_date">Valid To 
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12"><?php echo $promocode_details->row()->validity_to_date; ?></div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="max_no_of_usage">Usage limit Per Coupon 
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12"><?php echo $promocode_details->row()->max_no_of_usage; ?></div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="max_no_of_usage_per_user">Usage limit Per User 
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12"><?php echo $promocode_details->row()->max_no_of_usage_per_user; ?></div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Flat Discount? 
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12"><?php echo $promocode_details->row()->type; ?></div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount">Discount Value
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12"><?php echo $promocode_details->row()->amount; ?></div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status 
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12"><?php echo $promocode_details->row()->status; ?></div>
				</div>
			</div>				
		</div>
	</div>
</div>


<?php 
$this->load->view(ADMIN_PATH.'/templates/footer',$this->data); 
?>