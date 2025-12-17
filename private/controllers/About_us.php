<?php
	class About_us extends  Controller
	{
		public function index()
		{
			$errors = [];
            $salonModel     = new Salon();

			// Check if the user is logged in 
            if (Auth::logged_in()) {

                $user = $_SESSION['USER']; // Get logged-in user

                // $name = is_object($user) ? ($user->name ?? '') : ($user['name'] ?? '');
                
                // Flash a welcome toast
                // FlashMessages::flash("Welcome,&nbsp; <strong>$name</strong>!", "success");

                // Safe extraction of role (supports both object and array)
                if (is_object($user)) {
                    $role = $user->role ?? '';
                } 
                elseif (is_array($user)) {
                    $role = $user['role'] ?? '';
                } 
                else {
                    $role = '';
                }

                // Redirect Admin or Super_admin
                if ($role === 'Admin' || $role === 'Supper_admin') {
                    $this->redirect('/dashboard');
                    return;
                }elseif ($role === 'Staff') {
                    $this->redirect('/therapist_accounts');
                    return;
                }

            } 

            // Load other data separately
            $salonData = $salonModel->findAll();
			
			$this->view('./about_us', [
				'errors' => $errors,
				'rows'   => $salonData,
			]);
		}

	}