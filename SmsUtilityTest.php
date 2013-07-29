<?php
////////////////////////////////////////////////////////////////////////////////    
// File: SmsUtilityTest.php
// Date: 2013-07-21 // created file_get_contents()
// Date: 2013-07-23 // added cURL...
// Author: Conny Westh, Adopter KB, 073-898 68 61, conny.westh@gmail.com
// UTF-8 med URLEncode
////////////////////////////////////////////////////////////////////////////////    
// Registrera dig och skaffa en sms-nyckel p� http://sms.inleed.se 
// Alla SMS skickas idag fr�n nummer 0763448100. 
////////////////////////////////////////////////////////////////////////////////    
require_once('/lib/autoload.php');

class SmsUtilityTest
{
    function __construct()
    {
        echo "********************************************************************************\n";
        echo "** Begin Test...\n";
        echo "********************************************************************************\n";
        $this->main();
    }
    
    function main()
    {
        $smskey = "<50 teckens sms-nyckel anges h�r>";
        $recipient1 = "070..."; // Mobiltelefon nr 1 anges h�r
        $recipient2 = "073...";  // Mobiltelefon nr 2 anges h�r
        $message1 = "Hejsan Kalle,\nNu fungerar SmsUtility med specialtecken och k�llkoden finns i din mejl med (������)!";
        $message2 = "Hejsan Sven,\nNu fungerar SmsUtility.php med cURL och (������)!";
        
        $sms = new SmsUtility($smskey);
        $sms->send($recipient1, $message1);
        $sms->send($recipient2, $message2);
    }
    
    function __destruct()
    {
        echo "********************************************************************************\n";
        echo "** End Test...\n";
        echo "********************************************************************************\n";
    }
}
 
new SmsUtilityTest();
   
?> 
