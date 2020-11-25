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

?>