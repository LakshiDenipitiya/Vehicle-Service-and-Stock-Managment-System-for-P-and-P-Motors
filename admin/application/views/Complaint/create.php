<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Complaint
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
		
		<div class="box-header with-border"><h3 align="center" class="box-title">Make complaint Form</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">

			<!--form open from save function-->
			<?php echo form_open("Complaint/save")?>

			<!--Complaint input feild-->
			<div class = "row">
				<div class= "required col-md-2 col-md-offset-3">
					<?php echo form_label("customer Name")?>
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

			</div>
		</br>
			
				<div class="col-md-4 col-md-offset-0 ">
					<?php echo form_hidden(array("name"=>"email","readonly class"=>"form-control","placeholder"=>"Email","value"=>set_value('email'), "id" => "email"));?>
					<?php echo form_error('email');?>
				</div>

		
	
			<div class="col-md-4 col-md-offset-0 ">
				<?php echo form_hidden(array("name"=>"phoneno","readonly class"=>"form-control","placeholder"=>"Phone no","value"=>set_value('phoneno'),"id" => "phoneno"));?>
				<?php echo form_error('phoneno');?>
			</div>
		
	
	<div class = "row">
		<div class= "required col-md-2 col-md-offset-3">
			<?php echo form_label("Complaint Title")?>
		</div>
		<div class= "col-md-4 col-md-offset-0">
			<?php echo form_input(array("id"=>"inbreif", "name" => "inbreif", "class" => "form-control","value"=>set_value('inbreif')))?>
			<?php echo form_error('inbreif');?>
		</div>
	</div>
</br>
<div class = "row">
	<div class= "required col-md-2 col-md-offset-3">
		<?php echo form_label("Complaint Description")?>
	</div>
	<div class= "col-md-4 col-md-offset-0">
		<?php echo form_input(array("id"=>"description", "name" => "description" ,"class" => "form-control","value"=>set_value('description')))?>
		<?php echo form_error('description');?>
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

<script type="text/javascript">

	$(document).ready(function(){

            //using select2 dropdown
            $("#customer_id").select2();

            //function call for on change of vehicle_id
            $('#customer_id').on('change', function() {

                //if the customer_id != to null
                if (this.value != "") {
                    //call for the getById method in complaint controller
                    $.ajax({
                    	url : "<?php echo base_url('/complaint/getById');?>",
                    	method: 'POST',
                        //getdate by id
                        data: {id : this.value},
                        //the data parse to the response variable
                        success : (function(response){

                        	var data = JSON.parse(response);

                        	$("#email").val(data.customer.email);
                        	$("#phoneno").val(data.customer.phoneno);

                        }),
                        //output in console if have error massage 
                        error : (function(error){
                        	console.log(error);
                        })
                    });
                }else{
                    //setting valuses when the ajax not working
                    $("#email").val("");
                    $("#phoneno").val("");

                };//end of the else
            });//end of the onchange function
        });//end of the document.ready function
</script>

</section>
<!-- /.content -->


