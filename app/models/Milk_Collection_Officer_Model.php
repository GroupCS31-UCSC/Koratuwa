<?php

  class Milk_Collection_Officer_Model
  {
    private $db;

    public function __construct()
    {
      $this->db = new Database();
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

      if($this->db->execute())
        {
          $row = $this->db->single();
          $stallId = $row->stall_id;
          $cDate = $row->collected_date;
          $cTime = $row->collected_time;

          $this->db->query('SELECT * FROM cattle_milking WHERE stall_id=:sId AND collected_date=:cDate AND collected_time=:cTime');
          $this->db->bind(':sId', $stallId);
			    $this->db->bind(':cDate', $cDate);
			    $this->db->bind(':cTime', $cTime);

          if($this->db->execute())
          {
            $result = $this->db->resultSet();

            return $result;
          }
          else
          {
            return false;
          }
        }
        else
        {
          return false;
        }

      
      

      
			


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

    public function get_lastDate()
    {
      $this->db->query('SELECT date FROM milk_purchasing_price order by date desc limit 1');

      $row = $this->db->single();

      return $row->date;
    }

    public function get_lastPrice()
    {
      $this->db->query('SELECT unit_price FROM milk_purchasing_price order by date desc limit 1');

      $row = $this->db->single();

      return $row->unit_price;
    }

    



  }

?>
