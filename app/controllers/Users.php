<?php

    class Users extends Controller
    {
        public function __construct()
        {
          $this->userModel = $this->model('Users_Model');
        }

        public function home()
        {
          $data = [];
          $this->view('users/u_home',$data);
        }

        public function selection()
        {
          $data = [];

          $this->view('users/u_selection',$data);
        }



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
              if(empty($data['name_err']) && empty($data['nic_err']) && empty($data['tp_num_err']) && empty($data['address_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) )
              {
                //Hash the password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                $data['id'] = $this->userModel->FindSupplierId();
                //Register user
                  if($this->userModel->registerAsSupplier($data))
                  {
                    //create a flash message
                    flash('reg_flash','You are successfully registered as a Supplier of Koratuwa Dairy Farm!');
                    redirect('Users/login');
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
                $this->view('users/u_registerSupplier',$data);
            }
        }


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

                $data['id'] = $this->userModel->FindCustomerId();

                //Register user
                  if($this->userModel->registerAsCustomer($data))
                  {
                    //create a flash message
                    flash('reg_flash','You are successfully registered as a Customer of Koratuwa Dairy Farm!');
                    redirect('Users/login');
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
        public function createUserSession($user)
        {
          $_SESSION['user_id'] = $user->user_id;
          $_SESSION['user_email'] = $user->email;
          $_SESSION['user_name'] = $user->name;

          switch ($this->userModel->findUserRole($_SESSION['user_email'])) {

            case 'Admin':
              redirect('Admin/landingPage');
              break;
            case 'Product Manager':
              redirect('Product_Manager/landingPage');
              break;
            case 'Livestock Manager':
              redirect('Livestock_Manager/landingPage');
              break;
            case 'Milk Collection Officer':
              redirect('Milk_Collection_Officer/landingPage');
              break;
            case 'Financial Manager':
              redirect('Financial_Manager/landingPage');
              break;
            case 'Cashier':
              redirect('Cashier/landingPage');
              break;
            case 'Customer':
              redirect('Customer/landingPage');
              break;
            case 'Supplier':
              redirect('Supplier/landingPage');
              break;
            default:
              redirect('Users/home');
              break;

          }


        }

        public function logout()
        {
          unset($_SESSION['user_id']);
          unset($_SESSION['user_email']);
          unset($_SESSION['user_name']);
          session_destroy();

          redirect('Users/home');

        }

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

    }
?>
