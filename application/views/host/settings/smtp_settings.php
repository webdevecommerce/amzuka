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
			$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'admin_smtp_settings', 'enctype' => 'multipart/form-data','data-parsley-validate'=>'');
			echo form_open_multipart(ADMIN_PATH.'/settings/save_smtp_settings', $attributes)
			?>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="smtp_host">Host <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="smtp_host" id="smtp_host" required class="form-control col-md-7 col-xs-12" value="<?php echo $settings->row()->smtp_host; ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="smtp_port">Port <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="smtp_port" id="smtp_port" required class="form-control col-md-7 col-xs-12" value="<?php echo $settings->row()->smtp_port; ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="smtp_uname">Username <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="smtp_uname" id="smtp_uname" required class="form-control col-md-7 col-xs-12" value="<?php echo $settings->row()->smtp_uname; ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="smtp_password">Password <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="smtp_password" id="smtp_password" required class="form-control col-md-7 col-xs-12" value="<?php echo $settings->row()->smtp_password; ?>" />
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