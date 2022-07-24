<?php 
require_once 'core/init.php';
?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Evaluation - VIEW & UPDATE PROFILE</title>
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
  $title = escape($user->data()->title);
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

   if ($user->isLoggedIn()) {

    if ($user->hasPermission('admin')) {
       Redirect::to('admin.php');
    }
    elseif (!$user->hasPermission('admin') && !$user->data()->group == '3' && !$user->data()->opt == 'lecturer'){
       Redirect::to('welcome.php');
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
            <a href="lecturer.php?user=<?php echo $users_id; ?>" ><i class="fa fa-desktop"></i>Dashboard</a>
          </li>
          
          <li>
            <a href="appraisals.php?user=<?php echo $users_id; ?>" ><i class="fa fa-eye"></i>View Evaluations</a>
          </li>

          <li>
            <a href="complaints.php?user=<?php echo $users_id; ?>" ><i class="fa fa-eye"></i>View Complaints</a>
          </li>

          <li class="active-link">
            <a href="lprofile.php?user=<?php echo $users_id; ?>" ><i class="fa fa-user"></i>View Profile</a>
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
            <h3 style=""><?php echo $Rphoto." ". $title." ". $surname." ". $firstname; ?></h3>
          </div>
          <div class="col-md-6">
            <h3><a href="picture.php?user=<?php echo $users_id; ?>">Change Profile Picture ?</a></h3>
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


     <?php
    if (Input::exists()) {
        # code...
        if (Token::check(Input::get('token'))) {
            # code...

            $validate = new Validate();
            $validation = $validate->check($_POST, array(
            
            'level' => array(
                'required'=>true,
                'min'=>2,
                'max'=>30
              ),

            'email' => array(
                'required'=>true,
                'min'=>5,
                'max'=>40
              ),

            'phone' => array(
                'required'=>true,
                'min'=>7,
                'max'=>14
              )

            ));

            if ($validation->passed()) {
                # code...
                try{

                    $user->update(array(
                        'level' => input::get('level'),
                        'email' => input::get('email'),
                        'username' => input::get('email'),
                        'phone' => input::get('phone'),

                    ));
                        Session::flash('home', 'You Profile has been Updated Successfully !!!');
                        ?>
                        <script type="text/javascript">
                            setTimeout(function(){
                            window.location.replace("lprofile.php?user=<?php echo $users_id; ?>");
                                       }, 100);
                        </script>
                        <?php

                }catch(Exception $e){

                    die($e->getMessage());
                }


            }else{
                foreach ($validation->errors() as $error){
                    ?>
                
                        <div class="alert alert-danger">
                            <?php echo $error, '<br>'; ?>
                        </div>
                
                    <?php
                }
            }
        }

    }

?>


    <div class="row" style="margin-top:7%;">
      <div class="col-md-12">
        <div class="card">

    <form action="" method="POST">

    <div class="row">
      <div class="col-md-4"></div>
        <div class="col-md-4">
            <?php echo "<img src='profile/".$photo."' alt='Profile Picture' class='thumbnail' height='auto' width='100%' style='border-radius:50%; align:center;'>"; ?>
        </div>
      <div class="col-md-4"></div>
    </div>

   
  <div class="card-body">
    
    <div class="row" style="margin-top:3%;">
        <div class="col text-center">
            <h3 class="card-title" style="text-transform:uppercase; font-size:30px; font-weight:bold;">
              <i class="fa fa-user"></i> 
            <?php echo $title ." ". $surname." ". $firstname; ?>
            </h3>
        </div>
    </div>


    <div class="row" style="margin-top:2%;">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div style="width:100%; border:1px solid rgba(0,0,0,0.5); text-align:center;"></div>
        </div>
        <div class="col-md-3"></div>
    </div>

    <div class="row text-center" style="margin-top:2%;">
        <div class="col-md-4" style="margin-top:3%;">
            <label><b>IDENTITY NUMBER :</b> </label>
            <input type="text" name="matric" class="form-control text-center" value="<?php echo $matric; ?>" disabled autocomplete="off">
        </div>
        <div class="col-md-4" style="margin-top:3%;">
            <label><b>FACULTY :</b></label>
            <input type="text" name="department" class="form-control text-center" value="<?php echo $department; ?>" disabled autocomplete="off">
        </div>
        <div class="col-md-4" style="margin-top:3%;">
            <label><b>HIGHEST QUALIFICATION :</b></label>
            <input type="text" name="level" class="form-control text-center" value="<?php echo $level; ?>" autocomplete="off">
        </div>
    </div>

    <div class="row text-center" style="margin-top:2%;">
        <div class="col-md-4" style="margin-top:3%;">
            <label><b>EMAIL ADDRESS:</b> </label>
            <input type="text" name="email" class="form-control text-center" value="<?php echo $email; ?>" autocomplete="off">
        </div>
        <div class="col-md-4" style="margin-top:3%;">
            <label><b>PHONE NUMBER:</b></label>
            <input type="text" name="phone" class="form-control text-center" value="<?php echo $phone; ?>" autocomplete="off">
        </div>
        <div class="col-md-4" style="margin-top:3%;">
            <label><b>REGISTRATION DATE:</b></label>
            <input type="text" name="joined" class="form-control text-center" value="<?php echo $joined; ?>" disabled>
        </div>
    </div>

    <div class="row text-center" style="margin-top:6%;">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <div class="form-group">
            <input type="hidden" name="token" value="<?php echo Token::generate();?>">
            <button class="btn btn-primary btn-lg"><i class="fa fa-pencil"></i> Save Changes</button>
          </div>
        </div>
        <div class="col-md-4"></div>
    </div>

</div> <!-- card body -->
  </form>
  </div>  <!-- card -->
  </div><!-- col -->
</div><!-- row -->


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
