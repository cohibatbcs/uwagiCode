<?php
//create a database connection
$hostname="t4at3.db.6859454.hostedresource.com";
$username="t4at3";
$password="M1lli0n5";
$dbname="t4at3";


mysql_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
mysql_select_db($dbname);
#################################################################################################

$query = "SELECT image from app_images where imgID='2'";
$result = @mysql_QUERY($query);

$data = @mysql_RESULT($result,0,"image");


header( "Content-type: image/JPEG");
echo $data; 
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>