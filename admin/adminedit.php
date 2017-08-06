<?php include 'inc/admin_header.php'; ?>
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
		$itemNo = $_GET['var'];		
			if(!empty($itemNo)){
				$result = $pro->showProducts($itemNo);				 
			 $row = mysqli_fetch_assoc($result);
		}
		if(isset($_POST['submitsearch']) && !empty($_POST['searchText'])){
			 $searchText = $_POST['searchText'];	
			 $result = $pro->showProducts($itemNo); 		
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
                		<input type="text" name="itemNo" class="hidethis" value='<?php echo $row['itemNo']; ?>'>
                		<input type="text" name="itemImage" class="hidethis" value='<?php echo $row['itemImage']; ?>'>
                		<label>Product Name:<input id="pname" class="form-control" type="text" name="itemName" maxlength="30" value='<?php echo $row['itemName']; ?>' required autofocus></label>
                		</div>
                		<div class="col-md-10">
                		<label>Product Description:<textarea id="pdesc" rows="7" cols="50" class="form-control" name="itemDescription" maxlength="255" required><?php echo $row['itemDescription']; ?></textarea></label>
                		</div>
                		<div class='col-md-10'>
                		<label>Stocks:<input id="stocks" class="form-control" type="text" name="itemQuantity" maxlength="4" value="<?php echo $row['itemQuantity']; ?>" required></label>
                		</div>

                		<div class="col-md-10">
                		<label>Price<input id="price" class="form-control" type="text" name="itemPrice" maxlength="10" value="<?php echo $row['itemPrice']; ?>" required></label>
                		</div>

                		<div class="col-md-10">
                		<label>Category ID<input id="category_id" class="form-control" type="text" name="category_id" maxlength="10" value="<?php echo $row['category_id']; ?>" required></label>
                		</div>

                		<div class="col-md-8">
                			<label>Select image to be uploaded.<input id="imageupload" class="form-control" type="file" name="fileToUpload"></label>
    					</div>
    					
    					</div>
    					<div class="col-md-2 row">
    						<input id="sub" class="form-control" type="submit" value="Update" name="submitproduct">
    					</div>
    					</div>
    				</form>
				<?php  
 	         	 	if(isset($_POST['submitproduct'])){

 	               			$target_dir = "../images/";
							$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
							$uploadOk = 1;
							$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
							// Check if image file is a actual image or fake image
							if(isset($_POST["submit"])) {
							    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
							    if($check !== false) {
							        echo "File is an image - " . $check["mime"] . ".";
							        $uploadOk = 1;
							    } else {
							        echo "File is not an image.";
							        $uploadOk = 0;
							    }
							}
							// Check if file already exists
							if (file_exists($target_file)) {
							    echo "Sorry, file already exists.";
							    $uploadOk = 0;
							}
							// Check file size
							if ($_FILES["fileToUpload"]["size"] > 500000) {
							    echo "Sorry, your file is too large.";
							    $uploadOk = 0;
							}
							// Allow certain file formats
							if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
							&& $imageFileType != "gif" ) {
							    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
							    $uploadOk = 0;
							}
							// Check if $uploadOk is set to 0 by an error
							if ($uploadOk == 0) {
							    echo "Sorry, your file was not uploaded.";
							// if everything is ok, try to upload file
							} else {
							    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
							        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
							    } else {
							        echo "Sorry, there was an error uploading your file.";
							    }
							}

							
							$itemNo = $_POST['itemNo'];
 	               			$itemName = $_POST['itemName'];
 	               			$itemDescription = $_POST['itemDescription'];
 	               			$itemQuantity = $_POST['itemQuantity'];
 	               			$itemPrice = $_POST['itemPrice'];
 	               			$category_id = $_POST['category_id'];
 	               			$img = $target_file;

 	               			$itemImage = $_POST['itemImage'];
 	               			

 	               			if($img == 'res/'){

 	               				$result = $pro->adminUpdateProduct($itemName,$itemDescription,$itemQuantity,$itemPrice,$category_id,$itemNo);
 	               			
 	               			}else{
 	               				if($itemImage == ''){

 	               				}
 	               				else{
 	               				unlink($itemImage);
								}
								$result = $pro->adminUpdateProductWithImage($itemName,$itemDescription,$itemQuantity,$itemPrice,$img,$category_id,$itemNo);
								
 	               			}
 	               		
 	               			header("location: index.php");
 	               		}

                	?>

				</div>
			</div>
		</div>
		
 <?php include 'inc/admin_footer.php'; ?>

