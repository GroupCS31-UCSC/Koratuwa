<?php

    class Supplier extends Controller
    {
      public $supplierModel;

        public function __construct()
        {
          $this->supplierModel = $this->model('Supplier_Model');

          if(!$_SESSION['user_email']){
            redirect('Users/login');
          }   
          elseif($_SESSION['user_type']!='Supplier'){
            redirect('Users/login');
          }       
        }

        // public function supplierHome()
        // {
        //   $data = [];
        //   $this->view('supplier/sup_home',$data);
        // }

        // public function placeSupply()
        // {
        //   if($_SERVER['REQUEST_METHOD'] == 'POST')
        //   {
        //     $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //     $data = [
        //       'supOrderId' => '',
        //       'quantity' => trim($_POST['quantity']),
        //       'date' => trim($_POST['date']),
        //       'address' => trim($_POST['address']),
        //       'status' => 'Not Collected',    //initial set value;later can be change
        //       'price' => '100',   //temp set value

        //       'quantity_err' => '',
        //       'date_err' => '',
        //       'address_err' => ''
        //     ];

        //     //validation
        //     if (empty($data['quantity'])){
        //       $data['quantity_err'] = '*' ;
        //     }
        //     elseif ($data['quantity'] <10) {
        //       $data['quantity_err'] = 'Required minimum 10L to place an Order' ;
        //     }

        //     if (empty($data['date'])){
        //       $data['date_err'] = '*' ;
        //     }
        //     elseif (strtotime($data['date']) < strtotime(date('y-m-d')))  {
        //       $data['date_err'] = 'Invalid date' ;
        //     }

        //     if (empty($data['address']))  { $data['address_err'] = '*' ; }

        //     //if no errors
        //     if(empty($data['quantity_err']) && empty($data['date_err']) && empty($data['address_err']) )
        //     {
        //       $data['supOrderId']=$this->supplierModel->findSupOrderId();

        //       if($this->supplierModel->placeSupply($data))
        //       {
        //         flash('placeSupply_flash','Supply Order is successfully placed!');
        //         redirect('Supplier/viewSupply');
        //       }
        //       else
        //       {
        //         die('Something went wrong!');
        //       }
        //     }
        //     else
        //     {
        //       //loading the form with the errors
        //       $this->view('supplier/placeSupply',$data);
        //     }
        //   }
        //   else
        //   {
        //     //initial form loading
        //     $data = [
        //       'supOrderId' => '',
        //       'quantity' => '',
        //       'date' => '',
        //       'address' => '',
        //       'status' => '',
        //       'price' => '',  //temp set value

        //       'quantity_err' => '',
        //       'date_err' => '',
        //       'address_err' => ''
        //     ];
        //     $this->view('supplier/placeSupply',$data);
        //   }
        // }
        public function supplierHome()
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
              'supply_order_id' => '',
              'quantity' => trim($_POST['quantity']),
              'date' => '',
              'time' => '',
              'supplying_address' => 'dfr,gbh,lkjabc',
              'status' => 'Not Collected',   //initial set value;later can be change
              'density' => '',
              'quality' => 'N/A',
              'unit_price' => '100',   //temp set value
              'total_payment' =>'',
              'supplier_id ' =>'',
              'invoice_id' =>'',
              

              'quantity_err' => '',
              'date_err' => '',
              'address_err' => ''
            ];

            //validation
            if (empty($data['quantity'])){
              $data['quantity_err'] = '*' ;
            }
            elseif ($data['quantity'] <10) {
              $data['quantity_err'] = 'Required minimum 10L to place an Order' ;
            }

            // if (empty($data['date'])){
            //   $data['date_err'] = '*' ;
            // }
            // elseif (strtotime($data['date']) < strtotime(date('y-m-d')))  {
            //   $data['date_err'] = 'Invalid date' ;
            // }

            // if (empty($data['address']))  { $data['address_err'] = '*' ; }

            //if no errors
            if(empty($data['quantity_err']))
            {
              $data['supOrderId']=$this->supplierModel->findSupOrderId();
              $data['invoice_id'] = $this->supplierModel->generateInvoiceId();

              if($this->supplierModel->placeSupply($data))
              {
                flash('placeSupply_flash','Supply Order is successfully placed!');
                redirect('Supplier/viewSupply');
              }
              else
              {
                die('Something went wrong!');
              }
            }
            else
            {
              //loading the form with the errors
              $this->view('supplier/sup_home',$data);
            }
          }
          else
          {
            //initial form loading
            $data = [
              'supOrderId' => '',
              'quantity' => '',
           

              'quantity_err' => '',
              'date_err' => '',
              'address_err' => ''
            ];
            $this->view('supplier/sup_home',$data);
          }
        }


        public function viewSupply()
        {
          $supOrderView= $this->supplierModel->get_supOrderView();
          $supOrdSum= $this->supplierModel->get_supOrderSum();
          $ordSum= strval($supOrdSum);

          $data = [
              'supOrderView' => $supOrderView,
              'ordSum'=> $ordSum
           ];

          $this->view('supplier/viewSupply',$data);

        }



        public function updateSupOrder($supOrdId)
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
              'supOrderId' => $supOrdId,
              'quantity' => trim($_POST['quantity']),
              'date' => trim($_POST['date']),
              'address' => trim($_POST['address']),

              'quantity_err' => '',
              'date_err' => '',
              'address_err' => ''
            ];

            //validation
            if (empty($data['quantity'])){
              $data['quantity_err'] = '*' ;
            }
            elseif ($data['quantity'] <10) {
              $data['quantity_err'] = 'Required minimum 10L to place an Order' ;
            }

            if (empty($data['date'])){
              $data['date_err'] = '*' ;
            }
            elseif (strtotime($data['date']) < strtotime(date('y-m-d')))  {
              $data['date_err'] = 'Invalid date' ;
            }

            if (empty($data['address']))     { $data['address_err'] = '*' ; }

            //if no errors
            if(empty($data['quantity_err']) && empty($data['date_err']) && empty($data['address_err']) )
            {

              if($this->supplierModel->updateSupply($data))
              {
                flash('updateSupply_flash','Supply Order is successfully Updated!');
                redirect('Supplier/viewSupply');
              }
              else
              {
                die('Something went wrong!');
              }
            }
            else
            {
              //loading the form with the errors
              $this->view('supplier/updateSupply',$data);
            }
          }
          else
          {
            $supOrd = $this->supplierModel->getSupplyById($supOrdId);

            $data = [
              'supOrderId' => $supOrd->supply_order_id,
              'quantity' => $supOrd->quantity,
              'date' => $supOrd->supply_date,
              'address' => $supOrd->supplying_address,

              'quantity_err' => '',
              'date_err' => '',
              'address_err' => ''
            ];
            $this->view('supplier/updateSupply',$data);
          }
        }




        public function deleteSupOrder($supOrdId)
        {
          if($this->supplierModel->dltSupOrder($supOrdId))
          {
            flash('dltSupOrder_flash','Supply Order is successfully deleted');
            redirect('Supplier/viewSupply');
          }
          else
          {
            die('Something went wrong');
          }
        }

        // Load supplier income page
        public function sup_income()
        {
          $data = [];
          $this->view('supplier/sup_income',$data);
        }

        //Load Supplier feedback
        // public function sup_feedback()
        // {
        //   $data = [];
        //   $this->view('supplier/sup_feedback',$data);
        // }
//-----------------------------------------------------------------------
        public function sup_feedback()
        {
          
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
              'feedback_id' => '',
              'supplier_id' => '',
              // 'sup_name' => '',
              'date' => '',
              'time' => '',
              'feedback' => trim($_POST['feedback']),

              'feedback_err' => '',

            ];

            //validation
            if (empty($data['feedback'])){
              $data['feedback_err'] = '*' ;
            }

            //if no errors
            if(empty($data['feedback_err']))
            {
              $data['feedback_id'] = $this->supplierModel->generateFeedbackId();
              // $data['supplier_Id']=$this->supplierModel->findSupId();
              
              if($this->supplierModel->supFeedback($data))
              {
                
                redirect('Supplier/sup_feedback');
              }
              else
              {
                die('Something went wrong!');
              }

            }
            else
            {
              //loading the form with the errors
              $this->view('supplier/sup_feedback',$data);
            }
          }
          else
          {
            
            $supFeedback = $this->supplierModel->viewFeedback();

            //initial form loading
            $data = [
              'feedback_id' => '',
              'supplier_id' => '',
              // 'sup_name' => '',
              'date' => '',
              'time' => '',
              'feedback' => '',
              'supFeedback' => $supFeedback,

              'feedback_err' => '',

            ];
            $this->view('supplier/sup_feedback',$data);
          }
        }
        //----------Download PDF--------------/
        public function DownloadInv(){
          $data = [];




          $this->view('supplier/downloadInvoice', $data);
        }

        //---------view order invoice-----------/
        public function viewOrder($ordId){

          $orderView = $this->supplierModel->viewOrd($ordId);

          $data = [
            'supply_order_id ' =>'',
            'supply_date' =>'',
            'quantity' =>'',
          ];

          $this->view('supplier/viewSupply', $data);
        }


    }

?>
