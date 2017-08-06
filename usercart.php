<?php include 'inc/header.php'; ?>
<?php 
if(isset($_POST['updateCart'])){
	$itemNo = $_POST['itemNo'];
	$cart_item_quantity = $_POST['quantity'];
	$cart->updateCart($itemNo,$cart_item_quantity);
}
$username = $_SESSION['username'];
$result = $cart->showCart($username);
$totalPrice = array();
if($result){
?>
<div class="container">
	<table id="cart" class="table table-hover table-condensed">
    	<thead>
    	<br><br>
			<tr>
				<th style="width:50%">Product</th>
				<th style="width:10%">Price</th>
				<th style="width:8%">Quantity</th>
				<th style="width:22%" class="text-center">Subtotal</th>
				<th style="width:10%"></th>
			</tr>
		</thead>
			<tbody>
							<?php while($row = mysqli_fetch_assoc($result)){

									$itemNo = $row['itemNo'];
									$cartID = $row['cartID'];
									$prodSQLresult = $pro->showProducts($itemNo);
									while($rowprod = mysqli_fetch_assoc($prodSQLresult)){
									
										?>
				<tr>
					<td data-th="Product">
						<div class="row">
							<div class="col-sm-2 hidden-xs"><img src='<?php echo $rowprod['itemImage'];?>' class="img-responsive"/></div>
							<div class="col-sm-10">
							
								<h4 class="nomargin"><?php echo $rowprod['itemName']; ?></h4>
								<p><?php echo $rowprod['itemDescription'];?></p>
							</div>
						</div>
					</td>

							<td data-th="Price"><?php echo 'PHP ' . $rowprod['itemPrice'];?></td>
							<td data-th="Quantity">
									<?php 
									$itemNo = $rowprod['itemNo']; 						
									$res = $cart->showCartItemNo($itemNo);
									while($rowproddd = mysqli_fetch_assoc($res)){
									$q = $rowproddd['itemCartQuantity']; 									
									?>
								<form action="" method="post" enctype= "multipart/form-data">
								<input type="number" class="form-control text-center" name="quantity" value="<?php echo $q; ?>" >
								<input type="hidden" class="form-control text-center" name="itemNo" value="<?php echo $rowproddd['itemNo']?>" >
								<button type="submit" name="updateCart" class="btn btn-success btn-block">Update</button>
								</form>

								<?php } ?>
								
							</td>
							<td data-th="Subtotal" class="text-center">PHP&nbsp;<?php echo $total = $row['itemCartQuantity'] * $rowprod['itemPrice'];									
								array_push($totalPrice, $total);								
							?>								
							</td>
							<td class="actions" data-th="">
								<a href='removeitem.php?id=<?php echo $cartID; ?>'><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>							
							</td>
						</tr>
						<?php }} ?>
					</tbody>
					<tfoot>
						<tr>
							<form action="" method="post">
								<td><label>Cash on Delivery<input type="radio" name="payment" value="COD" checked></label></td>
								<td colspan="4"><label>Paypal<input type="radio" name="payment" value="Paypal"></label></td>
						</tr>
						<tr>
							<td><a href="shop.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong>
							<?php
								echo 'Total: PHP ' . array_sum($totalPrice); 
							?></strong></td>
							
							<td><button type="submit" name="submitcheckout" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></button></td>
							</form>
						</tr>
					</tfoot>
				</table>
</div>
<?php }else{ ?>

<div class="text-center">
	<h3>Your cart is empty.<img style="height:50px;width:50px" src="https://cdn4.iconfinder.com/data/icons/e-commerce-icon-set/48/Cart_2-128.png"</h3>
	<hr class="half-rule">
</div>
<?php } ?>
<?php
if(isset($_POST['submitcheckout'])){
	$paymentmethod = $_POST['payment'];
	$username = $_SESSION['username'];
	$result = $cart->showCart($username);
	while($rowresult = mysqli_fetch_assoc($result)){
		$rowUsername = $rowresult['username'];
		$rowItemNo = $rowresult['itemNo'];
		$rowOrderQuantity = $rowresult['itemCartQuantity'];
		$rowTotalPrice = $rowresult['totalPrice'];
		$po->insertOrder($rowUsername,$rowItemNo,$rowOrderQuantity,$rowTotalPrice,$paymentmethod);
	}
	$cart->deleteCart($username);
	header("location:userorder.php");
}
include 'inc/footer.php'; ?>