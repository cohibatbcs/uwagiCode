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
    	<b>When you submit this form, a random key will be sent to your cell phone.<br>Be prepared to enter that key on the next page.</b>
    </div>


	<div id=triviaBody>

<?php

// START RANDOM GENERATOR
		$characters = array("A","B","C","D","E","F","G","H","J","K","L","M","N","P","Q","R","S","T","U","V","W","X","Y","Z","1","2","3","4","5","6","7","8","9");
		$keys = array();

		while(count($keys) < 6) {
			$x = mt_rand(0, count($characters)-1);
			if(!in_array($x, $keys)) {
				$keys[] = $x;
			}
		}

		foreach($keys as $key){
			$random_chars .= $characters[$key];
		}
		$_SESSION['captcha'] = $random_chars;
// END RANDOM GENERATOR

print "<center>Change Your Registered Cell Number</center><br>";
print "<br>";
print "<form name=triviaCellReset action=triviaCellResetSessions.php method=post>";
print "<table cellspacing=0 cellpadding=0 border=0 width=400>";
	print "<tr>";
		print "<td width=150>";
			print "New Cell Number:";
		print "</td>";
		print "<td width=250>";
			print "(<input name=cell_area type=text size=3 maxlength=3 />)<input name=cell_exchange type=text size=3 maxlength=3 />-<input name=cell_num type=text size=4 maxlength=4 />";
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