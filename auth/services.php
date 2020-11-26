<?php
include('db.php');
$errors =[];
if(empty($_POST['category'])){
    array_push($errors, "Category must selected");
}
if(empty($_POST['technology'])){
    array_push($errors, "Please specify which technoloy you are using");
}
foreach($errors as $error){
    echo $error."<br>";
}

if(count($errors)==0){
    $category = $_POST['category'];
    $technology = $_POST['technology'];
    $status = "enabled";
    $service = queryDbs("INSERT INTO services(category, technology, status) VALUES('$category', '$technology', '$status')");
    if($service){
        echo "<h3 class='text-success'>Insert successfully</h2>";
    }else{
        echo "Fail to insert <br>". querryError();
    }
}

?>