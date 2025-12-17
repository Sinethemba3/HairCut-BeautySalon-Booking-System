<?php
	class Salon_service extends Model
	{
		protected $table = 'salon_services';

		protected $allowedColumns = [
			'service',
			'name',
			'service_name',
			'price1',
			'price2',
			'price3',
			'main_service',
			'small',
			'medium',
			'service_id',
			'large',
			'date',
		];

		protected $beforeInsert = [
			'make_user_id',
		];


		public function make_user_id($data)
		{
			if (isset($_SESSION['USER']->user_id)){
				$data['user_id'] = $_SESSION['USER']->user_id;
			}

			return $data;
		}
	}