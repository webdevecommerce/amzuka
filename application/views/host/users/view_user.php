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
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Full Name 
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12"><?php echo $users_details->row()->full_name; ?></div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Email 
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12"><?php echo $users_details->row()->email; ?></div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
					<div class="col-md-6 col-sm-6 col-xs-12"><?php echo $users_details->row()->status ?></div>
				</div>
			</div>				
		</div>
	</div>
</div>


<?php 
$this->load->view(ADMIN_PATH.'/templates/footer',$this->data); 
?>