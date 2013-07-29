<!DOCTYPE html>
<html>
    <head>
        <!--
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        -->
	    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <meta name="generator" content="Conny Westh 2013-07-26" />
        <meta name="keywords" content=" skicka, sms, inleed, adopter, conny, westh, webmaster, network" />
        <meta name="description" content=" Skicka SMS" />
        <title>Skicka SMS med sms.Inleed.se</title>
    </head>
	<body>
			<?php
                ////////////////////////////////////////////////////////////////////////////////    
                // File: SmsForm.php
                // Date: 2013-07-24 // created file_get_contents()
                // Date: 2013-07-26 // fixade bug med s�kv�g till autoload.php
                // Author: Conny Westh, Adopter KB, 073-898 68 61, conny.westh@gmail.com
                ////////////////////////////////////////////////////////////////////////////////    
                // Anv�nder SmsUtility.php och /lib/autoload.php
                // F�r att starta PHPs inbyggda webserver som localhost p� port 8000
                // s� k�r man "PHP -S localhost:8000" p� kommandoraden. Sen kan man k�ra 
                // PHP SmsForm.php och testk�ra applikationen.
                ////////////////////////////////////////////////////////////////////////////////    
                // Registrera dig och skaffa en sms-nyckel p� http://sms.inleed.se 
                // Alla SMS skickas idag fr�n nummer 0763448100. 
                ////////////////////////////////////////////////////////////////////////////////    
                require_once("lib/autoload.php");
			
				$debug=0;
				$recipientPhoneNumber = $_REQUEST['recipient'];
				$textMessage = $_REQUEST['message'];
				$smsKey = $_REQUEST['smsKey'];

				if ($debug>=1)
				{	
					print '<br>';
					print 'Mobilnummer: [';
					print ($recipientPhoneNumber);
					print ']<br>\n';
					print 'Meddelande: [';
					print ($textMessage);
					print ']<br>\n';
					print '<br>';
				}

				// Skicka sms...				
				try
				{
    		        $sms = new SmsUtility($smsKey);
                    $sms->send($recipientPhoneNumber, $textMessage);
                    echo "Meddelande: [" . $textMessage . "] skickat till [" . $recipientPhoneNumber . "].<br>\n";
                }
                catch (Exception $e)
                {
                    echo "Error: " . $e->getMessage() . "<br>\n";
                }
                
			?>

		
	        <h1>Skicka SMS via sms.inleed.se</h1>
			<!-- <form action=selfpost.php method=POST> -->
			<form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="POST">
			<p>
			SMS Key (ca 50 tecken): <input type=text name=smsKey value="<?php echo $smsKey ?>" size=70 maxlength=200></p>
			<p>
			Mottagare (mobilnummer 073...): <input type=text name=recipient value="<?php echo $recipientPhoneNumber ?>" size=15 maxlength=15></p>
			<p>
			Meddelande (max 160 tecken): <input type=text name=message value="<?php echo $textMessage ?>" size=160 maxlength=160></p>
			<p>
			<input type="submit" value="Skicka"></p>
		
		</form>

		<p>
		Syftet med denna sida �r att vara element�rt funktionell och visa exempel p� hur tekniken fungerar, inte att vara en fancy webbdesign!<br/>
		F�r att l�sa mer om denna sida kan du bes�ka diskussionstr�den p� Wemasternetwork som �r ursprunget till denna kod. <a href="http://www.wn.se/t1058494.html">Diskussionstr�d ang�ende Inleed SMS-tj�nst</a>.<br/>		
		F�r att registrera dig hos Inleed.se f�r att f� en sms-nyckel g� till denna l�nk: <a href="http://sms.inleed.se">http://sms.inleed.se</a> SMS-tj�nst.<br/>		
		Author: Conny Westh, Date Created: 2013-07-21, Last updated: 2013-07-26, <a href="http://test.verimentor.se/inleed/sms/">http://test.verimentor.se/inleed/sms/</a><br/>
		</p>
		<?php
		
		?>
	</body>
</html>

