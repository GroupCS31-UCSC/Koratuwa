<?php
  class livestock_Manager extends Controller {
    public $livestockModel;

    public function __construct() {
      $this->livestockModel = $this->model('livestock_Manager_Model');

      if(!$_SESSION['user_email']) {
        redirect('Users/login');
      } 
      elseif($_SESSION['user_type']!='Livestock Manager'){
        redirect('Users/login');
      }         
    }

    public function livestockHome()
    {
      $cattle_count = $this->livestockModel->cattleCount();
      $data = [
        'cattle_count' => $cattle_count,
      ];
      $this->view('livestock_Manager/livestock_home',$data);
    }

    public function viewCattle($ID=null) {
      $stall=$_GET['stall'] ?? 'STALL1';
    
      if($ID) {
        $cattleView= $this->livestockModel->getCattleByCowID($ID);
        if($cattleView) {
          header('Content-Type: application/json');
          echo json_encode($cattleView);
          exit();
        }
          
      } else {
        $cattleView= $this->livestockModel->get_cattleView($stall);
      }
      $cattleView= $this->livestockModel->get_cattleView($stall);

      $data = [
        'cattleView' => $cattleView,
        'stall' =>$stall
      ];
 
      $this->view('livestock_Manager/viewCattle',$data);
    }

    public function showCatttleCount() {
      $cattleCount= $this->livestockModel->getTotalCattleCount();
      $data = [
        'cattleCount' => $cattleCount
      ];

 
      $this->view('livestock_Manager/showCattleCount',$data);
    }

    public function addCattle() {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data=[
          'cowId'=>'',
          'dob'=>trim($_POST['dob']),
          'gender'=>trim($_POST['gender']),
          'breed'=>trim($_POST['breed']),
          'milking'=>trim($_POST['milking']),
          'method'=>trim($_POST['method']),
          'price'=>trim($_POST['price']),
          'stallId'=>trim($_POST['stallId']),
          // 'regDate'=>trim($_POST['regDate']),

          'dob_err'=>'',
          'gender_err'=>'',
          'breed_err'=>'',
          'milking_err'=>'',
          'method_err'=>'',
          'price_err'=>'',
          'stallId_err'=>'',
          // 'regDate_err'=>'',
        ];

        //validation
        if (empty($data['dob'])) { $data['dob_err'] = '*' ; }
        if ($data['gender']=='Select') { $data['gender_err'] = '*' ; }
        if ($data['breed']=='Select') { $data['breed_err'] = '*' ; }
        // if ($data['milking']=='Select') { $data['milking_err'] = '*' ; }
        if ($data['method']=='Select') { $data['method_err'] = '*' ; }
        // if (empty($data['price'])) { $data['price_err'] = '*' ; }
        if ($data['stallId']=='Select') { $data['stallId_err'] = '*' ; }
      
        //if no errors
        if(empty($data['dob_err']) && empty($data['gender_err']) && empty($data['breed_err']) &&/* empty($data['milking_err']) && */empty($data['method_err']) && empty($data['price_err']) && empty($data['stallId_err'])) {
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
          'milking'=>'',
          'method'=>'',
          'price'=>'',
          'stallId'=>'',
          // 'regDate'=>'',

          'dob_err'=>'',
          'gender_err'=>'',
          'breed_err'=>'',
          'milking_err'=>'',
          'method_err'=>'',
          'price_err'=>'',
          'stallId_err'=>'',
          // 'regDate_err'=>'',
        ];
        $this->view('livestock_Manager/addCattle', $data);
      }
    }

    public function updateCattle($cowId) {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data=[
          'cowId'=>$cowId,
          'breed'=>trim($_POST['breed']),
          'milking'=>trim($_POST['milking']),
          
          'breed_err'=>'',
          'milking_err'=>'',
        ];

        if ($data['breed']=='Select') { $data['breed_err'] = '*' ; }
        if ($data['milking']=='Select') { $data['milking_err'] = '*' ; }

        //if no errors
        if(empty($data['breed_err']) && empty($data['milking_err'])) {
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
          'breed'=>$cow->cow_breed,
          'milking'=>$cow->milking_status,

          'breed_err'=>'',
          'milking_err'=>''
        ];
        $this->view('livestock_Manager/updateCattle', $data);
      }
    }

    public function deleteCattle() {
      // print_r($_GET);
      $cowId = $_GET['cow_id'];
      $reason = $_GET['reason'];
      $price = $_GET['price'];
      $data =[];
      $data['cow_id'] = $cowId;
      $data['reason'] = $reason;
      if($reason == "SOLD") {
        $data['price'] = $price;
      }
      if($this->livestockModel->deleteCattle($data)) {
        flash('deleteCattle_flash','Cattle details are successfully deleted');
        redirect('livestock_Manager/viewCattle');
      }
      else {
        die('Something went wrong');
      }
    }

    //feed monitoring
    public function viewFeedMonitoring() 
    {
      if($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $from = isset($_POST['from']) ? $_POST['from'] : '';
        $to = isset($_POST['to']) ? $_POST['to'] : '';

        $feedMonitoringView= $this->livestockModel->feedMonitoring_duration($from, $to);

        $data = [
          'feedMonitoringView' => $feedMonitoringView,
          'from' => $from,
          'to' => $to
        ];
       
        $this->view('livestock_Manager/viewFeedMonitoring',$data);

      }
      else
      {
        $feedMonitoringView= $this->livestockModel->get_feedMonitoringView();

        $data = [
          'feedMonitoringView' => $feedMonitoringView,
          'from' => '',
          'to' => ''
        ];
       
        $this->view('livestock_Manager/viewFeedMonitoring',$data);
      }    

    }

    public function addFeedMonitoring() {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'feedId'=>'',
          'stallId'=>trim($_POST['stallId']),
          'solid'=>trim($_POST['solid']),
          'liquid'=>trim($_POST['liquid']),
          'remarks'=>trim($_POST['remarks']),
  
          'stallId_err'=>'',
          'solid_err'=>'',
          'liquid_err'=>'',
          'remarks_err'=>'',
        ];
  
        //validation
        if ($data['stallId']=='Select') { $data['stallId_err'] = '*' ; }
        if (empty($data['solid'])) { $data['solid_err'] = '*' ; }
        if (empty($data['liquid'])) { $data['liquid_err'] = '*' ; }
        // if (empty($data['remarks'])) { $data['remarks_err'] = '*' ; }

        //  echo '<pre>';
        // print_r($data);
        // exit;
        
        //if no errors
        if(empty($data['stallId_err']) && empty($data['solid_err']) && empty($data['liquid_err']) && empty($data['remarks_err'])) {
          $data['feedId']= $this->livestockModel->findFeedMonitoringId();

          if($this->livestockModel->addFeedMonitoring($data)) {
            flash('addFeed_flash','New feed monitoring details are successfully added!');
            redirect('Livestock_Manager/viewFeedMonitoring');
          }
          else {
            die('Something went wrong!');
          }
        }
        else {
          
          $this->view('livestock_Manager/addFeedMonitoring',$data);
        }
      }
      else {
        $data = [
          'feedId'=>'',
          'stallId'=>'',
          'solid'=>'',
          'liquid'=>'',
          'remarks'=>'',

          'stallId_err'=>'',
          'solid_err'=>'',
          'liquid_err'=>'',
          'remarks_err'=>'',
        ];
        
        $this->view('livestock_Manager/addFeedMonitoring', $data);
      }
    }

    public function updateFeedMonitoring($feedId) {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
          'feedId'=>$feedId,
          'solid'=>trim($_POST['solid']),
          'liquid'=>trim($_POST['liquid']),
          'remarks'=>trim($_POST['remarks']),
          
          'solid_err'=>'',
          'liquid_err'=>'',
          'remarks_err'=>''

        ];

        //validation
        if ($data['solid']=='Select') { $data['solid_err'] = '*' ; }
        if ($data['liquid']=='Select') { $data['liquid_err'] = '*' ; }
        // if ($data['remarks']=='Select') { $data['remarks_err'] = '*' ; }        

        // if no errors
        if(empty($data['solid_err']) && empty($data['liquid_err']) ) {
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
            'feedId' => $feedId,
            'solid' => $feedMonitoring->solid,
            'liquid' => $feedMonitoring->liquid,
            'remarks' => $feedMonitoring->remarks,

            'solid_err' => '',
            'liquid_err' => '',
            'remarks_err' => ''
        ];
        
        $this->view('livestock_Manager/updateFeedMonitoring', $data);
      }
    }

    public function deleteFeedMonitoring($feedId) {
      if($this->livestockModel->deleteFeedMonitoring($feedId)){
        flash('deleteFeed_flash','Feeding details are successfully deleted');
        redirect('livestock_Manager/viewFeedMonitoring');
      }
      else {
        die('Something went wrong');
      }
    }

    public function viewCattleMilking() 
    {
      if($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $from = isset($_POST['from']) ? $_POST['from'] : '';
        $to = isset($_POST['to']) ? $_POST['to'] : '';

        $stall=$_GET['stall'] ?? 'STALL1';
        $cattleMilkingView= $this->livestockModel->cattleMilking_duration($stall,$from, $to);
  
        $data = [
          'cattleMilkingView' => $cattleMilkingView,
          'stall' => $stall,
          'from' => $from,
          'to' => $to
        ];
  
        $this->view('livestock_Manager/viewCattleMilking',$data);
      }
      else
      {
        $stall=$_GET['stall'] ?? 'STALL1';
        $cattleMilkingView= $this->livestockModel->get_cattleMilkingView($stall);
  
        $data = [
          'cattleMilkingView' => $cattleMilkingView,
          'stall' => $stall,
          'from' => '',
          'to' => ''
        ];
  
        $this->view('livestock_Manager/viewCattleMilking',$data);
      }  

    }

    public function addCattleMilking() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $stall = $_POST['stall'];
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data2 = $this->livestockModel->get_cattleView($stall);
        
        $data= [];
        $quantity=0;
        foreach ($data2 as $key => $value) {
          $quantity = $quantity + $_POST['quantity'][$key];
          $data[]=[
            'cowId' => $value->cow_id,
            'quantity' => $_POST['quantity'][$key],

            'cowId_err' => '',
            'quantity_err' => '',
          ];
        }
          
        $result = array($data, $data2);
        $data['stall_ID']=$stall;
        $data['quantity']=$quantity;
          
        //if no errors
        if (!empty($data)) {
          if ($this->livestockModel->addCattleMilking($data)) {
            flash('addMilk_flash', 'New collect milk details are successfully added!');
            redirect('Livestock_Manager/viewCattleMilking');
          }
          else {
            die('Something went wrong!');
          }
        }
        else {
          //loading the form with the errors
          $this->view('livestock_Manager/addCattleMilking', $result);
        }
      }
      else {
        $stall = $_GET['Stall'] ?? 'STALL1';
        $data2 = $this->livestockModel->get_cattleView($stall);
        
        $data= [];
        foreach ($data2 as $key => $value) {
          $data[]=[
            'cowId' => '',
            'quantity' => '',

            'cowId_err' => '',
            'quantity_err' => '',
          ];
        }
  
        $result = array($data, $data2);
        $this->view('livestock_Manager/addCattleMilking', $result);
      }
    }

    public function updateCattleMilking($milkId) {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
          'milkId'=>$milkId,
          // 'milkId'=>trim($_POST['milkId']),
          // 'cowId'=>trim($_POST['cowId']),
          'quantity'=>trim($_POST['quantity']),
          // 'remarks'=>trim($_POST['remarks']),
          

          // 'cowId_err'=>'',
          'quantity_err'=>'',
          // 'remarks_err'=>''
        ];

        //validation
        // if (empty($data['cowId'])) {
        //   $data['cowId_err'] = '*' ;
        // }
        if (empty($data['quantity'])) { $data['quantity_err'] = '*' ; }
        // if (empty($data['remarks'])) { $data['remarks_err'] = '*' ; }

        // if no errors
        if(/*empty($data['cowId_err']) && */empty($data['quantity_err'])) {
          if($this->livestockModel->updateCattleMilking($data)) {
            flash('updateMilk_flash','New collect milk details are successfully Updated!');
            redirect('Livestock_Manager/viewMilking');
          }
          else {
            die('Something went wrong!');
          }
        }
        else {
          //loading the form with the errors
          $this->view('livestock_Manager/updateMilking',$data);
        }
      }
      else {
        $cattleMilking = $this->livestockModel->getcattleMilkingById($milkId);

        $data = [
            'milkId' => $milkId,
            // 'cowId' => $vaccination->cow_id,
            'quantity' => 
            $cattleMilking->quantity,
            // 'remarks' => $cattleMilking->remarks,

            // 'cowId_err' => '',
            'quantity_err' => '',
            'remarks_err' => ''

        ];

        $this->view('livestock_Manager/updateCattleMilking', $data);
      }
    }

    public function deleteCattleMilking($milkId) {
      if($this->livestockModel->deleteCattleMilking($milkId)){
        flash('deletemilk_flash','Collect milk details are successfully deleted');
        redirect('livestock_Manager/viewCattleMilking');
      }
      else {
        die('Something went wrong');
      }
    }

    public function showCattleCount() {
      $cattleCount = $this->livestockModel->get_cattleCount();
    }
  }

?>
