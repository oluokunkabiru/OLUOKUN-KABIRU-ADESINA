<?php
include('db.php');
$errors =[];
if(empty($_POST['body'])){
    $errors[]="Please choose body color";
}


if(empty($_POST['text'])){
    $errors[]="Please choose text color";
}
if(empty($_POST['navbar'])){
    $errors[]="Please choose navigation bar color";
}
if(empty($_POST['backgroundcolor'])){
    $errors[]="Please choose body color";
}

foreach($errors as $error){
    echo $error."<br>";
}

if(count($errors)==0){
    $body = test_input($_POST['body']);
    $text = test_input($_POST['text']);
    $navbar = test_input($_POST['navbar']);
    $bgcolor = test_input($_POST['backgroundcolor']);
    $status = "disabled";
    $appearance = queryDbs("INSERT INTO appearances (body, text, navbar, bgcolor, status) VALUES('$body', '$text', '$navbar', '$bgcolor', '$status')");
    if($appearance){
        echo "<h3 class='text-success'>Insert successfully</h2>";
    }else{
        echo "Fail to insert <br>". querryError();
    }

}
?>