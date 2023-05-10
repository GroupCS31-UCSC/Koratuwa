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

    public function get_onlineOrderView($status) {
      $this->db->query('SELECT * FROM online_order WHERE status = "'.$status.'"');

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

    public function updateStatus($orderId){
      // $orderId = $data['orderId'];
      // $status = 'Ongoing';
      $this->db->query('UPDATE online_order SET status = "ongoing" WHERE order_id = :orderId');
      $this->db->bind(':orderId', $orderId);
      // $this->db->bind(':status', $data['status']);

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

    public function saveProductSale($p) {
      $products = $p['ps'];
      
      foreach($products as $product) {
        
        $this->db->query('INSERT INTO product_sale(product_id,quantity,sale_id) VALUES(:productId, :quantity, :saleId)');
    
        //values binding
        $this->db->bind(':productId', $product['id']);
        $this->db->bind(':quantity', $product['qnty']);
        $this->db->bind(':saleId', $product['saleId']);

        $this->db->execute();
      }
      return true;

    }

    public function submitdata($data) {
      $saleID= $data['saleId'];
      $total= $data['total'];

      $this->db->query('INSERT INTO onsite_sale(sale_id, total_payment) VALUES(:saleId, :total)');
  
      //values binding
      $this->db->bind(':saleId', $saleID);
      $this->db->bind('total', $total);

      if($this->db->execute()) {
          return true;
      }
      else {
        return false;
      }
      
    }

    public function onsiteSale_duration($status, $from, $to)
    {
      $this->db->query('SELECT * FROM onsite_sale WHERE status = "'.$status.'" AND sale_date >= "'.$from.'" and sale_date <= "'.$to.'"');

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
