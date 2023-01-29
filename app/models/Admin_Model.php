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

    //get the details of a relavant email owner
    public function getEmpByEmail($email)
    {
      $this->db->query('SELECT * FROM employee WHERE email = :email' );
      $this->db->bind(':email', $email);

      $row = $this->db->single();
			return $row;
    }

    // check email is already registered or not
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

    //generate id for employees
    public function findEmployeeId()
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


    public function addEmployees($data)
    {
      $this->db->query('INSERT INTO employee(employee_id, employee_name, nic, dob, contact_number,gender, address, employment, email) VALUES(:id, :name, :nic, :dob, :tp_num,:gender, :address, :employment, :email) ');
      //value binding
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':nic', $data['nic']);
			$this->db->bind(':dob', $data['dob']);
      $this->db->bind(':tp_num', $data['tp_num']);
      $this->db->bind(':gender', $data['gender']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':employment', $data['employment']);
			$this->db->bind(':email', $data['email']);

      if($this->db->execute())
      {
        $this->db->query('INSERT INTO user(user_id, name, nic, email, contact_number, address, password, user_type) VALUES(:id, :name, :nic, :email, :tp_num, :address, :pw, :employment) ');
        //value binding
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
  			$this->db->bind(':nic', $data['nic']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':tp_num', $data['tp_num']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':pw', $data['password']);
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



    public function updateEmployees($data)
    {
      $this->db->query('UPDATE employee SET employee_name= :name, nic= :nic, dob= :dob, contact_number=:tp_num,gender=:gender,address=:address,employment=:employment  WHERE email= :email');
      // $this->db->bind(':id', $data['id']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':nic', $data['nic']);
			$this->db->bind(':dob', $data['dob']);
      $this->db->bind(':tp_num', $data['tp_num']);
      $this->db->bind(':gender', $data['gender']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':employment', $data['employment']);
      $this->db->bind(':email', $data['email']);


      //execute
      if($this->db->execute())
      {
        $this->db->query('UPDATE user SET name= :name, nic= :nic, contact_number=:tp_num, address=:address, user_type=:employment  WHERE email= :email');
        // $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':tp_num', $data['tp_num']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':employment', $data['employment']);
        $this->db->bind(':email', $data['email']);

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

    public function deleteEmployees($email)
    {
      $this->db->query('DELETE FROM employee WHERE email= :email');
      $this->db->bind(':email', $email);

      //execute
      if($this->db->execute())
      {
        $this->db->query('DELETE FROM user WHERE email= :email');
        $this->db->bind(':email', $email);

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

  }

?>
