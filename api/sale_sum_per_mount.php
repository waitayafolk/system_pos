<?php
include('condb.php');
for ($i = 1; $i < 13; $i++) {

$from_date = "2021"."-".$i."-01";
$to_date = "2021"."-".$i."-31";

$from_date1 = str_replace('-', '/', $from_date);
$to_date1 = str_replace('-', '/', $to_date);
    $sql =" SELECT  SUM(total_sale) AS total_sale  FROM tb_bill_sale 
    WHERE status = 'use' AND date(pay_date) BETWEEN :from_date AND :to_date GROUP BY pay_date";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':from_date' => $from_date1,
        ':to_date' => $to_date1,
    ));

    $sum_total = $stmt->fetch();
    if(empty($sum_total)){
        $sum_total = 0;
    }
    // print_r($sum_total['total_sale']);exit();
    $row = array(
        'sum_total' => $sum_total['total_sale'],
        'mount' => $i,

    );
    $arr[] = $row;
    
}
echo json_encode(array('sum_total' => $arr));

?>

