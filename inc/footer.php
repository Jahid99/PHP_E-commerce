<footer>
    <div class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4> My Account </h4>
                    
                    <ul><li><a href="#">My Account</a></li>
                        <li><a href="#">Order History</a></li>
                        <li><a href="#">Wish List</a></li>
                        <li><a href="#">Newsletter</a></li></ul> 
                    </ul>
                </div>
                <div class="col-md-6">
                    <h4> Extras </h4>
                    <ul>
                        <li><a href="#">Brands</a></li>
                        <li><a href="#">Gift Vouchers</a></li>
                        <li><a href="#">Affiliates</a></li>
                        <li><a href="#">Specials</a></li>
                        </ul>
                </div>
        

            <!--/.row--> 
        </div>
        <!--/.container--> 
    </div>
    <!--/.footer-->
    


    <div class="footer-bottom">
        <div class="container">
            <center><p> Copyright © <a href="https://www.facebook.com/jahidul.haque.pathan">Jahid</a>. All right reserved. </p></center>
            <div class="pull-right">
                <ul class="nav nav-pills payments">
                  <li><i class="fa fa-cc-visa"></i></li>
                    <li><i class="fa fa-cc-mastercard"></i></li>
                    <li><i class="fa fa-cc-amex"></i></li>
                    <li><i class="fa fa-cc-paypal"></i></li>
                </ul> 
            </div>
        </div>
    </div>
    <!--/.footer-bottom--> 
</footer>

<?php


if(isset($_POST['submitnewsletter'])){

$newsletter_email = $_POST['newsletter_email'];

$newsletterSQL = "INSERT INTO newsletter (newsletter_email) VALUES ('$newsletter_email')";

mysqli_query($con, $newsletterSQL);
header("location:ezprinter.php?alert=3");
mysqli_close($con);
}

?>
<script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/toastr.min.js"></script>

    <?php
if(isset($_GET['alert'])){
    $alert = $_GET['alert'];
if($alert == '1'){
echo '<script>';
echo "toastr.error('Please login to buy products','Error Alert',{timeOut:5000});";
echo '</script>';
}
if($alert == '2'){
echo '<script>';
echo "toastr.success('Product added successfully','Success Alert',{timeOut:5000});";
echo '</script>';
}
if($alert == '3'){
echo '<script>';
echo "toastr.error('Product already added','Error Alert',{timeOut:5000});";
echo '</script>';
}
if($alert == '4'){
echo '<script>';
echo "toastr.success('Account Created Successfully','Success Alert',{timeOut:5000});";
echo '</script>';
}
}

?>

</body>
</html>