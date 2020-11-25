<?php
include('db.php');
$errors = [];
if(empty($_POST['greet'])){
    array_push($errors, "Please great your client");
}
if(empty($_POST['description'])){
    array_push($errors, "Please described your client");
}
if($_FILES['profilepicture']['size']==0){
    array_push($errors, "Please profile your client");
}

$target_dir = "profile_picture/";

if($_FILES['profilepicture']['size']!=0){

    $check = getimagesize($_FILES["profilepicture"]["tmp_name"]);
    if($check == false) {
        array_push($errors, "File is not an image");
    } 

$target_file = $target_dir . basename($_FILES["profilepicture"]["name"]);

// Check if file already exists
if (file_exists($target_file)) {
    array_push($errors, "Sorry, file already exists.");
}
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
&& $imageFileType != "GIF" ) {
    array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
}
// Check if $uploadOk is set to 0 by an error

    move_uploaded_file($_FILES["profilepicture"]["tmp_name"], $target_file) ;
}
    


foreach($errors as $error){
    echo $error ."<br>";
}


?>