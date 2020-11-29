<?php 
include('auth/db.php');
$errors =[];
if(empty($_POST['name'])){
    $errors[]="Please supply your name";
}
if(empty($_POST['email'])){
    $errors[]="Please supply your email";
}
if(empty($_POST['message'])){
    $errors[]="Please supply your supply your message";
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format, pleasee supply valid email";
  }
  if (!preg_match("/^[a-zA-Z ]*$/",$_POST['name'])) {
    $nameErr = "Only letters and white space allowed";
  }

  foreach($errors as $error){
      echo $error."<br>";
  }
  if(count($errors)==0){
//       $name = test_input($_POST['name']);
//       $email = test_input($_POST['email']);
//       $message = test_input($_POST['message']);
//       $to = 'oluokunkabiru@gmail.com';
// $subject = 'Marriage Proposal';
// $from = 'okathevillageboy@email.com';
 
// // To send HTML mail, the Content-type header must be set
// $headers  = 'MIME-Version: 1.0' . "\r\n";
// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// // Create email headers
// $headers .= 'From: '.$from."\r\n".
//     'Reply-To: '.$from."\r\n" .
//     'X-Mailer: PHP/' . phpversion();
 
// // Compose a simple HTML email message
// $message = '<html><body>';
// $message .= '<h1 style="color:#f40;">Hi Jane!</h1>';
// $message .= '<p style="color:#080;font-size:18px;">Will you marry me?</p>';
// $message .= '</body></html>';
 
// // Sending email
// if(mail($to, $subject, $message, $headers)){
//     echo 'Your mail has been sent successfully.';
// } else{
//     echo 'Unable to send email. Please try again.';
// }

// Using Awesome https://github.com/PHPMailer/PHPMailer
require 'PHPMailerAutoload.php';

// $mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mailgun.org';                     // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'postmaster@YOUR_DOMAIN_NAME';   // SMTP username
$mail->Password = 'secret';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, only 'tls' is accepted

$mail->From = 'YOU@YOUR_DOMAIN_NAME';
$mail->FromName = 'Mailer';
$mail->addAddress('bar@example.com');                 // Add a recipient

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

$mail->Subject = 'Hello';
$mail->Body    = 'Testing some Mailgun awesomness';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
  }

?>