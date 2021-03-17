<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));
// $barcode = $_GET['barcode'];
print_r($params);exit();

  $stmt = $pdo->prepare("SELECT * FROM tb_mod_manufitness_product WHERE product_code = :product_code");
  $stmt->execute([':product_code'=>$barcode]);
  $product_code = $stmt->fetch();
  $oldImage = $product_code['product_pic'];
  $f = $_FILES[0];
  $name = $f['name'];
  $ext = explode('.', $name);
  $ext = $ext[count($ext) - 1];
  $arr = explode('/', $_SERVER['HTTP_REFERER']);
  $org = $arr[4];
  
  if (!empty($f)) {
    $tmp_name = $f['tmp_name'];
    $name = $f['name'];
    $size = $f['size'];
    

    $stmt = $pdo->prepare("SELECT * FROM tb_mod_manufitness_product WHERE product_code = :product_code AND product_pic LIKE '%_product_2_%'");
    $stmt->execute([':product_code'=>$barcode]);
    $check = $stmt->fetch();
    if(!empty($check)){
      $name = $org.'_membercode_1_'.$barcode.'.'.$ext;
    }else{
      $name = $org.'_membercode_2_'.$barcode.'.'.$ext;
    }
    // print_r($name);exit();
    
    if (move_uploaded_file($tmp_name, '../../../upload/img/' . $name)) {
      $sql = "UPDATE tb_mod_manufitness_product SET product_pic=:product_pic WHERE product_code=:product_code AND status='use'";
      $stmt = $pdo->prepare($sql);
      if($stmt->execute([':product_pic'=>$name,':product_code'=>$barcode])){
        echo json_encode(array('product_pic' => $name, 'size' => $size));
      }
    } else {
      print_r($f); 
    }
  }

?>