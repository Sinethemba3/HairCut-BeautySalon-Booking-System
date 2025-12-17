<?php
	class Our_service extends Model
	{
		protected $table = 'our_services';

		protected $allowedColumns = [
			'image',
			'services',
			'date',
		];

		protected $beforeInsert = [
			'make_salon_id',
			'make_user_id',
			'make_service_id',
		];

		public function validate($DATA, $id = '')
		{
			$this->errors = [];

			if(empty($DATA['services'])) {
				$this->errors['services'] = "Services is required";
			}
			
			// if(empty($data['terms']))
			// {
			// 	$this->errors['terms'] = "Please accept the terms and conditions";
			// }
			
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

		public function make_salon_id($data)
		{
			if (isset($_SESSION['USER']->salon_id)){
				$data['salon_id'] = $_SESSION['USER']->salon_id;
			}

			return $data;
		}

		public function make_service_id($data)
		{
			$data['service_id'] = random_str(7);
			
			return $data;
		}
	}