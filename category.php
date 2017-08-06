<?php include 'inc/header.php'; ?>
<br>
<br>
    <?php
    $category_id = $_GET['id'];
?>
    <div class="container">
	<div class="row">
	<div id="products" class="row list-group">
    <?php 
    $result = $cat->getCategoryById($category_id);
    if($result){
                while ($value=$result->fetch_assoc()) {?>
        <div class="item col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image" src="<?php echo $value['itemImage'];?>">
                <div class="caption">
                    <h4 class="group inner list-group-item-heading text-center">Product ID:<?php echo $value['itemNo'];?></h4>
                    <h4 class="group inner list-group-item-heading text-center"><?php echo $value['itemName'];?></h4>
                    <p class="group inner list-group-item-text text-left description"><?php echo $value['itemDescription'];?></p>
                    <div class="row">
                        <div class="col-xs-12 col-md-6"><br>
                            <p class="text-left"><b>Stocks Left: <?php echo $value['itemQuantity'];?></b></p>
                        </div>

                        <div class="col-xs-12 col-md-6">
                            <p class="lead text-left">Price: <?php echo $value['itemPrice'];?></p>
                        </div>

                        <div class="col-xs-12 col-md-6">
                            <a class="btn btn-success" href='addtousercart.php?id=<?php echo $value['itemNo'];?>'>Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   <?php } } ?>     
</div>
	</div>
</div>
<?php include 'inc/footer.php'; ?>             