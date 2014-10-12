<?php
 session_start();
 	
 require_once('dbConnect/uwagi.php');

//		SESSION Variables
		$cell = $_SESSION['cell'];
		$userID = $_SESSION['userID'];
		$newCell = $_SESSION['newCell'];
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
	<div id=triviaBody>

<?php 

$newCell1 = "+1" . $newCell;
$captcha = $_SESSION['captcha'];
$captchaSent = $_POST['captchaSent'];

		if (!isset($captchaSent)) {			
			print "<form name=captchaCheck action=triviaCellResetCaptcha.php method=post>";
				print "<table border=0 cellpadding=2 cellspacing=0 width=480>";
					print "<tr>";
						print "<td align=right width=30%>Enter the Key that was sent to your cell phone:</td>";
						print "<td align=left width=70%><input name=captchaSent type=text size=6 maxlength=6 /></td>";
					print "</tr>";
					print "<tr>";
						print "<td align=right width=30%></td>";
						print "<td align=left width=70%><input type=submit name=Submit value=Submit Key /></td>";
					print "</tr>";
				print "</table>";
			print "</form>";
?>
				<iframe src="http://184.60.94.154/captia.php?captia=<?php echo $captcha; ?>&cell=<?php echo $newCell1;?>" width="1" height="1" scrolling="no" frameborder="0">
					<p>Your browser does not support iframes.</p>
				</iframe>
<?php
		}
		elseif ($captchaSent !== $captcha) {
			print "The key you entered did not match the key sent to your cell phone.<br>";
			print "<a href=triviaEdit.php>Please try again.</a>";
		}
		else {
			$result = mysql_query("UPDATE user SET user_cell_num = '$newCell1' WHERE userID = '$userID'") 
						or die(mysql_error());
			print "Your cell number has been changed.<br>";
			print "<a href=triviaEdit.php>Return to the Edit Page.</a>";
		}


?>

	</div>
</div>

</body>
</html>