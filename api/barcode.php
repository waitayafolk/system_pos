<?php
include('condb.php');

$id = $_REQUEST["id"];

$sql = "SELECT * FROM tb_product WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
    'id' => $id,
));
$product = $stmt->fetchAll(PDO::FETCH_ASSOC);

$product_code = $product[0]['product_code'];
$product_name = $product[0]['product_name'];
$product_price = number_format($product[0]['product_price'],2);

$code = $product_name ." " .$product_price . " .-";

$style = '
<script src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js">
</script>
<style>
@import url("https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap");
*{
    font-family: "Prompt", sans-serif;
}
@media print {
    #printPageButton {
      display: none;
    }
  }
 @page { size: 50mm 30mm;margin:0;} 
    body { width: 15mm; height: 30mm;margin:0;padding-left:2mm;padding-right:5mm;padding-top:1mm } 
    @media print { margin:0 } /* fix for Chrome */
</style>
';

$barcode .= '
<button id="printPageButton" onClick="window.print();">Print</button>
<td>
    <div style="display: inline-block;width: 250px;text-align: center;padding-left:5px ;padding-top:15px;">
      <div style="font-size:16px">
      </div>
            <svg class="barcode">
            </svg>
            <script type="text/javascript">
                JsBarcode(".barcode", "'.$product_code.'", {
                    format: "CODE128",
                    width: 2,
                    height: 60,
                    fontSize : 15
                  });  
            </script> 
            <div style="font-size:16px">
            <strong>
            '.$code.' 
            </strong>
            </div>
    </div>      
</td>
      
';
echo $style.$barcode;


?>