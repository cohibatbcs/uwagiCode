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

	$sql="INSERT INTO site_ads (siteID, ad_text, ad_status, site_email, ad_num) VALUES ('$_POST[siteID]','$_POST[adtext]','$_POST[ad_status]','$_POST[site_email]','$_POST[ad_num]')";

	if (!mysql_query($sql,$con))
		{
		die('Error: ' . mysql_error());
	}
	print "<br>";
	print "<br>";
	print "<br>";		
	print "Your ad has been submittted for recording.  It may take up to 48 hours for your ad to become active at your establishment.<br>";
	print "<br>";
	print "<a href=manageAds.php>Return to Ad Management Page</a>";
	

//	header("location:clientLogin.php");
?>

</body>
</html>