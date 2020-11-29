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
$profilePicture = "";
$uploadOk = 1;

if($_FILES['profilepicture']['size']!=0){

    $check = getimagesize($_FILES["profilepicture"]["tmp_name"]);
    if($check == false) {
        array_push($errors, "File is not an image");
        $uploadOk = 0;
    } 

$target_file = $target_dir .time().basename($_FILES["profilepicture"]["name"]);

// Check if file already exists
if (file_exists($target_file)) {
    array_push($errors, "Sorry, file already exists.");
    $uploadOk = 0;
}
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
&& $imageFileType != "GIF" ) {
    array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
    if($uploadOk == 1){
    move_uploaded_file($_FILES["profilepicture"]["tmp_name"], $target_file) ;
    $profilePicture =$target_file;
    }
}
    


foreach($errors as $error){
    echo $error ."<br>";
}

if(count($errors)==0){
    $picture = $profilePicture;
    $greet = test_input($_POST['greet']);
    $description = test_input($_POST['description']);
    $status ="disabled";
    // echo htmlspecialchars($description);
    // print_r ($description);
    $home = queryDbs("INSERT INTO home(greet, description, profile_picture, status) VALUES('$greet', '$description', '$picture', '$status')");
    if($home){
        echo "<h3 class='text-success'>Insert successfully</h3>";
    }else{
        echo "Fail to insert <br>". querryError();
    }
}

?>

