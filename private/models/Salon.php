<?php
    class Salon extends Model
    {
        protected $table = 'salons'; 

        protected $allowedColumns = [
            'store_name',
            'store_phone',
            'store_email',
            'store_address',
            'store_owner',
            'city',
            'state',
            'country',
            'postal_code',
            'description',
            'image',
            'slider',
            'user_image',
            'user_id',
            'date',
        ];

        protected $beforeInsert = [
            'make_user_id',
            'make_salon_id',
        ];

        protected $afterSelect = [
            'get_user',
        ];

        public function validate(array $data, $id = ''): bool
        {
            $this->errors = [];
        
            // Validate each required field
            $this->validateName($data['store_name'] ?? null);
            $this->validateEmail($data['store_email'] ?? null, $id);
            $this->validatePhone($data['store_phone'] ?? null);
            $this->validateAddress($data['store_address'] ?? null);
            $this->validateOwner($data['store_owner'] ?? null);
            $this->validateCity($data['city'] ?? null);
            $this->validateState($data['state'] ?? null);
            $this->validateCountry($data['country'] ?? null);
            $this->validatePostalCode($data['postal_code'] ?? null);
            $this->validateDescription($data['description'] ?? null);
            // $this->validateImage($data['image'] ?? null);

            return empty($this->errors);
        }

        private function validateName(?string $name): void
        {
            if (empty($name)) {
                $this->errors['store_name'] = "A store name is required";
            } elseif (!preg_match('/^[a-zA-Z\s#%&.]+$/', $name)) {
                $this->errors['store_name'] = "Store name can only contain letters, spaces, and the characters #, %, &.";
            }
        }

        private function validateEmail(?string $email, $id): void
        {
            if (empty(trim($email)) || !filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
                $this->errors['store_email'] = "Email is not valid";
            }

            // Check if email exists
            if (empty($id)) {
                if ($this->where('store_email', $email)) {
                    $this->errors['store_email'] = "Email already exists";
                }
            } 
            else {
                if ($this->query("SELECT store_email FROM $this->table WHERE store_email = :store_email AND user_id != :id", ['store_email' => $email, 'id' => $id])) {
                    $this->errors['store_email'] = "Email already exists";
                }
            }
        }

        private function validatePhone(?string $phone): void
        {
            if (empty($phone) || !preg_match('/^\+?[0-9]{7,15}$/', trim($phone))) {
                $this->errors['store_phone'] = "Invalid phone number format";
            }
        }

        // private function validateImage(?string $image): void
        // {
        //     if (empty($image)) {
        //         $this->errors['image'] = "Invalid image format";
        //     }
        // }

        private function validateAddress(?string $address): void
        {
            if (empty($address) || !preg_match('/^[a-zA-Z0-9\s,.-]+$/', trim($address))) {
                $this->errors['store_address'] = "Address contains invalid characters";
            }
        }

        private function validateOwner(?string $owner): void
        {
            if (empty($owner)) {
                $this->errors['store_owner'] = "A store owner is required";
            } elseif (!preg_match('/^[a-zA-Z\s#%&.]+$/', $owner)) {
                $this->errors['store_owner'] = "Store owner can only contain letters, spaces, and the characters #, %, &.";
            }
        }

        private function validateDescription(?string $description): void
        {
            if (empty($description)) {
                $this->errors['description'] = "A store description is required";
            } elseif (!preg_match('/^[a-zA-Z\s#%&.]+$/', $description)) {
                $this->errors['description'] = "Store description can only contain letters, spaces, and the characters #, %, &.";
            }
        }

        private function validatePostalCode(?string $postalCode): void
        {
            if (empty($postalCode)) {
                $this->errors['postal_code'] = "A store postal code is required";
            } elseif (!preg_match('/^[a-zA-Z0-9\s#%&.]+$/', $postalCode)) {
                $this->errors['postal_code'] = "Store postal code can only contain letters, spaces, and the characters #, %, &.";
            }
        }

        private function validateCountry(?string $country): void
        {
            if (empty($country)) {
                $this->errors['country'] = "A store country is required";
            } elseif (!preg_match('/^[a-zA-Z\s#%&.]+$/', $country)) {
                $this->errors['country'] = "Store country can only contain letters, spaces, and the characters #, %, &.";
            }
        }

        private function validateState(?string $state): void
        {
            if (empty($state)) {
                $this->errors['state'] = "A store state is required";
            } elseif (!preg_match('/^[a-zA-Z\s#%&.]+$/', $state)) {
                $this->errors['state'] = "Store state can only contain letters, spaces, and the characters #, %, &.";
            }
        }

        private function validateCity(?string $city): void
        {
            if (empty($city)) {
                $this->errors['city'] = "A store city is required";
            } elseif (!preg_match("/^[a-zA-Z\s#%&']+$/", $city)) {
                $this->errors['city'] = "Store city can only contain letters, spaces, and the characters #, %, &, and '.";
            }
        }

        public function make_user_id($data)
        {
            if(isset($_SESSION['USER']->user_id)){
                $data['user_id'] = $_SESSION['USER']->user_id;
            }
            return $data;
        }

        public function make_store_id($data)
        {
            $data['store_id'] = random_string(60);
            return $data;
        }

        public function get_user($data)
        {
            $user = new User();

            foreach ($data as $key => $row) {
                $result = $user->where('user_id', $row->user_id);
                $data[$key]->user = is_array($result) ? $result[0] : false;
            }

            return $data;
        }
    }
