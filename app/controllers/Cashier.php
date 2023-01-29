<?php

    class Cashier extends Controller
    {
      public $cashierModel;

        public function __construct()
        {
          $this->userModel = $this->model('Cashier_Model');

          if(!$_SESSION['user_email']){
            redirect('Users/login');
          }          
        }

        #cashierHome

    }

?>
