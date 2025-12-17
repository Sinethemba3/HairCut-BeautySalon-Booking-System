<?php
    require_once '../vendor/PHPMailer/src/Exception.php';
    require_once '../vendor/PHPMailer/src/PHPMailer.php';
    require_once '../vendor/PHPMailer/src/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    class Finish extends Controller
    {
        public function __construct()
        {
            if (!Auth::logged_in()) {
                $this->redirect("login");
            }
        }

        public function index($id = '')
        {
            $servicesModel = new Service();
            $userId = Auth::getUser_id();

            $orderData = $servicesModel->first('user_id', $userId);
            if (!$orderData) {
                $this->redirect("home");
                return;
            }

            // Extract values
            $orderId    = $orderData->id;
            $name       = $orderData->name ?? '';
            $name_      = $orderData->name_ ?? '';
            $email      = $orderData->email ?? '';
            $amount     = $orderData->amount ?? 0;
            $phone      = $orderData->phone ?? '';
            $service    = $orderData->services_ ?? '';
            $date       = $orderData->appointment_date ?? '';
            $time       = $orderData->appointment_time ?? '';
            $adminEmail = "nxayiphi3@gmail.com";

            // Booking Table HTML
            // Example input
            // $service = "Deep Cleansing (1 hour), Back, Neck & Shoulder Massage (30 min), Underarms";
            // $amount = "380.00, 320.00, 150.00";

            // Handle multiple amounts and calculate total deposit on first amount only (or you can adapt to sum all)
            $amounts = explode(',', $amount);
            $total = 0;

            foreach ($amounts as $amt) {
                $total += floatval(trim($amt));
            }

            $deposit = number_format($total * 1.14 / 2, 2);

            // Process services into a list
            $serviceItems = explode(',', $service);
            $serviceList = "<ul style='margin:0; padding-left: 18px;'>";

            foreach ($serviceItems as $item) {
                $serviceList .= "<li>" . esc(trim($item)) . "</li>";
            }
            $serviceList .= "</ul>";

            // Build booking table
            $bookingTable = "
                <table style='width: 100%; border-collapse: collapse; font-size: 14px; margin-top: 20px;'>
                    <tr>
                        <th style='padding:8px; background:#f8f8f8;'>Client Name</th>
                        <td style='padding:8px;'>" . esc($name) . "</td>
                    </tr>
                    <tr>
                        <th style='padding:8px;'>Service</th>
                        <td style='padding:8px; vertical-align: top;'>" . $serviceList . "</td>
                    </tr>
                    <tr>
                        <th style='padding:8px;'>Therapist</th>
                        <td style='padding:8px;'>" . esc($name_) . "</td>
                    </tr>
                    <tr>
                        <th style='padding:8px; background:#f8f8f8;'>Appointment Date</th>
                        <td style='padding:8px;'>" . esc($date) . "</td>
                    </tr>
                    <tr>
                        <th style='padding:8px;'>Appointment Time</th>
                        <td style='padding:8px;'>" . esc($time) . "</td>
                    </tr>
                    <tr>
                        <th style='padding:8px; background:#f8f8f8;'>Phone</th>
                        <td style='padding:8px;'>" . esc($phone) . "</td>
                    </tr>
                    <tr>
                        <th style='padding:8px;'>50% Deposit Paid</th>
                        <td style='padding:8px;'>R{$deposit}</td>
                    </tr>
                </table>
            ";

            // Setup PHPMailer
            $mail = new PHPMailer(true);
            try {
                // Enable SMTP debugging
                $mail->SMTPDebug = 0; // Use 2 or 3 for more verbosity

                $mail->isSMTP();
                $mail->SMTPOptions = [
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true,
                    ],
                ];
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = SMTP_EMAIL;
                $mail->Password   = SMTP_PASSWORD; // Gmail App Password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                $mail->isHTML(true);
                $mail->setFrom('nxayiphi3@gmail.com', 'Bookings Website');
                $mail->addReplyTo('nxayiphi3@gmail.com');

                // Approved Booking
                if (isset($_GET['mode']) && $_GET['mode'] == "approved") {
                    $servicesModel->query("UPDATE services SET paid = 1 WHERE id = :id", ['id' => $orderId]);

                    // Email to customer
                    $mail->addAddress($email, $name);
                    $mail->Subject = "Your Booking is Confirmed - #$orderId";
                    $mail->Body = "
                        <html><body>
                            <div style='font-family: Arial, sans-serif;'>
                                <h2 style='color: #28a745;'>Thank You, $name!</h2>
                                <p>Your booking is confirmed. See your details below:</p>
                                $bookingTable
                                <p>We look forward to seeing you soon!</p>
                                <p style='color: gray;'>Afikam Hair and Beauty</p>
                            </div>
                        </body></html>
                    ";
                    $mail->send();
                    $mail->clearAddresses();

                    // Email to admin
                    $mail->addAddress($adminEmail, 'Afikam Admin');
                    $mail->Subject = "New Booking Confirmed: #$orderId";
                    $mail->Body = "
                        <html><body>
                            <div style='font-family: Arial, sans-serif;'>
                                <h2>New Booking Received</h2>
                                $bookingTable
                                <p>Please schedule accordingly.</p>
                                <p style='font-size: 12px; color: gray;'>System Notification | Afikam</p>
                            </div>
                        </body></html>
                    ";
                    $mail->send();
                }

                // Cancelled Booking
                elseif (isset($_GET['mode']) && $_GET['mode'] == "cancel") {
                    $servicesModel->query("UPDATE services SET paid = 0 WHERE id = :id", ['id' => $orderId]);

                    // Email to customer
                    $mail->addAddress($email, $name);
                    $mail->Subject = "Booking Cancelled - #$orderId";
                    $mail->Body = "
                        <html><body>
                            <div style='font-family: Arial, sans-serif;'>
                                <h2 style='color: red;'>Booking Cancelled</h2>
                                <p>Hi $name_, your booking was not successful.</p>
                                $bookingTable
                                <p>If this was a mistake, please try again.</p>
                                <p style='color: gray;'>Afikam Hair and Beauty</p>
                            </div>
                        </body></html>
                    ";
                    $mail->send();
                    $mail->clearAddresses();

                    // Email to admin
                    $mail->addAddress($adminEmail);
                    $mail->Subject = "Booking Failed: #$orderId";
                    $mail->Body = "
                        <html><body>
                            <div style='font-family: Arial, sans-serif;'>
                                <h2 style='color: red;'>Booking Cancelled or Failed</h2>
                                $bookingTable
                                <p>No action required.</p>
                            </div>
                        </body></html>
                    ";
                    $mail->send();
                }

            } catch (Exception $e) {
                $errorMessage = "Mailer Error: " . $mail->ErrorInfo . " | Exception: " . $e->getMessage();
                error_log($errorMessage);
                echo $errorMessage; // Show directly on screen
            }

            $data = ['orderData' => $orderData];
            $this->view('/finish', $data);
        }
    }