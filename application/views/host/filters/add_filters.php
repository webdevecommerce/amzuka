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
					echo form_open_multipart(ADMIN_PATH.'/filters/insertFilter', $attributes)
					?>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="filter_name" id="filter_name" required class="form-control col-md-7 col-xs-12" value="" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<div class="checkbox">
									<label>
										<input type="checkbox" class="js-switch" checked name="status" />
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
				<div class="form-group">					
					<?php if(!empty($filters_details)){?>
						<table class="table">
						  <thead>
							<tr>
							  <th>S No</th>
							  <th>Filter Name</th>
							  <th>Filter Values</th>
							  <th>Status</th>
							  <th>Action</th>
							</tr>
						  </thead>
						  <tbody>
							<?php foreach($filters_details->result() as $key=>$details){?> 
							<tr>
							<?php //echo '<pre>'; print_r($filters_details->result());die; ?>
								<th scope="row"><?php echo $key+1; ?></th>
							  <td><?php echo $details->filter_name; ?></td>
								<td><a href="<?php echo ADMIN_PATH; ?>/filters/addFilterValues/<?php echo $details->id; ?>" >Add/Show values</a></td>
							  <td><?php echo $details->status; ?></td>
							  <td><a href="<?php echo ADMIN_PATH; ?>/filters/editFilter/<?php echo $details->id; ?>" class=".btn-primary" style="color:blue;">Edit</a> <?php if($details->id != 11 && $details->id != 12){ ?><a href="<?php echo ADMIN_PATH; ?>/filters/deleteFilter/<?php echo $details->id; ?>" class=".btn-primary" style="color:blue;">Delete</a><?php } ?></td>
							</tr><?php } ?>
							</tbody>
						</table>
					<?php }?>
				</div>
				</div>
			</div>
		</div>
</div>


<?php 
$this->load->view(ADMIN_PATH.'/templates/footer',$this->data); 
?>
