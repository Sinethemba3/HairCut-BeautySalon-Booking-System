<?php 
    class Password_reset extends Controller
    {
        public function index()
        {
            // You can implement logic here for displaying the password reset form, if needed
        }

        public function edit($id = '')
        {
            $errors         = []; // Initialize the errors array
            $table          = $_GET['table'] ?? 'users'; // default to users if not set
            $id             = $id; // numeric id passed from URL

            $salonsModel    = new Salon;
            $allUsers       = new Password_resets(); // your existing model

            // Check POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                if ($allUsers->validate($_POST)) {

                    $updateData = [
                        'password' => trim($_POST['password'])
                    ];

                    // Determine which table to update
                    if ($table === 'customers') {
                        $customersModel = new Customer();

                        $row = $customersModel->first('id', $id);

                        if ($row) {
                            // show($updateData) or die();
                            $customersModel->update($row->id, $updateData);
                            echo "Updated Customer ID: {$row->id} in customers table.";
                        } else {
                            echo "Customer not found!";
                        }
                    } else {
                        $usersModel = new User();

                        $row = $usersModel->first('id', $id);

                        if ($row) {
                            // show($updateData) or die();
                            $usersModel->update($row->id, $updateData);
                            echo "Updated User ID: {$row->id} in users table.";
                        } else {
                            echo "User not found!";
                        }
                    }

                    $this->redirect('login');
                } else {
                    $errors = $allUsers->errors;
                }
            }

            // Fetch row for display
            if ($table === 'customers') {
                $customersModel = new Customer();
                $row = $customersModel->first('id', $id);
            } else {
                $usersModel = new User();
                $row = $usersModel->first('id', $id);
            }

            $uniqueSalons = $salonsModel->findAll();

            $this->view('/password_reset.edit', [
                'uniqueSalons'  => $uniqueSalons,
                'errors'        => $errors,
                'row'           => $row
            ]);
        }
    }