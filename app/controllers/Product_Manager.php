<?php

    class Product_Manager extends Controller
    {
        public function __construct()
        {
          $this->pmModel = $this->model('Product_Manager_Model');
        }

        public function landingPage()
        {
          $data = [];
          $this->view('product_manager/pm_home',$data);
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
                  $img_upload_path = APPROOT . '/../public/img/Uploads/' . $new_img_name;
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
            if (empty($data['cost']))     { $data['cost_err'] = '*' ; }
            if (empty($data['price']))     { $data['price_err'] = '*' ; }
            if (empty($data['ingredients']))        { $data['ingredients_err'] = '*' ; }
            if (empty($data['image']))        { $data['image_err'] = '*' ; }


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


    }

?>
