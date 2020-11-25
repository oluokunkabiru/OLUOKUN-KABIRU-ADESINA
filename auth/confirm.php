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



      if(isset($_POST['homeedit'])){
        $id = $_POST['homeedit'];
        $q = queryDbs("SELECT* FROM home WHERE id = '$id' ");
        $data = data($q);
        echo '<div class="modal-content">
        <div class="modal-header">
          <div class="modal-body">
            <p class="text-danger updatehomedformerror"></p>
 <form id="updatehomeform" enctype="multipart/form-data">
  <img src="'.$data['profile_picture'].'" style="width: 40%;" class="card-img" alt="'.ucwords($data['greet']) .'">
     <div class="form-group">
         <label for="usr">Greeting:</label>
         <input type="text" name="greet" class="form-control" value="'.$data['greet'].'" id="usr">
       </div>
       <div class="form-group">
         <label for="comment">Description:</label>
         <textarea class="form-control textarea" name="description" rows="5" id="comment">'. html_entity_decode($data['description']).'</textarea>
       </div> 
       <input type="hidden" name="updatehomeform" value="updatehomeform">
       <input type="hidden" name="id" value="'.$data['id'].'">

       <div class="form-group">
         <label for="usr">Profile Picture:</label>
         <input type="file" class="form-control" name="profilepicture" id="usr">
       </div>
       <button class="btn btn-success btn-lg mr-5 mt-3 float-right">Update</button>
 </form>                        
 </div>
        </div>
          </div>';
        }
?>

<script src="auth.js"></script>
