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
<style type="text/css">
</style>
</head>
<body>

<?php

	$code = $_POST['promoCode'];
	
	$verify = mysql_query("SELECT * FROM promo_codes WHERE code = '$code'")
		or die(mysql_error());
	$row = mysql_fetch_array($verify);
	$url = $row['url'];
	
	if ($url != NULL){
		print ("<script>location.href='$url'</script>");
	}
	else{
		print "<div id=contentDiv>";
			print "<div id=triviaBody>";
				echo "Sorry, we didn't recognize that code.<br>";
				echo "<a href=signUp99.php>Try Again.</a><br>";
			print "</div>";
		print "</div>";
	}

?>
</body>
</html>