<?php
    require_once '../vendor/PHPMailer/src/Exception.php';
    require_once '../vendor/PHPMailer/src/PHPMailer.php';
    require_once '../vendor/PHPMailer/src/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    class Appointments extends  Controller
    {
		public function index()
		{
            if (!Auth::logged_in()) {
                $this-> redirect("login");
            }
            
            $services = new Service();
			$data['rows'] = $services->findAll();
            
			$this->view('appointments', $data);
		}

		public function edit($id = '')
        {
			if (!Auth::logged_in()) {
                $this-> redirect("login");
            }

			$services = new Service();
            
            if (count($_POST) > 0) {
                $services = new Service();

                // Sanitize values
                $to       = $_POST['email'];
                $name     = esc($_POST['name']);
                $name_    = esc($_POST['name_']);
                $service  = esc($_POST['services_']);
                $date     = esc($_POST['appointment_date']);
                $time     = esc($_POST['appointment_time']);
                $status   = esc($_POST['status']);
                $remark   = nl2br(esc($_POST['remark']));
                $orderId  = esc($_POST['appointment_id']);

                // Format service as list
                $servicesList = explode(',', $service);
                $serviceHtml  = "<ul style='margin:0; padding-left:20px;'>";
                foreach ($servicesList as $srv) {
                    $serviceHtml .= "<li>" . trim($srv) . "</li>";
                }
                $serviceHtml .= "</ul>";

                // Prepare HTML email
                $body = "
                    <html>
                    <head>
                        <style>
                            body {
                                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                                background-color: #f4f6f8;
                                color: #333;
                                padding: 40px;
                            }
                            .email-container {
                                background-color: #fff;
                                border-radius: 8px;
                                box-shadow: 0 4px 12px rgba(0,0,0,0.05);
                                padding: 30px;
                                max-width: 700px;
                                margin: auto;
                            }
                            h2 {
                                color: #2c3e50;
                                font-size: 22px;
                                margin-bottom: 16px;
                            }
                            table {
                                width: 100%;
                                border-collapse: collapse;
                                margin-top: 20px;
                                font-size: 14px;
                            }
                            th, td {
                                padding: 10px;
                                border-bottom: 1px solid #eee;
                                text-align: left;
                            }
                            th {
                                background: #f9f9f9;
                                color: #555;
                                width: 30%;
                            }
                            .footer {
                                margin-top: 30px;
                                font-size: 13px;
                                color: #888;
                                text-align: center;
                            }
                        </style>
                    </head>
                    <body>
                        <div class='email-container'>
                            <h2>📌 Booking Update Notification</h2>
                            <p>Dear <strong>$name</strong>,</p>
                            <p>Your booking has been updated. See the new details below:</p>
                            
                            <table>
                                <tr><th>Appointment ID</th><td>$orderId</td></tr>
                                <tr><th>Appointment Date</th><td>$date</td></tr>
                                <tr><th>Appointment Time</th><td>$time</td></tr>
                                <tr><th>Therapist</th><td>$name_</td></tr>
                                <tr><th>Services</th><td>$serviceHtml</td></tr>
                                <tr><th>Status</th><td>$status</td></tr>
                                <tr><th>Remark</th><td>$remark</td></tr>
                            </table>

                            <p>Thank you for booking with us. If you have any questions or changes, feel free to contact us.</p>
                            
                            <div class='footer'>
                                © " . date('Y') . " Afikam Hair and Beauty. All rights reserved.<br>
                                Booking system | Designed by Sinethemba Nxayiphi
                            </div>
                        </div>
                    </body>
                    </html>
                ";

                // Send email with PHPMailer
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->SMTPAuth   = true;
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->Username   = SMTP_EMAIL;
                    $mail->Password   = SMTP_PASSWORD;
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;

                    $mail->setFrom(SMTP_EMAIL, 'Afikam Bookings');
                    $mail->addReplyTo(SMTP_EMAIL);
                    $mail->addAddress($to, $name);
                    $mail->isHTML(true);
                    $mail->Subject = "📅 Your Appointment Update - #$orderId";
                    $mail->Body    = $body;

                    $mail->send();
                } catch (Exception $e) {
                    error_log("Email failed: " . $mail->ErrorInfo);
                }

                // Save to database
                $services->update($id, $_POST);
                $this->redirect('appointments');
            }

            $row = $services->where('id', $id);
            
            # code...
            $this->view('/appointments.edit', [
                'row'=>$row,
            ]);
        }

        public function delete($id = null)
        {
			$services = new Service();
            
			if (!Auth::logged_in()) {
                $this-> redirect("login");
            }

            if(count($_POST) > 0)
            {
                $services->delete($id);
                $this->redirect('appointments');
            }

            $row = $services->where('id', $id);
               
            $this->view('appointments.delete', [
                'row'=>$row
            ]);
        }
	}
