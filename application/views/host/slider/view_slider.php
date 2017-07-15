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
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title</label>
					<div class="col-md-6 col-sm-6 col-xs-12"><?php echo $slider_details->row()->title; ?></div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject">Slider Image</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php {if($slider_details->row()->slide!=''){ ?>
							<div class=" clearfix">
								<div class="col-sm-8"><br/>
									<img src="<?php echo base_url().SLIDER_PATH.$slider_details->row()->slide; ?>" alt="<?php echo $slider_details->row()->slide;?>" class="col-sm-6" />
								</div>
							</div>
						<?php } } ?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description</label>
					<div class="col-md-6 col-sm-9 col-xs-12"><?php echo $slider_details->row()->description; ?></div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="link">Url</label>
					<div class="col-md-6 col-sm-9 col-xs-12"><?php echo $slider_details->row()->link; ?></div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="smtp_password">Status</label>
					<div class="col-md-6 col-sm-6 col-xs-12"><?php echo $slider_details->row()->status; ?></div>
				</div>
			</div>				
		</div>
	</div>
</div>


<?php 
$this->load->view(ADMIN_PATH.'/templates/footer',$this->data); 
?>