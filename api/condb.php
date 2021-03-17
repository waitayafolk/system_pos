<?php 
date_default_timezone_set("Asia/Bangkok");

include 'config.php';

$dsn = 'mysql:host='.$host.';dbname='.$db_name.';charset=utf8';
$usr = $user;
$pwd = $pass;

$pdo = new PDO($dsn, $usr, $pwd);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
// $pdo -> exec("set names utf8");
// print_r($host);exit();
?>