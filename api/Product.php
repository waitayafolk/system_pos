<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));
    $sql =" SELECT * FROM tb_product WHERE status = 'use' ORDER BY id DESC ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $product = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array('product' => $product));
?>