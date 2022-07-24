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
          
          'RentType' => array(
            'required'=>true,
          ),
          'Amount' => array(
            'required'=>true,
            'min'=>2
          ),

          'RentNo' =>array(
            'required'=>true
          ),
          
      ));
      if ($validation->passed()) {

          $query = DB::getInstance()->insert('rent', array(
          'RentNo'   => input::get('RentNo'),
          'RentType' => input::get('RentType'),
          'Month'     => input::get('Month'),
          'Amount'    => input::get('Amount'),
           ));

          Session::flash('home', 'Congratulations, You have successfuly submitted your rent payment !!!');
          
          Redirect::to('subappraise.php');       
          
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