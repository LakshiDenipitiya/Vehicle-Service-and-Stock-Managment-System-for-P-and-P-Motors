<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Vehicle
		<small>List</small>
		<?php echo anchor("/Vehicle/create", '<span class="fa fa-files-o"> Create</span>',array('class' => 'btn btn-primary pull-right'));?>
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
			<h3 class="box-title">Vehicle List</h3>
		</div>
		<div class="box-body">
			
			
			<div class="table table-responsive">
				<table class="table table-bordered table-striped table-hover dataTable" id="vehicle">
					<thead>
						<tr>
							<th>Vehicle No</th>
							<th>Name of the Owner</th> 
							<th>Vehicle Model</th> 
							<th>Colour</th>
							<!-- <th>Status</th> -->
							<th>Purchase Date</th> 
				<!-- 			<th>1 st Service Date</th>
							<th>Last Service Date</th> -->
							<!-- <th>Vehicle Type</th> -->
							<!--<th>Next Service Date</th>-->
							<th>Action</th>
							<!-- <th></th> -->
						</tr>
					</thead>
					<tbody>
						<?php foreach ($vehicleList as $key => $vehicle) {?>
						<tr>
							<td><?php echo $vehicle->vehicleno; ?></td>
							<td><?php echo $vehicle->firstname." ".$vehicle->lastname; ?></td>
							<td><?php echo $vehicle->vehiclemodel; ?></td>
							<td><?php echo $vehicle->colour; ?></td>
							<!-- <td><?php echo $vehicle->status; ?></td> -->
							<td><?php echo $vehicle->purchasedate; ?></td>
							<!-- <td><?php echo $vehicle->firstservicedate; ?></td>
							<td><?php echo $vehicle->lastservicedate; ?></td> -->
							<!-- <td><?php echo $vehicle->vehicletype; ?></td> -->
							<!--<td><?php echo $vehicle->nextservicedate; ?></td>-->
							<td>
								<?php echo anchor("Vehicle/Edit/".$vehicle->vehicle_id,'<span class="fa fa-edit"> Edit</span>',(array('class'=>'btn btn-xs btn-primary ')))?> 
								<!-- </td> -->
								<!-- <td>	 -->
								<?php echo anchor("vehicle/Delete/".$vehicle->vehicle_id,'<span class="fa fa-remove"> Delete</span>', array('class' => 'btn btn-xs btn-danger ','onclick' => "return confirm('Are you sure?')"));?>
								<?php echo anchor("Vehicle/View/".$vehicle->vehicle_id,'<span class="fa fa-eye"> view</span>',(array('class'=>'btn btn-xs btn-info ')))?> 
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
	$('#vehicle').DataTable();
});
</script>
