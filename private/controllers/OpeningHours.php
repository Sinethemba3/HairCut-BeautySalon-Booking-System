<?php
    class OpeningHours extends Controller
    {
		public function __construct()
        {
            // Checking if the user is logged in on every request
            if (!Auth::logged_in()) {
                $this->redirect("login");
            }
        }

        public function index($id = '')
        {
            // storeModel
            $hoursModel = new OpeningHour();

            $query = "SELECT * FROM opening_hours ORDER BY id DESC";

            $storeData = $hoursModel->query($query);

            // Get all stores
            $data = [
                'rows' => $storeData,
            ];

            // View store page
            $this->view('openingHours', $data);
        }

		public function add($id = '')
		{
			$errors = [];

			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $errors = [];
				$hoursModel = new OpeningHour();

				if ($_POST) {
					$_POST['date'] = date("Y-m-d H:i:s");

                    // show($_POST) or die();
					// Insert the store and get the new store ID
					$hoursModel->insert($_POST);

					// Redirect after successful insertion and update
					$this->redirect('openingHours');
				} 
                else {
					// Handle validation errors
					$errors = $hoursModel->errors;
				}
			}

			// Render the view with any errors found
			$this->view('openingHours.add', [
				'errors' => $errors,
				'data' => $_POST ?? []
			]);
		}

        public function edit($id = '')
        {
            $errors = [];
            $hoursModel = new OpeningHour();
        
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // If there are no errors, update the store
                if (empty($errors)) {
                    // show($_POST) or die();
                    $hoursModel->update($id, $_POST);

                    $this->redirect('openingHours'); // Redirect to the stores page
                }
            }

            // Fetch existing store data
            $openingHours = $hoursModel->where('id', $id);
        
            // Render the edit view with errors (if any) and existing store data
            $this->view('openingHours.edit', [
                'errors' => $errors,
                'row' => $openingHours,
            ]);
        }

        public function delete($id = '')
        {
            $hoursModel = new OpeningHour();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $hoursModel->delete($id);

                // Check access rights and render the appropriate view
                if (Auth::access('Admin')) {
                    $this->redirect('stores');
                } elseif (Auth::access('Super_admin')) {
                    $this->redirect('viewStores');
                }
            }

            // Get store details for the delete confirmation
            $row = $hoursModel->where('id', $id);

            $this->view('openingHours.delete', [
                'row' => $row
            ]);
        }
    }
