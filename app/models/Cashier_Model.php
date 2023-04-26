<?php
  class Cashier_Model {
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function get_ongoingOrderView() {
      $this->db->query('SELECT order_id, ordered_date, customer_id, status FROM online_order WHERE status="ongoing"');

      $result = $this->db->resultSet();

      return $result;
    }

    public function get_productSaleView() {
      $this->db->query('SELECT * FROM product_sale');

      $result = $this->db->resultSet();

      return $result;
    }

    public function findSaleId() {
      $this->db->query('SELECT * FROM onsite_sale order by sale_id desc limit 1');
      $row = $this->db->single();
      $lastId ='';
      if($row) {
        $lastId = $row->sale_id;
      }

      if($lastId == '') {
        $id = 'S001';
      } else {
        $id = substr($lastId, 1);
        $id = intval($id);
        $id++;
        $id = 'S'.str_pad($id, 3, '0', STR_PAD_LEFT);
      }

      return $id;
    }

    public function findReceiptId() {
      $this->db->query('SELECT * FROM onsite_sale order by receipt_id desc limit 1');

      $row = $this->db->single();
      $lastId = '';
      if($row) {
        $lastId = $row->receipt_id;
      }
      if(empty($lastId)) {
        $id = 'r1';
      } else {
        $id = substr($lastId, 1);
        $id = intval($id);
        $id++;
        $id = 'r'.$id;
      }
    
      return $id;
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

    public function getCustomerOrdersById($orderId) {
      $this->db->query('SELECT * FROM online_order WHERE order_id = :orderId' );
      $this->db->bind(':orderId',$orderId);

      $row = $this->db->single();
      return $row;
    }

    public function viewOnsiteSaleById($saleId) {
      $this->db->query('SELECT * FROM onsite_sale WHERE sale_id = :saleId' );
      $this->db->bind(':saleId',$saleId);

      $row = $this->db->single();
      return $row;
    }

    public function getOngoingOrder() {
      $this->db->query('SELECT * FROM online_order WHERE status = "ongoing"');

      $result = $this->db->resultSet();

      return $result;
    }


    // public function addSale($data) {
    //   // Check if customer exists
    //   $this->db->query('SELECT * FROM customer WHERE customer_id = :customerId');
    //   $this->db->bind(':customerId', $data['customerId']);
    //   $customer = $this->db->single();
    
    //   if (!$customer) {
    //     // Customer does not exist
    //     return false;
    //   }
    
    //   if($data['saleType'] == 'online') {
    //     // Insert data into online_order table
    //     $this->db->query('INSERT INTO online_order(sale_id, order_id, date, status, receiving_method, customer_id) VALUES(:saleId, :orderId, :date, :status, :receivingMethod, :customerId)');
    
    //     // values binding
    //     $this->db->bind(':saleId', $data['saleId']);
    //     $this->db->bind(':orderId', $data['orderId']);
    //     $this->db->bind(':date', $data['date']);
    //     $this->db->bind(':status', $data['status']);
    //     $this->db->bind(':receivingMethod', $data['receivingMethod']);
    //     $this->db->bind(':customerId', $data['customerId']);
    //   } else {
    //     // Insert data into onsite_sale table
    //     $this->db->query('INSERT INTO onsite_sale(sale_id, customer_id) VALUES(:saleId, :customerId)');
    
    //     // values binding
    //     $this->db->bind(':saleId', $data['saleId']);
    //     $this->db->bind(':customerId', $data['customerId']);
    //   }
    
    //   // execute
    //   if($this->db->execute()) {
    //     return true;
    //   }
    //   else {
    //     return false;
    //   }
    // }

    public function addSale($data) {
      
    }
    
    // public function updateSale($data) {
    //   // Check if customer exists
    //   $this->db->query('SELECT * FROM customer WHERE customer_id = :customerId');
    //   $this->db->bind(':customerId', $data['customerId']);
    //   $customer = $this->db->single();
    
    //   if (!$customer) {
    //     // Customer does not exist
    //     return false;
    //   }
    
    //   if($data['saleType'] == 'online') {
    //     // Update data in online_order table
    //     $this->db->query('UPDATE online_order SET order_id = :orderId, date = :date, status = :status, receiving_method = :receivingMethod, customer_id = :customerId WHERE sale_id = :saleId');
    
    //     // values binding
    //     $this->db->bind(':saleId', $data['saleId']);
    //     $this->db->bind(':orderId', $data['orderId']);
    //     $this->db->bind(':date', $data['date']);
    //     $this->db->bind(':status', $data['status']);
    //     $this->db->bind(':receivingMethod', $data['receivingMethod']);
    //     $this->db->bind(':customerId', $data['customerId']);
    //   } else {
    //     // Update data in onsite_sale table
    //     $this->db->query('UPDATE onsite_sale SET customer_id = :customerId WHERE sale_id = :saleId');
    
    //     // values binding
    //     $this->db->bind(':saleId', $data['saleId']);
    //     $this->db->bind(':customerId', $data['customerId']);
    //   }
    
    //   // execute
    //   if($this->db->execute()) {
    //     return true;
    //   }
    //   else {
    //     return false;
    //   }
    // }
    


  }

?>
