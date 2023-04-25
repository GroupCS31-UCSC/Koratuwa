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
				$this->db->query('INSERT INTO employee(employee_id,employee_name,nic,contact_number,gender,address,image,employment,existence) VALUES(:id, :name, :nic, :num, :gender, :address, :img, :employment,1)');
				//value binding
				$this->db->bind(':id', $data['id']);
				$this->db->bind(':name', $data['name']);
				$this->db->bind(':nic', $data['nic']);
				$this->db->bind(':num', $data['tp_num']);
        $this->db->bind(':gender', $data['gender']);
				$this->db->bind(':address', $data['address']);
        $this->db->bind(':img', $data['image']);
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
        $this->db->query('UPDATE employee SET employee_name= :name, nic= :nic, contact_number=:tp_num, gender=:gender, address=:address, image= :img, employment=:employment  WHERE employee_id= :empId AND existence=1');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':tp_num', $data['tp_num']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':img', $data['image']);
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
      $this->db->query('UPDATE user SET existence=0 WHERE user_id= :empId');
      $this->db->bind('empId', $empId);

      //execute
      if($this->db->execute())
      {
        $this->db->query('UPDATE employee SET existence=0 WHERE employee_id= :empId');
        $this->db->bind(':empId', $empId);

        if($this->db->execute())
        {
          $date1= date_create(strval($this->db->query('SELECT reg_date FROM user WHERE user_id= :empId AND existence=1')));
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
          $this->db->query('INSERT INTO past_employee(user_id,service_time) VALUES(:empId, :p) ');
          $this->db->bind(':empId', $empId);
          $this->db->bind(':p', $period);

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

    //to get all livestock deails
    public function get_livestockView()
    {
      $this->db->query('SELECT * FROM cattle');

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

    //to get all production deails
    public function get_productionView()
    {
      $this->db->query('SELECT * FROM product_category');

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

    //to get all employee details
    // public function allEmpSearch($search)
    // {
    //   if(!empty($search)){
    //     $this->db->query("SELECT * From employee WHERE employee_name LIKE '%$search%'");
    //     $result=$this->db->resultSet();
    //     return $result;
    //   }
    //   else{
    //     $this->db->query('SELECT * From employee ');
    //     $result=$this->db->resultSet();
    //     return $result;
    //   }
    // }

    




  }

?>
