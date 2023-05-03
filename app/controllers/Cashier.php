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
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data2 = $this->cashierModel->get_productView();

        $data = [
          'saleId'=> '',
          'productId' => trim($_POST['productId']),
          'quantity' => trim($_POST['quantity']),

          'productId_err' => '',
          'quantity_err' => '',
        ];

        //validation
        if(empty($data['productId'])) { $data['productId_err'] = '*'; }
        if(empty($data['quantity'])) { $data['quantity_err'] = '*'; }

        $result = array($data,$data2);
            
        //if no errors
        if(empty($data['productId_err']) && empty($data['quantity_err'])) {
          $data['saleId'] = $this->cashierModel->findSaletId();

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
        $getSaleId= $this->cashierModel->findSaleId();
        $data2 = $this->cashierModel->get_productView();

        $data = [
          'saleId'=> $getSaleId,
          'productId' => '',
          'quantity' => '',
          // 'receiptId' => '',

          'productId_err' => '',
          'quantity_err' => '',
        ];

        $result = array($data,$data2);
        $this->view('Cashier/cashier_home',$result);
      }
    }

    public function viewOnsiteSale() {
      $onsiteSaleView= $this->cashierModel->get_onsiteSaleView();
      $productSaleView= $this->cashierModel->get_productSaleView();
      $data = [
        'onsiteSaleView' => $onsiteSaleView,
        'productSaleView' => $productSaleView
      ];
      $this->view('Cashier/viewOnsiteSale',$data);    
    }

    public function viewCustomerOrders($status) {
      if($status == 'Ongoing'){
        $onlineOrderView= $this->cashierModel->get_ongoingOrderView();
      }
      else {
        $onlineOrderView= $this->cashierModel->get_deliveredOrderView();
      }
      $data = [
        'onlineOrderView' => $onlineOrderView,
        'status' => $status
      ];
      $this->view('Cashier/viewCustomerOrders',$data);
    }

    public function updateSale() {
      $data = [];
      $this->view('Cashier/updateSale',$data);
    }

    public function saveProductSale() {
      $data = json_decode(file_get_contents('php://input'), true);
      if(!$this->cashierModel->saveProductSale($data)) {
        echo json_encode(array('success' => false));
      }
      else {
        echo json_encode(array('success' => true));
      }
      // echo json_encode($data);
    }

    public function submitdata() {
      $data = json_decode(file_get_contents('php://input'), true);
      if(!$this->cashierModel->submitdata($data)) {
        echo json_encode(array('success' => false));
      }
      else {
        echo json_encode(array('success' => true));
      }
      // echo json_encode($data);
    }

  }

  

?>
