<?php
    class OpeningHour extends Model
    {
        protected $table = 'opening_hours';

        protected $allowedColumns = [
            'public_holidays',
            'mondays_sundays',
            'sundays',
            'public_holidays_time',
            'mondays_sundays_time',
            'sundays_time',
            'user_id',
            'date',
        ];

        protected $beforeInsert = [
            'make_user_id',
            'make_salon_id',
        ];

        protected $afterSelect = [
            'get_user',
        ];

        public function validate(array $data): bool
        {
            $this->errors = [];
        
            // Validate each required field
            $this->validateHolidays($data['public_holidays'] ?? null);
            $this->validateDays($data['mondays_sundays'] ?? null);
            $this->validateDay($data['sundays'] ?? null);
            $this->validateHolidaysTimee($data['public_holidays_time'] ?? null);
            $this->validateDaysTime($data['mondays_sundays_time'] ?? null);
            $this->validateDayTime($data['sundays_time'] ?? null);

            return empty($this->errors);
        }

        private function validateHolidays(?string $holidays): void
        {
            if (empty($holidays)) {
                $this->errors['public_holidays'] = "A Holidays are required";
            } elseif (!preg_match('/^[a-z A-Z \s#%&.]+$/', $holidays)) {
                $this->errors['public_holidays'] = "Holidays can only contain letters, spaces, and the characters #, %, &.";
            }
        }

        
        private function validateDay(?string $day): void
        {
            if (empty($day)) {
                $this->errors['sundays'] = "A Day is required";
            } elseif (!preg_match('/^[a-z A-Z \s#%&.]+$/', $day)) {
                $this->errors['sundays'] = "Day can only contain letters, spaces, and the characters #, %, &.";
            }
        }

        private function validateDays(?string $days): void
        {
            if (empty($days)) {
                $this->errors['mondays_sundays'] = "A Days are required";
            } elseif (!preg_match('/^[a-z A-Z \s#%&.]+$/', $days)) {
                $this->errors['mondays_sundays'] = "Days can only contain letters, spaces, and the characters #, %, &.";
            }
        }

        private function validateHolidaysTimee(?string $public): void
        {
            if (empty($public)) {
                $this->errors['public_holidays_time'] = "A Holiday time is required";
            } elseif (!preg_match('/^[a-z A-Z 0-9 \s#%&.:]+$/', $public)) {
                $this->errors['public_holidays_time'] = "Holiday time can only contain letters, spaces, and the characters #, %, &.";
            }
        }

        private function validateDaysTime(?string $time): void
        {
            if (empty($time)) {
                $this->errors['mondays_sundays_time'] = "Working times are required";
            } elseif (!preg_match('/^[a-z A-Z 0-9 \s#%&.:]+$/', $time)) {
                $this->errors['mondays_sundays_time'] = "Working times can only contain letters, spaces, and the characters #, %, &.";
            }
        }

        private function validateDayTime(?string $times): void
        {
            if (empty($times)) {
                $this->errors['sundays_time'] = "A time is required";
            } elseif (!preg_match('/^[a-z A-Z 0-9 \s#%&.:]+$/', $times)) {
                $this->errors['sundays_time'] = "Time can only contain letters, spaces, and the characters #, %, &.";
            }
        }

        public function make_user_id($data)
        {
            if(isset($_SESSION['USER']->user_id)){
                $data['user_id'] = $_SESSION['USER']->user_id;
            }
            return $data;
        }

        public function make_salon_id($data)
        {
            $data['salon_id'] = random_string(60);
            return $data;
        }

        public function get_user($data)
        {
            $user = new User();

            foreach ($data as $key => $row) {
                $result = $user->where('user_id', $row->user_id);
                $data[$key]->user = is_array($result) ? $result[0] : false;
            }

            return $data;
        }
    }
