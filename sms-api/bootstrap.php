<?php

header('Content-Type: application/json');  // Sets the response format to JSON, ensuring the client receives structured JSON data.
header('Access-Control-Allow-Origin: *'); // Allows cross-origin requests, meaning any website (*) can access the API.

require_once __DIR__ . '/config/app.php'; 
require_once APP_DIR .  '/config/database.php';
// Loads configuration files (app.php for general settings and database.php for database connection settings).


require_once APP_DIR . '/model/Database.php';
require_once APP_DIR . '/model/Province.php';
require_once APP_DIR . '/model/District.php';
require_once APP_DIR . '/model/Commune.php';
require_once APP_DIR . '/model/Village.php';
// Loads model classes (Province, District, Commune, Village) that likely represent database tables.



/*
    A bootstrap file is a script that initializes the application by setting up necessary configurations, including:

    Headers and CORS (Cross-Origin Resource Sharing) settings
    Loading configuration files
    Including essential classes and dependencies
*/

/*

    Why Use a Bootstrap File?
    1.Centralized Setup: Instead of including files in multiple places, everything is initialized here.
    2.Reusability: Other scripts can simply require this file to load all dependencies.
    3.Security: You can control what gets loaded and set security headers upfront.
    4.Consistency: Ensures all scripts use the same configuration and database connection.

*/