<?php
// ob_start();
// session_start();


include 'inc/header.php';
    


if(empty($_SESSION['username'])){
	header("location:shop.php?alert=1");
}else{

$username = $_SESSION['username'];
$itemNo = $_GET['id'];

$result = $cart->selectCart($username,$itemNo);

if($result->num_rows == 0){


$result = $pro->showProducts($itemNo);


$row = mysqli_fetch_assoc($result);

$itemPrice = $row['itemPrice'];

$cart->insertCart($username,$itemNo,$itemPrice);


header("location:shop.php?alert=2");
}else{
	
header("location:shop.php?alert=3");
}
}
?>