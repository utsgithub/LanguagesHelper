<?php require_once('Connections/conn.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
$colname_filter = "where isNull(status)";
if (isset($_GET['filter'])) {
  $colname_filter = "";
}
mysql_select_db($database_conn, $conn);
$query_rs = "SELECT * FROM temp_phase_edit ".$colname_filter;
$rs = mysql_query($query_rs, $conn) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);
$totalRows_rs = mysql_num_rows($rs);
?>
<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- InstanceBeginEditable name="doctitle" -->
<title></title>
<!-- InstanceEndEditable -->
<!-- inc_head -->
<?php include("inc/inc_head.php"); ?>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>
<body>
<!-- inc_nav -->
<?php include("inc/inc_nav.php"); ?>
<div class="container"><!-- InstanceBeginEditable name="EditRegion1" -->
<div class="alert alert-info"><?php echo $totalRows_rs ?></div>
<table class="table table-bordered">
  <tr>
    <td>ID</td>
    <td>word_en</td>
    <td>phase_en</td>
    <td>phase_cn</td>
  </tr>
  <?php do { ?>
    <tr class="bg-<?php echo $row_rs['status']; ?>">
      <td nowrap="nowrap"><?php echo $row_rs['ID']; ?></td>
      <td nowrap="nowrap"><a href="nc_phase_edit.php?ID=<?php echo $row_rs['ID']; ?>"><?php echo $row_rs['word_en']; ?></a></td>
      <td nowrap="nowrap"><?php echo $row_rs['phase_en']; ?></td>
      <td nowrap="nowrap"><?php echo $row_rs['phase_cn']; ?></td>
    </tr>
    <?php } while ($row_rs = mysql_fetch_assoc($rs)); ?>
</table>
<!-- InstanceEndEditable -->

</div>
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rs);
?>
