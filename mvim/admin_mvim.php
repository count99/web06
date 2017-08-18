<?php require_once('Connections/db06.php'); ?>
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

mysql_select_db($database_db06, $db06);
$query_Recordset1 = "SELECT * FROM mvim where m_del=0";
$Recordset1 = mysql_query($query_Recordset1, $db06) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form")) {
	
	for($i=0; $i<count($_POST['hiddenField']);$i++){	
  	@$updateSQL = sprintf("UPDATE mvim SET m_view=%s, m_del=%s WHERE m_seq=%s",
                       
                       GetSQLValueString($_POST['view'][$i], "int"),
                       GetSQLValueString($_POST['delete'][$i], "int"),
                       GetSQLValueString($_POST['hiddenField'][$i], "int"));

  mysql_select_db($database_db06, $db06);
  $Result1 = mysql_query($updateSQL, $db06) or die(mysql_error());
	}

  if (isset($_SERVER['QUERY_STRING'])) {
  
  @header("Location:admin.php?do=admin&redo=mvim");
}}
?>
<p class="t cent botli">管理者帳號管理</p>
        <form name="form" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="544" border="0">
            <tr class="yel">
              <td width="289" align="center">動畫圖片</td>
              <td width="39" align="center">顯示</td>
              <td width="47" align="center">刪除</td>
              <td width="151" align="center">&nbsp;</td>
            </tr>
            <?php 
			$ind=0;
			do { ?>
            <tr>
              <td height="43" align="center">
              <object width="120" data="<?php echo "images/".$row_Recordset1['m_mvim'];?>"></object> 
              </td>
              <td align="center"><label for="password"></label>
                <input <?php if (!(strcmp($row_Recordset1['m_view'],1))) {echo "checked=\"checked\"";} ?> name="view[<?php echo $ind;?>]" type="checkbox" id="view[<?php echo $ind;?>]" value="1" /><?php $view[$ind]=0 ?>
              <label for="view"></label></td>
              <td align="center"><input <?php if (!(strcmp($row_Recordset1['m_del'],1))) {echo "checked=\"checked\"";} ?> type="checkbox" name="delete[<?php echo $ind;?>]" id="delete" value="1" />
                <?php $delete[$ind]=0 ?>
                <input name="hiddenField[<?php echo $ind;?>]" type="hidden" id="hiddenField" value="<?php echo $row_Recordset1['m_seq']; ?>" />
                <label for="delete"></label></td>
              <td align="center"><button formmethod="POST" name="m_seq" formaction="admin.php?do=admin&redo=admin_mvim_change" onclick="self.location.href='admin.php?do=admin&redo=admin_mvim_change'" value="<?php echo $row_Recordset1['m_seq'];?>">更換動畫</button></td>
            </tr>
            <?php
            $ind++; 
            } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
          </table>  
          <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="self.location.href='admin.php?do=admin&redo=admin_mvim_create'" value="新增動畫圖片"></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>
          <input type="hidden" name="MM_update" value="form">
    <?php @$_POST['delete'] = $_POST['delete'] + $delete; 
		@$_POST['view'] = $_POST['view'] + $view;
	   ?>  
</form>
<?php
mysql_free_result($Recordset1);
?>
