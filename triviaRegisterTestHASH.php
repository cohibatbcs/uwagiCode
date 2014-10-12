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

<div id=contentDiv>
<?php

$cell = "+1" . $_POST['cell_area'] . $_POST['cell_exchange'] . $_POST['cell_num'];
$fname = $_POST[fname];
$lname = $_POST[lname];
$pass1 = $_POST[password1];
$pass2 = $_POST[password2];
$email = $_POST[email];

$salt1 = md5("some_random_123_collection_~!@#$%^&*()[]{}-_\/|\;:,.+=<>?_of_stuff");
$salt2 = md5("another_random_123_collection_~!@#$%^&*()[]{}-_\/|\;:,.+=<>?_of_stuff");
$pass = md5("$salt1$pass1$salt2"); 


	if ($pass1 != $pass2) {
		echo "Error... Passwords do not match<br>";
		echo "<a href=triviaRegister.php>Please try again</a>";
		exit;
	}
	else {
		print $pass;		
	}
?>
</div>

</body>
</html>