<?php
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

    //$updateGoTo = "nc_phase_index.php";
    //if (isset($_SERVER['QUERY_STRING'])) {
    //    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    //    $updateGoTo .= $_SERVER['QUERY_STRING'];
    //}
    //$updateGoTo="nc_phase_edit.php?ID=".($_POST['ID']);
    $updateGoTo="nc_phase_index.php?filter=danger";
    header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['ID'])) {
    $colname_Recordset1 = $_GET['ID'];
}
mysql_select_db($database_conn, $conn);
$query_Recordset1 = sprintf("SELECT * FROM temp_phase_edit WHERE ID = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

//Show the total todo number
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