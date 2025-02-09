<?php

require_once './../../bootstrap.php';

$db = new Database();

$sql = "select id, name from provinces";
$params = [];
if(isset($_GET['search'])){
    $search = strval($_GET['search']);
    $sql .= " where name like :s";
    $params['s'] = '%'. $search .'%';
}

$provinces = $db->executeAssoc($sql,$params);

echo json_encode([
    'result' => true,
    'message' => 'Get provinces successfully.',
    'data' => $provinces,
]);