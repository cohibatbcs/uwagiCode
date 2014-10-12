<?php require_once('dbConnect/uwagi.php'); ?>

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
	<div id=locationsBody>
<?php

$zip = $_POST['zip'];
$zip = substr($zip,0,-2);

if ($zip == "") {
    		print "Enter your ZIP code for Uwagi establishments near you!<br />";
			print "<form name=locations method=post action=locations.php>";
				print "ZIP code:<input type=number name=zip size=5 /><br />";
				print "<input type=submit name=Submit value=Submit />";
			print "</form>"; 
}
else {
	$result = mysql_query("SELECT * FROM site WHERE site_zip LIKE '$zip%' ORDER BY site_name")
		or die(mysql_error());
		
		$num_rows = mysql_num_rows($result);
				
		if ($num_rows == "") {
			print "There were no matches in your area!";
			$zip = NULL;
		}
		else {
			while ($row=mysql_fetch_assoc($result)) {
				echo "<b><font size=+1>";
				echo $row['site_name'];
				echo "</b></font>";
				echo "<br>";
				echo $row['site_address'];
				echo "<br>";
				echo $row['site_city'];
				echo ", ";
				echo $row['site_state'];
				echo "  ";
				echo $row['site_zip'];
				echo "<br>";
				echo "<br>";
			}
		}
}
?>

	</div>
</div>
</body>
</html>