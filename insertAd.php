<?php
session_start();
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


<?php
	$con = mysql_connect("t4at3.db.6859454.hostedresource.com","t4at3","M1lli0n5");
			if (!$con){
				die('Could not connect: ' . mysql_error());
			}
			mysql_select_db("t4at3", $con);
			
	$siteID = $_SESSION['siteID'];
	$email = $_SESSION['username'];

	$resultCount = mysql_query("SELECT count(*) FROM site_ads WHERE MONTH(ad_timestamp) = MONTH(CURDATE()) AND siteID = '$siteID'")
		or die (mysql_error());
	$row = mysql_fetch_array($resultCount);
	$numAds = $row['count(*)'];
	
	$resultPurchased = mysql_query("SELECT * FROM site WHERE siteID = '$siteID'")
		or die (mysql_error());
	$row2 = mysql_fetch_array($resultPurchased);
	$credits = $row2['ad_credit'];
	
	if ($numAds < 6){
		$sql="INSERT INTO site_ads (siteID, ad_text, ad_status, site_email, ad_num) VALUES ('$_POST[siteID]','$_POST[adtext]','$_POST[ad_status]','$_POST[site_email]','$_POST[ad_num]')";

		if (!mysql_query($sql,$con)){
			die('Error: ' . mysql_error());
		}
		print "<br>";
		print "<br>";
		print "<br>";		
		print "Your ad has been submittted for recording.  It may take up to 48 hours for your ad to become active at your establishment.<br>";
		print "<br>";
		print "<a href=manageAds.php>Return to Ad Management Page</a>";
	}
	elseif ($credits > 0){
		$dec = mysql_query("UPDATE site SET ad_credit = (ad_credit -1) WHERE siteID = '$siteID'");

		$sql="INSERT INTO site_ads (siteID, ad_text, ad_status, site_email, ad_num) VALUES ('$_POST[siteID]','$_POST[adtext]','$_POST[ad_status]','$_POST[site_email]','$_POST[ad_num]')";

		if (!mysql_query($sql,$con)){
			die('Error: ' . mysql_error());
		}
		print "<br>";
		print "<br>";
		print "<br>";		
		print "Your ad has been submittted for recording.  It may take up to 48 hours for your ad to become active at your establishment.<br>";
		print "<br>";
		print "<a href=manageAds.php>Return to Ad Management Page</a>";
	}
	else{
		print "There seemed to be an error creating your ad.  Please contact technical support so we can get this fixed for you.<br><br>";
		print "Uwagi - (920)886-2530";
	}

?>

</body>
</html>