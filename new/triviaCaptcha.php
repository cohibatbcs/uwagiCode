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
<style type="text/css"></style>
</head>
<body>

<div id=contentDiv>
	<div id=triviaBody>

<?php 


$cell = $_SESSION['regCell1'];
$pass1 = $_SESSION['password1'];
$pass2 = $_SESSION['password2'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];
$captcha = $_SESSION['captcha'];

$captchaSent = $_POST['captchaSent'];

$salt1 = md5("some_random_123_collection_~!@#$%^&*()[]{}-_\/|\;:,.+=<>?_of_stuff");
$salt2 = md5("another_random_123_collection_~!@#$%^&*()[]{}-_\/|\;:,.+=<>?_of_stuff");
$pass = md5("$salt1$pass1$salt2"); 


	if ($pass1 == $pass2) {
		if (!isset($captchaSent)) {
			print "<form name=captchaCheck action=triviaCaptcha.php method=post>";
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
				<iframe src="http://184.60.94.154/captia.php?captia=<?php echo $captcha; ?>&cell=<?php echo $cell;?>" width="1" height="1" scrolling="no" frameborder="0">
					<p>Your browser does not support iframes.</p>
				</iframe>
<?php
		}
		elseif ($captchaSent !== $captcha) {
			print "The key you entered did not match the key sent to your cell phone.<br>";
			print "<a href=triviaRegister.php>Please try again.</a>";
		}
		else {
			print "Thank you for registering with Uwagi.<br>";
			print "<a href=triviaLogin.php>Please return to the Login page to use your cell phone number & password to log in to your account.</a><br>";
			$result = mysql_query("SELECT * FROM user WHERE user_cell_num = '$cell'")
				or die(mysql_error());
			$num_rows = mysql_num_rows($result);

				if($num_rows > 0) {
					$result = mysql_query("UPDATE user SET user_password = '$pass', user_fname = '$fname', user_lname = '$lname', user_email = '$email' WHERE user_cell_num = '$cell'")
						or die(mysql_error());
				}
				else {
					$result = mysql_query("INSERT INTO user (user_cell_num, user_fname, user_lname, user_email, user_password) VALUES
											('$cell','$fname','$lname','$email','$pass')")
						or die(mysql_error());
				}
		}
	}
	else {
		echo "Passwords did not match.<br>";
		echo "<a href=triviaRegister.php>Please try again.</a>";
		exit;
	}


?>

	</div>
</div>

</body>
</html>



<?php
//			$result = mysql_query("Select * from user WHERE user_cell_num = '$cell'");
//			$row = mysql_fetch_array($result);
//			$res = $row['user_fname'];
//			echo $res;
//            
//            			$result = mysql_query("SELECT * FROM user WHERE user_cell_num = '$cell'")
//				or die(mysql_error());
//			$num_rows = mysql_num_rows($result);
//
//				if($num_rows !=0) {
//					echo $cell;
//					$result = mysql_query("UPDATE user SET user_password = $pass1, user_fname = $fname, user_lname = '$lname', user_email = '$email' WHERE user_cell_num = $cell")
//						or die(mysql_error());
//
//			
//			$result = mysql_query("SELECT * FROM user WHERE user_cell_num = '$cell'")
//				or die(mysql_error());
//				$row = mysql_fetch_array($result);
//				$num_rows = mysql_num_rows($result);
//
//				if($num_rows = 1) {
//					echo $row['user_cell_num'];
//					$sql="UPDATE user SET user_password = 'castro' WHERE user_cell_num = $cell";
//					print "Thank you for registering with Uwagi.<br>";
//					print "<a href=triviaRegisterSuccess.php>Return to the login page to enter your cell phone & password to edit your information or check your trivia status.</a>";
//				}
//				else {
//					print "No Record Exists";
//				}
?>