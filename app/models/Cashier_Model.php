<?php
  class Cashier_Model {
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function get_productView() {
      $this->db->query('SELECT * FROM product');

      $result = $this->db->resultSet();

      return $result;
    }

    public function getProductById($id){
      $this->db->query('SELECT * FROM product WHERE product_id = :id');
      $this->db->bind(':id', $id);
      $result = $this->db->single();
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

    public function get_onsiteSaleView() {
      $this->db->query('SELECT * FROM onsite_sale');

      $result = $this->db->resultSet();

      return $result;
    }

    public function get_productSaleView() {
      $this->db->query('SELECT * FROM product_sale');

      $result = $this->db->resultSet();

      return $result;
    }

    public function get_onlineOrderView() {
      $this->db->query('SELECT * FROM online_order');

      $result = $this->db->resultSet();

      return $result;
    }

    public function get_ongoingOrderView() {
      $this->db->query('SELECT * FROM online_order WHERE status = "Ongoing"');

      $result = $this->db->resultSet();

      return $result;
    }

    public function get_deliveredOrderView() {
      $this->db->query('SELECT * FROM online_order WHERE status = "Delivered"');

      $result = $this->db->resultSet();

      return $result;
    }

    public function getCustomerOrdersById($orderId) {
      $this->db->query('SELECT * FROM online_order WHERE order_id = :orderId' );
      $this->db->bind(':orderId',$orderId);

      $row = $this->db->single();
      return $row;
    }

    public function updateStatus($data){
      $this->db->query('UPDATE online_order SET status = :status WHERE order_id = :orderId');
      $this->db->bind(':orderId', $data['orderId']);
      $this->db->bind(':status', $data['status']);

      if($this->db->execute()) {
        return true;
      }
      else {
        return false;
      }
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

    public function saveProductSale($data) {
      $saleID= $data['saleId'];
      $quantity = $data['qnty'];
      $productId = $data['id'];
      $totalPayment = $data['total'];

      $this->db->query('INSERT INTO product_sale(product_id, quantity, sale_id) VALUES(:productId, :quantity, :saleId)');
  
      //values binding
      $this->db->bind(':productId', $productId);
      $this->db->bind(':quantity', $quantity);
      $this->db->bind(':saleId', $saleID);

      if($this->db->execute()) {
        $this->db->query('INSERT INTO onsite_sale(total_payment) VALUES(:totalPayment) WHERE sale_id = :saleId');
  
        //values binding
        $this->db->bind(':totalPayment', $totalPayment);
        $this->db->bind(':saleId', $saleID);
  
        //execute
        if($this->db->execute()) {
          // $product = $this->getProductById($productId);
          // $newQuantity = $product['available_quantity'] - $quantity;
          // $this->db->query('UPDATE product SET available_quantity = :newQuantity WHERE product_id = :productId');
          // $this->db->bind(':newQuantity', $newQuantity);
          // $this->db->bind(':productId', $productId);
          // if($this->db->execute()) {
          //   return true;
          // } else {
          //   return false;
          // }

          return true;
        }
        else
        {
          return false;
        }
      }
      else {
        return false;
      }

    }

    public function submitdata($data) {
      $saleID= $this->findSaleId();

      $this->db->query('INSERT INTO onsite_sale(sale_id) VALUES(:saleId)');
  
      //values binding
      $this->db->bind(':saleId', $saleID);

      if($this->db->execute()) {
          return true;
      }
      else {
        return false;
      }
      
    }

    public function onsiteSale_duration($from, $to)
    {
      $this->db->query('SELECT * FROM onsite_sale WHERE sale_date >= "'.$from.'" and sale_date <= "'.$to.'"');

      $result = $this->db->resultSet();

      return $result;
    }

    public function onlineOrder_duration($from, $to)
    {
      $this->db->query('SELECT * FROM online_order WHERE ordered_date >= "'.$from.'" and ordered_date <= "'.$to.'"');

      $result = $this->db->resultSet();

      return $result;
    }
    
    //notification
    public function get_Notifications()
    {
      $this->db->query('SELECT * From onlineOrder_notification WHERE seen=0 ORDER BY notify_id DESC');
      $result=$this->db->resultSet();
      return $result;
    }
    
    public function update_notifyStatus($nId)
    {
      $this->db->query('UPDATE onlineOrder_notification SET seen=1 WHERE notify_id= :nId');
      $this->db->bind(':nId', $nId);
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
