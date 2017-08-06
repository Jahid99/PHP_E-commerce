<?php
ob_start();

include_once 'lib/Database.php';
 spl_autoload_register(function($class){
 	include_once "classes/".$class.".php";
 });
   $db = new Database();
   $cat = new Category();
   $fp = new FeatureProducts();
   $lp = new LatestProducts();
   $cart = new Cart();
   $pro = new Products();
   $po  = new ProductOrder();
   $ui  = new UserInfo();
   $login = new Login();
   $hs = new HomepageSlider();

?>

<?php

 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
  
  header("location: admin.php?alert=1");
}

elseif((isset($_SESSION['role']) == '') || isset($_SESSION['role']) != 'user'){
  
  header("location: index.php");
}


?>


<!DOCTYPE html>
<html>
<head>

 	<link href="css/bootstrap.min.css" rel="stylesheet">
 	<link href="css/toastr.min.css" rel="stylesheet">
 
  	<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  	<link href="css/stylesheet.css" rel="stylesheet">	
  	
	<title>Home</title>
</head>
<body>



   <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
        <a href="home.php" class="navbar-brand"><img style="width: 70px;" src="images/logo.png"></a>
        </div>
    <ul class="nav navbar-nav navbar-right">
    <?php 
                $path = $_SERVER['SCRIPT_FILENAME'];
                $currentpage = basename($path,'.php');
            ?>
          
       <li  <?php if($currentpage=='home'){echo 'class="active"';} ?>><a href="home.php">Home</a></li>
            <?php

            $result = $cat->showCategory();
                       if($result){
                        $i = 0;
                         while ($value=$result->fetch_assoc()) {
            ?>
            <?php if(isset($_GET['id'])){ ?>
            <?php if($_GET['id']==1){ ?>
            <li  <?php if($i==0 ){echo 'class="active"';} ?>><a href="category.php?id=<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a></li>
            <?php }else{ ?>
            <li  <?php if($i==1 ){echo 'class="active"';} ?>><a href="category.php?id=<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a></li>
            <?php } ?>
            <?php }

            else{?>
            <li><a href="category.php?id=<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a></li>
           <?php }
             ?>
     
            <?php $i++; ?>


            <?php } }?>

            <li  <?php if($currentpage=='userorder'){echo 'class="active"';} ?>><a href="userorder.php">My Orders</a></li>
            <li  <?php if($currentpage=='usercart'){echo 'class="active"';} ?>><a href="usercart.php">Cart</a></li>
            <li  <?php if($currentpage=='shop'){echo 'class="active"';} ?>><a href="shop.php">Shop</a></li>
            <li  <?php if($currentpage=='useraccount'){echo 'class="active"';} ?>><a href="useraccount.php">Account</a></li>      
            <li  <?php if($currentpage=='about'){echo 'class="active"';} ?>><a href="about.php">About</a></li>      
            <li><a href="logout.php">Logout</a></li>
    </ul>
    <form action="search.php" class="navbar-form navbar-left" method="post">
      <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search">
        <div class="input-group-btn">
          <input type="submit" name="searchSub" class="form-control" placeholder="Search">
        </div>
      </div>
    </form>
  </div>
</nav>
