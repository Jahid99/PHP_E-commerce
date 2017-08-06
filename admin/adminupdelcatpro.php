<?php include 'inc/admin_header.php';?>
<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                </div>
                <div class="panel-body">
                	<h3> Edit Product </h3>
    <table class="table table-hover">
    <tr>
    <th>Product No</th>
    <th>Product Name</th>
    <th>Action</th>
    </tr>
<?php 
    $result = $pro->showAllProducts();
   while($row = mysqli_fetch_assoc($result)){       
        echo '<tr>';
        echo '<td>' . $row['itemNo'] . '</td>';
        echo '<td>' . $row['itemName'] . '</td>';
        echo '<td><a href="adminedit.php?var='.$row['itemNo'].'">' .'Edit'. '</a>'. '&nbsp;&nbsp;&nbsp;&nbsp;' .'<a href="admindelete.php?var='.$row['itemNo'].'">' .'Delete'. '</a></td>';

        echo '</tr>';
    }
echo '</table>'; 
echo '</div>';
echo '</div>';
echo '</div>';
?>
<?php include 'inc/admin_footer.php'; ?>

