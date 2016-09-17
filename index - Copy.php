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

mysql_select_db($database_conn, $conn);
$query_rsPrase = "SELECT * FROM phrase where isnull(ne3ID) ORDER BY id ASC";
$rsPrase = mysql_query($query_rsPrase, $conn) or die(mysql_error());
$row_rsPrase = mysql_fetch_assoc($rsPrase);
$totalRows_rsPrase = mysql_num_rows($rsPrase);
?>
<!DOCTYPE html>
<html lang="en">
<!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
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
    <div class="container">
        <!-- InstanceBeginEditable name="EditRegion1" -->
        <div class="alert"><?php echo $totalRows_rsPrase ?></div>
        <table class="table table-border">
            <tr>
                <th>id</th>
                <th>eng</th>
                <th>chi</th>
                <th>ne3ID</th>
                <th>Action</th>
            </tr>
            <?php do {
                      $query_rsNe3 = sprintf("SELECT * FROM ne3 WHERE eng LIKE %s", GetSQLValueString("%" . $row_rsPrase['eng'] . "%", "text"));
                      $rsNe3 = mysql_query($query_rsNe3, $conn) or die(mysql_error());
                      $row_rsNe3 = mysql_fetch_assoc($rsNe3);
                      $totalRows_rsNe3 = mysql_num_rows($rsNe3);
                      if($totalRows_rsNe3>0){

                          $updateSQL = "UPDATE phrase SET ne3ID=".$row_rsNe3['id']." WHERE id=".$row_rsPrase['id'];
                          mysql_select_db($database_conn, $conn);
                          $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
                      }
            ?>
            <tr>
                <td>
                    <?php echo $row_rsPrase['id']; ?>
                </td>
                <td>
                    <?php echo $row_rsPrase['eng']; ?>
                </td>
                <td>
                    <?php echo $row_rsPrase['chi']; ?>
                </td>
                <td>
                    <?php echo $row_rsPrase['ne3ID']; ?>
                </td>
                <td>
                    <?php echo $totalRows_rsNe3; ?>
                </td>
            </tr>
            <?php } while ($row_rsPrase = mysql_fetch_assoc($rsPrase)); ?>
        </table>
        <!-- InstanceEndEditable -->
    </div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<!-- InstanceEnd -->
</html>
<?php
mysql_free_result($rsPrase);
?>
