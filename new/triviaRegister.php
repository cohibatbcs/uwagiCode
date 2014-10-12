<?php
session_start();
 	
require_once('dbConnect/uwagi.php');
	
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


<?php
	$fname = $_SESSION['fname'];
	$lname = $_SESSION['lname'];
	$email = $_SESSION['email'];
	$uname = $_SESSION['uname'];

$regCell = $_POST['cell_area'] . $_POST['cell_exchange'] . $_POST['cell_num'];
	
$regCell1 = "+1" . $regCell;


$_SESSION['regCell1'] = $regCell1;
	
	$result = mysql_query("SELECT * FROM user WHERE user_cell_num = '$regCell1'")
		or die(mysql_error());
		
		$row = mysql_fetch_array($result);
		
		$sqlPass = $row['user_password'];

	if ($regCell == "") {
		print "<div id=contentDiv>";
			print "<div id=adHeaderDiv>";
				print "<font size=+2 color=#333333><b>Trivia Registration</b></font>";
			print "</div>";
			print "<div id=triviaBody>";
				print "<form name=register action=triviaRegister.php method=post>";
					print "<table border=0 cellpadding=2 cellspacing=0 width=480>";
						print "<tr>";
							print "<td align=right width=30%>Cell Number:</td>";
							print "<td align=left width=70%>(<input name=cell_area type=text size=3 maxlength=3 />)";
							print "<input name=cell_exchange type=text size=3 maxlength=3 />";
							print "-<input name=cell_num type=text size=4 maxlength=4 /></td>";
						print "</tr>";
						print "<tr>";
							print "<td align=right width=30%></td>";
							print "<td align=left width=70%><input type=submit name=submit value=Verify /></td>";
						print "</tr>";
					print "</table>";
				print "</form>";
			print "</div>";
		print "</div>";
	}

	elseif (isset($regCell) && isset($sqlPass)) {
		print "<div id=contentDiv>";
			print "<div id=adHeaderDiv>";
				print "<font size=+2 color=#333333><b>Trivia Registration</b></font>";
			print "</div>";
			print "<div id=manageContentDiv>";
				print "We have a password on file for this cell phone number.<br>  <a href=triviaLogin.php>Please return to the login page & enter your username and password.</a>";
			print "</div>";
		print "</div>";
	}
	elseif (isset($regCell) && !isset($sqlPass)) {
		
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

		print "<div id=contentDiv>";
			print "<div id=adHeaderDiv>";
				print "<font size=+2 color=#333333><b>Trivia Registration</b></font>";
			print "</div>";
			print "<div id=triviaBody>";
				print "<b>When you submit this form, a random key will be sent to your cell phone.<br>Be prepared to enter that key on the next page.</b><br><br>";
				print "<form name=register action=triviaSessions.php method=post>";
					print "<table border=0 cellpadding=2 cellspacing=0 width=480>";
						print "<tr>";
							print "<td align=right width=30%>Create username:</td>";
							print "<td align=left width=70%><input name=username type=text size=20 maxlength=16 /></td>";
						print "</tr>";
						print "<tr>";
							print "<td align=right width=30%>Create Password:</td>";
							print "<td align=left width=70%><input name=password1 type=password size=20 maxlength=16 /></td>";
						print "</tr>";
						print "<tr>";
							print "<td align=right width=30%>Re-Enter Password:</td>";
							print "<td align=left width=70%><input name=password2 type=password size=20 maxlength=16 /></td>";
						print "</tr>";
						print "<tr>";
							print "<td align=right width=30%>First Name:</td>";
							print "<td align=left width=70%><input name=fname type=text size=20 maxlength=16 /></td>";
						print "</tr>";
						print "<tr>";
							print "<td align=right width=30%>Last Name:</td>";
							print "<td align=left width=70%><input name=lname type=text size=20 maxlength=16 /></td>";
						print "</tr>";
						print "<tr>";
							print "<td align=right width=30%>Email:</td>";
							print "<td align=left width=70%><input name=email type=text size=20 maxlength=32 /></td>";
						print "</tr>";
						print "<tr>";
							print "<td align=right width=30%></td>";
							print "<td align=left width=70%><input type=submit name=submit value=Register /></td>";
						print "</tr>";
					print "</table>";
				print "</form>";
			print "</div>";
		print "</div>";	
		
	}
	
?>

</body>
</html>