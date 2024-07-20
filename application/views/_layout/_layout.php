<!DOCTYPE HTML>
<html>
<head>
  <title>P and P Motors</title>

  <link rel="stylesheet" href="<?php echo base_url('assertsN/css/maxcdn.css'); ?>">
  <script src="<?php echo base_url('assertsN/css/jquerycarousal.css'); ?>"></script>
  <script src="<?php echo base_url('assertsN/css/maxcdnboots2.css'); ?>"></script>



  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assertsN/css/bootstrap.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assertsN/css/style.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assertsN/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assertsN/bower_components/datatables/jquery.dataTables.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assertsN/bower_components/select2/dist/css/select2.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assertsN/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel='stylesheet' type='text/css' href="<?php echo base_url('assertsN/css/font.css'); ?>">
  <link rel='stylesheet' type='text/css' href="<?php echo base_url('assertsN/css/font2.css'); ?>">
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); 
  function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!--<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />-->
  <script src="<?php echo base_url('assertsN/js/jquery.min.js') ?>"></script>
  
  <script src="<?php echo base_url('assertsN/bower_components/jquery/dist/jquery-1.12.4.js') ?>"></script>

  <script src="<?php echo base_url('assertsN/bower_components/jquery-ui/jquery-ui.js') ?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url('assertsN/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
  <!-- Data table -->
  <script src="<?php echo base_url('assertsN/bower_components/datatables/jquery.dataTables.js') ?>"></script>

  <!-- Select 2 -->
  <script src="<?php echo base_url('assertsN/bower_components/select2/dist/js/select2.min.js') ?>"></script>
  <script src="<?php echo base_url('assertsN/sweet-alert/sweetalert.min.js') ?>"></script>
  <!--toggle-->
  <script src="<?php echo base_url('assertsN/bower_components/bootstrap-toggle-master/js/bootstrap-toggle.min.js') ?>"></script>

  <script type="text/javascript">
  jQuery(document).ready(function($) {

    $(".scroll").click(function(event){   
      event.preventDefault();
      $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
    });
  });
  </script>
  <!-- grid-slider -->
  <script type="text/javascript" src="<?php echo base_url('assertsN/js/jquery.mousewheel.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assertsN/js/jquery.contentcarousel.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assertsN/js/jquery.easing.1.3.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assertsN/js/bootstrap.js') ?>"></script>
  <!-- //grid-slider -->

</head>
<body>

  <!-- start menu -->
  <div class="menu" id="menu">
    <div class="container" style="width: -webkit-fill-available;">
     <div class="logo">
      <a href="/VehicleServiceandStockManagementSystem/index.php/Web/aboutUs">
        <img src="<?php echo base_url('assertsN/images/namep&Pnw.jpg'); ?>" alt=" "></a>
      </div>


      <div class="h_menu4"><!-- start h_menu4 -->
       <a class="toggleMenu" href="#">Menu</a>
       <ul class="nav">
        <li><a href="<?php echo base_url('index.php/web/index'); ?>">Home</a></li>
        <?php if($this->session->userdata('isLoggedIn') && $this->session->userdata('login_as_customer')): ?>
        <li><a href="<?php echo base_url('index.php/web/indexlog'); ?>">Dashboard</a></li>
      <?php endif ?>

      <li><a href="<?php echo base_url('index.php/Web/aboutUs'); ?>">About</a></li>

      <?php if($this->session->userdata('isLoggedIn') && $this->session->userdata('login_as_customer')): ?>
      <li><a href="<?php echo base_url('index.php/Jobrequest'); ?>">Appointment</a></li>
    <?php endif ?>

    <?php if($this->session->userdata('isLoggedIn') && $this->session->userdata('login_as_customer')): ?>
    <li><a href="<?php echo base_url('index.php/Vehicle'); ?>">Register Vehicle</a></li>
  <?php endif ?>

  <?php if($this->session->userdata('isLoggedIn') && $this->session->userdata('login_as_customer')): ?>
  <li><a href="<?php echo base_url('index.php/Complaint'); ?>">Complaints</a></li>
<?php endif ?>

<li><a href="<?php echo base_url('index.php/Web/contactUs'); ?>">Contact</a></li>

<?php if($this->session->userdata('isLoggedIn') && $this->session->userdata('login_as_customer')): ?>

  <li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <img src="<?php echo base_url('assertsN/images/img34c.png');?>" class="user-image" alt="User Image" style="width:30px"; "height:30px";>
      <span class="hidden-xs">Welcome, '<?php echo $this->session->userdata("firstname")?>'</span>
    </a>
    <ul class="dropdown-menu">
      <!-- User image -->
      <li class="user-header">
        <img src="<?php echo base_url('assertsN/images/img34c.png');?>" class="img-circle" alt="User Image">

        <p>
         <?php echo $this->session->userdata("firstname");?>

       </p>
     </li>
     <!-- Menu Footer-->
     <li class="user-footer">
      <!-- <div class="pull-left">
        <a href="<?php echo base_url('index.php/web/custview'); ?>" class="btn btn-default btn-flat">Profile</a>
      </div> -->
      <div class="pull-right">
        <a href="<?php echo base_url('index.php/web/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>

      </div>
    </li>
  </ul>

<?php else: ?>
 <li><a href="<?php echo base_url('index.php/Customer'); ?>">Sign Up</a></li>
 <li><a href="<?php echo base_url('index.php/Web/loginN'); ?>">Login</a></li>
<?php endif ?>


</ul>
<script type="text/javascript" src="<?php echo base_url('assertsN/js/nav.js') ?>"></script>
</div><!-- end h_menu4 -->






<!-- <div class="navbar-custom-menu box-tools pull-right">
  <ul class="nav navbar-nav" > -->

   <!-- User Account: style can be found in dropdown.less -->
 <!--   <li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <img src="<?php echo base_url('assertsN/images/img34c.png');?>" class="user-image" alt="User Image" style="width:30px"; "height:30px";>
      <span class="hidden-xs">Welcome, '<?php echo $this->session->userdata("firstname")?>'</span>
    </a>
    <ul class="dropdown-menu"> -->
      <!-- User image -->
   <!--    <li class="user-header">
        <img src="<?php echo base_url('assertsN/images/img34c.png');?>" class="img-circle" alt="User Image">

        <p>
         <?php echo $this->session->userdata("firstname");?>

       </p>
     </li> -->
     <!-- Menu Footer-->
  <!--    <li class="user-footer">
      <div class="pull-left">
        <a href="<?php echo base_url('index.php/web/custview'); ?>" class="btn btn-default btn-flat">Profile</a>
      </div>
      <div class="pull-right">
        <a href="<?php echo base_url('index.php/web/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>

      </div>
    </li>
  </ul>
</li>

</ul>
</div> -->




<div class="clear"></div>
</div>
</div>
<!-- end menu -->

<div>
  <?php echo $subview; ?>
</div>


<div class="footer-bottom">
 <div class="container">
   <div class="row section group">

    <div class="col-md-6">
      <div class="f-logo">
        <img src="<?php echo base_url('assertsN/images/namep&Pnw.jpg'); ?>" alt=" "></a>
      </div>
      <p class="m_9">We care your own motor-bike or three-wheeler with providing better service</p>
      <p class="address">Phone : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="m_10">0112 - 545692 / 0773 - 000682</span></p>
      <p class="address">Address : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="m_10">No 51/A,</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Koshinna Watta Road,</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 10th Mile Post,</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Katuwawala,</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Boralasgamuwa</span></p>
    </div>
    <div class="col-md-4 col-md-offset-2">
      <ul class="list">
        <h4 class="m_7">Menu</h4>

        <li><a href="<?php echo base_url('index.php/web/index'); ?>">Home</a></li>
        <?php if($this->session->userdata('isLoggedIn') && $this->session->userdata('login_as_customer')): ?>
        <li><a href="<?php echo base_url('index.php/web/indexlog'); ?>">Dashboard</a></li>
      <?php endif ?>

      <li><a href="<?php echo base_url('index.php/Web/aboutUs'); ?>">About</a></li>

      <?php if($this->session->userdata('isLoggedIn') && $this->session->userdata('login_as_customer')): ?>
      <li><a href="<?php echo base_url('index.php/Jobrequest'); ?>">Appointment</a></li>
    <?php endif ?>
    
    <?php if($this->session->userdata('isLoggedIn') && $this->session->userdata('login_as_customer')): ?>
    <li><a href="<?php echo base_url('index.php/Vehicle'); ?>">Register Vehicle</a></li>
  <?php endif ?>


  <?php if($this->session->userdata('isLoggedIn') && $this->session->userdata('login_as_customer')): ?>
  <li><a href="<?php echo base_url('index.php/Complaint'); ?>">Complaints</a></li>
<?php endif ?>

<li><a href="<?php echo base_url('index.php/Web/contactUs'); ?>">Contact</a></li>

<?php if($this->session->userdata('isLoggedIn') && $this->session->userdata('login_as_customer')): ?>

  <li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
     
      <span class="hidden-xs">Logged as, '<?php echo $this->session->userdata("firstname")?>'</span>
    </a>


  <?php else: ?>
  <li><a href="<?php echo base_url('index.php/Customer'); ?>">Sign Up</a></li>
  <li><a href="<?php echo base_url('index.php/Web/loginN'); ?>">Login</a></li>
<?php endif ?>

</ul>
</div>
<div class="clear"></div>
</div>
</div>
</div>
<div class="copyright">
  <div class="container">
    <div class="copy">
      <p></p>
    </div>
    <div class="social">  
      <h5 style="color:white">P and P Motors Team</h5>
    </div>
    <div class="clear"></div>
  </div>
</div>
<!-- SlimScroll -->
<script src="<?php echo base_url('assertsN/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assertsN/bower_components/fastclick/lib/fastclick.js') ?>"></script>

</body>
</html>