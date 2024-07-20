<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Customer
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
        
        <div class="box-header with-border"><h3 align="center" class="box-title">Edit Customer</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <div class="box-body">

            <?php echo form_open('Customer/update/'.$selectedUser->id) ?>

            <div class= "form-group">
                <fieldset class="col-md-8 col-md-offset-2">     
                    <legend>General Information</legend>

                    <div class = "row">
                        <div class= "required col-md-3 col-md-offset-2">
                            <?php echo form_label("Title")?>
                        </div>
                        <div class= "col-md-3">
                            <?php 
                            $options=array(
                                ''  => 'Select',
                                'Mr'    => 'Mr',
                                'Mrs'   => 'Mrs',
                                'Ms'   => 'Ms',);

                            $data=array(
                                'id'=>'title',
                                'class'=>'form-control',
                                'name'=>'title');

                            echo form_dropdown('title',$titleDropdownOption,$selectedUser->title,$data);
                            echo form_error('title');?>
                        </div>
                    </div>
                    <br>
                    <div class = "row">
                        <div class= "required col-md-3 col-md-offset-2">
                            <?php echo form_label('First Name'); ?>
                        </div>
                        <div class= "col-md-5 col-md-offset-0">
                            <?php echo form_input(array('id' => 'firstname', 'name' => 'firstname',"class" => "form-control", 'value' => $selectedUser->firstname)); ?>
                            <?php echo form_error('firstname'); ?>
                        </div>
                    </div>
                </br>
                <div class = "row">
                    <div class= "required col-md-3 col-md-offset-2">       
                        <?php echo form_label('Last Name'); ?>
                    </div>
                    <div class= "col-md-5 col-md-offset-0">                                        
                        <?php echo form_input(array('id' => 'lastname', 'name' => 'lastname',"class" => "form-control", 'value' =>$selectedUser->lastname)); ?>
                        <?php echo form_error('lastname'); ?>
                    </div>
                </div>
            </br>
            <div class = "row">
                <div class= "required col-md-3 col-md-offset-2">
                    <?php echo form_label('NIC No'); ?>
                </div>
                <div class= "col-md-5 col-md-offset-0">    
                    <?php echo form_input(array('id' => 'nicno', 'name' => 'nicno',"class" => "form-control", 'value' => $selectedUser->nicno)); ?>
                    <?php echo form_error('nicno'); ?>
                </div>
            </div>

        </fieldset>
    </div>
</br>   

<div class= "form-group">
    <fieldset class="col-md-8 col-md-offset-2">     
        <legend>Postal Information</legend>

        <div class = "row">
            <div class= "required col-md-3 col-md-offset-2">
                <?php echo form_label('No'); ?>
            </div>
            <div class= "col-md-3 col-md-offset-0">     
                <?php echo form_input(array('id' => 'no', 'name' => 'no',"class" => "form-control", 'value' => $selectedUser->no)); ?>
                <?php echo form_error('no'); ?>
            </div>
        </div>  
    </br>    
    <div class = "row">
        <div class= "required col-md-3 col-md-offset-2">
            <?php echo form_label('Lane'); ?>
        </div>
        <div class= "col-md-5 col-md-offset-0">     
            <?php echo form_input(array('id' => 'lane', 'name' => 'lane',"class" => "form-control", 'value' => $selectedUser->lane)); ?>
            <?php echo form_error('lane'); ?>
        </div>
    </div>  
</br>    
<div class = "row">
    <div class= "required col-md-3 col-md-offset-2">
        <?php echo form_label('City'); ?>
    </div>
    <div class= "col-md-5 col-md-offset-0">    
        <?php echo form_input(array('id' => 'city', 'name' => 'city',"class" => "form-control", 'value' => $selectedUser->city)); ?>
        <?php echo form_error('city'); ?>
    </div>
</div>

</fieldset>
</div>  
</br>

<div class= "form-group">
    <fieldset class="col-md-8 col-md-offset-2">     
        <legend>Contact Information</legend>

        <div class = "row">
            <div class= "required col-md-3 col-md-offset-2">
                <?php echo form_label('Phone No'); ?>
            </div>
            <div class= "col-md-5 col-md-offset-0">     
                <?php echo form_input(array('id' => 'phoneno', 'name' => 'phoneno',"class" => "form-control", 'value' => $selectedUser->phoneno)); ?>
                <?php echo form_error('phoneno'); ?>
            </div>
        </div>
    </br>
    <div class = "row">
        <div class= "required col-md-3 col-md-offset-2">
            <?php echo form_label('Email'); ?>
        </div>
        <div class= "col-md-5 col-md-offset-0">     
            <?php echo form_input(array('id' => 'email', 'name' => 'email',"class" => "form-control", 'value' => $selectedUser->email)); ?>
            <?php echo form_error('email'); ?>
        </div>
    </div>
</br>
</fieldset>
</div>


<div class= "form-group">
    <div class = "row">
        <div class= "col-md-2 col-md-offset-4">  
            <?php echo form_submit(array('value' => 'Update', 'class'=>'btn btn-primary form-control'))?>
        </div>
    </div>
</div>
<?php echo form_close()?>
</div>
</div>



</section>
    <!-- /.content -->