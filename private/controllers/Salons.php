<?php
    class Salons extends Controller
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
            $storeModel = new Salon();
			$userId = Auth::getUser_id();

            $query = "SELECT * FROM salons WHERE user_id = :user_id ORDER BY id DESC";

            $storeData = $storeModel->query($query, [':user_id' => $userId]);

            // Get all stores
            $data = [
                'rows' => $storeData,
            ];

            // View store page
            $this->view('salons', $data);
        }

		public function add()
        {
            $errors = [];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $storesModel = new Salon();
                $usersModel  = new User();
                $userId      = Auth::getUser_id();

                if ($storesModel->validate($_POST)) {
                    $_POST['date'] = date("Y-m-d H:i:s");

                    // Allowed image types
                    $allowed = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/bmp', 'image/tiff', 'image/svg+xml'];

                    $folder = "uploads/";
                    if (!file_exists($folder)) mkdir($folder, 0777, true);

                    // Helper function for single file upload
                    function uploadFile($key, $allowed, $folder, &$errors)
                    {
                        if (isset($_FILES[$key]) && $_FILES[$key]['error'] === 0) {
                            $file = $_FILES[$key];
                            if (!in_array($file['type'], $allowed)) {
                                $errors[] = ucfirst($key) . " has invalid file type.";
                                return null;
                            }
                            if ($file['size'] > 5 * 1024 * 1024) {
                                $errors[] = ucfirst($key) . " exceeds 5MB size limit.";
                                return null;
                            }
                            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                            $fileName = time() . "_" . uniqid() . "." . $ext;
                            $destination = $folder . $fileName;
                            if (move_uploaded_file($file['tmp_name'], $destination)) return $destination;
                            $errors[] = "Error uploading " . ucfirst($key);
                        }
                        return null;
                    }

                    // Handle logo and user image
                    $_POST['image']      = uploadFile('image', $allowed, $folder, $errors);
                    $_POST['user_image'] = uploadFile('user_image', $allowed, $folder, $errors);

                    // Handle multiple slider images
                    if (isset($_FILES['slider'])) {
                        $sliderFiles = [];
                        foreach ($_FILES['slider']['tmp_name'] as $index => $tmpName) {
                            if ($_FILES['slider']['error'][$index] === 0) {
                                $type = $_FILES['slider']['type'][$index];
                                if (!in_array($type, $allowed)) {
                                    $errors[] = "Slider image " . ($_FILES['slider']['name'][$index] ?? $index+1) . " has invalid file type.";
                                    continue;
                                }
                                if ($_FILES['slider']['size'][$index] > 5 * 1024 * 1024) {
                                    $errors[] = "Slider image " . ($_FILES['slider']['name'][$index] ?? $index+1) . " exceeds 5MB.";
                                    continue;
                                }
                                $ext = pathinfo($_FILES['slider']['name'][$index], PATHINFO_EXTENSION);
                                $fileName = time() . "_" . uniqid() . "." . $ext;
                                $destination = $folder . $fileName;
                                if (move_uploaded_file($tmpName, $destination)) {
                                    $sliderFiles[] = $destination;
                                } else {
                                    $errors[] = "Error uploading slider image " . ($_FILES['slider']['name'][$index] ?? $index+1);
                                }
                            }
                        }
                        $_POST['slider'] = !empty($sliderFiles) ? implode(',', $sliderFiles) : null;
                    }

                    // Only proceed if no upload errors
                    if (empty($errors)) {
                        // show($_POST) or die();
                        $storesModel->insert($_POST);

                        $selectedId = $storesModel->query(
                            "SELECT salon_id FROM salons WHERE user_id = :user_id ORDER BY id DESC LIMIT 1",
                            ['user_id' => $userId]
                        );

                        if ($selectedId && isset($selectedId[0]->salon_id)) {
                            $usersModel->query(
                                "UPDATE users SET salon_id = :salon_id WHERE user_id = :user_id",
                                ['salon_id' => $selectedId[0]->salon_id, 'user_id' => $userId]
                            );
                        }

                        $this->redirect('salons');
                    }
                } else {
                    $errors = $storesModel->errors;
                }
            }

            $this->view('salons.add', [
                'errors' => $errors,
                'data' => $_POST ?? []
            ]);
        }

        public function edit($id = '')
        {
            $errors = [];
            $storeModel = new Salon();

            $existingstore = $storeModel->where('id', $id);
            if (!$existingstore) {
                $errors[] = "Store not found.";
                $this->view('salons.edit', ['errors' => $errors, 'row' => null]);
                return;
            }

            $existingstore = is_array($existingstore) ? $existingstore[0] : $existingstore;

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $folder = "uploads/";
                if (!file_exists($folder)) mkdir($folder, 0777, true);
                $allowed = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/bmp', 'image/tiff', 'image/svg+xml'];

                // Single files
                $uploadedImage = uploadFile('image', $allowed, $folder, $errors);
                if ($uploadedImage) $_POST['image'] = $uploadedImage;

                $uploadedUserImage = uploadFile('user_image', $allowed, $folder, $errors);
                if ($uploadedUserImage) $_POST['user_image'] = $uploadedUserImage;

                // Multiple slider images
                if (isset($_FILES['slider'])) {
                    $sliderFiles = [];
                    foreach ($_FILES['slider']['tmp_name'] as $index => $tmpName) {
                        if ($_FILES['slider']['error'][$index] === 0) {
                            $type = $_FILES['slider']['type'][$index];
                            if (!in_array($type, $allowed)) continue;

                            $ext = pathinfo($_FILES['slider']['name'][$index], PATHINFO_EXTENSION);
                            $fileName = time() . "_" . uniqid() . "." . $ext;
                            $destination = $folder . $fileName;

                            if (move_uploaded_file($tmpName, $destination)) $sliderFiles[] = $destination;
                        }
                    }

                    if (!empty($sliderFiles)) {
                        // Merge with existing sliders if needed
                        $existingSliders = explode(',', $existingstore->slider ?? '');
                        $_POST['slider'] = implode(',', array_merge($existingSliders, $sliderFiles));
                    }
                }

                if (empty($errors)) {
                    $storeModel->update($id, $_POST);
                    $this->redirect('salons');
                }
            }

            $this->view('salons.edit', [
                'errors' => $errors,
                'row' => $existingstore
            ]);
        }

        public function delete($id = '')
        {
            $storeModel = new Salon();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $storeModel->delete($id);

                $this->redirect('salons');
            }

            // Get store details for the delete confirmation
            $row = $storeModel->where('id', $id);

            $this->view('salons.delete', [
                'row' => $row
            ]);
        }
    }