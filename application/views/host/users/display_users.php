<?php 
$this->load->view(ADMIN_PATH.'/templates/header',$this->data); 
?>

<div class="x_panel">
	<div class="x_title">
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<table id="datatable" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Phone Number</th>
					<th>Created</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php if($usersList->num_rows()>0){ ?>
			<?php foreach($usersList->result() as $row){ ?>
				<tr>
					<td><a href="list/<?php echo $row->company_url; ?>" target="_blank"><?php echo $row->full_name; ?></a></td>
					<td><?php echo $row->email; ?></td>
					<td><?php echo $row->dail_code.' '.$row->phone_no; ?></td>
					<td><?php echo $row->created; ?></td>
					<td>
						<?php 
							if($row->status=='Active'){
								$mode=0;
							}else if($row->status=='Inactive'){
								$mode=1;
							}else{
								$mode=-1;
							}
						?>
						<?php if($mode==1){?>
						<a href="<?php echo ADMIN_PATH; ?>/users/change_user_status/1/<?php echo $row->id; ?>">
							<span class="label label-danger lbl"><?php echo $row->status; ?></span>
						</a>
						<?php }else if($mode==0){?>
						<a href="<?php echo ADMIN_PATH; ?>/users/change_user_status/0/<?php echo $row->id; ?>">
							<span class="label label-success lbl"><?php echo $row->status; ?></span>
						</a>
						<?php }else if($mode<0){?>
							<span class="label label-default lbl"><?php echo $row->status; ?></span>
						<?php }?>
						
						
					</td>
					<td>
						<div class="btn-group">
							<a class="btn btn-primary" href="<?php echo ADMIN_PATH; ?>/users/view_user/<?php echo $row->id; ?>">
								<span class="fa fa-eye"></span>
							</a>
							<a class="btn btn-primary" href="<?php echo ADMIN_PATH; ?>/users/add_edit_user_form/<?php echo $row->id; ?>">
								<span class="fa fa-edit"></span>
							</a>
							<a class="btn btn-primary" href="<?php echo ADMIN_PATH; ?>/users/delete_user/<?php echo $row->id; ?>">
								<span class="fa fa-remove"></span>
							</a>
						</div>
					</td>
				</tr>
			<?php } ?>
			<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Phone Number</th>
					<th>Created</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>


<?php 
$this->load->view(ADMIN_PATH.'/templates/footer',$this->data); 
?>