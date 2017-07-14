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
					<th>Title</th>
					<th>Image</th>
					<th>Added By</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php if($sliderList->num_rows()>0){ ?>
			<?php foreach($sliderList->result() as $row){ ?>
				<tr>
					<td><?php echo $row->title; ?></td>
					<td>
						<?php 
						if($row->slide!=''){
							$slide=SLIDER_PATH.$row->slide;
						}else{
							$slide=SLIDER_DEFAULT;
						}
						?>
						<img src="<?php echo $slide; ?>" alt="<?php echo $row->slide; ?>" width="100px" />
					</td>
					<td><?php echo $row->added_by; ?></td>
					<td>
						<?php
							if($row->status=='Publish'){
								$mode=0;
							}else if($row->status=='Unpublish'){
								$mode=1;
							}else{
								$mode=-1;
							}
						?>
						<?php if($mode==1){?>
						<a href="<?php echo ADMIN_PATH; ?>/slider/change_slider_status/1/<?php echo $row->id; ?>">
							<span class="label label-danger lbl"><?php echo $row->status; ?></span>
						</a>
						<?php }else if($mode==0){?>
						<a href="<?php echo ADMIN_PATH; ?>/slider/change_slider_status/0/<?php echo $row->id; ?>">
							<span class="label label-success lbl"><?php echo $row->status; ?></span>
						</a>
						<?php }else if($mode<0){?>
							<span class="label label-default lbl"><?php echo $row->status; ?></span>
						<?php }?>
						
						
					</td>
					<td>
						<div class="btn-group">
							<a class="btn btn-primary" href="<?php echo ADMIN_PATH; ?>/slider/view_slider/<?php echo $row->id; ?>">
								<span class="fa fa-eye"></span>
							</a>
							<a class="btn btn-primary" href="<?php echo ADMIN_PATH; ?>/slider/add_edit_slide_form/<?php echo $row->id; ?>">
								<span class="fa fa-edit"></span>
							</a>
							<a class="btn btn-primary" href="<?php echo ADMIN_PATH; ?>/slider/delete_slider/<?php echo $row->id; ?>">
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
					<th>Title</th>
					<th>Image</th>
					<th>Added By</th>
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