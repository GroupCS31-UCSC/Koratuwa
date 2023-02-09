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
        }

        //redirect to the mco Home page
        public function mcoHome()
        {
          $data = [];
          $this->view('milk_collection_officer/mco_home',$data);
        }

        //get the details of total milk collection
        public function viewMilkCollection()
        {
          $milkView= $this->mcoModel->get_milkCollectionView();

          $data = [
              'milkView' => $milkView
          ];

          $this->view('milk_collection_officer/view_milk_collection',$data);
        }

        //add new collection details
        public function addCollection()
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


            //submit form data if no errors
            if(empty($data['name_err']) && empty($data['nic_err']) && empty($data['tp_num_err']) && empty($data['gender_err']) && empty($data['dob_err'])&& empty($data['address_err'])&& empty($data['email_err']) && empty($data['employment_err']) )
            {
              $data['id'] = $this->mcoModel->generateCollectionId();

              if($this->mcoModel->addCollection($data))
              {
                flash('addCollection_flash','New Collection Details are successfully added!');
                redirect('Milk_Collection_Officer/viewCollection');
              }
              else
              {
                die('Something went wrong!');
              }
            }
            else
            {
              //load the form again
              $this->view('milk_collection_officer/add_collection',$data);
            }

          }
          else
          {
            //initial form
            $data = [
              'cowId' => '',
              'quantity' => '',
              'date' => '',
              'time' => '',
              'remarks' => '',
          
              'cowId_err' => '',
              'quantity_err' => '',
              'date_err' => '',
              'time_err' => '',
              'remarks_err' => '',
            ];
            //load the addCollection form
            $this->view('milk_collection_officer/add_collection',$data);
          }
        }

        public function updateMilkCollection(){
          
        }
        public function deleteMilkCollection(){

        }


        
    }

?>
