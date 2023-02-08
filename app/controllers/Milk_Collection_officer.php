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

        //redirect to the admin Home page
        public function mcoHome()
        {
          $data = [];
          $this->view('milk_collection_officer/mco_home',$data);
        }


        
    }

?>
