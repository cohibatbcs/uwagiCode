<?php
session_start();
require_once('dbConnect/uwagi.php');

	//SESSION Variables
	$cell = $_SESSION['cell'];
	$fName = $_SESSION['fName'];
	$lName = $_SESSION['lName'];
	$email = $_SESSION['email'];
	$userID = $_SESSION['userID'];
	
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

	<div id=adHeaderDiv>
    	
    </div>


	<div id=triviaBody>

<?php

print "<center><b>Change Your Password</b></center><br>";
print "<br>";
print "Once you've submitted the changes to your password, you will be redirected to the login page, so you can log in with your new password.<br>";
print "<br>";
print "<form name=triviaPasswordReset action=triviaForgotPasswordScript.php method=post>";
print "<table cellspacing=0 cellpadding=0 border=0 width=400>";
	print "<tr>";
		print "<td width=150>";
			print "New Password:";
		print "</td>";
		print "<td width=250>";
			print "<input type=password name=newPassword1 size=16 maxlength=32>";
		print "</td>";
	print "</tr>";
	print "<tr>";
		print "<td width=150>";
			print "Repeat New Password:";
		print "</td>";
		print "<td width=250>";
			print "<input type=password name=newPassword2 size=16 maxlength=32>";
		print "</td>";
	print "</tr>";
	print "<tr>";
		print "<td width=150>";
			print "<input type=submit name=submit value=Submit>";
		print "</td>";
		print "<td width=250>";
		print "</td>";
	print "</tr>";
print "</table>";
print "</form>";
?>

	</div>
</div>
</body>
</html>