<?php
session_start();
//create a database connection
$hostname="64.244.63.169";
$username="uwagi";
$password="Uwagiman";
$dbname="uwagi";


$poco = mysql_connect($hostname,$username, $password) 
	or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
mysql_select_db($dbname);
#################################################################################################

	//SESSION Variables
//	$username = $_SESSION["username"];
//	$siteID = $_SESSION["siteID"];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Uwagi</title>
<link href="http://www.uwagibox.com/main.css" rel="stylesheet" type="text/css" />


 <script type="text/javascript" src="jquery/jquery/jquery-1.6.1.js">
 
 $(document).ready(function() {

	$("#desc img[title]").tooltip();

});
 
 </script> 

<style type="text/css">
#appLayoutDiv {
	position:absolute;
	left:11px;
	top:96px;
	width:215px;
	height:180px;
	overflow: auto;
	font-size:10px;
	text-align:left
}
</style>
</head>
<body background="images/appBG.gif" style="background-repeat:no-repeat">

<?php

	$appID = $_GET['appID'];
	
	$result = mysql_query("SELECT d.field_description_value as description, o.field_offer_details_value as offer, e.field_expiry_length_value as length FROM `uwagi`.`field_revision_field_description` d JOIN `uwagi`.`field_revision_field_offer_details` o on d.entity_id = o.entity_id JOIN `uwagi`.`field_revision_field_expiry_length` e on d.entity_id = e.entity_id WHERE d.entity_id = '3774'")
		or die (mysql_error());
	$row = mysql_fetch_array($result);
	
	$description= $row['description'];
	$offer= $row['offer'];
	$length= $row['length'];
	
	mysql_close($poco);

?>


    <div id="appLayoutDiv">
    		<b style="color:white">(This is your offer)</b><br />
    			<center><?php print $offer; ?></center>
        	<b style="color:white">(End Offer)</b>
            <br />
        	<br />
       		<b style="color:white">(Length of Offer in hours)</b><br />
        		<center><b><?php print $length; ?></b></center>
			<b style="color:white">(End Offer Length)</b>
    </div>


</body>
</html>