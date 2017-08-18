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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if(isset($_FILES['pic']['tmp_name'])){
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form")) {
  	$updateSQL = sprintf("INSERT INTO images (m_img) VALUES(%s);",
    GetSQLValueString($_FILES['pic']['name'], "text"));
	mysql_select_db($database_db06, $db06);
	$Result1 = mysql_query($updateSQL, $db06) or die(mysql_error());
	move_uploaded_file($_FILES['pic']['tmp_name'], "images/".$_FILES['pic']['name']);
  header("Location:admin.php?do=admin&redo=image");
	}
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
          <input type="hidden" name="MM_update" value="form" />
</form>