<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Job request
    <small>edit</small>
</h1>

<ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo base_url('jobrequest/edit/' .$job_request->id); ?>"><i class="fa fa-motorcycle"></i>Edit Jobrequest</a></li>
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
            $('employee_id').val(<?php echo $job_request->employee_id ?>).trigger('change');
            $("#service_id").select2();
            $("#mechanical_id").select2();
            $("#sparepart_id").select2();


            //call for the getById method in vehicle controller
            $.ajax({
                url : "<?php echo base_url('/vehicle/getById');?>",
                method: 'POST',
                //getdate by id
                data: {id : <?php echo $job_request->vehicle_id ?>  },
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

            //function call for on change of vehicle_id
            $('#codesp').on('change', function() {

                //if the codesp != to null
                if (this.value != "") {
                    //call for the getById method in spaerepart controller
                    $.ajax({
                        url : "<?php echo base_url('/sparepart/getById');?>",
                        method: 'POST',
                        //getdate by id
                        data: {id : this.value},
                        //the data parse to the response variable
                        success : (function(response){

                            var data = JSON.parse(response);

                            $("#categoryofsparepart").val(data.sparepart.categoryofsparepart);
                            $("#originalprice").val(data.sparepart.originalprice);
                            
                        }),
                        //output in console if have error massage 
                        error : (function(error){
                            console.log(error);
                        })
                    });
                }else{
                    //setting valuses when the ajax not working
                    $("#categoryofsparepart").val("");
                    $("#originalprice").val("");
          
                };//end of the else
            });//end of the onchange function
            
         

var counter = 0;

$("#addrow1").on("click", function () {
    var newRow = $("<tr>");
    var cols = "";

    cols += '<td><input type="text" class="form-control" name="code' + counter + '"/></td>';
    cols += '<td><input type="text" readonly class="form-control" name="categoryofsparepart' + counter + '"/></td>';
    cols += '<td><input type="text" readonly class="form-control" name="originalprice' + counter + '"/></td>';
    cols += '<td><input type="text" class="form-control" name="quantity' + counter + '"/></td>';
    cols += '<td><input type="text" readonly class="form-control" name="amonut' + counter + '"/></td>';

    cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
    newRow.append(cols);
    $("#dynamic_field").append(newRow);
    counter++;
});



$("#dynamic_field").on("click", ".ibtnDel", function (event) {
    $(this).closest("tr").remove();       
    counter -= 1
});

$("#addrow2").on("click", function () {
    var newRow = $("<tr>");
    var cols = "";

    cols += '<td><input type="text" class="form-control" name="code' + counter + '"/></td>';
    cols += '<td><input type="text" readonly class="form-control" name="type' + counter + '"/></td>';
    cols += '<td><input type="text" readonly class="form-control" name="cost' + counter + '"/></td>';

    cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
    newRow.append(cols);
    $("#mech_field").append(newRow);
    counter++;
});



$("#mech_field").on("click", ".ibtnDel", function (event) {
    $(this).closest("tr").remove();       
    counter -= 1
});

$("#addrow3").on("click", function () {
    var newRow = $("<tr>");
    var cols = "";
    var data_all_service=["Saab", "Volvo", "BMW"];
//    $.post('../../Service/getAllServices',function(response){
//        $.each(JSON.parse(response),function(key1,val1){
//            data_all_service.push(val1);
//        })
//       
//    });
    //console.log(data_all_service);

    cols += '<td><select class="form-control" name="code' + counter + '">' + $.each(data_all_service,function(key,value){value;}) + '</select></td>';
    cols += '<td><input type="text" readonly class="form-control" name="type' + counter + '"/></td>';
    cols += '<td><input type="text" readonly class="form-control" name="cost' + counter + '"/></td>';

    cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
    newRow.append(cols);
    $("#ser_field").append(newRow);
    counter++;
});



$("#ser_field").on("click", ".ibtnDel", function (event) {
    $(this).closest("tr").remove();       
    counter -= 1
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

         <?php echo form_open('Jobrequest/update/'.$job_request->id) ?>


         <div class = "row">
            <div class= "required col-md-3 col-md-offset-3">
                <?php echo form_label("Vehicle No")?>
            </div>
            <div class= "col-md-3 col-md-offset-0"> 
                <?php echo form_input(array('id' => 'vehicle_id', 'name' => 'vehicle_id',"readonly class"=>"form-control","placeholder"=>"Vehicle ID", "value"=>$job_request->vehicle_id)); ?>
                
            </div>
        </div>
    </br>
    <div class = "row">
        <div class= "col-md-3 col-md-offset-3">
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
    <div class= "col-md-3 col-md-offset-3">
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
    <div class= "required col-md-3 col-md-offset-3">
        <?php echo form_label("Employee Name")?>
    </div>
    <div class= "col-md-3 col-md-offset-0"> 
        <?php 

        $data = array(
            'id'=>'employee_id',
            'class'=>'form-control',
            'name'=>'firstname');


        echo form_dropdown ('employee_id',$employeeList,$job_request->employee_id,$data);
        echo form_error('employee_id');?>
    </div>
    <div class= "col-md-2 col-md-offset-0"> 

        <a href="<?php echo base_url('Employee/create'); ?>" class="btn btn-info">Add New</a>
        
    </div>
</div>
</br>
<div class = "row">
    <div class= "required col-md-3 col-md-offset-3">
        <?php echo form_label('Meter Reading'); ?>
    </div>
    <div class= "col-md-3 col-md-offset-0">
        <?php echo form_input(array('id' => 'meterreading', 'name' => 'meterreading', 'class' => 'form-control','value' => $job_request->meterreading)); ?>
        <?php echo form_error('meterreading'); ?>
    </div>
</div>
</br>
<!-- <div class = "row">
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
</div> -->
</br>
<div class = "row">
    <div class= "required col-md-3 col-md-offset-1">
        <?php echo form_label("Service Type services")?> <button type="button" name="add" id="addrow3" class="btn btn-success btn-xs">Add More</button>
    </div>
</div>
</br>
<div class = "row">
    <div class="table-responsive col-md-10 col-md-offset-1">  
        <table class="table table-bordered" id="ser_field">  
            <tr>  
                <th>Code</th>  
                <th>Description</th> 
                <th>Cost</th>
            </tr> 

            <?php foreach ($job_request_service_list as $key => $service): ?>
            <tr>  
                <td>
                    <?php echo form_dropdown("code".$key, $service_list_dropdown, set_value("code".$key, $service->id), array("class" => "form-control", "id"=>"code")); ?>
                </td>
                <td><?php echo form_input(array("id"=>"type".$key, "name" => "type".$key, "readonly class"=>"form-control","value"=>set_value('type'.$key, $service->type)))?></td> 
                <td><?php echo form_input(array("id"=>"cost".$key, "name" => "cost".$key, "readonly class"=>"form-control","value"=>set_value('cost'.$key, $service->cost)))?></td>
            <script type="text/javascript">
                $(document).ready(function(){
                       $("#code").on('change',function(){
                        $.ajax({
                            url : "<?php echo base_url('/Service/getByservice_ID');?>",
                            method: 'POST',
                            //getdate by id
                            data: {id : this.value},
                            //the data parse to the response variable
                            success : (function(response){

                                var data = JSON.parse(response);

                                $("#type"+<?php echo $key ?>).val(data.type);
                                $("#cost"+<?php echo $key ?>).val(data.cost);

                            }),
                            //output in console if have error massage 
                            error : (function(error){
                                console.log(error);
                            })
                    });
            })
                })
            </script>
            </tr>  
        <?php endforeach ?>

    </table>  

</div>  
</div>  
</br>

<!-- <div class = "row">
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
</div> -->
<div class = "row">
    <div class= "required col-md-4 col-md-offset-1">
        <?php echo form_label("Mechanical Type services")?> 
        <button type="button" name="add" id="addrow2" class="btn btn-success btn-xs">Add More</button>
    </div>
</div>
</br>
<div class = "row">
    <div class="table-responsive col-md-10 col-md-offset-1">  
        <table class="table table-bordered" id="mech_field">  
            <tr>  
                <th>Code</th>  
                <th>Description</th> 
                <th>Cost</th>
            </tr> 

            <?php foreach ($job_request_mechanical_list as $key => $mechanical): ?>
            <tr>  
                <td>
                    <?php echo form_dropdown("code".$key, $mechanical_list_dropdown, set_value("code".$key, $mechanical->id), array("class" => "form-control", "id"=>"codemech")); ?>
                </td>
                <td><?php echo form_input(array("id"=>"type_meh".$key, "name" => "type".$key, "readonly class"=>"form-control","value"=>set_value('type'.$key, $mechanical->type)))?></td> 
                <td><?php echo form_input(array("id"=>"cost_meh".$key, "name" => "cost".$key, "readonly class"=>"form-control","value"=>set_value('cost'.$key, $mechanical->cost)))?></td>
            <script type="text/javascript">
                $(document).ready(function(){
                       $("#codemech").on('change',function(){
                        $.ajax({
                            url : "<?php echo base_url('/Mechanical/getBymechanical_ID');?>",
                            method: 'POST',
                            //getdate by id
                            data: {id : this.value},
                            //the data parse to the response variable
                            success : (function(response){

                                var data = JSON.parse(response);

                                $("#type_meh"+<?php echo $key ?>).val(data.type);
                                $("#cost_meh"+<?php echo $key ?>).val(data.cost);

                            }),
                            //output in console if have error massage 
                            error : (function(error){
                                console.log(error);
                            })
                    });
            })
                })
            </script>
            </tr>  
        <?php endforeach ?>

    </table>  

</div>  
</div>  
</br>
<!-- 
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
</br> -->
<div class = "row">
    <div class= "required col-md-4 col-md-offset-1">
        <?php echo form_label("Used Sparepart")?>
           <td><button type="button" name="add" id="addrow1" class="btn btn-success btn-xs">Add More</button></td>  
    </div>
</div>
</br>
<div class = "row">
    <div class="table-responsive col-md-10 col-md-offset-1">  
        <table class="table table-bordered" id="dynamic_field">  
            <tr>  
                <th>Code</th>  
                <th>Category of Sparepart</th> 
                <th>Unit Price</th> 
                <th>Quantity</th> 
                <th>Amount</th> 
                

            </tr> 
            <tr>  
                 <?php foreach ($job_request_sparepart_list as $key => $sparepart): ?>

                <td><?php echo form_dropdown("codesp".$key, $sparepart_list_dropdown, set_value("code".$key, $sparepart->id), array("readonly class" => "form-control")); ?></td> 
                <td><?php echo form_input(array("id"=>"categoryofsparepart".$key, "name" => "categoryofsparepart".$key, "readonly class"=>"form-control","value"=>set_value('categoryofsparepart'.$key)))?></td> 
                <td><?php echo form_input(array("id"=>"originalprice".$key, "name" => "originalprice".$key, "readonly class"=>"form-control","value"=>set_value('originalprice'.$key)))?></td>
                <td><?php echo form_input(array("id"=>"quantity".$key, "name" => "quantity".$key, "class" => "form-control","value"=>set_value('quantity'.$key)))?></td> 
                <td><?php echo form_input(array("id"=>"amount".$key, "name" => "amount".$key, "readonly class"=>"form-control","value"=>set_value('amount'.$key)))?></td>

                 <?php endforeach ?>
            </tr>  
           
        </table>  

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