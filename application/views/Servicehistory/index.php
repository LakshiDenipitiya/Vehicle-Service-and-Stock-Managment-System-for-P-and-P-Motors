
<script type="text/javascript">
$(document).ready(function () {
    $('#jobrequest').DataTable();
});
</script>



<!-- Content Header (Page header) -->
<section class="content-header">
<h3 style="text-align:center";>Service History</h3>

</section>

<!-- Main content -->
<section class="content">
    <div class="container">
    <div class="box">
        <div class="box-body">


            <div class="table table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable" id="jobrequest">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Vehicle No</th> 
                            <th>Meter Reading</th>
                            <th>Jobrequest date</th>
                            <th>Service Type Service</th>
                            <th>Mechanical Type Service</th>
                            <th>Used spareparts</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($serviceHistory as $key => $jobrequest) { ?>
                        <tr>
                            <td><?php echo $jobrequest->id; ?></td>
                            <td><?php echo $jobrequest->vehicleno; ?></td>
                            <td><?php echo $jobrequest->meterreading; ?></td>
                            <td><?php echo $jobrequest->app_date; ?></td>
                           <td><?php foreach ($jobrequest->Services as $key => $service) { ?>
                                <label class="label label-success"> <?php echo $service->code; ?></label>
                                <?php } ?></td>
                                <td><?php foreach ($jobrequest->Mechanicals as $key => $mechanical) { ?>
                                    <label class="label label-success"> <?php echo $mechanical->type; ?></label>
                                    <?php } ?></td>
                                    <td><?php foreach ($jobrequest->Spareparts as $key => $sparepart) { ?>
                                        <label class="label label-success"> <?php echo $sparepart->categoryofsparepart; ?></label>
                                        <?php } ?></td>
                    
 

                                       
                                    </tr>

                                    <!-- <li><?php echo $key . " : " . $supplier->name; ?></li> -->
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </section>
            <!-- /.content -->







