<?php 
$to_email = "gsanskar42@gmail.com";
$subject = "Simple Email";
$body = "Hello World!";
$headers = "From:sanskarg025@gmail.com";
if(mail($to_email, $subject, $body, $headers)){
	echo "Email Successfully Send";
}else{
	echo "Email Sending Failed";
}

?>