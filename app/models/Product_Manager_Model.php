<?php

  class Product_Manager_Model
  {
    private $db;

    public function __construct()
    {
      $this->db = new Database(); //instantiate the databass class in the database.php file
    }

    public function getProductCategoryDetails(){
      $this->db->query('SELECT * FROM product');
      
      $result = $this->db->resultSet();

      return $result;
    }

    public function getProductStockDetails(){
      $this->db->query('SELECT * FROM product_stock');


      $result = $this->db->resultSet();

      return $result;
    }

    public function getProductStockDetailsForProduct($pId){
      $this->db->query('SELECT * FROM product_stock WHERE product_id = :pId');
      $this->db->bind(':pId',$pId);


      $result = $this->db->resultSet();

      return $result;
    }

    public function getProductExpireDays($pId){
      $this->db->query('SELECT SUM(expiry_duration + expiry_duration_months*30) FROM product WHERE product_id = :pId');
      $this->db->bind(':pId',$pId);
      $result = $this->db->resultSet();
      $array = get_object_vars($result[0]);

      return $array['SUM(expiry_duration + expiry_duration_months*30)'] ;

    }
  
    public function findProductId()
    {
      $this->db->query('SELECT * FROM product order by product_id desc limit 1');
			$row = $this->db->single();
			$lastId=$row->product_id;

			if($lastId == '')
			{
				$id='PID101';
			}
			else
			{
				$id = substr($lastId,3);
				$id = intval($id);
				$id = "PID".($id+1);
			}

			return $id;
    }

    public function findStockId()
    {
      $this->db->query('SELECT * FROM product_stock order by stock_id desc limit 1');
			$row = $this->db->single();
			$lastId=$row->stock_id;

			if($lastId == '')
			{
				$id='STK101';
			}
			else
			{
				$id = substr($lastId,3);
				$id = intval($id);
				$id = "STK".($id+1);
			}

			return $id;
    }

    public function get_categoryView()
    {
      $this->db->query('SELECT * FROM product');

      $result = $this->db->resultSet();

      return $result;
    }

    public function viewCategorybyId($pId)
    {
      $this->db->query('SELECT * FROM product WHERE product_id = :pId' );
      $this->db->bind(':pId',$pId);

      $result = $this->db->resultSet();
			return $result;
    }

    public function getCategorybyId($pId)
    {
      $this->db->query('SELECT * FROM product WHERE product_id = :pId' );
      $this->db->bind(':pId',$pId);

      $row = $this->db->single();
			return $row;
    }

    public function addStock($data)
    {
      
      $this->db->query('INSERT INTO product_stock(stock_id,product_id,mfd_date,exp_date,quantity) VALUES(:sId,:pId, :mfd, :exp, :qty)');
      //value binding
      $this->db->bind(':sId', $data['sId']);
      $this->db->bind(':pId', $data['pId']);
      $this->db->bind(':qty', $data['qty']);
      $this->db->bind(':mfd', $data['mfd']);
      $this->db->bind(':exp', $data['exp']);
      // $this->db->bind(':pmId', $_SESSION['user_id']);

      //execute
      if($this->db->execute())
      {
        return true;
      }
      else
      {
        return false;
      }
    }


    public function addCategory($data)
    {
      $this->db->query('INSERT INTO product(product_id,product_name,unit_price,expiry_duration,expiry_duration_months,unit_size,ingredients,image) VALUES(:pId, :name, :price, :duration, :duration_months,:size, :ingredients, :image)');
      //value binding
      $this->db->bind(':pId', $data['pId']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':price', $data['price']);
      $this->db->bind(':duration', $data['duration']);
      $this->db->bind(':duration_months', $data['duration_months']);
      $this->db->bind(':size', $data['size']);
      $this->db->bind(':ingredients', $data['ingredients']);
      $this->db->bind(':image', $data['image']);
      // $this->db->bind(':pmId', $_SESSION['user_id']);

      //execute
      if($this->db->execute())
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function updateCategory($data)
    {
      $this->db->query('UPDATE product SET  unit_price= :price, image= :image WHERE product_id= :pId');
      // $this->db->bind(':name', $data['name']);
      $this->db->bind(':price', $data['price']);
      // $this->db->bind(':duration', $data['duration']);
      // $this->db->bind(':size', $data['size']);
      // $this->db->bind(':ingredients', $data['ingredients']);
      $this->db->bind(':image', $data['image']);
      $this->db->bind(':pId', $data['pId']);

      if($this->db->execute())
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function deleteCategory($pId)
    {
      $this->db->query('DELETE FROM product WHERE product_id= :pId');
      $this->db->bind(':pId', $pId);

      if($this->db->execute())
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    




  }

?>