<?php
    class Cashier extends Controller {
      public $cashierModel;

        public function __construct() {
          $this->cashierModel = $this->model('Cashier_Model');

          if(!$_SESSION['user_email']){
            redirect('Users/login');
          } 
          elseif($_SESSION['user_type']!='Cashier'){
            redirect('Users/login');
          }         
        }

        public function cashierHome() {
          $ongoing= $this->cashierModel->get_ongoingOrderView();

          $data = [
            'ongoing' => $ongoing
          ];
          $this->view('Cashier/cashier_home',$data);
        }

        public function viewOnsiteSale() {
          $onsiteSaleView= $this->cashierModel->get_onsiteSaleView();
          $data = [
            'onsiteSaleView' => $onsiteSaleView
          ];
          $this->view('Cashier/viewOnsiteSale',$data);
          
        }

        public function viewCustomerOrders() {
          $customerOrderView= $this->cashierModel->get_onlineOrderView();
          $data = [
            'customerOrderView' => $customerOrderView
          ];
          $this->view('Cashier/viewCustomerOrders',$data);
        }

        public function addSale() {
          $data = [];
          $this->view('Cashier/addSale',$data);
        }

        public function updateSale() {
          $data = [];
          $this->view('Cashier/updateSale',$data);
        }

       

        // public function generateReceipt() {
        //   $data = [];
        //   $this->view('Cashier/generateReceipt',$data);
        // }

        // public function updateOrderStatus() {
        //   $data = [];
        //   $this->view('Cashier/updateOrderStatus',$data);
        // }
    }

?>
