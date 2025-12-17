<?php
    class Customer extends Model
	{
        protected $table = 'customers';

		protected $allowedColumns = [
			'email',
			'password',
			'image',
			'role',
			'occupation',
			'date',
			'gender',
			'salon_id',
			'name',
			'surname',
			'birthday',
		];

		protected $beforeInsert = [ 
            'make_user_id',
            'hash_password',
        ];

		public function validate($DATA, $id = '')
		{
			$this->errors = [];

			//check for name
            if (empty($DATA['name']) || !preg_match('/^[a-zA-Z]+$/', trim($DATA['name']))) {
                $this->errors['name'] = "Only letters allowed in name";
            }

            //check for surname
            if (empty($DATA['surname']) || !preg_match('/^[a-zA-Z]+$/', $DATA['surname'])) {
                $this->errors['surname'] = "Only letters allowed in surname";
            }

            //check for email
            if (empty($DATA['email']) || !filter_var($DATA['email'], FILTER_VALIDATE_EMAIL)) {
                $this->errors['email'] = "Email is not valid";
            }

            //check if email exists
            if (trim($id == "")) {
                    # code...
                    if ($this->where('email', $DATA['email'])) {
                    $this->errors['email'] = "Email already exists";
                }
            }
            else {
                # code...
                if ($this->query("SELECT email FROM $this->table WHERE email = :email && user_id != :id", ['email' => $DATA['email'], 'id' => $id])) {
                    $this->errors['email'] = "Email already exists";
                }
            }

            //check for password
            if (isset($DATA['password'])) {
                # code...
                if (empty($DATA['password']) || $DATA['password'] != $DATA['password2']) {
                    $this->errors['password'] = "Passwords do not match";
                }
                
                //check for password length
                if (strlen($DATA['password']) < 8) {
                    $this->errors['password'] = "Password must be at least 8 characters long";
                }
            }

            //check for birthday
            if (empty($DATA['birthday']) || !preg_match('/^[0-9 A-Z -~+_.?#=!&;,:%@$\/|*]+$/', $DATA['birthday'])) {
                $this->errors['birthday'] = "Birthday is incorrect";
            }

            //validate gender
            if (empty($DATA['gender'])) {
                # code...
                $this->errors['gender'] = "Please select Gender";
            }
            else {
                # code...
                if ($DATA['gender'] != "Male" && $DATA['gender'] != "Female") {
                    # code...
                    $this->errors['gender'] = "Please select a valid Gender";
                }
            }

            //validate role
            if (empty($DATA['role'])) {
                # code...
                $this->errors['role'] = "Please select role";
            }
            else {
                # code...
                if ($DATA['role'] != "Supper_admin" && $DATA['role'] != "Admin" && $DATA['role'] != "Staff" && $DATA['role'] != "Customer") {
                    # code...
                    $this->errors['role'] = "Please select a valid role";
                }
            }

			/*
			if(empty($data['terms']))
			{
				$this->errors['terms'] = "Please accept the terms and conditions";
			}
			*/

			if (count($this->errors) == 0) {
                return true;
            }

            return false;
		}

		public function make_user_id($data)
        {

            $data['user_id'] = strtolower($data['name'] . "." . $data['surname']);

            while ($this->where('user_id', $data['user_id'])) {
                $data['user_id'] .= rand(10,9999);
            }
            return $data;
        }

        public function get_customer_count()
		{
			$customers = new Customer();
			if (Auth::access('Admin')) {
				# code...
				$query = "SELECT * FROM customers";
				$customer_count = $customers->query($query);
			}

			if ($customer_count) {
				# code...
				return count($customer_count);
			}
			
			return 0;
		}

		public function hash_password($data)
        {
            if (!empty($data['password'])) {
                // Hash the password only if it's new / not already hashed
                if (!password_get_info($data['password'])['algo']) {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                }
            } else {
                // If password is empty during update, remove it so it doesn’t overwrite
                unset($data['password']);
            }

            return $data;
        }

        public function get_customer_count_last_month()
        {
            $customers = new Customer();
            $lastMonth = date('Y-m', strtotime('-1 month'));
            $result = $customers->query("SELECT COUNT(*) AS count FROM customers WHERE DATE_FORMAT(date, '%Y-%m') = ?", [$lastMonth]);
        
            return $result[0]->count ?? 0;
        }
	}