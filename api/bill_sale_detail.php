<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));
    $sql =" SELECT tb_bill_sale_detail.qty ,
        tb_product.product_code,
        tb_product.product_name,
        tb_product.product_price
    FROM tb_bill_sale_detail 
    LEFT JOIN tb_product ON tb_bill_sale_detail.product_id = tb_product.id
    WHERE tb_bill_sale_detail.bill_id = :bill_id
    ORDER BY tb_bill_sale_detail.id DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':bill_id' => $params));

    $detail_bill = $stmt->fetchAll();
        echo json_encode(array('detail_bill' => $detail_bill));
?>