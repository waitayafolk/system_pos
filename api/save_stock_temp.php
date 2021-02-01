<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));
// print_r($params);exit();
$sql = "
INSERT INTO tb_stock_temp (product_id,qty,price)VALUE(:product_id , :qty ,:price)";
$product = array(
    ':product_id' => $params->id,
    ':qty' => 1,
    ':price' => $params->product_price
);
$stmt = $pdo->prepare($sql);
$stmt->execute($product);
echo json_encode(array('message' => 'success'));
          

?>