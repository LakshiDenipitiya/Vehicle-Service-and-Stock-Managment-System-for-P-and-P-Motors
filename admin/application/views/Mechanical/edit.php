<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Mechanical Type Service
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

</section>

<!-- Main content -->
<section class="content">


    <div class="box box-default">
        
        <div class="box-header with-border"><h3 align="center" class="box-title">Edit Mechanical Type Service </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <div class="box-body">
          
           <?php echo form_open('Mechanical/update/'.$selectedUser->id) ?>

           
           <div class = "row">
            <div class= "required col-md-2 col-md-offset-3">
                <?php echo form_label('Code'); ?>
            </div>
            <div class= "col-md-4 col-md-offset-0">
                <?php echo form_input(array('id' => 'code', 'name' => 'code', 'class' => 'form-control','value' => $selectedUser->code)); ?>
                <?php echo form_error('code'); ?>
            </div>
        </div>
    </br>

    <div class = "row">
        <div class= "required col-md-2 col-md-offset-3">
            <?php echo form_label('Type'); ?>
        </div>
        <div class= "col-md-4 col-md-offset-0">
            <?php echo form_input(array('id' => 'type', 'name' => 'type', 'class' => 'form-control','value' => $selectedUser->type)); ?>
            <?php echo form_error('type'); ?>
        </div>
    </div>
</br>
<div class = "row">
    <div class= "required col-md-2 col-md-offset-3">
        <?php echo form_label('Cost (Rs.)'); ?>
    </div>
    <div class= "col-md-4 col-md-offset-0">
        <?php echo form_input(array('id' => 'cost', 'name' => 'cost', 'class' => 'form-control','value' => $selectedUser->cost)); ?>
        <?php echo form_error('cost'); ?>
    </div>
</div>
</br>
           <!-- <div class="row">
                <div class="required col-md-2 col-md-offset-3">
                    <?php echo form_label("Status")?>
                </div>
                <div class="col-md-4 ">    
                    <?php 
                    $data=array('class'=>'',);
                    echo form_radio('status',1,$selectedUser->status == 1 ,$data).'Active';
                    echo form_radio('status',0,$selectedUser->status == 0,$data).'Deactive';
                    echo form_error('status');
                    ?>
                </div> 
            </div>  
        </br>-->
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