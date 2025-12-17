<?php
    class Password_resets extends Model
    {
        protected $table = 'customers';
    
        protected $allowedColumns = [
            'password',
        ];
    
        protected $beforeInsert = [
            'makeUserId',
            'hashPassword',
        ];
    
        protected $beforeUpdate = [
            'hashPassword'
        ];
    
        public function validate($data)
        {
            $this->errors = [];

            $this->validatePassword($data['password'] ?? '', $data['password2'] ?? '');
    
            return empty($this->errors);
        }
    
        private function validatePassword($password, $password2)
        {
            $password = trim($password);
            $password2 = trim($password2);
    
            if (empty($password)) {
                $this->errors['password'] = "Password is required.";
            } elseif (strlen($password) < 8) {
                $this->errors['password'] = "Password must be at least 8 characters long.";
            } elseif ($password !== $password2) {
                $this->errors['password'] = "Password and confirm Password do not match.";
            } else {
                $this->validatePasswordStrength($password);
            }
        }
    
        private function validatePasswordStrength($password)
        {
            if (!preg_match('/[A-Z]/', $password)) {
                $this->errors['password'] = "Password must contain at least one uppercase letter.";
            }
            if (!preg_match('/\d/', $password)) {
                $this->errors['password'] = "Password must contain at least one number.";
            }
            if (!preg_match('/[\W_]/', $password)) {
                $this->errors['password'] = "Password must contain at least one special character.";
            }
        }

        public function makeUserId($data)
        {
            $data['user_id'] = strtolower($data['name'] . "." . $data['surname']);
            while ($this->where('user_id', $data['user_id'])) {
                $data['user_id'] .= rand(10, 9999);
            }
            return $data;
        }
    
        public function getUserCount()
        {
            $users = new User();
            if (Auth::access('admin')) {
                $userCount = $users->query("SELECT * FROM users");
                return $userCount ? count($userCount) : 0;
            }
            return 0;
        }
    
        public function hashPassword($data)
        {
            if (isset($data['password'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            }
            return $data;
        }
    }