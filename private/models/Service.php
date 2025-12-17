<?php
	class Service extends Model
	{
		protected $table = 'services';

		protected $allowedColumns = [
			'name',
			'name_',
			'surname_',
			'appointment_time',
			'appointment_date',
			'email',
			'amount',
			'phone',
			'services_',
			'status',
			'paid',
			'remark',
			'user_url',
			'therapist_id',
			'terms',
			'time',
			'date',
		];

		protected $beforeInsert = [
			'make_user_id',
			'make_appointment_id',
		];

		public function validate($DATA, $id = '')
		{
			$this->errors = array();
			
			if(empty($this->errors))
			{
				return true;
			}

			return false;
		}

		public function make_user_id($data)
		{
			if (isset($_SESSION['USER']->user_id)){
				$data['user_id'] = $_SESSION['USER']->user_id;
			}

			return $data;
		}

		public function make_appointment_id($data)
		{
			$data['appointment_id'] = random_str(8);
			
			return $data;
		}

		public function get_appointments_count()
		{
			if (!Auth::access('Admin')) {
				return 0;
			}

			$services = new Service();

			// Count only rows where status is Pending and name is neither NULL nor empty
			$query = "
				SELECT COUNT(*) AS cnt
				FROM services
				WHERE status = 'Pending'
				AND name IS NOT NULL
				AND TRIM(name) <> ''
			";

			// run() returns raw PDOStatement; query() usually returns array of objects
			$result = $services->query($query);

			if ($result && isset($result[0]->cnt)) {
				return (int) $result[0]->cnt;
			}

			return 0;
		}

		public function get_revenue_last_month()
		{
			$services  = new Service();
			// e.g. "2025-06"
			$lastMonth = date('Y-m', strtotime('-1 month'));

			// Sum only paid services for that year‑month, and return 0 if none
			$sql = "
				SELECT COALESCE(SUM(amount), 0) AS total
				FROM services
				WHERE paid = 1
				AND DATE_FORMAT(`date`, '%Y-%m') = ?
			";

			$result = $services->query($sql, [$lastMonth]);

			// $result[0]->total will always be numeric (0 if no rows)
			return (float) ($result[0]->total ?? 0);
		}
	}