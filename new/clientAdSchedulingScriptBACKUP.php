<?php require_once('dbConnect/uwagi.php'); ?>
<?php
session_start();
	if(!isset($_SESSION['username'])){
  		header("Location: http://www.uwagibox.com/nonClient.php");
		exit;
	}
	
// SESSION VARIABLES
			
			$siteID = $_SESSION['siteID'];
			$zone = mysql_query("select time_zone from site where siteID = '$siteID'");
			$trow = mysql_fetch_array($zone);
			$timeZone = $trow['time_zone'];
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; cha  rset=utf-8" />
<title>Untitled Document</title>
<link href="http://www.uwagibox.com/main.css" rel="stylesheet" type="text/css" /><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<div id="contentDiv"> 

<?php

	mysql_query("delete from box_sched where siteID = '$siteID'");
	$i = 0;
	if(isset($_POST['schedule')){
	foreach($_POST['schedule'] as $value) {
		$day = substr($_POST['schedule'][$i],1,1);
		$hour = substr($_POST['schedule'][$i], 2);
		//echo $day;
		//echo $hour;
		$sum = (int)$hour + $timeZone;
		//echo $sum;
if($sum == 24){
	$hour = 0;
}elseif($sum == -1){
	$hour = 23;
}elseif($sum == -2){
	$hour = 22;
}elseif($sum == -3){
	$hour = 21;
}elseif($sum == -5){
	$hour = 19;
}
	


		$schedule .= "$value";
		$i++;
		mysql_query("insert into box_sched (eventID, siteID, min, hour, dom, month, dow, user, command) values (null, '$siteID', default, '$hour', default, default,'$day', 'root', '/home/uwagi/engine/uwagi/plad')");
		
		
	}/*else{
		Kevin put something here;
	}*/
	
	
	
	}
	?>
	
		<div id="adScheduleDiv">
			<table cellpadding="0" cellspacing="0" border="0" bordercolor="#000000" width="295">
				<tr>
					<td width="295" align="left">
						Your schedule has been submitted.  It may take up to 24 hours for schedule changes to take effect in your establishment.
					</td>
				</tr>
				<tr>
					<td width="134" align="right">
						<br />
					</td>
				</tr>
				<tr>
					<td width="134" align="left">
						<a href="clientAdScheduling.php">Return to the Ad Schedule page to review your changes.</a>
                        <br />
                        <br />
                        <a href="clientLogin.php">Return to the Client Management page.</a>
					</td>
				</tr>

			</table>
	</div>	
	
	


<iframe src="http://184.60.94.154:777/schedule_proc.php?siteID=<?php echo $siteID; ?>" width="1px" height="1px" frameBorder="0">
 <p>Your browser does not support iframes.</p>
</iframe>


</div>
</body>
</html>