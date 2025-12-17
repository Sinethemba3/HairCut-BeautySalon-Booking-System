<?php
    class PayBookings extends  Controller
    {
        public function index()
        {
            
        }

        public function edit($id = '')
        {
            $ses = new Session;
            $req = new Request;
            $services = new Service();

            // Use passed ID or fallback to logged-in user
            $id = trim($id == '') ? Auth::getUser_id() : $id;

            // Load service data (for display in view)
            $query = "SELECT * FROM services ORDER BY id DESC";
            $data = $services->query($query);

            if ($req->posted()) {
                $arr = $req->post();
                $myrow = $services->first('user_id', $id); // get appointment by user_id

                if (is_object($myrow)) {
                    $appointmentId = $myrow->id;

                    // Store admin/creator ID
                    $arr['user_url'] = $ses->user('id');

                    // Preserve original amount
                    $arr['amount'] = $myrow->amount;

                    // Update appointment
                    $services->update($appointmentId, $arr);

                    // Send payment link to client
                    $this->sendPaymentLink($appointmentId, $myrow);
                }
            }

            // Show the edit form view
            $this->view('payBookings.edit', [
                'row' => $data,
            ]);
        }

        private function sendPaymentLink($appointmentId, $appointment)
        {
            // 1. Generate secure token and link
            $token = md5("appointment_/{$appointmentId}/_secure");
            $paymentLink = ROOT . "/payBookings/edit?appointment_id={$appointmentId}&token={$token}";

            // 2. Calculate total and 50% deposit
            $amountsData = $appointment->amount ?? '0'; // e.g. "320, 380, 180"
            $amountsArray = explode(',', $amountsData);
            $total = 0;

            foreach ($amountsArray as $amount) {
                $trimmedAmount = trim($amount);
                if (is_numeric($trimmedAmount)) {
                    $total += floatval($trimmedAmount);
                }
            }

            $vatTotal = $total * 1.14; // Add VAT
            $deposit = number_format($vatTotal / 2, 2);

            // 3. Format the message
            $customerName = $appointment->name ?? 'Client';
            $message = "Hi $customerName, your appointment is received.\n\n"
                    . "Please pay *50% now* (R$deposit).\n"
                    . "The remaining 50% is due *upon arrival at the venue*.\n\n"
                    . "Secure Payment Link:\n$paymentLink";

            // 4. Format phone number for WhatsApp
            $phone = $appointment->phone ?? '';
            $waNumber = "27" . ltrim($phone, '0');

            // 5. WhatsApp deep link
            $waLink = "https://wa.me/{$waNumber}?text=" . urlencode($message);

            // 6. Redirect (or use actual API later)
            echo "<script>window.open('$waLink', '_blank');</script>";
        }
    }