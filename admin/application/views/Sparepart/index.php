<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Spare Part
		<small>List</small>
		<?php echo anchor("/Sparepart/create", '<span class="fa fa-files-o"> Create</span>',array('class' => 'btn btn-primary pull-right'));?>
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
			<h3 class="box-title">Spare Part List</h3>
		</div>
		<div class="box-body">
			
			
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover dataTable" id="sparepart">
					<thead>
						<tr>
							<th>Code</th> 
							<th>Category of Spare part</th>
							<th>Original Price</th>
							<th>Selling Price</th>
							<th>Stock Location</th>
							<th>Re-order Level</th>
							<th>Max Stock Level</th>
					<!--<th>Created Date</th>
					<th>Created time</th>
					<th>Modified Date</th>
					<th>Modified time</th>
					<th>Status</th>-->

					<th>Action</th>
					<th></th>
					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($sparepartList as $key => $sparepart) {?>
				<tr>
					<td><?php echo $sparepart->code; ?></td>
					<td><?php echo $sparepart->categoryofsparepart; ?></td>
					<td><?php echo $sparepart->originalprice; ?></td>
					<td><?php echo $sparepart->sellingprice; ?></td>
					<td><?php echo $sparepart->cupboard.'&nbsp;'.$sparepart->row.'&nbsp;'.$sparepart->bin; ?></td>
					<td><?php echo $sparepart->reorderlevel; ?></td>
					<td><?php echo $sparepart->maxstocklevel; ?></td>
					<!--<td><?php echo $sparepart->createddate; ?></td>
					<td><?php echo $sparepart->createdtime; ?></td>
					<td><?php echo $sparepart->modifieddate; ?></td>
					<td><?php echo $sparepart->modifiedtime; ?></td>
					<td><?php echo $sparepart->status; ?></td>-->
					<td>
						<?php echo anchor("Sparepart/Edit/".$sparepart->id,'<span class="fa fa-edit"> Edit</span>',(array('class'=>'btn btn-primary ')))?>   
					</td>
					<td>
						<?php echo anchor("Sparepart/Delete/".$sparepart->id,'<span class="fa fa-remove"> Delete</span>', array('class' => 'btn btn-danger ','onclick' => "return confirm('Are you sure?')"));?>
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
	$('#sparepart').DataTable();
});
</script>





