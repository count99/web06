<?php require_once('Connections/db06.php'); ?>
<?php
@session_start();
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
$query_Recordset1 = "SELECT * FROM total WHERE t_seq = 1";
$Recordset1 = mysql_query($query_Recordset1, $db06) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
$total = $row_Recordset1['t_total'];

if(!isset($_SESSION['total'])){
	$_SESSION['total']=1;
	$total += 1;
	$updateSQL = sprintf("UPDATE total SET t_total=%s WHERE t_seq=1",
                       GetSQLValueString($total, "int"));
  	mysql_select_db($database_db06, $db06);
  	$Result1 = mysql_query($updateSQL, $db06) or die(mysql_error());
	}
echo $total;
mysql_free_result($Recordset1);


?>
