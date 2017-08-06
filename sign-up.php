<?php
ob_start();
include_once 'lib/Database.php';
 spl_autoload_register(function($class){
  include_once "classes/".$class.".php";
 });
   $db = new Database();
   $cat = new Category();
   $login = new Login();
   $ui  = new UserInfo();

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/toastr.min.css" rel="stylesheet">
 
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/stylesheet.css" rel="stylesheet"> 
    
  <title>Sign up</title>
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

<!-- SIGN UP -->
    <div class="container"><br>
    <h3 class="text-left">SIGN UP</h3>
    <hr class="half-rule">
 <div class="form-group">
    <div class="col-md-6">
    <form action="" method="post">
      
      <div class="col-md-6">
      <div class="form-group row">
        <label>Username:<input class="form-control" type="text" name="signup-user" maxlength="20" minlength="6" required autofocus></label>
        </div> 
        </div>

         <div class="col-md-6">
      <div class="form-group row">
        <label>First Name:<input class="form-control" type="text" name="signup-fname" maxlength="20" required autofocus></label>
        </div> 
        </div>

         <div class="col-md-6">
      <div class="form-group row">
        <label>Last Name:<input class="form-control" type="text" name="signup-lname" maxlength="20" required autofocus></label>
        </div> 
        </div>

        <div class="col-md-6">
      <div class="form-group row">
        <label>Password:<input class="form-control" type="password" name="signup-pass" maxlength="20" minlength="6" required></label>
      </div>
        </div>

        <div class="col-md-6">
      <div class="form-group row">
          <label>Confirm Password:<input class="form-control" type="password" name="signup-confirm-pass" maxlength="20" minlength="6" required></label>
      </div>
        </div>

    </div>
      </div>
    </div>
    <div class="container">
    <div class="form-group">
      <div class="col-md-6">
       
        <div class="col-md-6">
      <div class="form-group row">
          <label>Address:<input class="form-control" type="text" name="signup-address" maxlength="50" required></label>
      </div>
      </div>

       <div class="col-md-6">
      <div class="form-group row">
          <label>Contact Number:<input class="form-control" type="text" name="signup-contact-no" maxlength="11" placeholder="09XXXXXXXXX" minlength="11" required></label>
      </div>
      </div>

        <div class="col-md-6">
      <div class="form-group row">
          <label>Email:<input class="form-control" type="email" name="signup-email" maxlength="30" placeholder="you@yourdomain.com" required></label>
      </div>
      </div>

      <div class="col-md-6">
      <div class="form-group row">
          <label>Paypal Email:<input class="form-control" type="email" name="signup-paypal-email" maxlength="30" placeholder="you@yourdomain.com"></label>
      </div>
      </div>

      <div class="col-md-11">
      <div class="form-group row">
          <input class="form-control" type="submit" name="signup" value="Submit">
      </div>
      </div>

    </form>

    </div>
    </div>
    </div>
<?php

if(isset($_POST['signup'])){

$signupUser = $_POST['signup-user'];
$signupFname = $_POST['signup-fname'];
$signupLname = $_POST['signup-lname'];
$signupPass1 = $_POST['signup-confirm-pass'];
$signupPass = $_POST['signup-pass'];

if($signupPass1 == $signupPass){
$signupAddress = $_POST['signup-address'];
$signupContactno = $_POST['signup-contact-no'];
$signupEmail = $_POST['signup-email'];
$signupPaypalemail = $_POST['signup-paypal-email'];

$login->signUpInsert($signupUser,$signupPass);

$ui->signUpInsert($signupUser, $signupFname, $signupLname,$signupAddress, $signupContactno, $signupEmail, $signupPaypalemail);


header("location: index.php?alert=4");
}else{
header("location: sign-up.php?alert=1");
}

}

?>

<?php
 if(isset($_GET['alert'])){
  $alert = $_GET['alert'];  
  if($alert == '1'){
    echo '<script>';
    echo "toastr.error('Password not the same','Error Alert',{timeOut:5000});";
    echo '</script>';
  }
}

?>

<?php include 'inc/footer.php'; ?>