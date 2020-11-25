<?php

include('db.php');
$errors = [];
if($_FILES['profilepicture']['size']==0){
    array_push($errors, "Please profile your client");
}
if($_FILES['backgroundpicture']['size']==0){
    array_push($errors, "Please Select background picture");
}

if(empty($_POST['description'])){
    array_push($errors, "Please described your client");
}
$target_dir = "profile_picture/";
$profilePicture = "";
$backgroundPicture = "";
$uploadOk = 1;

if($_FILES['profilepicture']['size']!=0){

    $check = getimagesize($_FILES["profilepicture"]["tmp_name"]);
    if($check == false) {
        array_push($errors, "Profile picture is not an image");
        $uploadOk = 0;
    } 

$target_file = $target_dir . basename($_FILES["profilepicture"]["name"]);

// Check if file already exists
if (file_exists($target_file)) {
    array_push($errors, "Sorry,Profile picture already exists.");
    $uploadOk = 0;
}
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
&& $imageFileType != "GIF" ) {
    array_push($errors, "Sorry, Profile Picture expect only JPG, JPEG, PNG & GIF files are allowed.");
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
    if($uploadOk == 1){
    move_uploaded_file($_FILES["profilepicture"]["tmp_name"], $target_file) ;
    $profilePicture =$target_file;
    }
}

if($_FILES['backgroundpicture']['size']!=0){

    $check = getimagesize($_FILES["backgroundpicture"]["tmp_name"]);
    if($check == false) {
        array_push($errors, "Background Picture  is not an image");
        $uploadOk = 0;
    } 

$target_file = $target_dir . basename($_FILES["backgroundpicture"]["name"]);

// Check if file already exists
if (file_exists($target_file)) {
    array_push($errors, "Sorry,background picture already exists.");
    $uploadOk = 0;
}
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
&& $imageFileType != "GIF" ) {
    array_push($errors, "Sorry, background picture expect only JPG, JPEG, PNG & GIF files are allowed.");
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
    if($uploadOk == 1){
    move_uploaded_file($_FILES["backgroundpicture"]["tmp_name"], $target_file) ;
    $backgroundPicture =$target_file;
    }
}


foreach($errors as $error){
    echo $error ."<br>";
}

if(count($errors)==0){
    $picture = $profilePicture;
    $bakground = $backgroundPicture;
    $description = test_input($_POST['description']);
    $status ="disabled";
    $home = queryDbs("INSERT INTO about(profile_picture, background_picture, description, status) VALUES('$picture','$bakground', '$description','$status')");
    if($home){
        echo "<h3 class='text-success'>Insert successfully</h2>";
    }else{
        echo "Fail to insert <br>". querryError();
    }
}
?>