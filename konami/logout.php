<?php
session_start();
session_destroy(); //Delete session
//header("location:home.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="main.css" rel="stylesheet" type="text/css" />
<style type="text/css"></style>
</head>
<body>

<div id="contentDiv">
	<div id="triviaBody">
    
    You have been logged out.<br />
	<a href="home.php">Return to the home page.</a>
    
    </div>
</div>
</body>
</html>