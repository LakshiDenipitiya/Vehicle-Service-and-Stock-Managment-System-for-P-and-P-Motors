<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Invoice
		<small>List</small>
		<?php echo anchor("/Invoicesparepart/create", '<span class="fa fa-files-o"> Create</span>',array('class' => 'btn btn-primary pull-right'));?>
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
			<h3 class="box-title">Invoice List</h3>
		</div>
		<div class="box-body">
			
			
			<div class="table table-responsive">
				<table class="table table-bordered table-striped table-hover dataTable" id="colour">
					<thead>
						<tr>
							<th>Invoice No</th> 
							<th>Customer </th> 
							<th>Vehicle </th> 
							<th>Total Cost</th> 
							<th>Discount</th>
							<th>Net Price</th> 
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<!--get color list as array-->
						<?php foreach ($invoiceList as $key => $invoice) {?>
						<tr>
							<td><?php echo $invoice->invoiceno; ?></td>
							<td><?php echo $invoice->cname; ?></td>
							<td><?php echo $invoice->vehicleno; ?></td>
							<td class="text-right"> <?php echo number_format($invoice->totalcost, 2, '.', ''); ?></td>
							<td class="text-right"><?php echo number_format($invoice->discount, 2, '.', ''); ?></td>
							<td class="text-right"><?php echo number_format($invoice->otherpayments, 2, '.', ''); ?></td>
							<td >
								<!--buttons-->
<!-- 								<?php echo anchor("Invoice/viewjs/".$invoice->id,'<span class="fa fa-eye"> view</span>',(array('class'=>'btn btn-info ')))?> 
 -->								<?php echo anchor("Invoice/viewsp/".$invoice->id,'<span class="fa fa-eye"> view</span>', (array('class' => 'btn btn-info ')));?>
								
                                    
                                    
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
	$('#colour').DataTable();
});



</script>








