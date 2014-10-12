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

<div id="contentDiv">

	<div id="adHeaderDiv">
    	Use the forms below to enter information into your trivia account & earn bonus trivia points!!
    </div>
    
	<div id="triviaBody">
		<?php
		
		$result = mysql_query("SELECT * FROM user_questions WHERE questionID NOT IN (SELECT questionID FROM preference_match WHERE userID = '$userID')")
			or die(mysql_error());

		$questions = mysql_fetch_array($result);
		
		print $row['questionID'];


//			print "<form name=triviaEdit action=triviaEditScript method=post>";
//				print "<table>";
//					print "<tr>";
//						print "<td>";
//							print "What is your favorite type of beverage?";
//						print "</td>";
//						print "<td>";
//							print "<select name=001l><option value=Beer>Beer</option><option value=Wine>Wine</option><option value=MixedDrinks>Mixed Drinks</option><option value=DontDrink>Don't Drink</option></select>";
//						print "</td>";
//					print "</tr>";
//				print "</table>";
//			print "</form>";
		?>
	</div>
</div>