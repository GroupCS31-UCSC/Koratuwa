<?php

  class Product_Manager_Model
  {
    private $db;

    public function __construct()
    {
      $this->db = new Database();
    }

    public function findProductId()
    {
      $this->db->query('SELECT * FROM product_category order by product_id desc limit 1');
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

    public function get_categoryView()
    {
      $this->db->query('SELECT * FROM product_category');

      $result = $this->db->resultSet();

      return $result;
    }

    public function viewCategorybyId($pId)
    {
      $this->db->query('SELECT * FROM product_category WHERE product_id = :pId' );
      $this->db->bind(':pId',$pId);

      $result = $this->db->resultSet();
			return $result;
    }

    public function getCategorybyId($pId)
    {
      $this->db->query('SELECT * FROM product_category WHERE product_id = :pId' );
      $this->db->bind(':pId',$pId);

      $row = $this->db->single();
			return $row;
    }




    public function addCategory($data)
    {
      $this->db->query('INSERT INTO product_category(product_id,product_name,unit_price,unit_cost,ingredients,image,employee_id) VALUES(:pId, :name, :price, :cost, :ingredients, :image, :pmId)');
      //value binding
      $this->db->bind(':pId', $data['pId']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':price', $data['price']);
      $this->db->bind(':cost', $data['cost']);
      $this->db->bind(':ingredients', $data['ingredients']);
      $this->db->bind(':image', $data['image']);
      $this->db->bind(':pmId', $_SESSION['user_id']);

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
      $this->db->query('UPDATE product_category SET product_name= :name, ingredients= :ingredients, unit_price= :price, unit_cost=:cost, image= :image WHERE product_id= :pId');
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':price', $data['price']);
      $this->db->bind(':cost', $data['cost']);
      $this->db->bind(':ingredients', $data['ingredients']);
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
      $this->db->query('DELETE FROM product_category WHERE product_id= :pId');
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
