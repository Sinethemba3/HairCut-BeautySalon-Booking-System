<?php
    class Profile extends  Controller
    {
        function index($id = '')
        {
            // Code...
            if (!Auth::logged_in()) {
                $this-> redirect('login');
             }

            $user = new User();
            $id = trim($id == '') ? Auth::getUser_id() : $id;

            $row = $user->first('user_id', $id);

            $data['row'] = $row;
            
            $this->view('profile', $data);
        }
        
        public function edit($id = null)
        {
            if (!Auth::logged_in()) {
               $this-> redirect("login");
            }

            $admins = new User();

            $errors = array();

            if(count($_POST) > 0 && Auth::access('Supper_admin'))
            {
                if (trim($_POST['password']) == "") {
                    # code...
                    unset($_POST['password']);
                    unset($_POST['password2']);
                }
                    
                if ($myimage = upload_image($_FILES)) {
                    # code...
                    $_POST['image'] = $myimage;
                }

                $admins->update($id, $_POST);
                $this->redirect('admins');
            }

                $row = $admins->where('id', $id);
                if (Auth::access('Supper_admin')) {
                    # code...
                    $this->view('admins.edit', [
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