<?php
    require_once 'Config.php';
    require_once 'Functions.php';
    require_once 'Database.php';
    require_once 'Controller.php';
    require_once 'Model.php';
    require_once 'App.php';

    spl_autoload_register(function($class_name){
        require_once "../private/models/". ucfirst($class_name) . ".php";
    });