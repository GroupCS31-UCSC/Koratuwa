<?php

    class Supplier extends Controller
    {
      public $supplierModel;

        public function __construct()
        {
          $this->supplierModel = $this->model('Supplier_Model');

          if(!$_SESSION['user_email']){
            redirect('Users/login');
          }   
          elseif($_SESSION['user_type']!='Supplier'){
            redirect('Users/login');
          }       
        }

        // public function supplierHome()
        // {
        //   $data = [];
        //   $this->view('supplier/sup_home',$data);
        // }

        // public function placeSupply()
        // {
        //   if($_SERVER['REQUEST_METHOD'] == 'POST')
        //   {
        //     $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //     $data = [
        //       'supOrderId' => '',
        //       'quantity' => trim($_POST['quantity']),
        //       'date' => trim($_POST['date']),
        //       'address' => trim($_POST['address']),
        //       'status' => 'Not Collected',    //initial set value;later can be change
        //       'price' => '100',   //temp set value

        //       'quantity_err' => '',
        //       'date_err' => '',
        //       'address_err' => ''
        //     ];

        //     //validation
        //     if (empty($data['quantity'])){
        //       $data['quantity_err'] = '*' ;
        //     }
        //     elseif ($data['quantity'] <10) {
        //       $data['quantity_err'] = 'Required minimum 10L to place an Order' ;
        //     }

        //     if (empty($data['date'])){
        //       $data['date_err'] = '*' ;
        //     }
        //     elseif (strtotime($data['date']) < strtotime(date('y-m-d')))  {
        //       $data['date_err'] = 'Invalid date' ;
        //     }

        //     if (empty($data['address']))  { $data['address_err'] = '*' ; }

        //     //if no errors
        //     if(empty($data['quantity_err']) && empty($data['date_err']) && empty($data['address_err']) )
        //     {
        //       $data['supOrderId']=$this->supplierModel->findSupOrderId();

        //       if($this->supplierModel->placeSupply($data))
        //       {
        //         flash('placeSupply_flash','Supply Order is successfully placed!');
        //         redirect('Supplier/viewSupply');
        //       }
        //       else
        //       {
        //         die('Something went wrong!');
        //       }
        //     }
        //     else
        //     {
        //       //loading the form with the errors
        //       $this->view('supplier/placeSupply',$data);
        //     }
        //   }
        //   else
        //   {
        //     //initial form loading
        //     $data = [
        //       'supOrderId' => '',
        //       'quantity' => '',
        //       'date' => '',
        //       'address' => '',
        //       'status' => '',
        //       'price' => '',  //temp set value

        //       'quantity_err' => '',
        //       'date_err' => '',
        //       'address_err' => ''
        //     ];
        //     $this->view('supplier/placeSupply',$data);
        //   }
        // }
        public function supplierHome()
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $purchasing_price=$this->supplierModel->find_purchasingPrice();
            $supOrdSum= $this->supplierModel->get_supOrderSum();
            $ordSum= strval($supOrdSum);

            $data = [
              'supply_order_id' => '',
              'quantity' => trim($_POST['quantity']),
              'purchasing_price' => $purchasing_price,
              'date' => '',
              'time' => '',
              'supplying_address' => 'dfr,gbh,lkjabc',
              'status' => 'Not Collected',   //initial set value;later can be change
              'density' => '',
              'quality' => 'N/A',
              'unit_price' => '100',   //temp set value
              'total_payment' =>'',
              'supplier_id ' =>'',
              'invoice_id' =>'',
              'ordSum'=> $ordSum,
              

              'quantity_err' => '',
              'date_err' => '',
              'address_err' => '',
              'time_err' => ''
            ];


            //validation
            if (empty($data['quantity'])){
              $data['quantity_err'] = '*' ;
            }
            elseif ($data['quantity'] <10) {
              $data['quantity_err'] = 'Required minimum 10L to place an Order' ;
            }

            //validate time
            // if(strtotime(time()) <= strtotime("08:00:00")){
            //   $data['time_err'] = 'You have to place orders before 8.00 am' ;
            // }
            
            date_default_timezone_set('Asia/Colombo');
            $current_time = date("H:i:s");
            // echo $current_time;

            $time1 = new DateTime($current_time);
            $time2 = new DateTime('08:00:00');

            if ($time1 > $time2) {
              $data['time_err'] = 'You have to place orders before 8.00 am';
            } else {
              $data['time_err'] = '';
            }

            // if ( $current_time <=  08:00:00){
              // $timestamp = time();
              // $formatted_time = gmdate("H:i:s", $timestamp);
              // echo $formatted_time;
       
            // }
            
            



            //if no errors
            if(empty($data['quantity_err']))
            {
              $data['supOrderId']=$this->supplierModel->findSupOrderId();
              $data['invoice_id'] = $this->supplierModel->generateInvoiceId();

              if($this->supplierModel->placeSupply($data))
              {
                flash('placeSupply_flash','Supply Order is successfully placed!');
                redirect('Supplier/viewSupply');
              }
              else
              {
                die('Something went wrong!');
              }
            }
            else
            {
              //loading the form with the errors
              $this->view('supplier/sup_home',$data);
            }
          }
          else
          {
            //get today milk purchasing price
            $purchasing_price=$this->supplierModel->find_purchasingPrice();
            $supOrdSum= $this->supplierModel->get_supOrderSum();
            $ordSum= strval($supOrdSum);

            //initial form loading
            $data = [
              'supOrderId' => '',
              'quantity' => '',
              'purchasing_price' => $purchasing_price,
              'ordSum'=> $ordSum,

              'quantity_err' => '',
              'date_err' => '',
              'address_err' => '',
              'time_err' => ''
            ];
            $this->view('supplier/sup_home',$data);
          }
        }


        public function viewSupply()
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $from = isset($_POST['from']) ? $_POST['from'] : '';
            $to = isset($_POST['to']) ? $_POST['to'] : '';

            $supOrder_duration= $this->supplierModel->supOrder_duration($from, $to);
            $supOrdSum= $this->supplierModel->get_supOrderSum();
            $ordSum= strval($supOrdSum);
            $data = [
              'supOrderView' => $supOrder_duration,
              'ordSum'=> $ordSum,
              'from' => $from,
              'to' => $to
           ];
            $this->view('supplier/viewSupply',$data);
          }
          else{
            $supOrderView= $this->supplierModel->get_supOrderView();
            $supOrdSum= $this->supplierModel->get_supOrderSum();
            $ordSum= strval($supOrdSum);
  
            $data = [
                'supOrderView' => $supOrderView,
                'ordSum'=> $ordSum,
                'from' => '',
                'to' => ''
             ];
  
            $this->view('supplier/viewSupply',$data);
          }
          

        }

        // getOrderReceipt one by one as PDF
      //   public function getOrderReceipt($order_id){
      //     $supOrder_Receipt= $this->supplierModel->get_supOrderReceipt($order_id);
      //     // var_dump($supOrder_Receipt); die();
      //     $pdf = generatePdf();

      //     $pdf->AddPage('P','A4');
          
      //     $pdf->SetFont('Arial', 'B', 18);
      //     $pdf->Cell(0, 10, 'Koratuwa Supplier Order Details', 0, 1, 'C');
  
      //     $pdf->Ln(10);
      //     $pdf->Cell(0, 10, '', 0, 1, 'C');

      //     $pdfWidth = $pdf->GetPageWidth();
      //     $pdfHeight = $pdf->GetPageHeight();
      //     $pdf->Rect(5, 5, $pdfWidth-8, $pdfHeight-10, 'D'); 

      //     $pdf->SetFont('Arial', 'B', 14);
      //     $pdf->SetTitle('Koratuwa Supplier Payment Details Report');
      //     $pdf->SetTextColor(255, 255, 255);

      //     $pdf->Ln();
          
      //     $pdf->SetTextColor(0, 0, 0);
          
      //     $pdf->SetFont('Arial', '', 12);

      //   foreach ($supOrder_Receipt as $row) {
      //     // Add rectangle around content
      //     // $pdf->Rect(10, $pdf->GetY(), $pdfWidth-20, 40, 'D');          
      //     $pdf->SetFont('Arial', '', 12);
      //     $pdf->Cell(0, 10, 'Supply Order ID: ' . $row->supply_order_id, 0, 1);
      
      //     $pdf->SetFont('Arial', '', 12);
      //     $pdf->Cell(50, 10, 'Supply Quantity (L):');
      //     $pdf->Cell(0, 10, $row->quantity, 0, 1);
      
      //     $pdf->Cell(50, 10, 'Price Received Per Unit:');
      //     $pdf->Cell(0, 10, 'Rs. ' . $row->unit_price, 0, 1);

      //     $pdf->Cell(50, 10, 'Date:');
      //     $pdf->Cell(0, 10, $row->supply_date, 0, 1);

      //     $pdf->Cell(50, 10, 'Time:');
      //     $pdf->Cell(0, 10, $row->time, 0, 1);
      
      //     $pdf->Cell(50, 10, 'Status:');
      //     $pdf->Cell(0, 10, $row->status, 0, 1);
      
      //     $pdf->Cell(50, 10, 'Total Payment:');
      //     $pdf->Cell(0, 10, $row->total_payment, 0, 1);
      
      //     $pdf->Ln(5);
      // }
      

      //   $pdf->AliasNbPages();
      //   $pdf->SetFont('Arial', 'B', 12);
      //   $pdf->SetY(260);
      //   $pdf->Cell(0, 10, 'Page ' . $pdf->PageNo() . ' of {nb}', 0, 0, 'C');

      //   // $pdf->Output();
      //   $pdf->Output('Supplier Order Details.pdf', 'I');
           
      //   $data=[
      //   'supOrder_Receipt' =>  $supOrder_Receipt
      //   ];
    
      //   $this->view('supplier/viewSupply',$data);
      //   }
      public function getOrderReceipt($order_id){
        $supOrder_Receipt= $this->supplierModel->get_supOrderReceipt($order_id);
        // var_dump($supOrder_Receipt); die();
        $pdf = generatePdf();
      
        $pdf->AddPage('P','A4');
      
        // Set invoice title and header
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(0, 10, 'Invoice', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'Invoice Number: INV-' . $order_id, 0, 1, 'R');
        $pdf->Ln(10);
      
        // Include order details
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, 'Order Details', 0, 1);
      

      
        foreach ($supOrder_Receipt as $row) {
          $pdf->SetFont('Arial', '', 12);
          // $pdf->Cell(50, 10, 'Product:');
          // $pdf->Cell(0, 10, 'Fuel', 0, 1);
          $pdf->Cell(50, 10, 'Supply OrderID:');
          $pdf->Cell(0, 10, $row->supply_order_id , 0, 1);
      
          $pdf->Cell(50, 10, 'Quantity:');
          $pdf->Cell(0, 10, $row->quantity . ' L', 0, 1);
      
          $pdf->Cell(50, 10, 'Price per Unit:');
          $pdf->Cell(0, 10, 'Rs. ' . $row->unit_price, 0, 1);
      
          $pdf->Cell(50, 10, 'Total Payment:');
          $pdf->Cell(0, 10, 'Rs. ' . $row->total_payment, 0, 1);
          $pdf->SetLineWidth(0.5); // set line width to 0.5
          $pdf->Line(20, $pdf->GetY(), 190, $pdf->GetY()); // draw a line below the Cell()
      
          $pdf->Ln(5);
        }
      
        $pdf->Ln(50);
        $pdf->SetFont('Arial', 'B', 20); // set font size to 20
        $pdf->SetDrawColor(255, 0, 0); // set border color to black
        $pdf->SetLineWidth(1); // set border width to 1
        $pdf->Cell(0, 30, 'RECEIVED !', 1, 1, 'C'); // add border and center-align
        
        // Set border around the page
        $pdf->SetDrawColor(0, 0, 0); 
        $pdf->Rect(5, 5, $pdf->getPageWidth() - 10, $pdf->getPageHeight() - 10);
        // Set output filename and type
        $pdf->Output('Invoice-' . $order_id . '.pdf', 'I');
      
        // Render view with order details
        $data=[
          'supOrder_Receipt' =>  $supOrder_Receipt
        ];
        $this->view('supplier/viewSupply',$data);
      }
                     

        public function generateSupplyReport(){
          $supOrderView= $this->supplierModel->get_supOrderView();
          $pdf = generatePdf();

          $pdf->AddPage('L','A4');
        
          $pdf->SetFont('Arial', 'B', 18);
          $pdf->Cell(0, 10, 'Koratuwa Supplier Order Details', 0, 1, 'C');
        
          $pdfWidth = $pdf->GetPageWidth();
          $pdfHeight = $pdf->GetPageHeight();

         $pdf->Rect(5, 5, $pdfWidth-8, $pdfHeight-10, 'D');    

        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetTitle('Koratuwa Payment Details Report');
        $pdf->SetTextColor(255, 255, 255);
       


        $pdf->Cell(60, 10, 'Supplier Order Id', 1 , 0, 'C',1);
        $pdf->Cell(60, 10, 'Supply Quantity (L)', 1 , 0, 'C',1);
        $pdf->Cell(70, 10, 'Price Received Per Unit', 1 , 0, 'C',1);
        $pdf->Cell(30, 10, 'Status', 1 , 0, 'C',1);
        $pdf->Cell(30, 10, 'Quality', 1 , 0, 'C',1);
        $pdf->Ln();
        
        $pdf->SetTextColor(0, 0, 0);
        
        $pdf->SetFont('Arial', '', 12);
        foreach ($supOrderView as $row) {
        
          
            $pdf->Cell(60,10,$row->supply_order_id, 1 , 0, 'C');
            $pdf->Cell(60,10,$row->quantity, 1 , 0, 'C');
            $pdf->Cell(70,10,'Rs. '.$row->unit_price, 1 , 0, 'C');
            $pdf->Cell(30,10,$row->status, 1 , 0, 'C');
            $pdf->Cell(30,10,$row->	quality, 1 , 0, 'C');
            
           
            
            $pdf->Ln();



        }

       
        
        $pdf->AliasNbPages();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Page ' . $pdf->PageNo() . ' of {nb}', 0, 0, 'C');
        
  
        // $pdf->Output();
         $pdf->Output('Supplier Order Details.pdf', 'I');
           
            $data=[
            'supOrderView' =>  $supOrderView
            ];
        
            $this->view('supplier/viewSupply',$data);
        }



        public function updateSupOrder($supOrdId)
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
              'supOrderId' => $supOrdId,
              'quantity' => trim($_POST['quantity']),
              // 'date' => trim($_POST['date']),
              // 'address' => trim($_POST['address']),

              'quantity_err' => '',
              // 'date_err' => '',
              // 'address_err' => ''
            ];

            //validation
            if (empty($data['quantity'])){
              $data['quantity_err'] = '*' ;
            }
            elseif ($data['quantity'] <10) {
              $data['quantity_err'] = 'Required minimum 10L to place an Order' ;
            }

            if (empty($data['date'])){
              $data['date_err'] = '*' ;
            }
            elseif (strtotime($data['date']) < strtotime(date('y-m-d')))  {
              $data['date_err'] = 'Invalid date' ;
            }

            if (empty($data['address']))     { $data['address_err'] = '*' ; }

            //if no errors
            if(empty($data['quantity_err']) && empty($data['date_err']) && empty($data['address_err']) )
            {

              if($this->supplierModel->updateSupply($data))
              {
                flash('updateSupply_flash','Supply Order is successfully Updated!');
                redirect('Supplier/viewSupply');
              }
              else
              {
                die('Something went wrong!');
              }
            }
            else
            {
              //loading the form with the errors
              $this->view('supplier/updateSupply',$data);
            }
          }
          else
          {
            $supOrd = $this->supplierModel->getSupplyById($supOrdId);

            $data = [
              'supOrderId' => $supOrd->supply_order_id,
              'quantity' => $supOrd->quantity,
              // 'date' => $supOrd->supply_date,
              // 'address' => $supOrd->supplying_address,

              'quantity_err' => '',
              // 'date_err' => '',
              // 'address_err' => ''
            ];
            $this->view('supplier/updateSupply',$data);
          }
        }


        public function deleteSupOrder($supOrdId)
        {
          if($this->supplierModel->dltSupOrder($supOrdId))
          {
            flash('dltSupOrder_flash','Supply Order is successfully deleted');
            redirect('Supplier/viewSupply');
          }
          else
          {
            die('Something went wrong');
          }
        }

        // Load supplier income page
        public function sup_income()
        {
          $supID = $_SESSION['user_id'];
          $supIncome= $this->supplierModel->get_supIncome($supID);

          $data = [
              'supIncome' => $supIncome
           ];
          $this->view('supplier/sup_income',$data);
        }

        //Load Supplier feedback
        // public function sup_feedback()
        // {
        //   $data = [];
        //   $this->view('supplier/sup_feedback',$data);
        // }
//-----------------------------------------------------------------------
        public function sup_feedback()
        {
          
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
              'feedback_id' => '',
              'supplier_id' => '',
              // 'sup_name' => '',
              'date' => '',
              'time' => '',
              'feedback' => trim($_POST['feedback']),

              'feedback_err' => '',

            ];

            //validation
            if (empty($data['feedback'])){
              $data['feedback_err'] = '*' ;
            }

            //if no errors
            if(empty($data['feedback_err']))
            {
              $data['feedback_id'] = $this->supplierModel->generateFeedbackId();
              // $data['supplier_Id']=$this->supplierModel->findSupId();
              
              if($this->supplierModel->supFeedback($data))
              {
                
                redirect('Supplier/sup_feedback');
              }
              else
              {
                die('Something went wrong!');
              }

            }
            else
            {
              //loading the form with the errors
              $this->view('supplier/sup_feedback',$data);
            }
          }
          else
          {
            
            $supFeedback = $this->supplierModel->viewFeedback();

            //initial form loading
            $data = [
              'feedback_id' => '',
              'supplier_id' => '',
              // 'sup_name' => '',
              'date' => '',
              'time' => '',
              'feedback' => '',
              'supFeedback' => $supFeedback,

              'feedback_err' => '',

            ];
            $this->view('supplier/sup_feedback',$data);
          }
        }
        //----------Download PDF--------------/
        public function DownloadInv(){
          $data = [];




          $this->view('supplier/downloadInvoice', $data);
        }

        //---------view order invoice-----------/
        public function viewOrder($ordId){

          $orderView = $this->supplierModel->viewOrd($ordId);

          $data = [
            'supply_order_id ' =>'',
            'supply_date' =>'',
            'quantity' =>'',
          ];

          $this->view('supplier/viewSupply', $data);
        }

        //chart - sup income
        public function supIncomeChart(){
          $supID = $_SESSION['user_id'];
          echo $this->supplierModel->get_totIncome($supID);

        }
        //chart - milk purchasing price - home page
        public function milkPurchasing_chart(){
          echo $this->supplierModel->get_milkPurchasingPrice();
        }


    }

?>
