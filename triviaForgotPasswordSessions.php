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

	$_SESSION['cell'] = $_POST['cell_area'] . $_POST['cell_exchange'] . $_POST['cell_num'];
	print ("<script>location.href='triviaForgotPasswordCaptcha.php'</script>");

?>

	</div>
</div>

</body>
</html>
