<?php

  class Milk_Collection_Officer_Model
  {
    private $db;

    public function __construct()
    {
      $this->db = new Database();
    }

    //to get all milk collection deails
    public function get_milkCollectionView()
    {
      $this->db->query('SELECT * FROM milk_collection');

      $result = $this->db->resultSet();

      return $result;
    }

    //to get all supplier deails
    public function get_supView()
    {
      $this->db->query('SELECT * FROM supplier');

      $result = $this->db->resultSet();

      return $result;
    }

    //to get all supplier order deails
    public function get_supOrderView()
    {
      $this->db->query('SELECT * FROM supply_order');

      $result = $this->db->resultSet();

      return $result;
    }

    //to get all farm milk deails
    public function get_farmMilkView()
    {
      $this->db->query('SELECT * FROM farm_milk_collection');

      $result = $this->db->resultSet();

      return $result;
    }

    //to get all supplier milk deails
    public function get_supplyMilkView()
    {
      $this->db->query('SELECT * FROM supply_order');

      $result = $this->db->resultSet();

      return $result;
    }

    //to get recent order details view
    public function get_RecentOrderView()
    {
      $this->db->query('SELECT supplier_id,quantity,price_hastopay,status FROM supply_order WHERE supply_date=CURDATE()');

      $result = $this->db->resultSet();

      return $result;
    }
    

    



  }

?>
