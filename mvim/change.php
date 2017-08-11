<?php require_once('Connections/db06.php'); ?>
<?php
$m_seq=$_GET['m_seq'];
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
$query_Recordset1 = sprintf("SELECT * FROM mvim WHERE m_seq = %s", GetSQLValueString($m_seq, "int"));
$Recordset1 = mysql_query($query_Recordset1, $db06) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
	if(isset($_FILES['pic']['tmp_name'])){
  $insertSQL = sprintf("UPDATE m_mvim=%s FROM mvim WHERE m_seq=%s",
                       GetSQLValueString($_FILES['pic']['name'], "text"),
					   GetSQLValueString($m_seq, "int")
					   );

  mysql_select_db($database_db06, $db06);
  $Result1 = mysql_query($insertSQL, $db06) or die(mysql_error());
  move_uploaded_file($_FILES['pic']['tmp_name'], "C:/xampp/htdocs/web06/images/".$_FILES['pic']['name']);
  unlink("C:/xampp/htdocs/web06/images/".$row_Recordset1['m_mvim']);
	}
  $insertGoTo = "";
  header("Location:admin.php?do=admin&redo=mvim");
}
?>
<p class="t cent botli">新增動畫圖片</p>
        <form method="POST" action="<?php echo $editFormAction; ?>" enctype="multipart/form-data" name="form">
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
                  <input name="hiddenField" type="hidden" id="hiddenField" value="<?php echo $_GET['m_seq']; ?>" /></td>
              </tr>
            </tbody>
          </table>
          <input type="hidden" name="MM_insert" value="form" />
</form>
<?php
mysql_free_result($Recordset1);
?>
