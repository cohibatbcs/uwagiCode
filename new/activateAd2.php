<?php require_once('dbConnect/uwagi.php'); ?>
<?php
session_start(); //Start sessions
	if(!isset($_SESSION['username'])){
  		header("Location: nonClient.php");
		exit;
	}

$adID = $_GET['adID'];

$result = mysql_query("UPDATE site_ads SET ad_num=2 WHERE adID = '$adID'") 
or die(mysql_error());
header("location:manageAds.php");
?>