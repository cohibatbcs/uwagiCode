<?php require_once('dbConnect/uwagi.php'); ?>
<?php
session_start(); //Start sessions

$sex = $_POST['sex'];
$msg = $_POST['adtext'];

$site_username = $_SESSION['username'];
$site_query = mysql_query("Select * from site_contacts where contact_email = '$site_username'");
$site = mysql_fetch_array($site_query);
$siteID = $site['siteID'];


$query = "SELECT u.user_cell_num FROM user u JOIN site_opt so WHERE u.userID = so.userID AND so.siteID = '$siteID'");

$result = mysql_query($query) or die (mysql_error());
while($row = mysql_fetch_array($result)){
$user_cell_num = $row['user_cell_num'];


 $gatewayURL  =   'http://192.168.1.112:9333/ozeki?'; 
  $request = 'login=admin'; 
  $request .= '&password=M1lli0n5'; 
  $request .= '&action=sendMessage'; 
  $request .= '&messageType=SMS:TEXT'; 
  $request .= '&recepient='.urlencode($user_cell_num); 
  $request .= '&messageData='.urlencode("Hello World"); 

  $url =  $gatewayURL . $request;  

  //Open the URL to send the message 
   file($url);


?>



