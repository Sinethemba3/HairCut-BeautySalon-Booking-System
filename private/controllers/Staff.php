<?php
class Staff extends Controller
{
    // 1) Require login
    public function __construct()
    {
        if (!Auth::logged_in()) {
            $this->redirect("login");
        }
    }

    public function index($id = '')
    {
        $userModel = new User();
        $services  = new Service();
        $session   = new Session();
        $request   = new Request();

        $id = trim($id) === '' ? Auth::getUser_id() : $id;

        $mode = strtolower($session->get('selected_mode', 'hair'));
        $occupation = ucfirst($mode);

        $branchKey = strtolower($session->get('selected_branch', 'east-london'));
        $branchMap = [
            'east-london' => 'East London',
            'mthatha'     => 'Mthatha'
        ];
        $branchValue = $branchMap[$branchKey] ?? $branchKey; 

        $query = "
            SELECT *
            FROM users
            WHERE role IN ('Staff')
            ORDER BY id DESC
        ";
        $rows = $userModel->query($query);

        $today = date('Y-m-d');

        $bookedSlots = $services->query("
            SELECT therapist_id, appointment_time, appointment_date, paid
            FROM services
            WHERE appointment_date >= :today 
            AND paid = 1
        ", ['today' => $today]);

        if (!$bookedSlots || !is_array($bookedSlots)) {
            $bookedSlots = [];
        }

        if (empty($bookedSlots)) {
            error_log("No bookings found from date: $today");
        }

        $bookings = [];

        if (is_array($bookedSlots) && count($bookedSlots) > 0) {
            foreach ($bookedSlots as $row) {
                $bookingDate = $row->appointment_date;
                if (!empty($row->therapist_id) && $row->paid == 1 && !empty($row->appointment_time)) {
                    $bookings[$row->therapist_id][$bookingDate][] = $row->appointment_time;
                }
            }
        } else {
            $bookings = [];
        }
        // show($bookings) or die();

        $myrow = $services->first('user_id', $id);

        if (count($_POST) > 0) {
            if (is_object($myrow)) {
                $services->update($myrow->id, $_POST);
            }
            $this->redirect("staff/{$id}");
        }

        $this->view('staff', [
            'rows'     => $rows,
            'mode'     => $mode,
            'branch'   => $branchValue,
            'bookings' => $bookings,
        ]);
    }
}
