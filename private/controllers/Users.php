<?php
    class Users extends  Controller
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

            $customer = new Customer();
            
            $query = "SELECT * FROM customers WHERE role IN ('Customer') ORDER BY id DESC";
            $data = $customer->query($query);

            if (Auth::access('Admin')) {
                $this->view('users', [
                    'rows'=>$data,
                ]);
            }
            else {
                # code...
                $this->view('access-denied');
            }
        }

        public function edit($id = null)
        {

            $users = new Customer();

            $errors = [];

            if(count($_POST) > 0 && Auth::access('Supper_admin'))
            {
                $data = $_POST;
        
                // Handle optional password
                if (!isset($data['password']) || trim($data['password']) === '') {
                    unset($data['password'], $data['password2']);
                }
        
                // Handle file upload
                $allowed = [
                    'image/jpeg', 'image/png', 'image/gif', 'image/webp',
                    'image/bmp', 'image/tiff', 'image/svg+xml'
                ];

                if ($_FILES['image']['error'] == 0) {
                    if (in_array($_FILES['image']['type'], $allowed)) {
                        if ($_FILES['image']['size'] <= 5 * 1024 * 1024) {
                            $folder = "uploads/";
                            if (!file_exists($folder)) mkdir($folder, 0777, true);

                            $file_name = preg_replace("/[^a-zA-Z0-9\-_\.]/", "", basename($_FILES['image']['name']));
                            $destination = $folder . $file_name;

                            if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                                $_POST['image'] = $destination;
                            } else {
                                $errors[] = "Error uploading the image.";
                            }
                        } else {
                            $errors[] = "File size exceeds the 5MB limit.";
                        }
                    } else {
                        $errors[] = "Invalid file type.";
                    }
                } else {
                    $errors[] = "No image uploaded or error in upload.";
                }
        
                // Debug check (REMOVE after testing)
                // show($data) or die();
        
                if (empty($errors)) {
                    $users->update($id, $data);
                    $this->redirect('users');
                }
            }

            $row = $users->where('id', $id);

            if (Auth::access('Supper_admin')) {
                    # code...
                $this->view('users.edit', [
                    'row'=>$row,
                    'errors'=>$errors
                ]);
            }
            else {
                # code...
                $this->view('access-denied');
            }
            
        }

        public function delete($id = null)
        {

            $users = new Customer();

            $errors = [];

            if(count($_POST) > 0 && Auth::access('Supper_admin'))
            {

                $users->delete($id); 
                $this->redirect('users');
            }

            $row = $users->where('id', $id);
                if (Auth::access('Supper_admin')) {
                    $this->view('users.delete', [
                        'row'=>$row,
                        'errors'=>$errors,
                    ]);
            }
            else {
                # code...
                $this->view('access-denied');
            }
        }
    }