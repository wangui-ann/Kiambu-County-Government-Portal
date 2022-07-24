<?php
// require 'co/re/init.php';
$user = new User();
if(Input::exists()){
    if (Token::check(Input::get('token'))) {

      $validate = new Validate();
      $validation = $validate->check($_POST, array(
          
          'Month' => array(
            'required'=>true,
          ),
          
          'ehicleType' => array(
            'required'=>true,
          ),
          'Amount' => array(
            'required'=>true,
            'min'=>2
          ),

          'ehicleNo' =>array(
            'required'=>true
          ),
          
      ));
      if ($validation->passed()) {

          $query = DB::getInstance()->insert('parking', array(
          'ehicleNo'   => input::get('ehicleNo'),
          'ehicleType' => input::get('ehicleType'),
          'Month'     => input::get('Month'),
          'Amount'    => input::get('Amount'),
           ));

          Session::flash('home', 'Congratulations, You have successfuly submitted your parking payment !!!');
          
          Redirect::to('parking.php');       
          
          }

          else{
          
          foreach ($validation->errors() as $error) { ?>
              <div class="row">
              <div class="col-lg-12 ">
                <div class="alert alert-danger">
                   <?php echo $error, '<br>'; ?>
                </div> 
              </div>
            </div>
          <?php }
        }
    }
}
?>