<?php

include('condb.php');
  $barcode = $_GET['barcode'];

  $stmt = $pdo->prepare("SELECT * FROM tb_product WHERE img = :img");
  $stmt->execute([':img'=>$barcode]);
  $barcode = $stmt->fetch();
  $oldImage = $barcode['img'];
  if (!empty($oldImage)) {
    if (file_exists('../upload/' . $oldImage)) {
        unlink('../upload/' . $oldImage);
    }
  }
?>