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
  $updateSQL = sprintf("UPDATE phrase SET eng=%s, chi=%s, ne3ID=%s WHERE id=%s",
                       GetSQLValueString($_POST['eng'], "text"),
                       GetSQLValueString($_POST['chi'], "text"),
                       GetSQLValueString($_POST['ne3ID'], "int"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
}

$colname_rsNe3 = "-1";
if (isset($_GET['eng'])) {
  $colname_rsNe3 = $_GET['eng'];
}
mysql_select_db($database_conn, $conn);
$query_rsNe3 = sprintf("SELECT * FROM ne3 WHERE eng LIKE %s", GetSQLValueString("%" . $colname_rsNe3 . "%", "text"));
$rsNe3 = mysql_query($query_rsNe3, $conn) or die(mysql_error());
$row_rsNe3 = mysql_fetch_assoc($rsNe3);
$totalRows_rsNe3 = mysql_num_rows($rsNe3);

$colname_rsPhrase = "-1";
if (isset($_GET['id'])) {
  $colname_rsPhrase = $_GET['id'];
}
mysql_select_db($database_conn, $conn);
$query_rsPhrase = sprintf("SELECT * FROM phrase WHERE id = %s limit 1", GetSQLValueString($colname_rsPhrase, "int"));
$rsPhrase = mysql_query($query_rsPhrase, $conn) or die(mysql_error());
$row_rsPhrase = mysql_fetch_assoc($rsPhrase);
$totalRows_rsPhrase = mysql_num_rows($rsPhrase);
?>
<!DOCTYPE html>
<html lang="en">
<!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
    <table class="table table-bordered">

            <tr>
                <th>id: </th>
                <th><?php echo $row_rsNe3['id']; ?></th>
            </tr>
            <tr>
                <td>category: </td>
                <td><?php echo $row_rsNe3['category']; ?></td>
            </tr>
            <tr>
                <td>sum: </td>
                <td><?php echo $row_rsNe3['sum']; ?></td>
            </tr>
            <tr>
                <td>eng: </td>
                <td><?php echo $row_rsNe3['eng']; ?></td>
            </tr>
            <tr>
                <td>chi: </td>
                <td><?php echo $row_rsNe3['chi']; ?></td>
            </tr>

    </table>
    <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
    <table align="center" class="table table-bordered">
        <tr valign="baseline">
            <td nowrap align="right">Id:</td>
            <td><?php echo $row_rsPhrase['id']; ?></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right">Eng:</td>
            <td><input type="text" name="eng" value="<?php echo htmlentities($row_rsPhrase['eng'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="form-control"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right">Chi:</td>
            <td><input type="text" name="chi" value="<?php echo htmlentities($row_rsPhrase['chi'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="form-control"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right">Ne3ID111:</td>
            <td><input type="text" name="ne3ID" value="<?php echo $row_rsNe3['id']; ?>" size="32" class="form-control"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right">&nbsp;</td>
            <td><input type="submit" value="更新记录" class="btn btn-primary"></td>
        </tr>
    </table>
    <input type="hidden" name="MM_update" value="form1">
    <input type="hidden" name="id" value="<?php echo $row_rsPhrase['id']; ?>">
</form>
    <p>&nbsp;</p>
    <!-- InstanceEndEditable --> </div>
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<!-- InstanceEnd -->
</html>
<?php
mysql_free_result($rsNe3);

mysql_free_result($rsPhrase);
?>
