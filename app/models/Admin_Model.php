<?php

  class Admin_Model
  {
    private $db;

    public function __construct()
    {
      $this->db = new Database();
    }

    //to get all employee deails for user profile
    public function get_empProfileView($empId)
    {
      $this->db->query('SELECT * FROM employee where employee_id= :empId AND existence=1');
      $this->db->bind(':empId', $empId);

      $result = $this->db->resultSet();

      return $result;
    }

    public function get_labourProfileView($LId)
    {
      $this->db->query('SELECT * FROM laborer where laborer_id= :LId AND existence=1');
      $this->db->bind(':LId', $LId);

      $result = $this->db->resultSet();

      return $result;
    }

    // check email is already registered or not in the system db
    public function findEmployeeByEmail($email)
		{
			$this->db->query('SELECT * FROM user WHERE email = :email AND existence=1');
			$this->db->bind(':email', $email);

			$row = $this->db->single();

			if($this->db->rowCount() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

    //generate id for registering employee
    public function generateEmployeeId()
		{
			$this->db->query('SELECT * FROM employee order by employee_id desc limit 1');
			$row = $this->db->single();
			$lastId=$row->employee_id;

			if($lastId == '')
			{
				$id='EMP101';
			}
			else
			{
				$id = substr($lastId,3);
				$id = intval($id);
				$id = "EMP".($id+1);
			}

			return $id;
		}


    //add newly registering employee's details
    public function addEmployees($data)
    {
      $this->db->query('INSERT INTO user(user_id,user_name,email,password,user_type,existence) VALUES(:id, :name, :email, :password, :user_type, 1)');
			//value binding
			$this->db->bind(':id', $data['id']);
      $this->db->bind(':name', $data['name']);
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':password', $data['password']);
			$this->db->bind(':user_type',$data['employment']);
			

			if($this->db->execute())
			{
				$this->db->query('INSERT INTO employee(employee_id,employee_name,nic,contact_number,gender,address,employment,existence) VALUES(:id, :name, :nic, :num, :gender, :address, :employment,1)');
				//value binding
				$this->db->bind(':id', $data['id']);
				$this->db->bind(':name', $data['name']);
				$this->db->bind(':nic', $data['nic']);
				$this->db->bind(':num', $data['tp_num']);
        $this->db->bind(':gender', $data['gender']);
				$this->db->bind(':address', $data['address']);
        $this->db->bind(':employment', $data['employment']);

				if($this->db->execute())
				{
					return true;
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


    //update selected employee's details
    public function updateEmployees($data)
    {
      $this->db->query('UPDATE user SET user_type=:employment WHERE user_id= :empId AND existence=1');
      $this->db->bind(':employment', $data['employment']);
      $this->db->bind(':empId', $data['empId']);

      //execute
      if($this->db->execute())
      {
        $this->db->query('UPDATE employee SET employee_name= :name, nic= :nic, contact_number=:tp_num, gender=:gender, address=:address, employment=:employment  WHERE employee_id= :empId AND existence=1');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':tp_num', $data['tp_num']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':employment', $data['employment']);
        $this->db->bind(':empId', $data['empId']);
        

        if($this->db->execute())
        {
          return true;
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

    //get the details of a relavant email owner
    public function getEmpByEmail($empId)
    {
      $this->db->query('SELECT * FROM employee WHERE employee_id = :empId AND existence=1' );
      $this->db->bind(':empId', $empId);

      $row = $this->db->single();
			return $row;
    }

    //delete a selected employee
    public function deleteEmployees($empId)
    {      
      $date1= date_create(strval($this->db->query('SELECT reg_date FROM user WHERE user_id= :empId AND existence=1')));
      $this->db->bind(':empId', $empId);
      $date2= date_create(date("Y-m-d"));
      $diff=intval(date_diff($date1,$date2));
      
      if($diff<30){
        $period ='less than a month';
      }
      else if ($diff<365){
        $m=intval($diff/30);
        $period= $m.' months';
      }
      else{
        $y=$diff/365;
        $m=intval(($diff%365)/30);
        $period=$y.'years '.$m.'months';
      }

      $this->db->query('INSERT INTO past_employee(user_id,service_time,emp_type) VALUES(:empId, :service_time,"system users") ');
      $this->db->bind(':empId', $empId);
      $this->db->bind(':service_time', $period);

      if($this->db->execute())
      {
        $this->db->query('UPDATE user SET existence=0 WHERE user_id= :empId');
        $this->db->bind('empId', $empId);

          if($this->db->execute())
          {
            $this->db->query('UPDATE employee SET existence=0 WHERE employee_id= :empId');
            $this->db->bind(':empId', $empId);

              if($this->db->execute())
              {
                return true;
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
      else
      {
        return false;
      }
    }

    //generate id for registering labours
    public function generateLabourId()
		{
			$this->db->query('SELECT * FROM laborer order by laborer_id desc limit 1');
			$row = $this->db->single();
			$lastId=$row->laborer_id;

			if($lastId == '')
			{
				$id='L1';
			}
			else
			{
				$id = substr($lastId,1);
				$id = intval($id);
				$id = "L".($id+1);
			}

			return $id;
		}

    //add newly registering labour's details
    public function addLabours($data)
    {		
		
      $this->db->query('INSERT INTO laborer(laborer_id,name,nic,contact_number,gender,address,existence) VALUES(:id, :name, :nic, :num, :gender, :address,1)');
      //value binding
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':nic', $data['nic']);
      $this->db->bind(':num', $data['tp_num']);
      $this->db->bind(':gender', $data['gender']);
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

    //update selected employee's details
    public function updateLabours($data)
    {
      $this->db->query('UPDATE laborer SET name= :name, nic= :nic, contact_number=:tp_num, gender=:gender, address=:address WHERE laborer_id= :LId AND existence=1');
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':nic', $data['nic']);
      $this->db->bind(':tp_num', $data['tp_num']);
      $this->db->bind(':gender', $data['gender']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':LId', $data['LId']);
      

      if($this->db->execute())
      {
        return true;
      }
      else
      {
        return false;
      }

    }

    //get the details of a relavant labour
    public function getLabourById($LId)
    {
      $this->db->query('SELECT * FROM laborer WHERE laborer_id = :LId AND existence=1' );
      $this->db->bind(':LId', $LId);

      $row = $this->db->single();
      return $row;
    }

    //delete a selected employee
    public function deleteLabours($LId)
    {      
      $date1= date_create(strval($this->db->query('SELECT reg_date FROM laborer WHERE laborer_id= :LId AND existence=1')));
      $this->db->bind(':LId', $LId);
      $date2= date_create(date("Y-m-d"));
      $diff=intval(date_diff($date1,$date2));
      
      if($diff<30){
        $period ='less than a month';
      }
      else if ($diff<365){
        $m=intval($diff/30);
        $period= $m.' months';
      }
      else{
        $y=$diff/365;
        $m=intval(($diff%365)/30);
        $period=$y.'years '.$m.'months';
      }

      $this->db->query('INSERT INTO past_employee(user_id,service_time,emp_type) VALUES(:LId, :service_time,"Labours") ');
      $this->db->bind(':LId', $LId);
      $this->db->bind(':service_time', $period);

      if($this->db->execute())
      {
        $this->db->query('UPDATE laborer SET existence=0 WHERE laborer_id= :LId');
        $this->db->bind('LId', $LId);
          if($this->db->execute())
          {
            return true;
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

    //to get all livestock deails
    public function get_livestockView()
    {
      $this->db->query('SELECT * FROM cattle WHERE existence=1');

      $result = $this->db->resultSet();

      return $result;
    }

    public function get_cattleDetails($cattleID)
    {
      $this->db->query('SELECT * FROM cattle WHERE cow_id = :cattle AND existence=1');
      $this->db->bind(':cattle', $cattleID);
      $result = $this->db->resultSet();

      return $result;
    }
   
    //to get all livestock deails
    public function get_dltCowview()
    {
      $this->db->query('SELECT cattle.cow_id, cattle.dob, cattle.age, cattle.gender, cattle.cow_breed, cattle.milking_status, cattle.reg_method, cattle.reg_date, cattle.bought_price,cattle.stall_id, removed_cattle.removed_date, removed_cattle.reason, removed_cattle.sold_price FROM cattle INNER JOIN removed_cattle ON cattle.cow_id = removed_cattle.cow_id;');

      $result = $this->db->resultSet();

      return $result;
    }

    public function get_deletedCattleDetails($cattleID)
    {
      $this->db->query('SELECT cattle.cow_id, cattle.dob, cattle.age, cattle.gender, cattle.cow_breed, cattle.milking_status, cattle.reg_method, cattle.reg_date, cattle.bought_price,cattle.stall_id, removed_cattle.removed_date, removed_cattle.reason, removed_cattle.sold_price FROM cattle INNER JOIN removed_cattle ON cattle.cow_id = removed_cattle.cow_id WHERE removed_cattle.cow_id= :cattle; ');
      $this->db->bind(':cattle', $cattleID);
      $result = $this->db->resultSet();

      return $result;
    }

    //to get all milk collection deails
    public function get_mcView()
    {
      $this->db->query('SELECT * FROM milk_collection');

      $result = $this->db->resultSet();

      return $result;
    }

    public function get_supOrdView()
    {
      $this->db->query('SELECT * FROM supply_order');

      $result = $this->db->resultSet();

      return $result;
    }

    //to get all production deails
    public function get_productionView()
    {
      $this->db->query('SELECT * FROM product');

      $result = $this->db->resultSet();

      return $result;
    }

    public function get_onsiteSalesView()
    {
      $this->db->query('SELECT * FROM onsite_sale');

      $result = $this->db->resultSet();

      return $result;
    }

    public function get_onlineSalesView()
    {
      $this->db->query('SELECT * FROM online_order');

      $result = $this->db->resultSet();

      return $result;
    }

    //to get all customer deails
    public function get_cusView()
    {
      $this->db->query('SELECT * FROM customer');

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

    public function get_supDetails($sID)
    {
      $this->db->query('SELECT * FROM supplier WHERE supplier_id = :supId');
      $this->db->bind(':supId', $sID);
      $result = $this->db->resultSet();

      return $result;
    }

    public function get_supFeedBacks()
    {
      $this->db->query('SELECT * FROM sup_feedback');

      $result = $this->db->resultSet();

      return $result;

    }

    public function get_cusFeedBacks()
    {
      $this->db->query('SELECT * FROM cus_feedback');

      $result = $this->db->resultSet();

      return $result;

    }

    //to get current employee details
    public function currentEmpSearch($search)
    {
      if(!empty($search)){
        $this->db->query("SELECT * From employee WHERE existence=1 AND employee_name LIKE '%$search%' ");
        // $this->db->bind(':search', $search);
        $result=$this->db->resultSet();
        return $result;
      }
      else{
        $this->db->query('SELECT * From employee WHERE existence=1');
        $result=$this->db->resultSet();
        return $result;
      }
    }

    //to get past employee details
    public function pastEmpSearch($search)
    {
      if(!empty($search)){
        $this->db->query("SELECT * From employee WHERE existence=0 AND employee_name LIKE '%$search%' ");
        // $this->db->bind(':search', $search);
        $result=$this->db->resultSet();
        return $result;
      }
      else{
        $this->db->query('SELECT * From employee WHERE existence=0');
        $result=$this->db->resultSet();
        return $result;
      }
    }

    //to get current labour details
    public function currentLabourSearch($search)
    {
      if(!empty($search)){
        $this->db->query("SELECT * From laborer WHERE existence=1 AND name LIKE '%$search%' ");
        // $this->db->bind(':search', $search);
        $result=$this->db->resultSet();
        return $result;
      }
      else{
        $this->db->query('SELECT * From laborer WHERE existence=1');
        $result=$this->db->resultSet();
        return $result;
      }
    }

    //to get past labour details
    public function pastLabourSearch($search)
    {
      if(!empty($search)){
        $this->db->query("SELECT * From laborer WHERE existence=0 AND employee_name LIKE '%$search%' ");
        // $this->db->bind(':search', $search);
        $result=$this->db->resultSet();
        return $result;
      }
      else{
        $this->db->query('SELECT * From laborer WHERE existence=0');
        $result=$this->db->resultSet();
        return $result;
      }
    }

    




  }

?>
