<?php
require '../PHPMailer/PHPMailerAutoload.php';
include('../config/dbConnect.php');

date_default_timezone_set('UTC');
$email = $_REQUEST['email'];

$result = mysql_query("SELECT * from invites  WHERE email='$email'");

if (!mysql_num_rows($result)>=1) {
$now = new DateTime();
$created_at = $now->format('Y-m-d H:i:s');
$unique_id = uniqid();

$insert = "INSERT INTO invites (email, reference_code , created_at) VALUES ('$email' , '$unique_id' , '$created_at')";

 mysql_query( $insert) or die (mysql_error().' Error');

if(!mysql_error()){

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'shazad26@gmail.com';                 // SMTP username
$mail->Password = '';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
//$mail->SMTPDebug = 1;
$mail->From = 'shazad26@gmail.com';
$mail->FromName = 'Mailer';
//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
$mail->addAddress($email);               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   echo "We have registered your invite request successfully! You will be contacted soon.";
}

	
}
 
 
}
else{
echo "You have already requested for an invite. You will be contacted soon.";
}




?>