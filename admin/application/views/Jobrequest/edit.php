<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Job request
    <small>edit</small>
</h1>

<ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo base_url('jobrequest/edit/' .$selectedUser->id); ?>"><i class="fa fa-motorcycle"></i>Edit Jobrequest</a></li>
</ol>

<style>
.required:after {
    content:" *";
    position: relative;
    top: 0;
    right: -1px;
    color: red;

}
</style>
<script type="text/javascript">

$(document).ready(function(){

            //using select2 dropdown
            $("#employee_id").select2();
            $('employee_id').val(<?php echo $selectedUser->employee_id ?>).trigger('change');
            $("#service_id").select2();
            $("#mechanical_id").select2();
            $("#sparepart_id").select2();

            //call for the getById method in vehicle controller
            $.ajax({
                url : "<?php echo base_url('/vehicle/getById');?>",
                method: 'POST',
                //getdate by id
                data: {id : <?php echo $selectedUser->vehicle_id ?>  },
                 //the data parse to the response variable
                 success : (function(response){

                    var data = JSON.parse(response);
                    $("#vehicle_id").val(data.vehicleno);
                    $("#customername").val(data.customer.firstname+" "+data.customer.lastname);
                    $("#vehicletype").val(data.vehicletype.typeofvehicle);
                    $("#vehiclemodel").val(data.model.vehiclemodel);
                    $("#vehiclecolor").val(data.vehiclecolor.colour);
                    if (data.sparepart != undefined) {
                       $("#sparepart").val(data.sparepart.categoryofsparepart);
                   };
                   
                   
               }),
                //output in console if have error massage 
                error : (function(error){
                    console.log(error);
                })
            });




        });//end of the document.ready function

</script>
</section>

<!-- Main content -->
<section class="content">


    <div class="box box-default">
        
        <div class="box-header with-border"><h3 align="center" class="box-title">Edit Jobrequest </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
          
           <?php echo form_open('Jobrequest/update/'.$selectedUser->id) ?>

           
           <div class = "row">
            <div class= "required col-md-3 col-md-offset-2">
                <?php echo form_label("Vehicle No")?>
            </div>
            <div class= "col-md-3 col-md-offset-0"> 
                <?php echo form_input(array('id' => 'vehicle_id', 'name' => 'vehicle_id',"readonly class"=>"form-control","placeholder"=>"Vehicle ID", "value"=>$selectedUser->vehicle_id)); ?>
                
            </div>
        </div>
    </br>
    <div class = "row">
        <div class= "col-md-3 col-md-offset-2">
            <?php echo form_input(array('id' => 'customername', 'name' => 'customername',"readonly class"=>"form-control","placeholder"=>"Customer Name")); ?>
            <?php echo form_error('customername'); ?>
        </div>
        
        <div class= "col-md-3 col-md-offset-0">
            <?php echo form_input(array('id' => 'vehicletype', 'name' => 'vehicletype',"readonly class"=>"form-control","placeholder"=>"Vehicle Type")); ?>
            <?php echo form_error('vehicletype'); ?>
        </div>
    </div>
</br>
<div class = "row">
    <div class= "col-md-3 col-md-offset-2">
        <?php echo form_input(array('id' => 'vehiclemodel', 'name' => 'vehiclemodel',"readonly class"=>"form-control","placeholder"=>"Vehicle Model")); ?>
        <?php echo form_error('vehiclemodel'); ?>
    </div>

    <div class= "col-md-3 col-md-offset-0">
        <?php echo form_input(array('id' => 'vehiclecolor', 'name' => 'vehiclecolor',"readonly class"=>"form-control","placeholder"=>"Vehicle Color")); ?>
        <?php echo form_error('vehiclecolor'); ?>
    </div>
</div>
</br>

<div class = "row">
    <div class= "required col-md-3 col-md-offset-2">
        <?php echo form_label("Employee Name")?>
    </div>
    <div class= "col-md-3 col-md-offset-0"> 
        <?php 

        $data = array(
            'id'=>'employee_id',
            'class'=>'form-control',
            'name'=>'firstname');


        echo form_dropdown ('employee_id',$employeeList,$selectedUser->employee_id,$data);
        echo form_error('employee_id');?>
    </div>
    <div class= "col-md-2 col-md-offset-0"> 
        
        <a href="<?php echo base_url('Employee/create'); ?>" class="btn btn-info">Add New</a>
        
    </div>
</div>
</br>
<div class = "row">
    <div class= "required col-md-3 col-md-offset-2">
        <?php echo form_label('Meter Reading'); ?>
    </div>
    <div class= "col-md-3 col-md-offset-0">
        <?php echo form_input(array('id' => 'meterreading', 'name' => 'meterreading', 'class' => 'form-control','value' => $selectedUser->meterreading)); ?>
        <?php echo form_error('meterreading'); ?>
    </div>
</div>
</br>
<div class = "row">
    <div class= "required col-md-3 col-md-offset-2">
        <?php echo form_label("Service Type services")?>
    </div>
    <div class= "col-md-3 col-md-offset-0"> 
        <?php 
        $data = array(
            'id'=>'service_id',
            'class'=>'form-control',
            'name'=>'type');

        echo form_multiselect ('service_id[]',$serviceList,$user_services_id_list,$data);
        echo form_error('service_id');?>
    </div>
    <div class= "col-md-2 col-md-offset-0"> 
        <a href="<?php echo base_url('service/create'); ?>" class="btn btn-info">Add New</a>
    </div>
</div>
</br>

<div class = "row">
    <div class= "required col-md-3 col-md-offset-2">
        <?php echo form_label("Mechanical Type services")?>
    </div>
    <div class= "col-md-3 col-md-offset-0"> 
        <?php 
        $data = array(
            'id'=>'mechanical_id',
            'class'=>'form-control',
            'name'=>'type');

        echo form_multiselect ('mechanical_id[]',$mechanicalList,$user_mechanicals_id_list,$data);
        echo form_error('mechanical_id');?>
    </div>
    <div class= "col-md-2 col-md-offset-0"> 
        <a href="<?php echo base_url('mechanical/create'); ?>" class="btn btn-info">Add New</a>
    </div>
</div>
</br>

<div class = "row">
    <div class= "col-md-3 col-md-offset-2">
        <?php echo form_label("Used spareparts")?>
    </div>
    <div class= "col-md-3 col-md-offset-0"> 
        <?php 
        $data = array(
            'id'=>'sparepart_id',
            'class'=>'form-control',
            'name'=>'categoryofsparepart');

        echo form_multiselect ('sparepart_id[]',$sparepartList,$user_spareparts_id_list,$data);
        echo form_error('sparepart_id');?>
    </div>
    
</div>
</br>
<div class = "row">
    <div class= "required col-md-3 col-md-offset-2">
        <?php echo form_label('Appointment Date'); ?>
    </div>
    <div class= "col-md-3 col-md-offset-0">
        <?php echo form_input(array('id' => 'app_date', 'name' => 'app_date',  "type"=>"date",'class' => 'form-control','value' => $selectedUser->app_date)); ?>
        <?php echo form_error('app_date'); ?>
    </div>
</div>
</br>

<div class = "row">
    <div class= "col-md-2 col-md-offset-5">
        <?php echo form_submit(array('value' => 'Update', 'class'=>'btn btn-primary form-control'))?>
    </div>
</div>
<?php echo form_close()?>
</div>
</div>



</section>
    <!-- /.content -->