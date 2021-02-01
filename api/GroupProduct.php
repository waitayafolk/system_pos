<?php
include('condb.php');
    $sql = "SELECT * FROM tb_group_product WHERE status = 'use' ORDER BY id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $group_product = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(array('group_product' => $group_product));
?>