<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>welcome - WELCOME</title>
  <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>

<div id="wrapper">
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="adjust-nav">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <a class="navbar-brand" href="#">
              <img src="assets/img/nacoss.jpg" style="width:60px; height:60px;" />
          </a>
      </div>

        <span class="logout-spn">
          <a href="logout.php" style="color:#fff; font-size:20px;">LOGOUT <i class="fa fa-sign-out"></i></a>  
        </span>

    </div>
  </div>
<!-- /. NAV TOP  -->
      
      <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
      <ul class="nav" id="main-menu">
          <li class="active-link">
            <a href="welcome.php?user=<?php echo $users_id; ?>" ><i class="fa fa-desktop"></i>Dashboard</a>
          </li>
          
          <li>
            <a href="subappraise.php?user=<?php echo $users_id; ?>" ><i class="fa fa-home"></i></i>Rent</a>
          </li>

          
          <li>
            <a href="parking.php?user=<?php echo $users_id; ?>" ><i class="fa fa-car"></i>Parking</a>
          </li>
          
          <li>
            <a href="permit.php?user=<?php echo $users_id; ?>" ><i class="fa fa-edit"></i>Business Permit</a>
          </li>


      </ul>
      </div>
      </nav>
        <!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">
        
        <div class="row text-center" style="margin-top:1%;">
         
          <div class="col-md-6">
            <h3><a href="ppicture.php?user=<?php echo $users_id; ?>">Change Profile Picture ?</a></h3>
          </div>
        </div>              
       
      <hr/>
  

    <div class="row" style="margin-top:9%;">
      <div class="col-md-12 text-center">
       
        <div class="col-md-3 pad-top">
          <div class="div-square" style="padding:20px;">
            <a href="permit.php?user=<?php echo $users_id; ?>" >
              <i class="fa fa-edit fa-5x"></i>
              <h4>Business Permit</h4>
            </a>
          </div>
        </div>

        <div class="col-md-3 pad-top">
          <div class="div-square" style="padding:20px;">
            <a href="parking.php?user=<?php echo $users_id; ?>">
              <i class="fa fa-car fa-5x"></i>
              <h4>Parking</h4>
            </a>
          </div>
        </div>

        <div class="col-md-3 pad-top">
          <div class="div-square" style="padding:20px;">
            <a href="subappraise.php?user=<?php echo $users_id; ?>" >
              <i class="fa fa-home fa-5x"></i>
              <span class="fa-5x"></span>
              <h4>Rent</h4>
            </a>
          </div>
        </div>

      </div>
    </div>


  </div> <!-- /. PAGE INNER  -->
</div><!-- /. PAGE WRAPPER  -->

</div><!-- /. PAGE WRAPPER 2  -->





<!-- FOOTER HERE -->

<div class="footer">
    <div class="row">
        <div class="col-lg-12 text-center">
            &copy; 2020 All Rights Reserved Kiambu County Council Portal
        </div>
    </div>
</div>
          



<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>
    
   
</body>
</html>
