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

        public function viewSale() {
          $data = [];
          $this->view('Cashier/viewSale',$data);
        }

        public function addSale() {
          $data = [];
          $this->view('Cashier/addSale',$data);
        }

        public function updateSale() {
          $data = [];
          $this->view('Cashier/updateSale',$data);
        }

        public function viewCustomerOrders() {
          $data = [];
          $this->view('Cashier/viewCustomerOrders',$data);
        }

        public function generateInvoice() {
          $data = [];
          $this->view('Cashier/generateInvoice',$data);
        }

    }

?>
