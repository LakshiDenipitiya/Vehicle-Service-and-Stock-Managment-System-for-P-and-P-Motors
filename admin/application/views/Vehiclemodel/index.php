<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Vehicle Model
		<small>List</small>
		<?php echo anchor("/Vehiclemodel/create", '<span class="fa fa-files-o"> Create</span>',array('class' => 'btn btn-primary pull-right'));?>
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
			<h3 class="box-title">Vehicle Model List</h3>
		</div>
		<div class="box-body">
			
			
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover dataTable" id="vehiclemodel">
					<thead>
						<tr>
							<th>Vehicle Type</th> 
							<th>Vehicle Model</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($vehiclemodelList as $key => $vehiclemodel) {?>
						<tr>
							<td><?php echo $vehiclemodel->vehicletype; ?></td>
							<td><?php echo $vehiclemodel->vehiclemodel; ?></td>
							<td>
								<?php echo anchor("Vehiclemodel/Edit/".$vehiclemodel->id,'<span class="fa fa-edit"> Edit</span>',(array('class'=>'btn btn-primary ')))?>   
								<?php echo anchor("Vehiclemodel/Delete/".$vehiclemodel->id,'<span class="fa fa-remove"> Delete</span>', array('class' => 'btn btn-danger ','onclick' => "return confirm('Are you sure?')"));?>
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
	$('#vehiclemodel').DataTable();
});
</script>
