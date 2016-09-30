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
$PID = "-1";
if (isset($_GET['PID'])) {
    $PID = $_GET['PID'];
}
$colname_Recordset1 = "-1";
if (isset($_GET['keyword'])) {
    $colname_Recordset1 = $_GET['keyword'];
}
mysql_select_db($database_conn, $conn);
$query_Recordset1 = "SELECT * FROM ne3 WHERE eng LIKE '%".$colname_Recordset1."%'";
//echo $query_Recordset1;
//$query_Recordset1 = sprintf("SELECT * FROM ne3 WHERE eng LIKE %s", GetSQLValueString("%" . $colname_Recordset1 . "%", "text"));
$Recordset1 = mysql_query($query_Recordset1, $conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html>
<html lang="en">
<!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
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
    <div class="container">
        <!-- InstanceBeginEditable name="EditRegion1" -->
        <table class="table table-bordered">
            <tr>
                <td>id</td>
                <td>category</td>
                <td>sum</td>
                <td>eng</td>
                <td>chi</td>
            </tr>
            <?php do { ?>
            <tr>
                <td>
                    <?php echo $row_Recordset1['id']; ?>
                </td>
                <td>
                    <?php echo $row_Recordset1['category']; ?>
                </td>
                <td>
                    <?php echo $row_Recordset1['sum']; ?>
                </td>
                <td>
                    <h1>
                        <a href="nc_phase_edit_correct.php?NC3ID=<?php echo $row_Recordset1['id']; ?>&ID=<?php echo $_GET['PID']?>">
                            <?php echo str_replace($colname_Recordset1,"<kbd>".$colname_Recordset1."</kbd>",$row_Recordset1['eng']); ?>
                        </a>
                    </h1>
                </td>
                <td>
                    <?php echo $row_Recordset1['chi']; ?>
                </td>
            </tr>
            <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
        </table>
        <!-- InstanceEndEditable -->

    </div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<!-- InstanceEnd -->
</html>
<?php
mysql_free_result($Recordset1);
?>
