<?php

require('../../lib/fpdf/fpdf.php');
include '../../config/conn.php';

if($_SESSION['status']!="login"){
    header("location:../index.php?pesan=belum_login");
}

$order = mysqli_query($conn, "SELECT name_user,email_user,title,
quantity,date_order,price,image FROM `order` JOIN
`posts` ON `order`.`id_post`=`posts`.`id_post`
JOIN `user` ON `order`.`id_user`=`user`.`id_user`
ORDER BY date_order DESC");

$jumlah=mysqli_query($conn, "SELECT COUNT(id_order) AS 'penjualan' FROM `order`");
$roworder = mysqli_fetch_assoc($jumlah);
$id_order = $roworder['penjualan'];

$pdf = new FPDF('l','mm','A5');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$pdf->Cell(190,7,'HISTORY PENJUALAN RAIRAKA CATERING',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'TOTAL PENJUALAN BULAN INI '.$id_order.' TRANSAKSI',0,1,'C');

$pdf->Cell(10,7,'',0,1);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,6,'Nama User',1,0);
$pdf->Cell(85,6,'Email',1,0);
$pdf->Cell(27,6,'Nama Produk',1,0);
$pdf->Cell(25,6,'Quantity',1,1);

$pdf->SetFont('Arial','',10);
 

// $pdf->Cell(25,6,$roworder['penjualan'],1,1); 
// echo $id_order;

while ($row = mysqli_fetch_array($order)){
    $pdf->Cell(50,6,$row['name_user'],1,0);
    $pdf->Cell(85,6,$row['email_user'],1,0);
    $pdf->Cell(27,6,$row['title'],1,0);
    $pdf->Cell(25,6,$row['quantity'],1,1); 
}
 
$pdf->Output();
?>