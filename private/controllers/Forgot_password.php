<?php
    class Forgot_password extends Controller
    {
        function index()
        {
            $errors = []; // Initialize an empty errors array
            $userModel          = new User(); // users table
            $salonsModel        = new Salon;
            $customerModel      = new Customer();

            // Check if the form is submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                // Sanitize & validate email
                $email = trim($_POST['email'] ?? '');
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);

                if (empty($email)) {
                    $errors['email'] = "Please enter your email address.";
                }
                elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = "Please enter a valid email address.";
                }
                else {

                    // 1️⃣ Check customers table
                    $customer = $customerModel->first(['email' => $email]);

                    if ($customer) {
                        // Found in customers
                        $this->redirect("password_reset/edit/{$customer->id}?table=customers");
                        return;
                    }

                    // 2️⃣ Check users table
                    $user = $userModel->first(['email' => $email]);

                    if ($user) {
                        // Found in users
                        $this->redirect("password_reset/edit/{$user->id}?table=users");
                        return;
                    }

                    // ❌ Not found in both tables
                    $errors['email'] = "Email address not found.";
                }
            }

            $uniqueSalons = $salonsModel->findAll();
            
            // Pass errors and email back to the view if there are validation issues
            $this->view('/forgot_password', [
                'uniqueSalons'  => $uniqueSalons,
                'email'         => $email ?? '',
                'errors'        => $errors, 
            ]);
        }
    }