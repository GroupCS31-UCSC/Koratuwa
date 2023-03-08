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
      $this->db->query('SELECT * FROM supply_order WHERE supplier_id = :supId');
      $this->db->bind(':supId',$_SESSION['user_id']);

      $result = $this->db->resultSet();

      return $result;
    }


    public function get_supOrderSum()
    {
      $this->db->query('SELECT sum(quantity) as totMilk from supply_order WHERE supplier_id = :supId AND status="Collected" ');
      $this->db->bind(':supId',$_SESSION['user_id']);

      $row = $this->db->single();
			return $row->totMilk;
    }

    public function getSupplyById($supOrdId)
    {
      $this->db->query('SELECT * FROM supply_order WHERE supply_order_id = :supOrderId' );
      $this->db->bind(':supOrderId',$supOrdId);

      $row = $this->db->single();
			return $row;
    }
    //generate id for invoice id
    public function generateInvoiceId()
		{
			$this->db->query('SELECT * FROM supply_order order by invoice_id desc limit 1');
			$row = $this->db->single();
			$lastId=$row->invoice_id;

			if($lastId == '')
			{
				$id='INV101';
			}
			else
			{
				$id = substr($lastId,3);
				$id = intval($id);
				$id = "INV".($id+1);
			}

			return $id;
		}

    

    public function placeSupply($data)
    {
      $data['date'] = date("Y-m-d");
      $this->db->query('INSERT INTO supply_order(supply_order_id,quantity,supply_date,status,supplying_address,unit_price, supplier_id,quality) VALUES(:supOrderId, :quantity, :supDate, :status, :address, :price, :supId, :quality)');
      //value binding
      $this->db->bind(':supOrderId', $data['supOrderId']);
      $this->db->bind(':quantity', $data['quantity']);
      $this->db->bind(':supDate', $data['date']);
      $this->db->bind(':status', $data['status']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':price', $data['price']);   //added for intemorary
      $this->db->bind(':quality', $data['quality']);
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

    //generate id for feedbacks
    public function generateFeedbackId()
		{
			$this->db->query('SELECT * FROM sup_feedback order by feedback_id desc limit 1');
			$row = $this->db->single();
			$lastId=$row->feedback_id;

			if($lastId == '')
			{
				$id='F101';
			}
			else
			{
				$id = substr($lastId,1);
				$id = intval($id);
				$id = "F".($id+1);
			}

			return $id;
		}
    public function supFeedback($data)
    {
      // $data['date'] = date("Y-m-d");
      $this->db->query('INSERT INTO  sup_feedback(feedback_id, supplier_id, sup_name, feedback) VALUES(:Fid, :supId, :supName, :feedback)');

      $this->db->bind(':Fid', $data['feedback_id']);
      $this->db->bind(':supId', $_SESSION['user_id']);
      $this->db->bind(':supName', $_SESSION['user_name']);
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
// ----------get supplier feedback---------------//
    public function viewFeedback()
    {
      $this->db->query('SELECT * FROM sup_feedback ORDER BY 	feedback_id DESC LIMIT 10');

      $result = $this->db->resultSet();

      return $result;
    }



  }


?>
