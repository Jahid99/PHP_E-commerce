<?php include 'inc/admin_header.php'; ?>
<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                </div>
                <div class="panel-body">
                	
                <form action="" method="post">
                <div class="col-md-4">
	                <label>Username:<input class="form-control" type="text" name="username" required></label>
	                <label>Password:<input class="form-control" type="text" name="password" required></label>
	                <label>First Name:<input class="form-control" type="text" name="firstname" required></label>
	                <label>Last Name:<input class="form-control" type="text" name="lastname" required></label>
	                <label>Position:<input class="form-control" type="text" name="position" required></label>
	               	<div class="col-md-6 center-block">
	                <input class="form-control btn btn-success" type="submit" name="submit" value="submit" required>
					</div>
				</div>
				</form>
                </div>
            </div>
		</div>
		<!-- FOOTER -->
<?php include 'inc/admin_footer.php'; ?>