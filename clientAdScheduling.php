<?php require_once('dbConnect/uwagi.php');

session_start();
	if(!isset($_SESSION['username'])){
  		header("Location: http://www.uwagibox.com/nonClient.php");
		exit;
	}

####################
// SESSION VARIABLES
			$siteID = $_SESSION['siteID'];
####################

###################
// POSTED VARIABLES
			$_SESSION['timeZone'] = $_POST['timeZone'];
			$timeZone = $_SESSION['timeZone'];
###################		

//  Enter $timezone into db @ site.time_zone
			if (ISSET($timeZone)){
				$insert = mysql_query("UPDATE site SET time_zone = '$timeZone' WHERE siteID = '$siteID'")
					or die (mysql_error());
			}
############################################
			
			$h=0;
			while($h < 24){
					$i=0;
					$m=1;
					while($i < 7){
						if($m == 7){
							$m=0;
							$var = "s".$m.$h;
							${$var} = "";
							//echo ${$var};
							//break;
						}else{
							$var = "s".$m.$h;
							${$var} = "";
							//echo ${$var};
							
						}
					$m++;
					$i++;
					}
			
			$h++;
			}
			
			
			$result = mysql_query("select * from box_sched where siteID = '$siteID'") or die (mysql_error());
			while($row = mysql_fetch_array($result)){
			$day = $row['dow'];
			$hour = $row['hour'];
			$var = "s".$day.$hour;
			${$var} = "checked";
			//echo ${$var};
			//echo $day.$hour;
}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; cha  rset=utf-8" />
<title>Untitled Document</title>
<link href="http://www.uwagibox.com/main.css" rel="stylesheet" type="text/css" />
<style type="text/css"></style>

<script src="jquery/jquery/jquery-1.6.1.js"></script>

<script src="uniform/jquery.uniform.js" type="text/javascript"></script>
<link rel="stylesheet" href="uniform/uniform.default.css" type="text/css" media="screen" charset="utf-8" />

<script type='text/javascript'>
$(function(){ 
	$("select, input:checkbox, input:radio, input:file").uniform(); 
});
</script>

</head>
<body>

<?php
	$query = mysql_query("SELECT * FROM site WHERE siteID = '$siteID'")
		or die(mysql_error());
	$row = mysql_fetch_array($query);
	$tz = $row['time_zone'];
	
	
	if ($tz == NULL){
		?>
        <div id="contentDiv"> 
		<div id="adScheduleDiv">
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
                    	<form name="adSchedule" action="clientAdScheduling.php" method="post">
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
                        </form>
					</td>
				</tr>
			</table>
	</div>
    </div>
<?php
	}
	else{		
?>
  
  <!--  <div id="adHeaderDiv">

	</div>-->
    <div id="contentDiv"> 
    	<form name="adSchedule" action="clientAdSchedulingScript.php" method="post">
    
	<div id="scheduleDaysDiv"> 
		<img src="images/scheduleDays.gif" /> 
	</div>
    
	<div id="adScheduleDescDiv">
    	A <font color="#009900"><b>green</b></font> box indicates an ad <b>WILL</b> be played at that time on that day.  Clicking the box changes it to <font color="#FF0000"><b>red</b></font> & indicates an ad <b>WILL NOT</b> be played at that time.<br />
		<br />
		Once you've edited your schedule, submit the changes with the button at the bottom.<br />
		<br />
		It can take up to 24 hours for changes to your schedule to be reflected in your establishment.<br />
		<br />
        <br />
        <input type="submit" name="submit" value="Submit Changes" />
    </div>
    
    <div id="adScheduleDiv">
        <table cellpadding=0 cellspacing=0 border=0 bordercolor=#000000 width=295>
            <tr>
                <td width=134 align=right>12am Ad&nbsp;&nbsp;</td>
                <td width=23><input type=checkbox <?php echo $s10; ?> name="schedule[]" value="s10"></td>
                <td width=23><input type=checkbox <?php echo $s20; ?> name="schedule[]" value="s20"></td>
                <td width=23><input type=checkbox <?php echo $s30; ?> name="schedule[]" value="s30"></td>
                <td width=23><input type=checkbox <?php echo $s40; ?> name="schedule[]" value="s40"></td>
                <td width=23><input type=checkbox <?php echo $s50; ?> name="schedule[]" value="s50"></td>
                <td width=23><input type=checkbox <?php echo $s60; ?> name="schedule[]" value="s60"></td>
                <td width=23><input type=checkbox <?php echo $s00; ?> name="schedule[]" value="s00"></td>
            </tr>
            <tr>
                <td width=134 align=right>1am Ad&nbsp;&nbsp;</td>
                <td width=23><input type=checkbox <?php echo $s11; ?> name="schedule[]" value="s11"></td>
                <td width=23><input type=checkbox <?php echo $s21; ?> name="schedule[]" value="s21"></td>
                <td width=23><input type=checkbox <?php echo $s31; ?> name="schedule[]" value="s31"></td>
                <td width=23><input type=checkbox <?php echo $s41; ?> name="schedule[]" value="s41"></td>
                <td width=23><input type=checkbox <?php echo $s51; ?> name="schedule[]" value="s51"></td>
                <td width=23><input type=checkbox <?php echo $s61; ?> name="schedule[]" value="s61"></td>
                <td width=23><input type=checkbox <?php echo $s01; ?> name="schedule[]" value="s01"></td>
            </tr>
            <tr>
                <td width=134 align=right>2am Ad&nbsp;&nbsp;</td>
                <td width=23><input type=checkbox <?php echo $s12; ?> name="schedule[]" value="s12"></td>
                <td width=23><input type=checkbox <?php echo $s22; ?> name="schedule[]" value="s22"></td>
                <td width=23><input type=checkbox <?php echo $s32; ?> name="schedule[]" value="s32"></td>
                <td width=23><input type=checkbox <?php echo $s42; ?> name="schedule[]" value="s42"></td>
                <td width=23><input type=checkbox <?php echo $s52; ?> name="schedule[]" value="s52"></td>
                <td width=23><input type=checkbox <?php echo $s62; ?> name="schedule[]" value="s62"></td>
                <td width=23><input type=checkbox <?php echo $s02; ?> name="schedule[]" value="s02"></td>
            </tr>
            <tr>
                <td width=134 align=right>3am Ad&nbsp;&nbsp;</td>
                <td width=23><input type=checkbox <?php echo $s13; ?> name="schedule[]" value="s13"></td>
                <td width=23><input type=checkbox <?php echo $s23; ?> name="schedule[]" value="s23"></td>
                <td width=23><input type=checkbox <?php echo $s33; ?> name="schedule[]" value="s33"></td>
                <td width=23><input type=checkbox <?php echo $s43; ?> name="schedule[]" value="s43"></td>
                <td width=23><input type=checkbox <?php echo $s53; ?> name="schedule[]" value="s53"></td>
                <td width=23><input type=checkbox <?php echo $s63; ?> name="schedule[]" value="s63"></td>
                <td width=23><input type=checkbox <?php echo $s03; ?> name="schedule[]" value="s03"></td>
            </tr>
            <tr>
                <td width=134 align=right>4am Ad&nbsp;&nbsp;</td>
                <td width=23><input type=checkbox <?php echo $s14; ?> name="schedule[]" value="s14"></td>
                <td width=23><input type=checkbox <?php echo $s24; ?> name="schedule[]" value="s24"></td>
                <td width=23><input type=checkbox <?php echo $s34; ?> name="schedule[]" value="s34"></td>
                <td width=23><input type=checkbox <?php echo $s44; ?> name="schedule[]" value="s44"></td>
                <td width=23><input type=checkbox <?php echo $s54; ?> name="schedule[]" value="s54"></td>
                <td width=23><input type=checkbox <?php echo $s64; ?> name="schedule[]" value="s64"></td>
                <td width=23><input type=checkbox <?php echo $s04; ?> name="schedule[]" value="s04"></td>
            </tr>
            <tr>
                <td width=134 align=right>5am Ad&nbsp;&nbsp;</td>
                <td width=23><input type=checkbox <?php echo $s15; ?> name="schedule[]" value="s15"></td>
                <td width=23><input type=checkbox <?php echo $s25; ?> name="schedule[]" value="s25"></td>
                <td width=23><input type=checkbox <?php echo $s35; ?> name="schedule[]" value="s35"></td>
                <td width=23><input type=checkbox <?php echo $s45; ?> name="schedule[]" value="s45"></td>
                <td width=23><input type=checkbox <?php echo $s55; ?> name="schedule[]" value="s55"></td>
                <td width=23><input type=checkbox <?php echo $s65; ?> name="schedule[]" value="s65"></td>
                <td width=23><input type=checkbox <?php echo $s05; ?> name="schedule[]" value="s05"></td>
            </tr>
            <tr>
                <td width=134 align=right>6am Ad&nbsp;&nbsp;</td>
                <td width=23><input type=checkbox <?php echo $s16; ?> name="schedule[]" value="s16"></td>
                <td width=23><input type=checkbox <?php echo $s26; ?> name="schedule[]" value="s26"></td>
                <td width=23><input type=checkbox <?php echo $s36; ?> name="schedule[]" value="s36"></td>
                <td width=23><input type=checkbox <?php echo $s46; ?> name="schedule[]" value="s46"></td>
                <td width=23><input type=checkbox <?php echo $s56; ?> name="schedule[]" value="s56"></td>
                <td width=23><input type=checkbox <?php echo $s66; ?> name="schedule[]" value="s66"></td>
                <td width=23><input type=checkbox <?php echo $s06; ?> name="schedule[]" value="s06"></td>
            </tr>
            <tr>
                <td width=134 align=right>7am Ad&nbsp;&nbsp;</td>
                <td width=23><input type=checkbox <?php echo $s17; ?> name="schedule[]" value="s17"></td>
                <td width=23><input type=checkbox <?php echo $s27; ?> name="schedule[]" value="s27"></td>
                <td width=23><input type=checkbox <?php echo $s37; ?> name="schedule[]" value="s37"></td>
                <td width=23><input type=checkbox <?php echo $s47; ?> name="schedule[]" value="s47"></td>
                <td width=23><input type=checkbox <?php echo $s57; ?> name="schedule[]" value="s57"></td>
                <td width=23><input type=checkbox <?php echo $s67; ?> name="schedule[]" value="s67"></td>
                <td width=23><input type=checkbox <?php echo $s07; ?> name="schedule[]" value="s07"></td>
            </tr>
            <tr>
              <td width=134 align=right>8am Ad&nbsp;&nbsp;</td>
              <td width=23><input type=checkbox <?php echo $s18; ?> name="schedule[]" value="s18"></td>
              <td width=23><input type=checkbox <?php echo $s28; ?> name="schedule[]" value="s28"></td>
              <td width=23><input type=checkbox <?php echo $s38; ?> name="schedule[]" value="s38"></td>
              <td width=23><input type=checkbox <?php echo $s48; ?> name="schedule[]" value="s48"></td>
              <td width=23><input type=checkbox <?php echo $s58; ?> name="schedule[]" value="s58"></td>
              <td width=23><input type=checkbox <?php echo $s68; ?> name="schedule[]" value="s68"></td>
              <td width=23><input type=checkbox <?php echo $s08; ?> name="schedule[]" value="s08"></td>
            </tr>
            <tr>
              <td width=134 align=right>9am Ad&nbsp;&nbsp;</td>
              <td width=23><input type=checkbox <?php echo $s19; ?> name="schedule[]" value="s19"></td>

              <td width=23><input type=checkbox <?php echo $s29; ?> name="schedule[]" value="s29"></td>
              <td width=23><input type=checkbox <?php echo $s39; ?> name="schedule[]" value="s39"></td>
              <td width=23><input type=checkbox <?php echo $s49; ?> name="schedule[]" value="s49"></td>
              <td width=23><input type=checkbox <?php echo $s59; ?> name="schedule[]" value="s59"></td>
              <td width=23><input type=checkbox <?php echo $s69; ?> name="schedule[]" value="s69"></td>
              <td width=23><input type=checkbox <?php echo $s09; ?> name="schedule[]" value="s09"></td>
            </tr>
            <tr>
              <td width=134 align=right>10am Ad&nbsp;&nbsp;</td>
              <td width=23><input type=checkbox <?php echo $s110; ?> name="schedule[]" value="s110"></td>
              <td width=23><input type=checkbox <?php echo $s210; ?> name="schedule[]" value="s210"></td>
              <td width=23><input type=checkbox <?php echo $s310; ?> name="schedule[]" value="s310"></td>
              <td width=23><input type=checkbox <?php echo $s410; ?> name="schedule[]" value="s410"></td>
              <td width=23><input type=checkbox <?php echo $s510; ?> name="schedule[]" value="s510"></td>
              <td width=23><input type=checkbox <?php echo $s610; ?> name="schedule[]" value="s610"></td>
              <td width=23><input type=checkbox <?php echo $s010; ?> name="schedule[]" value="s010"></td>
            </tr>
            <tr>
              <td width=134 align=right>11am Ad&nbsp;&nbsp;</td>
              <td width=23><input type=checkbox <?php echo $s111; ?> name="schedule[]" value="s111"></td>
              <td width=23><input type=checkbox <?php echo $s211; ?> name="schedule[]" value="s211"></td>
              <td width=23><input type=checkbox <?php echo $s311; ?> name="schedule[]" value="s311"></td>
              <td width=23><input type=checkbox <?php echo $s411; ?> name="schedule[]" value="s411"></td>
              <td width=23><input type=checkbox <?php echo $s511; ?> name="schedule[]" value="s511"></td>
              <td width=23><input type=checkbox <?php echo $s611; ?> name="schedule[]" value="s611"></td>
              <td width=23><input type=checkbox <?php echo $s011; ?> name="schedule[]" value="s011"></td>
            </tr>
            <tr>
              <td width=134 align=right>12pm Ad&nbsp;&nbsp;</td>
              <td width=23><input type=checkbox <?php echo $s112; ?> name="schedule[]" value="s112"></td>
              <td width=23><input type=checkbox <?php echo $s212; ?> name="schedule[]" value="s212"></td>
              <td width=23><input type=checkbox <?php echo $s312; ?> name="schedule[]" value="s312"></td>
              <td width=23><input type=checkbox <?php echo $s412; ?> name="schedule[]" value="s412"></td>
              <td width=23><input type=checkbox <?php echo $s512; ?> name="schedule[]" value="s512"></td>
              <td width=23><input type=checkbox <?php echo $s612; ?> name="schedule[]" value="s612"></td>
              <td width=23><input type=checkbox <?php echo $s012; ?> name="schedule[]" value="s012"></td>
            </tr>
            <tr>
              <td width=134 align=right>1pm Ad&nbsp;&nbsp;</td>
              <td width=23><input type=checkbox <?php echo $s113; ?> name="schedule[]" value="s113"></td>
              <td width=23><input type=checkbox <?php echo $s213; ?> name="schedule[]" value="s213"></td>
              <td width=23><input type=checkbox <?php echo $s313; ?> name="schedule[]" value="s313"></td>
              <td width=23><input type=checkbox <?php echo $s413; ?> name="schedule[]" value="s413"></td>
              <td width=23><input type=checkbox <?php echo $s513; ?> name="schedule[]" value="s513"></td>
              <td width=23><input type=checkbox <?php echo $s613; ?> name="schedule[]" value="s613"></td>
              <td width=23><input type=checkbox <?php echo $s013; ?> name="schedule[]" value="s013"></td>
            </tr>
            <tr>
              <td width=134 align=right>2pm Ad&nbsp;&nbsp;</td>
              <td width=23><input type=checkbox <?php echo $s114; ?> name="schedule[]" value="s114"></td>
              <td width=23><input type=checkbox <?php echo $s214; ?> name="schedule[]" value="s214"></td>
              <td width=23><input type=checkbox <?php echo $s314; ?> name="schedule[]" value="s314"></td>
              <td width=23><input type=checkbox <?php echo $s414; ?> name="schedule[]" value="s414"></td>
              <td width=23><input type=checkbox <?php echo $s514; ?> name="schedule[]" value="s514"></td>
              <td width=23><input type=checkbox <?php echo $s614; ?> name="schedule[]" value="s614"></td>
              <td width=23><input type=checkbox <?php echo $s014; ?> name="schedule[]" value="s014"></td>
            </tr>
            <tr>
              <td width=134 align=right>3pm Ad&nbsp;&nbsp;</td>
              <td width=23><input type=checkbox <?php echo $s115; ?> name="schedule[]" value="s115"></td>
              <td width=23><input type=checkbox <?php echo $s215; ?> name="schedule[]" value="s215"></td>
              <td width=23><input type=checkbox <?php echo $s315; ?> name="schedule[]" value="s315"></td>
              <td width=23><input type=checkbox <?php echo $s415; ?> name="schedule[]" value="s415"></td>
              <td width=23><input type=checkbox <?php echo $s515; ?> name="schedule[]" value="s515"></td>
              <td width=23><input type=checkbox <?php echo $s615; ?> name="schedule[]" value="s615"></td>
              <td width=23><input type=checkbox <?php echo $s015; ?> name="schedule[]" value="s015"></td>
            </tr>
            <tr>
              <td width=134 align=right>4pm Ad&nbsp;&nbsp;</td>
              <td width=23><input type=checkbox <?php echo $s116; ?> name="schedule[]" value="s116"></td>
              <td width=23><input type=checkbox <?php echo $s216; ?> name="schedule[]" value="s216"></td>
              <td width=23><input type=checkbox <?php echo $s316; ?> name="schedule[]" value="s316"></td>
              <td width=23><input type=checkbox <?php echo $s416; ?> name="schedule[]" value="s416"></td>
              <td width=23><input type=checkbox <?php echo $s516; ?> name="schedule[]" value="s516"></td>
              <td width=23><input type=checkbox <?php echo $s616; ?> name="schedule[]" value="s616"></td>
              <td width=23><input type=checkbox <?php echo $s016; ?> name="schedule[]" value="s016"></td>
            </tr>
            <tr>
              <td width=134 align=right>5pm Ad&nbsp;&nbsp;</td>
              <td width=23><input type=checkbox <?php echo $s117; ?> name="schedule[]" value="s117"></td>
              <td width=23><input type=checkbox <?php echo $s217; ?> name="schedule[]" value="s217"></td>
              <td width=23><input type=checkbox <?php echo $s317; ?> name="schedule[]" value="s317"></td>
              <td width=23><input type=checkbox <?php echo $s417; ?> name="schedule[]" value="s417"></td>
              <td width=23><input type=checkbox <?php echo $s517; ?> name="schedule[]" value="s517"></td>
              <td width=23><input type=checkbox <?php echo $s617; ?> name="schedule[]" value="s617"></td>
              <td width=23><input type=checkbox <?php echo $s017; ?> name="schedule[]" value="s017"></td>
            </tr>
            <tr>
              <td width=134 align=right>6pm Ad&nbsp;&nbsp;</td>
              <td width=23><input type=checkbox <?php echo $s118; ?> name="schedule[]" value="s118"></td>
              <td width=23><input type=checkbox <?php echo $s218; ?> name="schedule[]" value="s218"></td>
              <td width=23><input type=checkbox <?php echo $s318; ?> name="schedule[]" value="s318"></td>
              <td width=23><input type=checkbox <?php echo $s418; ?> name="schedule[]" value="s418"></td>
              <td width=23><input type=checkbox <?php echo $s518; ?> name="schedule[]" value="s518"></td>
              <td width=23><input type=checkbox <?php echo $s618; ?> name="schedule[]" value="s618"></td>
              <td width=23><input type=checkbox <?php echo $s018; ?> name="schedule[]" value="s018"></td>
            </tr>
            <tr>
              <td width=134 align=right>7pm Ad&nbsp;&nbsp;</td>
              <td width=23><input type=checkbox <?php echo $s119; ?> name="schedule[]" value="s119"></td>
              <td width=23><input type=checkbox <?php echo $s219; ?> name="schedule[]" value="s219"></td>
              <td width=23><input type=checkbox <?php echo $s319; ?> name="schedule[]" value="s319"></td>
              <td width=23><input type=checkbox <?php echo $s419; ?> name="schedule[]" value="s419"></td>
              <td width=23><input type=checkbox <?php echo $s519; ?> name="schedule[]" value="s519"></td>
              <td width=23><input type=checkbox <?php echo $s619; ?> name="schedule[]" value="s619"></td>
              <td width=23><input type=checkbox <?php echo $s019; ?> name="schedule[]" value="s019"></td>
            </tr>
            <tr>
              <td width=134 align=right>8pm Ad&nbsp;&nbsp;</td>
              <td width=23><input type=checkbox <?php echo $s120; ?> name="schedule[]" value="s120"></td>
              <td width=23><input type=checkbox <?php echo $s220; ?> name="schedule[]" value="s220"></td>
              <td width=23><input type=checkbox <?php echo $s320; ?> name="schedule[]" value="s320"></td>
              <td width=23><input type=checkbox <?php echo $s420; ?> name="schedule[]" value="s420"></td>
              <td width=23><input type=checkbox <?php echo $s520; ?> name="schedule[]" value="s520"></td>
              <td width=23><input type=checkbox <?php echo $s620; ?> name="schedule[]" value="s620"></td>
              <td width=23><input type=checkbox <?php echo $s020; ?> name="schedule[]" value="s020"></td>
            </tr>
            <tr>
              <td width=134 align=right>9pm Ad&nbsp;&nbsp;</td>
              <td width=23><input type=checkbox <?php echo $s121; ?> name="schedule[]" value="s121"></td>
              <td width=23><input type=checkbox <?php echo $s221; ?> name="schedule[]" value="s221"></td>
              <td width=23><input type=checkbox <?php echo $s321; ?> name="schedule[]" value="s321"></td>
              <td width=23><input type=checkbox <?php echo $s421; ?> name="schedule[]" value="s421"></td>
              <td width=23><input type=checkbox <?php echo $s521; ?> name="schedule[]" value="s521"></td>
              <td width=23><input type=checkbox <?php echo $s621; ?> name="schedule[]" value="s621"></td>
              <td width=23><input type=checkbox <?php echo $s021; ?> name="schedule[]" value="s021"></td>
            </tr>
            <tr>
              <td width=134 align=right>10pm Ad&nbsp;&nbsp;</td>
              <td width=23><input type=checkbox <?php echo $s122; ?> name="schedule[]" value="s122"></td>
              <td width=23><input type=checkbox <?php echo $s222; ?> name="schedule[]" value="s222"></td>
              <td width=23><input type=checkbox <?php echo $s322; ?> name="schedule[]" value="s322"></td>
              <td width=23><input type=checkbox <?php echo $s422; ?> name="schedule[]" value="s422"></td>
              <td width=23><input type=checkbox <?php echo $s522; ?> name="schedule[]" value="s522"></td>
              <td width=23><input type=checkbox <?php echo $s622; ?> name="schedule[]" value="s622"></td>
              <td width=23><input type=checkbox <?php echo $s022; ?> name="schedule[]" value="s022"></td>
            </tr>
            <tr>
              <td width=134 align=right>11pm Ad&nbsp;&nbsp;</td>
              <td width=23><input type=checkbox <?php echo $s123; ?> name="schedule[]" value="s123"></td>
              <td width=23><input type=checkbox <?php echo $s223; ?> name="schedule[]" value="s223"></td>
              <td width=23><input type=checkbox <?php echo $s323; ?> name="schedule[]" value="s323"></td>
              <td width=23><input type=checkbox <?php echo $s423; ?> name="schedule[]" value="s423"></td>
              <td width=23><input type=checkbox <?php echo $s523; ?> name="schedule[]" value="s523"></td>
              <td width=23><input type=checkbox <?php echo $s623; ?> name="schedule[]" value="s623"></td>
              <td width=23><input type=checkbox <?php echo $s023; ?> name="schedule[]" value="s023"></td>
            </tr>
            <tr>
            	<td width=134></td>
                <td colspan=7 align=left>
                	<br />
                </td>
			</tr>
          </table>
      </div>
      	</form>
      </div>
<?php
	}
?>

</body>
</html>