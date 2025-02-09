<?php

require_once './../../bootstrap.php';

$name = strval($_POST['name']);
$id = intval($_GET['id']);

$db = new Database();
$db->execute(
    "Update provinces set name = :name where id = id",
    ['name' => $name, 'id' => $id]
);

echo json_encode([
    'result' => true,
    'message' => 'Update successfully.'
]);