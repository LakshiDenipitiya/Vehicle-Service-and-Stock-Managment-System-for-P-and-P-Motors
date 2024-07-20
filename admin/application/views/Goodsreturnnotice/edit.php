<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Goods Return Notice
    <small>edit</small>
</h1>

<script type="text/javascript" >
$(document).ready(function(){

    $("#reason").change(function() {
        if(this.value != "Customer Return") {
            $("#sellingprice").attr('disabled', 'disabled');
        }else{
            $("#sellingprice").removeAttr('disabled');
        }
        if(this.value != "Customer Return") {
            $("#solddate").attr('disabled', 'disabled');
        }else{
            $("#solddate").removeAttr('disabled');
        }
    });
});
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
        
        <div class="box-header with-border"><h3 align="center" class="box-title">Edit Goods Return Notice</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <div class="box-body">

            <?php echo form_open('Goodsreturnnotice/update/'.$selectedUser->id) ?>

            <div class= "form-group">
                <fieldset class="col-md-8 col-md-offset-2">     
                    <legend>General Information</legend>

                    <div class = "row">
                        <div class= "required col-md-3 col-md-offset-2">
                            <?php echo form_label("Goods Return Notice No")?>
                        </div>
                        <div class= "col-md-4">
                            <?php echo form_input(array("id"=>"goodsreturnnoticeno", "name" => "goodsreturnnoticeno", "class" => "form-control","type" => "date",'value' =>$selectedUser->goodsreturnnoticeno))?>
                            <?php echo form_error('goodsreturnnoticeno');?>
                        </div>
                    </div>
                </br>
                
                <div class = "row">
                    <div class= "required col-md-3 col-md-offset-2">
                        <?php echo form_label("Code")?>
                    </div>
                    <div class= "col-md-3">
                        <?php echo form_input(array("id"=>"code", "name" => "code", "class" => "form-control",'value' =>$selectedUser->code))?>
                        <?php echo form_error('code');?>
                    </div>
                </div>
            </br>

            <div class = "row">
                <div class= "required col-md-3 col-md-offset-2">
                    <?php echo form_label("Category of Spare Part")?>
                </div>
                <div class= "col-md-5 col-md-offset-0">
                    <?php echo form_input(array("id"=>"categoryofsparepart", "name" => "categoryofsparepart", "class" => "form-control",'value' =>$selectedUser->categoryofsparepart))?>
                    <?php echo form_error('categoryofsparepart');?>
                </div>
            </div>
        </br>

        <div class = "row">
            <div class= "required col-md-3 col-md-offset-2">
                <?php echo form_label("Quantity")?>
            </div>
            <div class= "col-md-5 col-md-offset-0">
                <?php echo form_input(array("id"=>"quantity", "name" => "quantity", "class" => "form-control",'value' =>$selectedUser->quantity))?>
                <?php echo form_error('quantity');?>
            </div>
        </div>
    </br>             
    <div class = "row">
        <div class= "required col-md-3 col-md-offset-2">
            <?php echo form_label("Reason for return")?>
        </div>
        <div class= "col-md-5 col-md-offset-0"> 
            <?php 

            $data = array(
                ''  => 'Select',
                'Damage'    => 'Damage',
                'Customer Return'   => 'Customer Return',
                'G.R.N Correction'   => 'G.R.N. Correction');

            echo form_dropdown ('reason',$reasonDropdownOption,$selectedUser->reasonforreturn,$data);
            echo form_error('reasonforreturn');?>
        </div>
    </div>
</br>


<div class = "row">
    <div class= "required col-md-3 col-md-offset-2">
        <?php echo form_label("Supplier Name")?>
    </div>
    <div class= "col-md-5 col-md-offset-0"> 
        <?php 

        $data = array(
            'id'=>'goodsreceivenotice_id',
            'class'=>'form-control',
            'name'=>'suppliername');

        echo form_dropdown ('goodsreceivenotice_id',$goodsreceivenoticeList,$selectedUser->goodsreceivenotice_id,$data);
        echo form_error('goodsreceivenotice_id');?>
    </div>
</div>
</br>


<div class = "row">
    <div class= "required col-md-3 col-md-offset-2">
        <?php echo form_label("Buying Price")?>
    </div>
    <div class= "col-md-5 col-md-offset-0">
        <?php echo form_input(array("id"=>"buyingprice", "name" => "buyingprice", "class" => "form-control",'value' =>$selectedUser->buyingprice))?>
        <?php echo form_error('buyingprice');?>
    </div>
</div>

</br>

<div class = "row">
    <div class= "required col-md-3 col-md-offset-2">
        <?php echo form_label("Selling Price")?>
    </div>
    <div class= "col-md-5 col-md-offset-0">     
        <?php echo form_input(array("id"=>"sellingprice", "name" => "sellingprice", "class" => "form-control",'value' =>$selectedUser->sellingprice))?>
        <?php echo form_error('sellingprice');?>
    </div>
</div>  
</br>
<div class = "row">
    <div class= "required col-md-3 col-md-offset-2">
        <?php echo form_label("Sold Date")?>
    </div>
    <div class= "col-md-5 col-md-offset-0">         
        <?php echo form_input(array("id"=>"solddate", "name" => "solddate", "class" => "form-control","type" => "date",'value' =>$selectedUser->solddate))?>
        <?php echo form_error('solddate');?>
    </div>
</div>
</br>

</fieldset>
</div>
<div class= "form-group">
    <fieldset class="col-md-8 col-md-offset-2">     
        <legend>Return Information</legend>

        <div class = "row">
            <div class= "required col-md-3 col-md-offset-2">
                <?php echo form_label("Return Date")?>
            </div>
            <div class= "col-md-5 col-md-offset-0"> 
                <?php echo form_input(array("id"=>"returndate", "name" => "returndate", "class" => "form-control", "type" => "date",'value' =>$selectedUser->returndate))?>
                <?php echo form_error('returndate');?>
            </div>
        </div>
    </br>

    <div class="row">
        <div class="required col-md-3 col-md-offset-2">
            <?php echo form_label("Claimed or Not")?>
        </div>
        <div class="col-md-5 ">    
            <?php 
            $data=array('class'=>'',);
            echo form_radio('isclaim','Yes',$selectedUser->isclaim == 'Yes' ,$data).'Yes'.'<br>';
            echo form_radio('isclaim','No',$selectedUser->isclaim == 'No',$data).'No';
            echo form_error('isclaim');
            ?>
        </div> 
    </div>  
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