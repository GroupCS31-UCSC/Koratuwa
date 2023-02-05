<?php
    class Cashier extends Controller {
      public $cashierModel;

        public function __construct() {
          $this->cashierModel = $this->model('Cashier_Model');

          if(!$_SESSION['user_email']){
            redirect('Users/login');
          }          
        }

        public function cashierHome() {
          $data = [];
          $this->view('Cashier/cashier_home',$data);
        }

    }

?>
