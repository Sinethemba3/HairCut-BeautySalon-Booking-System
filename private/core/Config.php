<?php 
	if ($_SERVER['SERVER_NAME'] == 'localhost') {
		// Local database config
		define('DBNAME', 'bookings-db');
		define('DBHOST', 'localhost');
		define('DBUSER', 'root');
		define('DBPASS', '');
		define('DBDRIVER', 'mysql');
		
		// URL for local production
		define('ROOT', 'http://localhost:8089/projects/bookings/public');

		// Redirect URLs for local production
		define('PAYFAST_RETURN_URL', ROOT . '/thanks?mode=approved');
		define('PAYFAST_CANCEL_URL', ROOT . '/thanks?mode=cancel');
		define('BOOKINGS_RETURN_URL', ROOT . '/finish?mode=approved');
		define('BOOKINGS_CANCEL_URL', ROOT . '/finish?mode=cancel');
		define('PAYFAST_NOTIFY_URL', ROOT . '/notify');

		// SMTP Credentials for local
		define('SMTP_EMAIL', 'nxayiphi3@gmail.com');
		define('SMTP_PASSWORD', 'lzvjxtnayuajfqxs'); // Gmail App Passwordd
	} 
	else {
		// Live database config
		define('DBNAME', 'bookings-db');
		define('DBHOST', 'localhost');
		define('DBUSER', 'root');
		define('DBPASS', '');
		define('DBDRIVER', 'mysql');  
	
		// URL for live production
		define('ROOT', 'http://datasync:8089/projects/bookings/public');

		// Redirect URLs for live production
		define('PAYFAST_RETURN_URL', ROOT . '/thanks?mode=approved');
		define('PAYFAST_CANCEL_URL', ROOT . '/thanks?mode=cancel');
		define('BOOKINGS_RETURN_URL', ROOT . '/finish?mode=approved');
		define('BOOKINGS_CANCEL_URL', ROOT . '/finish?mode=cancel');
		define('PAYFAST_NOTIFY_URL', ROOT . '/notify');

		// SMTP Credentials for local
		define('SMTP_EMAIL', 'nxayiphi3@gmail.com');
		define('SMTP_PASSWORD', 'lzvjxtnayuajfqxs'); // Gmail App Password
	}

	define('APP_NAME', "Bookings");
	define('APP_DESC', "Website");

	// PayFast credentials
	define('PAYFAST_MERCHANT_ID', '10004002'); // Merchant ID
	define('SPLIT_PAYMENT_MERCHANT_ID', '26217897'); // For Split Payment Merchant ID
	define('PAYFAST_MERCHANT_KEY', '');
	define('PAYFAST_PASSPHRASE', '');

	// Sandbox mode
	define('PAYFAST_SANDBOX_MODE', true); // Set it to false to make it LIVE

	/** true means show errors **/
	define('DEBUG', true);
