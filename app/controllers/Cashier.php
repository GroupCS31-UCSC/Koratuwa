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
      // $ongoing= $this->cashierModel->get_ongoingOrderView();
      // $addSale = $this->cashierModel->addSale();

      // $data = [
      //   'ongoing' => $ongoing,
      //   'addSale' => $addSale
      // ];
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data2 = $this->cashierModel->get_productView();

        $data = [
          // 'saleId'=> '',
          'productId' => trim($_POST['productId']),
          'quantity' => trim($_POST['quantity']),
          'receiptId' => '',

          'productId_err' => '',
          'quantity_err' => '',
        ];

        //validation
        if(empty($data['productId'])) { $data['productId_err'] = '*'; }
        if(empty($data['quantity'])) { $data['quantity_err'] = '*'; }

        $result = array($data,$data2);
            
        //if no errors
        if(empty($data['productId_err']) && empty($data['quantity_err'])) {
          $data['saleId'] = $this->cashierModel->findReceiptId();

          if($this->cashierModel->addSale($data)) {
            flash('add_onsiteSale_success', 'Sale added successfully');
            redirect('Cashier/cashier_home');
          }
          else {
            die('Something went wrong');
          }
        }
        else {
          // $this->view('Cashier/addSale',$result);
          $this->view('Cashier/cashier_home',$result);
        }
      }
      else {
        $data2 = $this->cashierModel->get_productView();

        $data = [
          // 'saleId'=> '',
          'productId' => '',
          'quantity' => '',
          'receiptId' => '',

          'productId_err' => '',
          'quantity_err' => '',
        ];

        $result = array($data,$data2);
        // $this->view('Cashier/addSale',$result);
        $this->view('Cashier/cashier_home',$result);
      }
      // $this->view('Cashier/cashier_home',$data);
    }

    public function getProductName() {
      $productId = $_POST['productId'];
      $productName = $this->cashierModel->getProductNameById($productId);
      echo $productName;

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

    // public function addSale() {
    //   if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //     $data2 = $this->cashierModel->get_productView();

    //     $data = [
    //       'saleId'=> '',
    //       'productId' => trim($_POST['productId']),
    //       'quantity' => trim($_POST['quantity']),

    //       'productId_err' => '',
    //       'quantity_err' => '',
    //     ];

    //     //validation
    //     if(empty($data['productId'])) { $data['productId_err'] = '*'; }
    //     if(empty($data['quantity'])) { $data['quantity_err'] = '*'; }

    //     $result = array($data,$data2);
            
    //     //if no errors
    //     if(empty($data['productId_err']) && empty($data['quantity_err'])) {
    //       $data['saleId'] = $this->cashierModel->findSaleId();

    //       if($this->cashierModel->addSale($data)) {
    //         flash('add_onsiteSale_success', 'Sale added successfully');
    //         redirect('Cashier/addSale');
    //       }
    //       else {
    //         die('Something went wrong');
    //       }
    //     }
    //     else {
    //       $this->view('Cashier/addSale',$result);
    //     }
    //   }
    //   else {
    //     $data2 = $this->cashierModel->get_productView();

    //     $data = [
    //       'saleId'=> '',
    //       'productId' => '',
    //       'quantity' => '',

    //       'productId_err' => '',
    //       'quantity_err' => '',
    //     ];

    //     $result = array($data,$data2);
    //     $this->view('Cashier/addSale',$result);
    //   }
    // }



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
