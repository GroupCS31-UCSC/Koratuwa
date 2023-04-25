<?php

	class Users_Model
	{
		private $db;

		public function __construct()
		{
			$this->db = new Database();
		}

		//check the supplier is registered using given email
		public function findSupplierByEmail($email)
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

		//save generated otp code in the database
		public function saveOtpCode($email, $otp)
		{
			$this->db->query('UPDATE user SET otp_code=:otp WHERE email=:email AND existence=1');
			$this->db->bind(':email', $email);
			$this->db->bind(':otp', $otp);

			if($this->db->execute())
			{
				return true;
			}
			else
			{
				return false;
			}

		}

		//check entered otp and saved otp codes are matched or not
		public function otpVerify($otp, $email)
		{
			$enteredOtp= strval($otp);

			$this->db->query('SELECT otp_code FROM user WHERE email = :email AND existence=1');
			$this->db->bind(':email', $email);

			$row = $this->db->single();
			$savedOtp=strval($row->otp_code);

			if($enteredOtp == $savedOtp)
			{
				return true;
			}
			else{
				return false;
			}	
		}

		//save newly updated password into the db
		public function setNewPw($email, $password)
		{
			$this->db->query('UPDATE user SET password=:pw WHERE email=:email AND existence=1 ');
			$this->db->bind(':email', $email);
			$this->db->bind(':pw', $password);

			if($this->db->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		//check entered pw and current pw is mismatched
		public function checkCurrentPw($oldPw,$email)
		{
			$this->db->query('SELECT password FROM user WHERE email = :email AND existence=1');
			$this->db->bind(':email', $email);

			$row = $this->db->single();

			$hashed_password= $row->password;
			
			if(password_verify($oldPw, $hashed_password))
			{
				return false;
			}
			else    //entered pw is wrong, it is not the current pw of the user
			{
				return true;
			}
			
		}

		//get the user name of provided email
		public function getUserName($email)
		{
			$this->db->query('SELECT user_name FROM user WHERE email = :email AND existence=1');
			$this->db->bind(':email', $email);

			$row = $this->db->single();

			return $row->user_name;
			
		}

		//create id for supplier
		public function generateSupplierId()
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

		//Register the supplier
		public function registerAsSupplier($data)
		{

			$this->db->query('INSERT INTO user(user_id,user_name,email,password,user_type,existence) VALUES(:id, :name, :email, :password, :user_type, 1)');
			//value binding
			$this->db->bind(':id', $data['id']);
			$this->db->bind(':name', $data['name']);
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':password', $data['password']);
			$this->db->bind(':user_type','Supplier');
			

			if($this->db->execute())
			{
				$this->db->query('INSERT INTO supplier(supplier_id,name,nic,contact_number,address) VALUES(:id, :name, :nic, :num, :address)');
				//value binding
				$this->db->bind(':id', $data['id']);
				$this->db->bind(':name', $data['name']);
				$this->db->bind(':nic', $data['nic']);
				$this->db->bind(':num', $data['tp_num']);
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
			else
			{
				return false;
			}
		}

		//check the customer is registered using given email
		public function findCustomerByEmail($email)
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

		//create id for customer
		public function generateCustomerId()
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
		
		//Register the customer
		public function registerAsCustomer($data)
		{
			$this->db->query('INSERT INTO user(user_id,user_name,email,password,user_type,eistence) VALUES(:id, :name, :email, :password, :user_type, 1)');
			//value binding
			$this->db->bind(':id', $data['id']);
			$this->db->bind(':name', $data['name']);
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':password', $data['password']);
			$this->db->bind(':user_type','Customer');
			

			if($this->db->execute())
			{
				$this->db->query('INSERT INTO customer(customer_id,name,nic,contact_number,address) VALUES(:id, :name, :nic, :num, :address)');
				//value binding
				$this->db->bind(':id', $data['id']);
				$this->db->bind(':name', $data['name']);
				$this->db->bind(':nic', $data['nic']);
				$this->db->bind(':num', $data['tp_num']);
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
			else
			{
				return false;
			}
		}

		//check the user is registered using given email
		public function findUserByEmail($email)
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

		//login the user
		public function login($email, $password)
		{
			$this->db->query('SELECT * FROM user WHERE email = :email AND existence=1');
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


		//find the user type of logged user
		public function findUserRole($email)
		{
			$this->db->query('SELECT user_type FROM user WHERE email = :email AND existence=1');
			$this->db->bind(':email', $email);

			$row = $this->db->single();

			return $row->user_type;
		}

		// get user profile details 
		public function get_userProfile($userId){

			$this->db->query('SELECT user_type from user WHERE user_id= :userId AND existence=1 ');
			$this->db->bind(':userId', $userId);
			$user = $this->db->single();
			// echo $user_type;
			$user_type =strval($user->user_type);
			echo $user_type;
			
			if($user_type == 'Supplier')
			{
				echo '1';
				$this->db->query('SELECT * FROM supplier WHERE supplier_id=:userId');
				$this->db->bind(':userId', $userId);
	
				$result = $this->db->resultSet();
	
				return $result;	
			}
			elseif($user_type == 'Customer')
			{
				echo '2';
				$this->db->query('SELECT * FROM customer WHERE customer_id=:userId');
				$this->db->bind(':userId', $userId);
	
				$result = $this->db->resultSet();
	
				return $result;	
			}
			elseif($user_type == 'Admin')
			{
				echo '21';
				$this->db->query('SELECT * FROM admin WHERE admin_id=:userId');
				$this->db->bind(':userId', $userId);
	
				$result = $this->db->resultSet();
	
				return $result;	
			}
			else
			{
				echo '3';
				$this->db->query('SELECT * FROM employee WHERE employee_id=:userId');
				$this->db->bind(':userId', $userId);
	
				$result = $this->db->resultSet();
	
				return $result;	
			}
			// return $result;
			echo '4';

				
		}


	}

 ?>
