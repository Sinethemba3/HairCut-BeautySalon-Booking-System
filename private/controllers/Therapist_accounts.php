<?php 
class Therapist_accounts extends Controller
{
     // Require login
    public function __construct()
    {
        if (!Auth::logged_in()) {
            $this->redirect("login");
        }
    }

    public function index()
    {
        $users   = new User();
        $service = new Service();

        $userId = Auth::getUser_id();
        $user   = $users->first('user_id', $userId);

        // ROLE LABEL FIX (staff => Therapist)
        $displayRole = strtolower($user->role ?? '') === 'staff'
            ? 'Therapist'
            : ucfirst($user->role ?? '');

        // FETCH APPOINTMENTS
        $appointments    = [];

        if ($user) {
            $firstName = strtolower(trim($user->name ?? ''));
            $lastName  = strtolower(trim($user->surname ?? ''));

            $appointments = $service->query(
                "SELECT * FROM services
                WHERE LOWER(name_) = ?
                AND LOWER(surname_) = ?
                ORDER BY appointment_date DESC",
                [$firstName, $lastName]
            ) ?: [];

            // 🔄 AUTO-UPDATE STATUS: pending → completed (time passed)
            $now = strtotime(date('Y-m-d H:i:s'));

            foreach ($appointments as $appt) {

                if (empty($appt->appointment_time) || empty($appt->appointment_date)) {
                    continue; // safety guard
                }

                // Use appointment start time
                [$startTime] = explode('-', $appt->appointment_time);

                $appointmentDateTime = strtotime(
                    $appt->appointment_date . ' ' . trim($startTime)
                );

                if (
                    strtolower($appt->status) === 'pending' &&
                    $appointmentDateTime < $now
                ) {
                    $service->update($appt->id, [
                        'status' => 'completed'
                    ]);

                    // keep runtime data consistent
                    $appt->status = 'completed';
                }
            }
        }

        // WEEKLY EARNINGS (MON–SUN)
        $startOfWeek = date('Y-m-d', strtotime('monday this week'));
        $endOfWeek   = date('Y-m-d', strtotime('sunday this week'));

        $weeklyData = $service->query(
            "SELECT appointment_date, amount, status
            FROM services
            WHERE LOWER(name_) = ?
            AND LOWER(surname_) = ?
            AND appointment_date BETWEEN ? AND ?
            AND paid = 1",
            [$firstName, $lastName, $startOfWeek, $endOfWeek]
        ) ?: [];

        $weeklyEarnings = [
            'Monday'    => 0,
            'Tuesday'   => 0,
            'Wednesday' => 0,
            'Thursday'  => 0,
            'Friday'    => 0,
            'Saturday'  => 0,
            'Sunday'    => 0,
        ];

        foreach ($weeklyData as $row) {

            // ❌ Ignore unless appointment was attended
            if (strtolower($row->status) !== 'attended') {
                continue;
            }

            $day = date('l', strtotime($row->appointment_date));

            foreach (explode(',', $row->amount) as $amt) {
                $weeklyEarnings[$day] += (float) trim($amt);
            }
        }

        // MONTHLY EARNINGS
        $startOfMonth = date('Y-m-01');
        $endOfMonth   = date('Y-m-t');

        $monthlyData = $service->query(
            "SELECT amount, status
            FROM services
            WHERE LOWER(name_) = ?
            AND LOWER(surname_) = ?
            AND appointment_date BETWEEN ? AND ?
            AND paid = 1",
            [$firstName, $lastName, $startOfMonth, $endOfMonth]
        ) ?: [];

        $monthlyTotal = 0;

        foreach ($monthlyData as $row) {

            if (strtolower($row->status) !== 'attended') {
                continue;
            }

            foreach (explode(',', $row->amount) as $amt) {
                $monthlyTotal += (float) trim($amt);
            }
        }

        // WEEKLY SCHEDULE
        $daysMap = [
            'monday'    => 'Monday',
            'tuesday'   => 'Tuesday',
            'wednesday' => 'Wednesday',
            'thursday'  => 'Thursday',
            'friday'    => 'Friday',
            'saturday'  => 'Saturday',
            'sunday'    => 'Sunday',
        ];

        $workingCodes = ['mo', 'tu', 'we', 'th', 'fr', 'st', 'sn'];
        $schedule     = [];

        foreach ($daysMap as $key => $label) {
            $serviceStatuses = []; // ✅ RESET PER DAY

            $value = strtolower(trim($user->$key ?? 'off'));
            $isOff = !in_array($value, $workingCodes);

            $start = null;
            $end   = null;

            if (!$isOff) {
                foreach ($appointments as $appt) {
                    $dayOfWeek = strtolower(date('l', strtotime($appt->appointment_date)));
                    if ($dayOfWeek === $key) {
                        [$apptStart, $apptEnd] = array_map('trim', explode('-', $appt->appointment_time));
                        if (!$start || $apptStart < $start) $start = $apptStart;
                        if (!$end   || $apptEnd   > $end)   $end   = $apptEnd;

                        // ✅ Capture status (first match is enough)
                        $serviceStatuses[] = ucfirst($appt->status ?? 'Pending');
                    }
                }
            }

            $schedule[] = [
                'day'    => $label,
                'status' => $isOff ? 'Off' : 'Working',
                'hours'  => ($isOff || !$start || !$end) ? '-' : "$start - $end",

                // ✅ STATUS COLUMN RULE
                'service_statuses' => ($isOff || !$start || !$end)
                    ? ['-']
                    : array_unique($serviceStatuses),
            ];
        }

        // SEND TO VIEW
        $this->view('./therapist_accounts', [
            'user'              => $user,
            'appointments'      => $appointments,
            'therapistSchedule' => $schedule,
            'weeklyEarnings'    => $weeklyEarnings,
            'monthlyTotal'      => $monthlyTotal,
            'displayRole'       => $displayRole, // ✅ NEW
        ]);
    }
}
