<?php
    class Blogz extends  Controller
    {
		public function index()
		{
			if (!Auth::logged_in()) {
                $this-> redirect("login");
            }

			$blogs = new Blog();

			$data['rows'] = $blogs->findall();
			$this->view('blogz', $data);
		}

		public function add()
        {
            if (!Auth::logged_in()) {
               $this-> redirect("login");
            }

            $errors = array();

            if(count($_POST) > 0)
            {
                $blogs = new Blog();
                if ($blogs->validate($_POST)) {
					# code...
                    $_POST['uploaded_by']   = 'Admin';
                    $_POST['date']          = date("Y-m-d H:i:s");
					
					$allowed[]              = 'video/mp4';

					if ($_FILES['video']['error'] == 0 && in_array($_FILES['video']['type'], $allowed)) {
						# code...
						$folder = "videos/";

						if (!file_exists($folder)) {
							# code...
							mkdir($folder, 0777, true);
						}

						$destination = $folder . $_FILES['video']['name'];
						move_uploaded_file($_FILES['video']['tmp_name'], $destination);
						$_POST['video'] = $destination;
					}

                    $blogs->insert($_POST);
                    $this->redirect('blogz');
                }
                else {
                    //errors;
                    $errors = $blogs->errors;
                }
            }
                $this->view('blogz.add', [
                    'errors'=>$errors
                ]);
        }

		public function edit($id = null)
        {
            $blogs = new Blog();

            $errors = array();

            if(count($_POST) > 0)
            {

                $blogs->update($id, $_POST);
                    
                $this->redirect('blogz');
            }

            $row = $blogs->where('id', $id);

            # code...
            $this->view('/blogz.edit', [
                'row'=>$row,
                'errors'=>$errors
            ]);
        }

        public function delete($id = null)
        {
            if (!Auth::logged_in()) {
               $this-> redirect("login");
            }

            $blogs = new Blog();

            $errors = array();

            if(count($_POST) > 0)
            {

                $blogs->delete($id);
                $this->redirect('blogz');
            }

            $row = $blogs->where('id', $id);
               
                $this->view('blogz.delete', [
                    'row'=>$row
                ]);
        }
	}