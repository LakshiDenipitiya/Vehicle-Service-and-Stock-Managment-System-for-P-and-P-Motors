<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Goods Receive Notice
		<small>create</small>
	</h1>

	<script type="text/javascript">

	// get sparepart
	function getSparepat (sparepartId) {
		
		$.ajax({
			type : 'GET',
			url : '<?php echo base_url("Sparepart/getSparepartById/"); ?>' +sparepartId ,
			success : function  (response) {
				var data = JSON.parse(response);
				$("#sparepart_code").val(data.code);
				$("#categoryofsparepart").val(data.categoryofsparepart);
				$("#buyingprice").val(data.originalprice);
				calculate();
			},
			error : function  (error) {
				console.log(error);
			}
		});
	}

	// calculate total amount
	function calculate () {
		var quantity = $("#quantity").val();
		var buyingprice = $("#buyingprice").val();

		if (quantity != "" && buyingprice != "") {
			$("#amount").val(quantity * buyingprice);
			$("#totalprice").val(quantity * buyingprice);
			$("#netprice").val(quantity * buyingprice);

			$("#discount").attr("max", quantity * buyingprice);
			calculate_net_amount();
			return;
		};

		$("#amount").val("");
		$("#totalprice").val("");
		$("#netprice").val("");
		$("#discount").removeAttr("max");
		calculate_net_amount();

	} 

	// calculate net amount
	function calculate_net_amount () {
		var amount = $("#amount").val();
		var discount = $("#discount").val();

		if (amount != "" && discount != "") {
			$("#netprice").val(amount - discount);
			return;
		};

		if (amount != "") {
			$("#netprice").val(amount);
			return;
		};

		$("#netprice").val("");
	}

	$(document).ready(function(){

            //using select2 dropdown
            $("#supplier_id").select2();
            $("#code").select2();

            // on code change get data from service
            $("#code").on('change', () => {
            	var code = $("#code").val();

            	if (code == "") {
            		$("#sparepart_code").val("");
            		$("#categoryofsparepart").val("");
            		$("#buyingprice").val("");
            		$("#quantity").val("");
            		$("#amount").val("");
            		$("#totalprice").val("");
            		$("#netprice").val("");
            		return;
            	};

            	getSparepat(code);
            });

            // on quantity keyup
            $("#quantity").on("keyup", function  () {
            	calculate();
            });

            // on discount keyup
            $("#discount").on("keyup", function  () {
            	calculate_net_amount();
            });

            
        });//end of the document.ready function
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


	<div class="box box-default">
		
		<div class="box-header with-border"><h3 align="center" class="box-title">Goods Receive Notice Registration Form</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">

			<?php echo form_open()?>

			<div class = "row">
				<div class= "required col-md-2 col-md-offset-1">
					<?php echo form_label("Good Receive Notice No")?>
				</div>
				<div class= "col-md-3 col-md-offset-0">
					<?php echo form_input(array("id"=>"goodsreceivenoticeno", "name" => "goodsreceivenoticeno", "class" => "form-control","value"=>set_value('goodsreceivenoticeno')))?>
					<?php echo form_error('goodsreceivenoticeno');?>
				</div>
				
				
				<div class= "required col-md-2 col-md-offset">
					<?php echo form_label("Goods Receive Notice Date")?>
				</div>
				<div class= "col-md-3 col-md-offset-0">
					<?php echo form_input(array("id"=>"goodsreceivenoticedate", "name" => "goodsreceivenoticedate", "class" => "form-control","type"=>"date","value"=>set_value('goodsreceivenoticedate')))?>
					<?php echo form_error('goodsreceivenoticedate');?>
				</div>

				
			</div>

			
		</br>
		<div class = "row">
			<div class= "required col-md-2 col-md-offset-1">
				<?php echo form_label("Supplier Invoice No")?>
			</div>
			<div class= "col-md-3 col-md-offset-0">
				<?php echo form_input(array("id"=>"invoiceno", "name" => "invoiceno", "class" => "form-control","value"=>set_value('invoiceno')))?>
				<?php echo form_error('invoiceno');?>
			</div>


			<div class ="required col-md-2 col-md-offset-0">
				<?php echo form_label('Supplier Name');?>
			</div>
			<div class= "col-md-2"> 
				<?php 

				$data = array(
					'id'=>'supplier_id',
					'class'=>'form-control',
					'name'=>'companyname');

				echo form_dropdown('supplier_id',$supplierList,set_value('supplier_id'),$data);
				echo form_error('supplier_id');?>
			</div>
			<div class= "col-md-1 col-md-offset-0"> 

				<a href="<?php echo base_url('Supplier/create'); ?>" class="btn btn-info">Add New</a>

			</div>

		</div>
	</br>
	<div class = "row">
		<div class= "required col-md-2 col-md-offset-1">
			<?php echo form_label("Spare parts details")?>
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
				<th>Amount</th> 
				<!-- <th></th>  -->

			</tr> 
			<tr>  
				
				<td>
					<?php echo form_dropdown('sparepart_id', $sparepart_list_dropdown, set_value('sparepart_id'), array("class" => "form-control", "id" => "code")) ?>
				</td> 
				<td>

					<?php echo form_input(array("id"=>"sparepart_code", "name" => "sparepart_code", "readonly class" => "form-control hide","value"=>set_value('sparepart_code')))?>
					<?php echo form_input(array("id"=>"categoryofsparepart", "name" => "categoryofsparepart", "readonly class" => "form-control","value"=>set_value('categoryofsparepart')))?>
				</td> 
				<td><?php echo form_input(array("id"=>"buyingprice", "name" => "buyingprice", "readonly class" => "form-control","value"=>set_value('buyingprice')))?></td>
				<td><?php echo form_input(array("id"=>"quantity","type"=>"number", "name" => "quantity", "class" => "form-control","value"=>set_value('quantity')))?></td> 
				<td><?php echo form_input(array("id"=>"amount","type"=>"number", "name" => "amount", "readonly class" => "form-control","value"=>set_value('amount')))?></td>

				<!-- <td><button type="button" name="add" id="addrow1" class="btn btn-success">Add More</button></td>   -->
			</tr>  
		</table>  

	</div>  
</div>  

<div class = "row" style="display: none;">
	<div class= "required col-md-2 col-md-offset-3">
		<?php echo form_label("Total Price")?>
	</div>
	<div class= "col-md-4 col-md-offset-0">
		<?php echo form_input(array("id"=>"totalprice","type"=>"number", "name" => "totalprice", "class" => "form-control","value"=>set_value('totalprice')))?>
		<?php echo form_error('totalprice');?>
	</div>
</div>

</br>

<div class = "row">
	<div class= "col-md-2 col-md-offset-3">
		<?php echo form_label("Discount")?>
	</div>
	<div class= "col-md-4 col-md-offset-0">
		<?php echo form_input(array("id"=>"discount","type"=>"number", "name" => "discount", "class" => "form-control","value"=>set_value('discount')))?>
		<?php echo form_error('discount');?>
	</div>
</div>

</br>



<div class = "row">
	<div class= "required col-md-2 col-md-offset-3">
		<?php echo form_label("Net Price")?>
	</div>
	<div class= "col-md-4 col-md-offset-0">
		<?php echo form_input(array("id"=>"netprice", "name" => "netprice", "readonly class" => "form-control","value"=>set_value('netprice')))?>
		<?php echo form_error('netprice');?>
	</div>
</div>

</br>

<div class = "row">
	<div class= "col-md-2 col-md-offset-5">
		<?php echo form_submit(array('value' => 'Save','class'=>'btn btn-primary form-control'))?>
	</div>
	<div class= "col-md-2 col-md-offset-0">
		<?php echo form_reset(array('value' => 'Clear','class'=>'btn btn-block btn-default '))?>
	</div>
</div>
<?php echo form_close()?>
</div>
</div>



</section>
<!-- /.content -->


