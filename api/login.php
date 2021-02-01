<?php 
session_start();
include('condb.php');
$params = json_decode(file_get_contents('php://input'));

$sql =" SELECT * FROM tb_admin WHERE status = 'use' AND username = :username AND password = :password ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $params->username);
            $stmt->bindParam(':password', $params->password);
            $stmt->execute();
            $user = $stmt->fetch();

            if(empty($user)){ 
                echo json_encode(array('message' => 'invalid'));
            }else{
                echo json_encode(array('message' => 'success' ,'user' => $user));
            }
?>