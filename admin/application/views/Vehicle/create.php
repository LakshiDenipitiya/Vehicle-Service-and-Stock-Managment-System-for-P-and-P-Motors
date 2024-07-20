<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Vehicle
		<small>create</small>
	</h1>
	<script type="text/javascript" >
	$(document).ready(function(){

		$("#reason").change(function() {
			if(this.value != "Motor Bike") {
				$("#vehiclemodel_id").attr('disabled', 'disabled');
			}else{
				$("#sellingprice").removeAttr('disabled');
			}
			if(this.value != "Three wheel") {
				$("#vehiclemodel_id").attr('disabled', 'disabled');
			}else{
				$("#sellingprice").removeAttr('disabled');
			}
		});


            //using select2 dropdown
            $("#customer_id").select2();
            $("#vehicletype_id").select2();
            $("#vehiclemodel_id").select2();
            $("#colour_id").select2();
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


	<div class="box box-default">
		
		<div class="box-header with-border"><h3 align="center" class="box-title">Vehicle Registration Form</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div>
		<div class="box-body">

			<?php echo form_open("Vehicle/save")?>
			<div class= "form-group">
				<fieldset class="col-md-10 col-md-offset-1">    	
					<legend>General Information</legend>

					<div class = "row">
						<div class= "required col-md-3 col-md-offset-1">
							<?php echo form_label("Name of the Owner")?>
						</div>
						<div class= "col-md-4 col-md-offset-0">	
							<?php 

							$data = array(
								'id'=>'customer_id',
								'class'=>'form-control',
								'name'=>'firstname');

							echo form_dropdown ('customer_id',$customerList,set_value('customer_id'),$data);
							echo form_error('customer_id');?>
						</div>
						<div class= "col-md-2 col-md-offset-0">	
							
							<a href="<?php echo base_url('customer/create'); ?>" class="btn btn-info">Add New</a>
							
						</div>
					</div>
				</br>
				<div class = "row">
					<div class= "required col-md-3 col-md-offset-1">
						<?php echo form_label("Vehicle Type")?>
					</div>
					<div class= "col-md-4 col-md-offset-0">	
						<?php 

						$data = array(
							'id'=>'vehicletype_id',
							'class'=>'form-control',
							'name'=>'typeofvehicle');

						echo form_dropdown ('vehicletype_id',$vehicletypeList,set_value('vehicletype_id'),$data);
						echo form_error('vehicletype_id');?>
					</div>
					<div class= "col-md-3 col-md-offset-0">	
						
						<a href="<?php echo base_url('vehicletype/create'); ?>" class="btn btn-info">Add New</a>
						
					</div>

				</div> 
			</br>
			<div class = "row">
				<div class= "required col-md-3 col-md-offset-1">
					<?php echo form_label("Vehicle Model")?>
				</div>
				<div class= "col-md-4 col-md-offset-0">	
					<?php 

					$data = array(
						'id'=>'vehiclemodel_id',
						'class'=>'form-control',
						'name'=>'vehiclemodel');

					echo form_dropdown ('vehiclemodel_id',$vehiclemodelList,set_value('vehiclemodel_id'),$data);
					echo form_error('vehiclemodel_id');?>
				</div>
				<div class= "col-md-3 col-md-offset-0">	
					
					<a href="<?php echo base_url('vehiclemodel/create'); ?>" class="btn btn-info">Add New</a>
					
				</div>

			</div>
		</br>

		<div class = "row">
			<div class= "required col-md-3 col-md-offset-1">
				<?php echo form_label("Colour")?>
			</div>
			<div class= "col-md-4 col-md-offset-0">	
				<?php 

				$data = array(
					'id'=>'colour_id',
					'class'=>'form-control',
					'name'=>'colour');

				echo form_dropdown ('colour_id',$colourList,set_value('colour_id'),$data);
				echo form_error('colour_id');?>
			</div>
			<div class= "col-md-3 col-md-offset-0">	
				
				<a href="<?php echo base_url('colour/create'); ?>" class="btn btn-info">Add New</a>
				
			</div>

		</div>
	</br>
	
	<div class = "row">
		<div class= "required col-md-3 col-md-offset-1">
			<?php echo form_label("Vehicle No")?>
		</div>
		<div class= "col-md-4">
			<?php echo form_input(array("id"=>"vehicleno", "name" => "vehicleno", "class" => "form-control","value"=>set_value('vehicleno')))?>
			<?php echo form_error('vehicleno');?>
		</div>
	</div>
</br>

<div class = "row">
	<div class= "col-md-3 col-md-offset-1">
		<?php echo form_label("Chassis No")?>
	</div>
	<div class= "col-md-4 col-md-offset-0">
		<?php echo form_input(array("id"=>"chassisno", "name" => "chassisno", "class" => "form-control","value"=>set_value('chassisno')))?>
		<?php echo form_error('chassisno');?>
	</div>
</div>
</br>

<div class = "row">
	<div class= "col-md-3 col-md-offset-1">
		<?php echo form_label("Engine No")?>
	</div>
	<div class= "col-md-4 col-md-offset-0">
		<?php echo form_input(array("id"=>"engineno", "name" => "engineno", "class" => "form-control","value"=>set_value('engineno')))?>
		<?php echo form_error('engineno');?>
	</div>
</div>
</br>

<div class = "row">
	<div class= "col-md-3 col-md-offset-1">
		<?php echo form_label("Purchase Date")?>
	</div>
	<div class= "col-md-4 col-md-offset-0">
		<?php echo form_input(array("id"=>"purchasedate", "name" => "purchasedate", "class" => "form-control", "type" => "date","value"=>set_value('purchasedate')))?>
		<?php echo form_error('purchasedate');?>
	</div>
</div>

</fieldset>
</div>
</br>

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



</section>
<!-- /.content -->
