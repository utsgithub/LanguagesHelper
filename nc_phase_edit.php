<?php require_once('Connections/conn.php'); ?>
<!-- nc_phase_edit -->
<?php require_once('nc_inc_phase_edit.php');?>
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
        <a href="nc_phase_index.php" class="btn btn-primary mbl">Back</a>
        <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
            <table align="center" class="table table-bordered">
                <tr valign="baseline">
                    <td nowrap align="right">ID:</td>
                    <td>
                        <?php echo $row_Recordset1['ID']; ?>
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Word_id:</td>
                    <td>
                        <input type="text" name="word_id" value="<?php echo htmlentities($row_Recordset1['word_id'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Word_en:</td>
                    <td>
                        <input type="text" name="word_en" value="<?php echo htmlentities($row_Recordset1['word_en'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Word_cn:</td>
                    <td>
                        <input type="text" name="word_cn" value="<?php echo htmlentities($row_Recordset1['word_cn'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline" class="hidden">
                    <td nowrap align="right">Sen_id:</td>
                    <td>
                        <input type="text" name="sen_id" value="<?php echo htmlentities($row_Recordset1['sen_id'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Sen_en:</td>
                    <td>
                        <?php echo str_replace($row_Recordset1['word_en'], "<kbd>".$row_Recordset1['word_en']."</kbd>",$row_Recordset1['sen_en']); ?>
                        <input type="hidden" name="sen_en" value="<?php echo htmlentities($row_Recordset1['sen_en'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Sen_cn:</td>
                    <td>
                        <?php echo htmlentities($row_Recordset1['sen_cn'], ENT_COMPAT, 'utf-8'); ?>
                        <input type="hidden" name="sen_cn" value="" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Phase_en:</td>
                    <td>
                        <input type="text" name="phase_en" value="<?php echo htmlentities($row_Recordset1['phase_en'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Phase_cn:</td>
                    <td>
                        <input type="text" name="phase_cn" value="<?php echo htmlentities($row_Recordset1['phase_cn'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Status:</td>
                    <td>
                        <input type="text" name="status" value="success" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">&nbsp;</td>
                    <td>
                        <input type="submit" value="更新记录" />
                    </td>
                </tr>
            </table>
            <input type="hidden" name="MM_update" value="form1" />
            <input type="hidden" name="ID" value="<?php echo $row_Recordset1['ID']; ?>" />
        </form>
        <p>&nbsp;</p>
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
