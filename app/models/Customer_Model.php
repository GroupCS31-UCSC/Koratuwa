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


    public function addItemToCart($data){
      $this->db->query('INSERT INTO cart(product_id, customer_id, quantity, total_price) VALUE(:product_id, :customer_id, :quantity, :total_price)');
      $this->db->bind(':product_id', $data['product_id']);
      $this->db->bind(':customer_id', $data['customer_id']);
      $this->db->bind(':quantity', $data['quantity']);
      $this->db->bind(':total_price', $data['total_price']);
      if($this->db->execute())
      {
        return true;
      }
      else
      {
        return false;
      } 
    }

  public function viewCartItems($customer_id){
    $this->db->query('SELECT c.product_id, c.customer_id, c.quantity, c.total_price, p.product_name, p.expiry_duration, p.unit_size, p.image  FROM cart as c INNER JOIN product as p ON c.product_id = p.product_id WHERE customer_id=:customer_id');
    $this->db->bind(':customer_id', $customer_id);
    $result = $this->db->resultSet();
		return $result;
  }

  public function dltCartItems($time)
  {
    
    $this->db->query('DELETE FROM cart WHERE timestamp= :time');
    $this->db->bind(':time', $timestamp);
    
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
