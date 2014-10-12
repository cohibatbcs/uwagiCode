<?php require_once('dbConnect/uwagi.php'); ?>
<?php
session_start();
	if(!isset($_SESSION['username'])){
  		header("Location: nonClient.php");
		exit;
	}
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
			

//			$siteID = $_SESSION['siteID'];
			$siteID = "00004";
			
			$result = mysql_query("SELECT * FROM site WHERE siteID = '$siteID'")
				or die(mysql_error());
				
			$num_rows = mysql_num_rows($result);
				
			if ($num_rows > 0) {		
				while($row = mysql_fetch_array($result)){
					$siteName = $row['site_name'];
					$phone = $row['site_phone'];
					$email = $_SESSION['username'];					
					$address = $row['site_address'];
					$city = $row['site_city'];
					$state = $row['site_state'];
					$zip = $row['site_zip'];
				}
			}
			else {
				echo "ERROR";
			}
			?>

	<div id="contentDiv">
 
	  <div id="adHeaderDiv">
				<?php
				echo "You are logged in as <b>$_SESSION[username]</b>&nbsp;&nbsp;&nbsp;<a href=logout.php>Click Here to Log Out</a><br>";
				echo "<br>";
				print "<font size=+2 color=#333333><b>Order Marketing Materials</b></font>";
				?>
    		</div> 
            
			<div id=triviaBody>
            	Is your window cling starting to fade?<br />
                Did someone spill a beer on a Uwagi poster?<br />
				Could your bar use some more Uwagi stickers?<br />
                If you need extra or replacement marketing material, order here.<br />
                <br />
				<b>Specify the items you need to order:</b>
				<form name="orderMaterials" method="post" action="processOrder.php">
                	<input type="checkbox" name="order[]" value="BarCoasters" />Bar Coasters<br />
                    <input type="checkbox" name="order[]" value="TableTentInserts" />Table Tent Inserts<br />
                    <input type="checkbox" name="order[]" value="6inWindowCling" />6" Window Cling<br />
                    <input type="checkbox" name="order[]" value="Mirror_UrinalStickers" />Mirror/Urinal Stickers<br />
                    <input type="checkbox" name="order[]" value="10x14HangingPoster" />10"x14" Hanging Poster<br />
                    <input type="checkbox" name="order[]" value="11x17Poster" />11"x17" Poster<br />
                    <input type="checkbox" name="order[]" value="24x36Poster" />24"x36" Poster<br />
                    <input type="hidden" name="info[]" value="<?php echo $siteName; ?>" checked="checked"/>
                    <input type="hidden" name="info[]" value="<?php echo $phone; ?>" checked="checked"/>
					<input type="hidden" name="info[]" value="<?php echo $email; ?>" checked="checked"/>
					<input type="hidden" name="info[]" value="<?php echo $address; ?>" checked="checked"/>
					<input type="hidden" name="info[]" value="<?php echo $city; ?>" checked="checked"/>
					<input type="hidden" name="info[]" value="<?php echo $state; ?>" checked="checked"/>
					<input type="hidden" name="info[]" value="<?php echo $zip; ?>" checked="checked"/><br />
					<input type="submit"> </form>
				</form>
                <br />
                Tell us what you think about our current marketing material:  
                	<a href="mailto:cyoung@uwagibox.com">cyoung@uwagibox.com</a>
                
			</div>

 
	</div>

</body>
</html>