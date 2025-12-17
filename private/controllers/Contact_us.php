<?php
    class Contact_us extends  Controller
    {
		public function index()
		{
			$errors = [];
            
            $ses = new Session;
			$messages = new Message();
			$salon = new Salon();
			$hoursModel = new OpeningHour();

            // Check if the user is logged in 
            if (Auth::logged_in()) {

                $user = $_SESSION['USER']; // Get logged-in user

                // $name = is_object($user) ? ($user->name ?? '') : ($user['name'] ?? '');
                
                // Flash a welcome toast
                // FlashMessages::flash("Welcome,&nbsp; <strong>$name</strong>!", "success");

                // Safe extraction of role (supports both object and array)
                if (is_object($user)) {
                    $role = $user->role ?? '';
                } 
                elseif (is_array($user)) {
                    $role = $user['role'] ?? '';
                } 
                else {
                    $role = '';
                }

                // Redirect Admin or Super_admin
                if ($role === 'Admin' || $role === 'Supper_admin') {
                    $this->redirect('/dashboard');
                    return;
                }elseif ($role === 'Staff') {
                    $this->redirect('/therapist_accounts');
                    return;
                }

            } 

            $data = $messages->findAll();
            $salonData = $salon->findAll();
            $hoursData = $hoursModel->findAll();

            if(count($_POST) > 0)
            {

                if ($messages->validate($_POST)) {
					# code...
                    if (isset($_POST['message'])) {
                        
                        // Gather form data and prepare email content
                        $arr = [
                            'name'    => $_POST['name'],
                            'email'   => $_POST['email'],
                            'subject' => $_POST['subject'],
                            'message' => $_POST['message'],
                            'date'    => date("Y-m-d H:i:s"),
                        ];

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
                                        <td>" . htmlspecialchars($arr['name'], ENT_QUOTES, 'UTF-8') . "</td>
                                    </tr>
                                    <tr>
                                        <th>Client Email</th>
                                        <td>" . htmlspecialchars($arr['email'], ENT_QUOTES, 'UTF-8') . "</td>
                                    </tr>
                                    <tr>
                                        <th>Subject</th>
                                        <td>" . htmlspecialchars($arr['subject'], ENT_QUOTES, 'UTF-8') . "</td>
                                    </tr>
                                    <tr>
                                        <th>Message</th>
                                        <td>" . nl2br(htmlspecialchars($arr['message'], ENT_QUOTES, 'UTF-8')) . "</td>
                                    </tr>
                                </table>
                            </body>
                            </html>";

                        // Set headers for HTML email
                        $from = $arr['email'];
                        $to = "sinethemba@afikam.co.za";
                        $subject = "New Message";

                        $headers = "From: " . $from . "\r\n";
                        $headers .= "Reply-To: " . $from . "\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                        $headers .= "X-Mailer: PHP/" . phpversion();

                        mail($to,$subject,$message, $headers);
        
                        $messages->insert($arr);
                        $this->redirect('contact_us');
                    }
                }
                else {
                    //errors;
                    $errors = $messages->errors;
                }
            }

			$this->view('contact_us', [
                'rows'      =>$data,
                'hoursData' =>$hoursData,
                'salonData' =>$salonData,
                'errors'    =>$errors,
            ]);
		}

	}