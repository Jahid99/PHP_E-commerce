<?php
include 'inc/admin_header.php';
$catNo = $_GET['var'];
$cat->adminDeleteCategory($catNo);
header("location: adminupdelcat.php");
?>
