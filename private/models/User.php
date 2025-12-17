<?php
    class User extends Model
	{
        protected $table = 'users';

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
			'branch',
			'surname',
			'birthday',
			'monday',
			'tuesday',
			'wednesday',
			'thursday',
			'friday',
			'saturday',
			'sunday',
		];

		protected $beforeInsert = [
            'make_user_id',
            'make_salon_id',
            'hash_password',
        ];

        protected $beforeUpdate = [
            'hash_password'
        ];

		public function validate($DATA, $id = null )  
		{
			$this->errors = [];

			//check for name
            if (empty($DATA['name']) || !preg_match('/^[a-zA-Z]+$/', trim($DATA['name']))) {
                $this->errors['name'] = "Only letters allowed in name";
            }

            //check for surname
            if (empty($DATA['surname']) || !preg_match('/^[a-zA-Z]+$/', trim($DATA['surname']))) {
                $this->errors['surname'] = "Only letters allowed in surname";
            }

            //check for email
            if (empty(trim($DATA['email'])) || !filter_var(trim($DATA['email'], FILTER_VALIDATE_EMAIL))) {
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
                if (empty(trim($DATA['password'])) || trim($DATA['password']) != trim($DATA['password2'])) {
                    $this->errors['password'] = "Passwords do not match";
                }
                
                //check for password length
                if (strlen(trim($DATA['password'])) < 8) {
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

            //validate gender
            // if (empty($DATA['branch'])) {
            //     # code...
            //     $this->errors['branch'] = "Please select branch";
            // }
            // else {
            //     # code...
            //     if ($DATA['branch'] != "East London" && $DATA['branch'] != "Mthatha") {
            //         # code...
            //         $this->errors['branch'] = "Please select a valid branch";
            //     }
            // }

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

        public function make_salon_id($data)
        {
            if (isset($_SESSION['USER']->salon_id)){
                $data['salon_id'] = $_SESSION['USER']->salon_id;
            }
            return $data;
        }

        public function get_user_count()
		{
			$users = new User();
			if (Auth::access('Admin')) {
				# code...
				$query = "SELECT * FROM users";
				$user_count = $users->query($query);
			}

			if ($user_count) {
				# code...
				return count($user_count);
			}
			
			return 0;
		}

		public function hash_password($data)
        {
            if (isset($data['password'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            }

            return $data;
        }
	}