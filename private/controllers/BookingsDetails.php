<?php
    class BookingsDetails extends  Controller
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
            $id = trim($id) === '' ? Auth::getUser_id() : $id;

            // Load service data for the view
            $query = "SELECT * FROM services ORDER BY id DESC";
            $data = $services->query($query);

            if ($req->posted()) {
                $arr = $req->post();
                $myrow = $services->first('user_id', $id); // get existing appointment by user_id

                if (is_object($myrow)) {
                    $appointmentId = $myrow->id;

                    // Store admin/creator ID
                    $arr['user_url'] = $ses->user('id');

                    // Preserve original amount (if needed)
                    $arr['amount'] = $myrow->amount;

                    // Update appointment with posted data
                    $services->update($appointmentId, $arr);

                    // Re-fetch updated appointment data after update
                    $updatedAppointment = $services->first('user_id', $id);

                    // Generate WhatsApp payment link and message data
                    $waData = $this->generateWhatsAppData($appointmentId, $updatedAppointment);

                    // Save WhatsApp data in session for modal in the view
                    $ses->set([
                        'wa_link' => $waData['link'],
                        'wa_customer' => $waData['client'],
                        'wa_number' => $waData['number'],
                        'wa_deposit' => $waData['deposit'],
                        'wa_payment_link' => $waData['paymentLink'],
                    ]);

                    // Redirect to clear POST and trigger modal in view
                    $this->redirect("bookingsDetails/edit/{$id}");
                }
            }

            // Show the edit form view
            $this->view('bookingsDetails.edit', [
                'row' => $data,
            ]);
        }

        /**
         * Generate WhatsApp payment link and message data for an appointment
         */
        private function generateWhatsAppData($appointmentId, $appointment)
        {
            $token = md5("appointment_/{$appointmentId}/_secure");
            $paymentLink = ROOT . "/payBookings/edit?appointment_id={$appointmentId}&token={$token}";

            $amountsData = $appointment->amount ?? '0'; // e.g. "320, 380, 180"
            $amountsArray = explode(',', $amountsData);
            $total = 0;

            foreach ($amountsArray as $amount) {
                $trimmed = trim($amount);
                if (is_numeric($trimmed)) {
                    $total += floatval($trimmed);
                }
            }

            $vatTotal = $total * 1.14; // Add 14% VAT
            $deposit = number_format($vatTotal / 2, 2);

            $name = $appointment->name ?? 'Client';
            $phone = $appointment->phone ?? '';

            // Format phone for South Africa (e.g. 0876542345 to 27876542345)
            $waNumber = "27" . ltrim($phone, '0');

            // WhatsApp message with HTML anchor (WhatsApp supports basic link)
            $message = "Hi $name, your appointment is received.\n\n"
                . "Please pay *50% now* (R$deposit).\n"
                . "The remaining 50% is due *upon arrival at the venue*.\n\n"
                . "Please use this Secure Payment Link:\n$paymentLink";

            // WhatsApp API link
            $waLink = "https://wa.me/{$waNumber}?text=" . urlencode($message);

            return [
                'link' => $waLink,
                'message' => $message,
                'deposit' => $deposit,
                'client' => $name,
                'number' => $waNumber,
                'paymentLink' => $paymentLink,
            ];
        }
    }

    