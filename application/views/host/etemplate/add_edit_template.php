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
			$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'etemplate_add_edit', 'enctype' => 'multipart/form-data','data-parsley-validate'=>'');
			echo form_open_multipart(ADMIN_PATH.'/etemplate/insertEditTemplate', $attributes)
			?>
				<input type="hidden"  name="etemplate_id" value="<?php if($edit_mode)echo $template_details->row()->id; ?>" />
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Template Title <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="title" id="title" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $template_details->row()->title; ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject">Template Subject <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="subject" id="subject" required class="form-control col-md-7 col-xs-12" value="<?php if($edit_mode) echo $template_details->row()->subject; ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_description">Template Content <span class="required">*</span>
					</label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<textarea name="email_description" required class="ckeditor" ><?php if($edit_mode) echo $template_details->row()->description; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="smtp_password">Status <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="checkbox">
							<label>
								<input type="checkbox" class="js-switch" <?php if($edit_mode) if($template_details->row()->status=='Active') echo 'checked'; ?> name="status" /> Active
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