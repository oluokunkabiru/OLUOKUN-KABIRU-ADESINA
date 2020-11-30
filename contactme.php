<?php 
include('vendor/autoload.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include('auth/db.php');
$ap = queryDbs("SELECT* FROM appearances WHERE status='enabled' ");
$co = data($ap);
$backgroundColor = $co['navbar'];
$textColo = $co['text'];
function reversecolor($data){
    $re = str_replace("#", "", $data);
      $r = substr($re, 0,2);
      $g = substr($re, 2,2);
      $b = substr($re, 4,2);
      $r1 = base_convert($r,16,10);
      $g1 = base_convert($g,16,10);
      $b1 = base_convert($b,16,10);
      $r2 = 255-$r1;
      $g2 = 255-$g1;
      $b2 = 255-$b1;
      $r3 = str_pad(base_convert($r2,10,16), 2,"0");
      $g3 = str_pad(base_convert($g2,10,16), 2,"0");
      $b3 = str_pad(base_convert($b2,10,16), 2,"0");
      $new = "#".$r3.$g3.$b3;
    return $new;
  }

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
      $name = test_input($_POST['name']);
      $email = test_input($_POST['email']);
      $messages = test_input($_POST['message']);
      $mymessage = '
      <!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Document</title>
          <style>
              .containers {
                  border-radius: 20%;
                  margin-right: auto;
                  margin-left: auto;
                  width: 40%;
                  background-color: '.$backgroundColor.';
                  color: '.reversecolor($backgroundColor).';
                  margin-top: 5%;
                  margin-bottom: 20%;
                  padding: 2%;
                  box-shadow: 5px 5px 5px #b3b3b3;
                  font-family: Arial, Helvetica, sans-serif;
              }
              .content{
                  text-align: center;
              }
              @media screen and (max-width:768px) {
                .containers {
                  width: 85%;
                 
                
              }
       
              }
             
          </style>
      </head>
      <body>
          <div class="containers">
              <div class="content">
                  <h3>Name: <b>'. ucwords($name) .'</b></h3>
                  <h3>Email <b>'.$email.'</b></h3>
                  <h1> Messages </h1>
                  <p> '. $messages .' </p>
                  </div>
          </div>
      </body>
      </html>';

      $respient ='
      <!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Document</title>
          <style>
              .containers {
                  border-radius: 20%;
                  margin-right: auto;
                  margin-left: auto;
                  width: 40%;
                  background-color: '.$backgroundColor.';
                  color: '.reversecolor($backgroundColor).';
                  margin-top: 5%;
                  margin-bottom: 20%;
                  padding: 2%;
                  box-shadow: 5px 5px 5px #b3b3b3;
                  font-family: Arial, Helvetica, sans-serif;
              }
              .content{
                  text-align: center;
              }
              @media screen and (max-width:768px) {
                .containers {
                  width: 85%;
                 
                }
              }
       
             
          </style>
      </head>
      <body>
          <div class="containers">
              <div class="content">
                  <h3>Dear <b>'.$name .'</b>,</h3>
                  <h1>Thank you for contact us, we will get back to you <b>shortly</b></h1>
                  </div>
          </div>
      </body>
      </html>';
      
$mail = new PHPMailer(true);
  //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'okathevillageboy@gmail.com';                     // SMTP username
    $mail->Password   = 'OLUOKUN2015'; 
    $mail->SMTPDebug = 0;
    $mail->CharSet = "UTF-8";                              // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->addReplyTo($email, $name);
    $mail->setFrom('okathevillageboy@gmail.com', ucwords($name));
    $mail->addAddress('oluokunkabiru2015@gmail.com', ucwords($name));     // Add a recipient
    
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'MESSAGE FROM MY PORTIFOLIO';
    $mail->Body    = $mymessage;
    $mail->AltBody = $mymessage;


    $resp =  new PHPMailer(true);
    //Server settings
      $resp->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
      $resp->isSMTP();                                            // Send using SMTP
      $resp->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
      $resp->SMTPAuth   = true;                                   // Enable SMTP authentication
      $resp->Username   = 'okathevillageboy@gmail.com';                     // SMTP username
      $resp->Password   = 'OLUOKUN2015'; 
      $resp->SMTPDebug = 0;
      $resp->CharSet = "UTF-8";                              // SMTP password
      $resp->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $resp->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
  
      //Recipients
      $mail->addReplyTo('oluokunkabiru2015@gmail.com', 'OLUOKUN KABIRU ADESINA');
      $resp->setFrom('okathevillageboy@gmail.com', "OLUOKUN KABIRU ADESINA");
      $resp->addAddress($email, ucwords($name));     // Add a recipient
      
      $resp->isHTML(true);                                  // Set email format to HTML
      $resp->Subject = 'OLUOKUN KABIRU ADESINA';
      $resp->Body    = $respient;
      $resp->AltBody = $respient;
  $resp->send();
    $mail->send();
   
    if($mail->send()){
         echo 'Message has been sent';
    }else{
        echo "Message could not be sent. <b> <b>Mailer Error: Please check your email very well</b> ";
    }

    // {$mail->ErrorInfo}


  }


?>


<?php

$header ='
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .containers {
            border-radius: 20%;
            margin-right: auto;
            margin-left: auto;
            width: 40%;
            background-color: '.$backgroundColor.';
            color: '.reversecolor($backgroundColor).';
            margin-top: 5%;
            margin-bottom: 20%;
            padding: 2%;
            box-shadow: 5px 5px 5px #b3b3b3;
            font-family: Arial, Helvetica, sans-serif;
        }
        .content{
            text-align: center;
        }
        @media screen and (max-width:768px) {
                .containers {
                  width: 80%;
                 
                }
              }
       
    </style>
</head>
<body>
    <div class="containers">
        <div class="content">
            <h3>Dear <b>oluokun</b>,</h3>
            <h1>Thank you for contact us, we will get back to you <b>shortly</b></h1>
            </div>
    </div>
</body>
</html>';
echo $header;
?>