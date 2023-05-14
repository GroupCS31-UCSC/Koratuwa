<?php

    class Milk_Collection_Officer extends Controller
    {
      public $mcoModel;
      
        public function __construct()
        {
          $this->mcoModel = $this->model('Milk_Collection_Officer_Model');

          if(!$_SESSION['user_email']){
            redirect('Users/login');
          }  
          elseif($_SESSION['user_type']!='Milk Collection Officer'){
            redirect('Users/login');
          }        
        }

        //redirect to the mco Home page with details
        public function mcoHome()
        {
          $todayOrderView= $this->mcoModel->get_todayOrderView();
          $lastDate = $this->mcoModel->get_lastDate();
          $lastPrice = $this->mcoModel->get_lastPrice();

          $internalMilk = $this->mcoModel->get_InternalMilkCollection();
          $externalMilk = $this->mcoModel->get_ExternalMilkCollection();
          // $totMilk = intval($internalMilk) + intval($externalMilk);
          $supOrderCount = $this->mcoModel->get_supOrderCount();

          $data = [
            'orderView' => $todayOrderView,
            'lastDate' => strval($lastDate),
            'lastPrice' => strval($lastPrice),

            'internalMilk' => $internalMilk,
            'externalMilk' => $externalMilk,
            // 'totMilk' => $totMilk,
            'supOrderCount' => $supOrderCount

          ];
          $this->view('milk_collection_officer/mco_home',$data);
        }
        
        //set milk purchasing unit price
        public function setUnitPrice($error = null)
        {
          // if(isset($error)){
          //   die(var_dump($error));

          // }


          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            //sanitize the data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //input data
            $data = [
              'price' => trim($_POST['price'])
            ];

            if($this->mcoModel->setPrice($data))
            {
              redirect('Milk_Collection_Officer/mcoHome');
            }
            else
            {
              flash('Purchase_price','Today Purchasing Price is Already Set!');
              redirect('Milk_Collection_Officer/mcoHome');
            }

            // if(!$this->mcoModel->setPrice($data)){
            //   $_SESSION['popup_error'] = "Today Purchasing Price is Already Set!";
            // }
            // redirect('Milk_Collection_Officer/mcoHome');


          }
          else
          {
            //initial form
            $data = [
              'price' => ''
            ];
            //load the addCollection form
            $this->view('milk_collection_officer/mco_home',$data);
          }
        }

        //get the details of total milk collection
        public function viewMilkCollection()
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $from = isset($_POST['from']) ? $_POST['from'] : '';
            $to = isset($_POST['to']) ? $_POST['to'] : '';

            $milkView= $this->mcoModel->farmMilkCollection_duration($from, $to);  

            $data = [
                'milkView' => $milkView,
                'from' => $from,
                'to' => $to
            ];
  
            $this->view('milk_collection_officer/view_milk_collection',$data);
          }
          else
          {
            $milkView= $this->mcoModel->get_farmMilkCollectionView();   //data for table

            $data = [
                'milkView' => $milkView,
                'from' => '',
                'to' => ''
            ];
  
            $this->view('milk_collection_officer/view_milk_collection',$data);
          }  

        }

        //get the details of milk collection one by one
        public function collectionDetails($mcId)
        {
          // $milkView= $this->mcoModel->get_farmMilkCollectionView();
          $farmCollectionView= $this->mcoModel->get_farmCollectionDetails($mcId); 
          $data = [
              'farmCollectionView' => $farmCollectionView

          ];

          $this->view('milk_collection_officer/openViews',$data);
        }

        // Supplier order collected
        public function updateCollected($supplyOrderId)
        {
          if($this->mcoModel->updateCollected($supplyOrderId)) {
            flash('update_status_success', 'Status updated successfully');
            redirect('Milk_Collection_Officer/viewSupplyOrders');
          }
          else {
            die('Something went wrong');
          }
          
        }

        // Supplier order rejected
        public function updateRejected($supplyOrderId)
        {
          if($this->mcoModel->updateRejected($supplyOrderId)) {
            flash('update_status_success', 'Status updated successfully');
            redirect('Milk_Collection_Officer/viewSupplyOrders');
          }
          else {
            die('Something went wrong');
          }
        }

        //get the details of Suppliers
        public function viewSuppliers()
        {
          $supView= $this->mcoModel->get_supView();

          $data = [
              'supView' => $supView
          ];

          $this->view('milk_collection_officer/view_suppliers',$data);
        }

        //get the details of supply orders
        public function viewSupplyOrders()
        {
          $ordView= $this->mcoModel->get_supOrderView();
          // var_dump($ordView);

          $data = [
              'ordView' => $ordView
          ];

          $this->view('milk_collection_officer/view_supplyOrders',$data);
        }

        //get the details of supply milk collection
        public function viewSupplyMilkCollection()
        {
          $supplyMilkView= $this->mcoModel->get_supplyMilkView();

          $data = [
              'supplyMilkView' => $supplyMilkView
          ];

          $this->view('milk_collection_officer/view_supplyMilk',$data);
        }

      //get the details of supply orders one by one
        public function viewSupOrderDetails($ordID){
          $ordDetails= $this->mcoModel->get_orderDetails($ordID);

          $data = [
              'ordDetails' => $ordDetails
          ];

          $this->view('milk_collection_officer/collection_details',$data);
        }

        
        


        
    }

?>
