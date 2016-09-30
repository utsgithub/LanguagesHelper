<?php require_once('Connections/conn.php'); ?>
<?php require_once('nc_inc_nc4_edit.php'); ?>
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
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center" class="table table-bordered table-hover">
    <tr valign="baseline" class="none">
      <td nowrap align="right">ID:</td>
      <td><?php echo $row_Recordset1['ID']; ?></td>
    </tr>
    <tr valign="baseline" class="none">
      <td nowrap align="right">Book_id:</td>
      <td><input type="text" class="form-control" name="book_id" value="<?php echo htmlentities($row_Recordset1['book_id'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline" class="none">
      <td nowrap align="right">Topic_id:</td>
      <td><input type="text" class="form-control" name="topic_id" value="<?php echo htmlentities($row_Recordset1['topic_id'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline" class="">
      <td nowrap align="right">Word:</td>
      <td><input type="text" class="form-control" name="word" value="<?php echo htmlentities($row_Recordset1['word'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline" class="none">
      <td nowrap align="right">Etyma:</td>
      <td><input type="text" class="form-control" name="etyma" value="<?php echo htmlentities($row_Recordset1['etyma'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline" class="none">
      <td nowrap align="right">Word_variants:</td>
      <td><input type="text" class="form-control" name="word_variants" value="<?php echo htmlentities($row_Recordset1['word_variants'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline" class="">
      <td nowrap align="right">Mean_cn:</td>
      <td><input type="text" class="form-control" name="mean_cn" value="<?php echo htmlentities($row_Recordset1['mean_cn'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline" class="none">
      <td nowrap align="right">Mean_en:</td>
      <td><input type="text" class="form-control" name="mean_en" value="<?php echo htmlentities($row_Recordset1['mean_en'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline" class="none">
      <td nowrap align="right">Word_audio:</td>
      <td><input type="text" class="form-control" name="word_audio" value="<?php echo htmlentities($row_Recordset1['word_audio'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline" class="">
      <td nowrap align="right">Sentence:</td>
      <td>
      <h1><?php echo str_replace($row_Recordset1['word'], "<kbd>".$row_Recordset1['word']."</kbd>",$row_Recordset1['sentence']); ?></h1>
      <input type="hidden" class="form-control" name="sentence" value="<?php echo htmlentities($row_Recordset1['sentence'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline" class="">
      <td nowrap align="right">Sentence_trans:</td>
      <td><input type="text" class="form-control" name="sentence_trans" value="<?php echo htmlentities($row_Recordset1['sentence_trans'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline" class="none">
      <td nowrap align="right">Sentence_audio:</td>
      <td><input type="text" class="form-control" name="sentence_audio" value="<?php echo htmlentities($row_Recordset1['sentence_audio'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline" class="none">
      <td nowrap align="right">Image:</td>
      <td><input type="text" class="form-control" name="image" value="<?php echo htmlentities($row_Recordset1['image'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline" class="none">
      <td nowrap align="right">Phonetic:</td>
      <td><input type="text" class="form-control" name="phonetic" value="<?php echo htmlentities($row_Recordset1['phonetic'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline" class="none">
      <td nowrap align="right">Short_phrase:</td>
      <td><input type="text" class="form-control" name="short_phrase" value="<?php echo htmlentities($row_Recordset1['short_phrase'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline" class="none">
      <td nowrap align="right">Deformation_image:</td>
      <td><input type="text" class="form-control" name="deformation_image" value="<?php echo htmlentities($row_Recordset1['deformation_image'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline" class="none">
      <td nowrap align="right">P:</td>
      <td><input type="text" class="form-control" name="P" value="<?php echo htmlentities($row_Recordset1['P'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline" class="">
      <td nowrap align="right">Phase_en:</td>
      <td><input type="text" class="form-control" name="phase_en" value="<?php echo htmlentities($row_Recordset1['phase_en'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline" class="">
      <td nowrap align="right">Phase_cn:</td>
      <td><input type="text" class="form-control" name="phase_cn" value="<?php echo htmlentities($row_Recordset1['phase_cn'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline" class="">
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
      </td>
    </tr>
    <tr valign="baseline" class="none">
      <td nowrap align="right">Len:</td>
      <td><input type="text" class="form-control" name="len" value="<?php echo htmlentities($row_Recordset1['len'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline" class="">
      <td nowrap align="right">Mark1:</td>
      <td>
            <?php
            if($row_Recordset1['mark1']=="" || isset($_GET['status'])){
                $valStatus="";
            }else{
                $valStatus=$row_Recordset1['status'];
            }
            ?>
      <select name="mark1" class="form-control size1of4">
                            <option value="<?php echo $valStatus?>" selected><?php echo $valStatus?></option>
                            <option value="success">Success</option>
                            <option value="danger">Danger</option>
                            <option value="info">Info</option>
                            <option value="warning">Warning</option>
                        </select>
      </td>
    </tr>
    <tr valign="baseline" class="none">
      <td nowrap align="right">Mark2:</td>
      <td><input type="text" class="form-control" name="mark2" value="<?php echo htmlentities($row_Recordset1['mark2'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline" class="none">
      <td nowrap align="right">Mark3:</td>
      <td><input type="text" class="form-control" name="mark3" value="<?php echo htmlentities($row_Recordset1['mark3'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline" class="none">
      <td nowrap align="right">Mark4:</td>
      <td><input type="text" class="form-control" name="mark4" value="<?php echo htmlentities($row_Recordset1['mark4'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline" class="none">
      <td nowrap align="right">Mark5:</td>
      <td><input type="text" class="form-control" name="mark5" value="<?php echo htmlentities($row_Recordset1['mark5'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline" class="">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="更新记录"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="ID" value="<?php echo $row_Recordset1['ID']; ?>">
</form>
<p>&nbsp;</p>
<!-- InstanceEndEditable -->

</div>
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($Recordset1);
?>
