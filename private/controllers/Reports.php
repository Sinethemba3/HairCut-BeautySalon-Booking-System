<?php
	class Reports extends  Controller
	{
		public function index()
		{
			$errors = [];

			$servicesData = new Service();

			// Fetch appointments
			$query = "SELECT * FROM services ORDER BY appointment_date DESC";
			$appointments = $servicesData->query($query );

			$this->view('./reports', [
				'errors' => $errors,
				'appointments' => $appointments,
			]);
		}

	}