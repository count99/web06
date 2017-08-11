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


if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form")) {
	
	
	for($i=0; $i<count($_POST['password']);$i++){	
  	@$updateSQL = sprintf("UPDATE member SET m_id=%s, m_password=%s, m_delete=%s WHERE m_seq=%s",
                       GetSQLValueString($_POST['id'][$i], "text"),
                       GetSQLValueString($_POST['password'][$i], "text"),
                       GetSQLValueString($_POST['delete'][$i], "int"),
                       GetSQLValueString($_POST['hiddenField'][$i], "int"));

  mysql_select_db($database_db06, $db06);
  $Result1 = mysql_query($updateSQL, $db06) or die(mysql_error());
	}

  $updateGoTo = "admin.php?do=admin&redo=admin";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  @header(sprintf("Location: %s", $updateGoTo));
}


mysql_select_db($database_db06, $db06);
$query_Recordset1 = "SELECT * FROM member WHERE m_delete = 0;";
$Recordset1 = mysql_query($query_Recordset1, $db06) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

?>
<p class="t cent botli">管理者帳號管理</p>
        <form name="form" method="POST" action="<?php echo $editFormAction; ?>">
          <table width="388" border="0">
            <tr class="yel">
              <td width="168" align="center">帳號</td>
              <td width="168" align="center">密碼</td>
              <td width="38" align="center">刪除</td>
            </tr>
            <?php 
			$ind=0;
			do { ?>
            <tr>
              <td height="43" align="center"><label for="id"></label>
              <input name="id[<?php echo $ind;?>]" type="text" id="id" value="<?php echo $row_Recordset1['m_id']; ?>"></td>
              <td align="center"><label for="password"></label>
              <input name="password[<?php echo $ind;?>]" type="password" id="password" value="<?php echo $row_Recordset1['m_password']; ?>"></td>
              <td align="center"><input type="checkbox" name="delete[<?php echo $ind;?>]" id="delete" value="1"><?php $delete[$ind]=0 ?>
                <input name="hiddenField[<?php echo $ind;?>]" type="hidden" id="hiddenField" value="<?php echo $row_Recordset1['m_seq']; ?>">
              <label for="delete"></label></td>
            </tr>
            <?php
            $ind++; 
            } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
          </table>
          <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="self.location.href='admin.php?do=admin&redo=create_user'" value="新增管理者帳號"></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>
          <input type="hidden" name="MM_update" value="form">
    <?php @$_POST['delete'] = $_POST['delete'] + $delete;    ?>  
</form>
<?php	
mysql_free_result($Recordset1);
?>
