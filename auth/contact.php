<?php
    include('db.php');

    $errors = [];
    if(empty($_POST['icon'])){
        $errors[]="Please choose contact icon";
    }
    if(empty($_POST['link'])){
        $errors[]="Plese enter the contact link";
    }
    if(empty($_POST['name'])){
        $errors[]="Plese enter the contact link";
    }
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$_POST['link'])){
        $errors[] ="Valid URL is require";
    }
    foreach($errors as $error){
        echo $error ."<br>";
    }
if(count($errors)==0){
    $name = test_input($_POST['name']);
    $link = test_input($_POST['link']);
    $icon = test_input($_POST['icon']);
    $home = queryDbs("INSERT INTO contacts(name, icon, link) VALUES('$name','$icon', '$link')");
    if($home){
        echo "<h3 class='text-success'>Insert successfully</h2>";
    }else{
        echo "Fail to insert <br>". querryError();
    }
}
?>