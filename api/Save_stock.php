<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));
  // print_r($params);exit();
$sql = "
  INSERT INTO tb_stock (bill_id, user, created_date, status) 
  VALUES(:bill_id, :user,  NOW(), 'use')
";

$stmt = $pdo->prepare($sql);
$stmt->execute(array(
  ':bill_id' => $params->bill->code,
  ':user' => $params->bill->user
));

$id = $pdo->lastInsertId();

$temp = $params->temp;
foreach ($temp as $r) { 

  $sql = "
    INSERT INTO tb_stock_detail(stock_id, product_id, 	qty, price, status) 
    VALUES(:stock_id, :product_id, :qty, :price, 'use')
  ";

  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
    ':stock_id' => $id,
    ':product_id' => $r->product_id,
    ':qty' => $r->qty,
    ':price' => $r->product_price
  ));

  $sql = "DELETE FROM tb_stock_temp WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
    ':id' => $r->id
  ));
}

echo json_encode(array('message' => 'success'));

?>

