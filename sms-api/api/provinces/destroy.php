<?php

require_once './../../bootstrap.php';

$db = new Database();
$db->execute('delete from provinces where id = :id', ['id' => intval($_GET['id'])]);
echo json_encode([
    'result' => true,
    'message' => 'Deleted successfully.'
]);