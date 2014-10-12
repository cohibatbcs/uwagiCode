<?php require_once('dbConnect/uwagi.php'); ?>
<?php
session_start();
	if(!isset($_SESSION['username'])){
  		header("Location: nonClient.php");
		exit;
	}
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

<div id=contentDiv>

	<div id=adHeaderDiv>
		<?php
			echo "You are logged in as <b>$_SESSION[username]</b>&nbsp;&nbsp;&nbsp;<a href=logout.php>Click Here to Log Out</a><br>";
			echo "<br>";
			print "<font size=+2 color=#333333><b>Text Message Sent</b></font>";
		?>
    </div>
	
    <div id=aboutUsBody>
    	Your message was successfully sent.<br />
        <br />
        <a href="clientLogin.php">Return to the Client Page.</a>
	</div>
    
</div>
    
</body>
</html>