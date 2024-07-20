<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Supplier
		<small>List</small>
		<?php echo anchor("/Supplier/create", '<span class="fa fa-files-o"> Create</span>',array('class' => 'btn btn-primary pull-right'));?>
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
			<h3 class="box-title">Supplier List</h3>
		</div>
		<div class="box-body">
			
			
			<div class="table table-responsive">
				<table class="table table-bordered table-striped table-hover dataTable" id="supplier">
					<thead>
						<tr>
							<th>Code</th> 
							<th>Company Name</th>
							<th>Address</th> 
							<th>Phone No</th>
							<th>Fax No</th> 
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($supplierList as $key => $supplier) {?>
						<tr>
							<td><?php echo $supplier->code; ?></td>
							<td><?php echo $supplier->companyname; ?></td>
							<td><?php echo $supplier->no.'&nbsp;,'.$supplier->lane.'&nbsp;,'.$supplier->city; ?></td>
							<td><?php echo $supplier->phoneno; ?></td>
							<td><?php echo $supplier->faxno; ?></td>
							<td><?php echo $supplier->email; ?></td>

							<td>
								<?php echo anchor("Supplier/Edit/".$supplier->id,'<span class="fa fa-edit"> Edit</span>',(array('class'=>'btn btn-primary ')))?> 
								<!--	<?php echo anchor("Supplier/Delete/".$supplier->id,'<span class="fa fa-remove"> Delete</span>', array('class' => 'btn btn-danger ','onclick' => "return confirm('Are you sure?')"));?> -->
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
	$('#supplier').DataTable();
});
</script>

