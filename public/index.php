<?php
    // Enable error reporting for development
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    // Start session if not already started
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

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
