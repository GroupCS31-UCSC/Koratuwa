<?php
  class livestock_Manager extends Controller {
    public $livestockModel;

    public function __construct() {
      $this->livestockModel = $this->model('livestock_Manager_Model');

      if(!$_SESSION['user_email']) {
        redirect('Users/login');
      }          
    }

    public function livestockHome() {
      $data = [];
      $this->view('livestock_Manager/livestock_home',$data);
    }

    public function addCattle() {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data=[
          'cowId'=>'',
          'dob'=>trim($_POST['dob']),
          'gender'=>trim($_POST['gender']),
          'breed'=>trim($_POST['breed']),
          'weight'=>trim($_POST['weight']),
          'purpose'=>trim($_POST['purpose']),

          'dob_err'=>'',
          'gender_err'=>'',
          'breed_err'=>'',
          'weight_err'=>'',
          'purpose_err'=>''
        ];

        //validation
        if (empty($data['dob'])) {
          $data['dob_err'] = '*' ;
        }
        if (empty($data['gender'])) {
          $data['gender_err'] = '*' ;
        }
        if (empty($data['breed'])) {
          $data['breed_err'] = '*' ;
        }
        if (empty($data['weight'])) {
          $data['weight_err'] = '*' ;
        }
        if (empty($data['purpose'])) {
          $data['purpose_err'] = '*' ;
        }
        if ($data['gender']=='Select') {
          $data['gender_err'] = '*' ;
        }
        if ($data['breed']=='Select') {
          $data['breed_err'] = '*' ;
        }

        //if no errors
        if(empty($data['dob_err']) && empty($data['gender_err']) && empty($data['breed_err']) && empty($data['weight_err']) && empty($data['purpose_err']) ) {
          $data['cowId']= $this->livestockModel->findCowId();

          if($this->livestockModel->addCattle($data)) {
            flash('addCattle_flash','New cattle details are successfully added!');
            redirect('Livestock_Manager/viewCattle');
          }
          else {
            die('Something went wrong!');
          }
        }
        else {
          //loading the form with the errors
          $this->view('livestock_Manager/addCattle',$data);
        }
      }
      else {
        //initial form loading
        $data=[
          'cowId'=>'',
          'dob'=>'',
          'gender'=>'',
          'breed'=>'',
          'weight'=>'',
          'purpose'=>'',

          'dob_err'=>'',
          'gender_err'=>'',
          'breed_err'=>'',
          'weight_err'=>'',
          'purpose_err'=>''
        ];
        $this->view('livestock_Manager/addCattle', $data);
      }
    }

    public function viewCattle() {
      $cattleView= $this->livestockModel->get_cattleView();

      $data = [
        'cattleView' => $cattleView
      ];

      $this->view('livestock_Manager/viewCattle',$data);
    }

    public function deleteCattle($cowId) {
      if($this->livestockModel->deleteCattle($cowId)){
        flash('deleteCattle_flash','Cattle details are successfully deleted');
        redirect('livestock_Manager/viewCattle');
      }
      else {
        die('Something went wrong');
      }
    }

    public function updateCattle($cowId) {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data=[
          'cowId'=>$cowId,
          'dob'=>trim($_POST['dob']),
          'gender'=>trim($_POST['gender']),
          'breed'=>trim($_POST['breed']),
          'weight'=>trim($_POST['weight']),

          'dob_err'=>'',
          'gender_err'=>'',
          'breed_err'=>'',
          'weight_err'=>''
        ];

        //validation
        if (empty($data['dob'])) {
          $data['dob_err'] = '*' ;
        }
        if (empty($data['gender'])) {
          $data['gender_err'] = '*' ;
        }
        if (empty($data['breed'])) {
          $data['breed_err'] = '*' ;
        }
        if (empty($data['weight'])) {
          $data['weight_err'] = '*' ;
        }
        if ($data['gender']=='Select') {
          $data['gender_err'] = '*' ;
        }
        if ($data['breed']=='Select') {
          $data['breed_err'] = '*' ;
        }

        //if no errors
        if(empty($data['dob_err']) && empty($data['gender_err']) && empty($data['breed_err']) && empty($data['weight_err']) ) {
          if($this->livestockModel->updateCattle($data)) {
            flash('updateCattle_flash','New cattle details are successfully Updated!');
            redirect('Livestock_Manager/viewCattle');
          }
          else {
            die('Something went wrong!');
          }
        }
        else {
          //loading the form with the errors
          $this->view('livestock_Manager/updateCattle',$data);
        }
      }
      else {
        $cow = $this->livestockModel->getCattleById($cowId);
        $data=[
          'cowId'=>$cow->cow_id,
          'dob'=>$cow->dob,
          'gender'=>$cow->gender,
          'breed'=>$cow->cow_breed,
          'weight'=>$cow->weight,

          'dob_err'=>'',
          'gender_err'=>'',
          'breed_err'=>'',
          'weight_err'=>''
        ];
        $this->view('livestock_Manager/updateCattle', $data);
      }
    }

    public function viewFeedMonitoring() {
      $feedMonitoringView= $this->livestockModel->get_feedMonitoringView();

      $data = [
        'feedMonitoringView' => $feedMonitoringView
      ];

      $this->view('livestock_Manager/viewFeedMonitoring',$data);
    }

    public function addFeedMonitoring() {
      $data = [];
      $this->view('livestock_Manager/addFeedMonitoring',$data);
    }
    public function updateFeedMonitoring() {
      $data = [];
      $this->view('livestock_Manager/updateFeedMonitoring',$data);
    }

    public function viewVaccination() {
      $vaccinationView= $this->livestockModel->get_vaccinationView();

      $data = [
        'vaccinationView' => $vaccinationView
      ];

      $this->view('livestock_Manager/viewVaccination',$data);
    }

    public function addVaccination() {
      $data = [];
      $this->view('livestock_Manager/addVaccination',$data);
    }
    
    public function updateVaccination() {
      $data = [];
      $this->view('livestock_Manager/addFeedMonitoring',$data);
    }
  }

?>
