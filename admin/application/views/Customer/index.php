<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Customer
		<small>List</small>
		<?php echo anchor("/Customer/create", '<span class="fa fa-files-o"> Create</span>',array('class' => 'btn btn-primary pull-right'));?>
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
			<h3 class="box-title">Customer List</h3>
		</div>
		<div class="box-body">

			<div class="table table-response">
				<table class="table table-bordered table-striped table-hover dataTable" id="customer">		
					<thead>
						<tr>
							<th>Title</th> 
							<th>Customer Name</th> 
							<th>Address</th>
							<th>NIC No</th> 
							<th>Phone No</th>
							<th>Email</th>
							<th>Action</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($customerList as $key => $customer) {?>
						<tr>
							<td><?php echo $customer->title ?></td>
							<td><?php echo $customer->firstname.'&nbsp;'.$customer->lastname; ?></td>
							<td><?php echo $customer->no.'&nbsp;,'.$customer->lane.'&nbsp;,'.$customer->city; ?></td>
							<td><?php echo $customer->nicno; ?></td>
							<td><?php echo $customer->phoneno; ?></td>
							<td><?php echo $customer->email; ?></td>
							<td>
								<?php echo anchor("Customer/Edit/".$customer->id,'<span class="fa fa-edit"> Edit</span>',(array('class'=>'btn btn-primary ')))?>   
							</td>
							<td>
								<?php echo anchor("Customer/Delete/".$customer->id,'<span class="fa fa-remove"> Delete</span>', array('class' => 'btn btn-danger ','onclick' => "return confirm('Are you sure?')"));?>
							</td>
						</tr>

						<!-- <li><?php echo $key . " : " .$customer->name; ?></li> -->
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
	$('#customer').DataTable();
});
</script>
