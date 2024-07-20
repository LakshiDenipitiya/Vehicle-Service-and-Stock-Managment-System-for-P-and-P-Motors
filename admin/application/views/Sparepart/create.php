<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Sparepart
		<small>create</small>
	</h1>

	<script type="text/javascript">

	$(document).ready(function(){

            //using select2 dropdown
            $("#cupboard").select2();
            $("#row").select2();
            $("#bin").select2();
            
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

		
		<div class="box-header with-border"><h3 align="center" class="box-title">Spare part Registration Form</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div>
		<div class="box-body">
			
			<?php echo form_open("Sparepart/save")?>

			<div class= "form-group">
				<fieldset class="col-md-10 col-md-offset-1">    	
					<legend>General Information</legend>

					<div class = "row">
						<div class= "required col-md-2 col-md-offset">
							<?php echo form_label("Code")?>
						</div>
						<div class= "col-md-3 col-md-offset-0">
							<?php echo form_input(array("id"=>"code", "name" => "code", "class" => "form-control","value"=>set_value('code')))?>
							<?php echo form_error('code');?>
						</div>
						
						<div class= "required col-md-3 col-md-offset-1">
							<?php echo form_label("Category of Spare part")?>
						</div>
						<div class= "col-md-3 col-md-offset-0">
							<?php echo form_input(array("id"=>"categoryofsparepart", "name" => "categoryofsparepart", "class" => "form-control","value"=>set_value('categoryofsparepart')))?>
							<?php echo form_error('categoryofsparepart');?>
						</div>
					</div>
				</fieldset>
			</div>
		</br>

		<div class= "form-group">
			<fieldset class="col-md-10 col-md-offset-1">    	
				<legend>Price Information</legend>

				<div class = "row">
					<div class= "required col-md-2 col-md-offset">
						<?php echo form_label("Original Price")?>
					</div>
					<div class= "col-md-3 col-md-offset-0">
						<?php echo form_input(array("id"=>"originalprice", "name" => "originalprice", "class" => "form-control","value"=>set_value('originalprice')))?>
						<?php echo form_error('originalprice');?>
					</div>

					<div class= "required col-md-2 col-md-offset-1">
						<?php echo form_label("Selling Price")?>
					</div>
					<div class= "col-md-3 col-md-offset-1">
						<?php echo form_input(array("id"=>"sellingprice", "name" => "sellingprice", "class" => "form-control","value"=>set_value('sellingprice')))?>
						<?php echo form_error('sellingprice');?>
					</div>
				</div>
			</fieldset>
		</div>
	</br>

	<div class= "form-group">
		<fieldset class="col-md-10 col-md-offset-1">    	
			<legend>Location in stock</legend>

			<div class = "row">
				<div class= "required col-md-2 col-md-offset">
					<?php echo form_label("Cupboard")?>
				</div>
				<div class= "col-md-3 col-md-offset-0">
					<?php
					$options = array(
						''  => 'Select','A'    => 'A','B'   => 'B','C'   => 'C','D'   => 'D','E'   => 'E','F'   => 'F',
						'G'   => 'G','h'    => 'H','I'   => 'I','J'   => 'J','K'   => 'K','L'   => 'L','M'   => 'M',
						'N'    => 'N','O'   => 'O','P'   => 'P','Q'   => 'Q','R'   => 'R','S'   => 'S','T'    => 'T',
						'U'   => 'U','V'   => 'V','W'   => 'W','X'   => 'X','Y'   => 'Y','Z'   => 'Z',
						);
					$data=array(
						'id'=>'cupboard',
						'class'=>'form-control',
						'name'=>'cupboard');	

					echo form_dropdown('cupboard',$cupboardDropdownOption,set_value('cupboard'),$data);
					echo form_error('cupboard');?>
				</div>
				
				<div class= "required col-md-2 col-md-offset-1">
					<?php echo form_label("Row")?>
				</div>
				<div class= "col-md-3 col-md-offset-1">
					<?php
					$options = array(
						''  => 'Select','0'    => '0','1'   => '1','2'   => '2','3'   => '3','4'   => '4','5'   => '5',
						'6'   => '6','7'    => '7','8'   => '8','9'   => '9','10'   => '10','11'   => '11','12'   => '12',
						'13' => '13', '14' => '14' , '15' => '15'
						);
					$data=array(
						'id'=>'row',
						'class'=>'form-control',
						'name'=>'row');	

					echo form_dropdown('row',$rowDropdownOption,set_value('row'),$data);
					echo form_error('row');?>
				</div>

			</div>
		</br>
		<div class="row">
			<div class= "required col-md-2 col-md-offset">
				<?php echo form_label("Bin")?>
			</div>

			<div class= "col-md-3 col-md-offset-0">
				<?php
				$options = array(
					''  => 'Select','0'    => '0','1'   => '1','2'   => '2','3'   => '3','4'   => '4','5'   => '5',
					'6'   => '6','7'    => '7','8'   => '8','9'   => '9','10'   => '10','11'   => '11','12'   => '12',
					'13' => '13', '14' => '14' , '15' => '15'
					);
				$data=array(
					'id'=>'bin',
					'class'=>'form-control',
					'name'=>'bin');	

				echo form_dropdown('bin',$binDropdownOption,set_value('bin'),$data);
				echo form_error('bin');?>
			</div>
		</div>
		
	</br>
</fieldset>
</div>
</br>

<div class= "form-group">
	<fieldset class="col-md-10 col-md-offset-1">    	
		<legend>Stock Information</legend>

		<div class = "row">
			<div class= "required col-md-2 col-md-offset">
				<?php echo form_label("Re-order Level")?>
			</div>
			<div class= "col-md-3 col-md-offset-0">
				<?php echo form_input(array("id"=>"reorderlevel", "name" => "reorderlevel", "class" => "form-control","value"=>set_value('reorderlevel')))?>
				<?php echo form_error('reorderlevel');?>
			</div>
			
			<div class= "required col-md-2 col-md-offset-1">
				<?php echo form_label("Max Stock Level")?>
			</div>
			<div class= "col-md-3 col-md-offset-1">
				<?php echo form_input(array("id"=>"maxstocklevel", "name" => "maxstocklevel", "class" => "form-control","value"=>set_value('maxstocklevel')))?>
				<?php echo form_error('maxstocklevel');?>
			</div>
		</div>
	</br>
</fieldset>
</div>
</br>

<!--<div class= "form-group">
	<fieldset class="col-md-10 col-md-offset-1">    	
		<legend>Other Information</legend>

				
							<div class="row">
								<div class="required col-md-2 col-md-offset-3">
									<?php echo form_label("Status")?>
								</div>
								<div class="col-md-4 ">    
									<?php 
									$data=array('class'=>'',);
									echo form_radio('status','Active',true,set_radio('status',true),$data).'Active';
									echo form_radio('status','Deactive',false,set_radio('status',false),$data).'Deactive';
									echo form_error('status');
									?>
								</div> 
							</div>
						</br>
					</fieldset>
				</div>
			</br>-->

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
