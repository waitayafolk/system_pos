<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));
// print_r($params);exit(); 
if(!empty($params->id)){
    $sql = "
    UPDATE tb_product set product_code = :product_code , product_name = :product_name , product_price = :product_price , group_product_id = :group_product_id , product_detail = :product_detail
    WHERE id = :id";
    $product = array(
        ':product_code' => $params->product_code,
        ':product_name' => $params->product_name,
        ':product_price' => $params->product_price,
        ':group_product_id' => $params->group_product_id,
        ':product_detail' => $params->product_detail,
        ':id' => $params->id
    );
    $stmt = $pdo->prepare($sql);
    $stmt->execute($product);
    }
    else{
        $sql = "
        INSERT INTO tb_product(product_code, product_name, product_price , product_detail, group_product_id, status) 
        VALUES(:product_code, :product_name, :product_price , :product_detail, :group_product_id, 'use')
        ";
        $product = array(
            ':product_code' => $params->product_code,
            ':product_name' => $params->product_name,
            ':product_price' => $params->product_price,
            ':product_detail' => $params->product_detail,
            ':group_product_id' => $params->group_product_id
        );
        $stmt = $pdo->prepare($sql);
        $stmt->execute($product);
    }       
            echo json_encode(array('message' => 'success'));
?>