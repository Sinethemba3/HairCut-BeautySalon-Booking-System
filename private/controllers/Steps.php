<?php 
	class Steps extends  Controller
	{
		public function index()
		{
            $user = new User();

            $data = $user->findall();
            
            $this->view('steps', [
                'rows'=>$data,
            ]);
		}

		public function edit($id = null)
        {

            $user = new User();

            $errors = array();

            if(count($_POST) > 0)
            {

                $user->update($id, $_POST);
                    
                $this->redirect('appointments');
            }

                $row = $user->findAll();

				# code...
				$this->view('/steps.edit', [
                    'row'=>$row,
                    'errors'=>$errors
                ]);
        }

        public function delete($id = null)
        {

            $user = new User();

            $errors = array();

            if(count($_POST) > 0)
            {

                $user->delete($id);
                $this->redirect('appointments');
            }

            $row = $user->findAll();
               
            $this->view('appointments.delete', [
                'row'=>$row,
                'errors'=>$errors
            ]);
        }
	}
