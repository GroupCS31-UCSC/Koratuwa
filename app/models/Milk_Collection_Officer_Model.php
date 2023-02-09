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




  }

?>
