<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Stock
		<small>List</small>
		<!-- <?php echo anchor("/Stock/create", "Create",array('class' => 'btn btn-primary pull-right'));?>-->
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
			<h3 class="box-title">Stock List</h3>
		</div>
		<div class="box-body">
			
			
			<div class="table table-responsive">
				<table class="table table-bordered table-striped table-hover dataTable" id="stock">
					<thead>
						<tr>
							<th>Code</th> 
							<th>Spare part</th> 
							<th>Current Stock Level</th> 
							<!-- <th>Last GRN No</th> -->
							<th>Last GRN Price</th> 
							<th>Last GRN Date</th>
						<!-- 	<th>Last GRT No</th>  
							<th>Last GRT Date</th>  -->
							
						</tr>
					</thead>
					<tbody>
						<?php foreach ($stockList as $key => $stock) {?>
						<tr>
							<td><?php echo $stock->code; ?></td>
							<td><?php echo $stock->sparepart; ?></td>
							<td><?php echo $stock->currentstocklevel; ?></td>
							<!-- <td><?php echo $stock->lastgrnno; ?></td> -->
							<td><?php echo $stock->lastgrnprice; ?></td>
							<td><?php echo $stock->lastgrndate; ?></td>
							<!-- <td><?php echo $stock->lastgrtno; ?></td>
							<td><?php echo $stock->lastgrtdate; ?></td> -->
							
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
	$('#stock').DataTable();
});
</script>










