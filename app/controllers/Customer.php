<?php

    class Customer extends Controller
    {
      public $customerModel;

        public function __construct()
        {
          $this->customerModel = $this->model('Customer_Model');

          if(!$_SESSION['user_email']){
            redirect('Users/login');
          }          
        }

        public function customerHome()
        {
          $productCategory= $this->customerModel->get_productCategories();

          $data = [
            'productCategory' => $productCategory
          ];
          $this->view('customer/cus_home',$data);
        }

        public function viewProductDetails($pId)
        {
          $productDetails= $this->customerModel->viewProductById($pId);

          $data = [
              'productDetails' => $productDetails
          ];

          $this->view('customer/view_product',$data);
        }

        public function buyNow(){
          $data=[];
          $this->view('customer/buy_now',$data);
        }

        public function addToCart(){
          $data=[];
          $this->view('customer/add_to_cart',$data);
        }

    }

?>

