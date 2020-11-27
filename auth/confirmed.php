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

// apperacnec
if(isset($_POST['enableappearancestatus'])){
    $id = $_POST['enableappearancestatus'];
$currentstatus = "enabled";
$status = "disabled";

$q = queryDbs("UPDATE appearances SET status = '$status' ");
if($q){
    $cu = queryDbs("UPDATE appearances SET status='$currentstatus' WHERE id='$id' ");
    if($cu){
        rediret("dashboard.php");
    }
}else{
    echo " Fail to Update ". querryError();
}

}
if(isset($_POST['updateapperanceform'])){
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
    $appearance = queryDbs("UPDATE  appearances SET body='$body', text='$text', navbar='$navbar', bgcolor='$bgcolor'");
    if($appearance){
        echo "<h3 class='text-success'>Insert successfully</h2>";
    }else{
        echo "Fail to insert <br>". querryError();
    }
}
}
// service enable
if(isset($_POST['enableservicestatus'])){
    $id = $_POST['enableservicestatus'];
$currentstatus = "enabled";
$cu = queryDbs("UPDATE services SET status='$currentstatus' WHERE id='$id' ");
    if($cu){
        rediret("dashboard.php");
    }


}
// service enable
if(isset($_POST['disableservicestatus'])){
    $id = $_POST['disableservicestatus'];
$currentstatus = "disabled";
$cu = queryDbs("UPDATE services SET status='$currentstatus' WHERE id='$id' ");
    if($cu){
        rediret("dashboard.php");
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

// project



// service enable
if(isset($_POST['enableprojectstatus'])){
$id = $_POST['enableprojectstatus'];
$currentstatus = "enabled";
$cu = queryDbs("UPDATE projects SET status='$currentstatus' WHERE id='$id' ");
if($cu){
    rediret("dashboard.php");
}


}
// service enable
if(isset($_POST['disableprojectstatus'])){
$id = $_POST['disableprojectstatus'];
$currentstatus = "disabled";
$cu = queryDbs("UPDATE projects SET status='$currentstatus' WHERE id='$id' ");
if($cu){
    rediret("dashboard.php");
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



    if(isset($_POST['servicedeleteconfirm'])){
        $id = $_POST['servicedeleteconfirm'];
        $q = queryDbs("DELETE FROM home WHERE id = '$id' ");
        if($q){
            rediret("dashboard.php");
        }
    }

    if(isset($_POST['appearancedeleteconfirm'])){
        $id = $_POST['appearancedeleteconfirm'];
        $q = queryDbs("DELETE FROM appearances WHERE id = '$id' ");
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
    $backgroundPicture="";
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
// about

if(isset($_POST['updateaboutform'])){
    $id = $_POST['id'];
    $q = queryDbs("SELECT* FROM about WHERE id ='$id'");
    $da = data($q);
    $profile = $da['profile_picture'];
    $background = $da['background_picture'];
    $errors =[];
    $target_dir = "profile_picture/";
    $profilePicture = "";
    $backgroundPicture="";
    $uploadOk = 1;
    
    if(strlen($_POST['description']) < 5){
        array_push($errors, "Description must not be empty");
    }
    if($_FILES['profilepicture']['size']!=0){

        $check = getimagesize($_FILES["profilepicture"]["tmp_name"]);
        if($check == false) {
            array_push($errors, "Profile picture is not an image");
            $uploadOk = 0;
        } 
    
    $target_file = $target_dir . basename($_FILES["profilepicture"]["name"]);
    
    // Check if file already exists
    if (file_exists($target_file)) {
        array_push($errors, "Sorry, Profile file already exists.");
        $uploadOk = 0;
    }
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
    && $imageFileType != "GIF" ) {
        array_push($errors, "Sorry, Profile picture only JPG, JPEG, PNG & GIF files are allowed.");
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

    if($_FILES['backgroundpicture']['size']!=0){

        $check = getimagesize($_FILES["profilepicture"]["tmp_name"]);
        if($check == false) {
            array_push($errors, "File is not an image");
            $uploadOk = 0;
        } 
    
    $target_file = $target_dir . basename($_FILES["backgroundpicture"]["name"]);
    
    // Check if file already exists
    if (file_exists($target_file)) {
        array_push($errors, "Sorry, background picture already exists.");
        $uploadOk = 0;
    }
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
    && $imageFileType != "GIF" ) {
        array_push($errors, "Sorry, Background Picture expect only JPG, JPEG, PNG & GIF files are allowed.");
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
        if($uploadOk == 1){
        move_uploaded_file($_FILES["backgroundpicture"]["tmp_name"], $target_file) ;
        $backgroundPicture =$target_file;
        unlink($background);
        }
    }else{
        $backgroundPicture= $background;
    }
        
    
    
    foreach($errors as $error){
        echo $error ."<br>";
    }
    if(count($errors)==0){
        $picture = $profilePicture;
        $background = $backgroundPicture;
        $description = test_input($_POST['description']);
        $home = queryDbs("UPDATE about SET background_picture='$background', description='$description', profile_picture='$picture' ");
        if($home){
            echo "<h3 class='text-success'>Insert successfully</h2>";
        }else{
            echo "Fail to insert <br>". querryError();
        }

}
}


if(isset($_POST['updateserviceform'])){
    $id = $_POST['id'];
    $errors = [];

    if(empty($_POST['category'])){
        array_push($errors, "Category must selected");
    }
    if(empty($_POST['technology'])){
        array_push($errors, "Please specify which technoloy you are using");
    }
    
    foreach($errors as $error){
        echo $error ."<br>";
    }
    if(count($errors)==0){
        $category = $_POST['category'];
        $technology = $_POST['technology'];
        $service = queryDbs("UPDATE services SET category='$category', technology='$technology' WHERE id='$id'");
        if($service){
            echo "<h3 class='text-success'>Insert successfully</h2>";
        }else{
            echo "Fail to insert <br>". querryError();
        }

}
}

if(isset($_POST['updateprojectform'])){
    $id = $_POST['id'];
    $q = queryDbs("SELECT* FROM projects WHERE id ='$id'");
    $da = data($q);
    $profilep = $da['pictures'];
    $desc = $da['description'];

    $errors =[];
if(empty($_POST['name'])){
    array_push($errors, "Please specify project name");
}


if(empty($_POST['description'])){
    array_push($errors, "Please described your project");
}
$target_dir = "project/";
$picture = "";
$uploadOk = 1;
if($_FILES['picture']['size']!=0){
if($_FILES['picture']['size']!=0 && !empty($_POST['name'] && $_POST['description'])){

    $check = getimagesize($_FILES["picture"]["tmp_name"]);
    if($check == false) {
        array_push($errors, "Profile picture is not an image");
        $uploadOk = 0;
    } 

$target_file = $target_dir . basename($_FILES["picture"]["name"]);

// Check if file already exists
if (file_exists($target_file)) {
    array_push($errors, "Sorry,picture already exists.");
    $uploadOk = 0;
}
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
&& $imageFileType != "GIF" ) {
    array_push($errors, "Sorry, Picture expect only JPG, JPEG, PNG & GIF files are allowed.");
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
    if($uploadOk == 1){
    move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file) ;
    $profile =$target_file;
    unlink($profilep);
    }
}
}else{
    $profile = $profilep;
}


foreach($errors as $error){
    echo $error ."<br>";
}

if(count($errors)==0){
    $picture = $profile;
    $name = test_input($_POST['name']);
    $description = test_input($_POST['description']);
    $status ="enabled";
    $home = queryDbs("UPDATE projects SET project_name ='$name', pictures='$picture', description='$description' ");
    if($home){
        echo "<h3 class='text-success'>Insert successfully</h2>";
    }else{
        echo "Fail to insert <br>". querryError();
    }
}



}
// delete project
if(isset($_POST['projectdeleteconfirm'])){
    $id = $_POST['projectdeleteconfirm'];
    $d = queryDbs("SELECT* FROM projects WHERE id ='$id' ");
    $da = data($d);
    $profile = $da['pictures'];
    $desc = $da['description'];
    $dom = new \DOMDocument();

    $dom->loadHTML(html_entity_decode($desc), libxml_use_internal_errors(true));
            $images = $dom->getElementsByTagName('img');
            foreach ($images as $image) {
                $src = $image->getAttribute('src');
                unlink($src);
            }
    unlink($profile);

    $q = queryDbs("DELETE FROM projects WHERE id = '$id' ");
    if($q){
        rediret("dashboard.php");
    }
}
// contact
if(isset($_POST['contactdeleteconfirm'])){
    $id = $_POST['contactdeleteconfirm'];
    $q = queryDbs("DELETE FROM contacts WHERE id = '$id' ");
    if($q){
        rediret("dashboard.php");
    }
}

if(isset($_POST['updatecontactform'])){
    $id = $_POST['updatecontactform'];
    $errors = [];
    if(empty($_POST['icon'])){
        $errors[]="Please choose contact icon";
    }
    if(empty($_POST['link'])){
        $errors[]="Plese enter the contact link";
    }
    if(empty($_POST['name'])){
        $errors[]="Plese enter the contact name";
    }
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$_POST['link'])){
        $errors[] ="Valid URL is require";
    }
    foreach($errors as $error){
        echo $error ."<br>";
    }
    
    if(count($errors)==0){
        $name = test_input($_POST['name']);
        $icon = test_input($_POST['icon']);
        $link = test_input($_POST['link']);

        $home = queryDbs("UPDATE contacts SET name ='$name', icon='$icon', link='$link' ");
        if($home){
            echo "<h3 class='text-success'>Insert successfully</h2>";
        }else{
            echo "Fail to insert <br>". querryError();
        }
    }
   
}
?>