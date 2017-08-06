<?php include 'inc/header.php'; ?>

<div id="myCarousel" class="carousel slide cpntainer-fluid" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  <?php 
    $result = $hs->showSliders();
    if($result){
        $i = 0;
                while ($value=$result->fetch_assoc()) {?>
    <div class="item  <?php if($i==0){echo 'active';} ?>">
      <a href="<?php echo $value['link'];?>"><img src="images/<?php echo $value['image'];?>" ></a>
    </div>
    <?php $i++; } } ?>

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  

<div class="container"> 
    <br>
  <h3 class="text-left"> Feature Items </h3>
  <hr class="half-rule">
  </div>
<div class="container">
  <div class="row">

  <div id="products" class="row list-group">
    <?php 
    $result = $fp->showFeatureProducts();
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
   <?php } }?>     
</div>


  </div>
</div>


<div class="container"> 
    <br>
  <h3 class="text-left"> Latest Items </h3>
  <hr class="half-rule">
  </div>
<div class="container">
  <div class="row">

  <div id="products" class="row list-group">
    <?php 
    $result = $lp->showLatestProducts();
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
   <?php } }?>     
</div>
  </div>
</div>
<?php include 'inc/footer.php'; ?>