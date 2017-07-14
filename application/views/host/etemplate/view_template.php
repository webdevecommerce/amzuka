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
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Template Title</label>
					<div class="col-md-6 col-sm-6 col-xs-12"><?php echo $template_details->row()->title; ?></div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject">Template Subject</label>
					<div class="col-md-6 col-sm-6 col-xs-12"><?php echo $template_details->row()->subject; ?></div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_description">Template Content</label>
					<div class="col-md-9 col-sm-9 col-xs-12"><?php echo $template_details->row()->description; ?></div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="smtp_password">Status</label>
					<div class="col-md-6 col-sm-6 col-xs-12"><?php echo $template_details->row()->status; ?></div>
				</div>
			</div>				
		</div>
	</div>
</div>


<?php 
$this->load->view(ADMIN_PATH.'/templates/footer',$this->data); 
?>