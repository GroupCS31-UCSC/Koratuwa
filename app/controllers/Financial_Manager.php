<?php

    class Financial_Manager extends Controller
    {
      public $financialManagerModel;

        public function __construct()
        {
          $this->financialManagerModel = $this->model('Financial_Manager_Model');

          if(!$_SESSION['user_email']){
            redirect('Users/login');
          }          
        }


        #fmHome
    }

?>
