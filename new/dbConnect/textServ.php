<?php
//Create a database connection

$hostname="184.60.94.154";
$username="root";
$password="M1lli0n5";
$dbname="test_text";

mysql_connect($hostname,$username, $password) 
	or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
mysql_select_db($dbname);

//Set global variables for OM account
$short_code = "10958";
$account_ID = "000-000-107-89871";
$password = "ZWZ9HT3F";

#####################################################################################################################################################################################################
?>