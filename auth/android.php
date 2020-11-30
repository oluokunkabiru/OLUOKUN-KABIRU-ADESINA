<?php
include('db.php');
$errors = [];
if(empty($_POST['name'])){
    array_push($errors, "Please specify the application name");
}
if(empty($_POST['version'])){
    array_push($errors, "Please the application version");
}
if($_FILES['apk']['size']==0){
    array_push($errors, "Please upload the application");
}

$target_dir = "android_app/";
$apk = "";
$uploadOk = 1;

if($_FILES['apk']['size']!=0){

    

$target_file = $target_dir.$_POST['name'].basename($_FILES["apk"]["name"]);

// Check if file already exists
if (file_exists($target_file)) {
    array_push($errors, "Sorry, file already exists.");
    $uploadOk = 0;
}
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Allow certain file formats
if($imageFileType != "apk" && $imageFileType != "APK" ) {
    array_push($errors, "Sorry, only APK files are allowed.");
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
    if($uploadOk == 1){
    move_uploaded_file($_FILES["apk"]["tmp_name"], $target_file) ;
    $apk =$target_file;
    }
}
    


foreach($errors as $error){
    echo $error ."<br>";
}

if(count($errors)==0){
    $app = $apk;
    $name = test_input($_POST['name']);
    $version = test_input($_POST['version']);
    $status ="disabled";
    // echo htmlspecialchars($description);
    // print_r ($description);
    $home = queryDbs("INSERT INTO application(name,version,apk, status) VALUES('$name', '$version', '$app', '$status')");
    if($home){
        echo "<h3 class='text-success'>Insert successfully</h2>";
    }else{
        echo "Fail to insert <br>". querryError();
    }
}

?>

