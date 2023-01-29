<?php

    class Cashier extends Controller
    {
      public $cashierModel;

        public function __construct()
        {
          $this->cashierModel = $this->model('Cashier_Model');
        }



    }

?>
