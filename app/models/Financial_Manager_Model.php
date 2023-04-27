<?php

  class Financial_Manager_Model
  {
    private $db;

    public function __construct()
    {
      $this->db = new Database();
    }

    public function findExpenseId()
    {
      $this->db->query('SELECT * FROM expense order by expense_id desc limit 1');
			$row = $this->db->single();
			$lastId=$row->expense_id;

			if($lastId == '')
			{
				$id='EXP101';
			}
			else
			{
				$id = substr($lastId,3);
				$id = intval($id);
				$id = "EXP".($id+1);
			}

			return $id;
    }
    
    public function addExpense($data)
    {
      $this->db->query('INSERT INTO expense(expense_id,date,description,amount) VALUES(:eId, :dat, :des, :amo)');
      //value binding
      $this->db->bind(':eId', $data['eId']);
      $this->db->bind(':dat', $data['dat']);
      $this->db->bind(':des', $data['des']);
      $this->db->bind(':amo', $data['amo']);
      

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

    public function viewExpense() {
      $this->db->query('SELECT * FROM expense');

      $result = $this->db->resultSet();

      return $result;
    }

      public function viewRevenue() {
      $this->db->query('SELECT * FROM revenue');

      $result = $this->db->resultSet();

      return $result;
    }

    // public function getCattleByCowID($cowID) {
    //   $this->db->query('SELECT * FROM cattle WHERE cow_id = "'.$cowID.'"');
    //   $result = $this->db->single();
    //   return $result;
    // }

    
    // public function viewReports($from, $to) {
    //   $this->db->query('SELECT * FROM expense WHERE date > "'.$from.'" and date < "'.$to.'"');

    //   $result = $this->db->resultSet();

    //   return $result;
    // }

     
    public function viewExpenseReports($from, $to) {
      $this->db->query('SELECT * FROM expense WHERE date > "'.$from.'" and date < "'.$to.'"');

      $result = $this->db->resultSet();

      return $result;
    }

    public function viewRevenueReports($from, $to) {
      $this->db->query('SELECT * FROM revenue WHERE date > "'.$from.'" and date < "'.$to.'"');

      $result = $this->db->resultSet();

      return $result;
    }

    

    // public function updateExpense($data)
    // {
    //   $this->db->query('UPDATE expense set date=:dat,description=:des,vendor=:ven,amount=:amo WHERE expense_id=$eId');
      
    //   $this->db->bind(':eId', $data['eId']);
    //   $this->db->bind(':dat', $data['dat']);
    //   $this->db->bind(':des', $data['des']);
    //   $this->db->bind(':ven', $data['ven']);
    //   $this->db->bind(':amo', $data['amo']);
      

    //   //execute
    //   if($this->db->execute())
    //   {
    //     return true;
    //   }
    //   else
    //   {
    //     return false;
    //   }
    // }
  }

?>
