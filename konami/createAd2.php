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
	<title>Untitled Document</title>
   	<link href="main.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
    </style>
    
	<script type="text/javascript">
		var count = "75";
		function limiter(){
		var tex = document.createAd.adtext.value;
		var len = tex.length;
		if(len > count){
   	    tex = tex.substring(0,count);
   			document.createAd.adtext.value =tex;
    		return false;
		}
		document.createAd.limit.value = count-len;
		}
	</script>

</head>

<body>

<?php
			
	$siteID = $_SESSION[siteID];
	$email = $_SESSION[username];

?>

	<div id="contentDiv">


    	<div id="adHeaderDiv">
		<?php
			echo "You are logged in as <b>$_SESSION[username]</b>&nbsp;&nbsp;&nbsp;<a href=logout.php>Click Here to Log Out</a><br>";
			echo "<br>";
			print "<font size=+2 color=#333333><b>Your Currently Enabled Ads</b></font>";
		?>
    </div>

	<div id=createAdDiv>

		<div id=adTextDiv>
			<form name=createAd ACTION="insertAd.php" METHOD=POST>
			<textarea name=adtext wrap=physical rows=4 cols=45 onkeyup=limiter()></textarea><br>
			<input type=hidden name=siteID value="<?php echo $siteID; ?>"/>
			<input type=hidden name=site_email value="<?php echo $email; ?>"/>
			<input type=hidden name=ad_num value="2"/>                        
			<input type=hidden name=ad_status value=Pending/> 
            <script type="text/javascript">
				document.write("Characters Remaining: <input type=text name=limit size=4 readonly value="+count+">");
			</script>
            <br />
            <br />
            <a href="manageAds.php">Cancel "Create New Ad"</a>
		</div>

		<div id=adSubmitDiv><br>
			<INPUT TYPE = Submit Name = Submit VALUE = Submit Ad>
			</form>
    	</div>

	</div>
    
    </div>
    

</body>
</html>


<!--//		<input type=hidden name="siteID" value="$siteID"/>
//		<input type=hidden name="ad_status" value="Pending"/>	

//	$sql="INSERT INTO site_ads (siteID, ad_text, ad_status)
//	VALUES
//	('$_POST[siteID]','$_POST[ad1]','$_POST[ad_status]')";


//		< s c r i p t type="text/javascript">
//			var count = "75";
//			function limiter(){
//			var tex = document.myform.comment.value;
//			var len = tex.length;
//			if(len > count){
//   	    	tex = tex.substring(0,count);
//   		     	document.myform.comment.value =tex;
//    	    	return false;
//			}
//			document.myform.limit.value = count-len;
//		}
//		< / s c r i p t >
//
