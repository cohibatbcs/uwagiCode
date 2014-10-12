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

//			if(!isset($_SESSION['cell'])){
			if(!isset($cell)){
				
//				print "<div id=triviaAd>";
//					print "Hey Einstein!  Think you're smart?  Prove it.<br />";
//					print "Register here to Redeem those much earned Uwagi Points.";
//				print "</div>";

				print "<div id=mainTriviaBody>";
					print "Having trouble finding something to talk with your date? Need something to do while you wait for your friends? Sitting on toilet with a shy one?<br>";
					print "<br>";
					print "Play trivia at any Uwagi bar by simply texting the bar's 3 letter location code, which is located on various material throughout the bar, to <b>73250</b>. You will be asked general knowledge questions via text message. Respond with the correct answer to redeem Uwagi Points. These Uwagi Points may be cashed in for Uwagi Loot.<br>";
					print "<br>";
					print "<b>Why Register?</b><br>";
					print "<br>";
					print "You will need to register in order to cash in all those Uwagi Points you accumulated.<br>";
					print "<br>";
					print "<b>Caution</b> - Uwagi is not responsible for callused or 'gaming thumbs' due to the addicting nature of Uwagi's text messaging based Trivia.<br>";
					print "<br>";
					print "<form action=triviaLoginScript.php method=post>";
					print "<table border=0 cellpadding=2 cellspacing=0 width=480>";
						print "<tr>";
							print "<td align=right width=30%>Cell Number:</td>";
							print "<td align=left width=70%>(<input name=cell_area type=text size=3 maxlength=3 />)<input name=cell_exchange type=text size=3 maxlength=3 />-<input name=cell_num type=text size=4 maxlength=4 /></td>";
						print "</tr>";
						print "<tr>";
							print "<td align=right width=30%>Password:</td>";
							print "<td align=left width=70%><input name=password type=password size=20 maxlength=16 /></td>";
						print "</tr>";
						print "<tr>";
							print "<td align=right width=30%></td>";
							print "<td align=left width=70%><input type=submit name=Submit value=Login /></td>";
						print "</tr>";
						print "<tr>";
							print "<td align=right width=30%></td>";
							print "<td align=left width=70%>Haven't been here before? <a href=triviaRegister.php>Register your Phone</a></td>";
						print "</tr>";
						print "<tr>";
							print "<td align=right width=30%></td>";
							print "<td align=left width=70%>Forgot your password? <a href=triviaSendPassword.php>Send me my password.</a></td>";
						print "</tr>";
					print "</table>";
					print "</form>";
				print "</div>";			
			}
			else{	
				print "<div id=adHeaderDiv>";
					print "Welcome back, <b>$_SESSION[fName]</b>&nbsp;&nbsp;&nbsp;";
                    	print "<a href=logout.php>Not you?  Click Here to Log Out</a><br>";
					print "<br>";
					print "<font size=+2 color=#333333><b>Your Trivia Account Information</b></font>";
				print "</div>";
                
				print "<div id=triviaBody>";
				
						print "You Currently have <b>$score</b> Trivia Points<br>";
						print "<br>";
						print "<a href=triviaRedemption.php>Redeem Trivia Points for Loot!</a><br>";
						print "<br>";
						print "<a href=triviaEditHold.php>View/Edit Your Info</a><br>";
			}
		?>

</div>
</div>


</body>
 
</html>