<?php
include 'inc/admin_header.php';
$username = $_SESSION['username'];
?>
		<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                </div>
                <div class="panel-body">
                	<h3> Welcome <?php echo $username;?>! </h3>
                		<p> We've added new features for the e-commerce site. </p>
                	<ul>
                		<li>Adding Admin</li>
                		<li>Adding Category</li>
                        <li>Deleting Category</li>
                		<li>Editing Category</li>
                        <li>Adding Products</li>
                        <li>Deleting Products</li>
                        <li>Editing Products</li>
                	</ul>               	
                </div>
            </div>
		</div>
<?php include 'inc/admin_footer.php'; ?>