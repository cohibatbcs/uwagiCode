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
	<style type="text/css"></style>
    
    <script type="text/javascript">
		var count = "140";
		function limiter(){
		var tex = document.textAd.adtext.value;
		var len = tex.length;
		if(len > count){
   	    tex = tex.substring(0,count);
   			document.textAd.adtext.value =tex;
    		return false;
		}
		document.textAd.limit.value = count-len;
		}
	</script>

</head>


<body>

<div id=contentDiv>


    <div id=adHeaderDiv>
		<?php
			echo "You are logged in as <b>$_SESSION[username]</b>&nbsp;&nbsp;&nbsp;<a href=logout.php>Click Here to Log Out</a><br>";
			$username = $_SESSION['username'];
		?>
    </div>
    
    <div id=textAd>
		Get the word out about your upcoming promotion or specials.<br />
        Click the traits you want to target, add your text then SEND IT.
    </div>
    
    <div id=sendText>

		
<form name="textAd" action="http://184.60.94.154/processText.php" method="get">

		<div id=textPreferences>
        	<b>Send a text message to:</b><br />
            <br />
			<input type="radio" name="sex" value=" u.user_gender = 'male' AND">Men<br />
			<input type="radio" name="sex" value=" u.user_gender = 'female' AND">Women<br />
            <input type="radio" name="sex" value="" checked="checked">Everyone<br />
            <input type="hidden" name="user" value="<?php echo $username; ?>" />
		</div>

		<div id=comingSoonDiv><img src="images/comingSoon.png" /></div>
        <div class="darkClass" id=textPreferences2Cover></div>
        <div id=textPreferences2>
			<input type="checkbox" name="textPref[]" value="010Men">Prefers Men<br />
			<input type="checkbox" name="textPref[]" value="010Women">Prefers Women<br />
            <br />
			<input type="checkbox" name="textPref[]" value="001lBeerLight">Light Beer Drinkers<br />
			<input type="checkbox" name="textPref[]" value="001lBeerDark">Dark Beer Drinkers <br />
            <input type="checkbox" name="textPref[]" value="001lBeerAles">Ale Drinkers<br />
			<input type="checkbox" name="textPref[]" value="001lWine">Wine Drinkers<br />
		  <input type="checkbox" name="textPref[]" value="001lWineReds">Red Wine Drinkers<br />
			<input type="checkbox" name="textPref[]" value="001lWineWhites">White Wine Drinkers<br />
		  <input type="checkbox" name="textPref[]" value="001lMixedDrinks">Cocktail Drinkers<br />
			<br />
		  <input type="checkbox" name="textPref[]" value="002_1to2">Goes Out 1-2x per Week<br />
		  <input type="checkbox" name="textPref[]" value="002_3to4">Goes Out 3-4x per Week<br />
		  <input type="checkbox" name="textPref[]" value="002_5to6">Goes Out 5-6x per Week<br />
		  <input type="checkbox" name="textPref[]" value="002_7">Goes Out 7x per Week<br />
        </div>
                
        <div class="darkClass" id="textPreferences3Cover"></div>
        <div id=textPreferences3>
			<input type="checkbox" name="textPref[]" value="006HappyHour">Loves Happy Hours<br />
			<input type="checkbox" name="textPref[]" value="007Specials">Wants Drink Specials Texted<br />
			<br />
			<input type="checkbox" name="textPref[]" value="005Pizza">Prefers Pizza<br />
			<input type="checkbox" name="textPref[]" value="005Burgers">Prefers Burgers<br />
			<input type="checkbox" name="textPref[]" value="005Wings">Prefers Wings<br />
			<input type="checkbox" name="textPref[]" value="005Tacos">Prefers Tacos<br />
			<br />
			<input type="checkbox" name="textPref[]" value="008Baseball">Prefers Baseball<br />
			<input type="checkbox" name="textPref[]" value="008Football">Prefers Football<br />
			<input type="checkbox" name="textPref[]" value="008Basketball">Prefers Basketball<br />
			<input type="checkbox" name="textPref[]" value="008Hockey">Prefers Hockey<br />
			<input type="checkbox" name="textPref[]" value="008Soccer">Prefers Soccer<br />
			<input type="checkbox" name="textPref[]" value="008Racing">Prefers Racing<br />
        </div>


        <div id=textBody>
        	<b>The message to send is:</b><br />
            <br />
		  <textarea name=adtext wrap=physical rows=4 cols=28 onkeyup=limiter()></textarea>       	
        </div>


		<div id=textCount>
			<script type="text/javascript">
				document.write("Characters Remaining: <input type=text name=limit size=4 readonly value="+count+">");
			</script>
		</div>


        <div id=submitDiv>
			<INPUT TYPE = Submit Name = Submit VALUE = 'Send It'>        	
        </div>

</form>

  </div>
    
    
    
</div> 
</body>
</html>