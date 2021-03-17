<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));

    $sql =" SELECT tb_product.* , 
    SUM(tb_bill_sale_detail.qty) AS stock_out,
    SUM(tb_stock_detail.qty) AS stock_in
    FROM tb_product 
    LEFT JOIN tb_bill_sale_detail ON tb_bill_sale_detail.product_id = tb_product.id
    LEFT JOIN tb_stock_detail ON tb_stock_detail.product_id = tb_product.id
    WHERE tb_product.status = 'use' 
    GROUP BY tb_product.id 
    ORDER BY tb_product.id DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $stock_product = $stmt->fetchAll();
    $y = 0;
    for ($i = 0 ; $i < count($stock_product) ; $i++ ){
        $y++;

        $sql =" SELECT  SUM(tb_bill_sale_detail.qty) AS stock_out FROM tb_bill_sale_detail 
             WHERE tb_bill_sale_detail.product_id = :product_id 
             GROUP BY tb_bill_sale_detail.product_id";
    
             $stmt = $pdo->prepare($sql);
             $stmt->execute(array(':product_id' => $stock_product[$i]['id']));
    
             $stock_out = $stmt->fetch();
    
             $sql =" SELECT  SUM(tb_stock_detail.qty) AS stock_in FROM tb_stock_detail 
             WHERE tb_stock_detail.product_id = :product_id 
             GROUP BY tb_stock_detail.product_id";
    
             $stmt = $pdo->prepare($sql);
             $stmt->execute(array(':product_id' => $stock_product[$i]['id']));
    
             $stock_in = $stmt->fetch();

             $row = array(
                'product_code' => $stock_product[$i]['product_code'],
                'product_name' => $stock_product[$i]['product_name'],
                'stock_in' => $stock_in['stock_in'],
                'stock_out' => $stock_out['stock_out']
            );
            $arr[] = $row;
        
    }
    echo json_encode(array('stock_product' => $arr));

    
?>