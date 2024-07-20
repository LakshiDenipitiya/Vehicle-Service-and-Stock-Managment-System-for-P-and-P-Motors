<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Service Type Services
		<small>List</small>
		<?php echo anchor("/Service/create", '<span class="fa fa-files-o"> Create</span>',array('class' => 'btn btn-primary pull-right'));?>
	</h1>
</section>


<!-- Main content -->
<section class="content">

	<!-- Display success Message -->
	<?php if($this->session->flashdata("message")){ ?>
	
	<p class="success">
		<?php echo $this->session->flashdata("message");?>
	</p>
	
	<?php } ?>

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Service Type Service List</h3>
		</div>
		<div class="box-body">
			
			
			<div class="table table-responsive">
				<table class="table table-bordered table-striped table-hover dataTable" id="service">
					<thead>
						<tr>
							<th>Code</th> 
							<th>Type</th>
							<th>Cost(Rs.)</th>
							<!--<th>Created Date</th>
							<th>Modified Date</th>
							<th>Modified Time</th>
							<th>Status</th>-->
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($serviceList as $key => $service) {?>
						<tr>
							<td><?php echo $service->code; ?></td>
							<td><?php echo $service->type; ?></td>
							<td><?php echo $service->cost; ?></td>
							<!--<td><?php echo $service->createddate; ?></td>
							<td><?php echo $service->modifieddate; ?></td>
							<td><?php echo $service->modifiedtime; ?></td>
							<td><?php echo $service->status; ?></td>-->

							<td>
								<?php echo anchor("Service/Edit/".$service->id,'<span class="fa fa-edit"> Edit</span>',(array('class'=>'btn btn-primary ')))?> 
								<?php echo anchor("Service/Delete/".$service->id,'<span class="fa fa-remove"> Delete</span>', array('class' => 'btn btn-danger ','onclick' => "return confirm('Are you sure?')"));?>
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

<script type="text/javascript">
$(document).ready(function(){
	$('#service').DataTable();
});
</script>









