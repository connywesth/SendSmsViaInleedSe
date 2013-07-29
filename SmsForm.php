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
                // Date: 2013-07-26 // fixade bug med sökväg till autoload.php
                // Author: Conny Westh, Adopter KB, 073-898 68 61, conny.westh@gmail.com
                ////////////////////////////////////////////////////////////////////////////////    
                // Använder SmsUtility.php och /lib/autoload.php
                // För att starta PHPs inbyggda webserver som localhost på port 8000
                // så kör man "PHP -S localhost:8000" på kommandoraden. Sen kan man köra 
                // PHP SmsForm.php och testköra applikationen.
                ////////////////////////////////////////////////////////////////////////////////    
                // Registrera dig och skaffa en sms-nyckel på http://sms.inleed.se 
                // Alla SMS skickas idag från nummer 0763448100. 
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
		Syftet med denna sida är att vara elementärt funktionell och visa exempel på hur tekniken fungerar, inte att vara en fancy webbdesign!<br/>
		För att läsa mer om denna sida kan du besöka diskussionstråden på Wemasternetwork som är ursprunget till denna kod. <a href="http://www.wn.se/t1058494.html">Diskussionstråd angående Inleed SMS-tjänst</a>.<br/>		
		För att registrera dig hos Inleed.se för att få en sms-nyckel gå till denna länk: <a href="http://sms.inleed.se">http://sms.inleed.se</a> SMS-tjänst.<br/>		
		Author: Conny Westh, Date Created: 2013-07-21, Last updated: 2013-07-26, <a href="http://test.verimentor.se/inleed/sms/">http://test.verimentor.se/inleed/sms/</a><br/>
		</p>
		<?php
		
		?>
	</body>
</html>

