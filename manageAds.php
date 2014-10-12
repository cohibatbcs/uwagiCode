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


<div id=contentDiv>

	<div id=adHeaderDiv>
		<?php
			echo "You are logged in as <b>$_SESSION[username]</b>&nbsp;&nbsp;&nbsp;<a href=logout.php>Click Here to Log Out</a><br>";
			echo "<br>";
			print "<font size=+2 color=#333333><b>Your Currently Enabled Ads</b></font>";
		?>
    </div>

	<div id=adText>
		Enter and Submit text for 6 second Radio Ad.<br />
        <i>Example</i>:  "Come to Joe's Place on Tuesday nights for $.25 wings and $2 domestic pints.
    </div>

	<div id=ad1Div>

		<div id=ad1ImgDiv>
        	<img src="images/img1.gif" />
		</div>

		<div id=ad1TextDiv>
        	<?php 
				$siteID = $_SESSION['siteID'];
				$result = mysql_query("SELECT * FROM site_ads WHERE siteID = '$siteID' AND ad_num = 1")
					or die(mysql_error());

				$num_rows = mysql_num_rows($result);
				
				if ($num_rows == 1) {		
					while($row = mysql_fetch_array($result)){
						echo $row['ad_text'];						
						$status = $row['ad_status'];
					}
				}
				else {
					print "<font size=+3 color=#CCCCCC >Available Ad Space</font>";
				}				
			echo "</div>";

				if ($num_rows == 1) {
					echo "<div id=ad1LinksDiv>";
						print "<a href=updateAd1.php>Remove This Ad</a><br>";
						print "<br>";
						if ($status == 'Pending') {
							print "<img src=\"images/pending.gif\" title=\"In the next 24 hours, your ad will be recorded.  Once it is recorded the pending status is removed & it will be in your ad rotation as soon as your Uwagi box performs a scheduled update.\">";
						}
					echo "</div>";
				}
				else {
					echo "<div id=ad1LinksDiv>";
					print "<a href=createAd1.php>Create New Ad Here</a>";
					echo "<br><br>";
					print "<a href=inactiveAd1.php>Activate Old Ad Here</a>";
					echo "</div>";
				}
			?>

		</div>

	<div id=ad2Div>
    
		<div id=ad2ImgDiv>
			<img src="images/img2.gif" />
		</div>
            
		<div id=ad2TextDiv>
        	<?php    	
				$result = mysql_query("SELECT * FROM site_ads WHERE siteID = '$siteID' AND ad_num = 2")
					or die(mysql_error());

				$num_rows = mysql_num_rows($result);

				if ($num_rows == 1) {		
					while($row = mysql_fetch_array($result)){
						echo $row['ad_text'];
						$status = $row['ad_status'];
					}
				}
				else {
					print "<font size=+3 color=#CCCCCC >Available Ad Space</font>";
				}
			echo "</div>";
		
        		if ($num_rows == 1) {
					echo "<div id=ad2LinksDiv>";
						print "<a href=updateAd2.php>Remove This Ad</a><br>";
						print "<br>";
						if ($status == 'Pending') {
							print "<img src=\"images/pending.gif\" title=\"In the next 24 hours, your ad will be recorded.  Once it is recorded the pending status is removed & it will be in your ad rotation as soon as your Uwagi box performs a scheduled update.\">";
						}
					echo "</div>";
				}
				else {
					echo "<div id=ad2LinksDiv>";
					print "<a href=createAd2.php>Create New Ad Here</a>";
					echo "<br><br>";
					print "<a href=inactiveAd2.php>Activate Old Ad Here</a>";
					echo "</div>";
				}
			?>  

                   
		</div>

<div id=ad3Div>
    
    	<div id=ad3ImgDiv>
        	<img src="images/img3.gif" />
		</div>
            
		<div id=ad3TextDiv>
        	<?php    	
				$result = mysql_query("SELECT * FROM site_ads WHERE siteID = '$siteID' AND ad_num = 3")
					or die(mysql_error());

				$num_rows = mysql_num_rows($result);

				if ($num_rows == 1) {		
					while($row = mysql_fetch_array($result)){
						echo $row['ad_text'];
						$status = $row['ad_status'];
					}
				}
				else {
					print "<font size=+3 color=#CCCCCC >Available Ad Space</font>";
				}
			echo "</div>";
		
        		if ($num_rows == 1) {
					echo "<div id=ad3LinksDiv>";
						print "<a href=updateAd3.php>Remove This Ad</a><br>";
						print "<br>";
						if ($status == 'Pending') {
							print "<img src=\"images/pending.gif\" title=\"In the next 24 hours, your ad will be recorded.  Once it is recorded the pending status is removed & it will be in your ad rotation as soon as your Uwagi box performs a scheduled update.\">";
						}
					echo "</div>";
				}
				else {
					echo "<div id=ad3LinksDiv>";
					print "<a href=createAd3.php>Create New Ad Here</a>";
					echo "<br><br>";
					print "<a href=inactiveAd3.php>Activate Old Ad Here</a>";
					echo "</div>";
				}
			?>  

                  
		</div>
</div>

</body>
</html>