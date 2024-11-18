<?php 
date_default_timezone_set('Etc/UTC');
require './PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;




//var

$smtp_host="";
$smtp_id="";
$smtp_pwd="";
$sender_name="";
$sender="";
$recipient="";
//$webid="";
$subject="";
$message="";
//$is_html="";
//$is_ssl="";
//$is_tls="";
$port="";
$mail_type="";
if (!empty($_POST))
{
	//var_dump($_POST);
	$mail_type=$_POST["mail_type"];
	switch($mail_type){
		case "smtp":
			$mail->isSMTP();
			$mail->SMTPDebug = 0;
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

	$sender_name=$_POST["sender_name"];
	$sender=$_POST["sender"];
	$recipient=$_POST["recipient"];
	//$webid=$_POST["webid"];
	$subject=$_POST["subject"];
	$message=$_POST["message"];
	//$is_html=$_POST["is_html"];
	//$is_ssl=$_POST["is_ssl"];
	//$is_tls=$_POST["is_tls"];
	$port=$_POST["port"];
	
	//setting mail
	
	
	$mail->FromName = $sender_name;
	$mail->From = $sender;
	$mail->isHTML(true);
	//if ($is_html=="true") $mail->isHTML(true);
	$mail->addAttachment('');
	$mail->Subject = $subject;
	$mail->CharSet = 'utf-8';
	$mail->Encoding = 'base64';
//	$mail->SMTPSecure = 'None';
//	if ($is_ssl=="true") $mail->SMTPSecure = 'ssl';
//	if ($is_tls=="true") $mail->SMTPSecure = 'tls';
	
//	$mail->Body    =  $message;
	
	$mail->msgHTML($message, dirname(__FILE__), true);
	//seperate recipients
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
		$mail->clearAddresses();
		$mail->addAddress($value);
		
		try {
            $mail->send();
            echo "Message has been sent to ".$value."<br>";
        } catch (phpmailerException $e) {
            throw new phpmailerAppException("Unable to send to: " . $value . ': ' . $e->getMessage());
        }
	}

//	echo 'All Message(s) has been sent';
}


//var_dump($_POST);
?>