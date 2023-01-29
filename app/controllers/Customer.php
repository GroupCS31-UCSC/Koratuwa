<?php

    class Customer extends Controller
    {
        public function __construct()
        {
          $this->userModel = $this->model('Customer_Model');

          if(!$_SESSION['user_email']){
            redirect('Users/login');
          }          
        }

        public function landingPage()
        {
          $data = [];
          $this->view('customer/cus_home',$data);
        }


    }

?>
