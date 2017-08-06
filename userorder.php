<?php include 'inc/header.php'; ?>
<?php
$username = $_SESSION['username'];
$result = $po->showOrder($username);
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
				<th style="width:10%">P. Method</th>
				<th style="width:10%"></th>

			</tr>
		</thead>
			<tbody>
							<?php while($row = mysqli_fetch_assoc($result)){

									$itemNo = $row['itemNo'];
									$orderID = $row['orderID'];
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
									$j = $rowprod['itemNo']; 
									$f = $_SESSION['username'];					
									$m = $po->showOrderForQuantity($j,$f);
									while($rowproddd = mysqli_fetch_assoc($m)){
									$k = $rowproddd['orderQuantity']; 							
									?>
								<input type="number" class="form-control text-center" value="<?php echo $k; ?>" readonly>
								<?php } ?>
							</td>
							<td data-th="Subtotal" class="text-center">PHP&nbsp;<?php echo $total = $row['orderQuantity'] * $rowprod['itemPrice'];								
								array_push($totalPrice, $total);								
							?>								
							</td>
							<td>
								<?php echo $row['paymentMethod']; ?>
							</td>
							<td class="actions" data-th="">
								<a href='cancelorder.php?id=<?php echo $orderID; ?>'><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>							
							</td>
						</tr>
						<?php }} ?>
					</tbody>
					<tfoot>
						
						<tr>
							<td><a href="shop.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong>
							<?php
								echo 'Total: PHP ' . array_sum($totalPrice); 
							?></strong></td>							
							<td></td><td></td>							
						</tr>
					</tfoot>
				</table>
</div>
<?php }else{ ?>
<div class="text-center">
	<h3>You do not have any orders.<img style="height:50px;width:50px" src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcT7Poy3lGf_1f4e89_XKNbeFoXrq2cXSrI4WZ-xxIHuy0f4C17srg"</h3>
	<hr class="half-rule">
</div>
<?php } ?>
<?php include 'inc/footer.php'; ?>