<?php

include('condb.php');

  $barcode = $_GET['barcode'];
  
  $stmt = $pdo->prepare("SELECT * FROM tb_product WHERE product_code = :product_code");
  $stmt->execute([':product_code'=>$barcode]);
  $product = $stmt->fetch();
  
  $oldImage = $product['img'];
  $f = $_FILES;
  // $name = $f['name'];
  // $ext = explode('.', $name);
  // $ext = $ext[count($ext) - 1];
  // $arr = explode('/', $_SERVER['HTTP_REFERER']);
  // $org = $arr[4];
  print_r($_FILES);exit();
  if (!empty($f)) {
    $tmp_name = $f['tmp_name'];
    $name = $f['name'];
    $size = $f['size'];
    

    $stmt = $pdo->prepare("SELECT * FROM tb_mod_manufitness_member WHERE member_code = :member_code AND member_pic LIKE '%_product_2_%'");
    $stmt->execute([':member_code'=>$barcode]);
    $check = $stmt->fetch();
    if(!empty($check)){
      $name = $org.'_membercode_1_'.$barcode.'.'.$ext;
    }else{
      $name = $org.'_membercode_2_'.$barcode.'.'.$ext;
    }
    // print_r($name);exit();
    
    if (move_uploaded_file($tmp_name, '../../../upload/img/' . $name)) {
      $sql = "UPDATE tb_mod_manufitness_member SET member_pic=:member_pic WHERE member_code=:member_code AND status='use'";
      $stmt = $pdo->prepare($sql);
      if($stmt->execute([':member_pic'=>$name,':member_code'=>$barcode])){
        echo json_encode(array('member_pic' => $name, 'size' => $size));
      }
    } else {
      print_r($f); 
    }
  }
