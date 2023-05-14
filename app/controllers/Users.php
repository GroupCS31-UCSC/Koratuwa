<?php

    class Users extends Controller
    {
      public $userModel;

        public function __construct()
        {
          $this->userModel = $this->model('Users_Model');

        }

        //load the home page
        public function home()
        {
          $data = [];
          $this->view('users/u_home',$data);
        }

        //load the selection page
        public function selection()
        {
          $data = [];

          $this->view('users/u_selection',$data);
        }

        //load the forgot password page
        public function forgotPw()
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
              //Form is submitting
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              //input data
              $data = [
                'email' => trim($_POST['email']),

                'email_err' => ''
              ];

              //validate email
              if (empty($data['email']))
              {
                $data['email_err'] = 'Please enter the email' ;
              }
              else
              {
                // check email is existing or not in the system as a registered user email
                if($this->userModel->findUserByEmail($data['email']))
                {
                  //user is found
                }
                else
                {
                  //user is not found
                  $data['email_err'] = 'User not found' ;
                  flash('user_notFount','Provided Email is not registered in <i>Koratuwa</i>!');
                }
              }

              //If not error found in email
              if(empty($data['email_err']))
              {
                $email=$data['email'];
                //generate otp
                $otp=strval(rand(100000,999999));
                //save otp
                if($this->userModel->saveOtpCode($email, $otp))
                {
                  //get the user's name
                  $userName = $this->userModel->getUserName($data['email']);
                  //call to the send otp function
                  sendOtp($data['email'],$otp,$userName);
                  
                  $_SESSION['user_email']=$email;
                  redirect('Users/resetPw');
                }


              }
              else
              {
                flash('error','Some Error Occured, Please Try Again! ');
                $this->view('users/u_forgotPw',$data);
              }


            }
            else
            {
              //Initial form
              $data = [
                'email' => '' ,

                'email_err' => ''
              ];

              //load the view
              $this->view('users/u_forgotPw',$data);
            };
        }

        //load the reset password page   
        public function resetPw()
        { 
          $email= $_SESSION['user_email'];
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
              //Form is submitting
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              //input data
              $data = [
                'otp' => trim($_POST['otp']),

                'otp_err' => ''
              ];

              //check otp entered or not
              if (empty($data['otp']))
              {
                $data['otp_err'] = 'Please enter the otp code' ;
              }
              else
              {
                // check entered otp and saved otp in the database is same or not
                if($this->userModel->otpVerify($data['otp'], $email))
                { 
                  //otp matched; user is verified
                  redirect('Users/newPw');
                }
                else
                {
                  //user is mismatched; user is not verified
                  $data['otp_err'] = 'Otp mismactched' ;
                  flash('otp_mismatched','You have entered incorrect code!');
                }
              }
            }
            else
            {
              //Initial form
              $data = [
                'otp' => '' ,

                'otp_err' => ''
              ];

              //load the view
              flash('otp_verify','We have sent a password reset otp to your email '. $email);
              $this->view('users/u_resetPw',$data);
            };
        }


        //load the new pw entering password page   
        public function newPw()
        { 
          $email= $_SESSION['user_email'];
          if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
              //Form is submitting
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              //input data
              $data = [
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),

                'password_err' => '',
                'confirm_password_err' => ''
              ];

              //check password entered or not
              if (empty($data['password']))
              {
                $data['password_err'] = 'Please enter a password' ;
              }
              else if (empty($data['confirm_password']))
              {
                $data['confirm_password_err'] = 'Please confirm the password' ;
              }
              else
              {
                if($data['password'] != $data['confirm_password'])
                {
                  $data['confirm_password_err'] = 'Re-entered Password is not matching' ;
                }
              }

              //if no errors then update the password
              if(empty($data['password_err']) && empty($data['confirm_password_err']))
              {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if($this->userModel->setNewPw($email,$data['password']))
                {
                  flash('pw_changed','Password changed successfully! Enter your email and new password here to login');
                  redirect('Users/login');
                }
                else{
                  die('Something went wrong');
                }
              }
              else
              {
                //load the form again
                  $this->view('users/u_newPw',$data);
              }
            }
            else
            {
              //Initial form
              $data = [
                'password' => '' ,
                'confirm_password' => '',

                'password_err' => '',
                'confirm_password_err' => ''
              ];

              //load the view
              flash('new_password','Please create a new password and enter it twice below.');
              $this->view('users/u_newPw',$data);
            };
      
          }


        //load the change password page   
        public function changePw($email)
        { 
          if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
              //Form is submitting
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              //input data
              $data = [
                'old_password' => trim($_POST['old_password']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),

                'old_password_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
              ];

              //check password entered or not
              if (empty($data['old_password']))
              {
                $data['old_password_err'] = 'Please enter your current password' ;
              }
              //check the current password is wrong
              else if($this->userModel->checkCurrentPw($data['old_password'],$email))
              {
                $data['old_password_err'] = 'Current Password is Wrong!' ;
              }
              else if (empty($data['password']))
              {
                $data['password_err'] = 'Please enter a password' ;
              }
              else if (empty($data['confirm_password']))
              {
                $data['confirm_password_err'] = 'Please confirm the password' ;
              }
              else
              {
                if($data['password'] != $data['confirm_password'])
                {
                  $data['confirm_password_err'] = 'Re-entered Password is not matching' ;
                }
              }

              //if no errors then update the password
              if(empty($data['old_password_err']) && empty($data['password_err']) && empty($data['confirm_password_err']))
              {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if($this->userModel->setNewPw($email,$data['password']))
                {
                  flash('pw_changed','Password changed successfully! Enter your email and new password here to login');
                  redirect('Users/login');
                }
                else{
                  die('Something went wrong');
                }
              }
              else
              {
                //load the form again
                  $this->view('users/u_changePw',$data);
              }
            }
            else
            {
              //Initial form
              $data = [
                'old_password' => '',
                'password' => '' ,
                'confirm_password' => '',

                'old_password_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
              ];

              //load the view
              flash('new_password','Please enter your existing password and new password twice below.');
              $this->view('users/u_changePw',$data);
            };

        }

        //register suppliers
        public function registerSupplier()
        {
          //if the server submitted the form, the request method is post
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
                'address' => trim($_POST['address']),
                'province' => trim($_POST['province']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),

                'name_err' => '' ,
                'nic_err' => '' ,
                'tp_num_err' => '' ,
                'address_err' => '' ,
                'province_err' => '',
                'email_err' => '' ,
                'password_err' => '' ,
                'confirm_password_err' => ''
              ];

              //validate name
              if (empty($data['name']))
              {
                $data['name_err'] = 'Please enter a name' ;
              }

              if (empty($data['nic']))
              {
                $data['nic_err'] = 'Please enter a NIC' ;
              }

              if(!(preg_match("/^([0-9]{10})$/",($data['tp_num'])))) 
              {
                 $data['tp_num_err'] = 'Invalid Contact Number' ;
              }

              if (empty($data['tp_num']))
              {
                $data['tp_num_err'] = 'Please enter a contact number' ;
              }

              if (empty($data['address']))
              {
                $data['address_err'] = 'Please enter your address' ;
              }


              if (empty($data['province'])) { $data['province_err'] = 'Please choose your Residential Area' ; }
              if ($data['province']=='Select')  { $data['province_err'] = 'Please choose your Residential Area' ; }

              if ($data['province']=='Other')  { $data['province_err'] = 'Sorry! Our service is currently available for the Western Province only' ; }


              //validate email
              if (empty($data['email']))
              {
                $data['email_err'] = 'Please enter your email' ;
              }

              else     // check email is already registered or not
              {
                  if($this->userModel->findSupplierByEmail($data['email']))
                  {
                    $data['email_err'] = 'Email is already registered' ;
                  }
              }

              //validate password
              if (empty($data['password']))
              {
                $data['password_err'] = 'Please enter a password' ;
              }
              else if (empty($data['confirm_password']))
              {
                $data['confirm_password_err'] = 'Please confirm the password' ;
              }
              else
              {
                if($data['password'] != $data['confirm_password'])
                {
                  $data['confirm_password_err'] = 'Re-entered Password is not matching' ;
                }
              }

              //validation is completed and no errors then register the users
              if(empty($data['name_err']) && empty($data['nic_err']) && empty($data['tp_num_err']) && empty($data['address_err']) && empty($data['province_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) )
              {
                //Hash the password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                $data['id'] = $this->userModel->generateSupplierId();

                //Register user
                  if($this->userModel->registerAsSupplier($data))
                  {
                    //generate otp
                    $otp=strval(rand(100000,999999));

                    //save otp
                    if($this->userModel->saveOtpCode_whenEmailVerify($data['email'], $otp))
                    {
                      //send otp
                      sendOtpForEmailVerification($data['email'],$otp,$data['name']);

                      //create a flash message
                      // flash('reg_flash','You are successfully registered as a Supplier of Koratuwa Dairy Farm!');
                      $_SESSION['user_email']=$data['email'];
                      redirect('Users/verifyRegisteredEmail');
                    }
                    
                  }
                  else
                  {
                    die('Something went wrong');
                  }

              }


              else
              {
                //load the form again
                  $this->view('users/u_registerSupplier',$data);
              }


            }
            else
            {
              //initial form
              $data = [
                'id' => '',
                'name' => '' ,
                'nic' => '' ,
                'tp_num' => '' ,
                'address' => '' ,
                'province' => '' ,
                'email' => '' ,
                'password' => '' ,
                'confirm_password' => '' ,

                'name_err' => '' ,
                'nic_err' => '' ,
                'tp_num_err' => '' ,
                'address_err' => '' ,
                'province_err' => '',
                'email_err' => '' ,
                'password_err' => '' ,
                'confirm_password_err' => ''
              ];

              //load the view
                $this->view('users/u_registerSupplier',$data);
            }
        }

        public function verifyRegisteredEmail()
        {
          $email= $_SESSION['user_email'];

          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $email= $_SESSION['user_email'];
            //Form is submitting
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //input data
            $data = [
              'otp' => trim($_POST['otp']),

              'otp_err' => ''
            ];

            //check otp entered or not
            if (empty($data['otp']))
            {
              $data['otp_err'] = 'Please enter the otp code' ;
            }
            else
            {
              // check entered otp and saved otp in the database is same or not
              if($this->userModel->verifyEmailBy_OTP($data['otp'], $email))
              { 
                //otp matched; user is verified
                if($this->userModel->confirmRegistration($email))
                {
                  flash('user_registered','Registration Successfull!');
                  redirect('Users/login');
                }
                else
                {
                  redirect('Users/u_home');
                }
                
              }
              else
              {
                redirect('Users/u_home');

                //user is mismatched; user is not verified
                $data['otp_err'] = 'Otp mismactched' ;
                flash('otp_mismatched','You have entered incorrect code!');
              }
            }
          }
          else
          {
            //Initial form
            $data = [
              'otp' => '' ,

              'otp_err' => ''
            ];

            //load the view
            flash('otp_verify','We have sent an otp to your email '. $email);
            $this->view('users/u_verifyEmail',$data);
          };
        }

        //register customers
        public function registerCustomer()
        {
          //if the server submitted the form, the request method is post
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
                'address' => trim($_POST['address']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),

                'name_err' => '' ,
                'nic_err' => '' ,
                'tp_num_err' => '' ,
                'address_err' => '' ,
                'email_err' => '' ,
                'password_err' => '' ,
                'confirm_password_err' => ''
              ];

              //validate name
              if (empty($data['name']))
              {
                $data['name_err'] = 'Please enter a name' ;
              }

              if (empty($data['nic']))
              {
                $data['nic_err'] = 'Please enter NIC or Company Registration number' ;
              }

              if (empty($data['tp_num']))
              {
                $data['tp_num_err'] = 'Please enter a contact number' ;
              }

              if (empty($data['address']))
              {
                $data['address_err'] = 'Please enter your address' ;
              }

              //validate email
              if (empty($data['email']))
              {
                $data['email_err'] = 'Please enter your email' ;
              }

              else     // check email is already registered or not
              {
                  if($this->userModel->findCustomerByEmail($data['email']))
                  {
                    $data['email_err'] = 'Email is already registered' ;
                  }
              }

              //validate password
              if (empty($data['password']))
              {
                $data['password_err'] = 'Please enter a password' ;
              }
              else if (empty($data['confirm_password']))
              {
                $data['confirm_password_err'] = 'Please confirm the password' ;
              }
              else
              {
                if($data['password'] != $data['confirm_password'])
                {
                  $data['confirm_password_err'] = 'Re-entered Password is not matching' ;
                }
              }

              //validation is completed and no errors then register the users
              if(empty($data['name_err']) && empty($data['nic_err']) && empty($data['tp_num_err']) && empty($data['address_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) )
              {
                //Hash the password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                $data['id'] = $this->userModel->generateCustomerId();

                //Register user
                  if($this->userModel->registerAsCustomer($data))
                  {
                    //generate otp
                    $otp=strval(rand(100000,999999));

                    //save otp
                    if($this->userModel->saveOtpCode_whenEmailVerify($data['email'], $otp))
                    {
                      //send otp
                      sendOtpForEmailVerification($data['email'],$otp,$data['name']);

                      //create a flash message
                      // flash('reg_flash','You are successfully registered as a Supplier of Koratuwa Dairy Farm!');
                      $_SESSION['user_email']=$data['email'];
                      redirect('Users/verifyRegisteredEmail');
                    }
                  }
                  else
                  {
                    die('Something went wrong');
                  }

              }


              else
              {
                //load the form again
                  $this->view('users/u_registerCustomer',$data);
              }


            }
            else
            {
              //initial form
              $data = [
                'id' => '',
                'name' => '' ,
                'nic' => '' ,
                'tp_num' => '' ,
                'address' => '' ,
                'email' => '' ,
                'password' => '' ,
                'confirm_password' => '' ,

                'name_err' => '' ,
                'nic_err' => '' ,
                'tp_num_err' => '' ,
                'address_err' => '' ,
                'email_err' => '' ,
                'password_err' => '' ,
                'confirm_password_err' => ''
              ];

              //load the view
                $this->view('users/u_registerCustomer',$data);
            }
        }



//----------------------------------------------------------------------------------------------
        //log into the system
        public function login()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
              //Form is submitting
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              //input data
              $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),

                'email_err' => '' ,
                'password_err' => '' ,
              ];

              //validate each input

              //validate email
              if (empty($data['email']))
              {
                $data['email_err'] = 'Please enter the email' ;
              }
              else
              {
                // check email is existing or not
                if($this->userModel->findUserByEmail($data['email']))
                {
                  //user is found
                }
                else
                {
                  //user is not found
                  $data['email_err'] = 'User not found' ;
                }
              }

              //validate password
              if (empty($data['password']))
              {
                $data['password_err'] = 'Please enter the password' ;
              }

              //If not error found then login the user
              if(empty($data['email_err']) && empty($data['password_err']) )
              {
                //log the user
                $loggedUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedUser)
                {
                  //user is authenticated
                  //create user sessions
                  $this->createUserSession($loggedUser);
               }
                else
                {
                  $data['password_err'] = 'Password incorrect' ;

                  //load view with the eroors
                  $this->view('users/u_login',$data);

                }

              }
              else
              {
                //load view with eroors
                $this->view('users/u_login',$data);
              }


            }
            else
            {
              //Initial form
              $data = [
                'email' => '' ,
                'password' => '' ,

                'email_err' => '' ,
                'password_err' => ''
              ];

              //load the view
              $this->view('users/u_login',$data);
            };

        }


//----------------------------------------------------------------------------------------------
        //create user session when logged in to the system
        public function createUserSession($user)
        {
          $_SESSION['user_id'] = $user->user_id;
          $_SESSION['user_email'] = $user->email;
          $_SESSION['user_name'] = $user->name;
          $_SESSION['user_type'] = $user->user_type;


          switch ($this->userModel->findUserRole($_SESSION['user_email'])) {

            case 'Admin':
              redirect('Admin/adminHome');
              break;
            case 'Product Manager':
              redirect('Product_Manager/productCategories');
              break;
            case 'Livestock Manager':
              redirect('Livestock_Manager/livestockHome');
              break;
            case 'Milk Collection Officer':
              redirect('Milk_Collection_Officer/mcoHome');
              break;
            case 'Financial Manager':
              redirect('Financial_Manager/viewExpense');
              break;
            case 'Cashier':
              redirect('Cashier/cashierHome');
              break;
            case 'Customer':
              redirect('Customer/customerHome');
              break;
            case 'Supplier':
              redirect('Supplier/supplierHome');
              break;
            default:
              redirect('Users/home');
              break;

          }


        }

        //logout from the system
        public function logout()
        {
          unset($_SESSION['user_id']);
          unset($_SESSION['user_email']);
          unset($_SESSION['user_name']);
          unset($_SESSION['user_type']);

          session_destroy();

          redirect('Users/home');

        }
      
        //check whether user logged in or not
        public function isLoggedIn()
        {
          if(isset($_SESSION['user_id']))
          {
            return true;
          }
          else
          {
            return false;
          }
        }
        
        //Get the details of userprofile
        public function userProfile($userId){

          $userProfile= $this->userModel->get_userProfile($userId);
          

          $data = [
              'userProfile' => $userProfile,
          ];

          $this->view('Users/u_profile',$data);

        }
        //Edit user profile
        public function sup_editProfile($supplier_id){
          
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
              'user_id' => $supplier_id,
              'supplier_id'=> $supplier_id,
              'name' => trim($_POST['name']),
              'contact_number' => trim($_POST['contact_number']),
              'email' => trim($_POST['email']),
              'address' =>trim($_POST['address']),
            ];
            
            if($this->userModel->editProfile($data))
            {
              flash('updateSupply_flash','Your profile is successfully Updated!');
              redirect('Users/userProfile');
            }
            else
            {
              die('Something went wrong!');
            }

          }
          else{
            $userProfile= $this->userModel->get_userProfile($supplier_id);

            $data = [
                'userProfile' => $userProfile
            ];
            $this->view('users/u_editProfile',$data);
          }
        }

        public function editProfile($empId){
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
              'name' => trim($_POST['name']),
              'tp_num' => trim($_POST['tp_num']),
              // 'gender' => trim($_POST['gender']),
              'address' => trim($_POST['address']),



              // 'id_err' => '',
              'name_err' => '',
              'tp_num_err' => '',
              // 'gender_err' =>'',
              'employment_err' => ''
            ];

            if (empty($data['name']))       { $data['name_err'] = '*' ; }
            // if (empty($data['nic']))        { $data['nic_err'] = '*' ;  }
            if (empty($data['tp_num']))     { $data['tp_num_err'] = '*' ; }
            // if (empty($data['employment'])) { $data['employment_err'] = '*' ; }
            // if ($data['employment']=='Select')  { $data['employment_err'] = '*' ; }

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

        public function tandc()
        {
          $data = [];

          $this->view('users/u_tandc',$data);
        }


    }
?>
