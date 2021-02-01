<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));
    $sql =" SELECT * FROM tb_admin WHERE status = 'use' ORDER BY id DESC ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array('user' => $user));
?>