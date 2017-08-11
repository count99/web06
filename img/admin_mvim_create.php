<?php require_once('../Connections/db06.php'); ?>
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
	if(isset($_FILES['pic']['tmp_name'])){
		$colname_Recordset1 = "-1";
		if (isset($_POST[''])) {
  		$colname_Recordset1 = $_POST['m_seq'];
		mysql_select_db($database_db06, $db06);
		$query_Recordset1 = sprintf("SELECT * FROM mvim WHERE a_seq = %s", GetSQLValueString($colname_Recordset1, "int"));
		$Recordset1 = mysql_query($query_Recordset1, $db06) or die(mysql_error());
		$row_Recordset1 = mysql_fetch_assoc($Recordset1);
		unlink("images/".$Recordset1['mvim']);
  	$updateSQL = sprintf("UPDATE mvim SET m_mvim=%s WHERE m_seq=%s",
    GetSQLValueString($_FILES['pic']['name'], "text"),
    GetSQLValueString($_POST['hiddenField'], "int"));

	mysql_select_db($database_db06, $db06);
	$Result1 = mysql_query($updateSQL, $db06) or die(mysql_error());}
}
  $updateGoTo = "../admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
?>
<p class="t cent botli">新增動畫圖片</p>
        <form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form">
          <table width="464" border="0">
          <tr>            </tr>
          </table>
          <p>
  <label for="new"></label>動畫圖片：
          <label for="pic"></label>
          <input type="file" name="pic" id="pic"/>
          </p>
          <table style="margin-top:40px; width:70%;">
            <tbody>
              <tr>
                <td width="200px"></td>
                <td class="cent"><input type="submit" value="修改">
                  <input type="reset" value="重置">
                  <input type="hidden" name="hiddenField" id="hiddenField" value=""/></td>
              </tr>
            </tbody>
          </table>
          <input type="hidden" name="MM_insert" value="form" />
          <input type="hidden" name="MM_update" value="form" />
</form>
<?php
mysql_free_result($Recordset1);
?>
