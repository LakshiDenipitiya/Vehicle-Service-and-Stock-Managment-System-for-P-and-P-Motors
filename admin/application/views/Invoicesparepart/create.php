<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Invoice
		<small>Genarate</small>
	

	</h1>

	<style>
	.required:after {
		content:" *";
		position: relative;
		top: 0;
		right: -1px;
		color: red;

	}

	</style> 
	<script>
	$(document).ready(function () {
		var counter = 0;

		$("#addrow1").on("click", function () {
			var newRow = $("<tr>");
			var cols = "";

			cols += '<td><input type="text" class="form-control" name="code' + counter + '"/></td>';
			cols += '<td><input type="text" class="form-control" name="categoryofsparepart' + counter + '"/></td>';
			cols += '<td><input type="text" class="form-control" name="unitprice' + counter + '"/></td>';
			cols += '<td><input type="text" class="form-control" name="quantity' + counter + '"/></td>';
			cols += '<td><input type="text" class="form-control" name="amount' + counter + '"/></td>';

			cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
			newRow.append(cols);
			$("#dynamic_field").append(newRow);
			counter++;
		});



		$("#dynamic_field").on("click", ".ibtnDel", function (event) {
			$(this).closest("tr").remove();       
			counter -= 1
		});

	});
	</script>

</section>

<!-- Main content -->
<section class="content">


	<div class="box box-default">
		
		<div class="box-header with-border"><h3 align="center" class="box-title">Invoice Genaration Form</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">

			<!--form open from save function-->
			<?php echo form_open("Invoice/save")?>

			<!--color input feild-->
			<div class = "row">
				<div class= "required col-md-2 col-md-offset-3">
					<?php echo form_label("Invoice No")?>
				</div>
				<div class= "col-md-4 col-md-offset-0">
					<?php echo form_input(array("id"=>"invoiceno", "name" => "invoiceno", "class" => "form-control","value"=>set_value('invoiceno')))?>
					<?php echo form_error('invoiceno');?>
				</div>
			</div>
			
		</br>
		<div class = "row">
			<div class= "col-md-2 col-md-offset-3">
				<?php echo form_label("Customer Name")?>
			</div>
			<div class= "col-md-4 col-md-offset-0">
				<?php echo form_input(array("id"=>"customername", "name" => "customername", "class" => "form-control","value"=>set_value('customername')))?>
				<?php echo form_error('customername');?>
			</div>
		</div>
		
	</br>
<!-- 	<div class = "row">
		<div class= "col-md-2 col-md-offset-3">
			<?php echo form_label("Vehicle No")?>
		</div>
		<div class= "col-md-4 col-md-offset-0">
			<?php echo form_input(array("id"=>"vehicleno", "name" => "vehicleno", "class" => "form-control","value"=>set_value('vehicleno')))?>
			<?php echo form_error('vehicleno');?>
		</div>
	</div>
	
</br>
<div class = "row">
	<div class= "col-md-2 col-md-offset-3">
		<?php echo form_label("Meter reading")?>
	</div>
	<div class= "col-md-4 col-md-offset-0">
		<?php echo form_input(array("id"=>"meterreading", "name" => "meterreading", "class" => "form-control","value"=>set_value('meterreading')))?>
		<?php echo form_error('meterreading');?>
	</div>
</div>

</br> -->
<div class = "row">
	<div class= "required col-md-2 col-md-offset-1">
		<?php echo form_label("Spare parts details")?>
	</div>
</div>
</br>
<div class = "row">
	<div class="table-responsive col-md-offset">  
		<table class="table table-bordered" id="dynamic_field">  
			<tr>  
				<th>Code</th>  
				<th>Category of Sparepart</th> 
				<th>Unit Price</th> 
				<th>Quantity</th> 
				<th>Amount</th> 
				<th></th>

			</tr> 
			<tr>  
				
				<td><?php echo form_input(array("id"=>"code", "name" => "code", "class" => "form-control","value"=>set_value('code')))?></td> 
				<td><?php echo form_input(array("id"=>"categoryofsparepart", "name" => "categoryofsparepart", "readonly class"=>"form-control","value"=>set_value('categoryofsparepart')))?></td> 
				<td><?php echo form_input(array("id"=>"unitprice", "name" => "unitprice", "readonly class"=>"form-control","value"=>set_value('unitprice')))?></td>
				<td><?php echo form_input(array("id"=>"quantity", "name" => "quantity", "class" => "form-control","value"=>set_value('quantity')))?></td> 
				<td><?php echo form_input(array("id"=>"amount", "name" => "amount", "class" => "form-control","value"=>set_value('amount')))?></td>
				<td><button type="button" name="add" id="addrow1" class="btn btn-success">Add More</button></td>  
			</tr>  
		</table>  

	</div>  
</div>  
</br>

<div class = "row">
	<div class= "col-md-2 col-md-offset-3">
		<?php echo form_label("Other payments")?>
	</div>
	<div class= "col-md-4 col-md-offset-0">
		<?php echo form_input(array("id"=>"otherpayments", "name" => "otherpayments", "class" => "form-control","value"=>set_value('otherpayments')))?>
		<?php echo form_error('otherpayments');?>
	</div>
</div>

</br>
<div class = "row">
	<div class= "col-md-2 col-md-offset-3">
		<?php echo form_label("Discount")?>
	</div>
	<div class= "col-md-4 col-md-offset-0">
		<?php echo form_input(array("id"=>"discount", "name" => "discount", "class" => "form-control","value"=>set_value('discount')))?>
		<?php echo form_error('discount');?>
	</div>
</div>

</br>
<div class = "row">
	<div class= "col-md-2 col-md-offset-3">
		<?php echo form_label("Taxes")?>
	</div>
	<div class= "col-md-4 col-md-offset-0">
		<?php echo form_input(array("id"=>"taxes", "name" => "taxes", "class" => "form-control","value"=>set_value('taxes')))?>
		<?php echo form_error('taxes');?>
	</div>
</div>

</br>
<div class = "row">
	<div class= "required col-md-2 col-md-offset-3">
		<?php echo form_label("Total Price")?>
	</div>
	<div class= "col-md-4 col-md-offset-0">
		<?php echo form_input(array("id"=>"totalcost", "readonly class" => "form-control","value"=>set_value('totalcost')))?>
		<?php echo form_error('totalcost');?>
	</div>
</div>

</br>

<!--butotns-->
<div class = "row">
	<div class= "col-md-2 col-md-offset-5">
		<?php echo form_submit(array('value' => 'Save','class'=>'btn btn-primary form-control'))?>
	</div>
	<div class= "col-md-2 col-md-offset-0">
		<?php echo form_reset(array('value' => 'Clear','class'=>'btn btn-block btn-default '))?>
	</div>
</div>
<!--form close-->
<?php echo form_close()?>
</div>
</div>



</section>
<!-- /.content -->


