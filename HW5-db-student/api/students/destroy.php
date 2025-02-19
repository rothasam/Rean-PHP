<?php

require_once './../../bootstrap.php';
$db = new Database();
$id = intval($_GET['id']);
$sql = 'DELETE FROM students WHERE id = :id';
$params = ['id' => $id];

if ($id <= 0) {
   echo json_encode([
       'result' => false,
       'message' => 'Invalid student ID.'
   ]);
   exit;
}

$sqlCheckId = 'SELECT COUNT(*) FROM students WHERE id = :id';
$isExist = $db->fetchColumn($sqlCheckId, ['id' => $id]);

if(!$isExist){
   echo json_encode([
       'result' => false,
       'message' => 'Student not found.',
   ]);
   exit;
}


$db->execute($sql, $params);

echo json_encode([
   'result' => true,
   'message' => 'Delete student successfully.'
]);

?>