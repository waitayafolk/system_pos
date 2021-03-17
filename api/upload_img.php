  
<?php

include('condb.php');
$params = json_decode(file_get_contents('php://input'));

  $barcode2 = $_GET['barcode'];
  $barcode = "GPM".$barcode2;
  $stmt = $pdo->prepare("SELECT * FROM tb_grop_product WHERE grop_barcode = :grop_barcode");
  $stmt->execute([':grop_barcode'=>$barcode]);
  $grop = $stmt->fetch();
  $oldImage = $grop['grop_pic'];
  $f = $_FILES[0];
  $name = $f['name'];
  $ext = explode('.', $name);
  $ext = $ext[count($ext) - 1];
  $arr = explode('/', $_SERVER['HTTP_REFERER']);
  $org = $arr[4];
  
//   if (!empty($f)) {
//     $tmp_name = $f['tmp_name'];
//     $name = $f['name'];
//     $size = $f['size'];
    

//     $stmt = $pdo->prepare("SELECT * FROM tb_product WHERE product_code = :product_code AND product_pic LIKE '%_product_2_%'");
//     $stmt->execute([':product_code'=>$barcode]);
//     $check = $stmt->fetch();
//     if(!empty($check)){
//       $name = $org.'_Gropproduct_1_'.$barcode.'.'.$ext;
//     }else{
//       $name = $org.'_Gropproduct_2_'.$barcode.'.'.$ext;
//     }
//     // print_r($name);exit();
    
//     if (move_uploaded_file($tmp_name, '../../../upload/img/' . $name)) {
//       $sql = "UPDATE tb_grop_product SET grop_pic=:grop_pic WHERE grop_barcode=:grop_barcode AND status='use'";
//       $stmt = $pdo->prepare($sql);
//       if($stmt->execute([':grop_pic'=>$name,':grop_barcode'=>$barcode])){
//         echo json_encode(array('grop_pic' => $name, 'size' => $size));
//       }
//     } else {
//       print_r($f); 
//     }
//   }