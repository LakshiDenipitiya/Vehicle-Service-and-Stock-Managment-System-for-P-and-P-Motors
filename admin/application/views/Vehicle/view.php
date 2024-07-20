<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Vehicle
		<small>View</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">


	<div class="box box-default">

		<div class="box-header with-border"><h3 align="center" class="box-title">Vehicle Details</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<?php echo form_open('Vehicle/view/'.$selectedVehicle->id) ?>

			<fieldset class="col-md-6">
				<legend>Details of the Owner</legend>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Vehicle Owner")?>
					</div>
					<div class="col-md-3">
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
						<?php echo form_label("Contact No")?>
					</div>
					<div class="col-md-3">
						<?php echo $customer->phoneno; ?>
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
						<?php echo $selectedVehicle->vehicleno; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Vehicle Model")?>
					</div>
					<div class="col-md-3">
						<?php echo $selectedVehicle->vehiclemodel; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Chassis No")?>
					</div>
					<div class="col-md-3">
						<?php echo $selectedVehicle->chassisno; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Engine No")?>
					</div>
					<div class="col-md-3">
						<?php echo $selectedVehicle->engineno; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Purshase Date")?>
					</div>
					<div class="col-md-3">
						<?php echo $selectedVehicle->purchasedate; ?>
					</div>
				</div>
			</fieldset>
		</br>
	</br>
	<div></div>
	<fieldset class="col-md-12">
		<legend>Service History</legend>
		<div class="table table-responsive">
			<table class="table table-bordered table-striped table-hover dataTable" id="vehicle">
				<thead>
					<tr>
						<th>Jobrequest No</th>
						<th>Meter Reading</th>
						<th>Service Date</th>
						<th>Services</th>
						<th>Used Spare parts</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($job_request_history as $key => $jobrequest) {?>

					<tr>
						<td><?php echo $jobrequest->id; ?></td>
						<td><?php echo $jobrequest->meterreading; ?></td>
						<td><?php echo $jobrequest->createddate; ?></td>
						<td>
							<button type="button" class="btn btn-sm btn-info" data-toggle="modal" onclick="getServices(<?php echo $jobrequest->id; ?>)" data-target="#services_history_modal"><span class="fa fa-th-list"> View </span></button>
							<button type="button" class="btn btn-sm btn-info" data-toggle="modal" onclick="getMechanical(<?php echo $jobrequest->id; ?>)" data-target="#mechanical_history_modal"><span class="fa fa-th-list"> View </span></button>
						</td>
						<td>
							<button type="button" class="btn btn-sm btn-info" data-toggle="modal" onclick="getSparepart(<?php echo $jobrequest->id; ?>)" data-target="#sparepart_history_modal"><span class="fa fa-th-list"> View </span></button>
						</td>
					</tr>

					<?php }?>
				</tbody>
			</table>
		</div>
	</fieldset>

</br>

<?php echo form_close()?>
</div>
</div>



<div class="modal fade" id="services_history_modal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><b>Services</b></h4>
			</div>
			<div class="modal-body">
				<table class="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Code</th>
							<th>Type</th>
							<th>Cost</th>
						</tr>
					</thead>
					<tbody id="services_history_modal_content">

					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>

<div class="modal fade" id="mechanical_history_modal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><b>Mechanicals</b></h4>
			</div>
			<div class="modal-body">
				<table class="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Code</th>
							<th>Type</th>
							<th>Cost</th>
						</tr>
					</thead>
					<tbody id="mechanical_history_modal_content">

					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>
<div class="modal fade" id="sparepart_history_modal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><b>Spareparts</b></h4>
			</div>
			<div class="modal-body">
				<table class="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Code</th>
							<th>Category</th>
							<th>Selling Price</th>
						</tr>
					</thead>
					<tbody id="sparepart_history_modal_content">

					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>


</section>
<!-- /.content -->
<script type="text/javascript">
$(document).ready(function(){

	$('#vehicle').DataTable();

});


function getServices (job_req_id) {
	$("#services_history_modal_content").html("");

	$.ajax({
		type 	: "GET",
		url 	: '<?php echo base_url("/Vehicle/getServicesByJobRequest/") ?>' + job_req_id,
		success	: function  (response) {

			var services = JSON.parse(response);

			var html = "";

			$.each(services, function  (i, v) {
				html += '<tr><td>'+v.id+'</td><td>'+v.code+'</td><td>'+v.type+'</td><td>Rs. '+v.cost+'</td></tr>';
			})

			$("#services_history_modal_content").html(html);
		}, 
		error	: function  (error) {
			console.log(error);
		}
	});
}

function getMechanical (job_req_id) {
	$("#mechanical_history_modal_content").html("");

	$.ajax({
		type 	: "GET",
		url 	: '<?php echo base_url("/Vehicle/getMechanicalsByJobRequest/") ?>' + job_req_id,
		success	: function  (response) {

			var mechanical = JSON.parse(response);

			var html = "";

			$.each(mechanical, function  (i, v) {
				html += '<tr><td>'+v.id+'</td><td>'+v.code+'</td><td>'+v.type+'</td><td>Rs. '+v.cost+'</td></tr>';
			})

			$("#mechanical_history_modal_content").html(html);
		}, 
		error	: function  (error) {
			console.log(error);
		}
	});
}

function getSparepart (job_req_id) {
	$("#sparepart_history_modal_content").html("");

	$.ajax({
		type 	: "GET",
		url 	: '<?php echo base_url("/Vehicle/getSparepartsByJobRequest/") ?>' + job_req_id,
		success	: function  (response) {

			var sparepart = JSON.parse(response);

			var html = "";

			$.each(sparepart, function  (i, v) {
				html += '<tr><td>'+v.id+'</td><td>'+v.code+'</td><td>'+v.categoryofsparepart+'</td><td>Rs. '+v.sellingprice+'</td></tr>';
			})

			$("#sparepart_history_modal_content").html(html);
		}, 
		error	: function  (error) {
			console.log(error);
		}
	});
}
</script>
