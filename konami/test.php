<?php
/*

$url = "http://192.168.1.112:9333/ozeki?action=sendMessage&ozmsUserInfo=admin:M1lli0n5&recepient=+19207503321&messageData=test> http://192.168.1.112:9333/ozeki?action=sendMessage&ozmsUserInfo=admin:M1lli0n5&recepient=+19207503321&messageData=test";



$ch = curl_init();

//Set curl to return the data instead of printing it to the browser.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//Set the URL
curl_setopt($ch, CURLOPT_URL, $url);
//Execute the fetch
$data = curl_exec($ch);
//Close the connection
curl_close($ch);

 */
 
  $gatewayURL  =   'http://192.168.1.112:9333/ozeki?'; 
  $request = 'login=admin'; 
  $request .= '&password=M1lli0n5'; 
  $request .= '&action=sendMessage'; 
  $request .= '&messageType=SMS:TEXT'; 
  $request .= '&recepient='.urlencode('+19207503321'); 
  $request .= '&messageData='.urlencode("Hello World"); 

  $url =  $gatewayURL . $request;  

  //Open the URL to send the message 
   file($url);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>