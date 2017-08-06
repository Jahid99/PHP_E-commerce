<?php
ob_start();
session_start();
include 'inc/header.php';
$id = $_GET['id'];
$po->deleteOrder($id);
header("location: userorder.php");
?>