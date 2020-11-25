<?php
if(isset($_POST['src'])){
    $file = $_POST['src'];
    $folder = "postfiles/";

$name = $folder.basename($file);
unlink($name);
    // unlink($file);
}

?>