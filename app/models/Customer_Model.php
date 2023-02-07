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
      $this->db->query('SELECT * FROM product_category');

      $result = $this->db->resultSet();

      return $result;
    }

    public function viewProductById($pId)
    {
      
    }

  }

  


?>
