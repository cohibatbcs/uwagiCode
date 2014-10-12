<?php require_once('dbConnect/uwagi.php'); ?>
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

<div id="contentDiv">
<?php

$cell = "+1" . $_POST['cell_area'] . $_POST['cell_exchange'] . $_POST['cell_num'];
$fname = $_POST[fname];
$lname = $_POST[lname];
$pass1 = $_POST[password1];
$pass2 = $_POST[password2];
$email = $_POST[email];


	if ($pass1 != $pass2) {
		echo "Error... Passwords do not match<br>";
		echo "<a href=triviaRegister.php>Please try again</a>";
		exit;
	}
	else {
		
		$result = mysql_query("SELECT * FROM user WHERE user_cell_num = '$cell'")
			or die(mysql_error());

		$num_rows = mysql_num_rows($result);
		
		if ($num_rows == 1) {
			$result = mysql_query("UPDATE user 
									SET 
									user_fname = $fname, 
									user_lname = $lname, 
									user_password = $pass1, 
									user_email = $email 
									WHERE 
									user_cell_num = '$cell'") 
				or die(mysql_error());
		}
		else {

			$sql="INSERT INTO user (user_cell_num, user_fname, user_lname, user_password) VALUES
				('$cell','$fname','$lname','$email','$pass1')";
	
			$result = mysql_query($sql)
				or die(mysql_error());
 
				if (!$result)
    				{
       				 exit('Error inserting data into database');
    			}
				print "<br>";
				print "<br>";
				print "<br>";		
				print "$fname, Welcome to Uwagi Trivia.  From this site, blah, blah, blah<br>";
				print "<br>";
				print "<a href=triviaLogin.php>Return to the Login Page to login & view your account information.</a>";

		}
	}
?>
</div>

</body>
</html>