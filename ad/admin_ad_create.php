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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO ad (a_title) VALUES (%s)",
                       GetSQLValueString($_POST['new'], "text"));

  mysql_select_db($database_db06, $db06);
  $Result1 = mysql_query($insertSQL, $db06) or die(mysql_error());

  if (isset($_SERVER['QUERY_STRING'])){
  @header("Location:admin.php?do=admin&redo=ad");
}
}

?>
<p class="t cent botli">動態文字廣告</p>
        <form name="form" method="POST" action="<?php echo $editFormAction; ?>">
          <p>動態文字廣告：
            <label for="new"></label>
            <textarea name="new" id="new" cols="45" rows="5"></textarea>
          </p>
          <table style="margin-top:40px; width:70%;">
            <tbody>
              <tr>
                <td width="200px"></td>
                <td class="cent"><input type="submit" value="新增">
                  <input type="reset" value="重置"></td>
              </tr>
            </tbody>
          </table>
          <input type="hidden" name="MM_insert" value="form" />
</form>
