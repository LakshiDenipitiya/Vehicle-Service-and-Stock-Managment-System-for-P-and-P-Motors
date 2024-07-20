<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Complaint
		<small>List</small>
		<?php echo anchor("/Complaint/create", '<span class="fa fa-files-o"> Create</span>',array('class' => 'btn btn-primary pull-right'));?>
	</h1>
</section>


<!-- Main content -->
<section class="content">

	<!-- Display success Message -->
	<?php if($this->session->flashdata("message")){ ?>
	
	<!--display sucess message-->
	<p class="success">
		<?php echo $this->session->flashdata("message");?>
	</p>
	
	<?php } ?>

	
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Complaint List</h3>
		</div>
		<div class="box-body">
			
			
			<div class="table table-responsive">
				<table class="table table-bordered table-striped table-hover dataTable" id="complaint">
					<thead>
						<tr>
							<th>Complaint No</th>
							<th>Customer Name</th>
							<th>Email</th>
							<th>Phone no</th>
							<th>Complaint Title</th> 
							<th>Complaint Description</th>
							<th>Reply</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<!--get color list as array-->
						<?php foreach ($complaintList as $key => $complaint) {?>
						<tr>
							<td><?php echo $complaint->comp_id; ?></td>
							<td><?php echo $complaint->title.'.&nbsp;'.$complaint->firstname.'&nbsp;'.$complaint->lastname; ?></td>
							<td><?php echo $complaint->email; ?></td>
							<td><?php echo $complaint->phoneno; ?></td>
							<td><?php echo $complaint->inbreif; ?></td>
							<td><?php echo $complaint->description; ?></td>
							<td><?php echo $complaint->reply; ?></td>
							<td>
								<!--buttons-->
								<?php echo anchor("Complaint/Edit/".$complaint->comp_id,'<span class="fa fa-edit"> Reply</span>',(array('class'=>'btn btn-primary btn-xs ')))?> 
							
							</td>
						</tr>

						<!-- <li><?php echo $key . " : " .$supplier->name; ?></li> -->
						<?php }?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->

<!--data table load-->
<script type="text/javascript">
$(document).ready(function(){
	$('#complaint').DataTable();
});
</script>








