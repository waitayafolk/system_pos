<?php
include('condb.php');

$bill_id = $_REQUEST["id"];

$sql = "SELECT * FROM tb_bill_sale WHERE bill_id = :bill_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
    'bill_id' => $bill_id,
));
$bill_sale = $stmt->fetchAll(PDO::FETCH_ASSOC);


$sql = "SELECT tb_bill_sale_detail.* ,
    tb_product.product_name,
    tb_product.product_code,
    tb_product.product_price
    FROM tb_bill_sale_detail 
    INNER JOIN tb_product ON tb_product.id = tb_bill_sale_detail.product_id
    WHERE tb_bill_sale_detail.bill_id = :bill_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
    'bill_id' => $bill_id,
));
$bill_sale_detail = $stmt->fetchAll(PDO::FETCH_ASSOC);


$w = 58;
$fontSize = 16;

$html_header = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Prompt:wght@400&display=swap');
*{
    font-family: 'Prompt', sans-serif;
}
@media print {
    #printPageButton {
      display: none;
    }
  }
    @page { size: " . trim($w) . "mm " . "mm;margin:0 } /* output size */
    @media print { width: " . trim($w) . "mm; height: "  . "mm;margin:0 } /* fix for Chrome */
    body { width: " . trim($w) . "mm; height: "  . "mm;margin:0;padding-left:5mm;padding-right:5mm;padding-top:5mm;padding-bottom:5mm } /* sheet size */
  </style>
</head>
<body onload='window.print()'>
";


$html = "
<button id='printPageButton' onClick='window.print();'>Print</button>
    <tr>
        <td align='center'>
            <div>ใบเสร็จนับเงิน</div>
        </td>
    </tr>
    <tr>
        <td align='center'>
            <div>&nbsp;</div>
            <div style='font-size: {$fontSize}px; font-weight: bold; text-align: center;'>
                ร้านสหภัณท์ พาณิช
                (สำนักงานใหญ่)
            </div>
        </td>
    </tr>
";

    // $html .= "
    //     <tr>
    //         <td>
    //             <div style='font-size: {$fontSize}px; text-align: center;'>
    //                 <div> TAX : 1648788184</div>
    //             </div>
    //         </td>
    //     </tr>
    //     ";
        $html .= "
            <tr>
                <td>
                    <div style='font-size: {$fontSize}px; text-align: center;'>
                        <div>เบอร์โทร : 0926871512 </div>
                    </div>
                </td>
            </tr>
        ";
    $html .= "
        <tr>
            <td>
                <div style='font-size: {$fontSize}px; text-align: left;'>
                    <div>Line ID : 0926871512 </div>
                </div>
            </td>
        </tr>
    ";
    $html .= "
        <tr>
            <td>
                <div style='font-size: {$fontSize}px; text-align: left;'>
                    <div>E-Mail : ketsiri5023@gmail.com</div>
                </div>
            </td>
        </tr>
    </table>
    ";
$sum_qty = 0;
$html .= "<table width='100%' cellpadding='0' cellspacing='0' style='border-bottom: #ccc 1px solid'>";
$n = 1;

foreach ($bill_sale_detail as $r) {

    // print_r($r);exit();
    $price = number_format($r['product_price'],2 ) ;
    $total = number_format($r['total'],2 ) ;
    $qty = $r['qty'] ;

    $sum_qty += number_format($r['qty'],2); 

    $html .= "
    <tr>
    <td>
        <table width='100%'  cellpadding='0' cellspacing='0'>
            <tr>
                <td style='font-size: {$fontSize}px;'>
                <div> {$qty} | {$r['product_name']}  {$price} 
                ";                        
$html .="</div>";
$html .= "
                </td>
                <td valign='top' style='text-align: right; font-size: {$fontSize}px;'>
                    {$total}
                </td>
            </tr>
        </table>
    </td>
  </tr>";

  

$n++;
// print_r($sum_qty);exit();
}
// print_r($bill_sale[0]['total_sale']);exit();
$qty =  $sum_qty;
$total_sale =  $bill_sale[0]['total_sale'];
$get_money =  $bill_sale[0]['get_money'];
$count = $get_money - $total_sale ;
    

    $html .="
    <tr>
        <td>
            <table width='100%'  cellpadding='0' cellspacing='0' style='border-bottom: #ccc 1px solid'>
                <tr>
                <td> &nbsp; </td>
                    <td style='font-size: {$fontSize}px;'>{$qty} ชิ้น</td>
                    
                    <td style='text-align: center; font-size: {$fontSize}px;'>{$total_sale} บาท</td>
                </tr>
            </table>
        </td>
    </tr>";

    $html .= "
    <table width='100%'  cellpadding='0' cellspacing='0' style='border-bottom: #ccc 1px solid'>
             <tr>
             <td style='font-size: {$fontSize}px'><strong> ยอดสุทธิ </strong></td>
             <td style='text-align: right; font-size: {$fontSize}px'>{$total_sale}</td>
             </tr>
                
             <tr>
                 <td style='font-size: {$fontSize}px'> รับเงิน </td>
                 <td style='text-align: right; font-size: {$fontSize}px'> {$get_money} </td>
             </tr>
             <tr>
                 <td style='font-size: {$fontSize}px'> เงินทอน </td>
                 <td style='font-size: {$fontSize}px; text-align: right;border-bottom: #000 3px double'>{$count}</td>
                    
             </tr>
             </table>
             ";


    $date = date('d/m/Y');
    $html .= "<div style='margin-top: 0px; font-size: {$fontSize}px'><strong> วันที่  : </strong> {$date} </div>";
    
$html_footer = "
<script type='text/javascript' src='js/jquery-2.0.3.js'></script>
<script>
    $(function() {
        window.print();
    });
</script>
<button onclick='window.close()' id='myButton' style='display: none'></button>
";


echo $html_header .$html  . $html_footer;
?>