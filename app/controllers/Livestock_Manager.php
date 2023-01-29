<?php

    class livestock_Manager extends Controller
    {
        public function __construct()
        {
          $this->livestockModel = $this->model('livestock_Manager_Model');
        }

        public function landingPage()
        {
          $data = [];
          $this->view('livestock_Manager/livestock_home',$data);
        }

        public function addCattle()
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data=[
              'cowId'=>'',
              'breed'=>trim($_POST['breed']),
              'weight'=>trim($_POST['weight']),
              'gender'=>trim($_POST['gender']),
              'dob'=>trim($_POST['dob']),
              'health'=>trim($_POST['health']),

              'breed_err'=>'',
              'weight_err'=>'',
              'gender_err'=>'',
              'dob_err'=>'',
              'health_err'=>''
            ];

            //validation
            if (empty($data['breed']))       { $data['breed_err'] = '*' ; }
            if (empty($data['weight']))        { $data['weight_err'] = '*' ;  }
            if (empty($data['gender']))     { $data['gender_err'] = '*' ; }
            if (empty($data['dob']))     { $data['dob_err'] = '*' ; }
            if (empty($data['health']))        { $data['health_err'] = '*' ; }
            if ($data['gender']=='Select')  { $data['gender_err'] = '*' ; }
            if ($data['breed']=='Select')  { $data['breed_err'] = '*' ; }

            //if no errors
            if(empty($data['breed_err']) && empty($data['weight_err']) && empty($data['gender_err']) && empty($data['dob_err']) && empty($data['health_err']) )
            {
              $data['cowId']= $this->livestockModel->findCowId();

              if($this->livestockModel->addCattle($data))
              {
                flash('addCattle_flash','New cattle details are successfully added!');
                redirect('Livestock_Manager/viewCattle');
              }
              else
              {
                die('Something went wrong!');
              }
            }
            else
            {
              //loading the form with the errors
              $this->view('livestock_Manager/addCattle',$data);
            }
          }
          else
          {
            //initial form loading
            $data=[
              'cowId'=>'',
              'breed'=>'',
              'weight'=>'',
              'gender'=>'',
              'dob'=>'',
              'health'=>'',

              'breed_err'=>'',
              'weight_err'=>'',
              'gender_err'=>'',
              'dob_err'=>'',
              'health_err'=>''
            ];
            $this->view('livestock_Manager/addCattle', $data);

          }
        }

        public function viewCattle()
        {
          $cattleView= $this->livestockModel->get_cattleView();

          $data = [
              'cattleView' => $cattleView
          ];

          $this->view('livestock_Manager/viewCattle',$data);
        }

        public function deleteCattle($cowId)
        {
          if($this->livestockModel->deleteCattle($cowId))
          {
            flash('deleteCattle_flash','Cattle details are successfully deleted');
            redirect('livestock_Manager/viewCattle');
          }
          else
          {
            die('Something went wrong');
          }
        }

        public function updateCattle($cowId)
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data=[
              'cowId'=>$cowId,
              'breed'=>trim($_POST['breed']),
              'weight'=>trim($_POST['weight']),
              'gender'=>trim($_POST['gender']),
              'dob'=>trim($_POST['dob']),
              'health'=>trim($_POST['health']),

              'breed_err'=>'',
              'weight_err'=>'',
              'gender_err'=>'',
              'dob_err'=>'',
              'health_err'=>''
            ];

            //validation
            if (empty($data['breed']))       { $data['breed_err'] = '*' ; }
            if (empty($data['weight']))        { $data['weight_err'] = '*' ;  }
            if (empty($data['gender']))     { $data['gender_err'] = '*' ; }
            if (empty($data['dob']))     { $data['dob_err'] = '*' ; }
            if (empty($data['health']))        { $data['health_err'] = '*' ; }

            //if no errors
            if(empty($data['breed_err']) && empty($data['weight_err']) && empty($data['gender_err']) && empty($data['dob_err']) && empty($data['health_err']) )
            {
              if($this->livestockModel->updateCattle($data))
              {
                flash('updateCattle_flash','New cattle details are successfully Updated!');
                redirect('Livestock_Manager/viewCattle');
              }
              else
              {
                die('Something went wrong!');
              }
            }
            else
            {
              //loading the form with the errors
              $this->view('livestock_Manager/updateCattle',$data);
            }
          }
          else
          {
            $cow = $this->livestockModel->getCattleById($cowId);
            $data=[
              'cowId'=>$cow->cow_id,
              'breed'=>$cow->cow_breed,
              'weight'=>$cow->weight,
              'gender'=>$cow->gender,
              'dob'=>$cow->dob,
              'health'=>$cow->health,

              'breed_err'=>'',
              'weight_err'=>'',
              'gender_err'=>'',
              'dob_err'=>'',
              'health_err'=>''
            ];
            $this->view('livestock_Manager/updateCattle', $data);

          }
        }



    }

?>
