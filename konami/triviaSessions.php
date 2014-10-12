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

<div id="contentDiv">
	<div id="triviaBody">

<?php 
	$_SESSION['password1'] = $_POST['password1'];
	$_SESSION['password2'] = $_POST['password2'];
	$_SESSION['fname'] = $_POST['fname'];
	$_SESSION['lname'] = $_POST['lname'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['uname'] = $uname;
	print ("<script>location.href='triviaCaptcha.php'</script>");
?>

	</div>
</div>

</body>
</html>
