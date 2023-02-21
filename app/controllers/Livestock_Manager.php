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
          'breed'=>trim($_POST['breed']),
          'type'=>trim($_POST['type']),
          'buyDate'=>trim($_POST['buy_date']),
          'buyPrice'=>trim($_POST['buy_price']),
          'weight'=>trim($_POST['weight']),
          'height'=>trim($_POST['height']),
          'pregnantStatus'=>trim($_POST['pregnant_status']),
          'noOfPregnant'=>trim($_POST['no_of_pregnant']),
          'nextPregnant'=>trim($_POST['next_pregnant']),
          'milkPerDay'=>trim($_POST['milk_per_day']),

          'dob_err'=>'',
          'breed_err'=>'',
          'type_err'=>'',
          'buyDate_err'=>'',
          'buyPrice_err'=>'',
          'weight_err'=>'',
          'height_err'=>'',
          'pregnantStatus_err'=>'',
          'noOfPregnant_err'=>'',
          'nextPregnant_err'=>'',
          'milkPerDay_err'=>''
        ];

        //validation
        if (empty($data['dob'])) {
          $data['dob_err'] = '*' ;
        }
        if ($data['breed']=='Select') {
          $data['breed_err'] = '*' ;
        }
        if ($data['type']=='Select') {
          $data['type_err'] = '*' ;
        }
        if (empty($data['buyDate'])) {
          $data['buyDate_err'] = '*' ;
        }
        if (empty($data['buyPrice'])) {
          $data['buyPrice_err'] = '*' ;
        }
        if (empty($data['weight'])) {
          $data['weight_err'] = '*' ;
        }
        if (empty($data['height'])) {
          $data['height_err'] = '*' ;
        }
        if (empty($data['pregnantStatus'])) {
          $data['pregnantStatus_err'] = '*' ;
        }
        if (empty($data['noOfPregnant'])) {
          $data['noOfPregnant_err'] = '*' ;
        }
        if (empty($data['nextPregnant'])) {
          $data['nextPregnant_err'] = '*' ;
        }
        if (empty($data['milkPerDay'])) {
          $data['milkPerDay_err'] = '*' ;
        }

        //if no errors
        if(empty($data['dob_err']) && empty($data['breed_err']) && empty($data['type_err']) && empty($data['buyDate_err']) && empty($data['buyPrice_err']) && empty($data['weight_err']) && empty($data['height_err']) && empty($data['pregnantStatus_err']) && empty($data['noOfPregnant_err']) && empty($data['nextPregnant_err']) && empty($data['milkPerDay_err']) ) {
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
          'breed'=>'',
          'type'=>'',
          'buyDate'=>'',
          'buyPrice'=>'',
          'weight'=>'',
          'height'=>'',
          'pregnantStatus'=>'',
          'noOfPregnant'=>'',
          'nextPregnant'=>'',
          'milkPerDay'=>'',

          'dob_err'=>'',
          'breed_err'=>'',
          'type_err'=>'',
          'buyDate_err'=>'',
          'buyPrice_err'=>'',
          'weight_err'=>'',
          'height_err'=>'',
          'pregnantStatus_err'=>'',
          'noOfPregnant_err'=>'',
          'nextPregnant_err'=>'',
          'milkPerDay_err'=>''
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
          'breed'=>trim($_POST['breed']),
          'type'=>trim($_POST['type']),
          'buyDate'=>trim($_POST['buyDate']),
          'buyPrice'=>trim($_POST['buyPrice']),
          'weight'=>trim($_POST['weight']),
          'height'=>trim($_POST['height']),
          'pregnantStatus'=>trim($_POST['pregnantStatus']),
          'noOfPregnant'=>trim($_POST['noOfPregnant']),
          'nextPregnant'=>trim($_POST['nextPregnant']),
          'milkPerDay'=>trim($_POST['milkPerDay']),

          'dob_err'=>'',
          'breed_err'=>'',
          'type_err'=>'',
          'buyDate_err'=>'',
          'buyPrice_err'=>'',
          'weight_err'=>'',
          'height_err'=>'',
          'pregnantStatus_err'=>'',
          'noOfPregnant_err'=>'',
          'nextPregnant_err'=>'',
          'milkPerDay_err'=>''
        ];

        //validation
        if (empty($data['dob'])) {
          $data['dob_err'] = '*' ;
        }
        if ($data['breed']=='Select') {
          $data['breed_err'] = '*' ;
        }
        if ($data['type']=='Select') {
          $data['type_err'] = '*' ;
        }
        if (empty($data['buyDate'])) {
          $data['buyDate_err'] = '*' ;
        }
        if (empty($data['buyPrice'])) {
          $data['buyPrice_err'] = '*' ;
        }
        if (empty($data['weight'])) {
          $data['weight_err'] = '*' ;
        }
        if (empty($data['height'])) {
          $data['height_err'] = '*' ;
        }
        if (empty($data['pregnantStatus'])) {
          $data['pregnantStatus_err'] = '*' ;
        }
        if (empty($data['noOfPregnant'])) {
          $data['noOfPregnant_err'] = '*' ;
        }
        if (empty($data['nextPragnant'])) {
          $data['nextPregnant_err'] = '*' ;
        }
        if (empty($data['milkPerDay'])) {
          $data['milkPerDay_err'] = '*' ;
        }

        //if no errors
        if(empty($data['dob_err']) && empty($data['breed_err']) && empty($data['type_err']) && empty($data['buyDate_err']) && empty($data['buyPrice_err']) && empty($data['height_err']) && empty($data['pregnantStatus_err']) && empty($data['noOfPregnant_err']) && empty($data['nextPregnant_err']) && empty($data['milkPerDay_err']) ) {
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
          'breed'=>$cow->breed,
          'type'=>$cow->type,
          'buyDate'=>$cow->buy_date,
          'buyPrice'=>$cow->buy_price,
          'weight'=>$cow->weight,
          'height'=>$cow->height,
          'pregnantStatus'=>$cow->pregnant_status,
          'noOfPregnant'=>$cow->no_of_pregnant,
          'nextPregnant'=>$cow->next_pregnant,
          'milkPerDay'=>$cow->milk_per_day,

          'dob_err'=>'',
          'breed_err'=>'',
          'type_err'=>'',
          'buyDate_err'=>'',
          'buyPrice_err'=>'',
          'weight_err'=>'',
          'height_err'=>'',
          'pregnantStatus_err'=>'',
          'noOfPregnant_err'=>'',
          'nextPregnant_err'=>'',
          'milkPerDay_err'=>''
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
