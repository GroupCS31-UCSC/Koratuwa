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
          elseif($_SESSION['user_type']!='Customer'){
            redirect('Users/login');
          }  
        }

        public function customerHome()
        {
          $productCategory= $this->customerModel->get_productCategories();

          $data = [
            'productCategory' => $productCategory
          ];
          $this->view('customer/cus_home',$data);
        }

        public function viewProductDetails($pId)
        {
          $productDetails= $this->customerModel->viewProductById($pId);

          $data = [
              'productDetails' => $productDetails
          ];

          $this->view('customer/view_product',$data);
        }

        public function buyNow()
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
              'customer_id' => '',
              'date' => '',
              'time' => '',
              'product_id' => '',  
              'product_name' => 'milk',
              'quantity' => trim($_POST['quantity']),
              'unit_price' => '100',
              'total_price' => '',

              'quantity_err' => '',
              // 'date_err' => '',
              // 'time_err' => ''
            ];

            //validation
            if (empty($data['quantity'])){
              $data['quantity_err'] = '*' ;
            }
            elseif ($data['quantity'] <1) {
              $data['quantity_err'] = 'Required minimum 1 item to buy product' ;
            }

            // if (empty($data['date'])){
            //   $data['date_err'] = '*' ;
            // }
            // elseif (strtotime($data['date']) < strtotime(date('y-m-d')))  {
            //   $data['date_err'] = 'Invalid date' ;
            // }


            if(empty($data['quantity_err']))
            {
              // $data['supOrderId']=$this->customerModel->findSupOrderId();

              $this->customerModel->buyProduct($data);

            // }
            // else
            // {
            //   //loading the form with the errors
            //   $this->view('customer/view_product',$data);
             }
             else
             {
               //loading the form with the errors
               $this->view('customer/buy_now',$data);
             }
          }
          else
          {
            //initial form loading
            $data = [
              'customer_id' => '',
              'quantity' => '',
              'date' => '',
              'time' => '',
              'product_id' => '',  
              'product_name' => '',
              'unit_price' => '',
              'total_price' => '',

              'quantity_err' => '',
              'date_err' => '',
              'time_err' => ''
            ];
            $this->view('customer/buy_now',$data);
          }
        }

        public function addToCart($pId){

          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
              'product_id' => $pId,
              'customer_id' => $_SESSION['user_id'],
              'quantity' => $_POST['quantity'],
              'total_price' => $_POST['unit_price'] * $_POST['quantity']
            ];
            $res =  $this->customerModel->addItemToCart($data);
            if($res){
              redirect('Customer/customerHome/ok');
            }else {
              redirect('Customer/customerHome/error');
            }
          }
        }

        public function cart(){
          $res =  $this->customerModel->viewCartItems($_SESSION['user_id']);
          $data = [
            'products' => $res
          ];
          $this->view('customer/cart', $data);

        }

        public function deleteCartItem($time){

        // alert($time);
          if($this->customerModel->dltCartItems($time))
          {
            redirect('customer/cart');
          }
          else
          {
            die('Something went wrong');
          }
        }


        //----------------------Payhere--------------------------------------//
        public function paymentDetails($payment){


          
          $amount = $payment;
          // $hotelid=$hotelid;
          $merchant_id = "1223042";
          $order_id = $this->customerModel->generateordId();
          $merchant_secret = "Mjc3MjYxOTQ5ODM4MDk1MDkxMDM0NDIwMDUzMTczMDc1ODY5ODgz";
          $currency = "LKR";

          $hash = strtoupper(
              md5(
                  $merchant_id .
                  $order_id.
                  number_format($amount, 2, '.', '') . 
                  $currency .  
                  strtoupper(md5($merchant_secret)) 
              ) 
          );

          $array = [];
          $array["first_name"] = $_SESSION['user_name'];
          $array["last_name"] = "Kumara";
          $array["email"] = $_SESSION['user_email'];
          $array["phone"] = "0777123456";
          $array["address"] = "No.1, Galle Road";
          $array["city"] = "Colombo";

          $array["amount"] = $amount;
          $array["merchant_id"] = $merchant_id;
          $array["order_id"] = $order_id;
          $array["currency"] = $currency;
          $array["hash"] = $hash;

          $jsonObj = json_encode($array); 
          echo $jsonObj;

      }  
      
      public function onlineOrd(){

        $ordId = $this->customerModel->generateordId();
        $RId = $this->customerModel->generatReceiptId();
        
        
        $data=[
          'order_id' => $ordId,
          'payment' => $_POST['amount'],
          'receipt_id' => $RId,
          'products' => json_decode($_POST["products"]),
          
        ];

        if($this->customerModel->onlineOrder($data))
        {
          // redirect('Customer/customerHome');
          $jsonObj=json_encode($data);
          echo $data['products'];
        }
        else
        {
          die('Something went wrong');
        }
      }

      public function Orders()
      {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

          $from = isset($_POST['from']) ? $_POST['from'] : '';
          $to = isset($_POST['to']) ? $_POST['to'] : '';

          $status=$_GET['status'] ?? 'New Order';

          $orderDetails= $this->customerModel->get_OrderDetailsByDate($status,$from,$to);

          $data = [
            'orderDetails' => $orderDetails,
            'status' =>$status,
            'from' => $from,
            'to' => $to
          ];
          $this->view('customer/orders',$data);

        }
        else
        {
          $status=$_GET['status'] ?? 'New Order';
          $orderDetails= $this->customerModel->get_OrderDetails($status);

          $data = [
            'orderDetails' => $orderDetails,
            'status' => '',
            'from' => '',
            'to' => ''
          ];
          $this->view('customer/orders',$data);
        }

      }

      // Update Order status
      
      public function updateStatus() {
        $orderId = $_POST['order_id'];
        $data = [
          'orderId' => $orderId,
          'status' => $status = 'Ongoing'
        ];
        if($this->customerModel->updateStatus($orderId)) {
          flash('update_status_success', 'Status updated successfully');
          redirect('Customer/Orders');
        }
        else {
          die('Something went wrong');
        }
      }

      public function getSaleItems($saleId) {
        $itemView = $this->customerModel->get_itemView($saleId);
  
        $data = [
          'itemView' => $itemView
        ];
  
        $this->view('customer/viewItems', $data);
      }

    }

?>

