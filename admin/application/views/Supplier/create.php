<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Supplier
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
		
		<div class="box-header with-border"><h3 align="center" class="box-title">Supplier Registration Form</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div>
		<div class="box-body">

			<?php echo form_open("Supplier/save")?>

			<div class= "form-group">
				<fieldset class="col-md-8 col-md-offset-2">    	
					<legend>General Information</legend>

					<div class= "row">
						<div class="required col-md-3 col-md-offset-2">
							<?php echo form_label("Code")?>
						</div>
						<div class="col-md-3 col-md-offset-0">
							<?php echo form_input(array("id"=>"code", "name" => "code", "class" => "form-control","value"=>set_value('code')))?>
							<?php echo form_error('code');?>
						</div>
					</div>
				</br>
				<div class= "row">
					<div class="required col-md-3 col-md-offset-2">
						<?php echo form_label("Company Name")?>
					</div>
					<div class="col-md-5 col-md-offset-0">
						<?php echo form_input(array("id"=>"companyname", "name" => "companyname", "class" => "form-control", "class" => "form-control","value"=>set_value('companyname')))?>
						<?php echo form_error('companyname');?>
					</div>
				</div>

			</br>
		</fieldset>
	</div>

	<div class= "form-group">
		<fieldset class="col-md-8 col-md-offset-2">    	
			<legend>Postal Information</legend>

			<div class= "row">
				<div class = "required col-md-3 col-md-offset-2">
					<?php echo form_label("No")?>
				</div>
				<div class = "col-md-3 col-md-offset-0">
					<?php echo form_input(array("id"=>"no", "name" => "no", "class" => "form-control", "type" => "text","value"=>set_value('no')))?>
					<?php echo form_error('no');?>
				</div>
			</div>
		</br>
		<div class = "row">
			<div class= "required col-md-3 col-md-offset-2">
				<?php echo form_label("Lane")?>
			</div>
			<div class = "col-md-5 col-md-offset-0">
				<?php echo form_input(array("id"=>"lane", "name" => "lane", "class" => "form-control","value"=>set_value('lane')))?>
				<?php echo form_error('lane');?>
			</div>
		</div>
	</br>			

	<div class = "row">
		<div class= "required col-md-3 col-md-offset-2">
			<?php echo form_label("City")?>
		</div>
		<div class= "col-md-5 col-md-offset-0">
			<?php echo form_input(array("id"=>"city", "name" => "city", "class" => "form-control","value"=>set_value('city')));?>
			<?php echo form_error('city');?>
		</div>

	</div>
</br>
</fieldset>
</div>

<div class= "form-group">
	<fieldset class="col-md-8 col-md-offset-2">    	
		<legend>Contact Information</legend>

		<div class = "row">
			<div class= "required col-md-3 col-md-offset-2">
				<?php echo form_label("Phone No")?>
			</div>
			<div class= "col-md-5 col-md-offset-0">
				<?php echo form_input(array("id"=>"phoneno", "name" => "phoneno", "class" => "form-control", "type" => "text","value"=>set_value('phoneno')));?>
				<?php echo form_error('phoneno');?>
			</div>
		</div>
	</br>
	<div class = "row">
		<div class= "required col-md-3 col-md-offset-2">
			<?php echo form_label("Fax No")?>
		</div>
		<div class= "col-md-5 col-md-offset-0">
			<?php echo form_input(array("id"=>"faxno", "name" => "faxno", "class" => "form-control", "type" => "text","value"=>set_value('faxno')));?>
			<?php echo form_error('faxno');?>
		</div>
	</div>
</br>
<div class = "row">
	<div class= "required col-md-3 col-md-offset-2">
		<?php echo form_label("Email")?>
	</div>
	<div class= "col-md-5 col-md-offset-0">
		<?php echo form_input(array("id"=>"email", "name" => "email", "class" => "form-control","value"=>set_value('email')))?>
		<?php echo form_error('email');?>
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



</section>
<!-- /.content -->