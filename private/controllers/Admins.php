<?php
    class Admins extends  Controller
    {
        public function __construct()
        {
            // Checking if the user is logged in on every request
            if (!Auth::logged_in()) {
                $this->redirect("login");
            }
        }
        
        public function index()
        {
            $user = new User();
            $salon_id = Auth::getSalon_id();

            $query = "SELECT * FROM users WHERE salon_id = :salon_id && role IN ('Admin') || role IN ('Supper_admin') ORDER BY id DESC";
            $arr['salon_id'] = $salon_id;

            if (isset($_GET['find'])) {
                # code...
                $find = '%' . $_GET['find'] . '%';
                $query = "SELECT * FROM users WHERE salon_id = :salon_id && role IN ('Admin') || role IN ('Supper_admin') && (name LIKE :find || surname LIKE :find) ORDER BY id DESC";
                $arr['find'] = $find;
            }
            
            $data = $user->query($query, $arr);

                $this->view('admins', [
                    'rows'=>$data,
                ]);
            
        }

       public function edit($id = '')
        {
            if (!Auth::access('Supper_admin')) {
                return $this->view('access-denied');
            }

            $admins = new User();
            $errors = [];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = $_POST;

                // Remove password fields if empty (to avoid updating with a blank password)
                if (empty(trim($data['password']))) {
                    unset($data['password'], $data['password2']);
                }

                // Upload image if provided
                if (!empty($_FILES['image']['name'])) {
                    $uploadedImage = upload_image($_FILES);
                    if ($uploadedImage) {
                        $data['image'] = $uploadedImage;
                    }
                }

                // Update user data
                $admins->update($id, $data);
                return $this->redirect('admins');
            }

            // Load user row for editing
            $row = $admins->where('id', $id);

            $this->view('admins.edit', [
                'row' => $row,
                'errors' => $errors
            ]);
        }

        public function delete($id = '')
        {
            if (!Auth::logged_in()) {
               $this-> redirect("login");
            }

            $admins = new User();

            $errors = array();

            if(count($_POST) > 0 && Auth::access('Supper_admin'))
            {

                $admins->delete($id);
                $this->redirect('admins');
            }

            $row = $admins->where('id', $id);
                if (Auth::access('Supper_admin')) {
                    $this->view('admins.delete', [
                        'row'=>$row
                    ]);
            }
            else {
                # code...
                $this->view('access-denied');
            }
        }
    }