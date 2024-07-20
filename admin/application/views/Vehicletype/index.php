<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Vehicle Type
		<small>List</small>
		<?php echo anchor("/Vehicletype/create", '<span class="fa fa-files-o"> Create</span>',array('class' => 'btn btn-primary pull-right'));?>
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
			<h3 class="box-title">Vehicle Type List</h3>
		</div>
		<div class="box-body">
			
			
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover dataTable" id="vehicletype">
					<thead>
						<tr>
							<th>Id</th> 
							<th>Type of Vehicle</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($vehicletypeList as $key => $vehicletype) {?>
						<tr>
							<td><?php echo $vehicletype->id; ?></td>
							<td><?php echo $vehicletype->typeofvehicle; ?></td>
							<td>
								<?php echo anchor("Vehicletype/Edit/".$vehicletype->id,'<span class="fa fa-edit"> Edit</span>',(array('class'=>'btn btn-primary ')))?>  
								<?php echo anchor("Vehicletype/Delete/".$vehicletype->id,'<span class="fa fa-remove"> Delete</span>', array('class' => 'btn btn-danger ','onclick' => "return confirm('Are you sure?')"));?>
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
	$('#vehicletype').DataTable();
});
</script>
