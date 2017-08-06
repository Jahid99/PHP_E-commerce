<?php include 'inc/admin_header.php';?>
<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                </div>
                <div class="panel-body">
                	<h3> Edit Product </h3>
                	<form action="" method="post">
                		<div class="input-group">
                		<input class="form-control" type="text" name="searchText" placeholder="Search Product ID">
                		<span class="input-group-addon">
                			<i class="glyphicon glyphicon-search"></i>
                		</span>
                		</div>
                		<input type="submit" class="hidethis" name="submitsearch">
                	</form>
<?php
		$catNo = $_GET['var'];		
			if(!empty($catNo)){
				$result = $cat->adminCategoryById($catNo);			
			 $row = mysqli_fetch_assoc($result);
		}

		if(isset($_POST['submitsearch']) && !empty($_POST['searchText'])){

			 $searchText = $_POST['searchText'];
			
			 $result = $pro->showProducts($searchText);
			
			 $row = mysqli_fetch_assoc($result);

			if(mysqli_num_rows($result) == 0){

					echo "<script>

					document.getElementById('pname').readOnly = false;
					document.getElementById('pdesc').readOnly = false;
					document.getElementById('stocks').readOnly = false;
					document.getElementById('price').readOnly = false;
					document.getElementById('sub').readOnly = false;
				</script>";
				}else{
					echo "<script>
					document.getElementById('pname').readOnly = true;
					document.getElementById('pdsec').readOnly = true;
					document.getElementById('stocks').readOnly = true;
					document.getElementById('price').readOnly = true;
					document.getElementById('sub').readOnly = true;
					</script>";
				}	
			}	
?>
                <form action="" method="post" enctype= "multipart/form-data">
                		<div>
                		<div class="row">
                		<div class="col-md-10">
                		<input type="text" name="cat_id" class="hidethis" value='<?php echo $row['id']; ?>'>
                		
                		<label>Category Name:<input id="pname" class="form-control" type="text" name="category_name" maxlength="30" value='<?php echo $row['name']; ?>' required autofocus></label>
                		</div>
               		
    					<div class="col-md-2 row">
    						<input id="sub" class="form-control" type="submit" value="Update" name="submitcat">
    					</div>
    					</div>
    					</div>
    				</form>			
				<?php	          
 	         	 	if(isset($_POST['submitcat'])){

 	               			$category_name = $_POST['category_name'];

 	               			$cat->adminUpdateCategory($category_name,$catNo);

 	               			header("location: adminupdelcat.php");
 	               		}
                	?>
				</div>
			</div>
		</div>
	<?php 

include 'inc/admin_footer.php';
?>
