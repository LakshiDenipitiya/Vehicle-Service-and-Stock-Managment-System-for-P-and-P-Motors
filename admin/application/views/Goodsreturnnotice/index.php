<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Goods Return Notice
		<small>List</small>
		<?php echo anchor("/Goodsreturnnotice/create",'<span class="fa fa-files-o"> Create</span>',array('class' => 'btn btn-primary pull-right'));?>
	</h1>
	<script type="text/javascript">
  function onStatusChange (requestId, event) {
     $.post( "Goodsreturnnotice/updateIsclaim",{request:requestId, event:event.target.value});
 }
 </script>
</section>


<!-- Main content -->
<section class="content">
	<!-- Display success Message -->
	<?php if($this->session->flashdata("message")){ ?>
	
	<p class="success">
		<?php echo $this->session->flashdata("message");?>
	</p>
	
	<?php } ?>


	
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Goods Return Notice List</h3>
		</div>
		<div class="box-body">
			
			
			<div class="table table-responsive">
				<table width="100%" class="table table-bordered table-striped table-hover dataTable" id="goodsreturnnotice">
					<thead>
						<tr>
							<th>Code</th> 
							<th>Category of Spare part</th>
							<th>Quantity</th>
							
							<th>Goods Receive Notice No</th>
							<!-- <th>Name of a supplier</th> -->
							
							<th>Return Date</th>
							<th>Claimed or Not</th>
							
						</tr>
					</thead>
					<tbody>
						<?php foreach ($goodsreturnList as $key => $goodsreturnnotice) {?>
						<tr>
							<td><?php echo $goodsreturnnotice->code; ?></td>
							<td><?php echo $goodsreturnnotice->categoryofsparepart; ?></td>
							<td><?php echo $goodsreturnnotice->quantity; ?></td>
							
							<td><?php echo $goodsreturnnotice->goodsreceivenoticeno; ?></td>
							<!-- <td><?php echo $goodsreturnnotice->companyname; ?></td> -->
							
							<td><?php echo $goodsreturnnotice->returndate; ?></td>
                            <td>
                               <?php
                               $options=array(
                                '1'  => 'No',
                                '2'    => 'Yes',
                                
                                );
                               $data=array(
                                'id'=>'isclaim',
                                'class'=>'form-control',
                                'name'=>'isclaim',
                                'onChange' => 'onStatusChange('.$goodsreturnnotice->id.', event)');   

                                echo form_dropdown('isclaim',$options,set_value('isclaim', $goodsreturnnotice->isclaim), $data);?>
                            </td>  
                            
                                                       <!--  <td>
                                                            
                                                           <input type="button" value="Delete" class="btn btn-danger" onclick="delete_return_note('<?php echo $goodsreturnnotice->id; ?>');">
                                                       </td> -->
<!--							<td>
								<?php //echo anchor("goodsreturnnotice/Edit/".$goodsreturnnotice->id,'<span class="fa fa-edit"> Edit</span>',(array('class'=>'btn btn-primary ')))?> 
								<?php //echo anchor("goodsreturnnotice/Delete/".$goodsreturnnotice->id,'<span class="fa fa-remove"> Delete</span>', array('class' => 'btn btn-danger ','onclick' => "return confirm('Are you sure?')"));?>
							</td>-->
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
<script type="text/javascript">
$(document).ready(function(){
	$('#goodsreturnnotice').DataTable();
});




</script>
