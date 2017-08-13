<?php
$ReCaptchaResponse=filter_input(INPUT_POST, 'reCaptchaResponse');
 
$Response=file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6Le9tisUAAAAAJPbIUjZpco-1JdFxq0vY6QEdBg4&response='.$ReCaptchaResponse."&remoteip=".$_SERVER['REMOTE_ADDR']);
echo ($Response)?'OK':'ERROR';
?>