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

$newEmail = $_POST[newEmail];
//		$result = mysql_query("SELECT * FROM user WHERE user_cell_num = '$cell'")
//			or die(mysql_error());
//
//			$num_rows = mysql_num_rows($result);
//			
//			while($row = mysql_fetch_array($result)){
//			$pass = $row['user_password'];
//
//			$row = mysql_fetch_array($result);
//				$pass = $row['user_password'];

//				if ($saltOldPass == $pass) {
					$result = mysql_query("UPDATE user SET user_email = '$newEmail' WHERE user_cell_num = '$cell'") 
						or die(mysql_error());
					print "Your email address has been changed.<br><br>";
					print "<a href=triviaEdit.php>Return to the Edit Page.</a>";
//				}
//				else {
//					print "You did not enter your old password correctly.  <a href=triviaPasswordReset.php>Please try again.</a>";
//					exit;
//				}
//			}
//	}
?>
</div>

</body>
</html>