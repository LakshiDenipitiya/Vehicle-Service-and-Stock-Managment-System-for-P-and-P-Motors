<!-- Content Header (Page header) -->
<section class="content-header">
 <h1>
    Complaint
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

        <div class="box-header with-border"><h3 align="center" class="box-title">Edit Complaint </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                
            </div>
        </div>
        <div class="box-body">

          <!--form open from update function by selected id-->
          <?php echo form_open('Complaint/update/'.$selectedUser->comp_id) ?>

          <!--color edit feild-->
           <!-- <div class = "row">
                        <div class= "required col-md-3 col-md-offset-1">
                            <?php echo form_label("Customer Name")?>
                        </div>
                        <div class= "col-md-4 col-md-offset-0"> 
                            <?php 

                            $data = array(
                                'id'=>'customer_id',
                                'class'=>'form-control',
                                'name'=>'firstname');

                            echo form_dropdown ('customer_id',$customerList,$selectedUser->customer_id,$data);
                            echo form_error('customer_id');?>
                        </div>
                    </div>
                </br>
                <div class = "row">
                        <div class= "required col-md-3 col-md-offset-1">
                            <?php echo form_label("Email")?>
                        </div>
                        <div class= "col-md-4 col-md-offset-0"> 
                            <?php 

                            $data = array(
                                'id'=>'customer_id',
                                'class'=>'form-control',
                                'name'=>'email');

                            echo form_dropdown ('customer_id',$customerList,$selectedUser->customer_id,$data);
                            echo form_error('customer_id');?>
                        </div>
                    </div>
                </br>
                <div class = "row">
                        <div class= "required col-md-3 col-md-offset-1">
                            <?php echo form_label("Phone No")?>
                        </div>
                        <div class= "col-md-4 col-md-offset-0"> 
                            <?php 

                            $data = array(
                                'id'=>'customer_id',
                                'class'=>'form-control',
                                'name'=>'phoneno');

                            echo form_dropdown ('customer_id',$customerList,$selectedUser->customer_id,$data);
                            echo form_error('customer_id');?>
                        </div>
                    </div>
                </br> -->
          <div class = "row">
            <div class= "required col-md-2 col-md-offset-3">
                <?php echo form_label('Complaint Title'); ?>
            </div>
            <div class= "col-md-4 col-md-offset-0">
                <?php echo form_input(array('id' => 'inbreif', 'name' => 'inbreif', 'readonly class' => 'form-control','value' => $selectedUser->inbreif)); ?>
                <?php echo form_error('inbreif'); ?>
            </div>
        </div>
    </br>
        <div class = "row">
            <div class= "required col-md-2 col-md-offset-3">
                <?php echo form_label('Complaint Description'); ?>
            </div>
            <div class= "col-md-4 col-md-offset-0">
                <?php echo form_input(array('id' => 'description', 'name' => 'description', 'readonly class' => 'form-control','value' => $selectedUser->description)); ?>
                <?php echo form_error('description'); ?>
            </div>
        </div>
    </br>
     <div class = "row">
            <div class= "required col-md-2 col-md-offset-3">
                <?php echo form_label('Reply'); ?>
            </div>
            <div class= "col-md-4 col-md-offset-0">
                <?php echo form_input(array('id' => 'reply', 'name' => 'reply', 'class' => 'form-control','value' => $selectedUser->reply)); ?>
                <?php echo form_error('reply'); ?>
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