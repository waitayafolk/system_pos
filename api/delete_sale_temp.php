<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));
//   print_r($params);exit();
  $sql = "
  DELETE FROM tb_sale_temp  WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
    ':id' => $params
  ));
  
  echo json_encode(array('message' => 'success'));

?>