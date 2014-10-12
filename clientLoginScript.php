<?php
	session_start(); //Start sessions
	require_once('dbConnect/uwagi.php'); 

	$passPre = $_POST["password"];
		$salt1 = md5("some_random_123_collection_~!@#$%^&*()[]{}-_\/|\;:,.+=<>?_of_stuff");
		$salt2 = md5("another_random_123_collection_~!@#$%^&*()[]{}-_\/|\;:,.+=<>?_of_stuff");
			$pass = md5($salt1 . $passPre . $salt2); 

//$pass = $_POST['password'];
	
	if(mysql_num_rows(mysql_query("SELECT * FROM site_contacts WHERE contact_email='".$_POST["username"]."' and contact_password='$pass'"))==1){
		$_SESSION['username'] = $_POST['username']; //Create the session

		$result = mysql_query("SELECT * FROM site_contacts WHERE contact_email='".$_POST["username"]."' and contact_password='$pass'")
					or die(mysql_error());


		if($row = mysql_fetch_array($result)){
			$_SESSION['username'] = $row['contact_email'];
			$_SESSION['siteID'] = $row['siteID'];
			$_SESSION['fName'] = $row['contact_fname'];
			$_SESSION['lName'] = $row['contact_lname'];	
				$passPre = $_POST["password"];
				$salt1 = md5("some_random_123_collection_~!@#$%^&*()[]{}-_\/|\;:,.+=<>?_of_stuff");
				$salt2 = md5("another_random_123_collection_~!@#$%^&*()[]{}-_\/|\;:,.+=<>?_of_stuff");
				$pass = md5($salt1 . $passPre . $salt2); 
		}
	
###########################################
##  Get appID 							 ##
###########################################
	
		$email = $_SESSION['username'];
		$siteID = $_SESSION['siteID'];
		
		$result2 = mysql_query("SELECT * FROM site WHERE siteID = '$siteID'")
			or die(mydql_error());
		$row2 = mysql_fetch_array($result2);			
		$_SESSION['appID'] = $row2['appID'];



		print ("<script>location.href='clientLogin.php'</script>");

	}
	else {
		echo 'Wrong username or password!<br>';
		echo '<a href=clientLogin.php>Please try again.</a>';
	}
?>