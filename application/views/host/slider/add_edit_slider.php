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
			$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'slider_add_edit', 'enctype' => 'multipart/form-data','data-parsley-validate'=>'');
			echo form_open_multipart(ADMIN_PATH.'/slider/insertEditSlide', $attributes)
			?>
				<input type="hidden"  name="slide_id" value="<?php if($edit_mode)echo $slider_details->row()->id; ?>" />
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="title" id="title" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $slider_details->row()->title; ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject">Slider Image (1920x1080) <?php if(!$edit_mode) { ?><span class="required">*</span><?php } ?>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="file" name="slider_image" <?php if(!$edit_mode) { ?>required <?php } ?> class="">
						<?php if($edit_mode) {if($slider_details->row()->slide!=''){ ?>
							<div class=" clearfix">
								<div class="col-sm-8"><br/>
									<img src="<?php echo base_url().SLIDER_PATH.$slider_details->row()->slide; ?>" alt="<?php echo $slider_details->row()->slide;?>" class="col-sm-6" />
								</div>
							</div>
						<?php } } ?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description </label>
					<div class="col-md-6 col-sm-9 col-xs-12">
						<textarea name="description" class="form-control col-md-7 col-xs-12" ><?php if($edit_mode) echo $slider_details->row()->description; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="link">Url</label>
					<div class="col-md-6 col-sm-9 col-xs-12">
						<input type="url" name="link" id="link" class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $slider_details->row()->link; ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="smtp_password">Status <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="checkbox">
							<label>
								<input type="checkbox" class="js-switch" <?php if($edit_mode) if($slider_details->row()->status=='Publish') echo 'checked'; ?> name="status" /> Publish
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