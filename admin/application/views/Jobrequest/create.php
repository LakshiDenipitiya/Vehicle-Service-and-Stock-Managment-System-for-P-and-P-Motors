<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Job request
        <small>create</small>
    </h1>

    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url('jobrequest/create'); ?>"><i class="fa fa-motorcycle"></i>Create Jobrequest</a></li>
    </ol>

    <script type="text/javascript">

    $(document).ready(function(){

            //using select2 dropdown
            $("#employee_id").select2();
            $("#vehicle_id").select2();
            $("#service_id").select2();
            $("#mechanical_id").select2();

            //function call for on change of vehicle_id
            $('#vehicle_id').on('change', function() {

                //if the vehicle_id != to null
                if (this.value != "") {
                    //call for the getById method in vehicle controller
                    $.ajax({
                        url : "<?php echo base_url('/vehicle/getById');?>",
                        method: 'POST',
                        //getdate by id
                        data: {id : this.value},
                        //the data parse to the response variable
                        success : (function(response){

                            var data = JSON.parse(response);

                            $("#customerid").val(data.customer.id);
                            $("#firstname").val(data.customer.firstname+" "+data.customer.lastname);
                            $("#vehicletype").val(data.vehicletype.typeofvehicle);
                            $("#vehiclemodel").val(data.model.vehiclemodel);
                            $("#colour").val(data.vehiclecolor.colour);
                            
                        }),
                        //output in console if have error massage 
                        error : (function(error){
                            console.log(error);
                        })
                    });
                }else{
                    //setting valuses when the ajax not working
                    $("#firstname").val("");
                    $("#vehicletype").val("");
                    $("#vehiclemodel").val("");
                    $("#colour").val("");
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
</style>
</section>

<!-- Main content -->
<section class="content">


    <div class="box box-default">

        <div class="box-header with-border"><h3 align="center" class="box-title">Job request Registration Form</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">

            <?php echo form_open("Jobrequest/save")?>

            <div class= "form-group">

                <div class = "row">
                    <div class ="required col-md-3 col-md-offset-2">
                        <?php echo form_label('Vehicle No');?>
                    </div>
                    <div class= "col-md-3"> 
                        <?php 

                        $data = array(
                            'id'=>'vehicle_id',
                            'class'=>'form-control',
                            'name'=>'vehicleno');

                        echo form_dropdown('vehicle_id',$vehicleList,set_value('vehicle_id'),$data);
                        echo form_error('vehicle_id');?>
                    </div>
                    <div class= "col-md-2 col-md-offset-0"> 

                        <a href="<?php echo base_url('Vehicle/create'); ?>" class="btn btn-info">Add New</a>

                    </div>
                </div>
            </div>

        </br>

        <div class= "form-group">
            <div class = "row">
               <div class="col-md-3 col-md-offset-2 ">

                <?php 

                $customer_id = array(
                    'id' => 'customerid',
                    'type' => 'hidden',
                    'value' => set_value('customerid'),
                    'name' => 'customerid'
                    );

                echo form_input($customer_id);
                 ?>

                <?php echo form_input(array("name"=>"customername","readonly class"=>"form-control","placeholder"=>"Customer Name","value"=>set_value('customername'), "id" => "firstname"));?>
                <?php echo form_error('firstname');?>
            </div>
            <div class="col-md-3 ">
                <?php echo form_input(array("name"=>"vehicletype","readonly class"=>"form-control","placeholder"=>"vehicletype","value"=>set_value('vehicletype'),"id" => "vehicletype"));?>
                <?php echo form_error('vehicletype');?>
            </div>
        </div>
    </br>
    <div class = "row">
        <div class="col-md-3 col-md-offset-2 ">
            <?php echo form_input(array("name"=>"vehiclemodel","readonly class"=>"form-control","placeholder"=>"Vehiclemodel","value"=>set_value('vehiclemodel') ,"id" => "vehiclemodel"));?>
            <?php echo form_error('vehiclemodel');?>
        </div>
        <div class="col-md-3 ">
            <?php echo form_input(array("name"=>"colour","readonly class"=>"form-control","placeholder"=>"colour","value"=>set_value('colour'),"id" => "colour"));?>
            <?php echo form_error('colour');?>
        </div>
    </div>
</div>
</br>

<div class= "form-group">
  <div class = "row">
    <div class= "required col-md-3 col-md-offset-2">
        <?php echo form_label("Employee Name")?>
    </div>
    <div class= "col-md-3 col-md-offset-0"> 
        <?php 

        $data = array(
            'id'=>'employee_id',
            'class'=>'form-control',
            'name'=>'employee_id');

        echo form_dropdown('employee_id',$employeeList,set_value('employee_id'),$data);
        echo form_error('employee_id');?>
    </div>
    <div class= "col-md-2 "> 
        
        <a href="<?php echo base_url('Employee/create'); ?>" class="btn btn-info">Add New</a>
        
    </div>
</div>
</div>
</br>
<div class= "form-group">
    <div class = "row">
        <div class= "required col-md-3 col-md-offset-2">
            <?php echo form_label("Meter Reading")?>
        </div>
        <div class= "col-md-3 ">
            <?php echo form_input(array("id"=>"meterreading", "name" => "meterreading", "class" => "form-control","value"=>set_value('meterreading')));?>
            <?php echo form_error('meterreading');?>
        </div>
    </div>
</div>
</br>

<div class= "form-group">
    <div class = "row">
        <div class= "col-md-3 col-md-offset-2">
            <?php echo form_label("Service Type services")?>
        </div>
        <div class= "col-md-3 col-md-offset-0"> 
            <?php 

            $data = array(
                'id'=>'service_id',
                'class'=>'form-control',
                'name'=>'type');

            echo form_multiselect('service_id[]',$serviceList,set_value('service_id'),$data);
            echo form_error('service_id');?>
        </div>
        <div class= "col-md-3 col-md-offset-0"> 

            <a href="<?php echo base_url('service/create'); ?>" class="btn btn-info">Add New</a>

        </div>

    </div>
</div>
</br>
<div class= "form-group">
    <div class = "row">
        <div class= "col-md-3 col-md-offset-2">
            <?php echo form_label("Mechanical Type services")?>
        </div>
        <div class= "col-md-3 col-md-offset-0"> 
            <?php 

            $data = array(
                'id'=>'mechanical_id',
                'class'=>'form-control',
                'name'=>'type');

            echo form_multiselect('mechanical_id[]',$mechanicalList,set_value('mechanical_id'),$data);
            echo form_error('mechanical_id');?>
        </div>
        <div class= "col-md-3 col-md-offset-0"> 

            <a href="<?php echo base_url('mechanical/create'); ?>" class="btn btn-info">Add New</a>

        </div>

    </div>
</div>
</br>
<div class= "form-group">
    <div class = "row">
        <div class= "required col-md-3 col-md-offset-2">
            <?php echo form_label("Appoinment Date")?>
        </div>
        <div class= "col-md-3 ">
            <?php echo form_input(array("id"=>"app_date", "name" => "app_date", "type"=>"date", "class" => "form-control","value"=>set_value('app_date')));?>
            <?php echo form_error('app_date');?>
        </div>
    </div>
</div>
</br>
<div class = "row">
    <div class= "col-md-2 col-md-offset-3">
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

