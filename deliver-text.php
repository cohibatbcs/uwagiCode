

<?php

$short_code = "73250";
$account_ID = "000-000-107-89871";
$password = "ZWZ9HT3F";
    require_once("SMS.php");

    // Open local xml file to mimic what would be sent to your web
    // server if a mobile originated SMS was sent from a mobile phone
    $file = "_sample_text_mo.xml";
    $handle = fopen($file, "r") or die ("cannot open file $file");
    $fileinfo = stat($file);
    $xml = fread($handle, $fileinfo[7]);
    fclose($handle);
   
    // Create SMS object
    $sms = new SMS;

    // Turns on/off debugging
    // Please note that output is via "echo" - in a web server this
    // output would be sent to the browser.
    //$sms->setDebugMode(1);
    
    // If script was being run via an HTTP POST to your web server
    // this is code that would pull out the POSTed XML
    // "get_magic_quotes_gpc" is a security feature in PHP that adds
    // extra slashes to escape quotes, this will cause errors if you
    // try to parse it, the slashes will need stripped.
    // NOTE: uncomment the following lines
    //if (get_magic_quotes_gpc()) {
    //    $xml = stripslashes($_POST['xml']);
    //} else {
    //    $xml = $_POST['xml'];
    //}

    // parse incoming xml and check if its a deliver request
    if ($sms->parse($xml) && $sms->isDeliver()) {
        // implement your handling functions here
        // lines below are properties that you'll find useful
        echo "Ticket Id: " . $sms->getTicketId() . "<br>\n";
        $source = $sms->getSourceAddr();
        echo "Source Type: " . $source->getType() . "<br>\n";
        echo "Source Address: " . $source->getAddress() . "<br>\n";
        $dest = $sms->getDestinationAddr();
        echo "Dest Type: " . $dest->getType() . "<br>\n";
        echo "Dest Address: " . $dest->getAddress() . "<br>\n";
        echo "Message Text: " . $sms->getMessageText() . "<br>\n";
    } else {
      echo "Error Code: " . $sms->getErrorCode() . "<br>\n";
      echo "Error Description: " . $sms->getErrorDescription() . "<br>\n";
    }
?>

<?php
    include("SMS.php");

    // Create the SMS object
    $sms = new SMS;

    // Turns on/off debugging
    // Please note that output is via "echo" - in a web server this
    // output would be sent to the browser.
    //$sms->setDebugMode(1);

    // Subscriber/account properties
    $sms->setAccountId($account_ID);
    $sms->setAccountPassword($password);

    // Source address is what will show up as the
    // sender/originator of the message which require an instance
    // of the Address class.
    // Please note that short codes require a type of SMS_ADDR_TYPE_NETWORK
    // while using a true telephone number requires SMS_ADDR_TYPE_UNKNOWN
    // Alphanumeric orginators can be sent with SMS_ADDR_TYPE_ALPHANUMERIC
    $sms->setSourceAddr(new Address($short_code, SMS_ADDR_TYPE_NETWORK));
    //$sms->setSourceAddr(new Address("+13135551212", SMS_ADDR_TYPE_UNKNOWN));
    //$sms->setSourceAddr(new Address("Simplewire", SMS_ADDR_TYPE_ALPHANUMERIC));
    
    // Destination address is which receipient or phone
    // will receive the message.  Please note that this
    // method requires an instance of the Address class.
    $sms->setDestinationAddr(new Address("+11005551212", SMS_ADDR_TYPE_UNKNOWN));

    // Set the text of the message to send
    $sms->setMessageText("Hello World");
    
    // If premium is being used, set the amount to charge
    // For normal premium charge use setChargeType(1)
    // To start a subscription use setChargeType(2)
    // To conclude/do not renew a subscription use setChargeType(3)
    //$sms->setChargeType(1);
    //$sms->setChargeAmount(199);

    // Optional program ID for subscription billing. A program ID is 
    // needed to use the same short code and charge amount for multiple
    // subscriptions.
    //$sms->setProgramID("Game Subscription");
    
    // Required if "ad requirement" is included; otherwise optional. 
    // Valid values include: "standard_content", "premium_content", "opt_in_premium", 
    // "opt_in_standard", "stop_confirmation", "help_response", "other_administrative"
    //$sms->setMessagePurpose("standard_content");
    
    // This is used for SMS Advertising
    // Valid values include: "required", "requested".
    //$sms->setAdRequirement("requested");
    
    // Optional advice of charge message. Maximum length: 50 characters.
    //$sms->setAdviceOfChargeMessage("You will be charged for this service");
    
    if ($sms->submit()) {
        echo "Message sent ok<br>\n";
        echo "User Agent: " . $sms->getUserAgent() . "<br>\n";
        echo "Ticket Id: " . $sms->getTicketId() . "<br>\n";
    } else {
        echo "Message send failed<br>\n";
        echo "User Agent: " . $sms->getUserAgent() . "<br>\n";
        echo "Error Code: " . $sms->getErrorCode() . "<br>\n";
        echo "Error Description: " . $sms->getErrorDescription() . "<br>\n";
        echo "Error Resolution: " . $sms->getErrorResolution() . "<br>\n";
    }
?>