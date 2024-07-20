<!-- Content Header (Page header) -->
<section class="content-header">

  <script type="text/javascript">
  jQuery(document).ready(function($) {

    $(".scroll").click(function(event){   
      event.preventDefault();
      $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
    });

    $('.col-lg-4').hover(
        //trigger when mouse hover
        function(){
          $(this).animate({
            marginTop:"-=1%",
          },200);
        },
        //trigger when mouse out
        function(){
          $(this).animate({
            marginTop:"0%",
          },200);
        },
        
        );
  });
  </script>

  <style>

  .main{
    background-image: url("<?php echo base_url('assertsN/images/rr.jpg');?>");
    /* Full height */
    height: 25%; 

    /* Center and scale the image nicely */
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
  };

  .row{
    margin-top: 20%;
    margin-left: 8%;
  }
  .card:hover{
    -webkit-box-shadow:-1px 9px 40px -12px rgba(0,0,0,0.75);
    -moz-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
    box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
  }

  </style>
</section>
<!-- Main content -->
<section class="content">

 

    <div class="main">
     <div class="container">
       </br>

       <div class="row">
      <div class="col-lg-4">
        <!--bootstrap card-->
        <div class="card" style="width:30rem; text-align:center; background-color:#d5d0d0; padding:10px;">
          <img src="<?php echo base_url('assertsN/images/img43.jpg'); ?>" alt=" " class="card-img-top" style="width:225px; height:200px;">
          <div class="card-body">
            <h3 class="card-title" style=""><b>Make an Appointment</b></h3>
            <p class="card-text">You can easily make an appointment by clicking following button </p>
            <a href="<?php echo base_url('index.php/Jobrequest'); ?>"><button type="button" class="btn btn-primary" >More...</button></a>
          </div>
        </div>
      </div>


    <div class="col-lg-4 ml-2">
      <!--bootstrap card-->
      <div class="card" style="width:30rem; text-align:center; background-color:#d5d0d0; padding:10px;">
        <img src="<?php echo base_url('assertsN/images/img42.png'); ?>" alt=" " class="card-img-top" style="width:225px; height:200px;">
        <div class="card-body">
          <h3 class="card-title" style="color:f3f3f3"><b>Service Status</b></h3>
          <p class="card-text">Check the service status of your vehicle here</p>
<a href="<?php echo base_url('index.php/Jobrequest/servicestatus'); ?>"><button type="button" class="btn btn-primary" >More...</button></a>        </div>
      </div>
    </div>


  <div class="col-lg-4 ml-2">
    <!--bootstrap card-->
    <div class="card" style="width:30rem; text-align:center; background-color:#d5d0d0; padding:10px;">
      <img src="<?php echo base_url('assertsN/images/img44.jpg'); ?>" alt=" " class="card-img-top" style="width:275px; height:200px;">
      <div class="card-body">
        <h3 class="card-title"><b>Service History</b></h3>
        <p class="card-text">Find the details of remote services of your vehicle</p>
<a href="<?php echo base_url('index.php/Jobrequest/servicehistory'); ?>"><button type="button" class="btn btn-primary" >More...</button></a>        </div>
      </div>
    </div>
  </div>
 
</div>
</br>
<div class="row">
 <!--  <div class="col-lg-4 ml-2 col-lg-offset-2"> -->
    <!--bootstrap card-->
   <!--  <div class="card" style="width:32rem; text-align:center; background-color:#d5d0d0; padding:10px;">
      <img src="<?php echo base_url('assertsN/images/img45.jpg'); ?>" alt=" " class="card-img-top">
      <div class="card-body">
        <h3 class="card-title"><b>Due Payments</b></h3>
        <p class="card-text">It is time for you to settle the payments.</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal4">More...</button>
      </div>
    </div>
  </div> -->
<!--   <div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog"> -->

     <!-- Modal content-->
     <!-- <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align:center;"><b>Due payments</b></h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> -->

    <div class="col-lg-4 ml-2 col-lg-offset-4">
      <!--bootstrap card-->
      <div class="card" style="width:32rem; text-align:center; background-color:#d5d0d0; padding:10px;">
        <img src="<?php echo base_url('assertsN/images/Comp.jpg'); ?>" alt=" " class="card-img-top" style="width:260px; height:230px;">
        <div class="card-body">
          <h3 class="card-title" style="color:f3f3f3"><b>Make a Complaint</b></h3>
          <p class="card-text">If your are dissatisfied with any thing please write here.</p>
          <a href="<?php echo base_url('index.php/complaint'); ?>"><button type="button" class="btn btn-primary" >More...</button></a>
        </div>
      </div>
    </div>
</div>
</br>
</div>
</div>
</section>   