<?php
session_start();
require_once('dbConnect/uwagi.php');

	//SESSION Variables
	$username = $_SESSION["username"];
	$siteID = $_SESSION["siteID"];


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Uwagi</title>
<link href="main.css" rel="stylesheet" type="text/css" />
<style type="text/css"></style>

    <script type="text/javascript">
		var count = "1600";
		function limiter(){
		var tex = document.appInfo.desc.value;
		var len = tex.length;
		if(len > count){
   	    tex = tex.substring(0,count);
   			document.appInfo.desc.value =tex;
    		return false;
		}
		document.appInfo.limit.value = count-len;
		}
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
        <font color="#FF0000" size="-2">Leaving a field blank will result in that field staying the same on your ad.</font><br />
		<br />
            <form name="adChanges" action="clientAppManagementChangesScript.php" method="post">
            <table width="519">
                <tr>
               		<td height="24" class="bold">
                		Description: <a href="#"><img src="images/question.gif" id="desc" title="Enter any information about your business that you would like potential customers to see. For example, you may want to let people know what your establishment is famous for, or what your business hours are.  It's really up to you to be creative here so you can draw new customers in to your establishment." width="18" height="18" /></a>
					</td>
                	<td>
                		<textarea name="desc" wrap="physical" rows="4" cols="40" onkeyup="limiter()"></textarea> 
                	</td>
                </tr>
                <tr>
                	<td class="bold">
                		Uwagi Special Offer: 
                		<a href="#"><img src="images/question.gif" id="desc" title='This is the "Special Offer" you would like to extend to your customers. For example you might offer a "Buy One, Get One Free Drink", or "Buy One Burger, Get One Free".' width="18" height="18" /></a>
					</td>
                	<td>
                		<input type="text" name="offer" value="" size="40" maxlength="128"/>
                	</td>
                </tr>
                <tr>
                    <td class="bold">
                    	Offer Length (in hours):
                    </td>
                    <td>
                        <input type="text" name="offerLength" value="" size="24" maxlength="4"/> 
                        <em> Ex. 168 hours = 1 week</em>
                    </td>
                </tr>
                <tr>
                    <td class="bold">

                    </td>
                    <td>
                        <input type="submit" name="submit" value="Submit Changes"/> 
                    </td>
                </tr>
			</table>
            </form>
            
            
		</div>

	</div>


</body>
</html>