<?php

require_once '../../model/Teacher.php';
header('Content-Type: application/json');
// this is the error occurred in the console since we haven't include header yet
// Access to XMLHttpRequest at 'http://api-school-ms.test/api/teachers/index.php' from origin 'http://localhost:5174' has been blocked by CORS policy: No 'Access-Control-Allow-Origin' header is present on the requested resource.
header('Access-Control-Allow-Origin: *');


$teacher = new Teacher();
echo $teacher->index(); 