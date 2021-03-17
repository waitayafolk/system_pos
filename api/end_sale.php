<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));
//   print_r($params);exit();
$sql = "
  INSERT INTO tb_bill_sale ( pay_date, total_sale ,get_money , status) 
  VALUES( NOW(), :total_sale , :get_money, 'use')
";

$stmt = $pdo->prepare($sql);
$stmt->execute(array(
  ':total_sale' => $params->total,
  ':get_money' => $params->get_money,
));

$id = $pdo->lastInsertId();

$temp = $params->temp;
foreach ($temp as $r) {

  $sql = "
    INSERT INTO tb_bill_sale_detail(bill_id, product_id, qty, total) 
    VALUES(:bill_id, :product_id, :qty, :total)
  ";
  $total = $r->product_price * $r->qty ; 
//   print_r($total);exit();
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
    ':bill_id' => $id,
    ':product_id' => $r->product_id,
    ':qty' => $r->qty,
    ':total' => $total  ,
  ));

  $sql = "DELETE FROM tb_sale_temp WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
    ':id' => $r->id
  ));
}

echo json_encode(array('message' => 'success' , 'id' => $id ));

?>

