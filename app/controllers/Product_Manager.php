<?php

    class Product_Manager extends Controller
    {
      public $pmModel;

        public function __construct()
        {
          $this->pmModel = $this->model('Product_Manager_Model');

          if(!$_SESSION['user_email']){
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
          $data = [];
          $this->view('product_manager/pm_home',$data);
        }

        public function analyze()
        {
          $data = [];
          $this->view('product_manager/analyze',$data);
        }


        public function addCategory()
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
           

            // if(!empty($_FILES["image"]["name"])) { 
            //   // Get file info 
            //   $fileName = basename($_FILES["image"]["name"]); 
            //   $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
               
            //   // Allow certain file formats 
            //   $allowTypes = array('jpg','png','jpeg','gif'); 
            //   if(in_array($fileType, $allowTypes)){ 
            //       $image = $_FILES['image']['tmp_name']; 
            //       $imgContent = addslashes(file_get_contents($image)); 
            //   }
            // }

              
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
              'name'=>trim($_POST['name']),
              'cost'=>trim($_POST['cost']),
              'price'=>trim($_POST['price']),
              'ingredients'=>trim($_POST['ingredients']),
              'image'=> $new_img_name,
              'name_err'=>'',
              'cost_err'=>'',
              'price_err'=>'',
              'ingredients_err'=>'',
              'image_err'=>''
            ];

            //validation
            if (empty($data['name']))        { $data['name_err'] = '*' ;  }
            if (empty($data['cost']))     { $data['cost_err'] = '*' ; }
            if (empty($data['price']))     { $data['price_err'] = '*' ; }
            if (empty($data['ingredients']))        { $data['ingredients_err'] = '*' ; }
            if (empty($data['image']))        { $data['image_err'] = '*' ; }

            

            //if no errors
            if(empty($data['name_err']) && empty($data['cost_err']) && empty($data['price_err']) && empty($data['ingredients_err']) && empty($data['image_err']) )
            {
              $data['pId']= $this->pmModel->findProductId();

              if($this->pmModel->addCategory($data))
              {
                flash('addCategory_flash','New Product Category details are successfully added!');
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
            //initial form loading
            $data=[
              'pId'=>'',
              'name'=>'',
              'cost'=>'',
              'price'=>'',
              'ingredients'=>'',
              'image'=>'',

              'name_err'=>'',
              'cost_err'=>'',
              'price_err'=>'',
              'ingredients_err'=>'',
              'image_err'=>''
            ];
            $this->view('product_manager/addCategory', $data);

          }
        }

        public function addStock()
        {
          if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data2 = $this->pmModel->getProductCategoryDetails();
              
            

            $data=[

              'sId'=>'',
              'pId'=>trim($_POST['pId']),
              'qty'=>trim($_POST['qty']),
              'mfd'=>trim($_POST['mfd']),
              'exp'=>trim($_POST['exp']),
              
              'pId_err'=>'',
              'qty_err'=>'',
              'mfd_err'=>'',
              'exp_err'=>''
            ];

            //validation
            if (empty($data['pId']))        { $data['pId_err'] = '*' ;  }
            if (empty($data['qty']))         { $data['qty_err'] = '*' ; }
            if (empty($data['mfd']))        { $data['mfd_err'] = '*' ; }
            if (empty($data['exp']))        { $data['exp_err'] = '*' ; }
            
            $result = array($data,$data2);
            

            //if no errors
            if(empty($data['pId_err']) && empty($data['qty_err']) && empty($data['mfd_err']) && empty($data['exp_err'])  )
            {
              $data['sId']= $this->pmModel->findStockId();

              if($this->pmModel->addStock($data))
              {
                flash('addCategory_flash','New Category Stock details are successfully added!');
                redirect('Product_Manager/addStock');
              }
              else
              {
                die('Something went wrong!');
              }
            }
            else
            {
              //loading the form with the errors
              $this->view('product_manager/addStock',$result);
            }
          }
          else
          {
            $data2 = $this->pmModel->getProductCategoryDetails();
            //initial form loading
            $data=[
              'sId'=>'',
              'pId'=>'',
              'qty'=>'',
              'mfd'=>'',
              'exp'=>'',
              

              'pId_err'=>'',
              'qty_err'=>'',
              'mfd_err'=>'',
              'exp_err'=>''
            ];

            $result = array($data,$data2);

            $this->view('product_manager/addStock', $result);

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
              'name'=>trim($_POST['name']),
              'cost'=>trim($_POST['cost']),
              'price'=>trim($_POST['price']),
              'ingredients'=>trim($_POST['ingredients']),
              'image'=>$new_img_name,

              'name_err'=>'',
              'cost_err'=>'',
              'price_err'=>'',
              'ingredients_err'=>'',
              'image_err'=>''
            ];

            //validation
            if (empty($data['name']))        { $data['name_err'] = '*' ;  }
            if (empty($data['qty']))     { $data['qty_err'] = '*' ; }
            if (empty($data['mfd']))     { $data['mfd_err'] = '*' ; }
            if (empty($data['exp']))        { $data['exp_err'] = '*' ; }


            //if no errors
            if(empty($data['name_err']) && empty($data['cost_err']) && empty($data['price_err']) && empty($data['ingredients_err']) && empty($data['image_err']) )
            {
              if($this->pmModel->updateCategory($data))
              {
                flash('updateCategory_flash','New Product Category details are successfully Updated!');
                //redirection
                $category= $this->pmModel->viewCategorybyId($pId);

                $data = [
                    'category' => $category
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
              'name'=>$category->product_name,
              'cost'=>$category->unit_cost,
              'price'=>$category->unit_price,
              'ingredients'=>$category->ingredients,
              'image'=>$category->image,

              'name_err'=>'',
              'cost_err'=>'',
              'price_err'=>'',
              'ingredients_err'=>'',
              'image_err'=>''
            ];
            $this->view('product_manager/updateCategory', $data);

          }
        }



        public function viewCategory($pId)
        {
          $category= $this->pmModel->viewCategorybyId($pId);

          $data = [
              'category' => $category
          ];

          $this->view('product_manager/viewCategory',$data);
        }

        public function productCategories()
        {
          $categoryView= $this->pmModel->get_categoryView();

          $data = [
              'categoryView' => $categoryView
          ];

          $this->view('product_manager/productCategories',$data);
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

        public function viewStock() {
          $stockView= $this->pmModel->viewStock();
    
          $data = [
            'stockView' => $stockView
          ];
    
          $this->view('product_Manager/addStock',$data);
        }


    }

?>
