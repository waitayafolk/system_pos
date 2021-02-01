<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));

//   print_r($params);exit();

  if(empty($params->id)){
    $sql = "
        INSERT INTO tb_admin(user_code, name, username, password, status) 
        VALUES(:user_code, :name, :username, :password, 'use')
        ";
        $user = array(
            ':user_code' => $params->user_code,
            ':name' => $params->name,
            ':username' => $params->username,
            ':password' => $params->password
        );
        $stmt = $pdo->prepare($sql);
        $stmt->execute($user);
  }if(!empty($params->id)){
    $sql = "
        UPDATE tb_admin set user_code = :user_code , name = :name , username = :username , password = :password 
        WHERE id = :id";
        $user = array(
            ':user_code' => $params->user_code,
            ':name' => $params->name,
            ':username' => $params->username,
            ':password' => $params->password,
            ':id' => $params->id
        );
        $stmt = $pdo->prepare($sql);
        $stmt->execute($user);
  }  
  
        echo json_encode(array('message' => 'success'));


?>

