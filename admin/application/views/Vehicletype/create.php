<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Vehicle Type
		<small>create</small>
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
</section>

<!-- Main content -->
<section class="content">


	<div class="box box-default">
		
		<div class="box-header with-border"><h3 align="center" class="box-title">Vehicle Type Registration Form</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div>
		<div class="box-body">

			<?php echo form_open("Vehicletype/save")?>
			
			<div class= "form-group">
				<div class= "row">
					<div class="required col-md-2 col-md-offset-3">
						<?php echo form_label("Id")?>
					</div>
					<div class="col-md-2 col-md-offset-0">
						<?php echo form_input(array("id"=>"id", "name" => "id", "class" => "form-control","value"=>set_value('id')))?>
						<?php echo form_error('id');?>
					</div>
				</div>
			</br>
			<div class= "row">
				<div class="required col-md-2 col-md-offset-3">
					<?php echo form_label("Type of Vehicle")?>
				</div>
				<div class="col-md-4 col-md-offset-0">
					<?php echo form_input(array("id"=>"typeofvehicle", "name" => "typeofvehicle", "class" => "form-control","value"=>set_value('typeofvehicle')))?>
					<?php echo form_error('typeofvehicle');?>
				</div>
			</div>
		</div>
	</br>		

	<div class = "row">
		<div class= "col-md-2 col-md-offset-5">
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

