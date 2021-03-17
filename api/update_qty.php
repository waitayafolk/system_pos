<?php

include('condb.php');
$params = json_decode(file_get_contents('php://input'));
// print_r($params);exit(); 
    $sql = "
    UPDATE tb_sale_temp set qty = :qty WHERE id = :id";
    $product = array(
        ':qty' => $params->qty,
        ':id' => $params->id
    );
    $stmt = $pdo->prepare($sql);
    $stmt->execute($product);
    echo json_encode(array('message' => 'success'));
?>
