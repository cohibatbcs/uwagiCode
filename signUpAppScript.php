<?php
session_start();
require_once('dbConnect/uwagi.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Uwagi</title>
<link href="main.css" rel="stylesheet" type="text/css" />  
<style type="text/css">
#aboutUsBody{
	padding: 15px;
	border: none;
	margin-top: -75px;
}
</style>
</head>
<body>

<?php
######################
##  POST Variables  ##
######################
$email = $_POST['email'];
$name = $_POST['name'];
$phoneSent = $_POST['phone'];
$phone = str_replace ("-", "", $phoneSent);
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];


$desc = $_POST['desc'];
$offer = $_POST['offer'];
$offerLength = $_POST['offerLength'];
$website = $_POST['website'];

	foreach($_POST['type'] as $value) {
		$check_msg .= $value;
	}

	if ($check_msg == 'bar'){
		$bar = 'yes';
		$restaurant = 'no';
	}
	if ($check_msg == 'restaurant'){
		$bar = 'no';
		$restaurant = 'yes';
	}
	if ($check_msg == 'barrestaurant'){
		$bar = 'yes';		$restaurant = 'yes';
	}		
	
	$sqlApp="INSERT INTO site_signup (site_email, site_name, site_phone, site_address, site_city, site_state, site_zip, signup_bar, signup_restaurant, signup_desc, signup_offer, signup_length, signup_website) VALUES
		('$email','$name','$phone','$address','$city','$state','$zip','$bar','$restaurant','$desc','$offer','$offerLength','$website')";
	
	$resultApp = mysql_query($sqlApp)
		or die(mysql_error());
	
		if (!$resultApp){
			exit('Error inserting data into database');
		}
		else{
?>
	<div id=contentDiv>
        <div id=aboutUsBody>	
            <h2>We have your Information!</h2>
            <br/>Now we need an picture of your establishment to use in the app.<br/><br/>
            <em>For example, it can be a picture of your signage, your logo, your entrance or the inside of your establishment.</em><br>
            <br>
            <p>Click "Choose File" below to browse for a picture, then click "Upload File" once you have selected the picture you'd like to use.</p><br/>
            
            <div style="height: 25px; width: 400px; background-color:#CCC; padding: 10px;">    
                <form enctype="multipart/form-data" method="post" action="http://184.60.94.154:777/insert_pic.php">
                <input type="file" name="fileToUpload" />
                <input type="hidden" value="<?php echo $siteID;?>" name="siteID" />
                <input type="submit" value="Upload File" />
                </form>
            </div>
        </div>
    </div>
<?php
		}



?>

</body>
</html>