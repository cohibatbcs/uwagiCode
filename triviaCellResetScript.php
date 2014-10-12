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

$newCell = $_POST['cell_area'] . $_POST['cell_exchange'] . $_POST['cell_num'];
	
$newCell1 = "+1" . $newCell;

					$result = mysql_query("UPDATE user SET user_cell_num = '$newCell1' WHERE userID = '$userID'") 
						or die(mysql_error());
					print "Your cell number has been changed.<br><br>";
					print "<a href=triviaEdit.php>Return to the Edit Page.</a>";

?>
</div>

</body>
</html>