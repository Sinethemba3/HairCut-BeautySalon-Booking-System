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
            $adminEmail = SMTP_EMAIL;

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

            $vatRate = 1.14;

            // Total including VAT
            $totalWithVat = $total * $vatRate;

            // Deposit (50%)
            $deposit = number_format($totalWithVat / 2, 2);

            // Amount due
            $amountDue = number_format($totalWithVat - ($totalWithVat / 2), 2);

            // Process services into a list
            $serviceItems = explode(',', $service);
            $serviceList = "<ul style='margin:0; padding-left: 18px;'>";

            foreach ($serviceItems as $item) {
                $serviceList .= "<li>" . esc(trim($item)) . "</li>";
            }
            $serviceList .= "</ul>";

            // Build booking table
            $bookingTable = "
                <br>
                    <table style='width:100%; max-width:600px; border-collapse:collapse; font-family:Arial, sans-serif; font-size:0.8rem;'>

                        <tr>
                            <th style='padding:10px; text-align:left; width:35%; background:#f2f2f2;'>Customer Name:</th>
                            <td style='padding:10px; font-weight:lighter; background:#f2f2f2;'>" . esc($name) . "</td>
                        </tr>

                        <tr>
                            <th style='padding:10px; text-align:left;'>Service:</th>
                            <td style='padding:10px; font-weight:lighter;'>" . $serviceList . "</td>
                        </tr>

                        <tr>
                            <th style='padding:10px; text-align:left; background:#f2f2f2;'>Therapist:</th>
                            <td style='padding:10px; font-weight:lighter; background:#f2f2f2;'>" . esc($name_) . "</td>
                        </tr>

                        <tr>
                            <th style='padding:10px; text-align:left;'>Date:</th>
                            <td style='padding:10px; font-weight:lighter;'>" . esc($date) . "</td>
                        </tr>

                        <tr>
                            <th style='padding:10px; text-align:left; background:#f2f2f2;'>Time:</th>
                            <td style='padding:10px; font-weight:lighter; background:#f2f2f2;'>" . esc($time) . "</td>
                        </tr>

                        <tr>
                            <th style='padding:10px; text-align:left;'>Phone:</th>
                            <td style='padding:10px; font-weight:lighter;'>" . esc($phone) . "</td>
                        </tr>

                        <tr>
                            <th style='padding:10px; text-align:left; background:#f2f2f2;'>50% Deposit Paid:</th>
                            <td style='padding:10px; font-weight:lighter; background:#f2f2f2;'>R" . esc($deposit) . "</td>
                        </tr>

                        <tr>
                            <th style='padding:10px; text-align:left;'>Amount Due:</th>
                            <td style='padding:10px; font-weight:lighter;'>R" . esc($amountDue) . "</td>
                        </tr>

                    </table>
                <br>";

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
                $mail->setFrom(SMTP_EMAIL, 'DataSync Hair & Beauty');
                $mail->addReplyTo(SMTP_EMAIL);

                // Approved Booking
                if (isset($_GET['mode']) && $_GET['mode'] == "approved") {
                    $servicesModel->query("UPDATE services SET paid = 1 WHERE id = :id", ['id' => $orderId]);

                    // Email to customer
                    $mail->addAddress($email, $name);
                    $mail->Subject = "Your Booking is Confirmed - #$orderId";
                    $mail->Body = "
                        <html><body>
                            <div style='font-family: Arial, sans-serif;'>
                                <h2>Thank You, $name!</h2>
                                <p>Your booking is confirmed. See your details below:</p>
                                $bookingTable
                                <p>We look forward to seeing you soon!</p>
                                <p style='color: gray;'>DataSync Hair & Beauty</p>
                            </div>
                        </body></html>
                    ";
                    $mail->send();
                    $mail->clearAddresses();

                    // Email to admin
                    $mail->addAddress($adminEmail, 'DataSync Admin');
                    $mail->Subject = "New Booking Received: #$orderId";
                    $mail->Body = "
                        <html><body>
                            <div style='font-family: Arial, sans-serif;'>
                                <h2>New Booking Received</h2>
                                $bookingTable
                                <p>Please schedule accordingly.</p>
                                <p style='font-size: 12px; color: gray;'>System Notification | DataSync Hair & Beauty</p>
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
                                <p style='color: gray;'>DataSync Hair & Beauty</p>
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
                                <p style='color: gray;'>DataSync Hair & Beauty</p>
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