<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));
    $sql =" SELECT * FROM tb_bill_sale WHERE status = 'use' ORDER BY bill_id DESC ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $bill = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array('bill' => $bill));
?>