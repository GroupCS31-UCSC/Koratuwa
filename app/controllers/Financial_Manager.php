<?php
function alert($msg) {
  echo "<script type='text/javascript'>alert('$msg');</script>";
}
    class Financial_Manager extends Controller
    {
      public $financialManagerModel;

        public function __construct()
        {
          $this->financialManagerModel = $this->model('Financial_Manager_Model');

          if(!$_SESSION['user_email']){
            redirect('Users/login');
          }    
          elseif($_SESSION['user_type']!='Financial Manager'){
            redirect('Users/login');
          }      
        }


        #fmHome

        public function fmHome() {
          $data = [];
          $this->view('financial_manager/fm_home',$data);
        }

        // public function revenues() {
        //   $data = [];
        //   $this->view('financial_manager/revenues',$data);
        // }

        public function reports() {
          
          // $from = isset($_GET['from']) ? $_GET['from'] : date('Y-m-d');
          // $to = isset($_GET['to']) ? $_GET['to'] : date('Y-m-d');

          $_SESSION['from'] = isset($_GET['from']) ? $_GET['from'] : date('Y-m-d');
          $_SESSION['to'] = isset($_GET['to']) ? $_GET['to'] : date('Y-m-d');

          $from = $_SESSION['from'];
          $to = $_SESSION['to'];

          $exreportsView= $this->financialManagerModel->viewExpenseReports($from, $to);
          $rereportsView= $this->financialManagerModel->viewRevenueReports($from, $to);

          $data = [
            'exreportsView' => $exreportsView,
            'rereportsView' => $rereportsView,
            'from' => $from,
            'to' => $to,
          ];

          $this->view('financial_manager/reports',$data);
          
          
        }

        
        public function addExpense()
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
        
        {
         
            $data=[
              'eId'=>'',
              'dat'=>trim($_POST['dat']),
              'des'=>trim($_POST['des']),
    
              'amo'=>trim($_POST['amo']),
             
              
              'dat_err'=>'',
              'des_err'=>'',
             
              'amo_err'=>'',
              'image_err'=>''
              
            ];

            //validation
            if (empty($data['dat']))        { $data['dat_err'] = '*' ;  }
            if (empty($data['des']))        { $data['des_err'] = '*' ; }
          
            if (empty($data['amo']))        { $data['amo_err'] = '*' ; }
          
            

            

            //if no errors
            if(empty($data['dat_err']) && empty($data['des_err'])  && empty($data['amo_err'])  )
            {
              $data['eId']= $this->financialManagerModel->findExpenseId();

              if($this->financialManagerModel->addExpense($data))
              {
                flash('addCategory_flash','New Expense record is successfully added!');
                redirect('Financial_Manager/viewExpense');
              }
              else
              {
                die('Something went wrong!');
              }
            }
            else
            {
              //loading the form with the errors
              $this->view('financial_manager/addExpense',$data);
            }
          }
          else
          {
            //initial form loading
            $data=[
              'eId'=>'',
              'dat'=>'',
              'des'=>'',
           
              'amo'=>'',
            
              

              'dat_err'=>'',
              'des_err'=>'',
      
              'amo_err'=>'',
           
              
            ];
            $this->view('financial_manager/addExpense', $data);

          }
        }

        public function viewExpense() {
          $expenseView= $this->financialManagerModel->viewExpense();
    
          $data = [
            'expenseView' => $expenseView
          ];
    
          $this->view('financial_Manager/viewExpense',$data);
        }

        public function viewRevenue() {
          $revenueView= $this->financialManagerModel->viewRevenue();
    
          $data = [
            'revenueView' => $revenueView
          ];
    
          $this->view('financial_Manager/viewRevenue',$data);
        }

        public function generateFinanceReport(){
          // $supOrderView= $this->supplierModel->get_supOrderView();
          // $from = isset($_GET['from']) ? $_GET['from'] : date('Y-m-d');
          // $to = isset($_GET['to']) ? $_GET['to'] : date('Y-m-d');

          $from = $_SESSION['from'];
          $to = $_SESSION['to'];
          
          // $expenseView= $this->financialManagerModel->viewExpense();
          $exreportsView= $this->financialManagerModel->viewExpenseReports($from, $to);
          $rereportsView= $this->financialManagerModel->viewRevenueReports($from, $to);
          // var_dump($exreportsView); die();
          $pdf = generatePdf();

          $pdf->AddPage('L','A4');
        
          $pdf->SetFont('Arial', 'B', 18);
          $pdf->Cell(0, 10, 'Expenses and Revenues Report ', 0, 1, 'C');
          $pdf->Ln();
        
          $pdfWidth = $pdf->GetPageWidth();
          $pdfHeight = $pdf->GetPageHeight();

         $pdf->Rect(5, 5, $pdfWidth-8, $pdfHeight-10, 'D');    

        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetTitle('Finance Report');
        $pdf->SetTextColor(255, 255, 255);
       


        $pdf->Cell(60, 10, 'Expense Id', 1 , 0, 'C',1);
        $pdf->Cell(60, 10, 'Date', 1 , 0, 'C',1);
        $pdf->Cell(70, 10, 'Description', 1 , 0, 'C',1);
        $pdf->Cell(30, 10, 'Amount', 1 , 0, 'C',1);
        // $pdf->Cell(30, 10, 'Quality', 1 , 0, 'C',1);
        $pdf->Ln();

        
        
        $pdf->SetTextColor(0, 0, 0);
        
        $pdf->SetFont('Arial', '', 12);
        foreach ($exreportsView as $row) {
        
          
            $pdf->Cell(60,10,$row->expense_id, 1 , 0, 'C');
            $pdf->Cell(60,10,$row->date, 1 , 0, 'C');
            $pdf->Cell(70,10,$row->description, 1 , 0, 'C');
            $pdf->Cell(30,10,$row->amount, 1 , 0, 'C');
            // $pdf->Cell(30,10,$row->	quality, 1 , 0, 'C');
            
           
            
            $pdf->Ln();



        }
        $pdf->Ln();
        $pdf->SetFont('Arial', 'B', 14);
        //  $pdf->SetTitle('Reveneues Report');
        $pdf->SetTextColor(255, 255, 255);

        $pdf->Cell(60, 10, 'Revenue Id', 1 , 0, 'C',1);
        $pdf->Cell(60, 10, 'Date', 1 , 0, 'C',1);
        $pdf->Cell(70, 10, 'Source of Revenue', 1 , 0, 'C',1);
        $pdf->Cell(30, 10, 'Amount', 1 , 0, 'C',1);
        // $pdf->Cell(30, 10, 'Quality', 1 , 0, 'C',1);
        $pdf->Ln();
        $pdf->SetTextColor(0, 0, 0);
        
        $pdf->SetFont('Arial', '', 12);
        foreach ($rereportsView as $row) {
        
          
            $pdf->Cell(60,10,$row->revenue_id, 1 , 0, 'C');
            $pdf->Cell(60,10,$row->date, 1 , 0, 'C');
            $pdf->Cell(70,10,$row->source, 1 , 0, 'C');
            $pdf->Cell(30,10,$row->amount, 1 , 0, 'C');
            // $pdf->Cell(30,10,$row->	quality, 1 , 0, 'C');
            
           
            
            $pdf->Ln();



        }
        
        $pdf->AliasNbPages();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Page ' . $pdf->PageNo() . ' of {nb}', 0, 0, 'C');
        
  
        // $pdf->Output();
         $pdf->Output('Finance Report.pdf', 'I');
           
            $data=[
            'exreportsView' =>  $exreportsView,
            'rereportsView' =>  $rereportsView,
            'from' => $from,
            'to' => $to,
            ];
        
            $this->view('financial_manager/reports',$data);
        }

        // public function updateExpense($eId)
        // {
        //   if($_SERVER['REQUEST_METHOD'] == 'POST')
        //   {
        //     $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
           

        //     $data=[
        //       'eId'=>'$eId',
        //       'dat'=>trim($_POST['dat']),
        //       'des'=>trim($_POST['des']),
        //       'ven'=>trim($_POST['ven']),
        //       'amo'=>trim($_POST['amo']),
              
        //       'dat_err'=>'',
        //       'des_err'=>'',
        //       'ven_err'=>'',
        //       'amo_err'=>'',
              
        //     ];

        //     //validation
        //     if (empty($data['dat']))        { $data['dat_err'] = '*' ;  }
        //     if (empty($data['des']))        { $data['des_err'] = '*' ; }
        //     if (empty($data['ven']))        { $data['ven_err'] = '*' ; }
        //     if (empty($data['amo']))        { $data['amo_err'] = '*' ; }
            

            

        //     //if no errors
        //     if(empty($data['dat_err']) && empty($data['des_err']) && empty($data['ven_err']) && empty($data['amo_err']) )
        //     {
        //       $data['eId']= $this->financialManagerModel->findExpenseId();

        //       if($this->financialManagerModel->updateExpense($data))
        //       {
        //         flash('addCategory_flash','Expense record is successfully updated!');
        //         redirect('Financial_Manager/viewExpense');
        //       }
        //       else
        //       {
        //         die('Something went wrong!');
        //       }
        //     }
        //     else
        //     {
        //       //loading the form with the errors
        //       $this->view('financial_manager/updateExpense',$data);
        //     }
        //   }
        //   else
        //   {
        //     //initial form loading
        //     $data=[
        //       'eId'=>'',
        //       'dat'=>'',
        //       'des'=>'',
        //       'ven'=>'',
        //       'amo'=>'',
              

        //       'dat_err'=>'',
        //       'des_err'=>'',
        //       'ven_err'=>'',
        //       'amo_err'=>'',
              
        //     ];
        //     $this->view('financial_manager/updateExpense', $data);

        //   }
        // }

        // public function generateFinanceReport(){
        //   // $supOrderView= $this->supplierModel->get_supOrderView();
        //   // $from = isset($_GET['from']) ? $_GET['from'] : date('Y-m-d');
        //   // $to = isset($_GET['to']) ? $_GET['to'] : date('Y-m-d');

        //   $from = $_SESSION['from'];
        //   $to = $_SESSION['to'];
          
        //   // $expenseView= $this->financialManagerModel->viewExpense();
        //   $exreportsView= $this->financialManagerModel->viewExpenseReports($from, $to);
        //   // $rereportsView= $this->financialManagerModel->viewRevenueReports($from, $to);
        //   // var_dump($exreportsView); die();
        //   $pdf = generatePdf();

        //   $pdf->AddPage('L','A4');
        
        //   $pdf->SetFont('Arial', 'B', 18);
        //   $pdf->Cell(0, 10, 'Finance Report', 0, 1, 'C');
        
        //   $pdfWidth = $pdf->GetPageWidth();
        //   $pdfHeight = $pdf->GetPageHeight();

        //  $pdf->Rect(5, 5, $pdfWidth-8, $pdfHeight-10, 'D');    

        // $pdf->SetFont('Arial', 'B', 14);
        // $pdf->SetTitle('Finance Report');
        // $pdf->SetTextColor(255, 255, 255);
       


        // $pdf->Cell(60, 10, 'Expense Id', 1 , 0, 'C',1);
        // $pdf->Cell(60, 10, 'Date', 1 , 0, 'C',1);
        // $pdf->Cell(70, 10, 'Description', 1 , 0, 'C',1);
        // $pdf->Cell(30, 10, 'Amount', 1 , 0, 'C',1);
        // // $pdf->Cell(30, 10, 'Quality', 1 , 0, 'C',1);
        // $pdf->Ln();
        
        // $pdf->SetTextColor(0, 0, 0);
        
        // $pdf->SetFont('Arial', '', 12);
        // foreach ($exreportsView as $row) {
        
          
        //     $pdf->Cell(60,10,$row->expense_id, 1 , 0, 'C');
        //     $pdf->Cell(60,10,$row->date, 1 , 0, 'C');
        //     $pdf->Cell(70,10,$row->description, 1 , 0, 'C');
        //     $pdf->Cell(30,10,$row->amount, 1 , 0, 'C');
        //     // $pdf->Cell(30,10,$row->	quality, 1 , 0, 'C');
            
           
            
        //     $pdf->Ln();



        // }

       
        
        // $pdf->AliasNbPages();
        // $pdf->SetFont('Arial', 'B', 12);
        // $pdf->Cell(0, 10, 'Page ' . $pdf->PageNo() . ' of {nb}', 0, 0, 'C');
        
  
        // // $pdf->Output();
        //  $pdf->Output('Finance Report.pdf', 'I');
           
        //     $data=[
        //     'exreportsView' =>  $exreportsView,
        //     'from' => $from,
        //     'to' => $to,
        //     ];
        
        //     $this->view('financial_manager/reports',$data);
        // }




    }

?>
