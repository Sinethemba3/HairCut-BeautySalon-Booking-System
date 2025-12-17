<?php
	class Session
	{
		public $mainkey = 'APP';
		public $userkey = 'USER';

		/** activate session if not yet started **/
		private function start_session(): int
		{
			if (session_status() === PHP_SESSION_NONE) {
				session_start();
			}
			return 1;
		}

		 /** removes a specific key from the session **/
		 public function remove(string $key): int
		 {
			 $this->start_session();
	 
			 // Check if the key exists and unset it
			 if (isset($_SESSION[$this->mainkey][$key])) {
				 unset($_SESSION[$this->mainkey][$key]);
			 }
	 
			 return 0;
		 }

		/** put data into the session **/
		public function set(mixed $keyOrArray, mixed $value = ''): int
		{
			$this->start_session();

			if (is_array($keyOrArray)) {
				foreach ($keyOrArray as $key => $value) {
					$_SESSION[$this->mainkey][$key] = $value;
				}
				return 1;
			}

			$_SESSION[$this->mainkey][$keyOrArray] = $value;

			return 1;
		}

		/** get data from the session. default is return if data not found **/
		public function get(string $key, mixed $default = ''): mixed
		{
			$this->start_session();

			return $_SESSION[$this->mainkey][$key] ?? $default;
		}

		/** saves the user row data into the session after a login **/
		public function auth(mixed $user_row): int
		{
			$this->start_session();

			// Consider storing just necessary user data (e.g. id, role, etc.)
			$_SESSION[$this->userkey] = [
				'id' => $user_row->id,
				'role' => $user_row->role,
				'name' => $user_row->name // example, adapt to what you need
			];

			return 0;
		}

		/** removes user data from the session **/
		public function logout(): int
		{
			$this->start_session();

			if (!empty($_SESSION[$this->userkey])) {
				unset($_SESSION[$this->userkey]);
			}

			return 0;
		}

		/** checks if user is logged in **/
		public function is_logged_in(): bool
		{
			$this->start_session();

			return !empty($_SESSION[$this->userkey]);
		}

		public function user(string $key = '', mixed $default = ''): mixed
		{
			$this->start_session();

			// Check for user session and return specific key or whole user data
			if (empty($key) && !empty($_SESSION[$this->userkey])) {
				// If it's an object, return the object itself
				if (is_object($_SESSION[$this->userkey])) {
					return $_SESSION[$this->userkey];
				}

				// If it's an array, return the array
				return $_SESSION[$this->userkey];
			} elseif (!empty($_SESSION[$this->userkey])) {
				// If it's an object, access the property using object syntax
				if (is_object($_SESSION[$this->userkey])) {
					return $_SESSION[$this->userkey]->$key ?? $default; // Use object syntax
				}

				// If it's an array, access the key using array syntax
				return $_SESSION[$this->userkey][$key] ?? $default;
			}

			return $default;
		}

		/** returns data from a key and deletes it **/
		public function pop(string $key, mixed $default = ''): mixed
		{
			$this->start_session();

			// Check if the key exists before trying to access it
			if (!empty($_SESSION[$this->mainkey][$key])) {
				$value = $_SESSION[$this->mainkey][$key];
				unset($_SESSION[$this->mainkey][$key]);
				return $value;
			}

			return $default;
		}

		/** returns all data from the APP array **/
		public function all(): mixed
		{
			$this->start_session();

			return $_SESSION[$this->mainkey] ?? [];
		}
	}
