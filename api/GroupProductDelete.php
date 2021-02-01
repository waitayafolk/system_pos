<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));
//   print_r($params);exit();
  $sql = "
  UPDATE tb_group_product  set status = 'delete' WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
    ':id' => $params->id
  ));
  
  echo json_encode(array('message' => 'success'));

?>