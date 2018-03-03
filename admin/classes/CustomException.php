<?php
class CustomException extends Exception
{	
	function errorMessage()
	{
	//error message
	$errorMsg = 'Error on line '.$this->getLine().' in '.$_SERVER['REQUEST_URI']
	.': <b>'.$this->getMessage().'</b> time '.date("d-m-Y h:i:s");
	return $errorMsg;
	}
	
	function sendError()
	{
		$from=$reply_to=$server_name=$to="dinesh.gangwar8@gmail.com";
		$from_name="Err";
		$subject="ERROR";
		$message=$this->errorMessage();
		$mail=new mailerLib;
		$mail->sendEmail($from,$from_name,$reply_to,$server_name,$to, $subject,$message);
	}
}
?>