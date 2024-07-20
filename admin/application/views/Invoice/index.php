<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Invoice
		<small>List</small>
		
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
 								<?php echo anchor("Invoice/viewjs/".$invoice->id,'<span class="fa fa-eye"> view</span>',(array('class'=>'btn btn-info ')))?> 
<!-- 							<?php echo anchor("Invoice/viewsp/".$invoice->id,'<span class="fa fa-eye"> viw</span>', (array('class' => 'btn btn-info ')));?>
 -->								
                                      <!--   <input type="button" value="Detail" class="btn btn-info pull-right" onclick="OpenPopupWindow('<?php echo $invoice->vehicle_id; ?>');"/> -->
                                    
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


<!-- Modal -->
<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Invoice Details</h4>
            </div>
            <div class="modal-body" id="set_content">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div> -->
<!-- /.content -->

<!--data table load-->
<script type="text/javascript">
$(document).ready(function(){
	$('#colour').DataTable();
});

// function OpenPopupWindow(id)
//     {

//         $.ajax({
//             type: "GET",
//             url: _BASE_URL + 'get_jbnew?v_id='+id,
//             data: {key_id: id},
//             success: function (data) {
//                 $('#set_content').html(data); // set data for modal
//                 $("#myModal").modal('show');// modal id
//             }
//         });
//     }
</script>








