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
			print "<font size=+2 color=#333333><b>Your Inactive Ads</b></font>";
		?>
    </div>

		<div id="allAdsDiv">
        
        <?php
			
			$siteID = $_SESSION[siteID];
   	
			$result = mysql_query("SELECT * FROM site_ads WHERE siteID = '$siteID' AND ad_num < 1")
				or die(mysql_error());

			$num_rows = mysql_num_rows($result);
				
			if ($num_rows > 0) {		
				while($row = mysql_fetch_array($result)){
					$adID = $row['adID'];
	
					echo $row['ad_text'];
					echo "<br>";
					print "<a href=activateAd1.php?adID=$adID>Activate This Ad</a>";
					echo "<br><br><br><br>";				
				}
			}
			else {
				print "<font size=+3 color=#CCCCCC ><b>You have no Inactive Ads</b></font><br>";
				print "<br>";
				print "<a href=manageAds.php>Return to the Ad Management page to view Active Ads or to Create a New Ad.</a>";
			}
		?>
		
        
        </div>
    
    </div>

</body>
</html>