<?php

    class Cashier extends Controller
    {
        public function __construct()
        {
          $this->userModel = $this->model('Cashier_Model');
        }



    }

?>
