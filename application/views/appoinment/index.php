<!-- Content Header (Page header) -->
<?php //print_r($v_type);die; ?>
    <section class="content-header">
<title>P and P Motors | Login </title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<style>
 .main{
 	background-image: url("<?php echo base_url('assertsN/images/img34.jpg');?>");
 	 /* Full height */
    height: 25%; 

    /* Center and scale the image nicely */
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
 };

</style>
</section>
<!-- Main content -->
<section class="content">

   
       <div class="main">
          <div class="login_top">
          	<div class="container">
          		<!-- <div class="col-md-6">
				 <div class="login-page">
					<h4 class="title">New Customers</h4>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis</p>
					<div class="button1">
					   <<a href="/VehicleServiceandStockManagementSystem/index.php/Web/login/signup"><input type="submit" class="button" name="Submit" value="Create an Account"></a>
					 </div>
					 <div class="clear"></div>
				  </div>
				</div> -->
				<div class="col-md-12">
				 <div class="login-page">
				  <div class="login-title">
	           		<h4 class="title">Registered Customers</h4>
	           		<div class="panel panel-default">
					  <div class="panel-body">
					  	<div class="row">
					  		<div class="col-md-12">
            <!-- tabs left -->
            <div class="tabbable">
                <ul class="nav nav-pills nav-stacked col-md-3">
                    <li><a href="#a" data-toggle="tab" button="btn btn primary">Add Appoinment</a></li>
                    <li class="active"><a href="#b" data-toggle="tab">List Appoinment</a></li>
                    <li><a href="#c" data-toggle="tab">Twee</a></li>
                </ul>
                <div class="tab-content col-md-9">
                    <div class="tab-pane active" id="a">
                    	<form class="form-horizontal" method="post" action="save_appoinment">
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Vehicle Type</label>
						    <div class="col-sm-4">
						      <select class="form-control" id="vehicle_type" name="vehicle_type">
						      	<option value="0"></option>
						      	<?php
						      		foreach ($v_type as $key => $value) { 
						      			//print_r($value[$key]);
						      			?>
						      			<option value='<?php echo $value['id']; ?> '><?php echo $value['typeofvehicle']; ?></option>
						      	<?php	}
						      	?>
						      </select>
						    </div>
						    <label for="inputEmail3" class="col-sm-2 control-label">Vehicle Model</label>
						    <div class="col-sm-4">
						      <select class="form-control" id="vehicle_model" name="vehicle_model"></select>
						    </div>
						  </div>
					  		<div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Service Type</label>
						    <div class="col-sm-4">
						      <select class="form-control" id="vehicle_type" name="vehicle_type">
						      	<option value="0"></option>
						      	<?php
						      		foreach ($service as $key => $value) { 
						      			//print_r($value[$key]);
						      			?>
						      			<option value='<?php echo $value['id']; ?> '><?php echo $value['type']; ?></option>
						      	<?php	}
						      	?>
						      </select>
						    </div>
						    <label for="inputEmail3" class="col-sm-2 control-label">Date</label>
						    <div class="col-sm-4">
						      <input type="date" name="date" class="form-control" id="date">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Remarks</label>
						    <div class="col-sm-10">
						      <textarea class="form-control" id="remarks" name="remarks"></textarea>
						    </div>
						    
						  </div>





						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <button type="button" id="btn_submit" class="btn btn-default">Submit</button>
						    </div>
						  </div>
						</form>
<!--                     	<form>
                    		<form action="Auth" method="post" name="login" id="login-form">

						  <fieldset class="input">
						    <p id="login-form-username">
						      <label for="modlgn_username">Username</label>
						      <input id="modlgn_username" type="text" name="email" class="inputbox" size="18" autocomplete="off">
						      <?php echo form_error("email");?>
						    </p>
						    <p id="login-form-password">
						      <label for="modlgn_passwd">Password</label>
						      <input id="modlgn_passwd" type="password" name="password" class="inputbox" size="18" autocomplete="off">
						      <?php echo form_error("password");?>
						    </p>
						    <div class="remember">
							    <p id="login-form-remember">
							      <label for="modlgn_remember"><a href="#">Forget Your Password ? </a></label>
							   </p>
							    <input type="submit" id='submit' name="Submit" class="button" value="Login"><div class="clear"></div>
							 </div>
						  </fieldset>
						 </form>
                    	</form> -->
                    </div>
                    <div class="tab-pane" id="b">Secondo sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. Aliquam in felis sit amet augue.</div>
                    <div class="tab-pane" id="c">Thirdamuno, ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum auctor accumsan. Duis pharetra
                    varius quam sit amet vulputate. Quisque mauris augue, molestie tincidunt condimentum vitae. </div>
                </div>
            </div>
            <!-- /tabs -->
        </div>
					  	</div>

					  </div>
					</div>
					<!-- <div id="loginbox" class="loginbox"> -->

						<!-- <form action="Auth" method="post" name="login" id="login-form"> -->

						  <!-- <fieldset class="input">
						    <p id="login-form-username">
						      <label for="modlgn_username">Username</label>
						      <input id="modlgn_username" type="text" name="email" class="inputbox" size="18" autocomplete="off">
						      <?php echo form_error("email");?>
						    </p>
						    <p id="login-form-password">
						      <label for="modlgn_passwd">Password</label>
						      <input id="modlgn_passwd" type="password" name="password" class="inputbox" size="18" autocomplete="off">
						      <?php echo form_error("password");?>
						    </p>
						    <div class="remember">
							    <p id="login-form-remember">
							      <label for="modlgn_remember"><a href="#">Forget Your Password ? </a></label>
							   </p>
							    <input type="submit" id='submit' name="Submit" class="button" value="Login"><div class="clear"></div>
							 </div>
						  </fieldset> -->
						 <!-- </form> -->
					<!-- </div> -->
			      </div>
				</div>
				<div class="clear"></div>
			  </div>
			</div>
		  </div>
         </div>
</section>
<script type="text/javascript">
	
	$("#btn_submit").click(function(e){
		$.ajax({
            type: "POST",
            url: 'save_appoinment',
            data:$('form').serializeArray(),
            success: function (data) {
            	var obj=$.parseJSON(data);
            	if(obj.status){
            		alert("success");
            		$('form')[0].reset();
            	}else{
            		alert(obj.msg);
            	}
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                // swal(errorThrown, {
                //         icon: "fail",
                //     });
            }
        });
	});
	$("#vehicle_type").change(function(e){
		// alert($(this).val());
		$.ajax({
            type: "POST",
            url: 'get_vehicle_model',
            data:{
            	v_type:$("#vehicle_type").val()
            },
            success: function (data) {
            	var obj=$.parseJSON(data);
            	if(obj.status){
            		$("#vehicle_model").html("<option value='0'></option>");
            		$.each(obj.data,function(key,val){
            		$("#vehicle_model").append("<option value='"+val.id+"'>"+val.vehiclemodel+"</option>");

            		});
            	}else{
            		alert(obj.msg);
            	}
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                // swal(errorThrown, {
                //         icon: "fail",
                //     });
            }
        });
	});
	// $("form").submit(function(e){
	// 	e.preventDefault(); 
	// 	var valied_status=true;
	// 	if($("#modlgn_username").val() =="" || $("#modlgn_username").val()==null ){
	// 		alert("Username is required");
	// 	}
	// 	if($("#modlgn_passwd").val() =="" || $("#modlgn_passwd").val()==null ){
	// 		alert("Password is required");

	// 	}
	// 	$.ajax({
 //            type: "POST",
 //            url: 'auth',
 //            data: $('form').serialize(),
 //            success: function (data) {
 //            	var obj=$.parseJSON(data);
 //            	if(obj.status){
 //            		window.location.href = 'apponment';
 //            	}else{
 //            		alert(obj.msg);
 //            	}
 //                // swal("success", {
 //                //         icon: "success",
 //                //     });
 //                // location.reload();
 //            },
 //            error: function (XMLHttpRequest, textStatus, errorThrown) {
 //                // swal(errorThrown, {
 //                //         icon: "fail",
 //                //     });
 //            }
 //        });
	// });
</script>