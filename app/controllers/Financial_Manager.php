<?php

    class Financial_Manager extends Controller
    {
      public $financialManagerModel;

        public function __construct()
        {
          $this->financialManagerModel = $this->model('Financial_Manager_Model');

          if(!$_SESSION['user_email']){
            redirect('Users/login');
          }          
        }


        #fmHome

        public function fmHome() {
          $data = [];
          $this->view('financial_manager/fm_home',$data);
        }

        public function addExpense()
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
           
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];

            if ($error == 0) {

              $fileType = pathinfo($file_name, PATHINFO_EXTENSION);
              $fileType_lc = strtolower($fileType);
      
              $allowedFileTypes = array("jpg", "jpeg", "png");
      
              if (in_array($fileType, $allowedFileTypes)) {
      
                  $new_img_name = uniqid("IMG-", true) . '.' . $fileType_lc;
                  $img_upload_path = APPROOT . '/../public/img/uploads/' . $new_img_name;
                  move_uploaded_file($tmp_name, $img_upload_path);                  
              }
          } 

            $data=[
              'eId'=>'',
              'dat'=>trim($_POST['dat']),
              'des'=>trim($_POST['des']),
              'ven'=>trim($_POST['ven']),
              'amo'=>trim($_POST['amo']),
              'image'=> $new_img_name,
              
              'dat_err'=>'',
              'des_err'=>'',
              'ven_err'=>'',
              'amo_err'=>'',
              'image_err'=>''
              
            ];

            //validation
            if (empty($data['dat']))        { $data['dat_err'] = '*' ;  }
            if (empty($data['des']))        { $data['des_err'] = '*' ; }
            if (empty($data['ven']))        { $data['ven_err'] = '*' ; }
            if (empty($data['amo']))        { $data['amo_err'] = '*' ; }
            if (empty($data['image']))       { $data['image_err'] = '*' ; }
            

            

            //if no errors
            if(empty($data['dat_err']) && empty($data['des_err']) && empty($data['ven_err']) && empty($data['amo_err']) && empty($data['image_err']) )
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
              'ven'=>'',
              'amo'=>'',
              'image'=>'',
              

              'dat_err'=>'',
              'des_err'=>'',
              'ven_err'=>'',
              'amo_err'=>'',
              'image_err'=>''
              
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

        public function updateExpense($eId)
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
           

            $data=[
              'eId'=>'$eId',
              'dat'=>trim($_POST['dat']),
              'des'=>trim($_POST['des']),
              'ven'=>trim($_POST['ven']),
              'amo'=>trim($_POST['amo']),
              
              'dat_err'=>'',
              'des_err'=>'',
              'ven_err'=>'',
              'amo_err'=>'',
              
            ];

            //validation
            if (empty($data['dat']))        { $data['dat_err'] = '*' ;  }
            if (empty($data['des']))        { $data['des_err'] = '*' ; }
            if (empty($data['ven']))        { $data['ven_err'] = '*' ; }
            if (empty($data['amo']))        { $data['amo_err'] = '*' ; }
            

            

            //if no errors
            if(empty($data['dat_err']) && empty($data['des_err']) && empty($data['ven_err']) && empty($data['amo_err']) )
            {
              $data['eId']= $this->financialManagerModel->findExpenseId();

              if($this->financialManagerModel->updateExpense($data))
              {
                flash('addCategory_flash','Expense record is successfully updated!');
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
              $this->view('financial_manager/updateExpense',$data);
            }
          }
          else
          {
            //initial form loading
            $data=[
              'eId'=>'',
              'dat'=>'',
              'des'=>'',
              'ven'=>'',
              'amo'=>'',
              

              'dat_err'=>'',
              'des_err'=>'',
              'ven_err'=>'',
              'amo_err'=>'',
              
            ];
            $this->view('financial_manager/updateExpense', $data);

          }
        }

        
    }

?>
