<?php
  class Cashier_Model {
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function get_onsiteSaleView() {
      $this->db->query('SELECT * FROM onsite_sale');

      $result = $this->db->resultSet();

      return $result;
    }

    public function get_onlineOrderView() {
      $this->db->query('SELECT * FROM online_order');

      $result = $this->db->resultSet();

      return $result;
    }

    public function getSaleById($saleId) {
      $this->db->query('SELECT * FROM onsite_sale WHERE sale_id = :saleId' );
      $this->db->bind(':saleId',$saleId);

      $row = $this->db->single();
      return $row;
    }


  }

?>
