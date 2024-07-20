<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Jobrequest
		<small>View</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">


	<div class="box box-default">

		<div class="box-header with-border"><h3 align="center" class="box-title">Jobrequest Details</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<?php echo form_open('Jobrequest/view/'.$selectedRequest->id) ?>

			<fieldset class="col-md-6">
				<legend>Details of the Owner</legend>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Customer Name")?>
					</div>
					<div class="col-md-3">
						<!-- <?php print_r($customer); ?> -->
						<?php echo $customer->title.'.&nbsp;'.$customer->firstname.'&nbsp;'.$customer->lastname; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Address")?>
					</div>
					<div class="col-md-3">
						<?php echo $customer->no.',&nbsp;'.$customer->lane.',&nbsp;'.$customer->city; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("NIC No")?>
					</div>
					<div class="col-md-3">
						<?php echo $customer->nicno; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Email")?>
					</div>
					<div class="col-md-3">
						<?php echo $customer->email; ?>
					</div>
				</div>
			</fieldset>
			<fieldset class="col-md-6">
				<legend>Vehicle Details</legend>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Vehicle No")?>
					</div>
					<div class="col-md-3">
						<?php echo $vehicle->vehicleno; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Vehicle Model")?>
					</div>
					<div class="col-md-3">
						<?php echo $vehicle->vehiclemodel; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Chassis No")?>
					</div>
					<div class="col-md-3">
						<?php echo $vehicle->chassisno; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Engine No")?>
					</div>
					<div class="col-md-3">
						<?php echo $vehicle->engineno; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Purshase Date")?>
					</div>
					<div class="col-md-3">
						<?php echo $vehicle->purchasedate; ?>
					</div>
				</div>
			</fieldset>
		</br>

		<fieldset class="col-md-12">
			<legend>Jobrequest Details</legend>
			<div class="row">
				<div class="col-md-3">
					<?php echo form_label("Job request No")?>
				</div>
				<div class="col-md-3">
					<?php echo $selectedRequest->id; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<?php echo form_label("Meter Reading")?>
				</div>
				<div class="col-md-3">
					<?php echo $selectedRequest->meterreading; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<?php echo form_label("Employee Name")?>
				</div>
				<div class="col-md-3">
					<?php echo $employee->firstname; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<?php echo form_label("Mechanical Type Services")?>
				</div>	
				<div class= "col-md-3">
					<?php 
					foreach ($mechanicals as $key => $mechanical) {
						?>
						<label class="label label-info"> <?php echo $mechanical->type; ?></label>
						<?php 
					}
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<?php echo form_label("Service Type Services")?>
				</div>	
				<div class= "col-md-3">
					<?php 
					foreach ($services as $key => $service) {
						?>
						<label class="label label-info"> <?php echo $service->type; ?></label>
						<?php 
					}
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<?php echo form_label("Used Spare Parts")?>
				</div>	
				<div class= "col-md-3">
					<?php 
					foreach ($spareparts as $key => $sparepart) {
						?>
						<label class="label label-info"> <?php echo $sparepart->categoryofsparepart; ?></label>
					
						<?php 
					}
					?>
				</div>
			</div>
		</fieldset>

	</br>

	<!-- <div class= "col-md-2 col-md-offset-4 pull-right">
		  <?php echo anchor("Invoice/viewjr/", '<span> Create Invoice</span>', (array('class' => 'btn btn-xs btn-primary '))) ?>  
	</div>
	
 -->
	<?php echo form_close()?>
</div>

</div>


</section>
<!-- /.content -->
