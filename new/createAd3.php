<?php require_once('dbConnect/uwagi.php'); ?>
<?php
session_start();
	if(!isset($_SESSION['username'])){
  		header("Location: nonClient.php");
		exit;
	}
	
$siteID = $_SESSION['siteID'];

function createAd($siteID,$email){
print "<div id=contentDiv>";

	print "<div id=adHeaderDiv>";
		print "You are logged in as <b>" . $email . "</b>&nbsp;&nbsp;&nbsp;<a href=logout.php>Click Here to Log Out</a><br>";
		print "<br>";
		print "<font size=+2 color=#333333><b>Your Currently Enabled Ads</b></font>";
	print "</div>";

	print "<div id=createAdDiv>";

		print "<div id=adTextDiv>";
            print "<form name=createAd ACTION=insertAd.php METHOD=POST>";
                print "<textarea name=adtext wrap=physical rows=4 cols=45 onkeyup=limiter()></textarea><br>";
                print "<input type=hidden name=siteID value=" . $siteID . "/>";
                print "<input type=hidden name=site_email value=" . $email . "/>";
                print "<input type=hidden name=ad_num value=3/>";
                print "<input type=hidden name=ad_status value=Pending/>";
				print "<input type=submit name=submit value=Submit Ad>";
			print "</form>";
            
			print "<script type=text/javascript>";
	            print "document.write(\"Characters Remaining: <input type=text name=limit size=4 readonly value=\"+count+\">\");";
            print "</script>";

			print "<br />";
			print "<br />";
			print "<a href=manageAds.php>Cancel \"Create New Ad\"</a>";
		print "</div>";

	print "</div>";

print "</div>";
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
    
	<script type="text/javascript">
		var count = "100";
		function limiter(){
		var tex = document.createAd.adtext.value;
		var len = tex.length;
		if(len > count){
   	    tex = tex.substring(0,count);
   			document.createAd.adtext.value =tex;
    		return false;
		}
		document.createAd.limit.value = count-len;
		}
	</script>

</head>

<body>

<?php
			
	$siteID = $_SESSION['siteID'];
	$email = $_SESSION['username'];

	$resultCount = mysql_query("SELECT count(*) FROM site_ads WHERE MONTH(ad_timestamp) = MONTH(CURDATE()) AND siteID = '$siteID'")
		or die (mysql_error());
	$row = mysql_fetch_array($resultCount);
	$numAds = $row['count(*)'];
	
	if ($numAds > 5){
		$resultPurchased = mysql_query("SELECT * FROM site WHERE siteID = '$siteID'")
			or die (mysql_error());
		$row2 = mysql_fetch_array($resultPurchased);
		$credits = $row2['ad_credit'];
		
		if ($credits < 1){
			print "<div id=contentDiv>";
				print "<div id=createAdDiv>";
					print "You have already created 6 new ads this month & have no credits for creating more.<br><br>";
					print "If you would like to purchase more credits, please contact the Uwagi office at (920)886-2530.<br><br>";
					print "<a href=manageAds.php>Return to the Ad Management page.</a><br><br>";
					print "<a href=clientLogin.php>Return to the Client page.</a><br><br>";
				print "</div>";
			print "</div>";
			end;
		}
		else{
			createAd($siteID,$email);
		}
	}
	else{
		createAd($siteID,$email);
	}
?>


    

</body>
</html>