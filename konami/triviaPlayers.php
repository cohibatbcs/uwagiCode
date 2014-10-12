<?php require_once('dbConnect/uwagi.php'); ?>
<?php
session_start(); //Start sessions
	if(!isset($_SESSION['cell'])){
  		header("Location: triviaLogin.php");
		exit;
	}

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
	<div id="contentDiv">

      <div id="adHeaderDiv">

			<?php				
				echo "<b>Welcome back, $fName!</b>&nbsp;&nbsp;&nbsp;<a href=logout.php>Not you? Click Here to Log Out</a><br>";
				echo "<br>";
				print "<font size=+2 color=#333333><b>Login to Trivia Account</b></font>";
			?>

        </div> 
        
		<div id=triviaBody>

			<?php
							
				//USER Table Query
				$result = mysql_query("SELECT * FROM user WHERE userID = '$userID'")
					or die(mysql_error());

				$num_rows = mysql_num_rows($result);
				
				if ($num_rows == 1) {
					while($row = mysql_fetch_array($result)) {
						//DEFINE User Table Variables
						$score = $row['user_trivia_score'];
					}
				}
				
				print "You Currently have <b>$score</b> Trivia Points<br>";
				print "<br>";
				print "<a href=triviaRedemption.php>Redeem Trivia Points for Loot!</a><br>";
				print "<br>";
				print "<a href=triviaEdit.php>View/Edit Your Info</a><br>";
				print "<br>";
				

			?>

		</div>

	</div>
</body>
</html>