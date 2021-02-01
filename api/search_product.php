<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));

// print_r($params);exit();

if(empty($params)){
    $sql =" SELECT * FROM tb_product WHERE status = 'use'ORDER BY id DESC ";
}
if(!empty($params)){
    $keyword = $params->name;
    $sql =" SELECT * FROM tb_product WHERE (product_name LIKE '%{$keyword}%' OR product_code LIKE '%{$keyword}%') AND  status = 'use'ORDER BY id DESC ";
    
}
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $find_product = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array('find_product' => $find_product));

?>

