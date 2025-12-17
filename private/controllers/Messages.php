<?php 
	class Messages extends  Controller
	{
		public function index()
		{
			if (!Auth::logged_in()) {
                $this-> redirect("login");
            }

			$messages = new Message();

			$data['rows'] = $messages->findAll();
			$this->view('messages', $data);
		}

		public function edit($id = null)
        {
            if (!Auth::logged_in()) {
               $this-> redirect("login");
            }

            $messages = new Message();

            $errors = [];

            if(count($_POST) > 0) {

                # Send Mail
                $from = "sinethemba@afikam.co.za";
                $to = $_POST['email'];
                $subject = "New Message";

                // Prepare HTML email content
                $message = "
                    <html>
                    <head>
                        <style>
                            body { font-family: Arial, sans-serif; }
                            table { width: 100%; border-collapse: collapse; }
                            th, td { padding: 10px; text-align: left; border: 1px solid #ddd; }
                            th { background-color: #f4f4f4; }
                            h2 { color: #333; }
                        </style>
                    </head>
                    <body>
                        <h2>New Message</h2>
                        <table>
                            <tr>
                                <th>Client Name</th>
                                <td>" . htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8') . "</td>
                            </tr>
                            <tr>
                                <th>Client Email</th>
                                <td>" . htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8') . "</td>
                            </tr>
                            <tr>
                                <th>Message</th>
                                <td>" . nl2br(htmlspecialchars($_POST['reply'], ENT_QUOTES, 'UTF-8')) . "</td>
                            </tr>
                        </table>
                    </body>
                    </html>";

                // Set headers for HTML email
                $headers = "From: " . $from . "\r\n";
                $headers .= "Reply-To: " . $from . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                $headers .= "X-Mailer: PHP/" . phpversion();

                mail($to,$subject,$message, $headers);

                $messages->update($id, $_POST);
                $this->redirect('messages');
            }

            $row = $messages->where('id', $id);

            # code...
            $this->view('messages.edit', [
                'row'=>$row,
                'errors'=>$errors
            ]);
        }

        public function delete($id = null)
        {
            if (!Auth::logged_in()) {
               $this-> redirect("login");
            }

            $messages = new Message();

            $errors = array();

            if(count($_POST) > 0)
            {

                $messages->delete($id);
                $this->redirect('messages');
            }

            $row = $messages->where('id', $id);
               
            $this->view('messages.delete', [
                'row'=>$row
            ]);
        }
	}