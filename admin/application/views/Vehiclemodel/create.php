<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Vehicle Model
		<small>create</small>
	</h1>

	<script type="text/javascript">

	$(document).ready(function(){

            //using select2 dropdown
            $("#vehicletype_id").select2();
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

		<div class="box-header with-border"><h3 align="center" class="box-title">Vehicle Model Registration Form</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div>
		<div class="box-body">

			<?php echo form_open("Vehiclemodel/save")?>

			<div class="form-group">
				<div class="row">
					<div class="required col-md-2 col-md-offset-2">
						<?php echo form_label("Vehicle Type")?>
					</div>
					<div class="col-md-4 col-md-offset-0 ">
						<?php 

						$data=array(
							'id'=>'vehicletype_id',
							'class'=>'form-control',
							'name'=>'typeofvehicle');

						echo form_dropdown ('vehicletype_id',$vehicletypeList,set_value('vehicletype_id'),$data); 
						?>
						<?php echo form_error('vehicletype_id');?> 
					</div>
					<div class= "col-md-3 col-md-offset-0">	

						<a href="<?php echo base_url('vehicletype/create'); ?>" class="btn btn-info">Add New</a>

					</div>
				</div>
			</div>

			<div class="form-group">
				<div class= "row">
					<div class="required col-md-2 col-md-offset-2">
						<?php echo form_label("Vehicle Model")?>
					</div>
					<div class="col-md-4 col-md-offset-0">
						<?php echo form_input(array("id"=>"vehiclemodel", "name" => "vehiclemodel", "class" => "form-control", "class" => "form-control","value"=>set_value('vehiclemodel')))?>
						<?php echo form_error('vehiclemodel');?> 
					</div>
				</div>
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
