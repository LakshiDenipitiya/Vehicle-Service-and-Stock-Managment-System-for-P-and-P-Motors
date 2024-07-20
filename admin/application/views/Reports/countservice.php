<?php //var_dump($suppliers);?>
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
    <div class="col-md-12">

      <!-- Display success Message -->
      <?php if($this->session->flashdata("message")): ?>

      <p class="success">
        <?php echo $this->session->flashdata("message");?>
      </p>

    <?php endif; ?>


    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Count Service</h3>
      </div>
      <div class="box-body">
        
        
        <div class="table table-responsive">
          <table class="table table-bordered table-striped table-hover dataTable" id="count">
            <thead>
              <tr>
                <th>Spare part</th> 
                <th>Count</th>
                
              </tr>
            </thead>
            <tbody>
              <?php foreach ($sparepartList as $key => $sparepart) {?>
              <tr>
                <td><?php echo $sparepart->sparepart; ?></td>
                <td><?php echo $sparepart->count; ?></td>
                

                
              </tr>

              <!-- <li><?php echo $key . " : " .$supplier->name; ?></li> -->
              <?php }?>
              
            </tbody>
          </table>
        </div>
      </div>
    </div><br>
    <a target="_blank" href="<?php echo base_url('Reportnew/supplierReport');?>" class="btn btn-success pull-right">Print</a><br>
  </div>
</div>


</section>

<script type="text/javascript">
$(document).ready(function(){
  $('#count').DataTable();

});
</script>