<?php
    class Staff_members extends  Controller
    {
        public function index()
        {
            if (!Auth::logged_in()) {
               $this-> redirect("login");
            }

            $user = new User();

            $query = "SELECT * FROM users WHERE role IN ('Staff') ORDER BY id DESC";
            
            $data = $user->query($query);

            if (Auth::access('Admin')) {
                $this->view('staff_members', [
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
            if (!Auth::logged_in()) {
                $this->redirect("login");
            }
        
            $staff_members = new User();
            $errors = [];
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && Auth::access('Supper_admin')) {
                $data = $_POST;
        
                // Handle optional password
                if (!isset($data['password']) || trim($data['password']) === '') {
                    unset($data['password'], $data['password2']);
                }
        
                // ✅ IMAGE UPLOAD
                if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                    $uploadedImage = upload_image($_FILES);
                    if ($uploadedImage) {
                        $data['image'] = $uploadedImage;
                    } else {
                        $errors['image'] = "Image upload failed or invalid image type.";
                    }
                }
        
                // Debug check (REMOVE after testing)
                // show($data) or die();
        
                if (empty($errors)) {
                    $staff_members->update($id, $data);
                    $this->redirect('staff');
                }
            }
        
            $row = $staff_members->where('id', $id);
        
            if (Auth::access('Supper_admin')) {
                $this->view('staff_members.edit', [
                    'row' => $row,
                    'errors' => $errors
                ]);
            } else {
                $this->view('access-denied');
            }
        }

        public function delete($id = null)
        {
            if (!Auth::logged_in()) {
               $this-> redirect("login");
            }

            $staff_members = new User();

            $errors = array();

            if(count($_POST) > 0 && Auth::access('Supper_admin'))
            {

                $staff_members->delete($id);
                $this->redirect('staff');
            }

            $row = $staff_members->where('id', $id);
                if (Auth::access('Supper_admin')) {
                    $this->view('staff_members.delete', [
                        'row'=>$row
                    ]);
            }
            else {
                # code...
                $this->view('access-denied');
            }
        }
    }