<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Goods Receive Notice
        <small>List</small>
        <?php echo anchor("/Goodsreceivenotice/create", '<span class="fa fa-files-o"> Create</span>', array('class' => 'btn btn-primary pull-right')); ?>
    </h1>
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
            <h3 class="box-title">Goods Receive Notice List</h3>
        </div>
        <div class="box-body">


            <div class="table table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable" id="goodsreceivenotice">
                    <thead>
                        <tr>
                            <th>Goods Receive Notice No</th> 
                            <th>Goods Receive Notice Date</th> 
                            <th>Sparepart</th> 
                            <th>Supplier Invoice no</th> 
                            <th>Supplier Name</th> 
                            
                            <th>Total</th> 
                            <th>Discount</th> 
                            <th>Net Price</th>
                       
                       <!--      <th>Delete</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($grn_list) > 0) {
                            foreach ($grn_list as $value) {
                                ?>
                                <tr>
                                    <td class="text-left"><?php echo $value->goodsreceivenoticeno; ?></td>
                                    <td class="text-left"><?php echo $value->goodsreceivenoticedate; ?></td>
                                    <td class="text-left"><?php echo $value->categoryofsparepart; ?></td>
                                    <td class="text-left"><?php echo $value->invoiceno; ?></td>
                                    <td class="text-left"><?php echo $value->companyname; ?></td>
                                    
                                    <td class="text-right"><?php echo number_format($value->totalprice, 2); ?></td>
                                    <td class="text-right"><?php echo number_format($value->discount, 2); ?></td>
                                    <td class="text-right"><?php echo number_format($value->netprice, 2); ?></td>
                                    

                              
                                    <!-- <td class="text-right">
                                        <input type="button" value="Delete" class="btn btn-danger" onclick="delete_note('<?php echo $value->goodsreceivenoticeno; ?>');"/>
                                    </td> -->
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</section>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Good Received Note Detail</h4>
            </div>
            <div class="modal-body" id="set_content">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<!-- /.content -->
<script type="text/javascript">
$(document).ready(function(){
    $('#goodsreceivenotice').DataTable();
});




</script>










