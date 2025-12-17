<?php
    class Salon_services extends  Controller
    {
		public function index($id = '')
        {
            if (!Auth::logged_in()) {
                $this->redirect("login");
            }
            
            $salon_services = new Salon_service();
            $rows = $salon_services->findall();

            
            $data = [
                'rows' => $rows,
            ];

            $this->view('salon_services', $data);
        }

		public function add($id = '')
        {
            if (!Auth::logged_in()) {
                $this->redirect("login");
            }

            $errors = [];

            $salon_services = new Salon_service();
            $ourServices = new Our_service();

            $id = trim($id) == '' ? Auth::getUser_id() : $id;

            // Get all services from our_services
            $services = $ourServices->query("SELECT * FROM our_services ORDER BY id DESC");

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $_POST['date'] = date("Y-m-d H:i:s");

                // ✅ Make sure 'main_service' is posted
                $selected_main_service = $_POST['main_service'] ?? '';
                $service_id = '';

                // ✅ Get service_id for the selected main_service
                foreach ($services as $row) {
                    if (trim($row->services) == trim($selected_main_service)) {
                        $service_id = $row->service_id;
                        break;
                    }
                }

                // Optional error check
                if (empty($service_id)) {
                    $errors[] = "Invalid main service selected. No matching service_id.";
                }

                if (empty($errors)) {
                    $data = [
                        'user_id'       => Auth::getUser_id(),
                        'service_id'    => $service_id,
                        'service'       => $_POST['service'] ?? '',
                        'main_service'  => $selected_main_service,
                        'name'          => $_POST['name'] ?? '',
                        'service_name'  => $_POST['service_name'] ?? '',
                        'price1'        => $_POST['price1'][0] ?? 0,
                        'price2'        => $_POST['price1'][1] ?? 0,
                        'price3'        => $_POST['price1'][2] ?? 0,
                        'small'         => $_POST['small'] ?? null,
                        'medium'        => $_POST['medium'] ?? null,
                        'large'         => $_POST['large'] ?? null,
                        'date'          => $_POST['date'],
                    ];
                    // show($data) or die();
                    $salon_services->insert($data);
                    $this->redirect('salon_services');
                }
            }

            $this->view('salon_services.add', [
                'errors' => $errors,
                'services' => $services
            ]);
        }

		public function edit($id = null)
        {
            if (!Auth::logged_in()) {
               $this-> redirect("login");
            }

            $salon_services = new Salon_service();

            $errors = array();

            if(count($_POST) > 0)
            {

                $salon_services->update($id, $_POST);
                    
                $this->redirect('salon_services');
            }

                $row = $salon_services->where('id', $id);

				# code...
				$this->view('/salon_services.edit', [
                    'row'=>$row,
                    'errors'=>$errors
                ]);
        }

        public function delete($id = null)
        {
            if (!Auth::logged_in()) {
               $this-> redirect("login");
            }

            $salon_services = new Salon_service();

            $errors = array();

            if(count($_POST) > 0)
            {

                $salon_services->delete($id);
                $this->redirect('salon_services');
            }

            $row = $salon_services->where('id', $id);
               
                $this->view('salon_services.delete', [
                    'row'=>$row
                ]);
        }
	}
