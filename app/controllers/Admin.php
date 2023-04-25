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
          $data = [];
          $this->view('admin/admin_home',$data);
        }
        
        //get the details of Employee for profile
        public function EmployeeProfile($email)
        {
          $empProfileData= $this->adminModel->get_empProfileView($email);

          $data = [
              'empProfileData' => $empProfileData
          ];

          $this->view('admin/employeeProfile',$data);
        }

        //add new employee details
        public function addEmployees()
        {
          
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            //sanitize the data
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
              'image' => $new_img_name,
              // 'password' => trim($_POST['tp_num']) ,
              'password' =>'1234',

              'name_err' => '',
              'nic_err' => '',
              'tp_num_err' => '',
              'email_err' => '',
              'employment_err' => '',
              'image_err' => ''
            ];

            if (empty($data['name']))       { $data['name_err'] = '*' ; }
            if (empty($data['nic']))        { $data['nic_err'] = '*' ;  }
            if (empty($data['tp_num']))     { $data['tp_num_err'] = '*' ; }
            if (empty($data['employment'])) { $data['employment_err'] = '*' ; }
            if ($data['employment']=='Select')  { $data['employment_err'] = '*' ; }

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

            //submit form data if no errors
            if(empty($data['name_err']) && empty($data['nic_err']) && empty($data['tp_num_err']) && empty($data['email_err']) && empty($data['employment_err']) )
            {
              $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
              $data['id'] = $this->adminModel->generateEmployeeId();

              if($this->adminModel->addEmployees($data))
              {
                  flash('addEmp_flash','New Employee Details are successfully added!');
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
              'image' => '',
              'password' => '',

              'name_err' => '',
              'nic_err' => '',
              'tp_num_err' => '',
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
                  $img_upload_path = APPROOT . '/../public/img/Uploads/' . $new_img_name;
                  move_uploaded_file($tmp_name, $img_upload_path);                  
              }
          }

            $data = [
              'name' => trim($_POST['name']),
              'nic' => trim($_POST['nic']),
              'tp_num' => trim($_POST['tp_num']),
              'gender' => trim($_POST['gender']),
              'address' => trim($_POST['address']),
              'employment' => trim($_POST['employment']),
              'image' => $new_img_name,
              'empId' => $empId,


              // 'id_err' => '',
              'name_err' => '',
              'nic_err' => '',
              'tp_num_err' => '',
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
              'image' => "<?php echo UPLOADS . $emp->image ?>",
              'empId' => $empId,

              // 'id_err' => '',
              'name_err' => '',
              'nic_err' => '',
              'tp_num_err' => '',
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
            flash('dltEmp_flash','Employee is successfully deleted');
            redirect('Admin/viewEmployees');
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

          $data = [
              'livestockView' => $livestockView
          ];

          $this->view('admin/viewLivestock',$data);
        }

        //get the details of MilkCollection
        public function viewMilkCollection()
        {
          $mcView= $this->adminModel->get_mcView();

          $data = [
              'mcView' => $mcView
          ];

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

        //get the details of Customers
        public function viewCustomers()
        {
          $cusView= $this->adminModel->get_cusView();

          $data = [
              'cusView' => $cusView
          ];

          $this->view('admin/viewCustomers',$data);
        }

        //get the details of Suppliers
        public function viewSuppliers()
        {
          $supView= $this->adminModel->get_supView();

          $data = [
              'supView' => $supView
          ];

          $this->view('admin/viewSuppliers',$data);
        }



        
        //search employee details
        public function viewEmployees()
        {
          if($_SERVER['REQUEST_METHOD']=='POST')
          {
            $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
            $data = [
              'empView' => '',
              'status' => trim($_POST['status']),
              'search' => trim($_POST['search'])
            ];

            // $empDetail='';
            if($data['status']=='currentEmp'){
              $data['empView']=$this->adminModel->currentEmpSearch($data['search']);
            }
            else if($data['status']=='pastEmp'){
              $data['empView']=$this->adminModel->pastEmpSearch($data['search']);
            }
            else if($data['status']=='all'){
              $data['empView']=$this->adminModel->allEmpSearch($data['search']);
            }
            else{
              $data['empView']=$this->adminModel->currentEmpSearch($data['search']);
            }

          $this->view('admin/viewEmployees',$data);

          }
          else
          {
            $search='';
            $empDetail=$this->adminModel->currentEmpSearch($search);
            //initial form
            $data = [
              
              'empView' => $empDetail,
              'status' => '',
              'search' => ''
            ];

            //load the viewEmployee
            $this->view('admin/viewEmployees',$data);
          }
        }

        


    }

?>
