<?php
session_start();

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
<title>Untitled Document</title>
   	<link href="main.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
    </style>
</head>

<body>

<div id=contentDiv>

	<div id=triviaBody>


<?php
	$con = mysql_connect("t4at3.db.6859454.hostedresource.com","t4at3","M1lli0n5");
			if (!$con){
				die('Could not connect: ' . mysql_error());
			}
			mysql_select_db("t4at3", $con);

	$sql="INSERT INTO preference_match (questionID, userID, answer) VALUES ('$_POST[questionID]','$userID', '$_POST[answer]')";

	if (!mysql_query($sql,$con))
		{
		die('Error: ' . mysql_error());
	}
	
	print "<br>";		
	print "Your information has been submitted."; 
	print "<br>";
	print "<a href=triviaEdit.php>Answer another question for more points.</a><br>";
	print "<br>";
//	print "<a href=home.php>Return to Main Page</a>";
print ("<script>location.href='triviaEdit.php'</script>");
	

//	header("location:clientLogin.php");
?>

	</div>
</div>
</body>
</html>