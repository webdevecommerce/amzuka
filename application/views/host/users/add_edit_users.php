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
			$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'users_add_edit', 'enctype' => 'multipart/form-data','data-parsley-validate'=>'');
			echo form_open_multipart(ADMIN_PATH.'/users/insertEdituser', $attributes)
			?>
				<input type="hidden"  name="user_id" value="<?php if($edit_mode)echo $users_details->row()->id; ?>" />
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="full_name">Full Name <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="full_name" id="full_name" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $users_details->row()->full_name; ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="email" name="email" id="email" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $users_details->row()->email; ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="smtp_password">Status <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="checkbox">
							<label>
								<input type="checkbox" class="js-switch" <?php if($edit_mode) if($users_details->row()->status=='Active') echo 'checked'; ?> name="status" /> Active
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