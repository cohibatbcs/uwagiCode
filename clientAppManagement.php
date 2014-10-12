<?php
session_start();
require_once('dbConnect/uwagi.php');

	//SESSION Variables
	$username = $_SESSION["username"];
	$siteID = $_SESSION["siteID"];
	$appID = $_SESSION['appID']
//	$appID = '108';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Uwagi</title>
<link href="main.css" rel="stylesheet" type="text/css" />
<style type="text/css"></style>

<script language="javascript">
<!--//
function myPopup(url,windowname,w,h,x,y){
window.open(url,windowname,"resizable=no,toolbar=no,scrollbars=yes,menubar=no,status=no,directories=no,width="+w+",height="+h+",left="+x+",top="+y+"");
}
//-->
</script>

 <script type="text/javascript" src="jquery/jquery/jquery-1.6.1.js">
 
 $(document).ready(function() {

	$("#desc img[title]").tooltip();

});
 
 </script> 


</head>
<body> 


	<div id=contentDiv>

		<div id=adHeaderDiv>
        <?php
		print "You are logged in as <b>" . $username . "</b>&nbsp;&nbsp;&nbsp;<a href=logout.php>Click Here to Log Out</a><br>";
		print "<br>";
		print "<font size=+2 color=#333333><b>App Management</b></font>";
		?>
    	</div>

		<div id=triviaBody>
            <!-- Inside the parenthesis the order goes URL, window name, width, height, position from left, position from top-->
            <!-- Note that by giving each popup window a different name each page will open in a seperate popup window-->
            <a href="javascript:myPopup('http://184.60.94.154/clientAppManagementOffer.php?appID=<?php print $appID; ?>', 'Offer','230','330','200','200')">View your <b>Current Offer</b></a><a href="#"> <img src="images/question.gif" id="offer" title='This is the "Special Offer" you would like to extend to your customers. For example you might offer a "Buy One, Get One Free Drink", or "Buy One Burger, Get One Free".' width="18" height="18" /></a><a href="javascript:myPopup('http://184.60.94.154/clientAppManagementDesc.php?appID=<?php print $appID; ?>', 'Description','230','330','200','200')"> & <b>Description</b>.</a> <a href="#"><img src="images/question.gif" id="desc" title="Enter any information about your business that you would like potential customers to see. For example, you may want to let people know what your establishment is famous for, or what your business hours are.  It's really up to you to be creative here so you can draw new customers in to your establishment." width="18" height="18" /></a>
			<br />
            <br />
            <a href="clientAppManagementChanges.php">Change your ad settings.</a>
		</div>

	</div>

</body>
</html>