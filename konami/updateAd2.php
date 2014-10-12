<?php require_once('dbConnect/uwagi.php'); ?>
<?php
session_start(); //Start sessions
	if(!isset($_SESSION['username'])){ 
  		header("Location: nonClient.php");
		exit;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>Untitled Document</title><link href="main.css" rel="stylesheet" type="text/css" /><style type="text/css"></style></head><body>
<?php

$remove = $_POST['Remove'];

if ($remove != "") {
	$result = mysql_query("DELETE FROM site_ads WHERE ad_num='2'") 
		or die(mysql_error());
		print ("<script>location.href='manageAds.php'</script>");
}
else {

$result = mysql_query("SELECT * FROM site_ads WHERE ad_num='2'")
	or die(mysql_error());

	$num_rows = mysql_num_rows($result);

	if ($num_rows == 1) {		
		while($row = mysql_fetch_array($result)){
			$status = $row['ad_status'];
		}
	}
	if ($status == 'Pending'){
		print "<div id=contentDiv>";
			print "<div id=triviaBody>";
				print "Removing an ad with a Pending status will cancel the recording of the ad & remove it permanantly from your Ad List.<br>";
				print "<br>";
				print "Click the Remove button to confirm the removal of this Pending ad.<br>";
				print "<form name=confirmRemove ACTION=updateAd2.php METHOD=POST>";
				print "<INPUT TYPE=Submit Name=Remove VALUE = Remove>";
				print "</form>";
				print "<br>";
				print "Cancel and <a href=manageAds.php>Return to Ad Management page</a>.";
			print "</div>";
		print "</div>";
	}
	else {
		$result = mysql_query("UPDATE site_ads SET ad_num='null' WHERE ad_num='2'") 
			or die(mysql_error());
			print ("<script>location.href='manageAds.php'</script>");
	}
}
?>

</body>
</html>