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
    if(isset($_POST['aboutstatus'])){
      $id = $_POST['aboutstatus'];
      $q = queryDbs("SELECT* FROM about WHERE id = '$id' ");
      $data = data($q);
      echo '<div class="modal-content">
      <div class="modal-header">
         <div class ="modal-body">
              <h5>Are you sure you want enable </h5>
              <img src="'.$data['profile_picture'].'" style="width: 40%;" class="card-img">
         
         </div>
         <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        <div class="modal-footer">
     
         <form id="deleteclassconfirmform" action="confirmed.php" method="POST">
         <input type="hidden" value="'.$id.'" name="enableaboutstatus">
         <button class="btn btn-success btn-lg text-uppercase btnactivateexaminationconfirm" type="submit">enable</button>
         </form>
      </div>
        </div>';
      }


      if(isset($_POST['servicestatus'])){
        $id = $_POST['servicestatus'];
        $q = queryDbs("SELECT* FROM services WHERE id = '$id' ");
        $data = data($q);
        echo '<div class="modal-content">
        <div class="modal-header">
           <div class ="modal-body">
                <h5>Are you sure you want enable <b> '. $data['technology'] .'</h5>
           
           </div>
           <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          <div class="modal-footer">
       
           <form id="deleteclassconfirmform" action="confirmed.php" method="POST">
           <input type="hidden" value="'.$id.'" name="enableservicestatus">
           <button class="btn btn-success btn-lg text-uppercase btnactivateexaminationconfirm" type="submit">enable</button>
           </form>
        </div>
          </div>';
        }

        if(isset($_POST['servicestatusdisabled'])){
          $id = $_POST['servicestatusdisabled'];
          $q = queryDbs("SELECT* FROM services WHERE id = '$id' ");
          $data = data($q);
          echo '<div class="modal-content">
          <div class="modal-header">
             <div class ="modal-body">
                  <h5>Are you sure you want disable <b> '. $data['technology'] .'</h5>
             
             </div>
             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            <div class="modal-footer">
         
             <form id="deleteclassconfirmform" action="confirmed.php" method="POST">
             <input type="hidden" value="'.$id.'" name="disableservicestatus">
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

      if(isset($_POST['aboutdelete'])){
        $id = $_POST['aboutdelete'];
        $q = queryDbs("SELECT* FROM about WHERE id = '$id' ");
        $data = data($q);
        echo '<div class="modal-content">
        <div class="modal-header">
           <div class ="modal-body">
                <h5>Are you sure you want delete</h5>
           
           </div>
           <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          <div class="modal-footer">
       
           <form id="deleteclassconfirmform" action="confirmed.php" method="POST">
           <input type="hidden" value="'.$id.'" name="aboutdeleteconfirm">
           <button class="btn btn-danger btn-lg text-uppercase btnactivateexaminationconfirm" type="submit">delete</button>
           </form>
        </div>
          </div>';
        }

        if(isset($_POST['servicedelete'])){
          $id = $_POST['servicedelete'];
          $q = queryDbs("SELECT* FROM services WHERE id = '$id' ");
          $data = data($q);
          echo '<div class="modal-content">
          <div class="modal-header">
             <div class ="modal-body">
                  <h5>Are you sure you want delete <b>'. $data['technology'] .'</b></h5>
             
             </div>
             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            <div class="modal-footer">
         
             <form id="deleteclassconfirmform" action="confirmed.php" method="POST">
             <input type="hidden" value="'.$id.'" name="servicedeleteconfirm">
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

        if(isset($_POST['serviceedit'])){
          $id = $_POST['serviceedit'];
          $q = queryDbs("SELECT* FROM services WHERE id = '$id' ");
          $data = data($q);
          echo '<div class="modal-content">
          <div class="modal-header">
                        <h4 class="modal-title">Update Services</h4>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
            <div class="modal-body">
              <p class="text-danger updateserviceformerror"></p>
              <p class="serviceformerror text-danger text-center"></p>
              <div class="modal-body">
                <form id="updateserviceform">
                  <label for="">Technology Category</label>
                  <select class="form-control" name="category">
                    <option selected value="'.$data['category'] .'">'. ucfirst($data['category']) .'</option>
                    <option value="frontend">Front End</option>
                    <option value="backend">Backend</option>
                    <option value="framework">Framework</option>
                  </select>

                  <div class="form-group">
                    <label for="usr">Technology:</label>
                    <input type="text" class="form-control" value="'. ucwords($data['technology']) .'" name="technology" id="usr">
                  </div>
                  <input type="hidden" name="updateserviceform" value="updateserviceform">
                  <input type="hidden" name="id" value="'.$data['id'].'">
                  <button class="btn btn-success btn-lg mr-5 mt-3 float-right">Update</button>
                </form>    
   </div>
          </div>
            </div>';
          }


        if(isset($_POST['aboutedit'])){
          $id = $_POST['aboutedit'];
          $q = queryDbs("SELECT* FROM about WHERE id = '$id' ");
          $data = data($q);
          echo '<div class="modal-content">
          <div class="modal-header">
            <div class="modal-body">
              <p class="text-danger updateaboutformerror"></p>
   <form id="updateaboutform" enctype="multipart/form-data">
       <div class="form-group">
           <label for="usr">background picture:</label><br>
           <img src="'.$data['background_picture'].'" style="width: 40%;" class="card-img">
          </div>
          <div class="form-group">
            <label for="usr">Profile Picture:</label><br>
            <img src="'.$data['profile_picture'].'" style="width: 40%;" class="card-img">
           </div>

           <div class="form-group">
            <label for="usr">Profile Picture:</label>
            <input type="file" class="form-control" name="profilepicture" id="usr">
          </div>
          <div class="form-group">
            <label for="usr">Background Picture:</label>
            <input type="file" class="form-control" name="backgroundpicture" id="usr">
          </div>
         <div class="form-group">
           <label for="comment">Description:</label>
           <textarea class="form-control textarea" name="description" rows="5" id="comment">'. html_entity_decode($data['description']).'</textarea>
         </div> 
         <input type="hidden" name="updateaboutform" value="updateaboutform">
         <input type="hidden" name="id" value="'.$data['id'].'">
         <button class="btn btn-success btn-lg mr-5 mt-3 float-right">Update</button>
   </form>                        
   </div>
          </div>
            </div>';
          }
?>

<script src="auth.js"></script>
