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

	<div id="adHeaderDiv">

    </div>
    
	<div id="triviaBody">
		You'll be able to use this space to add information to your Uwagi Trivia acocunt & earn extra Uwagi points.  Look for it to be up soon.<br />
	</div>
</div>