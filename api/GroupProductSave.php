<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));

// print_r($params);exit();
if(empty($params->id)){
    $sql = "    
    INSERT INTO tb_group_product(group_code ,group_product_name ,group_product_name_eng ,detail ,status )VALUE
    (:group_code ,:group_product_name ,:group_product_name_eng ,:detail ,'use')";
    $group = array(
       ':group_code' => $params->group_code ,
       ':group_product_name' => $params->group_product_name ,
       ':group_product_name_eng' =>  $params->group_product_name_eng ,
       ':detail' =>$params->detail ,
    );
    $stmt = $pdo->prepare($sql);
    $stmt->execute($group);
}
if(!empty($params->id)){
    $sql = "
        UPDATE tb_group_product set group_code = :group_code , group_product_name = :group_product_name , group_product_name_eng = :group_product_name_eng , detail = :detail 
        WHERE id = :id ";
        $group = array(
            ':group_code' => $params->group_code,
            ':group_product_name' => $params->group_product_name,
            ':group_product_name_eng' => $params->group_product_name_eng,
            ':detail' => $params->detail,
            ':id' => $params->id
        );
        $stmt = $pdo->prepare($sql);
        $stmt->execute($group);
}

        echo json_encode(array('message' => 'success'));

?>