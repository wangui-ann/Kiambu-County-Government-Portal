<?php
// require 'co/re/init.php';
$user = new User();
if(Input::exists()){
    if (Token::check(Input::get('token'))) {

      $validate = new Validate();
      $validation = $validate->check($_POST, array(
          
          'Year' => array(
            'required'=>true,
          ),
          
          'BusinessType' => array(
            'required'=>true,
          ),
          'Amount' => array(
            'required'=>true,
            'min'=>2
          ),

          'BusinessNo' =>array(
            'required'=>true
          ),
          
      ));
      if ($validation->passed()) {

          $query = DB::getInstance()->insert('permit', array(
          'BusinessNo'   => input::get('BusinessNo'),
          'BusinessType' => input::get('BusinessType'),
          'Year'     => input::get('Year'),
          'Amount'    => input::get('Amount'),
           ));

          Session::flash('home', 'Congratulations, You have successfuly renewed your business permit !!!');
          
          Redirect::to('permit.php');       
          
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