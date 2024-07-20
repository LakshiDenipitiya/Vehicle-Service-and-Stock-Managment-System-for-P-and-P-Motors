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
		<h3 align = "center"> Job request Report </h3>

		<?php echo form_open("Reportreorderlevel/reorderLevel", array("method" => "GET"))?>
	
		

	</div>

	<div class="table table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable" id="stock">
                    <thead>
                        <tr>
                            <th>Code</th> 
                            <th>Spare part</th> 
                            <th>Current Stock Level</th> 
                            <th>Last GRN No</th>
                            <th>Last GRN Price</th> 
                            <th>Last GRN Date</th>
                            <th>Last GRT No</th>  
                            <th>Last GRT Date</th> 
                            <!--<th>Status</th> -->
                        <!--    <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($stockList as $key => $stock) {?>
                        <tr>
                            <td><?php echo $stock->code; ?></td>
                            <td><?php echo $stock->sparepart; ?></td>
                            <td><?php echo $stock->currentstocklevel; ?></td>
                            <td><?php echo $stock->lastgrnno; ?></td>
                            <td><?php echo $stock->lastgrnprice; ?></td>
                            <td><?php echo $stock->lastgrndate; ?></td>
                            <td><?php echo $stock->lastgrtno; ?></td>
                            <td><?php echo $stock->lastgrtdate; ?></td>
                                            
                        </tr>

                        
                        <!-- <li><?php echo $key . " : " .$supplier->name; ?></li> -->
                        <?php }?>
                        
                    </tbody>
                </table>

                <?php echo form_close();?>
 <div class="col-md-3 col-md-offset-4">
    <a target="_blank" href="<?php echo base_url("Reportreorderlevel/reorderlevelReport");?>" id="print" class="btn btn-success pull-right">Print</a>


            </div>

</div>
</section>
<!-- /.content -->


