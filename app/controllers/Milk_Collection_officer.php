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
        }

        //redirect to the mco Home page
        public function mcoHome()
        {
          $recentOrderView= $this->mcoModel->get_RecentOrderView();
          $lastDate = $this->mcoModel->get_lastDate();
          $lastPrice = $this->mcoModel->get_lastPrice();

          $data = [
            'orderView' => $recentOrderView,
            'lastDate' => strval($lastDate),
            'lastPrice' => strval($lastPrice)

          ];
          $this->view('milk_collection_officer/mco_home',$data);
        }

        //get the details of total milk collection
        public function viewMilkCollection()
        {
          $milkView= $this->mcoModel->get_farmMilkCollectionView();   //data for table

          $data = [
              'milkView' => $milkView
          ];

          $this->view('milk_collection_officer/view_milk_collection',$data);
        }

        //get the details of milk collection one by one
        public function collectionDetails($mcId)
        {
          // $milkView= $this->mcoModel->get_farmMilkCollectionView();
          $collectionView= $this->mcoModel->get_collectionDetails($mcId); 
          $data = [
              'cView' => $collectionView,
               'mcId' => $mcId

          ];

          $this->view('milk_collection_officer/collection_details',$data);
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
        

        //get the details of supply milk collection
        public function setPriceDaily()
        {
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
              die('Today Purchasing Price is Already Set!');
            }

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


        
    }

?>
