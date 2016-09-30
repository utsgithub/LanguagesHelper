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
        <a href="nc_phase_index.php" class="btn btn-primary mbl none">Back</a>
        <div class="alert alert-info"><?php echo $totalRows_rs ?></div>
        <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
            <h1>
                <?php echo $row_Recordset1['word_en']?>&nbsp;
                <?php echo $row_Recordset1['word_cn']?>
            </h1>
            <h1><?php echo str_replace($row_Recordset1['word_en'], "<kbd>".$row_Recordset1['word_en']."</kbd>",$row_Recordset1['sen_en']); ?></h1>
            <h1><?php echo htmlentities($row_Recordset1['sen_cn'], ENT_COMPAT, 'utf-8'); ?></h1>
            <table align="center" class="table table-bordered">  
                <tr>
                    <th>sen_id:</th>
                    <td><input type="text" class="form-control" name="sen_id" value="<?php echo $row_Recordset1['sen_id']; ?>" /></td>
                </tr>                   
                <tr valign="baseline">
                    <td nowrap align="right">Phase_en:</td>
                    <td>
                        <input type="text" class="form-control" name="phase_en" value="<?php echo htmlentities($row_Recordset1['phase_en'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Phase_cn:</td>
                    <td>
                        <input type="text" class="form-control" name="phase_cn" value="<?php echo htmlentities($row_Recordset1['phase_cn'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Status:</td>
                    <td>
                        <?php
                        if($row_Recordset1['status']=="" || isset($_GET['status'])){
                            $valStatus="Success";
                        }else{
                            $valStatus=$row_Recordset1['status'];
                        }
                        ?>
                        <select name="status" class="form-control size1of4">
                            <option value="<?php echo $valStatus?>" selected><?php echo $valStatus?></option>
                            <option value="success">Success</option>
                            <option value="danger">Danger</option>
                            <option value="info">Info</option>
                            <option value="warning">Warning</option>
                        </select>
                        <!--<input type="text" class="form-control" name="status" value="success" size="32" />-->
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">&nbsp;</td>
                    <td>
                        <input type="submit" value="Update" class="btn btn-primary" />
                    </td>
                </tr>
            </table>
            <input type="hidden" name="MM_update" value="form1" />
            <input type="hidden" name="ID" value="<?php echo $row_Recordset1['ID']; ?>" />
            <input type="hidden" name="word_id" value="<?php echo $row_Recordset1['word_id']; ?>" />
            <input type="hidden" name="word_en" value="<?php echo $row_Recordset1['word_en']; ?>" />
            <input type="hidden" name="word_cn" value="<?php echo $row_Recordset1['word_cn']; ?>" />
            <input type="hidden" name="sen_cn" value="<?php echo $row_Recordset1['sen_cn']; ?>" />
            <input type="hidden" name="sen_en" value="<?php echo $row_Recordset1['sen_en']; ?>" />
            
        </form>
        <a class="btn btn-warning" href="nc_phase_search.php?keyword=<?php echo $row_Recordset1['word_en'] ?>&PID=<?php echo $_GET['ID']?>">Search</a>
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
