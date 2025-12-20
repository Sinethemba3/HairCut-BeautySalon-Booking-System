<?php
	// DETECT ENVIRONMENT
	$serverName = $_SERVER['SERVER_NAME'] ?? 'localhost';

	// LOCAL ENVIRONMENT
	if ($serverName === 'localhost') {

		define('DBNAME', 'bookings-db');
		define('DBHOST', 'localhost');
		define('DBUSER', 'root');
		define('DBPASS', '');
		define('DBDRIVER', 'mysql');

		// LOCAL PATH
		define('ROOT', 'http://localhost:8089/projects/bookings/public');

	} else {
		// PRODUCTION ENVIRONMENT
		define('DBNAME', 'bookings-db');
		define('DBHOST', 'localhost');
		define('DBUSER', 'root');
		define('DBPASS', '');
		define('DBDRIVER', 'mysql');

		// PRODUCTION PATH
		define('ROOT', 'http://192.168.0.221:8089/projects/bookings/public');
	}

	// SHARED SETTINGS
	define('PAYFAST_RETURN_URL', ROOT . '/thanks?mode=approved');
	define('PAYFAST_CANCEL_URL', ROOT . '/thanks?mode=cancel');
	define('BOOKINGS_RETURN_URL', ROOT . '/finish?mode=approved');
	define('BOOKINGS_CANCEL_URL', ROOT . '/finish?mode=cancel');
	define('PAYFAST_NOTIFY_URL', ROOT . '/notify');

	define('SMTP_EMAIL', 'nxayiphi3@gmail.com');
	define('SMTP_PASSWORD', 'lzvjxtnayuajfqxs'); // Gmail App Password

	define('APP_NAME', 'Bookings');
	define('APP_DESC', 'Website');

	// PAYFAST
	define('PAYFAST_MERCHANT_ID', '10004002');
	define('SPLIT_PAYMENT_MERCHANT_ID', '26217897');
	define('PAYFAST_MERCHANT_KEY', '');
	define('PAYFAST_PASSPHRASE', '');
	define('PAYFAST_SANDBOX_MODE', true);

	// DEBUG
	define('DEBUG', true);
