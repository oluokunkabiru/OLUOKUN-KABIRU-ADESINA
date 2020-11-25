<?php
session_start();
include('db.php');
$error =[];

if(empty($_POST['username'])){
    array_push($error, "Username must be fill");
}
if(empty($_POST['password'])){
    array_push($error, "Password must be fill");
}
foreach($error as $errors){
    echo $errors ."<br>";
}
if(count($error)==0){
$username = $_POST['username'];
$password = md5($_POST['password']);
$co =  mysqli_query($conn, "SELECT* FROM users WHERE username ='$username' AND password ='$password' ");
$da = mysqli_fetch_array($co);
if($da['name'] !=""){
    $_SESSION['loginsuccess'] = $username;
    echo "<h4 class='text-success'>Login Successfully</h4>";
}else{
    echo "Wrong password or username";
}

}
?>