<?php
if(isset($_SESSION['contactname'])){
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
$name =$_SESSION['contactname'];

?>

<!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Document</title>
          <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
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
                  <h3>Dear <b><?php $name ?></b>,</h3>
                  <h1>Thank you for contact us, we will get back to you <b>shortly</b></h1>
                  
                  </div>
          </div>
          <a href="index.php" class="btn btn-primary btn-lg text-uppercase"> Go to home </a>

      </body>
      </html>
      <?php
}else{
    rediret("index.php");
}
      ?>