<?php 
$this->load->view(ADMIN_PATH.'/templates/header',$this->data); 
?>

<div class="x_panel">
	<div class="x_title">
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		

		<div class="col-xs-9">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="filter_info">
					<?php
					$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'filter_info_form', 'enctype' => 'multipart/form-data','data-parsley-validate'=>'');
					echo form_open_multipart(ADMIN_PATH.'/filters/updateFilterValue', $attributes)
					?>
					
					<?php $filter_values = $this->data['filtervalues_details']->result(); //echo '<pre>'; print_r($this->data['filter_details']->result());die; ?>
					<input type="hidden" name="filter_id" value="<?php echo $filter_values[0]->filter_id; ?>"/>
					<input type="hidden" name="id" value="<?php echo $filter_values[0]->id; ?>"/>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php if($this->uri->segment(4) == 12){ echo "Select Color"; }else{ echo "Name"; } ?> <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="value" id="<?php if($filter_values[0]->filter_id == 12){ echo "color-picker"; }else{ echo "value"; } ?>" value="<?php echo $filter_values[0]->value; ?>" required class="form-control col-md-7 col-xs-12" value="" />
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
<?php 
$this->load->view(ADMIN_PATH.'/templates/footer',$this->data); 
?>

