<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "../library/PHPMailer.php";
require_once "../library/Exception.php";
require_once "../library/OAuth.php";
require_once "../library/POP3.php";
require_once "../library/SMTP.php";

	$mail = new PHPMailer;
 
	//Enable SMTP debugging. 
                               
	//Set PHPMailer to use SMTP.
	$mail->isSMTP();            
	//Set SMTP host name                          
	$mail->Host = "smtp.gmail.com"; //host mail server
	//Set this to true if SMTP host requires authentication to send email
	$mail->SMTPAuth = true;                          
	//Provide username and password     
	$mail->Username = "r.alamsyah.8e@gmail.com";   //nama-email smtp          
	$mail->Password = "hzojignsqwwmkqln";           //password email smtp
	//If SMTP requires TLS encryption then set it
	$mail->SMTPSecure = "tls";                           
	//Set TCP port to connect to 
	$mail->Port = 587;                                   
 
	$mail->From = "r.alamsyah.8e@gmail.com"; //email pengirim
	$mail->FromName = "Rizky Alamsyah"; //nama pengirim
 
	 $mail->addAddress($_POST['email']); //email penerima
 
	$mail->isHTML(true);
 
	$mail->Subject = $_POST['subjek']; //subject
	$mail->Body    = $_POST['pesan']; //isi email
        
	if(!$mail->send()) 
	{
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} 
	else 
	{
	    echo "Message has been sent successfully";
	}

?>

