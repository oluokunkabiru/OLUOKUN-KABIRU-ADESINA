<?php
include ('db.php');
    if(isset($_POST['enablehomestatus'])){
        $id = $_POST['enablehomestatus'];
        $currentstatus = "enabled";
        $status = "disabled";

        $q = queryDbs("UPDATE home SET status = '$status' ");
        if($q){
            $cu = queryDbs("UPDATE home SET status='$currentstatus' WHERE id='$id' ");
            if($cu){
                rediret("dashboard.php");
            }
        }else{
            echo " Fail to Update ". querryError();
        }

    }
    if(isset($_POST['enableaboutstatus'])){
        $id = $_POST['enableaboutstatus'];
    $currentstatus = "enabled";
    $status = "disabled";

    $q = queryDbs("UPDATE about SET status = '$status' ");
    if($q){
        $cu = queryDbs("UPDATE about SET status='$currentstatus' WHERE id='$id' ");
        if($cu){
            rediret("dashboard.php");
        }
    }else{
        echo " Fail to Update ". querryError();
    }

}


    if(isset($_POST['enablehomedelete'])){
        $id = $_POST['enablehomedelete'];
        $d = queryDbs("SELECT* FROM home WHERE id ='$id' ");
        $da = data($d);
        $img = $da['profile_picture'];
        $desc = $da['description'];
        $dom = new \DOMDocument();

        $dom->loadHTML(html_entity_decode($desc), libxml_use_internal_errors(true));
                $images = $dom->getElementsByTagName('img');
                foreach ($images as $image) {
                    $src = $image->getAttribute('src');
                    unlink($src);
                }
        unlink($img);

        $q = queryDbs("DELETE FROM home WHERE id = '$id' ");
        if($q){
            rediret("dashboard.php");
        }
    }

    if(isset($_POST['aboutdeleteconfirm'])){
        $id = $_POST['aboutdeleteconfirm'];
        $d = queryDbs("SELECT* FROM about WHERE id ='$id' ");
        $da = data($d);
        $profile = $da['profile_picture'];
        $background = $da['background_picture'];
        $desc = $da['description'];
        $dom = new \DOMDocument();

        $dom->loadHTML(html_entity_decode($desc), libxml_use_internal_errors(true));
                $images = $dom->getElementsByTagName('img');
                foreach ($images as $image) {
                    $src = $image->getAttribute('src');
                    unlink($src);
                }
        unlink($profile);
        unlink($background);

        $q = queryDbs("DELETE FROM about WHERE id = '$id' ");
        if($q){
            rediret("dashboard.php");
        }
    }

if(isset($_POST['updatehomeform'])){
    $id = $_POST['id'];
    $q = queryDbs("SELECT* FROM home WHERE id ='$id'");
    $da = data($q);
    $profile = $da['profile_picture'];
    $errors =[];
    $target_dir = "profile_picture/";
    $profilePicture = "";
    $uploadOk = 1;
    if(empty($_POST['greet'])){
        array_push($errors, "Greet must not be empty");
    }
    if(strlen($_POST['description']) < 5){
        array_push($errors, "Description must not be empty");
    }
    if($_FILES['profilepicture']['size']!=0){

        $check = getimagesize($_FILES["profilepicture"]["tmp_name"]);
        if($check == false) {
            array_push($errors, "File is not an image");
            $uploadOk = 0;
        } 
    
    $target_file = $target_dir . basename($_FILES["profilepicture"]["name"]);
    
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
        unlink($profile);
        }
    }else{
        $profilePicture = $profile;
    }
        
    
    
    foreach($errors as $error){
        echo $error ."<br>";
    }
    if(count($errors)==0){
        $picture = $profilePicture;
        $greet = test_input($_POST['greet']);
        $description = test_input($_POST['description']);
        $home = queryDbs("UPDATE home SET greet='$greet', description='$description', profile_picture='$picture' ");
        if($home){
            echo "<h3 class='text-success'>Insert successfully</h2>";
        }else{
            echo "Fail to insert <br>". querryError();
        }

}
}

    
?>