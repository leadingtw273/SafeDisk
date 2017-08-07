<?php
	session_start();
	require_once("PHPMailer-master/PHPMailerAutoload.php");
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true; // turn on SMTP authentication

	$mail->Username = "leadingtw@gmail.com";
	$mail->Password = "r1246727";

	$mail->FromName = "SafeDisk";

	$email=$_SESSION["member_email"];
	// 收件者信箱
	$name=$_SESSION["member_user"];
	// 收件者的名稱or暱稱

	if(isset($_POST["senter"])){
		$mail->Subject = "SafeDisk apk link"; 
		// 信件標題
		$mail->Body  = $_POST["senter"];
		$mail->AddAddress($email,$name);

		if(!$mail->Send()){
			echo "寄信發生錯誤：" . $mail->ErrorInfo;
		}else{
			echo '1';
		}
	}
?>