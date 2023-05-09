<?php

    class Admin extends Controller
    {
      public $adminModel;
      
        public function __construct()
        {
          $this->adminModel = $this->model('Admin_Model');
          
          //check if the user logged in(user authentication)
          if(!$_SESSION['user_email']){
            redirect('Users/login');
          }
          //check if logged user has authorize to log this pages(user authorization)
          elseif($_SESSION['user_type']!='Admin'){
            redirect('Users/login');
          }
        }
        
        //redirect to the admin Home page
        public function adminHome()
        {
          $data=[];
          $this->view('admin/admin_home',$data);
        }
        
        //get the details of Employee for profile
        public function employeeProfile($empId)
        {
          $empProfileData= $this->adminModel->get_empProfileView($empId);

          $data = [
              'empProfileData' => $empProfileData
          ];

          $this->view('admin/openViews',$data);
        }

        //get the details of labour for profile
        public function labourProfile($LId)
        {
          $labProfileData= $this->adminModel->get_labourProfileView($LId);

          $data = [
              'labProfileData' => $labProfileData
          ];

          $this->view('admin/openViews',$data);
        }

        //add new employee details
        public function addEmployees()
        {
          
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            //sanitize the data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


          //   $file_name = $_FILES['image']['name'];
          //   $file_size = $_FILES['image']['size'];
          //   $tmp_name = $_FILES['image']['tmp_name'];
          //   $error = $_FILES['image']['error'];

          //   if ($error == 0) {

          //     $fileType = pathinfo($file_name, PATHINFO_EXTENSION);
          //     $fileType_lc = strtolower($fileType);
      
          //     $allowedFileTypes = array("jpg", "jpeg", "png");
      
          //     if (in_array($fileType, $allowedFileTypes)) {
      
          //         $new_img_name = uniqid("IMG-", true) . '.' . $fileType_lc;
          //         $img_upload_path = APPROOT . '/../public/img/users/' . $new_img_name;
          //         move_uploaded_file($tmp_name, $img_upload_path);                  
          //     }
          // }
            
            //input data
            $data = [
              'id' => '',
              'name' => trim($_POST['name']),
              'nic' => trim($_POST['nic']),
              'tp_num' => trim($_POST['tp_num']),
              'gender' => trim($_POST['gender']),
              'address' => trim($_POST['address']),
              'email' => trim($_POST['email']),
              'employment' => trim($_POST['employment']),
              // 'image' => $new_img_name,
              'password' => trim($_POST['nic']),
              // 'password' =>'1234',

              'name_err' => '',
              'nic_err' => '',
              'tp_num_err' => '',
              'gender_err' =>'',
              'email_err' => '',
              'employment_err' => '',
            ];

            if (empty($data['name']))       { $data['name_err'] = '*' ; }
            if (empty($data['nic']))        { $data['nic_err'] = '*' ;  }
            
            if (empty($data['gender']))     { $data['gender_err'] = '*' ; }
            if (empty($data['employment'])) { $data['employment_err'] = '*' ; }
            if ($data['employment']=='Select')  { $data['employment_err'] = '*' ; }

            if(!(preg_match("/^([0-9]{10})$/",($data['tp_num'])))) { $data['tp_num_err'] = 'Invalid Contact Number' ;}

            if (empty($data['tp_num']))     { $data['tp_num_err'] = '*' ; }

            // if(         (!(preg_match("/^([0-9,v]{10})$/",($data['nic']))))  ||     (!(preg_match("/^([0-9]{12})$/",($data['nic']))))       ) { 
            //   $data['nic_err'] = 'Invalid NIC Number' ;
            // }


            // if (empty($data['image'])) {
            //   $new_img_name = 'user.png';
            //   $data['image'] = $new_img_name;
            // }

            if (empty($data['email']))
            {
               $data['email_err'] = '*' ;
            }
            else
            {
              // check email is already registered or not
              if($this->adminModel->findEmployeeByEmail($data['email']))
              {
                $data['email_err'] = 'Email is already registered' ;
              }
            }

            // if(filter_var($data['email'], FILTER_VALIDATE_EMAIL))
            // {
            //   $data['email_err'] = 'Invalid Email' ;
            // }

            //submit form data if no errors
            if(empty($data['name_err']) && empty($data['nic_err']) && empty($data['tp_num_err']) && empty($data['gender_err']) && empty($data['email_err']) && empty($data['employment_err']) )
            {
              $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
              $data['id'] = $this->adminModel->generateEmployeeId();

              if($this->adminModel->addEmployees($data))
              {
                  flash('addEmp_flash','New Employee Details are successfully added!');
                  //addPopup();
                  sendMail($data);
                  redirect('Admin/viewEmployees');              
              }
              else
              {
                die('Something went wrong!');
              }
            }
            else
            {
              //load the form again
              $this->view('admin/addEmployees',$data);
            }

          }
          else
          
          {
            //initial form
            $data = [
              'id' => '',
              'name' => '',
              'nic' => '',
              'tp_num' => '',
              'gender' => '',
              'address' => '',
              'email' => '',
              'employment' => '',
              'password' => '',

              'name_err' => '',
              'nic_err' => '',
              'tp_num_err' => '',
              'gender_err' =>'',
              'email_err' => '',
              'employment_err' => ''
            ];
            //load the addemployee form
            $this->view('admin/addEmployees',$data);
          }
        }

        // public function sendEmail($data)
        // {

        // }



        //update selected employee's details
        public function updateEmployees($empId)
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // die(var_dump($_POST));
          //   $file_name = $_FILES['image']['name'];
          //   $file_size = $_FILES['image']['size'];
          //   $tmp_name = $_FILES['image']['tmp_name'];
          //   $error = $_FILES['image']['error'];

          //   if ($error == 0) {

          //     $fileType = pathinfo($file_name, PATHINFO_EXTENSION);
          //     $fileType_lc = strtolower($fileType);
      
          //     $allowedFileTypes = array("jpg", "jpeg", "png");
      
          //     if (in_array($fileType, $allowedFileTypes)) {
      
          //         $new_img_name = uniqid("IMG-", true) . '.' . $fileType_lc;
          //         $img_upload_path = APPROOT . '/../public/img/users/' . $new_img_name;
          //         move_uploaded_file($tmp_name, $img_upload_path);                  
          //     }
          // }

            $data = [
              'name' => trim($_POST['name']),
              'nic' => trim($_POST['nic']),
              'tp_num' => trim($_POST['tp_num']),
              'gender' => trim($_POST['gender']),
              'address' => trim($_POST['address']),
              'employment' => trim($_POST['employment']),
              // 'image' => $new_img_name,
              'empId' => $empId,


              // 'id_err' => '',
              'name_err' => '',
              'nic_err' => '',
              'tp_num_err' => '',
              'gender_err' =>'',
              'employment_err' => ''
            ];

            if (empty($data['name']))       { $data['name_err'] = '*' ; }
            if (empty($data['nic']))        { $data['nic_err'] = '*' ;  }
            if (empty($data['tp_num']))     { $data['tp_num_err'] = '*' ; }
            if (empty($data['employment'])) { $data['employment_err'] = '*' ; }
            if ($data['employment']=='Select')  { $data['employment_err'] = '*' ; }

            if(empty($data['id_err'])&&empty($data['name_err'])&&empty($data['nic_err'])&&empty($data['tp_num_err'])&&empty($data['employment_err']) )
            {
              if($this->adminModel->updateEmployees($data))
              {
                flash('updateEmp_flash','Employee Details are successfully Updated!');
                redirect('Admin/viewEmployees');
                //updatePopup();
              }
              else
              {
                die('Something went wrong!');
              }
            }
            else
            {
              //loading the view with errors
              $this->view('admin/updateEmployees',$data);
            }


          }
          else
          {         
            $emp = $this->adminModel->getEmpByEmail($empId);
            // $img= UPLOADS . $emp->image;
            //$emp  is a data set that retrieved from db
            $data = [
              'name' => $emp->employee_name,
              'nic' => $emp->nic,
              'tp_num' => $emp->contact_number,
              'gender' => $emp->gender,
              'address' => $emp->address,
              'employment' => $emp->employment,
              // 'image' => "<?php echo USERS . $emp->image",
              'empId' => $empId,

              // 'id_err' => '',
              'name_err' => '',
              'nic_err' => '',
              'tp_num_err' => '',
              'gender_err' =>'',
              'employment_err' => ''
            ];
            $this->view('admin/updateEmployees',$data);

          }

        }


        //delete a selected employee
        public function deleteEmployees($empId)
        {
          if($this->adminModel->deleteEmployees($empId))
          {
            //deletePopup();
            flash('dltEmp_flash','Employee is successfully deleted');
            redirect('Admin/viewEmployees');
          }
          else
          {
            die('Something went wrong');
          }
        }

        //add new Labour details
        public function addLabours()
        {        
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            //sanitize the data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            //input data
            $data = [
              'id' => '',
              'name' => trim($_POST['name']),
              'nic' => trim($_POST['nic']),
              'tp_num' => trim($_POST['tp_num']),
              'gender' => trim($_POST['gender']),
              'address' => trim($_POST['address']),
              // 'employment' => trim($_POST['employment']),

              'name_err' => '',
              'nic_err' => '',
              'tp_num_err' => '',
              'gender_err' =>''
            ];

            if (empty($data['name']))       { $data['name_err'] = '*' ; }
            if (empty($data['nic']))        { $data['nic_err'] = '*' ;  }
            if (empty($data['tp_num']))     { $data['tp_num_err'] = '*' ; }
            if (empty($data['gender']))     { $data['gender_err'] = '*' ; }

            //submit form data if no errors
            if(empty($data['name_err']) && empty($data['nic_err']) && empty($data['tp_num_err']) && empty($data['gender_err']) )
            {
              $data['id'] = $this->adminModel->generateLabourId();

              if($this->adminModel->addLabours($data))
              {
                  //addPopup();
                  flash('addEmp_flash','New Employee Details are successfully added!');
                  redirect('Admin/viewEmployeesLab');              
              }
              else
              {
                die('Something went wrong!');
              }
            }
            else
            {
              //load the form again
              $this->view('admin/addLabours',$data);
            }

          }
          else
          
          {
            //initial form
            $data = [
              'id' => '',
              'name' => '',
              'nic' => '',
              'tp_num' => '',
              'gender' => '',
              'address' => '',
              'email' => '',
              'employment' => '',
              'image' => '',
              'password' => '',

              'name_err' => '',
              'nic_err' => '',
              'tp_num_err' => '',
              'gender_err' =>'',
              'email_err' => '',
              'employment_err' => ''
            ];
            //load the addemployee form
            $this->view('admin/addLabours',$data);
          }
        }

        //update selected labour's details
        public function updateLabours($LId)
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
              'name' => trim($_POST['name']),
              'nic' => trim($_POST['nic']),
              'tp_num' => trim($_POST['tp_num']),
              'gender' => trim($_POST['gender']),
              'address' => trim($_POST['address']),
              'LId' => $LId,


              // 'id_err' => '',
              'name_err' => '',
              'nic_err' => '',
              'tp_num_err' => '',
              'employment_err' => ''
            ];

            if (empty($data['name']))       { $data['name_err'] = '*' ; }
            if (empty($data['nic']))        { $data['nic_err'] = '*' ;  }
            if (empty($data['tp_num']))     { $data['tp_num_err'] = '*' ; }

            if(empty($data['id_err'])&&empty($data['name_err'])&&empty($data['nic_err'])&&empty($data['tp_num_err'])&&empty($data['employment_err']) )
            {
              if($this->adminModel->updateLabours($data))
              {
                //updatePopup
                flash('updateEmp_flash','Employee Details are successfully Updated!');
                redirect('Admin/viewEmployeesLab');
              }
              else
              {
                die('Something went wrong!');
              }
            }
            else
            {
              //loading the view with errors
              $this->view('admin/updateLabours',$data);
            }

          }
          else
          {         
            $emp = $this->adminModel->getLabourById($LId);
            $data = [
              'name' => $emp->name,
              'nic' => $emp->nic,
              'tp_num' => $emp->contact_number,
              'gender' => $emp->gender,
              'address' => $emp->address,
              'LId' => $LId,

              // 'id_err' => '',
              'name_err' => '',
              'nic_err' => '',
              'tp_num_err' => '',
              'employment_err' => ''
            ];
            $this->view('admin/updateLabours',$data);

          }

        }

        //delete a selected labour
        public function deleteLabours($LId)
        {
          if($this->adminModel->deleteLabours($LId))
          {
            //deletePopup();
            flash('dltEmp_flash','Employee is successfully deleted');
            redirect('Admin/viewEmployeesLab');
          }
          else
          {
            die('Something went wrong');
          }
        }

        //get the details of livestock
        public function viewLivestock()
        {
          $livestockView= $this->adminModel->get_livestockView();
          $dltCowview= $this->adminModel->get_dltCowview();
          $notify = $this->adminModel->get_Notifications();

          $data = [
              'livestockView' => $livestockView,
              'dltCowview' => $dltCowview,
              'notifications' => $notify
          ];

          $this->view('admin/viewLivestock',$data);
        }

        public function viewCattleDetails($cattleID){
          $cattleDetails= $this->adminModel->get_cattleDetails($cattleID);

          $data = [
              'cattle' => $cattleDetails
          ];

          $this->view('admin/openViews',$data);
        }

        public function viewDeletedCattleDetails($cattleID){
          $dltCattleDetails= $this->adminModel->get_deletedCattleDetails($cattleID);

          $data = [
              'dltCattle' => $dltCattleDetails
          ];

          $this->view('admin/openViews',$data);
        }

        //get the details of MilkCollection
        public function viewMilkCollection()
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $from = isset($_POST['from']) ? $_POST['from'] : '';
            $to = isset($_POST['to']) ? $_POST['to'] : '';
            $from2 = isset($_POST['from2']) ? $_POST['from2'] : '';
            $to2 = isset($_POST['to2']) ? $_POST['to2'] : '';
            // print_r($from2);

            if($from== ''  && $to=='' && $from2!= ''  && $to2!=''){
              $mcView= $this->adminModel->get_mcView();
              $supOrdView= $this->adminModel->externalMC_duration($from2, $to2);
            }
            else if($from!= ''  && $to!='' && $from2== ''  && $to2==''){
              $mcView= $this->adminModel->InternalMC_duration($from, $to);
              $supOrdView= $this->adminModel->get_supOrdView();
            }
            else if($from!= ''  && $to!='' && $from2!= ''  && $to2!=''){
              $mcView= $this->adminModel->InternalMC_duration($from, $to);
              $supOrdView= $this->adminModel->externalMC_duration($from2, $to2);

            }
            else if($from== ''  && $to=='' && $from2== ''  && $to2==''){
              $mcView= $this->adminModel->get_mcView();
              $supOrdView= $this->adminModel->get_supOrdView();
            }
  
            $data = [
                'mcView' => $mcView,
                'supOrd' => $supOrdView,
                'from' => $from,
                'to' => $to,
                'from2' => $from2,
                'to2' => $to2
            ];
            $this->view('admin/viewMilkCollection',$data);
          }
          else{
            $mcView= $this->adminModel->get_mcView();
            $supOrdView= $this->adminModel->get_supOrdView();
  
            $data = [
                'mcView' => $mcView,
                'supOrd' => $supOrdView,
                'from' => '',
                'to' => '',
                'from2' => '',
                'to2' => ''
            ];

          }

          $this->view('admin/viewMilkCollection',$data);
        }

        //get the details of Production
        public function viewProduction()
        {
          $productionView= $this->adminModel->get_productionView();

          $data = [
              'productionView' => $productionView
          ];

          $this->view('admin/viewProduction',$data);
        }

        //get the stock details of a Product
        public function viewProductStock($pId)
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $from = isset($_POST['from']) ? $_POST['from'] : '';
            $to = isset($_POST['to']) ? $_POST['to'] : '';

            $productStockView= $this->adminModel->productStock_duration($pId, $from, $to);

            $data = [
                'pStockView' => $productStockView,
                'from' => $from,
                'to' => $to
            ];
  
            $this->view('admin/viewProductStock',$data);
          }
          else
          {
            $productStockView= $this->adminModel->get_productStockView($pId);

            $data = [
                'pStockView' => $productStockView,
                'from' => '',
                'to' => ''
            ];
  
            $this->view('admin/viewProductStock',$data);
          }

        }

        public function viewSales()
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $from = isset($_POST['from']) ? $_POST['from'] : '';
            $to = isset($_POST['to']) ? $_POST['to'] : '';
            $from2 = isset($_POST['from2']) ? $_POST['from2'] : '';
            $to2 = isset($_POST['to2']) ? $_POST['to2'] : '';
            // print_r($from2);

            if($from== ''  && $to=='' && $from2!= ''  && $to2!=''){
              $onsiteSView= $this->adminModel->get_onsiteSalesView();
              $onlineSView= $this->adminModel->onlineSale_duration($from2, $to2);
            }
            else if($from!= ''  && $to!='' && $from2== ''  && $to2==''){
              $onsiteSView= $this->adminModel->onsiteSale_duration($from, $to);
              $onlineSView= $this->adminModel->get_onlineSalesView();
            }
            else if($from!= ''  && $to!='' && $from2!= ''  && $to2!=''){
              $onsiteSView= $this->adminModel->onsiteSale_duration($from, $to);
              $onlineSView= $this->adminModel->onlineSale_duration($from2, $to2);

            }
            else if($from== ''  && $to=='' && $from2== ''  && $to2==''){
              $onsiteSView= $this->adminModel->get_onsiteSalesView();
              $onlineSView= $this->adminModel->get_onlineSalesView();
            }
  
            $data = [
                'onsiteS' => $onsiteSView,
                'onlineS' => $onlineSView,
                'from' => $from,
                'to' => $to,
                'from2' => $from2,
                'to2' => $to2
            ];
            $this->view('admin/viewSales',$data);
          }
          else{
            $onsiteSView= $this->adminModel->get_onsiteSalesView();
            $onlineSView= $this->adminModel->get_onlineSalesView();
  
            $data = [
                'onsiteS' => $onsiteSView,
                'onlineS' => $onlineSView,
                'from' => '',
                'to' => '',
                'from2' => '',
                'to2' => ''
            ];

          }

          $this->view('admin/viewSales',$data);
          
        }

        //get the details of Customers
        public function viewCustomers()
        {
          $cusView= $this->adminModel->get_cusView();
          $cusFeedBacks= $this->adminModel->get_cusFeedBacks();

          $data = [
              'cusView' => $cusView,
              'cusFeedBacks' => $cusFeedBacks
          ];

          $this->view('admin/viewCustomers',$data);
        }

        //get the details of Suppliers
        public function viewSuppliers()
        {
          $supView= $this->adminModel->get_supView();
          $supFeedBacks= $this->adminModel->get_supFeedBacks();

          $data = [
              'supView' => $supView,
              'supFeedBacks' => $supFeedBacks
          ];

          $this->view('admin/viewSuppliers',$data);
        }

        public function supplierProfile($sID)
        {
          $sup= $this->adminModel->get_supDetails($sID);

          $data = [
              'sup' => $sup
          ];

          $this->view('admin/openViews',$data);
        }

        //view employee details
        public function viewEmployees()
        {
          $search = '';
           $empView= $this->adminModel->currentEmpSearch($search);
           $labView= $this->adminModel->currentLabourSearch($search);

           $data = [
               'empView' => $empView,
               'labView' => $labView,
               'search' => '',
               'status' => '',
               'msg' =>''
           ];

           $this->view('admin/viewEmployees',$data);
        }

        //view labourer details
        public function viewEmployeesLab()
        {
           $search = '';
           $empView= $this->adminModel->currentEmpSearch($search);
           $labView= $this->adminModel->currentLabourSearch($search);

           $data = [
              'empView' => $empView,
              'labView' => $labView,
               'search' => '',
               'status' => '',
               'msg' =>''
           ];

           $this->view('admin/viewEmployeesL',$data);
        }

        
        //search employee details
        public function searchSysEmployees()
        {
          if($_SERVER['REQUEST_METHOD']=='GET')
          {
            $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
            $search = '';
            $labView= $this->adminModel->currentLabourSearch($search);
        
            $data = [
              'empView' => '',
              'labView' => $labView,
              'status' => trim($_GET['status']),
              'search' => trim($_GET['search']),
              'msg' =>''
            ];


            if($data['status']=='currentEmp'){

              $data['empView']=$this->adminModel->currentEmpSearch($data['search']);
            }
            else if($data['status']=='pastEmp'){
              $data['empView']=$this->adminModel->pastEmpSearch($data['search']);
            }

            if(empty($data['empView'])){
              $data['msg'] = "No data related to your search";
            }

          $this->view('admin/viewEmployees',$data);

          }
          else
          {
            redirect('Admin/viewEmployees');
          }
        }

        //search labours' details
        public function searchLabours()
        {
          if($_SERVER['REQUEST_METHOD']=='GET')
          {
            $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
            $search = '';
            $empView= $this->adminModel->currentEmpSearch($search);
        
            $data = [
              'empView' => $empView,
              'labView' => '',
              'status' => trim($_GET['status']),
              'search' => trim($_GET['search']),
              'msg' =>''
            ];

            if($data['status']=='currentLabours'){
              $data['labView']=$this->adminModel->currentLabourSearch($data['search']);
            }
            else if($data['status']=='pastLabours'){
              $data['labView']=$this->adminModel->pastLabourSearch($data['search']);
            }

            if(empty($data['labView'])){ 
              $data['msg'] = "No data related to your search";
            }

          $this->view('admin/viewEmployeesL',$data);

          }
          else
          {
            redirect('Admin/viewEmployeesLab');
          }
        }

        
        //chart
        public function totProfitChart()
        {
          echo $this->adminModel->get_totProfit();
        }

        public function totCattleChart()
        {
          echo $this->adminModel->get_totCattle();
        }

        //update seen notifications
        public function updateNotifyStatus($nId)
        {
          if($this->adminModel->update_notifyStatus($nId))
          {
            redirect('Admin/viewLivestock');
          }
          else
          {
            die('Something went wrong');
          }


        }

       

        


    }

?>
