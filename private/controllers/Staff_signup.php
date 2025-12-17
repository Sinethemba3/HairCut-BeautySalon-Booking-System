<?php 
    class Staff_signup extends  Controller
    {
        public function index()
        {
            if (!Auth::logged_in()) {
                $this-> redirect("login");
             }

            // Flash a welcome toast
            // FlashMessages::flash("Creating a Staff account!!", "warning");

            $user = new User;
            $errors = array();

            if(count($_POST) > 0) 
            {

                if ($user->validate($_POST)) {
                    
                    $_POST['date'] = date("Y-m-d H:i:s");

                    $allowed[] = 'image/jpeg';
					$allowed[] = 'image/png';

					if ($_FILES['image']['error'] == 0 && in_array($_FILES['image']['type'], $allowed)) {
						# code...
						$folder = "uploads/";

						if (!file_exists($folder)) {
							# code...
							mkdir($folder, 0777, true);
						}

						$destination = $folder . $_FILES['image']['name'];
						move_uploaded_file($_FILES['image']['tmp_name'], $destination);
						$_POST['image'] = $destination;
					}

                    $user->insert($_POST);
                    $this->redirect('/staff');
                }
                else {
                    //errors;
                    $errors = $user->errors;
                }
            }
                $this->view('/staff_signup', [
                'errors'=>$errors,
            ]);
            
        }
    }