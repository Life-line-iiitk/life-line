<?php
session_start();
include('smtp/PHPMailerAutoload.php');
$subject=$_SESSION['mail_subject'];
$message=$_SESSION['mail_message'];
$from=$_SESSION['mail_from_email'];
echo $from;
echo smtp_mailer("lifelineiiitkorg@gmail.com",$subject,$message);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "lifelineiiitkorg@gmail.com";
	$mail->Password = "lifeline@iiitk";
	$mail->SetFrom(strval($from));
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		header("location: index.php");
	}
}
?>
