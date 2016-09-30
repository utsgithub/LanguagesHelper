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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE temp_phase_edit SET word_id=%s, word_en=%s, word_cn=%s, sen_id=%s, sen_en=%s, sen_cn=%s, phase_en=%s, phase_cn=%s, status=%s WHERE ID=%s",
                       GetSQLValueString($_POST['word_id'], "int"),
                       GetSQLValueString($_POST['word_en'], "text"),
                       GetSQLValueString($_POST['word_cn'], "text"),
                       GetSQLValueString($_POST['sen_id'], "int"),
                       GetSQLValueString($_POST['sen_en'], "text"),
                       GetSQLValueString($_POST['sen_cn'], "text"),
                       GetSQLValueString($_POST['phase_en'], "text"),
                       GetSQLValueString($_POST['phase_cn'], "text"),
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($_POST['ID'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
  $updateGoTo="nc_phase_edit.php?ID=".($_POST['ID'])."&status=success";
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rsSen = "-1";
if (isset($_GET['NC3ID'])) {
  $colname_rsSen = $_GET['NC3ID'];
}
mysql_select_db($database_conn, $conn);
$query_rsSen = sprintf("SELECT * FROM ne3 WHERE id = %s", GetSQLValueString($colname_rsSen, "int"));
$rsSen = mysql_query($query_rsSen, $conn) or die(mysql_error());
$row_rsSen = mysql_fetch_assoc($rsSen);
$totalRows_rsSen = mysql_num_rows($rsSen);

$colname_rsPhaseEdit = "-1";
if (isset($_GET['ID'])) {
  $colname_rsPhaseEdit = $_GET['ID'];
}
mysql_select_db($database_conn, $conn);
$query_rsPhaseEdit = sprintf("SELECT * FROM temp_phase_edit WHERE ID = %s", GetSQLValueString($colname_rsPhaseEdit, "int"));
$rsPhaseEdit = mysql_query($query_rsPhaseEdit, $conn) or die(mysql_error());
$row_rsPhaseEdit = mysql_fetch_assoc($rsPhaseEdit);
$totalRows_rsPhaseEdit = mysql_num_rows($rsPhaseEdit);
?>
<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Languages Helper</title>
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
<table class="table table-bordered">
  <tr>
    <td>id</td>
    <td>category</td>
    <td>sum</td>
    <td>eng</td>
    <td>chi</td>
  </tr>
    <tr>
      <td><?php echo $row_rsSen['id']; ?></td>
      <td><?php echo $row_rsSen['category']; ?></td>
      <td><?php echo $row_rsSen['sum']; ?></td>
      <td><?php echo $row_rsSen['eng']; ?></td>
      <td><?php echo $row_rsSen['chi']; ?></td>
    </tr>

</table>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center" class="table table-bordered">
    <tr valign="baseline">
      <td nowrap align="right">ID:</td>
      <td><?php echo $row_rsPhaseEdit['ID']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Word_id:</td>
      <td><input type="text" name="word_id" class="form-control" value="<?php echo htmlentities($row_rsPhaseEdit['word_id'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Word_en:</td>
      <td><input type="text" name="word_en" class="form-control" value="<?php echo htmlentities($row_rsPhaseEdit['word_en'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Word_cn:</td>
      <td><input type="text" name="word_cn" class="form-control" value="<?php echo htmlentities($row_rsPhaseEdit['word_cn'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Sen_id:</td>
      <td><input type="text" name="sen_id" class="form-control" value="<?php echo $row_rsSen['sum']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Sen_en:</td>
      <td><input type="text" name="sen_en" class="form-control" value="<?php echo $row_rsSen['eng']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Sen_cn:</td>
      <td><input type="text" name="sen_cn" class="form-control" value="<?php echo $row_rsSen['chi']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Phase_en:</td>
      <td><input type="text" name="phase_en" class="form-control" value="<?php echo htmlentities($row_rsPhaseEdit['phase_en'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Phase_cn:</td>
      <td><input type="text" name="phase_cn" class="form-control" value="<?php echo htmlentities($row_rsPhaseEdit['phase_cn'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Status:</td>
      <td><input type="text" name="status" class="form-control" value="<?php echo htmlentities($row_rsPhaseEdit['status'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="更新记录"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="ID" value="<?php echo $row_rsPhaseEdit['ID']; ?>">
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<!-- InstanceEndEditable -->

</div>
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rsSen);

mysql_free_result($rsPhaseEdit);
?>
