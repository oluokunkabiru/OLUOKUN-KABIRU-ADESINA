<?php
$server = "localhost";
$user = "root";
$password = "";
$databasename ="portfolio";
$conn = mysqli_connect($server, $user, $password, $databasename);

 function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = str_replace("'", "&apos;", $data);
    $data = htmlspecialchars($data);
    return $data;
  }

function queryDbs($datas){
    return mysqli_query($GLOBALS['conn'], $datas);
}
function data($data){
    return mysqli_fetch_array($data);
}
function rediret($data){
    return header("location:$data");
}


function inputText($text){
    return test_input($text);
}
function querryError(){
    return mysqli_error($GLOBALS['conn']);
}
function fileupload($image){
    $return_value = "";

if ($_FILES[$image]['name']) {
if (!$_FILES[$image]['error']) {
$ext = explode('.', $_FILES[$image]['name']);
$name =$ext[0]."_".time();
$filename = $name . '.' . $ext[1];
$folder = "postfiles/";
if(!is_dir($folder)){
    mkdir($folder);
}
$destination = $folder . $filename;
$location = $_FILES[$image]["tmp_name"];
move_uploaded_file($location, $destination);
$return_value = $destination;
}else{
$return_value = 'Ooops! Your upload triggered the following error: '.$_FILES[$image]['error'];
}
}

return $return_value;
}

?>