PHP-invite-System
=================

PHP-invite-System is a prelaunch web application that acquires all sign up request from the landing page and send a welcome Email to the user using the PHPMailer library -- https://github.com/PHPMailer/PHPMailer

Get It Working:
===============

config/dbConnect.php -- 

Please create a Database with one table called "invites" with following fields:

email ,
reference_code ,
created_at

dbConnect.php  is to be edited with the config of the database you created.


You can add more fields and customise the HTML form in index.php with associated Jquery - public/javascript/index.js and also the query in invite/create_invite.php to fetch and save the fields.



index.php --

The frontend code for your Invite system goes here, Please Use the same ID's of the HTML tags for the reference of the jquery code used in  public/javascript/index.js.

invite/create_invite.php --

Please configure your SMTP settings here and also edit your welcome mailer own HTML mailer in the line 46 and 47

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';


customized examples ==> http://omgfit.in

Once your main application is launched you can send the users a sign up mail with the reference_code generated in the database for that user as a PARAMETER  in the SIGN UP URL

eg: http://omgfit.in/sign_up/REFERENCE_CODE

for simple unique authentication purpose.


