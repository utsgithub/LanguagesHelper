<?php
mysql_select_db($database_conn, $conn);
$query_rsCate = "SELECT * FROM ecs_category ORDER BY sort_order ASC";
$rsCate = mysql_query($query_rsCate, $conn) or die(mysql_error());
$row_rsCate = mysql_fetch_assoc($rsCate);
$totalRows_rsCate = mysql_num_rows($rsCate);
?>

<div class="row">
  <div class="col-md-3">
    <div class="list-group"> <a href="#" class="list-group-item active">Categories</a>
      <?php do { ?>
        <a href="category.php?cat_id=<?php echo $row_rsCate['cat_id']; ?>" class="list-group-item"><?php echo $row_rsCate['cat_name']; ?></a>
        <?php } while ($row_rsCate = mysql_fetch_assoc($rsCate)); ?>
    </div>
  </div>
  <div class="col-md-9"><img src="images/banner.jpg" style="width:100%; height:300px;" /></div>
</div>
<?php
mysql_free_result($rsCate);
?>
