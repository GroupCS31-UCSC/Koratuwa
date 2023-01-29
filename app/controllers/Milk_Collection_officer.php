<?php

    class Milk_Collection_Officer extends Controller
    {
      public $mcoModel;
      
        public function __construct()
        {
          $this->userModel = $this->model('Milk_Collection_Officer_Model');

          if(!$_SESSION['user_email']){
            redirect('Users/login');
          }          
        }


        #mcoHome
    }

?>
