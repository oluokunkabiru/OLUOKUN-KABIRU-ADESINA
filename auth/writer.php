<?php
include('db.php');
if(isset($_POST['writercontent'])){
    if(empty($_POST['writercontent'])){
      echo "Writer must not be empty";
    }
    if(!empty($_POST['writercontent'])){
      $content = test_input($_POST['writercontent']);
      $q = queryDbs("INSERT INTO writer(content) VALUES('$content')");
      if($q){
        echo "<h3 class='text-success'>Insert successfully</h2>";
    }else{
        echo "Fail to insert <br>". querryError();
    }

    }
  }
?>