<?php
include 'inc/admin_header.php';
$itemNo = $_GET['var'];
$result = $pro->showProducts($itemNo);
$row=mysqli_fetch_assoc($result);
$imagefile=$row['itemImage'];
echo $imagefile;
unlink($imagefile);
$pro->adminDeleteProduct($itemNo);
header("location: adminupdelcatpro.php");
?>
