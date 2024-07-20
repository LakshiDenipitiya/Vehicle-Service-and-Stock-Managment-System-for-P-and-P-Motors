<!-- Content Header (Page header) -->
<section class="content-header">
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

	<style>
	.required:after {
		content:" *";
		position: relative;
		top: 0;
		right: -1px;
		color: red;

	}
	
	.content{
		background-image: url("<?php echo base_url('assertsN/images/img38.jpg');?>");
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


<div class="container">

<div class=" col-md-12 ">
 <?php if($this->session->flashdata("messagecomp")):?>
   <p class="alert alert-success alert-dismissible">
     <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
     <?php echo $this->session->flashdata("messagecomp");?>
   </p>
 <?php endif; ?>
</div>
	
</br>
	<div class="box box-default col-md-8 col-md-offset-2" style="background-color:#cacaca;">
		
		<div class="box-header with-border"><h3 align="center" class="box-title">Enter your complaint here..</h3>
		</div>
	</br>
		<div class="box-body">
	
		<!--form open from save function-->
		<?php echo form_open("index.php/Complaint/save")?>
		
	<!--Complaint input feild-->
			<div class = "row">
				<!-- <div class= "required col-md-3 col-md-offset-2">
					<?php echo form_label("customer Name")?>
				</div> -->
				<!-- <div class= "col-md-4 col-md-offset-1">	
					<?php
					$data = array(
						'id'=>'customer_id',
						'class'=>'form-control',
						'name'=>'firstname');

					echo form_dropdown ('customer_id',$customerList,set_value('customer_id'),$data);
					echo form_error('customer_id');?>
				</div> -->

			<!-- 	<div class= "required col-md-3 col-md-offset-2">
					<?php echo form_label("customer Name")?>
				</div>
				<div class= "col-md-4 col-md-offset-1">	
					<?php
					$data= $this->session->userdata("firstname",(''),"lastname");

				echo form_input ('customer_id',$data,set_value('customer_id'));
					echo form_error('customer_id');?>
				</div> -->

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
		<div class= "required col-md-3 col-md-offset-2">
			<?php echo form_label("Complaint Title")?>
		</div>
		<div class= "col-md-4 col-md-offset-1">
			<?php echo form_input(array("id"=>"inbreif", "name" => "inbreif", "class" => "form-control","value"=>set_value('inbreif')))?>
			<?php echo form_error('inbreif');?>
		</div>
	</div>
</br>
<div class = "row">
	<div class= "required col-md-3 col-md-offset-2">
		<?php echo form_label("Complaint Description")?>
	</div>
	<div class= "col-md-4 col-md-offset-1">
		<?php echo form_input(array("id"=>"description", "name" => "description" ,"class" => "form-control","value"=>set_value('description')))?>
		<?php echo form_error('description');?>
	</div>
</div>

</br>
<!--butotns-->
<div class = "row">
	<div class= "col-md-4 col-md-offset-2">
		<?php echo form_submit(array('value' => 'Make Complaint','class'=>'btn btn-primary form-control'))?>
	</div>
	<div class= "col-md-4 col-md-offset-0">
		<?php echo form_reset(array('value' => 'Clear','class'=>'btn btn-block btn-default '))?>
	</div>
</div>
</br>
<!--form close-->
<?php echo form_close()?>
</div>
</div>
</br>

</div>
</br>
</section>
<!-- /.content -->


