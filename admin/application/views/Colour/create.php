<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Colour
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
		
		<div class="box-header with-border"><h3 align="center" class="box-title">Colour Registration Form</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">

			<!--form open from save function-->
			<?php echo form_open("Colour/save")?>

			<!--color input feild-->
			<div class = "row">
				<div class= "required col-md-2 col-md-offset-3">
					<?php echo form_label("Colour")?>
				</div>
				<div class= "col-md-4 col-md-offset-0">
					<?php echo form_input(array("id"=>"colour", "name" => "colour", "class" => "form-control","value"=>set_value('colour')))?>
					<?php echo form_error('colour');?>
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


