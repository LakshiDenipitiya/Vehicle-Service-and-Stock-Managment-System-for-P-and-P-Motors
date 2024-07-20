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
      <h3 align = "center"> Job request status Report </h3>

      <?php echo form_open("jobrequeststatus/serviceStatus", array("method" => "GET"))?>
      <div class="form-group">
       <div class="row">
        <div class="col-md-2 col-md-offset-2">
         <?php echo form_label("Select Status")?>
     </div>
     <div class="col-md-3">


         <?php
         echo form_dropdown('status',array('All' => 'All','1'=>'Not Started','2'=>'In progress','3'=>'Completed'),$statusType, array('class'=>'form-control','id'=>'status'));
         ?>
     </div>
     <div class="col-md-2">
         <button type="submit" class="btn btn-primary">Generate</button>
     </div>
 </div>
</div>
<?php echo form_close();?>

</div>

<div class="table table-responsive">
    <table class="table table-bordered table-striped table-hover dataTable" id="jobrequest">
        <thead>
            <tr>
                <th>No</th>
                <th>Vehicle No</th> 
                <th>Employee Name</th>
                <th>Meter Reading</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($statusList as $key => $status) { ?>
            <tr>
                <td><?php echo $status->id; ?></td>
                <td><?php echo $status->vehicleno; ?></td>
                <td><?php echo $status->firstname . " " . $status->lastname; ?></td>
                <td><?php echo $status->meterreading; ?></td>

                <td><?php 

                switch ($status->status) {
                    case '1':
                    echo "Not Started";
                    break;
                    case '2':
                    echo "In-progress";
                    break;
                    case '3':
                    echo "Completed";
                    break;
                    default:
                    break;
                }
                ?></td>



            </tr>

            <?php } ?>

        </tbody>
    </table>
    <div class="col-md-3 col-md-offset-9">
        <a target="_blank" href="<?php echo base_url("jobrequeststatus/serviceStatusReport?status=").$statusType;?>" id="print" class="btn btn-success pull-right">Print</a>

        <br>
    </div>
</div>


</div>
</section>
<!-- /.content -->


