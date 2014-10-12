<?php require_once('dbConnect/uwagi.php'); ?>
<?php
session_start();
	if(!isset($_SESSION['username'])){
  		header("Location: http://www.uwagibox.com/nonClient.php");
		exit;
	}
	
// SESSION VARIABLES
			
			$siteID = $_SESSION['siteID']

	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; cha  rset=utf-8" />
<title>Untitled Document</title>
<link href="http://www.uwagibox.com/main.css" rel="stylesheet" type="text/css" />
<style type="text/css">
</style>

<!--<script src="jquery/jquery/jquery-1.6.1.js"></script>

<script src="uniform/jquery.uniform.js" type="text/javascript"></script>
<link rel="stylesheet" href="uniform/uniform.default.css" type="text/css" media="screen" charset="utf-8" />

<script type='text/javascript'>
  $(function(){
    $("select, input:checkbox, input:radio, input:file").uniform({});
  });
</script>-->

</head>
<body>

<div id="contentDiv">

	<div id="adHeaderDiv">

	</div>

	<div id="adScheduleDiv">

		<form name="adSchedule" action="clientAdScheduling.php" method="post">

			<table cellpadding="0" cellspacing="0" border="0" bordercolor="#000000" width="295">
				<tr>
					<td width="295" align="right">
						Before You can schedule, please choose your Time Zone.
					</td>
				</tr>
				<tr>
					<td width="134" align="right">
						<br />
					</td>
				</tr>
				<tr>
					<td width="134" align="right">
						<select name="timeZone">
						<option value="1">Eastern</option>
						<option value="0">Central</option>
						<option value="-1">Mountain</option>
						<option value="-2">Pacific</option>
                        <option value="-3">Alaska</option>
                        <option value="-5">Hawaii</option>
						</select>
					</td>
				</tr>
				<tr>
					<td width="134" align="right">
						<input type="submit" name="Submit" value="Submit Time Zone" />
					</td>
				</tr>
			</table>
		</form>

	</div>

</div>
</body>
</html>