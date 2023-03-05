<?php

  class Admin_Model
  {
    private $db;

    public function __construct()
    {
      $this->db = new Database();
    }

    //to get all employee deails
    public function get_empView()
    {
      $this->db->query('SELECT * FROM employee');

      $result = $this->db->resultSet();

      return $result;
    }

    //to get all employee deails for user profile
    public function get_empProfileView($empId)
    {
      $this->db->query('SELECT * FROM employee where employee_id= :empId');
      $this->db->bind(':empId', $empId);

      $result = $this->db->resultSet();

      return $result;
    }

    // check email is already registered or not in the system db
    public function findEmployeeByEmail($email)
		{
			$this->db->query('SELECT * FROM user WHERE email = :email');
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
      $this->db->query('INSERT INTO user(user_id,email,password,user_type) VALUES(:id, :email, :password, :user_type)');
			//value binding
			$this->db->bind(':id', $data['id']);
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':password', $data['password']);
			$this->db->bind(':user_type',$data['employment']);
			

			if($this->db->execute())
			{
				$this->db->query('INSERT INTO employee(employee_id,employee_name,nic,contact_number,gender,address,image,employment) VALUES(:id, :name, :nic, :num, :gender, :address, :img, :employment)');
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
      $this->db->query('UPDATE user SET user_type=:employment  WHERE user_id= :empId');
      $this->db->bind(':employment', $data['employment']);
      $this->db->bind(':empId', $data['empId']);

      //execute
      if($this->db->execute())
      {
        $this->db->query('UPDATE employee SET employee_name= :name, nic= :nic, contact_number=:tp_num, gender=:gender, address=:address, image= :img, employment=:employment  WHERE employee_id= :empId');
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
      $this->db->query('SELECT * FROM employee WHERE employee_id = :empId' );
      $this->db->bind(':empId', $empId);

      $row = $this->db->single();
			return $row;
    }

    //delete a selected employee
    public function deleteEmployees($empId)
    {      
      $this->db->query('DELETE FROM user WHERE user_id= :empId');
      $this->db->bind('empId', $empId);

      //execute
      if($this->db->execute())
      {
        $this->db->query('DELETE FROM employee WHERE employee_id= :empId');
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




  }

?>
