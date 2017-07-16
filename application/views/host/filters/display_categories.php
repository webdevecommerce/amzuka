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
					<th>Status</th>
					<th>Featured</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php if($categoriesList->num_rows()>0){ ?>
			<?php foreach($categoriesList->result() as $row){ ?>
				<tr>
					<td><?php echo $row->name; ?></td>
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
						<a href="<?php echo ADMIN_PATH; ?>/categories/change_category_status/1/<?php echo $row->id; ?>">
							<span class="label label-danger lbl"><?php echo $row->status; ?></span>
						</a>
						<?php }else if($mode==0){?>
						<a href="<?php echo ADMIN_PATH; ?>/categories/change_category_status/0/<?php echo $row->id; ?>">
							<span class="label label-success lbl"><?php echo $row->status; ?></span>
						</a>
						<?php }else if($mode<0){?>
							<span class="label label-default lbl"><?php echo $row->status; ?></span>
						<?php }?>
					</td>
					<td>
						<?php
							if($row->featured=='Yes'){
								$mode=0;
							}else if($row->featured=='No'){
								$mode=1;
							}else{
								$mode=-1;
							}
						?>
						<?php if($mode==1){?>
						<a href="<?php echo ADMIN_PATH; ?>/categories/featured_category/1/<?php echo $row->id; ?>">
							<span class="label label-danger lbl"><?php echo $row->featured; ?></span>
						</a>
						<?php }else if($mode==0){?>
						<a href="<?php echo ADMIN_PATH; ?>/categories/featured_category/0/<?php echo $row->id; ?>">
							<span class="label label-success lbl"><?php echo $row->featured; ?></span>
						</a>
						<?php }else if($mode<0){?>
							<span class="label label-default lbl"><?php echo $row->featured; ?></span>
						<?php }?>
					</td>
					<td>
						<div class="btn-group">
							<a class="btn btn-primary" href="<?php echo ADMIN_PATH; ?>/categories/view_category/<?php echo $row->id; ?>">
								<span class="fa fa-eye"></span>
							</a>
							<a class="btn btn-primary" href="<?php echo ADMIN_PATH; ?>/categories/add_edit_categories_form/<?php echo $row->id; ?>">
								<span class="fa fa-edit"></span>
							</a>
							<a class="btn btn-primary" href="<?php echo ADMIN_PATH; ?>/categories/delete_category/<?php echo $row->id; ?>">
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
					<th>Status</th>
					<th>Featured</th>
					<th>Actions</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>


<?php 
$this->load->view(ADMIN_PATH.'/templates/footer',$this->data); 
?>