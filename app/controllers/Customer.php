<?php

    class Customer extends Controller
    {
      public $customerModel;

        public function __construct()
        {
          $this->customerModel = $this->model('Customer_Model');
        }

        public function customerHome()
        {
          $data = [];
          $this->view('customer/cus_home',$data);
        }


    }

?>
