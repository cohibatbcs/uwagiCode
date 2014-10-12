<?php

//create a database connection
$hostname="t4at3.db.6859454.hostedresource.com";
$username="t4at3";
$password="M1lli0n5";
$dbname="t4at3";


mysql_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
mysql_select_db($dbname);

$result = mysql_query("SELECT sa.siteID, s.site_name, sa.adID, sa.ad_timestamp, sa.ad_num FROM site_ads sa JOIN site s ON s.siteID = sa.siteID WHERE ad_status = 'pending'") or die(mysql_error());
$row = mysql_fetch_array($result);
echo $row['siteID'];
echo $row['site_name'];
echo $row['adID'];
echo $row['ad_timestamp'];
echo $row['ad_num'];



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