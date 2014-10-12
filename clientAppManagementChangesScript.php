<?php
session_start();
require_once('dbConnect/uwagi.php');

	//SESSION Variables
	$username = $_SESSION["username"];
	$siteID = $_SESSION["siteID"];
	
	$desc = $_POST['desc'];
	$offer = $_POST['offer'];
	$length = $_POST['offerLength'];
	$appID = $_SESSION['appID'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Uwagi</title>
<link href="main.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#aboutUsBody{
	padding: 15px;
	border: none;
	margin-top: -75px;
}
</style>
</head>
<body>

<?php

	

	$sqlApp="INSERT INTO site_signup (siteID, signup_desc, signup_offer, signup_length, signup_status) VALUES
		('$siteID','$desc','$offer','$length', 'UPDATE')";
	
	$resultApp = mysql_query($sqlApp)
		or die(mysql_error());
	
		if (!$resultApp){
			exit('Error inserting data into database');
		}
		else{
?>
			<div id=contentDiv>
				<div id=aboutUsBody>
                <?php
//				print "Username is: " . $username . "<br>";
//				print "SiteID is: " . $siteID . "<br>";
//				print "AppID is: " . $appID . "<br><br>";
//				print "Desc is: " . $desc . "<br>";
//				print "Offer is: " . $offer . "<br>";
//				print "Length is: " . $length . "<br><br>";
				?>	
					<h2>Changes Submitted</h2><br/>
					<font color="#FF0000"><i>Your changes have been submitted & should be reflected in your ad within 1 business day.</i></font><br />
					<br />
                    <b>Your Description will read:</b> <?php print $desc; ?><br />
                    <br />
                    <b>Your Special Offer will read:</b> <?php print $offer; ?><br />
                    <br />
                    <b>The length of your offer (in hours) is:</b> <?php print $length; ?><br />
                    <br />
					<a href="clientLogin.php">Return to the Client Page</a>
				</div>
			</div>
<?php
		}


$result2 = mysql_query("select site_name from site where siteID = '$siteID'");
$row2 = mysql_fecth_array($result2);
$site_name = $row2['site_name'];

 $to = "steve@uwagibox.com";
 $subject = "New Customer/App Change Submitted for " . $site_name . " - AppID " . $appID;
 $body = "Establishment: " . $site_name . "\n Description: " . $desc . "\n Offer: " . $offer . "\n Length: " . $length;
 $headers = "From: appchange@uwagibox.com\r\n" .
     "X-Mailer: php";

 if (mail($to, $subject, $body, $headers)) {
   //echo("<p>Message successfully sent!</p>");
  } else {
   echo("<p>Message delivery failed...</p>");
  }
  
   $to = "kpowers@uwagibox.com";
  $subject = "New Customer/App Change Submitted for " . $site_name . " - AppID " . $appID;
 $body = "Establishment: " . $site_name . "\n Description: " . $desc . "\n Offer: " . $offer . "\n Length: " . $length;
 $headers = "From: appchange@uwagibox.com\r\n" .
     "X-Mailer: php";

 if (mail($to, $subject, $body, $headers)) {
   //echo("<p>Message successfully sent!</p>");
  } else {
   echo("<p>Message delivery failed...</p>");
  }
?>

</body>
</html>