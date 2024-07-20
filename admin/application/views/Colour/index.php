<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Colour
		<small>List</small>
		<?php echo anchor("/Colour/create", '<span class="fa fa-files-o"> Create</span>',array('class' => 'btn btn-primary pull-right'));?>
	</h1>
</section>


<!-- Main content -->
<section class="content">

	<!-- Display success Message -->
	<?php if($this->session->flashdata("message")){ ?>
	
	<!--display sucess message-->
	<p class="success">
		<?php echo $this->session->flashdata("message");?>
	</p>
	
	<?php } ?>

	
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Colour List</h3>
		</div>
		<div class="box-body">
			
			
			<div class="table table-responsive">
				<table class="table table-bordered table-striped table-hover dataTable" id="colour">
					<thead>
						<tr>
							<th>Colour</th> 
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<!--get color list as array-->
						<?php foreach ($colourList as $key => $colour) {?>
						<tr>
							<td><?php echo $colour->colour; ?></td>

							<td>
								<!--buttons-->
								<?php echo anchor("Colour/Edit/".$colour->id,'<span class="fa fa-edit"> Edit</span>',(array('class'=>'btn btn-primary ')))?> 
								<?php echo anchor("Colour/Delete/".$colour->id,'<span class="fa fa-remove"> Delete</span>', array('class' => 'btn btn-danger ','onclick' => "return confirm('Are you sure?')"));?>
							</td>
						</tr>

						<!-- <li><?php echo $key . " : " .$supplier->name; ?></li> -->
						<?php }?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->

<!--data table load-->
<script type="text/javascript">
$(document).ready(function(){
	$('#colour').DataTable();
});
</script>








