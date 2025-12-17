<?php

class Signup extends Controller
{
    function index()
    {
        // Flash a welcome toast
        // FlashMessages::flash("Create your account!!", "warning");

        $errors = [];
        $userModel = new User;
        $customersModel = new Customer; 

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate and sanitize input
            if ($this->validateForm($userModel, $_POST)) { 
                $_POST['date'] = date("Y-m-d H:i:s");

                // Handle image upload
                if (isset($_FILES['image'])) {
                    $imageUpload = $this->handleImageUpload($_FILES['image']);
                    if ($imageUpload['error']) {
                        $errors['image'] = $imageUpload['error'];
                    } else {
                        $_POST['image'] = $imageUpload['path'];
                    }
                }

                // Insert user into the correct table based on role
                $this->insertUserByRole($_POST, $userModel, $customersModel);

                // Authenticate and redirect the user
                $this->authenticateAndRedirect($userModel, $customersModel, $_POST, $errors);
            } else {
                // Capture validation errors
                $errors = $userModel->errors;
            }
        }

        // Show signup view with errors (if any)
        $this->view('/signup', [
            'errors' => $errors,
        ]);
    }

    /**
     * Validate the form input
     */
    private function validateForm($model, $postData)
    {
        return $model->validate($postData);
    }

    /**
     * Handle image upload
     */
    private function handleImageUpload($image)
    {
        $allowed = ['image/jpeg', 'image/png'];
        if ($image['error'] === 0) {
            if (in_array($image['type'], $allowed)) {
                $folder = "uploads/";
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $destination = $folder . basename($image['name']);
                move_uploaded_file($image['tmp_name'], $destination);

                return ['error' => null, 'path' => $destination];
            } else {
                return ['error' => 'Invalid image type. Only JPEG and PNG are allowed.', 'path' => null];
            }
        }
        return ['error' => 'No image uploaded or there was an issue with the upload.', 'path' => null];
    }

    /**
     * Insert user data into the correct table based on their role
     */
    private function insertUserByRole($postData, $userModel, $customersModel)
    {
        if (isset($postData['role']) && ($postData['role'] === 'Supper_admin' || $postData['role'] === 'Admin')) {
            $userModel->insert($postData); // Insert into Users table for Admins
        } else {
            $customersModel->insert($postData); // Insert into Customer table
        }
    }

    /**
     * Authenticate and redirect the user
     */
    private function authenticateAndRedirect($userModel, $customersModel, $postData, &$errors)
    {
        // Check if the user is in the Users (Admin) or Customers table
        $registeredAdmins = $userModel->where('email', $postData['email']);
        $registeredCustomers = $customersModel->where('email', $postData['email']);

        if ($registeredAdmins && is_array($registeredAdmins) && count($registeredAdmins) > 0) {
            $registeredUser = $registeredAdmins[0]; // Get the first user from the array
            Auth::authenticate($registeredUser); // Authenticate the user
        } elseif ($registeredCustomers && is_array($registeredCustomers) && count($registeredCustomers) > 0) {
            $registeredUser = $registeredCustomers[0]; // Get the first customer from the array
            Auth::authenticate($registeredUser); // Authenticate the user
        } else {
            $errors['authentication'] = "User not found. Please try again.";
            return;
        }

        // If authentication was successful, redirect based on role
        $this->redirectUserBasedOnRole($registeredUser);
    }

    /**
     * Redirect the user based on their role
     */
    private function redirectUserBasedOnRole($user)
    {
        if ($user) {
            if (in_array($user->role, ['Supper_admin', 'Admin'])) {
                $this->redirect('/admins');
            } elseif (in_array($user->role, ['Customer', 'User'])) {
                $this->redirect('/login');
            } else {
                $this->redirect('/_404'); // Redirect to an unauthorized page if needed
            }
        } else {
            $this->redirect('/signup'); // Fallback to signup page if no user found
        }
    }
}
