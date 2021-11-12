<?php
session_start();
include('smtp/PHPMailerAutoload.php');
$subject=$_SESSION['mail_subject'];
$message=$_SESSION['mail_message'];
$to=$_SESSION['mail_to_email'];
echo smtp_mailer($to,$subject,$message);
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
	$mail->SetFrom("lifelineiiitkorg@gmail.com");
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
    ?>
    <script>
        location.replace("otp_verify.php");
    </script>
    <?php
}
}
?>
