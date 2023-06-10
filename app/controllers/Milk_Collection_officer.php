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
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $from = isset($_POST['from']) ? $_POST['from'] : '';
            $to = isset($_POST['to']) ? $_POST['to'] : '';

            $ordView_duration= $this->mcoModel->supOrder_duration($from, $to);
  
            $data = [
                'ordView' => $ordView_duration,
                'from' => $from,
                'to' => $to
            ];
  
            $this->view('milk_collection_officer/view_supplyOrders',$data);
          }
          else
          {
            $ordView= $this->mcoModel->get_supOrderView();
  
            $data = [
                'ordView' => $ordView,
                'from' => '',
                'to' => ''
            ];
  
            $this->view('milk_collection_officer/view_supplyOrders',$data);
          }

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

          // $data = [
          //     'ordDetails' => $ordDetails
          // ];

          // $this->view('milk_collection_officer/view_supplyOrders',$data);
          $pdf = generatePdf();
      
          $pdf->AddPage('P','A4');
        
          // Set invoice title and header
          $pdf->SetFont('Arial', 'B', 28);
          $pdf->Cell(0, 10, 'Invoice', 0, 1, 'C');
          $pdf->SetFont('Arial', '', 12);
          $pdf->Cell(0, 10, 'Invoice Number: INV-' . $ordID, 0, 1, 'R');
          $pdf->Ln(10);
        
        // Include order details
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, 'Order Details', 0, 1);
        
        foreach ($ordDetails as $row) {
          $pdf->SetFont('Arial', '', 12);
          // $pdf->Cell(50, 10, 'Product:');
          // $pdf->Cell(0, 10, 'Fuel', 0, 1);
      
          $pdf->Cell(50, 10, 'Supply OrderID:');
          $pdf->Cell(0, 10, $row->supply_order_id , 0, 1);
      
          $pdf->Cell(50, 10, 'Quantity:');
          $pdf->Cell(0, 10, 'Rs. ' . $row->	quantity, 0, 1);
      
          $pdf->Cell(50, 10, 'Unit Price:');
          $pdf->Cell(0, 10, 'Rs. ' . $row->unit_price, 0, 1);
      
          $pdf->Cell(50, 10, 'Total Amount:');
          $pdf->Cell(0, 10, 'Rs. ' . $row->total_payment, 0, 1);
          $pdf->SetLineWidth(0.5); // set line width to 0.5
          $pdf->Line(20, $pdf->GetY(), 190, $pdf->GetY()); // draw a line below the Cell()

          $pdf->Ln(5);
        }        

        $pdf->Ln(50);
        $pdf->SetFont('Arial', 'B', 20); // set font size to 20
        $pdf->SetDrawColor(255, 0, 0); // set border color to black
        $pdf->SetLineWidth(1); // set border width to 1
        $pdf->Cell(0, 30, 'PAID !', 1, 1, 'C'); // add border and center-align
        
        // Set border around the page
        $pdf->SetDrawColor(0, 0, 0); 
        $pdf->Rect(5, 5, $pdf->getPageWidth() - 10, $pdf->getPageHeight() - 10);
        // Set output filename and type
        $pdf->Output('Invoice-' . $ordID . '.pdf', 'I'); 
        
        $data = [
          'ordDetails' => $ordDetails
        ];

        $this->view('milk_collection_officer/view_supplyOrders',$data);        
        }


        


        
    }

?>
