<?php
mysql_select_db($database_conn, $conn);
$query_rsHot = "SELECT * FROM ecs_goods WHERE is_hot = 1 order by sort_order limit 4";
$rsHot = mysql_query($query_rsHot, $conn) or die(mysql_error());
$row_rsHot = mysql_fetch_assoc($rsHot);
$totalRows_rsHot = mysql_num_rows($rsHot);
?>

<h3 class="page-header">Popular Products Recommended</h3>
<div class="row">
  <?php do { ?>
    <div class="col-sm-3">
      <article class="col-item">
        <div class="photo"> <a href="<?php echo "goods.php?goods_id=".$row_rsHot['goods_id']; ?>"> <img src="<?php echo $site_url.$row_rsHot['goods_thumb']; ?>" alt="Product Image" width="100%" height="220" class="img-responsive" /> </a> </div>
        <div class="info">
          <div class="row">
            <div class="price-details col-md-6">
              <p class="details"></p>
              <h1><a href="<?php echo "goods.php?goods_id=".$row_rsHot['goods_id']; ?>"><?php echo $row_rsHot['goods_name']; ?></a></h1>
            </div>
          </div>
        </div>
      </article>
    </div>
    <?php } while ($row_rsHot = mysql_fetch_assoc($rsHot)); ?>
</div>
