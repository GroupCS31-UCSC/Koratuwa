<?php

	class Users_Model
	{
		private $db;

		public function __construct()
		{
			$this->db = new Database();
		}

		//Register the supplier
		public function registerAsSupplier($data)
		{
			$this->db->query('INSERT INTO supplier(supplier_id,name,nic,contact_number,address,email) VALUES(:id, :name, :nic, :num, :address, :email)');
			//value binding
			$this->db->bind(':id', $data['id']);
			$this->db->bind(':name', $data['name']);
			$this->db->bind(':nic', $data['nic']);
			$this->db->bind(':num', $data['tp_num']);
			$this->db->bind(':address', $data['address']);
			$this->db->bind(':email', $data['email']);

			if($this->db->execute())
			{
				$this->db->query('INSERT INTO user(user_id,name,nic,email,contact_number,address,password,user_type) VALUES(:id, :name, :nic, :email, :tp_num, :address, :password, :user_type)');
				//value binding
				$this->db->bind(':id', $data['id']);
				$this->db->bind(':name', $data['name']);
				$this->db->bind(':nic', $data['nic']);
				$this->db->bind(':email', $data['email']);
				$this->db->bind(':tp_num', $data['tp_num']);
				$this->db->bind(':address', $data['address']);
				$this->db->bind(':password', $data['password']);
				$this->db->bind(':user_type','Supplier');

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

		//Register the customer
		public function registerAsCustomer($data)
		{
			$this->db->query('INSERT INTO customer(customer_id,name,nic,contact_number,address,email) VALUES(:id, :name, :nic, :num, :address, :email)');
			//value binding
			$this->db->bind(':id', $data['id']);
			$this->db->bind(':name', $data['name']);
			$this->db->bind(':nic', $data['nic']);
			$this->db->bind(':num', $data['tp_num']);
			$this->db->bind(':address', $data['address']);
			$this->db->bind(':email', $data['email']);

			if($this->db->execute())
			{
				$this->db->query('INSERT INTO user(user_id,name,nic,email,contact_number,address,password,user_type) VALUES(:id, :name, :nic, :email, :tp_num, :address, :password, :user_type)');
				//value binding
				$this->db->bind(':id', $data['id']);
				$this->db->bind(':name', $data['name']);
				$this->db->bind(':nic', $data['nic']);
				$this->db->bind(':email', $data['email']);
				$this->db->bind(':tp_num', $data['tp_num']);
				$this->db->bind(':address', $data['address']);
				$this->db->bind(':password', $data['password']);
				$this->db->bind(':user_type','Customer');

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


		//Find the supplier
		public function findSupplierByEmail($email)
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

		public function findCustomerByEmail($email)
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

		public function findUserByEmail($email)
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

		//login the user
		public function login($email, $password)
		{
			$this->db->query('SELECT * FROM user WHERE email = :email');
			$this->db->bind(':email', $email);

			$row = $this->db->single();

			$hashed_password= $row->password;
			if(password_verify($password, $hashed_password))
			{
				return $row;
			}
			else
			{
				return false;
			}
		}


		public function findUserRole($email)
		{
			$this->db->query('SELECT user_type FROM user WHERE email = :email');
			$this->db->bind(':email', $email);

			$row = $this->db->single();

			return $row->user_type;
		}

		public function FindSupplierId()
		{
			$this->db->query('SELECT * FROM supplier order by supplier_id desc limit 1');
			$row = $this->db->single();
			$lastId=$row->supplier_id;

			if($lastId == '')
			{
				$id='SUP101';
			}
			else
			{
				$id = substr($lastId,3);
				$id = intval($id);
				$id = "SUP".($id+1);
			}

			return $id;
		}

		public function FindCustomerId()
		{
			$this->db->query('SELECT * FROM customer order by customer_id desc limit 1');
			$row = $this->db->single();
			$lastId=$row->customer_id;

			if($lastId == '')
			{
				$id='CUS101';
			}
			else
			{
				$id = substr($lastId,3);
				$id = intval($id);
				$id = "CUS".($id+1);
			}

			return $id;
		}


	}

 ?>
