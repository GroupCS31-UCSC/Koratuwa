<?php

    class Product_Manager extends Controller
    {
      public $pmModel;

        public function __construct()
        {
          $this->pmModel = $this->model('Product_Manager_Model'); //instatiate the model

          if(!$_SESSION['user_email']){
            redirect('Users/login');
          }  
          elseif($_SESSION['user_type']!='Product Manager'){
            redirect('Users/login');
          }        
        }

      //   public function index() {
      //     $model = new Model();
      //     $options = $model->getOptions();
  
      //     require_once 'views/index.php';
      // }

        public function pmHome()
        {
          $product_count = $this->pmModel->get_productsCount();
          $notify = $this->pmModel->get_Notifications();

          $data = [
            'product_count' => $product_count,
            'notifications' => $notify
          ];

          $this->view('product_manager/pm_home',$data);
        }

        //update seen notifications
        public function updateNotifyStatus($pId)
        {
          if($this->pmModel->update_notifyStatus($pId))
          {
            redirect('Product_Manager/pmHome');
          }
          else
          {
            die('Something went wrong');
          }    


        }

        public function addCategory()
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
           

            $chk ="";
            if(isset($_POST['ingredients'])){
              $checkbox = $_POST['ingredients'];

              foreach($checkbox as $chk1){
                $chk .= $chk1.", ";
              }
            }

              //uploading the image
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];

            if ($error == 0) {

              $fileType = pathinfo($file_name, PATHINFO_EXTENSION);
              $fileType_lc = strtolower($fileType);
      
              $allowedFileTypes = array("jpg", "jpeg", "png");
      
              if (in_array($fileType, $allowedFileTypes)) {
      
                  $new_img_name = uniqid("IMG-", true) . '.' . $fileType_lc;
                  $img_upload_path = APPROOT . '/../public/img/uploads/' . $new_img_name;
                  move_uploaded_file($tmp_name, $img_upload_path);                  
              }
          } 

            $data=[
              'pId'=>'',
              'duration_months'=>trim($_POST['duration_months']),
              'name'=>trim($_POST['name']),
              'duration'=>trim($_POST['duration']),
              'size'=>trim($_POST['size']),
              'price'=>trim($_POST['price']),
              'ingredients'=>$chk,
              'image'=> $new_img_name,
              'name_err'=>'',
              'duration_err'=>'',
              'size_err'=>'',
              'price_err'=>'',
              'ingredients_err'=>'',
              'image_err'=>'',
              'duration_months_err'=>''
            ];

            //validation
            if (empty($data['name']))        { $data['name_err'] = '*' ;  }
            if (empty($data['duration']) || empty($data['duration_months']))     { $data['duration_err'] = '*' && $data['duration_months_err'] = '*' ; }
            if (empty($data['size']))         { $data['size_err'] = '*' ; }
            if (empty($data['price']))        { $data['price_err'] = '*' ; }
            if (empty($data['ingredients']))  { $data['ingredients_err'] = '*' ; }
            if (empty($data['image']))        { $data['image_err'] = '*' ; }

            

            //if no errors
            if(empty($data['name_err']) && empty($data['size_err'])&& empty($data['price_err']) && empty($data['ingredients_err']) && empty($data['image_err']) )
            {
              $data['pId']= $this->pmModel->findProductId();

              if($this->pmModel->addCategory($data))
              {
                flash('addCategory_flash','New Product is successfully added!');
                redirect('Product_Manager/productCategories');
              }
              else
              {
                die('Something went wrong!');
              }
            }
            else
            {
              //loading the form with the errors
              $this->view('product_manager/addCategory',$data);
            }
          }
          else
          {
            //initial form loading before the inputs are given
            $data=[
              'pId'=>'',
              'name'=>'',
              'duration'=>'',
              'duration_months'=>'',
              'size'=>'',
              'price'=>'',
              'ingredients'=>'',
              'image'=>'',

              'name_err'=>'',
              'duration_err'=>'',
              'size_err'=>'',
              'price_err'=>'',
              'ingredients_err'=>'',
              'image_err'=>'',
              'duration_months_err'=> ''
            ];
            $this->view('product_manager/addCategory', $data);

          }
        }

        public function addStock($pId)
        {
          $expireDays = $this->pmModel->getProductExpireDays($pId);
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            
            $expireSeconds = $expireDays * 86400;
            
            $expireDate = date('Y-m-d', strtotime($_POST['mfd']) + $expireSeconds);
            // $expireDateString = date_format($expireDate, 'Y-m-d');
            $data=[

              'sId'=>'',
              'pId'=>trim($pId),
              'qty'=>trim($_POST['qty']),
              'mfd'=>trim($_POST['mfd']),
              'exp'=>$expireDate,
              
              
              'pId_err'=>'',
              'qty_err'=>'',
              'mfd_err'=>'',
              'exp_err'=>''
            ];

            //validation
            if (empty($data['pId']))        { $data['pId_err'] = '*' ; }
            if (empty($data['qty']))        { $data['qty_err'] = '*' ; }
            if (empty($data['mfd']))        { $data['mfd_err'] = '*' ; }
            if (empty($data['exp']))        { $data['exp_err'] = '*' ; }
            
            // $result = array($data,$data2);
            

            //if no errors
            if(empty($data['pId_err']) && empty($data['qty_err']) && empty($data['mfd_err']) && empty($data['exp_err'])  )
            {
              $data['sId']= $this->pmModel->findStockId();

              if($this->pmModel->addStock($data))
              {
                flash('addCategory_flash','New Category Stock details are successfully added!');
                redirect('Product_Manager/viewCategory/'.$pId);
              
              }
              else
              {
                die('Something went wrong!');
              }
            }
            else
            {
              //loading the form with the errors
              $this->view('product_manager/addStock',$data);
            }
          }
          else
          {
            // $data2 = $this->pmModel->getProductCategoryDetails();
            //initial form loading
            $data=[
              'sId'=>'',
              'pId'=>$pId,
              'qty'=>'',
              'mfd'=>'',
              'exp'=>'',
              

              'pId_err'=>'',
              'qty_err'=>'',
              'mfd_err'=>'',
              'exp_err'=>''
            ];

            // $result = array($data,$data2);

            $this->view('product_manager/addStock', $data);

          }
        }

        public function updateCategory($pId)
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {          
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];

            if ($error == 0) {

              $fileType = pathinfo($file_name, PATHINFO_EXTENSION);
              $fileType_lc = strtolower($fileType);
      
              $allowedFileTypes = array("jpg", "jpeg", "png");
      
              if (in_array($fileType, $allowedFileTypes)) {
      
                  $new_img_name = uniqid("IMG-", true) . '.' . $fileType_lc;
                  $img_upload_path = APPROOT . '/../public/img/Uploads/' . $new_img_name;
                  move_uploaded_file($tmp_name, $img_upload_path);                  
              }
          }
            $data=[
              'pId'=>$pId,
              // 'name'=>trim($_POST['name']),
              // 'duration'=>trim($_POST['duration']),
              // 'size'=>trim($_POST['size']),
              'price'=>trim($_POST['price']),
              // 'ingredients'=>trim($_POST['ingredients']),
              'image'=>$new_img_name,

              // 'name_err'=>'',
              // 'duration_err'=>'',
              // 'size_err'=>'',
              'price_err'=>'',
              // 'ingredients_err'=>'',
              'image_err'=>''
            ];

            //validation
            // if (empty($data['name']))        { $data['name_err'] = '*' ;  }
            // if (empty($data['duration']))     { $data['duration_err'] = '*' ; }
            // if (empty($data['size']))         { $data['size_err'] = '*' ; }
            if (empty($data['price']))        { $data['price_err'] = '*' ; }
            // if (empty($data['ingredients']))  { $data['ingredients_err'] = '*' ; }
            if (empty($data['image']))        { $data['image_err'] = '*' ; }


            //if no errors
            if( empty($data['price_err']) && empty($data['image_err']) )
            {
              if($this->pmModel->updateCategory($data))
              {
                flash('updateCategory_flash','New Product Category details are successfully Updated!');
                //redirection
                $category= $this->pmModel->viewCategorybyId($pId);
                $expireDays = $this->pmModel->getProductExpireDays($pId);
                // $category= $this->pmModel->viewCategorybyId($pId);         //the result set returned by the model is sent to category
                 $productStock= $this->pmModel->getProductStockDetailsForProduct($pId);   //for filteration

                $data = [
                   
                'category' => $category,
                'productStock' => $productStock,
                'expireDays' => $expireDays,
                'from' => '',
                'to' => '',

                ];

                $this->view('product_manager/viewCategory',$data);

              }
              else
              {
                die('Something went wrong!');
              }
            }
            else
            {
              //loading the form with the errors
              $this->view('product_manager/updateCategory',$data);
            }
          }
          else
          {
            $category = $this->pmModel->getCategorybyId($pId);
            $data=[
              'pId'=>$category->product_id,
              // 'name'=>$category->product_name,
              // 'duration'=>$category->expiry_duration,
              // 'size'=>$category->size,
              'price'=>$category->unit_price,
              // 'ingredients'=>$category->ingredients,
              'image'=>$category->image,

              // 'name_err'=>'',
              // 'duration_err'=>'',
              // 'size_err'=>'',
              'price_err'=>'',
              // 'ingredients_err'=>'',
              'image_err'=>''
            ];
            $this->view('product_manager/updateCategory', $data);

          }
        }



        public function viewCategory($pId)
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $from = isset($_POST['from']) ? $_POST['from'] : '';
            $to = isset($_POST['to']) ? $_POST['to'] : '';

            $expireDays = $this->pmModel->getProductExpireDays($pId);
            $category= $this->pmModel->viewCategorybyId($pId);         //the result set returned by the model is sent to category
            $productStock= $this->pmModel->ProductStockDetails_duration($pId, $from, $to);   //for filteration
            $data = [
                'category' => $category,
                'productStock' => $productStock,
                'expireDays' => $expireDays,
                'from' => $from,
                'to' => $to
            ];
  
            $this->view('product_manager/viewCategory',$data);
          }
          else
          {
            $expireDays = $this->pmModel->getProductExpireDays($pId);
            $category= $this->pmModel->viewCategorybyId($pId);         //the result set returned by the model is sent to category
            $productStock= $this->pmModel->getProductStockDetailsForProduct($pId);
            $data = [
                'category' => $category,
                'productStock' => $productStock,
                'expireDays' => $expireDays,
                'from' => '',
                'to' => ''
            ];
  
            $this->view('product_manager/viewCategory',$data);
          }  
;
        }

     

        public function productCategories()
        {
          $categoryView= $this->pmModel->get_categoryView();  ////the result set returned by the model the data from the product table

          $data = [
              'categoryView' => $categoryView
          ];

          $this->view('product_manager/productCategories',$data);
      
        }

    

        public function viewStock()
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $from = isset($_POST['from']) ? $_POST['from'] : '';
            $to = isset($_POST['to']) ? $_POST['to'] : '';
            
            $stockView= $this->pmModel->ProductStock_duration($from, $to);
            $availableQty= $this->pmModel->get_availableQtyView();

            $data = [
                'stockView' => $stockView,
                'availableQty' => $availableQty,
                'from' => $from,
                'to' => $to
            ];

            $this->view('product_manager/viewStock',$data);


          }
          else
          {
            $stockView= $this->pmModel->getProductStockDetails();
            $availableQty= $this->pmModel->get_availableQtyView();

            $data = [
                'stockView' => $stockView,
                'availableQty' => $availableQty,
                'from' => '',
                'to' => ''
            ];

            $this->view('product_manager/viewStock',$data);

          }
          
        }


        public function deleteCategory($pId)
        {
          if($this->pmModel->deleteCategory($pId))
          {
            flash('deleteCategory_flash','Category details are successfully deleted');
            redirect('Product_Manager/productCategories');
          }
          else
          {
            die('Something went wrong');
          }
        }

       


    }

?>