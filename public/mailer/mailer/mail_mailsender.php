<?php
date_default_timezone_set('Etc/UTC');
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

if (!empty($_POST) )
{
	
	echo "<hr/><p>".date("G:i:s")."</p>";
	
	$nameFrom = $_POST["sender_name"];
	$from = $_POST["sender"];
	$recipient=$_POST["recipient"];
	$subject = $_POST["subject"];
	$message =  $_POST["message"];
	
	$charset = "utf-8";
	$nameFrom = "=?$charset?B?".base64_encode($nameFrom)."?=";
	$subject = "=?$charset?B?".base64_encode($subject)."?=";

	$headers = "From: ".$nameFrom."<".$from .">\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
//	$headers .= "CC: ".$cc."\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=utf-8\r\n"; 
	
	
	$tmp=$recipient;
	$pattern = "/([0-9a-zA-Z_-]+)(\.[0-9a-zA-Z_-]+){0,1}@([0-9a-zA-Z_-]+)(\.[0-9a-zA-Z_-]+){1,2}/";
	if (preg_match_all($pattern, $tmp, $matches)) {
		$arr_recipient=$matches[0];		
	}
	else
	{
		die ("No recipient");
	}

	foreach ($arr_recipient as $value)
	{
		
		if (!mail($value,$subject,$message, $headers))
		{
			echo '[!]Mailer Error: ' . $value."<br>";
			exit;
		}
		else echo "[+]Success ".$value."<br>";
	}
	
	echo 'Message(s) has been sent';
}
?>