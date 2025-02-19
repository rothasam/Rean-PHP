<?php

require_once './../../bootstrap.php';
$db = new Database();
$sql = "SELECT * FROM students";
$params = [];
if(isset($_GET['search'])){
    $search = strval($_GET['search']);
    $sql .= " WHERE first_name LIKE :s OR last_name LIKE :s";
    $params['s'] = '%'. $search. '%';
}

$students = $db->executeAssoc($sql, $params);

echo json_encode([
    'result' => true,
    'message' => 'Get students successfully.',
    'data' => $students
]);

?>