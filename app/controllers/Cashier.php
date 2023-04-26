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
          $onlineOrderView= $this->cashierModel->get_onlineOrderView();
          $data = [
            'onlineOrderView' => $onlineOrderView
          ];
          $this->view('Cashier/viewCustomerOrders',$data);
        }

        public function addOnsiteSale() {
          if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data2 = $this->cashierModel->get_productSaleView();

            $data = [
              'saleId'=> $this->cashierModel->findSaleId(),
              'productName' => trim($_POST['productName']),
              'quantity' => trim($_POST['quantity']),
            ];

            //validation
            if(empty($data['productName'])) { $data['productName_err'] = '*'; }
            if(empty($data['quantity'])) { $data['quantity_err'] = '*'; }

            $result = array($data,$data2);
            
            //if no errors
            if(empty($data['productName_err']) && empty($data['quantity_err'])) {
              if($this->cashierModel->addOnsiteSale($data)) {
                flash('add_onsiteSale_success', 'Sale added successfully');
                redirect('Cashier/addOnsiteSale');
              } else {
                die('Something went wrong');
              }
            } else {
              $this->view('Cashier/addOnsiteSale',$result);
            }
          } else {
            $data2 = $this->cashierModel->get_productSaleView();

            $data = [
              'saleId'=> '',
              'productName' => '',
              'quantity' => '',

              'productName_err' => '',
              'quantity_err' => '',
            ];

            $result = array($data,$data2);
            $this->view('Cashier/addOnsiteSale',$result);
          }
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
