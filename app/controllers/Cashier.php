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
        $notify = $this->cashierModel->get_Notifications();

        $data = [
          'saleId'=> '',
          'productId' => trim($_POST['productId']),
          'quantity' => trim($_POST['quantity']),
          'notifications' => $notify,

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
        $notify = $this->cashierModel->get_Notifications();

        $data = [
          'saleId'=> $getSaleId,
          'productId' => '',
          'quantity' => '',
          'notifications' => $notify,

          'productId_err' => '',
          'quantity_err' => '',
        ];

        $result = array($data,$data2);
        $this->view('Cashier/cashier_home',$result);
      }
    }

    public function viewOnsiteSale() 
    {
      if($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $from = isset($_POST['from']) ? $_POST['from'] : '';
        $to = isset($_POST['to']) ? $_POST['to'] : '';

        $onsiteSaleView= $this->cashierModel->onsiteSale_duration($from, $to);
        $productSaleView= $this->cashierModel->get_productSaleView();
        $data = [
          'onsiteSaleView' => $onsiteSaleView,
          'productSaleView' => $productSaleView,
          'from' => $from,
          'to' => $to
        ];
        $this->view('Cashier/viewOnsiteSale',$data); 

      }
      else
      {
        $onsiteSaleView= $this->cashierModel->get_onsiteSaleView();
        $productSaleView= $this->cashierModel->get_productSaleView();
        $data = [
          'onsiteSaleView' => $onsiteSaleView,
          'productSaleView' => $productSaleView,
          'from' => '',
          'to' => ''
        ];
        $this->view('Cashier/viewOnsiteSale',$data); 
      } 
   
    }

    public function getSaleItems($saleId) {
      $saleProductView = $this->cashierModel->get_saleProductView($saleId);

      $data = [
        'saleProductView' => $saleProductView
      ];

      $this->view('Cashier/viewSaleItems', $data);
    }

    public function getOrderItems($saleId) {
      $orderProductView = $this->cashierModel->get_orderProductView($saleId);

      $data = [
        'orderProductView' => $orderProductView
      ];

      $this->view('Cashier/viewSaleItems', $data);
    }

    public function viewCustomerOrders()
    {
      if($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $from = isset($_POST['from']) ? $_POST['from'] : '';
        $to = isset($_POST['to']) ? $_POST['to'] : '';

        $status=$_GET['status'] ?? 'New Order';
        $onlineOrderView= $this->cashierModel->onlineOrder_duration($status, $from, $to);
        $data = [
          'onlineOrderView' => $onlineOrderView,
          'status' =>$status,
          'from' => $from,
          'to' => $to
        ];
        $this->view('Cashier/viewCustomerOrders',$data);
      }
      else
      {
        $status=$_GET['status'] ?? 'New Order';
        $onlineOrderView= $this->cashierModel->get_onlineOrderView($status);
        $data = [
          'onlineOrderView' => $onlineOrderView,
          'status' => '',
          'from' => '',
          'to' => ''
        ];
        $this->view('Cashier/viewCustomerOrders',$data);
      }

    }

    // Update Order status
    public function updateStatus() {
      $orderId = $_POST['order_id'];
      $data = [
        'orderId' => $orderId,
        'status' => $status = 'New Order'
      ];
      if($this->cashierModel->updateStatus($orderId)) {
        flash('update_status_success', 'Status updated successfully');
        redirect('Cashier/viewCustomerOrders');
      }
      else {
        die('Something went wrong');
      }
    }

    public function submitdata() {
      $data = json_decode(file_get_contents('php://input'), true);
      if(!$this->cashierModel->submitdata($data)) {
        echo json_encode(array('success' => false));
      }
      else {
        if(!$this->cashierModel->saveProductSale($data)) {
          echo json_encode(array('success' => false));
        }
        else {
          echo json_encode(array('success' => true));
        }
      }
      // echo json_encode($data);
    }


    //update seen notifications
    public function updateNotifyStatus($nId)
    {
      if($this->cashierModel->update_notifyStatus($nId))
      {
        redirect('Cashier/viewCustomerOrders');
      }
      else
      {
        die('Something went wrong');
      }
    }

  }

  

?>
