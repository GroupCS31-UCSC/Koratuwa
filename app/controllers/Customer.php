<?php

    class Customer extends Controller
    {
      public $customerModel;

        public function __construct()
        {
          $this->customerModel = $this->model('Customer_Model');

          if(!$_SESSION['user_email']){
            redirect('Users/login');
          }          
        }

        public function customerHome()
        {
          $data = [];
          $this->view('customer/cus_home',$data);
        }


    }

?>
