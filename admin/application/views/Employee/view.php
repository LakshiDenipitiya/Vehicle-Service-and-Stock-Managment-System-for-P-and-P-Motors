<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Employee
		<small>View</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">


	<div class="box box-default">

		<div class="box-header with-border"><h3 align="center" class="box-title">
			<a href="<?php echo base_url() ?>/employee">
				<button class="btn btn-primary btn-sm">Go back</button>
			</a> Employee Profile</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div>
		<div class="box-body">
			<?php echo form_open('Employee/view/'.$selectedUser->id) ?>
			<ul class="timeline">

				<!-- timeline item -->
				<li>
					<!-- timeline icon -->
					<i class="fa fa-user bg-yellow"></i>
					<div class="timeline-item">
						<h3 class="timeline-header" style="color:orange; bold;">Presonal Details ...</h3>

						<div class="timeline-body">
							<div class = "row">
								<div class= "col-md-2 col-md-offset">
									<?php echo form_label("Employee Name")?>
								</div>
								<div class= "col-md-8 col-md-offset-0">
									<?php echo $selectedUser->title.'&nbsp;.'.$selectedUser->firstname.'&nbsp;'.$selectedUser->lastname; ?>
								</div>
							</div>	
						</br>
						<div class = "row">
							<div class= "col-md-2 col-md-offset">
								<?php echo form_label("NIC no")?>
							</div>
							<div class= "col-md-8 col-md-offset-0">
								<?php echo $selectedUser->nicno; ?>
							</div>
						</div>
					</br>
					<div class = "row">
						<div class= "col-md-2 col-md-offset">
							<?php echo form_label("Date of birth")?>
						</div>
						<div class= "col-md-8 col-md-offset-0">
							<?php echo $selectedUser->dateofbirth; ?>
						</div>
					</div>
				</br>
				<div class = "row">
					<div class= "col-md-2 col-md-offset">
						<?php echo form_label("Marital Status")?>
					</div>
					<div class= "col-md-8 col-md-offset-0">
						<?php echo $selectedUser->maritalstatus; ?>
					</div>
				</div>
			</br>
			<div class = "row">
				<div class= "col-md-2 col-md-offset">
					<?php echo form_label("Gender")?>
				</div>
				<div class= "col-md-8 col-md-offset-0">
					<?php echo $selectedUser->gender; ?>
				</div>
			</div>
		</br>
	</div>
</li>
<!-- END timeline item -->
<li>
	<i class="fa fa-commenting  bg-purple"></i>
	<div class="timeline-item">
		<h3 class="timeline-header" style="color:purple; bold;">Conatact Details ...</h3>

		<div class="timeline-body">
			<div class = "row">
				<div class= "col-md-2 col-md-offset">
					<?php echo form_label("Address")?>
				</div>
				<div class= "col-md-8 col-md-offset-0">
					<?php echo $selectedUser->no.'&nbsp;,'.$selectedUser->lane.'&nbsp;,'.$selectedUser->city; ?>
				</div>
			</div>	
		</br>
		<div class = "row">
			<div class= "col-md-2 col-md-offset">
				<?php echo form_label("Phone No")?>
			</div>
			<div class= "col-md-8 col-md-offset-0">
				<?php echo $selectedUser->phoneno; ?>
			</div>
		</div>	
	</br>
	<div class = "row">
		<div class= "col-md-2 col-md-offset">
			<?php echo form_label("Email")?>
		</div>
		<div class= "col-md-8 col-md-offset-0">
			<?php echo $selectedUser->email; ?>
		</div>
	</div>	
</br>
</div>	

</div>
</li>
<li>
	<i class="fa fa-motorcycle  bg-maroon"></i>
	<div class="timeline-item">
		<h3 class="timeline-header" style="color:red; bold;">Service Details ...</h3>

		<div class="timeline-body">
			<div class = "row">
				<div class= "col-md-2 col-md-offset">
					<?php echo form_label("Designation")?>
				</div>
				<div class= "col-md-8 col-md-offset-0">
					<?php 
					foreach ($designations as $key => $designation) {
						?>
						<label class="label label-info"> <?php echo $designation->designation; ?></label>
						<?php 
					}
					?>
					
				</div>
			</div>	
		</br>
		<div class = "row">
			<div class= "col-md-2 col-md-offset">
				<?php echo form_label("Date of recruitment")?>
			</div>
			<div class= "col-md-8 col-md-offset-0">
				<?php echo $selectedUser->dateofrecruitment; ?>
			</div>
		</div>	
	</br>
	<div class = "row">
		<div class= "col-md-2 col-md-offset">
			<?php echo form_label("Date of resigned")?>
		</div>
		<div class= "col-md-8 col-md-offset-0">
			<?php echo $selectedUser->dateofresigned; ?>
		</div>
	</div>	
</br>
</div>	

</div>
</li>

</ul>


</div>
<?php echo form_close()?>
</div>

</section>
<!-- /.content -->

