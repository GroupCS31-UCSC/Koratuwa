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
      $this->db->query('INSERT INTO cart(product_id, customer_id, quantity, total_price) VALUE(:product_id, :customer_id, :quantity, :total_price) ON DUPLICATE KEY UPDATE quantity = quantity + :quantity, total_price = total_price + :total_price');
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


    public function clearCart($cusId){
      $this->db->query('DELETE FROM cart WHERE customer_id = :cusId');
      $this->db->bind(':cusId', $cusId);
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
    $this->db->query('SELECT c.product_id, c.customer_id, c.quantity, c.total_price,c.timestamp, p.product_name, p.expiry_duration, p.unit_size, p.image  FROM cart as c INNER JOIN product as p ON c.product_id = p.product_id WHERE customer_id=:customer_id');
    $this->db->bind(':customer_id', $customer_id);
    $result = $this->db->resultSet();
		return $result;
  }

  public function dltCartItems($id)
  {
    // $xtime = $this->db->query('SELECT TIME(:time)');
    // $xdate = $this->db->query('SELECT DATE(:time)');
    // $this->db->bind(':time', $time);
    // $timestamp = $xdate.' '.$xtime;
    $this->db->query('DELETE FROM cart WHERE product_id= :pid');
    $this->db->bind(':pid', $id);
    
    if($this->db->execute())
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  // genarate order id
  public function generateordId()
  {
    $this->db->query('SELECT * FROM online_order order by order_id desc limit 1');
    $row = $this->db->single();
    // var_dump($row);
    $lastId=$row->order_id;

    if($lastId == '')
    {
      $id='ord10001';
    }
    else
    {
      $id = substr($lastId,3);
      $id = intval($id);
      $id = "ord".($id+1);
    }

    return $id;
  }

  public function generatReceiptId()
  {
    $this->db->query('SELECT * FROM online_order order by order_id desc limit 1');
    $row = $this->db->single();
    $lastId=$row->receipt_id;

    if($lastId == '')
    {
      $id='R10001';
    }
    else
    {
      $id = substr($lastId,1);
      $id = intval($id);
      $id = "R".($id+1);
    }

    return $id;
  }

  // online order 
  public function onlineOrder($data){
    $this->db->query('INSERT INTO online_order(order_id , status, payment_method, total_payment, payment_status, receipt_id ,customer_id) 
    VALUE (:ordId, "New Order", "bank", :payment, "paid", :receipt_id, :customerId)');
    
    $this->db->bind(':ordId', $data['order_id']);
    $this->db->bind(':payment', $data['payment']);
    $this->db->bind(':receipt_id', $data['receipt_id']);
    $this->db->bind(':customerId', $_SESSION['user_id']);
    if($this->db->execute())
    {
      foreach ($data['products'] as $product):
        $this->db->query('INSERT INTO product_sale(product_id,quantity,sale_id) VALUES(:pId,:qty,:ordId)');
        $this->db->bind(':pId', $product->product_id );
        $this->db->bind(':qty', $product->quantity);
        $this->db->bind(':ordId', $data['order_id']);

        if(!$this->db->execute())  {
          return false;
        }
        endforeach;
        return true;
    }
    else
    {
      return false;
    }

  }

  // public function get_OrderDetailsByDate($status,$from,$to) {
  //   $this->db->query('SELECT * FROM online_order WHERE status = "'.$status.'" AND ordered_date >= "'.$from.'" and ordered_date <= "'.$to.'"');

  //   $result = $this->db->resultSet();

  //   return $result;
  // }
  public function get_OrderDetailsByDate($status,$from,$to) {
    $this->db->query('SELECT * FROM online_order WHERE status = "'.$status.'" AND total_payment >= "'.$from.'" and total_payment <= "'.$to.'"');

    $result = $this->db->resultSet();

    return $result;
  }

  public function get_OrderDetails($status)
  {
    $this->db->query('SELECT * FROM online_order WHERE status = "'.$status.'"');

    $result = $this->db->resultSet();

    return $result;
  }

  public function updateStatus($orderId){
    $this->db->query('UPDATE online_order SET status = "Delivered" WHERE order_id = :orderId');
    $this->db->bind(':orderId', $orderId);

    if($this->db->execute()) {
      return true;
    }
    else {
      return false;
    }
  }

  public function get_itemView($saleId) {
    $this->db->query('SELECT p.product_name, ps.quantity FROM product_sale as ps INNER JOIN online_order as oo ON ps.sale_id=oo.order_id INNER JOIN product as p ON p.product_id=ps.product_id WHERE ps.sale_id = :saleId;');
 
    $this->db->bind(':saleId', $saleId);

    $result = $this->db->resultSet();

    return $result;
  }

  //generate id for feedbacks
  public function generateFeedbackId()
  {
      $this->db->query('SELECT * FROM cus_feedback order by feedback_id desc limit 1');
      $row = $this->db->single();
  
      if ($row !== false && is_object($row)) {
          $lastId = $row->feedback_id;
      } else {
          $lastId = '';
      }
  
      if ($lastId == '') {
          $id = 'F101';
      } else {
          $id = substr($lastId, 1);
          $id = intval($id);
          $id = "F" . ($id + 3);
      }
  
      return $id;
  }
  // customer feedback
  public function cusFeedback($data)
  {

    $this->db->query('INSERT INTO  cus_feedback(feedback_id, customer_id, feedback) VALUES(:Fid, :cusId, :feedback)');
    
    $this->db->bind(':Fid', $data['feedback_id']);
    $this->db->bind(':cusId', $_SESSION['user_id']);
    $this->db->bind(':feedback', $data['feedback']);

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

    //notification
    public function get_Notifications()
    {
      // $this->db->query('SELECT * From cusorder_notification WHERE seen=0 AND cus_id=:cusId ORDER BY notify_id DESC');
      $this->db->query('SELECT cusorder_notification.notify_id, cusorder_notification.shipped_date, cusorder_notification.shipped_time, cusorder_notification.order_id, online_order.customer_id
      FROM cusorder_notification 
      INNER JOIN online_order 
      ON cusorder_notification.order_id = online_order.order_id WHERE cusorder_notification.seen=0 AND online_order.customer_id= :cusId ');

      $this->db->bind(':cusId', $_SESSION['user_id']);

      $result=$this->db->resultSet();
      return $result;
    }

    public function update_notifyStatus($nId)
    {
      $this->db->query('UPDATE cusorder_notification SET seen=1 WHERE notify_id= :nId');
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
