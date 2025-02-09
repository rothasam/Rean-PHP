<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require_once __DIR__ . '/config/app.php';
require_once APP_DIR . '/config/database.php';
require_once APP_DIR . '/model/Student.php';