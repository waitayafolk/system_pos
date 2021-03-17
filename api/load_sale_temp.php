<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));
    $sql =" SELECT tb_sale_temp.*,
    tb_product.product_name,
    tb_product.product_code,
    tb_product.product_price
    FROM tb_sale_temp 
    INNER JOIN tb_product ON tb_product.id = tb_sale_temp.product_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $sale_temp = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array('sale_temp' => $sale_temp));
?>