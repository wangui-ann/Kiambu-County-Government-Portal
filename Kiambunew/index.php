<?php 
require_once 'core/init.php';


?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kiambu County Portal</title>
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
        </div>
  </div>
<!-- /. NAV TOP  -->
      
    <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
     
          <li class="active-link">
            <a href="index.php" ><i class="fa fa-desktop"></i>Home</a>
          </li>
          
        </ul>
      </div>
    </nav>
        <!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">

      <hr/>
      

    <div class="row" style="margin-top:10%;">
      <div class="col-md-12 text-center">
          <h1>Welcome to</h1>
          <h2>Kiambu County Council Portal.</h2>
          <a href="welcome.php" class="btn btn-primary btn-lg" style="margin-top:3%;">Get Started</a>
          <img src="assets/img/7.jpg">
      </div>
    </div>
    <div>
      <a href = "welcome.php">Proceed to portal</a>
    </div>


  </div> <!-- /. PAGE INNER  -->
</div><!-- /. PAGE WRAPPER  -->

</div><!-- /. PAGE WRAPPER 2  -->





<!-- FOOTER HERE -->

<div class="footer">
    <div class="row">
        <div class="col-lg-12 text-center">
            &copy; 2022 All Rights Reserved Kiambu County Council Portal
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
