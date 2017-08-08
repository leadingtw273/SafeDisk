<?php
	session_start();

	require_once("dist/plug/PHPMailer/PHPMailerAutoload.php");
	$mail = new PHPMailer();					
	$mail->IsSMTP();							//	Set mailer to use SMTP
	$mail->SMTPAuth = true; 					// 	turn on SMTP authentication

	$mail->Username = "leadingtw@gmail.com";	// 	SMTP username
	$mail->Password = "r1246727";				//	SMTP password

	$mail->FromName = "SafeDisk";
	$mail->IsHTML(true); 						//	Set email format to HTML

	$email=$_SESSION["member_email"];			//	recipient email
	$name=$_SESSION["member_user"];				// 	recipient name
	$mail->AddAddress($email,$name);			//	Add a recipient
	$mail->Subject = "SafeDisk apk link";		//	email title
	//email text
	$mail->Body    = '<p style= "font-size:20;font-family:verdana;">this is your USB["'.$_POST["sent_key"].'"] link:</p> <a style= "font-family:verdana;font-size:36px" href="'.$_POST["sent_url"].'">'.$_POST["sent_url"].'</a>';

	//send email!
	if($mail->Send()){
		echo '1';
	}else{
		echo "寄信發生錯誤：" . $mail->ErrorInfo;
	}
?>