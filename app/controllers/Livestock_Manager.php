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
          'height'=>trim($_POST['height']),
          'health'=>trim($_POST['health']),
          'method'=>trim($_POST['method']),
          // 'regDate'=>trim($_POST['regDate']),

          'dob_err'=>'',
          'gender_err'=>'',
          'breed_err'=>'',
          'weight_err'=>'',
          'height_err'=>'',
          'health_err'=>'',
          'method_err'=>'',
          // 'regDate_err'=>'',
        ];

        //validation
        if (empty($data['dob'])) { $data['dob_err'] = '*' ; }
        if ($data['gender']=='Select') { $data['gender_err'] = '*' ; }
        if ($data['breed']=='Select') { $data['breed_err'] = '*' ; }
        if (empty($data['weight'])) { $data['weight_err'] = '*' ; }
        if (empty($data['height'])) { $data['height_err'] = '*' ; }
        if (empty($data['health'])) { $data['health_err'] = '*' ; }
        if ($data['method']=='Select') { $data['method_err'] = '*' ; }
        // if (empty($data['regDate'])) { $data['regDate_err'] = '*' ; }

        //if no errors
        if(empty($data['dob_err']) && empty($data['gender_err']) && empty($data['breed_err']) && empty($data['weight_err']) && empty($data['height_err']) && empty($data['health_err']) && empty($data['method_err']) /*&& empty($data['regDate_err']) */) {
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
          'height'=>'',
          'health'=>'',
          'method'=>'',
          // 'regDate'=>'',

          'dob_err'=>'',
          'gender_err'=>'',
          'breed_err'=>'',
          'weight_err'=>'',
          'height_err'=>'',
          'health_err'=>'',
          'method_err'=>'',
          // 'regDate_err'=>'',
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
          // 'dob'=>trim($_POST['dob']),
          // 'gender'=>trim($_POST['gender']),
          // 'breed'=>trim($_POST['gender']),
          'weight'=>trim($_POST['weight']),
          'height'=>trim($_POST['height']),
          // 'health'=>trim($_POST['health']),

          // 'dob_err'=>'',
          // 'gender_err'=>'',
          // 'breed_err'=>'',
          'weight_err'=>'',
          'height_err'=>'',
          // 'health_err'=>'',
        ];

        //validation
        // if (empty($data['dob'])) {
        //   $data['dob_err'] = '*' ;
        // }
        // if ($data['gender']=='Select') {
        //   $data['gender_err'] = '*' ;
        // }
        // if ($data['breed']=='Select') {
        //   $data['breed_err'] = '*' ;
        // }
        if (empty($data['weight'])) {
          $data['weight_err'] = '*' ;
        }
        if (empty($data['height'])) {
          $data['height_err'] = '*' ;
        }
        if (empty($data['health'])) {
          $data['pregnantStatus_err'] = '*' ;
        }
        // if (empty($data['health'])) {
        //   $data['health_err'] = '*' ;
        // }

        //if no errors
        if(/*empty($data['dob_err']) && empty($data['gender_err']) && empty($data['breed_err']) && */empty($data['weight_err']) && empty($data['height_err'])/* && empty($data['health_err'])*/ ) {
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
          // 'dob'=>$cow->dob,
          // 'gender'=>$cow->cow_breed,
          // 'breed'=>$cow->cow_type,
          'weight'=>$cow->weight,
          'height'=>$cow->height,
          // 'health'=>$cow->health,

          // 'dob_err'=>'',
          // 'gender_err'=>'',
          // 'breed_err'=>'',
          'weight_err'=>'',
          'height_err'=>'',
          // 'health_err'=>''
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
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data2 = $this->livestockModel->get_cattleView();
        $data = [
          'feedId'=>'',
          'cowId'=>trim($_POST['cowId']),
          'feedItem'=>trim($_POST['feedItem']),
          'feedQuantity'=>trim($_POST['feedQuantity']),
          'note'=>trim($_POST['note']),
  
          'cowId_err'=>'',
          'feedItem_err'=>'',
          'feedQuantity_err'=>'',
          'note_err'=>'',
        ];
  
        //validation
        if (empty($data['cowId'])) {
          $data['cowId_err'] = '*' ;
        }
        if (empty($data['feedItem'])) {
          $data['feedItem_err'] = '*' ;
        }
        if (empty($data['feedQuantity'])) {
          $data['feedQuantity_err'] = '*' ;
        }
        if (empty($data['note'])) {
          $data['note_err'] = '*' ;
        }
  
        $result = array($data,$data2);
        //if no errors
        if(empty($data['cowId_err']) && empty($data['feedItem_err']) && empty($data['feedQuantity_err']) && empty($data['note_err']) ) {
          $data['feedId'] = $this->livestockModel->findFeedMonitoringId();

          if($this->livestockModel->addFeedMonitoring($data)) {
            flash('addFeed_flash','New feed monitoring details are successfully added!');
            redirect('Livestock_Manager/viewFeedMonitoring');
          }
          else {
            die('Something went wrong!');
          }
        }
        else {
          //loading the form with the errors
          $this->view('livestock_Manager/addFeedMonitoring',$result);
        }
      }
      else {
        $data2 = $this->livestockModel->get_cattleView();
        $data = [
          'feedId'=>'',
          'cowId'=>'',
          'feedItem'=>'',
          'feedQuantity'=>'',
          'note'=>'',
  
          'cowId_err'=>'',
          'feedItem_err'=>'',
          'feedQuantity_err'=>'',
          'note_err'=>'',
        ];
        $result = array($data,$data2);
        $this->view('livestock_Manager/addFeedMonitoring', $result);
      }
    }
    public function updateFeedMonitoring($feedId) {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
          'feedId'=>trim($_POST['feedId']),
          // 'cowId'=>trim($_POST['cowId']),
          'feedItem'=>trim($_POST['feedItem']),
          'feedQuantity'=>trim($_POST['feedQuantity']),
          'note'=>trim($_POST['note']),

          // 'cowId_err'=>'',
          'feedItem_err'=>'',
          'feedQuantity_err'=>'',
          'note_err'=>'',
        ];

        //validation
        // if ($data['cowId']=='Select') {
        //   $data['cowId_err'] = '*' ;
        // }
        if ($data['feedItem']=='Select') {
          $data['feedItem_err'] = '*' ;
        }
        if (empty($data['feedQuantity'])) {
          $data['feedQuantity_err'] = '*' ;
        }
        if (empty($data['note'])) {
          $data['note_err'] = '*' ;
        }

        // if no errors
        if(/*empty($data['cowId_err']) && */empty($data['feedItem_err']) && empty($data['feedQuantity_err']) && empty($data['note_err']) ) {
          if($this->livestockModel->updateFeedMonitoring($data)) {
            flash('updateFeed_flash','New feed monitoring details are successfully Updated!');
            redirect('Livestock_Manager/viewFeedMonitoring');
          }
          else {
            die('Something went wrong!');
          }
        }
        else {
          //loading the form with the errors
          $this->view('livestock_Manager/updateFeedMonitoring',$data);
        }
      }
      else {
        $feedMonitoring = $this->livestockModel->getFeedMonitoringById($feedId);

        $data = [
            'feedId' => $feedMonitoring->feed_id,
            // 'cowId' => $feedMonitoring->cow_id,
            'feedItem' => $feedMonitoring->feed_item,
            'feedQuantity' => $feedMonitoring->feed_quantity,
            'note' => $feedMonitoring->note,
            // 'cowId_err' => '',
            'feedItem_err' => '',
            'feedQuantity_err' => '',
            'note_err' => ''
        ];
        
        // $cattle = $this->livestockModel->getCattleById($feedMonitoring->cow_id);

        // $data2 = [
        //     'cattle' => $cattle
        // ];

        // $result = array($data, $data2);

        $this->view('livestock_Manager/updateFeedMonitoring', $data);
      }
    }

    public function viewVaccination() {
      $vaccinationView= $this->livestockModel->get_vaccinationView();

      $data = [
        'vaccinationView' => $vaccinationView
      ];

      $this->view('livestock_Manager/viewVaccination',$data);
    }

    public function addVaccination() {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data2 = $this->livestockModel->get_cattleView();
        $data = [
          'vaccId'=>'',
          'cowId'=>trim($_POST['cowId']),
          'vaccinationType'=>trim($_POST['vaccinationType']),
          'vaccinationQuantity'=>trim($_POST['vaccinationQuantity']),
          'note'=>trim($_POST['note']),
  
          'cowId_err'=>'',
          'vaccinationType_err'=>'',
          'vaccinationQuantity_err'=>'',
          'note_err'=>'',
        ];

        //validation
        if (empty($data['cowId'])) {
          $data['cowId_err'] = '*' ;
        }
        if (empty($data['vaccinationType'])) {
          $data['vaccinationType_err'] = '*' ;
        }
        if (empty($data['vaccinationQuantity'])) {
          $data['vaccinationQuantity_err'] = '*' ;
        }
        if (empty($data['note'])) {
          $data['note_err'] = '*' ;
        }

        $result = array($data,$data2);
        //if no errors
        if(empty($data['cowId_err']) && empty($data['vaccinationType_err']) && empty($data['vaccinationQuantity_err']) && empty($data['note_err']) ) {
          $data['vaccId'] = $this->livestockModel->findVaccinationId();
          
          if($this->livestockModel->addVaccination($data)) {
            flash('addVaccination_flash','New vaccination details are successfully added!');
            redirect('Livestock_Manager/viewVaccination');
          }
          else {
            die('Something went wrong!');
          }
        }
        else {
          //loading the form with the errors
          $this->view('livestock_Manager/addVaccination',$result);
        }
      }
      else {
        $data2 = $this->livestockModel->get_cattleView();
        $data = [
          'vaccId'=>'',
          'cowId'=>'',
          'vaccinationType'=>'',
          'vaccinationQuantity'=>'',
          'note'=>'',

          'cowId_err'=>'',
          'vaccinationType_err'=>'',
          'vaccinationQuantity_err'=>'',
          'note_err'=>'',
        ];
        $result = array($data,$data2);
        $this->view('livestock_Manager/addVaccination', $result);
      }
    }
    
    public function updateVaccination($vaccId) {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
          'vaccId'=>trim($_POST['vaccId']),
          // 'cowId'=>trim($_POST['cowId']),
          'vaccinationType'=>trim($_POST['vaccinationType']),
          'vaccinationQuantity'=>trim($_POST['vaccinationQuantity']),
          'note'=>trim($_POST['note']),

          // 'cowId_err'=>'',
          'vaccinationType_err'=>'',
          'vaccinationQuantity_err'=>'',
          'note_err'=>'',
        ];

        //validation
        // if (empty($data['cowId'])) {
        //   $data['cowId_err'] = '*' ;
        // }
        if ($data['vaccinationType'] == 'Select') {
          $data['vaccinationType_err'] = '*' ;
        }
        if (empty($data['vaccinationQuantity'])) {
          $data['vaccinationQuantity_err'] = '*' ;
        }
        if (empty($data['note'])) {
          $data['note_err'] = '*' ;
        }

        // if no errors
        if(/*empty($data['cowId_err']) && */empty($data['vaccinationType_err']) && empty($data['vaccinationQuantity_err']) && empty($data['note_err']) ) {
          if($this->livestockModel->updateVaccination($data)) {
            flash('updateVaccination_flash','New vaccination details are successfully Updated!');
            redirect('Livestock_Manager/viewVaccination');
          }
          else {
            die('Something went wrong!');
          }
        }
        else {
          //loading the form with the errors
          $this->view('livestock_Manager/updateVaccination',$data);
        }
      }
      else {
        $vaccination = $this->livestockModel->getVaccinationById($vaccId);

        $data = [
            'vaccId' => $vaccination->vaccination_id,
            // 'cowId' => $vaccination->cow_id,
            'vaccinationType' => $vaccination->vaccination_type,
            'vaccinationQuantity' => $vaccination->vaccination_quantity,
            'note' => $vaccination->note,
            // 'cowId_err' => '',
            'vaccinationType_err' => '',
            'vaccinationQuantity_err' => '',
            'note_err' => ''
        ];

        $this->view('livestock_Manager/updateVaccination', $data);
      }
    }
  }

?>
