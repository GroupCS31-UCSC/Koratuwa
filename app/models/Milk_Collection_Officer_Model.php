<?php

  class Milk_Collection_Officer_Model
  {
    private $db;

    public function __construct()
    {
      $this->db = new Database();
    }

    //to get today order details to view
    public function get_todayOrderView()
    {
      $this->db->query('SELECT supplier_id,quantity,supplying_address,status FROM supply_order WHERE supply_date=CURDATE()');

      $result = $this->db->resultSet();

      return $result;
    }

    //get the last date that set the milk purchasing price
    public function get_lastDate()
    {
      $this->db->query('SELECT date FROM milk_purchasing_price order by date desc limit 1');

      $row = $this->db->single();

      return $row->date;
    }

    //get the last price that set for milk purchasing
    public function get_lastPrice()
    {
      $this->db->query('SELECT unit_price FROM milk_purchasing_price order by date desc limit 1');

      $row = $this->db->single();

      return $row->unit_price;
    }

    //set the milk purchasing unit price
    public function setPrice($data)
    {
      $this->db->query('SELECT * FROM milk_purchasing_price order by date desc limit 1');
      $row = $this->db->single();
			$lastdate=$row->date;

      if($lastdate == date("Y-m-d"))
      {
        return false;
      }
      else{
        $this->db->query('INSERT INTO milk_purchasing_price(unit_price) VALUES(:price)');
        $this->db->bind(':price', $data['price']);
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

    //to get total farm milk collection deails
    public function get_farmMilkCollectionView()
    {
      $this->db->query('SELECT * FROM milk_collection');

      $result = $this->db->resultSet();

      return $result;
    }

    //to get farm milk collection deails one by one
    public function get_collectionDetails($mcId)
    {
      $this->db->query('SELECT stall_id ,collected_date,collected_time FROM milk_collection WHERE milk_collection_id=:mcId');
			$this->db->bind(':mcId', $mcId);
      $row = $this->db->single();
          $stallId = $row->stall_id;
          $cDate = $row->collected_date;
          $cTime = $row->collected_time;

          $this->db->query('SELECT * FROM cattle_milking WHERE stall_id=:sId AND collected_date=:cDate AND collected_time=:cTime');
          $this->db->bind(':sId', $stallId);
			    $this->db->bind(':cDate', $cDate);
			    $this->db->bind(':cTime', $cTime);

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
      $this->db->query('SELECT * FROM supply_order ');

      $result = $this->db->resultSet();

      return $result;

      
    }

    //to get all supplier milk details
    public function get_supplyMilkView()
    {
      $this->db->query('SELECT * FROM supply_order');

      $result = $this->db->resultSet();

      return $result;
    }

    //to get order details one by one
    public function get_orderDetails($ordID)
    {
      $this->db->query('SELECT * FROM supply_order WHERE supply_order_id = :ordID');
      $this->db->bind(':ordID', $ordID);
      $result = $this->db->resultSet();

      return $result;
    }
    


    



  }

?>
