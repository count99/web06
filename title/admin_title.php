<?php require_once('Connections/db.php'); ?>
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form")) {
  $updateSQL = sprintf("UPDATE total SET t_total=%s WHERE t_seq=1",
                       GetSQLValueString($_POST['t_total'], "int"));

  mysql_select_db($database_db06, $db06);
  $Result1 = mysql_query($updateSQL, $db06) or die(mysql_error());
}

mysql_select_db($database_db06, $db06);
$query_Recordset1 = "SELECT * FROM footer WHERE f_seq = 1";
$Recordset1 = mysql_query($query_Recordset1, $db06) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<p class="t cent botli">頁尾版權資料管理</p>
<form name="form" method="POST" action="<?php echo $editFormAction; ?>">
    <table width="100%">
    	<tbody>
    	  <tr class="yel">
    	    <td width="45%" align="center" bgcolor="#FFCC00">動態文字廣告</td>
    	    <td width="12%" align="center">顯示</td>
    	    <td width="11%" align="center">刪除</td>
  	      </tr>
    	  <tr>
    	    <td align="center" bgcolor="#FFCC00"><label for="title"></label>
   	        <input type="text" name="title" id="title" /></td>
    	    <td align="center"><input type="checkbox" name="view" id="view" />
   	        <label for="view"></label></td>
    	    <td align="center"><input type="checkbox" name="delete" id="delete" />
   	        <label for="delete"></label></td>
  	    </tr>
    </tbody></table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="self.location.href='admin.php?do=admin&redo=create_user'" value="新增動態文字廣告" /></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
  </tbody></table>
           <input type="hidden" name="MM_update" value="form" />    
</form>    
<?php
mysql_free_result($Recordset1);
?>