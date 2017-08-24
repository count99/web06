<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_db06 = "localhost";
$database_db06 = "db06";
$username_db06 = "root";
$password_db06 = "12345678";
$db06 = mysql_pconnect($hostname_db06, $username_db06, $password_db06) or trigger_error(mysql_error(),E_USER_ERROR); 
?>