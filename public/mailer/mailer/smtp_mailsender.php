<?php 
date_default_timezone_set('Etc/UTC');
require './PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

if (!empty($_POST))
{
	echo "<hr/><p>".date("G:i:s")."</p>";
	//var_dump($_POST);
	$mail->isSMTP();
	$mail_type=$_POST["mail_type"];
	switch($mail_type){
		case "smtp":			
			$mail->SMTPDebug =0;
			$mail->Host =$_POST["smtp_host"];
			$mail->Username =$_POST["smtp_id"];
			$mail->Password =$_POST["smtp_pwd"];
			$mail->Port = $_POST["port"]; 	
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = strtolower($_POST["smtp_secure"]);
			break;
		case 'mail':
			$mail->isMail();
			break;	
		case 'sendmail':
			$mail->isSendmail();
			break;
		case 'qmail':
            $mail->isQmail(); 	
			break;				
		 default:
            throw new phpmailerAppException('Invalid test_type provided');
	}

	

	$recipient=$_POST["recipient"];
	$message=$_POST["message"];
	$port=$_POST["port"];
	$mail->FromName = $_POST["sender_name"];
	$mail->From =$_POST["sender"];
	$mail->isHTML(true);

	$mail->addAttachment('');
	$mail->Subject = $_POST["subject"];
	$mail->CharSet = 'utf-8';
	$mail->Encoding = 'base64';
	
	
	
	$tmp=$recipient;
	$pattern = "/([0-9a-zA-Z_-]+)(\.[0-9a-zA-Z_-]+){0,1}@([0-9a-zA-Z_-]+)(\.[0-9a-zA-Z_-]+){1,2}/";
	if (preg_match_all($pattern, $tmp, $matches)) {
		$arr_recipient=$matches[0];		
	}
	else
	{
		die ("No recipient");
	}
	
	//var_dump($arr_recipient);
	
	foreach ($arr_recipient as $value)
	{
		if ($value=="" || $value==null) exit;
		
		
		//echo "<br>".$value."<br>";
		$mail->clearAddresses();
		$mail->addAddress($value);
		
		$real_message=str_replace("aaaaaaaaaa", base64_encode($value), $message);
		$real_message=str_replace("bbbbbbbbbb", $value, $real_message);
		
		$tmp = explode("@", $value);
		$username=$tmp[0];
		$real_message = str_replace("eeeeeeeeee", $username,$real_message);
		
		$username_len=strlen($username);
		$stars="";
		for ($i=0; $i<$username_len-4 ;$i++)
		    $stars.="*";
       
		$star_username= str_replace(substr($username , 4) , $stars,  $username);
		 
		$real_message = str_replace("cccccccccc", $star_username, $real_message);
		
		
	 
		
		$mail->msgHTML($real_message, dirname(__FILE__), true);
		
		if(!$mail->send()) {
		   echo "Message could not be sent.<br>";
		   echo 'Mailer Error: ' . $mail->ErrorInfo;
		   exit;
		}
//		else{
//			echo 'Message has been sent to '.$value."<br>";
//		}
        Sleep(5);

	}

	echo 'All Message(s) has been sent';
}


//var_dump($_POST);
?>