<?php

    class Admin extends Controller
    {
        public function __construct()
        {
          $this->adminModel = $this->model('Admin_Model');
        }
        
        public function landingPage()
        {
          $data = [];
          $this->view('admin/admin_home',$data);
        }

        public function viewEmployees()
        {
          $empView= $this->adminModel->get_empView();

          $data = [
              'empView' => $empView
          ];

          $this->view('admin/viewEmployees',$data);
        }

        public function addEmployees()
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
              'dob' => trim($_POST['dob']),
              'address' => trim($_POST['address']),
              'email' => trim($_POST['email']),
              'employment' => trim($_POST['employment']),
              'password' => '1234',

              'name_err' => '',
              'nic_err' => '',
              'tp_num_err' => '',
              'gender_err' => '',
              'dob_err' => '',
              'address_err' => '',
              'email_err' => '',
              'employment_err' => ''
            ];

            if (empty($data['name']))       { $data['name_err'] = '*' ; }
            if (empty($data['nic']))        { $data['nic_err'] = '*' ;  }
            if (empty($data['tp_num']))     { $data['tp_num_err'] = '*' ; }
            if (empty($data['gender']))     { $data['gender_err'] = '*' ; }
            if ($data['gender']=='Select')  { $data['gender_err'] = '*' ; }
            if (empty($data['dob']))        { $data['dob_err'] = '*' ; }
            if (empty($data['address']))    { $data['address_err'] = '*' ; }
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
            if(empty($data['name_err']) && empty($data['nic_err']) && empty($data['tp_num_err']) && empty($data['gender_err']) && empty($data['dob_err'])&& empty($data['address_err'])&& empty($data['email_err']) && empty($data['employment_err']) )
            {
              $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
              $data['id'] = $this->adminModel->findEmployeeId();

              if($this->adminModel->addEmployees($data))
              {
                flash('addEmp_flash','New Employee Details are successfully added!');
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
              'dob' => '',
              'address' => '',
              'email' => '',
              'employment' => '',
              'password' => '',

              'name_err' => '',
              'nic_err' => '',
              'tp_num_err' => '',
              'gender_err' => '',
              'dob_err' => '',
              'address_err' => '',
              'email_err' => '',
              'employment_err' => ''
            ];
            //load the addemployee form
            $this->view('admin/addEmployees',$data);
          }
        }


        public function updateEmployees($email)
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
              //email eka change krnna den nee
              // 'id' => trim($_POST['id']),
              'name' => trim($_POST['name']),
              'nic' => trim($_POST['nic']),
              'tp_num' => trim($_POST['tp_num']),
              'gender' => trim($_POST['gender']),
              'dob' => trim($_POST['dob']),
              'address' => trim($_POST['address']),
              'employment' => trim($_POST['employment']),
              'email' => $email,


              // 'id_err' => '',
              'name_err' => '',
              'nic_err' => '',
              'tp_num_err' => '',
              'gender_err' => '',
              'dob_err' => '',
              'address_err' => '',
              'employment_err' => '',

            ];
            // if (empty($data['id']))         { $data['id_err'] = '*' ; }
            if (empty($data['name']))       { $data['name_err'] = '*' ; }
            if (empty($data['nic']))        { $data['nic_err'] = '*' ;  }
            if (empty($data['tp_num']))     { $data['tp_num_err'] = '*' ; }
            if (empty($data['gender']))     { $data['gender_err'] = '*' ; }
            if ($data['gender']=='Select')  { $data['gender_err'] = '*' ; }
            if (empty($data['dob']))        { $data['dob_err'] = '*' ; }
            if (empty($data['address']))    { $data['address_err'] = '*' ; }
            if (empty($data['employment'])) { $data['employment_err'] = '*' ; }
            if ($data['employment']=='Select')  { $data['employment_err'] = '*' ; }

            if(empty($data['id_err'])&&empty($data['name_err'])&&empty($data['nic_err'])&&empty($data['tp_num_err'])&&empty($data['gender_err'])&&empty($data['dob_err'])&&empty($data['address_err'])&&empty($data['employment_err']) )
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
            $emp = $this->adminModel->getEmpByEmail($email);
            //$emp  is a data set that retrieved from db
            $data = [
              // 'id' => $emp->employee_id,
              'name' => $emp->employee_name,
              'nic' => $emp->nic,
              'tp_num' => $emp->contact_number,
              'gender' => $emp->gender,
              'dob' => $emp->dob,
              'address' => $emp->address,
              'email' => $emp->email,
              'employment' => $emp->employment,

              // 'id_err' => '',
              'name_err' => '',
              'nic_err' => '',
              'tp_num_err' => '',
              'gender_err' => '',
              'dob_err' => '',
              'address_err' => '',
              'employment_err' => ''
            ];
            $this->view('admin/updateEmployees',$data);

          }

        }


        public function deleteEmployees($email)
        {
          if($this->adminModel->deleteEmployees($email))
          {
            flash('dltEmp_flash','Employee is successfully deleted');
            redirect('Admin/viewEmployees');
          }
          else
          {
            die('Something went wrong');
          }
        }


    }

?>
