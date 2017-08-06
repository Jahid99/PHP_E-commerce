<?php include 'inc/admin_header.php'; ?>
<?php
if(isset($_POST['submitcat'])){
	$category_name = $_POST['category_name'];
    $cat->adminAddCategory($category_name);
 	 header("location:adminupdelcat.php");
}
?>
<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                </div>
              	 <div class="panel-body">
                	<h3> Add Category </h3>
                	<form action="" id="form1" method="post" enctype= "multipart/form-data">
                		<div>
                		<div class="row">
                		<div class="col-md-10">
                		<label>Category Name:<input class="form-control" type="text" name="category_name" maxlength="30" required autofocus></label>
                		</div>
                		<div class="col-md-2">
    						<input class="form-control" type="submit" value="Submit" name="submitcat">
    					</div>
                	</div>
                	</div>
                	</form>
                	</div>
                </div>
			</div>
		</div>
		<!-- FOOTER -->
	  <?php 

include 'inc/admin_footer.php';
?>