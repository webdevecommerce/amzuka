<?php 
$this->load->view(ADMIN_PATH.'/templates/header',$this->data); 
?>

<div class="x_panel">
	<div class="x_title">
		<div class="clearfix"></div>
	</div>
	
		<div class="col-xs-9">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="filter_info">
					<?php
					$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'filter_info_form', 'enctype' => 'multipart/form-data','data-parsley-validate'=>'');
					echo form_open_multipart(ADMIN_PATH.'/filters/insertFilterValue', $attributes)
					?>
						<div class="form-group">
							<input type="hidden" name="filter_id"  value="<?php echo $this->data['cur_id']; ?>"/>
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php if($this->uri->segment(4) == 12){ echo "Select Color"; }else{ echo "Name"; } ?> <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="value" id="<?php if($this->uri->segment(4) == 12){ echo "color-picker"; }else{ echo "value"; } ?>" required class="form-control col-md-7 col-xs-12" value="" />
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="submit" class="validateForm btn btn-success">Submit</button>
							</div>
						</div>
					</form>	
				<div class="form-group">					
					<?php if(!empty($filter_values)){?>
						<table class="table">
						  <thead>
							<tr>
							  <th>S No</th>
							  <th>Filter Values</th>
							  <th>Action</th>
							</tr>
						  </thead>
						  <tbody>
							<?php foreach($filter_values->result() as $key=>$details){?> 
							<tr>
							<?php //echo '<pre>'; print_r($filters_details->result());die; ?>
								<th scope="row"><?php echo $key+1; ?></th>
								<?php if($this->uri->segment(4) == 12){ ?>
									<td><span class="color-box" style="background:<?php echo $details->value; ?>"></span></td>
								<?php }else { ?>
									<td><?php echo $details->value; ?></td>
								<?php } ?>
							  
								<td><a href="<?php echo ADMIN_PATH; ?>/filters/editFilterValue/<?php echo $details->id; ?>" class=".btn-primary" style="color:blue;">Edit</a> | <a href="<?php echo ADMIN_PATH; ?>/filters/deleteFilterValue/<?php echo $details->id; ?>/<?php echo $this->uri->segment(4); ?>" class=".btn-primary" style="color:blue;">Delete</a></td>
							</tr><?php } ?>
							</tbody>
						</table>
					<?php }?>
				</div>
				</div>
			</div>
		</div>
</div>
<style>
.color-box{
	float:left;height:32px;width:32px;border:1px solid rgba(0, 0, 0, .2);
}
</style>
<?php 
$this->load->view(ADMIN_PATH.'/templates/footer',$this->data); 
?>