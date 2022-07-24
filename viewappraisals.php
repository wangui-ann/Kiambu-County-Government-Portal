<?php 
require_once 'core/init.php';
?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Evaluation - VIEW EVALUATIONS</title>
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
<?php
     
  $user = new User();
  $users_id = escape($user->data()->users_id);
  $surname = escape($user->data()->surname); 
  $firstname = escape($user->data()->firstname);
  $username = escape($user->data()->username);
  $email = escape($user->data()->email);
  $phone = escape($user->data()->phone);
  $department = escape($user->data()->department);
  $joined = escape($user->data()->joined);
  $level = escape($user->data()->level);
  $matric = escape($user->data()->matric);
  $photo = escape($user->data()->photo);
  $group = escape($user->data()->group);
  $no  = "avatar.png";

  if ($user->isLoggedIn()) {

    if ($user->hasPermission('admin')) {
       Redirect::to('admin.php');
    }
    elseif ($user->data()->group == '3') {
       Redirect::to('lecturer.php');
    }
     
?>
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
              <img src="assets/img/nacoss.png" style="width:60px; height:60px;" />
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
          <li>
            <a href="welcome.php?user=<?php echo $users_id; ?>" ><i class="fa fa-desktop"></i>Dashboard</a>
          </li>

          <li>
            <a href="subcomplaints.php?user=<?php echo $users_id; ?>" ><i class="fa fa-edit"></i>Submit Complaints</a>
          </li>

          <li>
            <a href="history.php?user=<?php echo $users_id; ?>" ><i class="fa fa-history"></i>Complaints History</a>
          </li>
          
          <li>
            <a href="subappraise.php?user=<?php echo $users_id; ?>" ><i class="fa fa-edit"></i><i class="fa fa-user"></i>Evaluate Lecturers</a>
          </li>
          
          <li class="active-link">
            <a href="viewappraisals.php?user=<?php echo $users_id; ?>" ><i class="fa fa-eye"></i>View Evaluations</a>
          </li>

          <li>
            <a href="studprofile.php?user=<?php echo $users_id; ?>" ><i class="fa fa-user"></i>View Profile</a>
          </li>

          <li>
            <a href="statistics.php?user=<?php echo $users_id; ?>" ><i class="fa fa-cog"></i>Statistics</a>
          </li>
      </ul>
      </div>
      </nav>
        <!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">
        
        <div class="row text-center" style="margin-top:1%;">
          <div class="col-md-6">
            <?php $Rphoto = "<img src='profile/".$photo."' style='width:35px; height:35px;border-radius:50%;'>"; ?>
            <h3 style=""><?php echo $Rphoto." ". $surname." ". $firstname; ?></h3>
          </div>
          <div class="col-md-6">
            <h3><a href="welcome.php?user=<?php echo $users_id; ?>">Dashboard</a> / View Appraisals</h3>
          </div>
        </div>              
       
      <hr/>
      
      <?php if (Session::exists('home')) { ?>
      <div class="row">
        <div class="col-lg-12 ">
          <div class="alert alert-info">
            <i class="fa fa-volume-up"></i>
               <?php echo Session::flash('home'); ?>
          </div> 
        </div>
      </div>
      <?php
        }
      ?>


    <div class="row" style="margin-top:8%;">
      <div class="col-md-1"></div>
      <div class="col-md-10 jumbotron" style="padding:30px;border-radius:10px;">
        <form method="POST" action="" enctype="multipart/form-data">
        
        <div class="form-group" style="margin-top:2%;">
          <label>SELECT LECTURER TO VIEW <span style="color:red;">*</span></label>
            <select class="form-control" name="lecturer">
              <?php
                $sql = DB::getInstance()->query("SELECT * FROM users WHERE opt = 'lecturer' ");
                if ($sql->count()) {               
                  foreach ($sql->results() as $sql) {
                ?>
            <option value="<?php echo $sql->title .' '. $sql->surname .' '. $sql->firstname; ?>">
              <?php echo $sql->title .' '. $sql->surname .' '. $sql->firstname; ?>
            </option>
              <?php
                }
                }
              ?>
          </select>
        </div>

        <div class="row text-center" style="margin-top:4%;">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <div class="form-group">
            <input type="hidden" name="token" value="<?php echo Token::generate();?>">
            <button class="btn btn-primary btn-lg" name="view"><i class="fa fa-eye"></i> Click to View</button>
          </div>
        </div>
        <div class="col-md-4"></div>
        </div>


        </form>
      </div>
      <div class="col-md-1"></div>
    </div>

<!-- table -->

<div class="row" style="margin-top:6%;">
      <div class="col-md-12 text-center">
      <?php
      if (isset($_POST['view'])) {
        # code...
      $key = input::get('lecturer');
      $sql = DB::getInstance()->query("SELECT * FROM praise WHERE lecturer = ? ORDER BY a_id desc", array(
        'lecturer' => $key
        ));

      if ($sql->count($sql)) 
      { ?> 
        <table class="table table-striped table-bordered text-center">
          <tr>
            <th style="text-align:center;">REASON</th>
            <th style="text-align:center;">RATE</th>
            <th style="text-align:center;">STUDENT</th>
            <th style="text-align:center;">LECTURER</th>
            <th style="text-align:center;">DATE</th>
            <th style="text-align:center;">OPTION</th>
          </tr>
        <?php
        foreach ($sql->results() as $sql) {?>
         <tr>
            <td>
            <?php echo $sql->reason;?>
            </td>
            
            <td>
            <?php echo $sql->rate;?>
            </td>

            <td>
            <?php echo $sql->mode;?>
            </td>

            <td>
            <?php echo $sql->lecturer;?>
            </td>

            <td>
            <?php echo $sql->date;?>
            </td>

            <td>
            <a href="praisereveal.php?id=<?php echo $sql->a_id; ?>">
              <span class="badge btn btn-primary">
                <i class="fa fa-eye"> View</i>
              </span>
            </a>
            </td>

          </tr>

        <?php
        }
        }
        else {
          ?>
              <div class="alert alert-danger">
                  <p>Oops! No Evaluation Records Found for <b><?php echo $key; ?></b></p>
              </div>
          
        <?php
        }
      }
        ?>
      </table>

        </div>
      </div>

<!-- table -->

  </div> <!-- /. PAGE INNER  -->
</div><!-- /. PAGE WRAPPER  -->

</div><!-- /. PAGE WRAPPER 2  -->





<!-- FOOTER HERE -->

<div class="footer">
    <div class="row">
        <div class="col-lg-12 text-center">
            &copy; 2020 All Rights Reserved KCA UNIVERSITY
        </div>
    </div>
</div>
          
<?php

}

else

{

  redirect::to('login.php');

}

?>


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
