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
    $updateSQL = sprintf("UPDATE ecs_goods SET goods_sn=%s, goods_name=%s WHERE goods_id=%s",
        GetSQLValueString($_POST['goods_sn'], "text"),
        GetSQLValueString(trim($_POST['goods_name']), "text"),
        GetSQLValueString($_POST['goods_id'], "int"));

    mysql_select_db($database_conn, $conn);
    $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
}

$colname_rsGoods = "-1";
if (isset($_GET['goods_id'])) {
    $colname_rsGoods = $_GET['goods_id'];
}
mysql_select_db($database_conn, $conn);
$query_rsGoods = sprintf("SELECT * FROM ecs_goods WHERE goods_id = %s", GetSQLValueString($colname_rsGoods, "int"));
$rsGoods = mysql_query($query_rsGoods, $conn) or die(mysql_error());
$row_rsGoods = mysql_fetch_assoc($rsGoods);
$totalRows_rsGoods = mysql_num_rows($rsGoods);

$colname_rsPro = "-1";
if (isset($_GET['goods_sn'])) {
    $colname_rsPro = $_GET['goods_sn'];
}
mysql_select_db($database_conn, $conn);
$query_rsPro = sprintf("SELECT * FROM pro WHERE num LIKE %s", GetSQLValueString("%" . $colname_rsPro . "%", "text"));
$rsPro = mysql_query($query_rsPro, $conn) or die(mysql_error());
$row_rsPro = mysql_fetch_assoc($rsPro);
$totalRows_rsPro = mysql_num_rows($rsPro);
?>