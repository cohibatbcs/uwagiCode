<?php require_once('dbConnect/uwagi.php'); ?>
<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Uwagi</title>
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
				print "<font size=+2 color=#333333><b>Order Processed</b></font>";
				?>
    		</div> 
            
			<div id=orderMaterialsDiv>

<?php

		$to = "cyoung@uwagibox.com";
		
//	$siteID = $_SESSION['siteID'];
//	$to = $_SESSION['username'];
	
//		$result = mysql_query("SELECT * FROM site WHERE siteID = '$siteID'")
//			or die(mysql_error());
//			
//			$siteInfo = $row['site_name'] . " " . $row['site_address'] . " " . $row['site_city'] . " " . $row['site_state'] . " " . $row['site_zip'];	
//			$siteName = $rox['site_name'];
//			$address = $row['site_address'];			
//			$city = $row['site_city'];
//			$state = $row['site_state'];
//			$zip = $row['site_zip'];
//			$siteInfo = $siteName . " " . $address . " " . $city . " " . $state . " " . $zip;
		
	foreach($_POST['order'] as $value) {
		$check_msg .= "Ordered: $value\n";
	}
	
	foreach($_POST['info'] as $info) {
		$check_info .= "$info\n";
	}
		
	
	$subject = "[ORDER] Marketing Materials"; 
//	$message = $_REQUEST['message'];
	$headers = "From: $email"; 
	$sent = mail($to, $subject, 
	$check_msg, $check_info, $headers);  
 
 		if($sent) {
			print "Your order was sent successfully.<br><br>";
			print "<a href=clientLogin.php>Return to Client Page</a>";
		} 
		else {
			print "We encountered an error sending your mail";
			print "<a href=clientLogin.php>Return to Client Page & try again.</a>";
		}
?>           



</div>

</div>

</body>

</html>
