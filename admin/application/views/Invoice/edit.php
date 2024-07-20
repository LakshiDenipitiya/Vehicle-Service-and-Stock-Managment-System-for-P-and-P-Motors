<!-- Content Header (Page header) -->
<section class="content-header">
 <h1>
    Invoice
    <small>edit</small>
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
<script>
$(document).ready(function () {
    var counter = 0;

    $("#addrow1").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><input type="text" class="form-control" name="code' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="categoryofsparepart' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="quantity' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="unitprice' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="amount' + counter + '"/></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("#dynamic_field").append(newRow);
        counter++;
    });



    $("#dynamic_field").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });

});
</script>   
</section>

<!-- Main content -->
<section class="content">


    <div class="box box-default">

        <div class="box-header with-border"><h3 align="center" class="box-title">Edit Invoice </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <div class="box-body">

          <!--form open from update function by selected id-->
          <?php echo form_open('Invoice/update/'.$selectedUser->id) ?>

          <!--color edit feild-->
          <div class = "row">
            <div class= "required col-md-2 col-md-offset-3">
                <?php echo form_label('Invoice No'); ?>
            </div>
            <div class= "col-md-4 col-md-offset-0">
                <?php echo form_input(array('id' => 'invoiceno', 'name' => 'invoiceno', 'class' => 'form-control','value' => $selectedUser->invoiceno)); ?>
                <?php echo form_error('invoiceno'); ?>
            </div>
        </div>
    </br>
    <div class = "row">
        <div class= "required col-md-2 col-md-offset-3">
            <?php echo form_label('Customer Name'); ?>
        </div>
        <div class= "col-md-4 col-md-offset-0">
            <?php echo form_input(array('id' => 'firstname', 'name' => 'firstname', 'class' => 'form-control','value' => $selectedUser->customername)); ?>
            <?php echo form_error('firstname'); ?>
        </div>
    </div>
</br>
    <div class = "row">
        <div class= "required col-md-2 col-md-offset-3">
            <?php echo form_label('Vehicle No'); ?>
        </div>
        <div class= "col-md-4 col-md-offset-0">
            <?php echo form_input(array('id' => 'vehicleno', 'name' => 'vehicleno', 'class' => 'form-control','value' => $selectedUser->vehicleno)); ?>
            <?php echo form_error('vehicleno'); ?>
        </div>
    </div>
</br>
    <div class = "row">
        <div class= "required col-md-2 col-md-offset-3">
            <?php echo form_label('Meter reading'); ?>
        </div>
        <div class= "col-md-4 col-md-offset-0">
            <?php echo form_input(array('id' => 'meterreading', 'name' => 'meterreading', 'class' => 'form-control','value' => $selectedUser->meterreading)); ?>
            <?php echo form_error('meterreading'); ?>
        </div>
    </div>
</br>
    <div class = "row">
        <div class="table-responsive col-md-offset">  
            <table class="table table-bordered" id="dynamic_field">  
                <tr>  
                    <th>Code</th>  
                    <th>Category of Sparepart</th> 
                    <th>Quantity</th> 
                    <th>Unit Price</th> 
                    <th>Amount</th> 
                    <th></th>

                </tr> 
                <tr>  

                    <td><?php echo form_input(array('id' => 'code', 'name' => 'code', 'class' => 'form-control','value' => $selectedUser->code)); ?></td> 
                    <td><?php echo form_input(array('id' => 'categoryofsparepart', 'name' => 'categoryofsparepart', 'class' => 'form-control','value' => $selectedUser->categoryofsparepart)); ?></td> 
                    <td><?php echo form_input(array('id' => 'quantity', 'name' => 'quantity', 'class' => 'form-control','value' => $selectedUser->quantity)); ?></td> 
                    <td><?php echo form_input(array('id' => 'unitprice', 'name' => 'unitprice', 'class' => 'form-control','value' => $selectedUser->price)); ?></td>
                    <td><?php echo form_input(array('id' => 'amount', 'name' => 'amount', 'class' => 'form-control','value' => $selectedUser->quantity)); ?></td>
                    <td><button type="button" name="add" id="addrow1" class="btn btn-success">Add More</button></td>  
                </tr>  
            </table>  

        </div>  
    </div>
</br>
    <div class = "row">
        <div class= "required col-md-2 col-md-offset-3">
            <?php echo form_label('Other payments'); ?>
        </div>
        <div class= "col-md-4 col-md-offset-0">
            <?php echo form_input(array('id' => 'otherpayments', 'name' => 'otherpayments', 'class' => 'form-control','value' => $selectedUser->otherpayments)); ?>
            <?php echo form_error('otherpayments'); ?>
        </div>
    </div>
</br>
    <div class = "row">
        <div class= "required col-md-2 col-md-offset-3">
            <?php echo form_label('Taxes'); ?>
        </div>
        <div class= "col-md-4 col-md-offset-0">
            <?php echo form_input(array('id' => 'taxes', 'name' => 'taxes', 'class' => 'form-control','value' => $selectedUser->taxes)); ?>
            <?php echo form_error('taxes'); ?>
        </div>
    </div>
</br>
<!--buttons-->
<div class = "row">
    <div class= "col-md-2 col-md-offset-5">
        <?php echo form_submit(array('value' => 'Update', 'class'=>'btn btn-primary form-control'))?>
    </div>
</div>
<!--form close-->
<?php echo form_close()?>
</div>
</div>



</section>
    <!-- /.content -->