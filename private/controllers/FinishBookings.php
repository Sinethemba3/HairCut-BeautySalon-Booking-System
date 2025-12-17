<?php
    class FinishBookings extends  Controller
    {
        // 1) Require login
        public function __construct()
        {
            if (!Auth::logged_in()) {
                $this->redirect("login");
            }
        }

        public function index()
        {
            
        }

        public function edit($id = '')
        {
            $errors   = [];
            $services = new Service();
            $users    = new User();

            $id = trim($id == '') ? Auth::getUser_id() : $id;

            // 1. Handle form submission
            if (count($_POST) > 0) {
                $myrow = $services->first('user_id', $id);
                if (is_object($myrow)) {
                    $services->update($myrow->id, $_POST);
                }
                $this->redirect("bookingsDetails/edit/{$id}");
            }

            // 2. Get service row (so we can get therapist_id)
            $serviceRow = $services->first('user_id', $id);

            // 3. Get therapist from users table using therapist_id
            $therapist = null;
            if ($serviceRow && !empty($serviceRow->therapist_id)) {
                $therapist = $users->first('id', $serviceRow->therapist_id);
            }

            // 5. Get all paid bookings (for all therapists)
            $bookingRows = $services->query("
                SELECT therapist_id, appointment_time, appointment_date
                FROM services
                WHERE paid = 1
            ");

            $bookings = [];
            if (is_array($bookingRows)) {
                foreach ($bookingRows as $row) {
                    if (!empty($row->therapist_id) && !empty($row->appointment_date)) {
                        $bookings[$row->therapist_id][$row->appointment_date][] = $row->appointment_time;
                    }
                }
            }

            // 6. Get paid bookings for the current therapist only
            $paidBookings = $services->query("
                SELECT appointment_time, appointment_date
                FROM services
                WHERE therapist_id = :tid AND paid = 1
            ", ['tid' => $therapist->id]);

            $therapistBookings = [];
            if (is_array($paidBookings)) {
                foreach ($paidBookings as $booking) {
                    if (!empty($booking->appointment_date) && !empty($booking->appointment_time)) {
                        $therapistBookings[$booking->appointment_date][] = $booking->appointment_time;
                    }
                }
            }

            // 7. Pass data to the view
            $this->view('finishBookings.edit', [
                'errors'             => $errors,
                'therapist'          => $therapist,
                'bookings'           => $bookings,              // all therapists
                'therapistBookings'  => $therapistBookings,     // current therapist
                'selectedDate'       => date('Y-m-d'),  // today as fallback
            ]);
        }
    }