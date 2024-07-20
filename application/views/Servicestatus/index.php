
<script type="text/javascript">
$(document).ready(function () {
    $('#jobrequest').DataTable();
});
</script>



<!-- Content Header (Page header) -->
<section class="content-header">
    <h3 style="text-align:center";>Service Status</h3>

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
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($serviceStatus as $key => $jobrequest) { ?>
                            <tr>
                                <td><?php echo $jobrequest->id; ?></td>
                                <td><?php echo $jobrequest->vehicleno; ?></td>
                                <td><?php echo $jobrequest->meterreading; ?></td>
                                <td><?php echo $jobrequest->app_date; ?></td>
                                <td><?php 

                                switch ($jobrequest->status) {
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







