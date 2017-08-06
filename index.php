<?php
ob_start();
 include_once 'lib/Database.php';
 spl_autoload_register(function($class){
  include_once "classes/".$class.".php";
 });
   $db = new Database();
   $cat = new Category();
   $login = new Login();
?>
<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
if(isset($_SESSION['username']) && $_SESSION['role'] == 'user'){
  header("location: userorder.php");
}
elseif(isset($_SESSION['username']) && $_SESSION['username'] == 'admin'){
  header("location: admin.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/toastr.min.css" rel="stylesheet">
 
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/stylesheet.css" rel="stylesheet"> 
    
  <title>Home</title>
</head>
<body>

<nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
        <a class="navbar-brand"><img style="width: 70px;" src="res/logo.png"></a>
       
        </div>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="home.php">Home</a></li>
            <?php
            $result = $cat->showCategory();
                       if($result){
                         while ($value=$result->fetch_assoc()) {
            ?>
            <li><a href="category.php?id=<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a></li>

            <?php } }?>

            <li><a href="userorder.php">My Orders</a></li>
            <li><a href="usercart.php">Cart</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="useraccount.php">Account</a></li>      
            <li><a href="logout.php">Login</a></li>
          </ul>
      </div><!-- /.container -->
    </nav><!-- /.navbar --><br><br>
    <div class="container">
       <form action="" method="post" role="form">
              <div class="form-group">
                <label class="sr-only" for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" autofocus required />
              </div>
              <div class="form-group">
                <label class="sr-only" for="Password">Password</label>
                <input type="password" class="form-control" id="Password" placeholder="Password" name="password" required />
              </div>
              <button type="submit" class="btn btn-success" name="sign-in">Sign in</button>
     </div><br>
           
         <p> <a href="sign-up.php">Create an account</a> </p>
</body>
</html>
<?php
if(isset($_POST['sign-in'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $result = $login->login($username,$password);
  if($result){
  $count = mysqli_num_rows($result);
  if($count==1){

    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];

    if($row['role'] == 'admin'){
      header("location: admin/index.php");
    }elseif($row['role'] == 'user'){

    header("location: home.php");
  
  }else{
    header("location:admin/admin.php");
  }
}else{
  
}
}else{
echo '<h3 style="color:red">Username and Password do not match!</h3>';
}
}

?>
<?php
include 'inc/footer.php';
    ?>