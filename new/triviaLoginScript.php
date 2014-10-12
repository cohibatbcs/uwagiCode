<?php
session_start();
require_once('dbConnect/uwagi.php');


print '<!DOCTYPE html PUBLIC -//W3C//DTD XHTML 1.0 Transitional//EN http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd>';
print '<html xmlns=http://www.w3.org/1999/xhtml>';
print '<head>';
	print '<meta http-equiv=Content-Type content=text/html; charset=utf-8 />';
	print '<title>Uwagi</title>';
	print '<link href=main.css rel=stylesheet type=text/css />';  
	print '<style type=text/css></style>';
print '</head>'; 
 
print '<body>';


	$cell = "+1" . $_POST['cell_area'] . $_POST['cell_exchange'] . $_POST['cell_num'];
	$passPre = $_POST["password"];
		$salt1 = md5("some_random_123_collection_~!@#$%^&*()[]{}-_\/|\;:,.+=<>?_of_stuff");
		$salt2 = md5("another_random_123_collection_~!@#$%^&*()[]{}-_\/|\;:,.+=<>?_of_stuff");
			$pass = md5("$salt1$passPre$salt2"); 

	$result = mysql_query("SELECT * FROM user WHERE user_cell_num = '$cell' and user_password='$pass'");
	$row = mysql_fetch_array($result);
	$res = $row['user_fname'];
	echo $res;

	if(mysql_num_rows(mysql_query("SELECT * FROM user WHERE user_cell_num='$cell' and user_password='$pass'"))==1){
		$_SESSION['cell'] = $cell;
		$_SESSION['fName'] = $row['user_fname'];
		$_SESSION['lName'] = $row['user_lname'];
		$_SESSION['email'] = $row['user_email'];
		$_SESSION['userID'] = $row['userID'];
		print ("<script>location.href='triviaLogin.php'</script>");
	}
	else{
		print '<div id=contentDiv>';
			print '<div id=triviaBody>';
				echo 'Wrong username or password!<br>';
				echo '<a href=triviaLogin.php>Try Again.</a><br>';
				echo '<br>';
				echo '<a href=triviaForgotPassword.php>Forgot your password?</a>';
			print '</div>';
		print '</div>';
	}

?>

</body>

</html>