<?php 
include('db.php');
$errors =[];
if(empty($_POST['name'])){
    array_push($errors, "Please specify project name");
}
if($_FILES['picture']['size']==0){
    array_push($errors, "Please Select project picture");
}

if(empty($_POST['description'])){
    array_push($errors, "Please described your project");
}
$target_dir = "project/";
$picture = "";
$uploadOk = 1;

if($_FILES['picture']['size']!=0 && !empty($_POST['name'] && $_POST['description'])){

    $check = getimagesize($_FILES["picture"]["tmp_name"]);
    if($check == false) {
        array_push($errors, "Profile picture is not an image");
        $uploadOk = 0;
    } 

$target_file = $target_dir . basename($_FILES["picture"]["name"]);

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
    move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file) ;
    $profile =$target_file;
    }
}



foreach($errors as $error){
    echo $error ."<br>";
}

if(count($errors)==0){
    $picture = $profile;
    $name = test_input($_POST['name']);
    $description = test_input($_POST['description']);
    $status ="enabled";
    $home = queryDbs("INSERT INTO projects(project_name, pictures, description, status) VALUES('$name','$picture', '$description','$status')");
    if($home){
        echo "<h3 class='text-success'>Insert successfully</h2>";
    }else{
        echo "Fail to insert <br>". querryError();
    }
}


?>