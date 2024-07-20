<!-- Content Header (Page header) -->
<section class="content-header">


    <style type="text/css">
    .dataTables_filter,.dataTables_info { display:none;}
    </style>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
       <div class="col-md-12">
          <h3 align = "center"> Goods return notice Report </h3>

          <?php echo form_open("Goodsrtnclaim/grtnClaim", array("method" => "GET"))?>
          <div class="form-group">
             <div class="row">
                <div class="col-md-2 col-md-offset-2">
                   <?php echo form_label("Is Claimed")?>
               </div>
               <div class="col-md-3">
                   <?php
                   echo form_dropdown('isclaim',array('All'=>'All','1'=>'No','2'=>'Yes'),$claimType, array('class'=>'form-control','id'=>'isclaim'));
                   ?>
               </div>
               <div class="col=md-2">
                   <button type="submit" class="btn btn-primary">Generate</button>
               </div>
           </div>
       </div>
       <?php echo form_close();?>

   </div>

   <div class="table table-responsive">
    <table width="100%" class="table table-bordered table-striped table-hover dataTable" id="goodsreturnnotice">
        <thead>
            <tr>
                <th>Code</th> 
                <th>Category of Spare part</th>
                <th>Quantity</th>
                <th>Reasons for Return</th>
                <th>Return Date</th>
                <th>Claimed or Not</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($isclaimList as $key => $isclaim) {?>
            <tr>
                <td><?php echo $isclaim->code; ?></td>
                <td><?php echo $isclaim->categoryofsparepart; ?></td>
                <td><?php echo $isclaim->quantity; ?></td>
                <td><?php echo $isclaim->reasonforreturn; ?></td>
                <td><?php echo $isclaim->returndate; ?></td>
                 <td><?php 

                switch ($isclaim->isclaim) {
                    case '1':
                    echo "No";
                    break;
                    case '2':
                    echo "Yes";
                    break;
                    default:
                    break;
                }
                ?></td>
                
            </tr>

            <?php }?>
            
        </tbody>
    </table>
    <div class="col-md-3 col-md-offset-4">
        <a target="_blank" href="<?php echo base_url("Goodsrtnclaim/grtnClaimReport?isclaim=").$claimType;?>" id="print" class="btn btn-success pull-right">Print</a>


    </div>

</div>
</section>
<!-- /.content -->


