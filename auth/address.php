<?php

include('db.php');
$errors =[];
if(empty($_POST['phone'])){
    $errors[]="Phone number is required";
}
if(empty($_POST['email'])){
    $errors[]="Email address is required";
}
if(strlen($_POST['address'])<6){
    $errors[]="Full contact address is required";
}
foreach($errors as $error){
    echo $error."<br>";
}
if(count($errors)==0){
    $phone = test_input($_POST['phone']);
    $email =test_input($_POST['email']);
    $address = test_input($_POST['address']);
    $status = "disable";
    $q = queryDbs("INSERT INTO address(phone, email, address, status) VALUES('$phone', '$email', '$address', '$status')");
    if($q){
        echo "<h3 class='text-success'>Insert successfully</h2>";
    }else{
        echo "Fail to insert <br>". querryError();
    }
}

?>