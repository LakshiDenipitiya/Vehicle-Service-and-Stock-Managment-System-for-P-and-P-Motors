<section class="content-header">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('asserts/css/bootstrap.css');?>">
  <style type="text/css">
  .success{
    color : green;
  }
  </style>

</section>

<section class="content">
  <div class="row">

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Supplier Details</h3>
      </div>
      <div class="box-body">
        
        
        <div class="table table-responsive">
          <table class="table table-bordered table-striped table-hover dataTable" id="suppliers">
            <thead>
              <tr>
                <th>Code</th> 
                <th>Company Name</th>
                <th>Address</th> 
                <th>Phone No</th>
                <th>Fax No</th> 
                <th>Email</th>
                
              </tr>
            </thead>
            <tbody>
              <?php foreach ($suppliers as $key => $supplier) {?>
              <tr>
                <td><?php echo $supplier->code; ?></td>
                <td><?php echo $supplier->companyname; ?></td>
                <td><?php echo $supplier->no.'&nbsp;,'.$supplier->lane.'&nbsp;,'.$supplier->city; ?></td>
                <td><?php echo $supplier->phoneno; ?></td>
                <td><?php echo $supplier->faxno; ?></td>
                <td><?php echo $supplier->email; ?></td>

                
              </tr>

              <!-- <li><?php echo $key . " : " .$supplier->name; ?></li> -->
              <?php }?>
              
            </tbody>
          </table>
        </div>
      </div>
    </div><br>
    <a target="_blank" href="<?php echo base_url('Reportsupplier/supplierReport');?>" class="btn btn-success pull-right">Print</a><br>
  </div>
</div>


</section>

<script type="text/javascript">
$(document).ready(function(){
  $('#suppliers').DataTable();

});
</script>


