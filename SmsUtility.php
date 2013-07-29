<?php
////////////////////////////////////////////////////////////////////////////////    
// File: SmsUtility.php
// Date: 2013-07-21 // created file_get_contents()
// Date: 2013-07-23 // added cURL...
// Author: Conny Westh, Adopter KB, 073-898 68 61, conny.westh@gmail.com
// UTF-8 med URLEncode
////////////////////////////////////////////////////////////////////////////////    
// Refgistrera dig och skaffa en sms-nyckel på http://sms.inleed.se 
// Alla SMS skickas idag från nummer 0763448100. 
////////////////////////////////////////////////////////////////////////////////    
class SmsUtility
{
    var $smskey;
    
    function __construct($smskey)
    {
        $this->smskey = $smskey;
    }
    
    function __destruct()
    {
    }
    
    function send($recipient, $message)
    {
        $encodedMessage = $this->url_encode($message);
        $url = "http://sms.inleed.se/skickaSMS/?nummer=" . $recipient . "&text=" . $encodedMessage . "&nyckel=" . $this->smskey;
        // echo $url . "\n";
        try
        {
            $this->curl_execute($url); // Using cURL...
            // $this->file_execute($url); // Using file_get_contents()...
        }
        catch (Exception $e)
        {
            echo $e;
            throw new Exception($e);
        }
    }

    // To use cURL on Windows-platform you need to 
    // copy libeay32.dll and ssleay32.dll to Windows\System32
    // and uncomment ;php_libcurl.dll in php.ini, the maybe reboot PC...
    function curl_execute($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_exec($ch);
        curl_close($ch);
    }
    
    function file_execute($url)
    {
        file_get_contents($url); 
    }
     
    function url_encode($string)
    {
         return rawurlencode(utf8_encode($string));
    }
     
    function url_decode($string)
    {
         return utf8_decode(rawurldecode($string));
    }    
}

?> 
