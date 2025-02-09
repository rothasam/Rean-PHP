<?php

require_once './../../bootstrap.php';

// echo 'hi';
// echo __DIR__;


$db = new Database();
$name = strval(($_POST['name']));
$db->execute('Insert into provinces (name) values (:name)',['name' => $name]);
echo json_encode([
    'result' => true,
    'message' => 'Save successfully.'
]);