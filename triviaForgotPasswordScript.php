<?php require_once('dbConnect/uwagi.php'); ?>
<?php
session_start();

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
<title>Untitled Document</title>
   	<link href="main.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
    </style>
</head>

<body>

<div id=contentDiv>
<?php

$cell1 = "+1" . $cell;
$newPass1 = $_POST[newPassword1]; 
$newPass2 = $_POST[newPassword2];

		$salt1 = md5("some_random_123_collection_~!@#$%^&*()[]{}-_\/|\;:,.+=<>?_of_stuff");
		$salt2 = md5("another_random_123_collection_~!@#$%^&*()[]{}-_\/|\;:,.+=<>?_of_stuff");
		$saltNewPass = md5($salt1 . $newPass1 . $salt2); 


	if ($newPass1 != $newPass2) {
		echo "Error... New Passwords do not match<br>";
		echo "<a href=triviaForgotPasswordSubmit.php>Please try again</a>";
		exit;
	}
	else {
		
//		$result = mysql_query("SELECT * FROM user WHERE user_cell_num = '$cell'")
//			or die(mysql_error());
//			
//			$row = mysql_fetch_array($result);
//				$pass = $row['user_password'];

		$result = mysql_query("UPDATE user SET user_password = '$saltNewPass' WHERE user_cell_num = '$cell1'") 
			or die(mysql_error());
		print "Your password has been changed.  <a href=triviaRegisterSuccess.php>Please log in.</a>";
	}
?>
</div>

</body>
</html>