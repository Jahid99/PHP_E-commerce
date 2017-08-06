<?php include 'inc/admin_header.php';?>
<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                </div>
                <div class="panel-body">
                	<h3> Edit Category </h3>
    <table class="table table-hover">
    <tr> 
    <th>Category No.</th>
    <th>Category Name</th>
    <th>Action</th>
    </tr>
    <?php 
   $result = $cat->showCategory();
   while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td><a href="admineditcat.php?var='.$row['id'].'">' .'Edit'. '</a>'. '&nbsp;&nbsp;&nbsp;&nbsp;' .'<a href="admindeletecat.php?var='.$row['id'].'">' .'Delete'. '</a></td>';

        echo '</tr>';
    }
echo '</table>';  
echo '</div>';
echo '</div>';
echo '</div>';
?>
<?php include 'inc/admin_footer.php';?>
