<?php require_once('Connections/db06.php'); ?>
<script type="text/javascript" src="news_files/jquery-1.9.1.min.js"></script>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO member (m_id, m_password) VALUES (%s, %s)",
                       GetSQLValueString($_POST['id'], "text"),
                       GetSQLValueString($_POST['password'], "text"));

  mysql_select_db($database_db06, $db06);
  $Result1 = mysql_query($insertSQL, $db06) or die(mysql_error());
	@header("Location:admin.php?do=admin&redo=admin");
}
?>
<p class="t cent botli">新增管理者帳號</p>
        <form name="form" method="POST" action="admin.php?do=admin&redo=create_user">
          <table width="291" border="0" align="center">
            <tr>
              <td width="150" align="center">帳號</td>
              <td width="131"><label for="id"></label>
              <input type="text" name="id" id="id"></td>
            </tr>
            <tr>
              <td align="center">密碼</td>
              <td><label for="password"></label>
              <input type="password" name="password" id="password" value=""></td>
            </tr>
            <tr>
              <td align="center">確認密碼</td>
              <td><label for="re_password"></label>
              <input type="password" name="re_password" id="re_password" value=""></td>
              <script>$(document).ready(function(){
				  var t1 = $(#re_password).val();
				  var t2 = $(#re_password).val();
				  if ($(#re_password).val()!=$(#re_password).val()){
					  $(#re_password).val()="";
					  $(#re_password).text()="密碼不一致，請重新輸入";
					  }
				  });</script>
            </tr>
          </table>
          
          <table style="margin-top:40px; width:70%;">
            <tbody>
              <tr>
                <td width="200px"></td>
                <td class="cent"><input type="submit" value="修改確定">
                  <input type="reset" value="重置"></td>
              </tr>
            </tbody>
          </table>
          <input type="hidden" name="MM_insert" value="form" />
</form>
