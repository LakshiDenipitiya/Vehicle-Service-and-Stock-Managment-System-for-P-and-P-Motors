<!-- Content Header (Page header) -->
<section class="content-header">
	
	<style>
	.required:after {
		content:" *";
		position: relative;
		top: 0;
		right: -1px;
		color: red;

	}

 .content{
 	background-image: url("<?php echo base_url('assertsN/images/cr.png');?>");
 	 /* Full height */
    height: 25%; 

    /* Center and scale the image nicely */
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
 };


	</style> 
</section>

<!-- Main content -->
<section class="content">
</br>
<div class="container">
	<div class="box box-default col-md-8 col-md-offset-2" style="background-color:#faffc5;">
		
		<div class="box-header with-border"><h3 align="center" class="box-title">Customer Registration Form</h3>
		</div>
	</br>
		<div class="box-body">




			<?php echo form_open("index.php/Customer/save")?>
			<div class= "form-group">
				<fieldset class="col-md-8 col-md-offset-2">    	
					<legend>General Information</legend>

					<div class = "row">
						<div class= "required col-md-3 col-md-offset-1">
							<?php echo form_label("Title")?>
						</div>
						<div class= "col-md-6 col-md-offset-1">
							<?php
							
							$data=array(
								'id'=>'title',
								'class'=>'form-control',
								'name'=>'title');	

							echo form_dropdown('title',$titleDropdownOptionN,set_value('title'),$data);
							echo form_error('title');?>
						</div>
					</div>
				</br>

				<div class = "row">
					<div class= "required col-md-3 col-md-offset-1">
						<?php echo form_label("First Name")?>
					</div>
					<div class= "col-md-6 col-md-offset-1">
						<?php echo form_input(array("id"=>"firstname", "name" => "firstname", "class" => "form-control","value"=>set_value('firstname')))?>
						<?php echo form_error('firstname');?>
					</div>
				</div>
			</br>

			<div class = "row">
				<div class= "required col-md-3 col-md-offset-1">
					<?php echo form_label("Last Name")?>
				</div>
				<div class= "col-md-6 col-md-offset-1">
					<?php echo form_input(array("id"=>"lastname", "name" => "lastname", "class" => "form-control","value"=>set_value('lastname')))?>
					<?php echo form_error('lastname');?>
				</div>
			</div>
		</br>

		<div class = "row">
			<div class= "required col-md-3 col-md-offset-1">
				<?php echo form_label("NIC No")?>
			</div>
			<div class= "col-md-6 col-md-offset-1">
				<?php echo form_input(array("id"=>"nicno", "name" => "nicno", "class" => "form-control", "type" => "text","value"=>set_value('nicno')))?>
				<?php echo form_error('nicno');?>
			</div>
		</div>

	</fieldset>
</div>
</br>

<div class= "form-group">
	<fieldset class="col-md-8 col-md-offset-2">    	
		<legend>Postal Information</legend>

		<div class = "row">
			<div class= "required col-md-3 col-md-offset-1">
				<?php echo form_label("No")?>
			</div>
			<div class= "col-md-6 col-md-offset-1">	
				<?php echo form_input(array("id"=>"no", "name" => "no", "class" => "form-control", "type" => "text","value"=>set_value('no')))?>
				<?php echo form_error('no');?>
			</div>
		</div>	
	</br>
	<div class = "row">
		<div class= "required col-md-3 col-md-offset-1">
			<?php echo form_label("Lane")?>
		</div>
		<div class= "col-md-6 col-md-offset-1">		
			<?php echo form_input(array("id"=>"lane", "name" => "lane", "class" => "form-control","value"=>set_value('lane')))?>
			<?php echo form_error('lane');?>
		</div>
	</div>	
</br>
<div class = "row">
	<div class= "required col-md-3 col-md-offset-1">
		<?php echo form_label("City")?>
	</div>
	<div class= "col-md-6 col-md-offset-1">			
		<?php echo form_input(array("id"=>"city", "name" => "city", "class" => "form-control","value"=>set_value('city')))?>
		<?php echo form_error('city');?>
	</div>
</div>

</fieldset>
</div>	
</br>

<div class= "form-group">
	<fieldset class="col-md-8 col-md-offset-2">    	
		<legend>Contact Information</legend>

		<div class = "row">
			<div class= "required col-md-3 col-md-offset-1">
				<?php echo form_label("Phone No")?>
			</div>
			<div class= "col-md-6 col-md-offset-1">	
				<?php echo form_input(array("id"=>"phoneno", "name" => "phoneno", "class" => "form-control", "type" => "text","value"=>set_value('phoneno')))?>
				<?php echo form_error('phoneno');?>
			</div>
		</div>
	</br>

	<div class = "row">
		<div class= "required col-md-3 col-md-offset-1">
			<?php echo form_label("Email")?>
		</div>
		<div class= "col-md-6 col-md-offset-1">	
			<?php echo form_input(array("id"=>"email", "name" => "email", "class" => "form-control", "type" => "email","value"=>set_value('email')))?>
			<?php echo form_error('email');?>
		</div>
	</div>
</br>

</fieldset>
</div>


<div class = "row">
	<div class= "col-md-2 col-md-offset-4">
		<?php echo form_submit(array('value' => 'Save','class'=>'btn btn-primary form-control','id'=>'btn_submit'))?>
	</div>
	<div class= "col-md-2 col-md-offset-0">
		<?php echo form_reset(array('value' => 'Clear','class'=>'btn btn-block btn-default btn-sm'))?>
	</div>
</div>
</br>
<?php echo form_close()?>
</div>
</div>
</br>
</div>
</br>

</section>
<!-- /.content -->