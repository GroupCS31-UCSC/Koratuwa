<?php

  class Customer_Model
  {
    private $db;

    public function __construct()
    {
      $this->db = new Database();
    }

    public function get_productCategories()
    {
      $this->db->query('SELECT * FROM product');

      $result = $this->db->resultSet();

      return $result;
    }

    public function viewProductById($pId)
    {
      $this->db->query('SELECT * FROM product WHERE product_id = :pId' );
      $this->db->bind(':pId',$pId);
      // $this->db->bind(':pId',$_SESSION['user_id']);

      $result = $this->db->resultSet();
			return $result;
    }

    public function buyProduct($data){
      $data['date'] = date("Y-m-d");
      $this->db->query('INSERT INTO  buy_product(customer_id,date,time,product_id,product_name,quantity, unit_price,total_price) VALUES(:cusId, :date, :time, :pId, :pName, :quantity, :uPrice, :tPrice)');
      //value binding
      $this->db->bind(':cusId', $data['customer_id']);
      $this->db->bind(':date', $data['date']);
      $this->db->bind(':time', $data['time']);
      $this->db->bind(':pId', $data['product_id']);
      $this->db->bind(':pName', $data['product_name']);
      $this->db->bind(':quantity', $data['quantity']);   
      $this->db->bind(':uPrice', $data['unit_price']);
      $this->db->bind(':tPrice', $_SESSION['total_price']);

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
  }

  


?>
