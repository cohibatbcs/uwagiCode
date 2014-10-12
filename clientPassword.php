<?php require_once('dbConnect/uwagi.php');
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Uwagi</title>
	<link href="main.css" rel="stylesheet" type="text/css" />  
	<style type="text/css"></style>
</head>
<body>

<div id=contentDiv>

	<div id=triviaBody> 

<?php

$siteABR = $_POST['abr'];
$newPass1 = $_POST['newPass1'];
$newPass2 = $_POST['newPass2'];

//print "Text before IF Statement";
//print "<br>";
//print "\$siteABR = " . $siteABR;
//print "<br>";
//print "\$newPass1 = " . $newPass1;
//print "<br>";
//print "\$newPass2 = " . $newPass2;
//print "<br><br><br>";



	if ($siteABR == NULL) {
		print "<br>";
		print "Enter Site Location (3-Letter) Code below:";
		print "<br>";
		print "<br>";
		print "<form name=siteABR action=clientPassword.php method=Post>";
			print "<input type=text name=abr size=3 maxlength=3><br>";
			print "<input type=submit name=Submit value='Submit Code'>";
		print "</form>";
	}
	elseif ($newPass1 == NULL) {
		
		$result = mysql_query("SELECT * FROM site_contacts WHERE siteID IN (SELECT siteID FROM site WHERE site_abr = '$siteABR')")
		or die(mysql_error());
		
		$num_rows = mysql_num_rows($result);

		$row=mysql_fetch_array($result);
		
		$_SESSION['contactID'] = $row['contactID'];
		$_SESSION['siteID'] = $row['siteID'];
		$_SESSION['fName'] = $row['contact_fname'];
		$_SESSION['lName'] = $row['contact_lname'];
		$_SESSION['phone'] = $row['contact_phone'];
		$_SESSION['email'] = $row['contact_email'];
		$fName = $_SESSION['fName'];
		$lName = $_SESSION['lName'];
		$phone = $_SESSION['phone'];
		$email = $_SESSION['email'];
		
		
		print "<br>";
		print "Verify site with contact information below:";
		print "<br><br>";
		print "First Name:  <b>" . $fName;
		print "<br>";
		print "</b>Last Name:  <b>" . $lName;
		print "<br>";
		print "</b>Phone Number:  <b>" . $phone;
		print "<br>";
		print "</b>Email Address:  <b>" . $email . "</b>";
		print "<br><br><br>";
		print "<form name=resetPassword action=clientPassword.php method=POST>";
			print "Enter new password:<br>";
			print "<input type=text name=newPass1 size=16 maxlength=32>";
			print "<br>";
			print "Enter new password again:<br>";
			print "<input type=text name=newPass2 size=16 maxlength=32>";
			print "<input type=hidden name=abr value=notnull>";
			print "<br>";
			print "<input type=submit name=submit value='Submit New Password'>";
	}
	elseif ($newPass1 != $newPass2) {
		print "The 2 passwords did not match.<br>";
		print "<a href=clientPassword.php>Please try again</a>";
	}
	elseif ($newPass1 == $newPass2) {
		$siteID = $_SESSION['siteID'];
		$salt1 = md5("some_random_123_collection_~!@#$%^&*()[]{}-_\/|\;:,.+=<>?_of_stuff");
		$salt2 = md5("another_random_123_collection_~!@#$%^&*()[]{}-_\/|\;:,.+=<>?_of_stuff");
		$pass = md5("$salt1$newPass1$salt2"); 

//		print "\$siteID = " . $_SESSION['siteID'];
//		print "<br>";
//		print "\$pass = " . $pass;
//		print "<br>";

		print "The password has been changed.";
		$result = mysql_query("UPDATE site_contacts SET contact_password = '$pass' WHERE siteID = '$siteID'")
			or die(mysql_error());	
	}		
?>

	</div>
</div>
</body>
</html>