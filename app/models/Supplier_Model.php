<?php

  class Supplier_Model
  {
    private $db;

    public function __construct()
    {
      $this->db = new Database();
    }

    public function findSupOrderId()
    {
      $this->db->query('SELECT * FROM supply_order order by supply_order_id desc limit 1');
			$row = $this->db->single();
			$lastId=$row->supply_order_id;

			if($lastId == '')
			{
				$id='SupOrd101';
			}
			else
			{
				$id = substr($lastId,6);
				$id = intval($id);
				$id = "SupOrd".($id+1);
			}

			return $id;
    }

    public function get_supOrderView()
    {
      $this->db->query('SELECT * FROM supply_order');

      $result = $this->db->resultSet();

      return $result;
    }

    public function getSupplyById($supOrdId)
    {
      $this->db->query('SELECT * FROM supply_order WHERE supply_order_id = :supOrderId' );
      $this->db->bind(':supOrderId',$supOrdId);

      $row = $this->db->single();
			return $row;
    }

    public function placeSupply($data)
    {
      $this->db->query('INSERT INTO supply_order(supply_order_id,quantity,supply_date,status,supplying_address,unit_price, supplier_id) VALUES(:supOrderId, :quantity, :supDate, :status, :address, :price, :supId)');
      //value binding
      $this->db->bind(':supOrderId', $data['supOrderId']);
      $this->db->bind(':quantity', $data['quantity']);
      $this->db->bind(':supDate', $data['date']);
      $this->db->bind(':status', $data['status']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':price', $data['price']);   //added for intemorary
      $this->db->bind(':supId', $_SESSION['user_id']);

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

    public function dltSupOrder($supOrdId)
    {
      $this->db->query('DELETE FROM supply_order WHERE supply_order_id= :supOrdId');
      $this->db->bind(':supOrdId', $supOrdId);

      if($this->db->execute())
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function updateSupply($data)
    {
      $this->db->query('UPDATE supply_order SET quantity= :quantity, supply_date= :supDate, supplying_address=:address WHERE supply_order_id= :supOrderId');
      $this->db->bind(':supOrderId', $data['supOrderId']);
      $this->db->bind(':quantity', $data['quantity']);
      $this->db->bind(':supDate', $data['date']);
      $this->db->bind(':address', $data['address']);

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
