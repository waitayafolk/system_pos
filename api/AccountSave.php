<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));
$sql = "
INSERT INTO tb_admin(user_code, name, username, password, level, status) 
VALUES(:user_code, :name, :username, :password, 'membery', 'use')
";
$user = array(
    ':user_code' => $params->user_code,
    ':name' => $params->name,
    ':username' => $params->username,
    ':password' => $params->password,
    
);
$stmt = $pdo->prepare($sql);
$stmt->execute($user);
echo json_encode(array('message' => 'success'));
?>

