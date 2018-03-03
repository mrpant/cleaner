<?php

class GlobalMailer
{

	function sendMailWithAttachment($to,$name,$mailBody,$subject,$from,$fromName,$mail,$attachments)
	{
		
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true; 
		$mail->SMTPDebug  = 0;                               // Enable SMTP authentication
		$mail->Username = '';                 // SMTP username
		$mail->Password = '';                          // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                                 // TCP port to connect to

		$mail->setFrom($from, $fromName);
		$mail->addAddress($to, $name);     // Add a recipient
		$mail->AddReplyTo("no-reply@instantluxury.net","No Reply");
		$mail->addBCC('support@immidialuxury.com');
		// $mail->addBCC('kiran@immidialuxury.com');
		// $mail->addBCC('basil@immidialuxury.com');
	//	$mail->addAttachment($attachments);         // Add attachments
	 	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $subject;
		$mail->Body    = $mailBody;
		$mail->MsgHTML($mailBody);
		$mail->AltBody = 'Thanks For Comming,Have a Nice Day!!';
	
		if(!$mail->send()) {
			return 0;
		   // echo 'Message could not be sent.';exit;

		} else {
			return 1;
		  // echo 'Message has been sent';
		  //  exit;
		}

	}





	function sendMail($to,$name,$mailBody,$subject,$from,$fromName,$mail)
	{

		 //print_r();exit;
		
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true; 
		//$mail->SMTPKeepAlive = true;
		$mail->SMTPDebug  = 3;                               // Enable SMTP authentication
		$mail->Username = 'mukesh@buddy4study.com';                 // SMTP username
		$mail->Password = 'mrpant1990';                          // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                                 // TCP port to connect to

		$mail->FromName = $fromName;

		$mail->setFrom($from, $fromName);
		$mail->addAddress($to, $name);     // Add a recipient
		/*$mail->AddReplyTo("no-reply@immidialuxury.com","No Reply");
		$mail->addBCC('support@immidialuxury.com');*/
		//$mail->addBCC('kiran@immidialuxury.com');
		//$mail->addBCC('basil@immidialuxury.com');

		

		//print_r($mail);exit;


		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	 	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $subject;
		$mail->Body    = $mailBody;
		$mail->MsgHTML($mailBody);
		$mail->AltBody = 'Thanks For Comming,Have a Nice Day!!';
	
		if(!$mail->send()) {
			return 0;
		   // echo 'Message could not be sent.';exit;

		} else {
			return 1;
		  // echo 'Message has been sent';
		  //  exit;
		}

	}






	
}


?>