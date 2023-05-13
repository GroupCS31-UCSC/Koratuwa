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
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          
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

        public function viewExpense() 
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $from = isset($_POST['from']) ? $_POST['from'] : '';
            $to = isset($_POST['to']) ? $_POST['to'] : '';

            $expenseView= $this->financialManagerModel->Expense_duration($from, $to);
            // $expenseChart= $this->financialManagerModel->viewExpenseChart();
    
            $data = [
              'expenseView' => $expenseView,
              // 'expenseChart' => $expenseChart,
              'from' => $from,
              'to' => $to
            ];
      
            $this->view('financial_Manager/viewExpense',$data);
          }
          else
          {
            $expenseView= $this->financialManagerModel->viewExpense();
            // $expenseChart= $this->financialManagerModel->viewExpenseChart();
    
            $data = [
              'expenseView' => $expenseView,
              // 'expenseChart' => $expenseChart,
              'from' => '',
              'to' => ''
            ];
      
            $this->view('financial_Manager/viewExpense',$data);
          }

        }

        public function viewRevenue() 
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $from = isset($_POST['from']) ? $_POST['from'] : '';
            $to = isset($_POST['to']) ? $_POST['to'] : '';

            $revenueView= $this->financialManagerModel->Revenue_duration($from, $to);
    
            $data = [
              'revenueView' => $revenueView,
              'from' => $from,
              'to' => $to
            ];
      
            $this->view('financial_Manager/viewRevenue',$data);

          }
          else
          {
            $revenueView= $this->financialManagerModel->viewRevenue();
    
            $data = [
              'revenueView' => $revenueView,
              'from' => '',
              'to' => ''
            ];
      
            $this->view('financial_Manager/viewRevenue',$data);
          }  

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
          $pdf->SetLeftMargin( 30);

          $pdf->Cell(0, 10, 'Financial Report from '.$from, 0, 1, 'C');
          $pdf->Cell(0, 10, 'to '.$to, 0, 1, 'C');
          $pdf->Ln();
        
          $pdfWidth = $pdf->GetPageWidth();
          $pdfHeight = $pdf->GetPageHeight();

        //  $pdf->Rect(5, 5, $pdfWidth-8, $pdfHeight-10, 'D');    

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
        $totalexpenses=0;
        
        $pdf->SetFont('Arial', '', 12);
        foreach ($exreportsView as $row) {
        
          
            $pdf->Cell(60,10,$row->expense_id, 0 , 0, 'C');
            $pdf->Cell(60,10,$row->date, 0 , 0, 'C');
            $pdf->Cell(70,10,$row->description, 0 , 0, 'C');
            $pdf->Cell(30,10,$row->amount, 0, 0, 'C');
            // $pdf->Cell(30,10,$row->	quality, 1 , 0, 'C');
            $totalexpenses=  $totalexpenses+$row->amount;
           
            
            $pdf->Ln();



        }

        $pdf->Ln();
        //draw aline 
        $pdf->SetDrawColor(0,0,0); // Set the color of the line to black
        $pdf->SetLineWidth(0.5); // Set the width of the line to 0.5 mm
        $pdf->Line($pdf->GetX(), $pdf->GetY(), $pdf->GetX() + 220, $pdf->GetY());
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(350, 10, 'Total Expenses = Rs.  '.$totalexpenses, 0, 1, 'C');
       //draw two lines
        $pdf->SetDrawColor(0,0,0); // Set the color of the line to black
        $pdf->SetLineWidth(0.5); // Set the width of the line to 0.5 mm
        $pdf->Line($pdf->GetX(), $pdf->GetY(), $pdf->GetX() + 220, $pdf->GetY()); // Draw the first line
        $pdf->Line($pdf->GetX(), $pdf->GetY() + 0.8, $pdf->GetX() + 220, $pdf->GetY() + 0.8); // Draw the second line, slightly above the first
        
        $pdf->Ln();
        $pdf->SetFont('Arial', 'B', 14);
        //  $pdf->SetTitle('Reveneues Report');
        
        $pdf->SetTextColor(255, 255, 255);

        $pdf->Cell(60, 10, 'Sale/Order Id', 0 , 0, 'C',1);
        $pdf->Cell(60, 10, 'Date', 0 , 0, 'C',1);
        $pdf->Cell(70, 10, 'Source of Revenue', 0 , 0, 'C',1);
        $pdf->Cell(30, 10, 'Amount', 0 , 0, 'C',1);
        
        // $pdf->Cell(30, 10, 'Quality', 1 , 0, 'C',1);
        $pdf->Ln();
        $pdf->SetTextColor(0, 0, 0);
        $totalrevenues=0;
        $pdf->SetFont('Arial', '', 12);
        foreach ($rereportsView as $row) {
        
          
            $pdf->Cell(60,10,$row->saleOrder_id, 0 , 0, 'C');
            $pdf->Cell(60,10,$row->revenue_date, 0 , 0, 'C');
            $pdf->Cell(70,10,$row->source, 0 , 0, 'C');
            $pdf->Cell(30,10,$row->amount, 0 , 0, 'C');
            // $pdf->Cell(30,10,$row->	quality, 1 , 0, 'C');
            $totalrevenues=  $totalrevenues+$row->amount;
            
           
            
            $pdf->Ln();



        }

        $pdf->Ln();
        //draw a line
        $pdf->SetDrawColor(0,0,0); // Set the color of the line to black
        $pdf->SetLineWidth(0.5); // Set the width of the line to 0.5 mm
        $pdf->Line($pdf->GetX(), $pdf->GetY(), $pdf->GetX() + 220, $pdf->GetY());
        $pdf->SetFont('Arial', 'B', 16);
        
        $pdf->Cell(350, 10, 'Total Revenues = Rs.  '.$totalrevenues, 0, 1, 'C');
        
        //draw two lines
        $pdf->SetDrawColor(0,0,0); // Set the color of the line to black
        $pdf->SetLineWidth(0.5); // Set the width of the line to 0.5 mm
        $pdf->Line($pdf->GetX(), $pdf->GetY(), $pdf->GetX() + 220, $pdf->GetY()); // Draw the first line
        $pdf->Line($pdf->GetX(), $pdf->GetY() + 0.8, $pdf->GetX() + 220, $pdf->GetY() + 0.8); // Draw the second line, slightly above the first
       

        $pdf->Ln();
        $gap=abs($totalrevenues-$totalexpenses);
        // $pdf->Cell(0, 10, 'Gap =  '.$gap, 0, 1, 'C');

        if($totalrevenues > $totalexpenses){
          $pdf->Cell(200, 10, 'There has been a profit of Rs. '.$gap,  0, 1, 'C');
        }

        else{
          $pdf->Cell(200, 10, 'There has been a loss of Rs. '.$gap, 0, 1, 'C');
        }
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        
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





    }

?>
