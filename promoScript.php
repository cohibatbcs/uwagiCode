<?php
	session_start(); //Start sessions
	require_once('dbConnect/uwagi.php'); 
	
	$codeSent = $_POST['promoCode']; 
	
	$result = mysql_query( "SELECT * FROM promo_codes WHERE code = '$promoCode'")
		or die(mysql_error());

	$row = mysql_fetch_array($result);
	$code = $row['code'];
	$url = $row['url'];
	
	if ($codeSent == $code){
		print ("<script>location.href='" . $url . "'</script>");
	}
	else{
		print "Sorry, we did not find any Promo Codes in our records that matched your entry.<br><br>";
		print "Would you like to <a href=signUp.php>Try Again</a>?<br><br>";
		print "<a href=home.php>Return to Main Page.</a>";
	}
		


?>