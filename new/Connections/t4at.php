<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_t4at = "t4at3.db.6859454.hostedresource.com";
$database_t4at = "t4at3";
$username_t4at = "t4at3";
$password_t4at = "M1lli0n5";
$t4at = mysql_pconnect($hostname_t4at, $username_t4at, $password_t4at) or trigger_error(mysql_error(),E_USER_ERROR); 
?>