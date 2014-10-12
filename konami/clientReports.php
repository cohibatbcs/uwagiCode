<?php require_once('dbConnect/uwagi.php'); ?>
<?php
session_start();
	if(!isset($_SESSION['username'])){
  		header("Location: nonClient.php");
		exit;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="main.css" rel="stylesheet" type="text/css" />
<style type="text/css">
</style>
</head>
<body>
<div id="contentDiv">

	<div id="adHeaderDiv">
		<?php
			echo "You are logged in as <b>$_SESSION[username]</b>&nbsp;&nbsp;&nbsp;<a href=logout.php>Click Here to Log Out</a><br>";
			echo "<br>";
			print "<font size=+2 color=#333333><b>Client Reports</b></font>";
		?>
	</div>

    <div id="triviaBody">
    	<?php
			$siteID = $_SESSION['siteID'];
			$result = mysql_query("SELECT * FROM site_opt WHERE siteID = '$siteID'")
					or die(mysql_error());
			$num_rows = mysql_num_rows($result);

				if ($num_rows < 50) {		
					print "This feature will be available to those establishments that have had enough Uwagi users log into their bar to enable reports to be generated.<br><br>";
					print "This is currently set at 50 unique users.<br><br>";
					print "Your currently have '$num_rows' unique users.";
				}
				else {
					print "Your currently have '$num_rows' unique users & are eligible to have reports displayed.<br><br>";
					print "We seem to have an error on our end.<br><br>";
					print "We'll make sure to whip whoever needs whipping & get that report up here for you as soon as we find out who is responsible.";
				}
		?>

	</div>

</div>