<?php
ob_start();

include_once '../lib/Database.php';
 spl_autoload_register(function($class){
 	include_once "../classes/".$class.".php";
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

?>

<!DOCTYPE html>
<html>
<head>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../stylesheetadmin.css" rel="stylesheet">	
	<script src="../js/bootstrap.js" type="text/javascript"></script>
	   <script src="../jquery-3.1.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<title>Admin</title>
</head>
<body>
<?php
session_start();


if($_SESSION['role'] == 'user'){

	header("location: home.php?alert=1");
}

elseif((isset($_SESSION['role']) == '') || isset($_SESSION['role']) != 'admin'){
  
  header("location: ezprinter.php?alert=5");
}?>
<?php
$username = $_SESSION['username'];

?>
<nav class="navbar navbar-default navbar-static-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="admin.php">
				Computer City
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">			
			
			<ul class="nav navbar-nav navbar-right">
				<li><a>Welcome <?php echo $username;?></a></li>
				<li class="dropdown ">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Account
						<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="../logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container-fluid main-container">
		<div class="col-md-2 sidebar">
			<?php 
                $path = $_SERVER['SCRIPT_FILENAME'];
                $currentpage = basename($path,'.php');
            ?>
			<ul class="nav nav-pills nav-stacked text-center">
				<li  <?php if($currentpage=='index'){echo 'class="active"';} ?>><a href="index.php">Home</a></li>
				<li  <?php if($currentpage=='addadmin'){echo 'class="active"';} ?>><a href="addadmin.php">Add Admin</a></li>
				<li  <?php if($currentpage=='add_cat'){echo 'class="active"';} ?>><a href="add_cat.php">Add Category</a></li>
				<li  <?php if($currentpage=='adminupdelcat'){echo 'class="active"';} ?>><a href="adminupdelcat.php">Update/Delete Category</a></li>
				<li  <?php if($currentpage=='adminaddproduct'){echo 'class="active"';} ?>><a href="adminaddproduct.php">Add Product</a></li>
				<li  <?php if($currentpage=='adminupdelcatpro'){echo 'class="active"';} ?>><a href="adminupdelcatpro.php">Update/Delete Product</a></li>								
			</ul>
		</div>
