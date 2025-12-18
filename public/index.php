<?php
    // Enable error reporting for development
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    // Start session if not already started
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    // DOMAIN/IP HANDLING
    define('LOCAL_IP', '192.168.0.221'); // Just the IP, no port
    define('DOMAIN_NAME', 'datasync');
    define('BASE_PATH', '/projects/bookings/public');

    $protocol = (
        (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ||
        $_SERVER['SERVER_PORT'] == 443
    ) ? 'https://' : 'http://';

    $currentHost = $_SERVER['HTTP_HOST'];
    $requestUri  = $_SERVER['REQUEST_URI'];

    // Detect IP access by checking if the host is the IP address (without port)
    $hostWithoutPort = explode(':', $currentHost)[0];
    $isIPAccess = ($hostWithoutPort === LOCAL_IP);

    // Redirect if accessed via IP to the domain name with port
    if ($isIPAccess) {
        // Include port in redirect URL
        $redirectUrl = $protocol . DOMAIN_NAME . ':8089' . $requestUri;
        header("Location: $redirectUrl", true, 301);
        exit;
    }

    // Define base URL for app usage, including port
    define('BASE_URL', $protocol . DOMAIN_NAME . ':8089' . BASE_PATH);

    // Minimum PHP version required
    $minPHPVersion = '8.0';
    $currentPHPVersion = phpversion();

    // Check if the PHP version is valid
    if (version_compare($currentPHPVersion, $minPHPVersion, '<')) {
        die("Your PHP version must be {$minPHPVersion} or higher to run this app. Your current version is {$currentPHPVersion}.");
    }

    // Autoload the application classes
    require_once '../private/core/Autoload.php';

    // Initialize the application
    $app = new App();