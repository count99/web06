<?php
function find($sql){
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '12345678';
	$dbname = 'db06';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
	mysqli_select_db($conn, $dbname);
	$Recordset1 = mysqli_query($conn, $sql) or die(mysql_error());
	$row_Recordset1 = mysqli_fetch_all($Recordset1);
	mysqli_close($conn);
	return $row_Recordset1;
}

function update($sql){
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '12345678';
	$dbname = 'db06';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
	mysqli_select_db($conn, $dbname);
  	$Result1 = mysqli_query($conn, $sql) or die(mysql_error());
	mysqli_close($conn);
}
