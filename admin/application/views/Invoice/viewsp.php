<!-- Content Header (Page header) -->
<section class="content-header">

</section>  
<!-- Main content -->
<section class="content">
  <div class="box box-default">
    
    <div class="box-header with-border"><h3 align="center" class="box-title">Invoice</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">

      <!--form open from save function-->
      <?php echo form_open('Invoice/create/'.$selectedUser->id) ?>



    <!-- Main content -->
    <section class="invoice">
    <div class="page-header">
      <h3 style="text-align:center">P & P MOTORS</h3>
      <h4 style="text-align:center">Spare Parts, Service & Motor Cycle Sales Dealer for David Pieris Company</h4>
      <h4 style="text-align:center">51/1, Koshinnawaththa Road , 10th Mile Post, Katuwawala, Boralasgamuwa</h4>
      <h4 style="text-align:center">Tel: 0112-54562, 0773-000682</h4>
    </div>

      <fieldset class = "col-md-6">
        <div class="row">
          <div class="col-md-4">
            <?php echo form_label("Customer Name :")?>
          </div>
          <div class="col-md-2">
              <?php echo $invoice->customername; ?> 
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <?php echo form_label("Vehicle No :")?>
          </div>
          <div class="col-md-2">
              <?php echo $invoice->vehicleno; ?>  
          </div>
        </div>
      </fieldset>
      <fieldset class = "col-md-6">
        <div class="row">
            <div class="col-md-4">
              <?php echo form_label("Invoice Number :")?>
            </div>
            <div class="col-md-2">
             <?php echo $invoice->id; ?> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
              <?php echo form_label("Date :")?>
            </div>
            <div class="col-md-2">
                <?php echo $invoice->createdate; ?> 
            </div>
        </div>
      </fieldset>
      
<hr></hr>

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
          <label>Spare parts</label>
            <thead>
            <tr>
              <th>Code</th>
              <th>Category of Spareparts</th>
              <th>Quantity</th>
              <th>Unit price</th>
              <th>Amount</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td><!--  <?php echo $code; ?>  --></td>
              <td><!--  <?php echo $categoryofspareparts; ?>  --></td>
              <td><!--  <?php echo $quantity; ?>  --></td>
              <td><!--  <?php echo $unitprice; ?>  --></td>
              <td><!--  <?php echo $amount; ?>  --></td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->  

       <!-- /.col -->
        <div class="col-xs-6">

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td><!--  <?php echo $subtotal; ?>  --></td>
              </tr>
              <tr>
                <th>Other expences :</th>
                <td><!--  <?php echo $otherexpences; ?>  --></td>
              </tr>
              <tr>
                <th>Tax:</th>
                <td><!--  <?php echo $tax; ?>  --></td>
              </tr>
              <tr>
                <th>Grand Total:</th>
                <td><!--  <?php echo $grandtotal; ?>  --></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
</br>
        <div class="row">
          <div class="col-md-4">
             <!--  <?php echo $employee->firstname; ?>  -->
            </div>
      
            <div class="col-md-4 col-md-offset-4">
              ...................
            </div>            
          </div>
          <div class="row">
            <div class="col-md-4">
              <?php echo form_label("Prepaired By:")?>
            </div>
            <div class="col-md-4 col-md-offset-4">
              <?php echo form_label("Customer:")?>
            </div>
            
        </div>

</br>
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
  
 


  <!--form close-->
    <?php echo form_close()?>
  </div>
</div>
