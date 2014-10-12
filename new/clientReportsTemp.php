<?php
//Create a database connection


########## HOST Database Connection#########################
$hostname = "t4at3.db.6859454.hostedresource.com";
$username = "t4at3";
$password = "M1lli0n5";
$dbname = "t4at3";

mysql_connect($hostname,$username, $password) 
	or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
mysql_select_db($dbname);
############################################################




//Set global variables for OM account
$short_code = "10958";
$account_ID = "000-000-107-89871";
$password = "ZWZ9HT3F";

#####################################################################################################################################################################################################
?>
<?php

$username = $_GET['username'];
$siteID = $_GET['siteID'];
session_start();
	if(!isset($username)){
  		header("Location: http://www.uwagibox.com/nonClient.php");
		exit;
	}
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; cha  rset=utf-8" />
<title>Untitled Document</title>
<link href="http://www.uwagibox.com/main.css" rel="stylesheet" type="text/css" />
<style type="text/css">
</style>
</head>
<body>
<div id="contentDiv">

	<div id="adHeaderDiv">
		<?php
			echo "<a href=http://www.uwagibox.com/logout.php>Click Here to Log Out</a><br>";
			echo "<br>";
			print "<font size=+2 color=#333333><b>Client Reports</b></font>";
		?>
	</div>

    <div id="triviaBody">
    	<?php
			print "We are currently writing new code to generate better reports for you.  We will be turning this page back on later today.<br>";
			print "<br>";
			print "<i>- Uwagi Techincal Team - Monday, July 18th - 10:45am</i>";
		?>

	</div>

</div>