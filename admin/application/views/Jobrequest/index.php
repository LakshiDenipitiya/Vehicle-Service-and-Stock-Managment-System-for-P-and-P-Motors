
<script type="text/javascript">
$(document).ready(function () {
    $('#jobrequest').DataTable();
});

function onStatusChange (requestId, event) {
$.post( "Jobrequest/updateStatus",{request:requestId, event:event.target.value});
}
</script>



<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Job request
        <small>List</small>	
    </h1>

</script>
<ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo base_url('jobrequest/index'); ?>"><i class="fa fa-motorcycle"></i>Jobrequest List</a></li>
</ol>

</section>

<!-- Main content -->
<section class="content">
    <!-- Display success Message -->
    <?php if ($this->session->flashdata("message")) { ?>

    <p class="success">
        <?php echo $this->session->flashdata("message"); ?>
    </p>

    <?php } ?>


    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Job request List</h3>
            <?php echo anchor("/Jobrequest/create", '<span class="fa fa-files-o"> Create</span>', array('class' => 'btn btn-primary pull-right')); ?>
        </div>
        <div class="box-body">


            <div class="table table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable" id="jobrequest">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Vehicle No</th> 
                            <th>Employee Name</th>
                           <!--  <th>Meter Reading</th> -->
                            <th>Service Type Service</th>
                            <th>Mechanical Type Service</th>
                            <th>Used spare parts</th>
                            <th>Appointment Date</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jobrequestList as $key => $jobrequest) { ?>
                        <tr>
                            <td><?php echo $jobrequest->id; ?></td>
                            <td><?php echo $jobrequest->vehicleno; ?></td>
                            <td><?php echo $jobrequest->firstname . " " . $jobrequest->lastname; ?></td>
                          <!--   <td><?php echo $jobrequest->meterreading; ?></td> -->
                            <td><?php foreach ($jobrequest->Services as $key => $service) { ?>
                                <label class="label label-success"> <?php echo $service->code; ?></label>
                                <?php } ?></td>
                                <td><?php foreach ($jobrequest->Mechanicals as $key => $mechanical) { ?>
                                    <label class="label label-success"> <?php echo $mechanical->type; ?></label>
                                    <?php } ?></td>
                                    <td><?php foreach ($jobrequest->Spareparts as $key => $sparepart) { ?>
                                        <label class="label label-success"> <?php echo $sparepart->categoryofsparepart; ?></label>
                                        <?php } ?></td>
                                        <td><?php echo $jobrequest->app_date; ?></td>
                                        <td>
                                         <?php
                                         $options=array(
                                            '1'  => 'Not Started',
                                            '2'    => 'In Progress',
                                            '3'   => 'Completed',
                                            );
                                         $data=array(
                                            'id'=>'status',
                                            'class'=>'form-control',
                                            'name'=>'status',
                                            'onChange' => 'onStatusChange('.$jobrequest->id.', event)');   

                                            echo form_dropdown('status',$options,set_value('status', $jobrequest->status), $data);?>
                                        </td>  

                                        <td>
                                            <?php echo anchor("Jobrequest/Edit/" . $jobrequest->id, '<span class="fa fa-edit"> Edit</span>', (array('class' => 'btn btn-xs btn-primary '))) ?>  

                                            <?php echo anchor("Jobrequest/Delete/" . $jobrequest->id, '<span class="fa fa-remove"> Delete</span>', array('class' => 'btn btn-xs btn-danger ', 'onclick' => "return confirm('Are you sure?')")); ?>

                                            <?php echo anchor("Jobrequest/View/" . $jobrequest->id, '<span class="fa fa-eye"> view</span>', (array('class' => 'btn btn-xs btn-info '))) ?> 
                                        </td>
                                    </tr>

                                    <!-- <li><?php echo $key . " : " . $supplier->name; ?></li> -->
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->







