<?php
$business = $_POST['business'];
$email = $_POST['email'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Uwagi</title>
<link href="main.css" rel="stylesheet" type="text/css" />  
<style type="text/css">
#aboutUsBody{
	padding: 10px;
}
</style>
</head>
<body>

<div id=contentDiv>

	<div id=adHeaderDiv>
    	
    </div>

	<div id=aboutUsBody>
		<h2>Signing up for Uwagi is incredibly simple...</h2><br/> Just enter the basic information for your ad on our app & provide us with your billing information.  We take care of getting your information on the app within 1 business day.<br />
        <br />
        Once we have your information, we will add you to the app database & put your marketing kit in the mail.  The kit includes window clings, table tents & stickers.  Also included are the lanyards for your staff to make redemption easier.<br />
		<br />
        <a href="signUpAppInfo.php?business=<?php echo $business; ?>&email=<?php echo $email; ?>"><span style="font-size: 14pt;"><b>Click Here to Sign up for Uwagi.</b></span></a><br/>
         or call <b>Robert Millay</b> at <b>(920)224-4922</b> to sign up over the phone.<br />
        <br />
        or<br />
        <br />
        <A href="home.php">Leave & let somebody else join in my place</a>.
	</div>
    
</div>
</body>
</html>