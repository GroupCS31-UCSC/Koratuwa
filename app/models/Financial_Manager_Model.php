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

    public function viewExpenseChart()
    {
      $this->db->query('SELECT DISTINCT(description) FROM expense');
      $expense_types = $this->db->resultSet();

      $row1 = '';
      $row2 = '';
      $row3 = '';
      $row4 = '';
      $row5 = ''; 

      foreach ($expense_types as $exp)
      {
        if($exp->description == "Production Cost")
        {
          $this->db->query('SELECT SUM(amount) as "Production Cost" FROM expense WHERE description = "Production Cost" ');
			    $row1 = $this->db->single();
        }
        elseif($exp->description == "Livestock Management Cost")
        {
          $this->db->query('SELECT SUM(amount) as "Livestock Management Cost" FROM expense WHERE description = "Livestock Management Cost" ');
			    $row2 = $this->db->single();
        }
        elseif($exp->description == "Employee Management Cost")
        {
          $this->db->query('SELECT SUM(amount) as "Employee Management Cost" FROM expense WHERE description = "Employee Management Cost" ');
			    $row3 = $this->db->single();
        }
        elseif($exp->description == "Utility Cost")
        {
          $this->db->query('SELECT SUM(amount) as "Utility Cost" FROM expense WHERE description = "Utility Cost" ');
			    $row4 = $this->db->single();
        }
        else{
          $this->db->query('SELECT SUM(amount) as "Supplier Charges" FROM expense WHERE description = "Supplier Charges" ');
			    $row5 = $this->db->single();
        }


      }

       $result = array($row1,$row2,$row3,$row4,$row5);
       return $result;
      //  print_r($row1);
      //  print_r($row2);
      //  print_r($row3);
      //  print_r($row4);
      //  print_r($row5);
      // print_r($result);




    }

      public function viewRevenue() {
      $this->db->query('SELECT * FROM revenue');

      $result = $this->db->resultSet();

      return $result;
    }


    
    // public function viewReports($from, $to) {
    //   $this->db->query('SELECT * FROM expense WHERE date > "'.$from.'" and date < "'.$to.'"');

    //   $result = $this->db->resultSet();

    //   return $result;
    // }

     
    public function viewExpenseReports($from, $to) {
      $this->db->query('SELECT * FROM expense WHERE date >= "'.$from.'" and date <= "'.$to.'"');

      $result = $this->db->resultSet();

      return $result;
    }

    public function viewRevenueReports($from, $to) {
      $this->db->query('SELECT * FROM revenue WHERE date >= "'.$from.'" and date <= "'.$to.'"');

      $result = $this->db->resultSet();

      return $result;
    }

    public function Expense_duration($from, $to)
    {
      $this->db->query('SELECT * FROM expense WHERE date >= "'.$from.'" and date <= "'.$to.'"');

      $result = $this->db->resultSet();

      return $result;
    }

    public function Revenue_duration($from, $to)
    {
      $this->db->query('SELECT * FROM revenue WHERE date >= "'.$from.'" and date <= "'.$to.'"');

      $result = $this->db->resultSet();

      return $result;
    }

    

  
  }

?>
