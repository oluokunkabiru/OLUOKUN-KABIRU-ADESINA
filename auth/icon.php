<?php
include('db.php');
$errors =[];
if(empty($_POST['name'])){
    $errors[]="Please supply icon name";
}

if(empty($_POST['icon'])){
    $errors[]="Please supply icon code";
}
foreach($errors as $error){
    echo $error."<br>";
}

if(count($errors)==0){
    $name = test_input($_POST['name']);
    $icon = test_input($_POST['icon']);
    $q = queryDbs("INSERT INTO icons(name, icons) VALUES('$name', '$icon')");
    if($q){
        echo "<h3 class='text-success'>Insert successfully</h2>";
    }else{
        echo "Fail to insert <br>". querryError();
    }
}


?>