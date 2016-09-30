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
    $updateSQL = sprintf("UPDATE ne4 SET book_id=%s, topic_id=%s, word=%s, etyma=%s, word_variants=%s, mean_cn=%s, mean_en=%s, word_audio=%s, sentence=%s, sentence_trans=%s, sentence_audio=%s, image=%s, phonetic=%s, short_phrase=%s, deformation_image=%s, P=%s, phase_en=%s, phase_cn=%s, status=%s, len=%s, mark1=%s, mark2=%s, mark3=%s, mark4=%s, mark5=%s WHERE ID=%s",
                         GetSQLValueString($_POST['book_id'], "text"),
                         GetSQLValueString($_POST['topic_id'], "text"),
                         GetSQLValueString($_POST['word'], "text"),
                         GetSQLValueString($_POST['etyma'], "text"),
                         GetSQLValueString($_POST['word_variants'], "text"),
                         GetSQLValueString($_POST['mean_cn'], "text"),
                         GetSQLValueString($_POST['mean_en'], "text"),
                         GetSQLValueString($_POST['word_audio'], "text"),
                         GetSQLValueString($_POST['sentence'], "text"),
                         GetSQLValueString($_POST['sentence_trans'], "text"),
                         GetSQLValueString($_POST['sentence_audio'], "text"),
                         GetSQLValueString($_POST['image'], "text"),
                         GetSQLValueString($_POST['phonetic'], "text"),
                         GetSQLValueString($_POST['short_phrase'], "text"),
                         GetSQLValueString($_POST['deformation_image'], "text"),
                         GetSQLValueString($_POST['P'], "text"),
                         GetSQLValueString($_POST['phase_en'], "text"),
                         GetSQLValueString($_POST['phase_cn'], "text"),
                         GetSQLValueString($_POST['status'], "text"),
                         GetSQLValueString($_POST['len'], "text"),
                         GetSQLValueString($_POST['mark1'], "text"),
                         GetSQLValueString($_POST['mark2'], "text"),
                         GetSQLValueString($_POST['mark3'], "text"),
                         GetSQLValueString($_POST['mark4'], "text"),
                         GetSQLValueString($_POST['mark5'], "text"),
                         GetSQLValueString($_POST['ID'], "int"));

    mysql_select_db($database_conn, $conn);
    $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());

    // $updateGoTo = "nc_nc4_index.php";
    // nc_nc4_edit.php?ID=2
    $updateGoTo = "nc_nc4_edit.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
        $updateGoTo .= $_SERVER['QUERY_STRING'];
    }
    header(sprintf("Location: %s", "nc_nc4_edit.php?ID=".($_POST['ID']+1)));
}

$colname_Recordset1 = "-1";
if (isset($_GET['ID'])) {
    $colname_Recordset1 = $_GET['ID'];
}
mysql_select_db($database_conn, $conn);
$query_Recordset1 = sprintf("SELECT * FROM ne4 WHERE ID = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>