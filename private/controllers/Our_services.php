<?php
    class Our_services extends  Controller
    {
		public function index()
		{
			if (!Auth::logged_in()) {
                $this-> redirect("login");
            }

			$our_services = new Our_service();

			$data['rows'] = $our_services->findall();
			$this->view('our_services', $data);
		} 

		public function add()
        {
            if (!Auth::logged_in()) {
               $this-> redirect("login");
            }

            $errors = [];

            if(count($_POST) > 0)
            {
                $our_services = new Our_service();
                if ($our_services->validate($_POST)) {
					# code...
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

                    $our_services->insert($_POST);
                    $this->redirect('our_services');
                }
                else {
                    //errors;
                    $errors = $our_services->errors;
                }
            }
                $this->view('our_services.add', [
                    'errors'=>$errors
                ]);
        }

		public function edit($id = null)
        {
            if (!Auth::logged_in()) {
               $this-> redirect("login");
            }

            $our_services = new Our_service();

            $errors = array();

            if(count($_POST) > 0)
            {

                $our_services->update($id, $_POST);
                    
                $this->redirect('our_services');
            }

                $row = $our_services->where('id', $id);

				# code...
				$this->view('/our_services.edit', [
                    'row'=>$row,
                    'errors'=>$errors
                ]);
        }

        public function delete($id = null)
        {
            if (!Auth::logged_in()) {
               $this-> redirect("login");
            }

            $our_services = new Our_service();

            $errors = array();

            if(count($_POST) > 0)
            {

                $our_services->delete($id);
                $this->redirect('our_services');
            }

            $row = $our_services->where('id', $id);
               
                $this->view('our_services.delete', [
                    'row'=>$row
                ]);
        }
	}
