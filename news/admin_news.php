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
$query_Recordset1 = "SELECT * FROM news where n_del=0";
$Recordset1 = mysql_query($query_Recordset1, $db06) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form")) {
	
	
	for($i=0; $i<count($_POST['title']);$i++){	
  	@$updateSQL = sprintf("UPDATE news SET n_title=%s, n_view=%s, n_del=%s WHERE n_seq=%s",
                       GetSQLValueString($_POST['title'][$i], "text"),
                       GetSQLValueString($_POST['view'][$i], "text"),
                       GetSQLValueString($_POST['delete'][$i], "int"),
                       GetSQLValueString($_POST['hiddenField'][$i], "int"));

  mysql_select_db($database_db06, $db06);
  $Result1 = mysql_query($updateSQL, $db06) or die(mysql_error());
	}

  if (isset($_SERVER['QUERY_STRING'])) {
  
  @header("Location:admin.php?do=admin&redo=news");
}}
?>
<p class="t cent botli">管理者帳號管理</p>
        <form name="form" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="444" border="0">
            <tr class="yel">
              <td width="332" align="center">最新消息資料管理</td>
              <td width="44" align="center">顯示</td>
              <td width="54" align="center">刪除</td>
            </tr>
            <?php 
			$ind=0;
			do { ?>
            <tr>
              <td height="43" align="center"><label for="title"></label>
              <textarea name="title[<?php echo $ind;?>]" id="title" cols="45" rows="5"><?php echo $row_Recordset1['n_title']; ?></textarea>              <label for="id"></label></td>
              <td align="center"><label for="password"></label>
                <input <?php if (!(strcmp($row_Recordset1['n_view'],1))) {echo "checked=\"checked\"";} ?> name="view[<?php echo $ind;?>]" type="checkbox" id="view[<?php echo $ind;?>]" value="1" /><?php $view[$ind]=0 ?>
              <label for="view"></label></td>
              <td align="center"><input <?php if (!(strcmp($row_Recordset1['n_del'],1))) {echo "checked=\"checked\"";} ?> type="checkbox" name="delete[<?php echo $ind;?>]" id="delete" value="1"><?php $delete[$ind]=0 ?>
                <input name="hiddenField[<?php echo $ind;?>]" type="hidden" id="hiddenField" value="<?php echo $row_Recordset1['n_seq']; ?>">
              <label for="delete"></label></td>
            </tr>
            <?php
            $ind++; 
            } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
          </table>
          <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="self.location.href='admin.php?do=admin&redo=admin_news_create'" value="新增最新消息資料"></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
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
