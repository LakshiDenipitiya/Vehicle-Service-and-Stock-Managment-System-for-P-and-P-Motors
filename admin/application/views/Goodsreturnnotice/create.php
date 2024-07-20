<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Goods Return Notice
		<small>create</small>
	</h1>

	<script type="text/javascript" >
	$(document).ready(function(){

		// set default date
		var now = new Date();

		var day = ("0" + now.getDate()).slice(-2);
		var month = ("0" + (now.getMonth() + 1)).slice(-2);
		var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
		$("#createddate").val(today);

		function calculate_amount () {

			var buyingprice = $("#buyingprice").val();
			var return_quantity = $("#return_quantity").val();

			if (buyingprice != '' && return_quantity != '') {
				$("#amount").val(buyingprice * return_quantity);
				return;
			};

			$("#amount").val('');
		}


		$("#return_quantity").on("keyup", function () {
			calculate_amount();
		});

		// on good receve notice id changed
		$("#goodsreceivenotice_id").on("change", function  () {

			var goodsreceivenotice_id = $("#goodsreceivenotice_id").val();

			if (goodsreceivenotice_id == '') {
				$("#supplier_id").val('');
				$("#supplier_name").val('');
				$("#code").val('');
				$("#categoryofsparepart").val('');
				$("#buyingprice").val('');
				$("#quantity").val('');

				$("#return_quantity").removeAttr("max");
				calculate_amount();
				return
			};

			$.ajax({
				type : 'GET',
				url : '<?php echo base_url("Goodsreceivenotice/getById/"); ?>' +goodsreceivenotice_id ,
				success : function  (response) {
					if (response == 'null') {return};

					var data = JSON.parse(response);

					$("#supplier_id").val(data.suppliername);
					$("#supplier_name").val(data.companyname);
					$("#code").val(data.code);
					$("#categoryofsparepart").val(data.categoryofsparepart);
					$("#buyingprice").val(data.buyingprice);
					$("#quantity").val(data.quantity);

					$("#return_quantity").attr("max", data.quantity);
					calculate_amount();

				},
				error : function  (error) {
					console.log(error);
				}
			});


		});

});

</script>
<style>
.required:after {
	content:" *";
	position: relative;
	top: 0;
	right: -1px;
	color: red;

}
</style>
</section>

<!-- Main content -->
<section class="content">
	<div class="container">

		<div class="box box-default">

			<div class="box-header with-border"><h3 align="center" class="box-title">Goods Return Note Registration Form</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

				</div>
			</div>
			<div class="box-body">

				<?php echo form_open()?>
				<div class= "form-group">

					

					<div class = "row">
						<div class= "required col-md-2 col-md-offset-0">
							<?php echo form_label("Goods Return Notice No")?>
						</div>
						<div class= "col-md-3">
							<?php echo form_input(array("id"=>"goodsreturnnoticeno", "name" => "goodsreturnnoticeno", "class" => "form-control","value"=>set_value('goodsreturnnoticeno')))?>
							<?php echo form_error('goodsreturnnoticeno');?>
						</div>

						<div class= "required col-md-2 col-md-offset-0">
							<?php echo form_label("Goods Return Notice Date")?>
						</div>
						<div class= "col-md-3">
							<?php echo form_input(array("id"=>"createddate", "name" => "createddate", "class" => "form-control","type"=>"date","value"=>set_value('createddate')))?>
							<?php echo form_error('createddate');?>
						</div>
					</div>

				</br>
				<div class = "row">

					<div class= "required col-md-2 col-md-offset-0">
						<?php echo form_label("Select goods receive notice no")?>
					</div>
					<div class= "col-md-3 col-md-offset-0">	
						<?php 

						$data = array(
							'id'=>'goodsreceivenotice_id',
							'class'=>'form-control',
							'name'=>'goodsreceivenoticeno',
							);

						echo form_dropdown ('goodsreceivenotice_id',$goodsreceivenoticeList,set_value('goodsreceivenotice_id'),$data);
						echo form_error('goodsreceivenotice_id');?>
						
					</div>

					<div class= "required col-md-2 col-md-offset-0">
						<?php echo form_label("Supplier Name")?>
					</div>
					<div class= "col-md-3 col-md-offset-0">	
						<?php 

						$data_supplier_id = array(
							'id'=>'supplier_id',
							'readonly class'=>'form-control hide',
							'name'=>'supplier_name',
							);

						$data_supplier_name = array(
							'id'=>'supplier_name',
							'readonly class'=>'form-control',
							'name'=>'supplier_name',
							);

						echo form_input('supplier_id',set_value('supplier_id'),$data_supplier_id);
						echo form_input('supplier_name',set_value('supplier_name'),$data_supplier_name);

						?>
					</div>

				</div>
			</br>

			<div class = "row">
				<div class= "required col-md-2 col-md-offset-1">
					<?php echo form_label("Sparepart details")?>
				</div>
			</div>
		</br>
		<div class = "row">
			<div class="table-responsive col-md-10 col-md-offset-1">  
				<table class="table table-bordered" id="dynamic_field">  
					<tr>  
						<th>Code</th>  
						<th>Category of Sparepart</th> 
						<th>Unit Price</th> 
						<th>Quantity</th> 
						<th>Return Quantity</th> 
						<th>Amount</th> 

					</tr> 
					<tr>  
						<td><?php echo form_input(array("id"=>"code", "name" => "code", "class" => "form-control","value"=>set_value('code')))?></td> 
						<td><?php echo form_input(array("id"=>"categoryofsparepart", "name" => "categoryofsparepart", "readonly class"=>"form-control","value"=>set_value('categoryofsparepart')))?></td> 
						<td><?php echo form_input(array("id"=>"buyingprice", 'type' => 'number', "name" => "buyingprice", "readonly class"=>"form-control","value"=>set_value('buyingprice')))?></td>
						<td><?php echo form_input(array("id"=>"quantity", 'type' => 'number', "name" => "quantity", "readonly class" => "form-control","value"=>set_value('quantity')))?></td> 
						<td><?php echo form_input(array("id"=>"return_quantity", 'type' => 'number', "name" => "return_quantity", "class" => "form-control","value"=>set_value('return_quantity')))?></td> 
						<td><?php echo form_input(array("id"=>"amount", 'type' => 'number', "name" => "amount", "readonly class"=>"form-control","value"=>set_value('amount')))?></td>

					</tr>  
				</table>  

			</div>  
		</div>  
	</br>

</fieldset>
</div>



<div class = "row">
	<div class= "col-md-2 col-md-offset-4">
		<?php echo form_submit(array('value' => 'Save','class'=>'btn btn-primary form-control'))?>
	</div>
	<div class= "col-md-2 col-md-offset-0">
		<?php echo form_reset(array('value' => 'Clear','class'=>'btn btn-block btn-default btn-sm'))?>
	</div>
</div>
<?php echo form_close()?>
</div>
</div>

</div>

</section>
<!-- /.content -->
