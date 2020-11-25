<?php
include('db.php');
if(isset($_POST['homestatus'])){
    $id = $_POST['homestatus'];
    $q = queryDbs("SELECT* FROM home WHERE id = '$id' ");
    $data = data($q);
    echo '<div class="modal-content">
    <div class="modal-header">
       <div class ="modal-body">
            <h5>Are you sure you want enable <b>'. ucwords($data['greet']) .'</b> </h5>
       
       </div>
       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      <div class="modal-footer">
   
       <form id="deleteclassconfirmform" action="confirmed.php" method="POST">
       <input type="hidden" value="'.$id.'" name="enablehomestatus">
       <button class="btn btn-success btn-lg text-uppercase btnactivateexaminationconfirm" type="submit">enable</button>
       </form>
    </div>
      </div>';
    }


    if(isset($_POST['homedelete'])){
      $id = $_POST['homedelete'];
      $q = queryDbs("SELECT* FROM home WHERE id = '$id' ");
      $data = data($q);
      echo '<div class="modal-content">
      <div class="modal-header">
         <div class ="modal-body">
              <h5>Are you sure you want delete <b>'. ucwords($data['greet']) .'</b> </h5>
         
         </div>
         <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        <div class="modal-footer">
     
         <form id="deleteclassconfirmform" action="confirmed.php" method="POST">
         <input type="hidden" value="'.$id.'" name="enablehomedelete">
         <button class="btn btn-danger btn-lg text-uppercase btnactivateexaminationconfirm" type="submit">delete</button>
         </form>
      </div>
        </div>';
      }
?>

