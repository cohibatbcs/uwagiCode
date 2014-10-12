<?php
########## HOST Database Connection#########################
$hostname = "t4at3.db.6859454.hostedresource.com";
$username = "t4at3";
$password = "M1lli0n5";
$dbname = "t4at3";

$t4at3 = mysql_connect($hostname,$username, $password) 
	or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
mysql_select_db($dbname);
############################################################

$username = $_GET['username'];
$siteID = $_GET['siteID'];

$result_appID = mysql_query("select appID from site where siteID = '$siteID'");
$row_appID = mysql_fetch_array($result_appID);
$appID = $row_appID['appID'];

mysql_close($t4at3);



//create a database connection
$hostname="64.244.63.169";
$username="uwagi";
$password="Uwagiman";
$dbname="uwagi";


$poco = mysql_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
mysql_select_db($dbname);
#################################################################################################


$result = mysql_query("SELECT field_redeem_count_count as app_redeem FROM uwagi.field_data_field_redeem_count where entity_id = '$appID'") or die (mysql_error());
$row = mysql_fetch_array($result);
$redeemed = $row['app_redeem'];
	
mysql_close($poco);

########## HOST Database Connection#########################
$hostname = "t4at3.db.6859454.hostedresource.com";
$username = "t4at3";
$password = "M1lli0n5";
$dbname = "t4at3";

$t4at3 = mysql_connect($hostname,$username, $password) 
	or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
mysql_select_db($dbname);
############################################################

?>
<?php


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
			$result = mysql_query("SELECT * FROM site WHERE siteID = '$siteID'")
				or die(mysql_error());
			$row = mysql_fetch_array($result);
			$redeemed = $row['app_redeemed'];
			
			$result2 = mysql_query("SELECT DISTINCT userID FROM site_user WHERE siteID = '$siteID'")
					or die(mysql_error());
			$num_rows2 = mysql_num_rows($result2);

				if ($num_rows2 < 100) {		
					print "This feature will be available to those establishments that have had enough Uwagi users log into their establishment to enable accurate reports to be generated.<br><br>";
					print "This is currently set at 100 users who have logged in or used the trivia service in your establishment.<br><br>";
					print "Your currently have<b> " . $num_rows2 . " </b>unique trivia users.<br>";
					print "<br>";
					print "You currently have<b> " . $redeemed . " </b>specials redeemed using the Uwagi App.";
					print "<br>";

				}
				else {
					print "Your currently have '$num_rows2' unique users & are eligible to have reports displayed.<br><br>";
					print "We seem to have an error on our end.<br><br>";
					print "We'll make sure to whip whoever needs whipping & get that report up here for you as soon as we find out who is responsible.";
				}
mysql_close($t4at3);
		?>

	</div>

</div>