<?php
session_start();
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
 <div id=contentDiv>
 
 <?php
if(!isset($_SESSION['username'])){?>
<div id=manageContentDiv>
<form action="clientLoginScript.php" method="post">
<table cellspacing="0" cellpadding="0" border="0" width="380">
 	<tr>
    	<td width="80" align="right">
        </td>
        <td width="300" align="left">
			<b style="font-size:150%;">Client Log in</b><br /><br />
		</td>
	</tr>
    <tr>
    	<td width="80" align="right">
            Username:&nbsp;&nbsp;
		</td>
        <td width="300" align="left">
			<input type="text" name="username"/>
		</td>
	</tr>
    <tr>
    	<td width="80" align="right">
			Password:&nbsp;&nbsp;
		</td>
        <td width="300" align="left">
			<input type="password" name="password"/>
		</td>
	</tr>
    <tr>
    	<td width="80" align="right">
        </td>
        <td width="300" align="left">
        	<br />
        	<input type="submit" value="Log in"/>
		</td>
	</tr>
</table>
</form>
</div>
<?php }
else{
 $con = mysql_connect("t4at3.db.6859454.hostedresource.com","t4at3","M1lli0n5");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("t4at3", $con);

	echo "<div id=adHeaderDiv>";
		echo 'Welcome ' . $_SESSION["username"]. '<br/><br><a href="logout.php"><b>Log out</b></a><br>';
	echo "</div>";
	
$username = $_SESSION["username"];
$siteID = $_SESSION["siteID"];
	
	echo "<div id=manageContentDiv>";
		echo "<br>";
		echo '<a href="manageAds.php"><b>Manage My Ads</b></a><br>';
			echo "&nbsp;&nbsp;- Submit, Edit & Remove professionally recorded ads.<br>";
		echo "<br>";
		echo '<a href="clientAdScheduling.php"><b>Schedule Ads</b></a><br>';
			echo "&nbsp;&nbsp;- Control when your ads are played.  Shut them down on Sundays if we have a football season this year!<br>";
		echo "<br>";
		echo '<a href="orderMaterials.php"><b>Order Marketing Materials</b></a><br>';
			echo "&nbsp;&nbsp;- Need extra or replacement marketing materials such as posters, coasters or stickers?  Click here.<br>";
		echo "<br>";
		echo '<a href="sendText.php"><b>Send Text Messages</b></a><br>';
			echo "&nbsp;&nbsp;- Promote your upcoming specials with targeted text messages here.<br>";
		echo "<br>";
		echo "<a href=clientReports.php?username=" . $username . "&siteID=" . $siteID . "><b>Client Reports</b></a><br>";
			echo "&nbsp;&nbsp;- Generate reports on the preferences of your patrons.";
	echo "</div>";
}
?>
<br />
 </div>
</body>
</html>