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

          
      if(isset($_POST['projectstatus'])){
        $id = $_POST['projectstatus'];
        $q = queryDbs("SELECT* FROM projects WHERE id = '$id' ");
        $data = data($q);
        echo '<div class="modal-content">
        <div class="modal-header">
           <div class ="modal-body">
                <h5>Are you sure you want enable <b> '. $data['project_name'] .'</h5>
           
           </div>
           <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          <div class="modal-footer">
       
           <form id="deleteclassconfirmform" action="confirmed.php" method="POST">
           <input type="hidden" value="'.$id.'" name="enableprojectstatus">
           <button class="btn btn-success btn-lg text-uppercase btnactivateexaminationconfirm" type="submit">enable</button>
           </form>
        </div>
          </div>';
        }
        if(isset($_POST['appearancestatus'])){
          $id = $_POST['appearancestatus'];
          $q = queryDbs("SELECT* FROM appearances WHERE id = '$id' ");
          $data = data($q);
          echo '<div class="modal-content">
          <div class="modal-header">
             <div class ="modal-body">
                  <h5>Are you sure you want enable <b> '. $data['bgcolor'] .'</h5>
             
             </div>
             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            <div class="modal-footer">
         
             <form id="deleteclassconfirmform" action="confirmed.php" method="POST">
             <input type="hidden" value="'.$id.'" name="enableappearancestatus">
             <button class="btn btn-success btn-lg text-uppercase btnactivateexaminationconfirm" type="submit">enable</button>
             </form>
          </div>
            </div>';
          }
  
        if(isset($_POST['projectstatusdisabled'])){
          $id = $_POST['projectstatusdisabled'];
          $q = queryDbs("SELECT* FROM projects WHERE id = '$id' ");
          $data = data($q);
          echo '<div class="modal-content">
          <div class="modal-header">
             <div class ="modal-body">
                  <h5>Are you sure you want disable <b> '. $data['project_name'] .'</h5>
             
             </div>
             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            <div class="modal-footer">
         
             <form id="deleteclassconfirmform" action="confirmed.php" method="POST">
             <input type="hidden" value="'.$id.'" name="disableprojectstatus">
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
        // project
        if(isset($_POST['projectdelete'])){
          $id = $_POST['projectdelete'];
          $q = queryDbs("SELECT* FROM projects WHERE id = '$id' ");
          $data = data($q);
          echo '<div class="modal-content">
          <div class="modal-header">
             <div class ="modal-body">
                  <h5>Are you sure you want delete <b>'.$data['project_name'] .'</b></h5>
             
             </div>
             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            <div class="modal-footer">
         
             <form id="deleteclassconfirmform" action="confirmed.php" method="POST">
             <input type="hidden" value="'.$id.'" name="projectdeleteconfirm">
             <button class="btn btn-danger btn-lg text-uppercase btnactivateexaminationconfirm" type="submit">delete</button>
             </form>
          </div>
            </div>';
          }

          if(isset($_POST['projectedit'])){
            $id = $_POST['projectedit'];
            $q = queryDbs("SELECT* FROM projects WHERE id = '$id' ");
            $data = data($q);
            echo '<div class="modal-content">
        <div class="modal-header">
        <div class ="modal-title">
        <h3>Edit <b>'. ucwords($data['project_name']) .'</h3>
   
   </div>
   </div>
          <div class="modal-body">
            <img src="'.$data['pictures'].'" style="width: 40%;" class="card-img" alt="'.ucwords($data['project_name']) .'">
            <p class="text-danger updateprojectformerror"></p>
            <form id="updateprojectform" enctype="multipart/form-data">
            <div class="form-group">
            <label for="usr">Project Picture:</label>
            <input type="file" class="form-control" name="picture" id="usr">
            </div>
            <div class="form-group">
            <label for="usr">Project Picture:</label>
            <input type="text" class="form-control" value="'. $data['project_name'] .'" name="name" id="usr">
            </div>

            <div class="form-group">
            <label for="comment">Project Description:</label>
            <textarea class="form-control textarea" name="description" rows="5" id="comment">'.$data['description'].'</textarea>
            </div>
       <input type="hidden" name="updateprojectform" value="updateprojectform">
       <input type="hidden" name="id" value="'.$data['id'].'">
       <button class="btn btn-success btn-lg mr-5 mt-3 float-right">Update</button>
 </form>                        
 </div>
        </div>
          </div>';
            }


            // apperance
            if(isset($_POST['appearanceedit'])){
              $id = $_POST['appearanceedit'];
              $q = queryDbs("SELECT* FROM appearances WHERE id = '$id' ");
              $data = data($q);
              echo '<div class="modal-content">
          <div class="modal-header">
          <div class ="modal-title">
          <h3>Edit <b>'. ucwords($data['bgcolor']) .'</h3>
     
     </div>
     </div>
            <div class="modal-body">
              <p class="text-danger updateapperanceformerror"></p>
                        <form id="updateapperanceform">
                          <div class="form-group">
                            <label for="usr">Body:</label>
                            <input type="color" class="form-control" value="'.$data['body'].'" name="body" id="usr">
                          </div>
                          <div class="form-group">
                            <label for="usr">Text:</label>
                            <input type="color" class="form-control"  value="'.$data['text'].'"  name="text" id="usr">
                          </div>
                          <div class="form-group">
                            <label for="usr">Navigtion Bar:</label>
                            <input type="color" class="form-control"  value="'.$data['navbar'].'"  name="navbar" id="usr">
                          </div>
                          <div class="form-group">
                            <label for="usr">Background Color:</label>
                            <input type="color" class="form-control" name="backgroundcolor"  value="'.$data['bgcolor'].'"  id="usr">
                          </div>
         <input type="hidden" name="updateapperanceform" value="updateapperanceform">
         <input type="hidden" name="id" value="'.$data['id'].'">
         <button class="btn btn-success btn-lg mr-5 mt-3 float-right">Update</button>
   </form>                        
   </div>
          </div>
            </div>';
              }


            if(isset($_POST['contactedit'])){
              $id = $_POST['contactedit'];
              $q = queryDbs("SELECT* FROM contacts WHERE id = '$id' ");
              $data = data($q);
              echo '<div class="modal-content">
          <div class="modal-header">
          <div class ="modal-title">
          <h3>Edit <b>'. ucwords($data['name']) .'</h3>
     
     </div>
     </div>
            <div class="modal-body">
              <p class="text-danger updatecontactformerror"></p>
              <form id="updatecontactform" enctype="multipart/form-data">
              <label for="">Contact Icon</label>
                          <select class="form-control" name="icon">
                            <option selected value="'.$data['icon'].'">'.$data['name'].'</option>
                            <option value="fab fa-facebook-square">Facebook</option>
                            <option value="fab fa-whatsapp-square">WhatsApp</option>
                            <option value="fab fa-github">Github</option>
                            <option value="fab fa-twitter-square">Twitter</option>
                            <option value="fab fa-linkedin">Linkedin</option>
                            <option value="fab fa-instagram">Instagram</option>

                          </select>
                          <div class="form-group">
                            <label for="usr">Name:</label>
                            <input type="text" class="form-control" value="'.$data['name'].'" name="name" id="usr">
                          </div>
                          <div class="form-group">
                            <label for="usr">Link:</label>
                            <input type="text" class="form-control" value="'.$data['link'].'" name="link" id="usr">
                          </div>
         <input type="hidden" name="updatecontactform" value="updatecontactform">
         <input type="hidden" name="id" value="'.$data['id'].'">
         <button class="btn btn-success btn-lg mr-5 mt-3 float-right">Update</button>
   </form>                        
   </div>
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


          // apperarance
          if(isset($_POST['appearancedelete'])){
            $id = $_POST['appearancedelete'];
            $q = queryDbs("SELECT* FROM appearances WHERE id = '$id' ");
            $data = data($q);
            echo '<div class="modal-content">
            <div class="modal-header">
               <div class ="modal-body">
                    <h5>Are you sure you want delete <b>'. $data['bgcolor'] .'</b></h5>
               
               </div>
               <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              <div class="modal-footer">
           
               <form id="deleteclassconfirmform" action="confirmed.php" method="POST">
               <input type="hidden" value="'.$id.'" name="appearancedeleteconfirm">
               <button class="btn btn-danger btn-lg text-uppercase btnactivateexaminationconfirm" type="submit">delete</button>
               </form>
            </div>
              </div>';
            }
          if(isset($_POST['contactdelete'])){
            $id = $_POST['contactdelete'];
            $q = queryDbs("SELECT* FROM contacts WHERE id = '$id' ");
            $data = data($q);
            echo '<div class="modal-content">
            <div class="modal-header">
               <div class ="modal-body">
                    <h5>Are you sure you want delete <b>'. $data['name'] .'</b></h5>
               
               </div>
               <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              <div class="modal-footer">
           
               <form id="deleteclassconfirmform" action="confirmed.php" method="POST">
               <input type="hidden" value="'.$id.'" name="contactdeleteconfirm">
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
        <div class ="modal-title">
        <h5>Edit <b> '. ucwords($data['greet']) .'</h5>
   
   </div>
   </div>

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

          if(isset($_POST['writerdelete'])){
            $id = $_POST['writerdelete'];
            $q = queryDbs("SELECT* FROM writer WHERE id = '$id' ");
            $data = data($q);
            echo '<div class="modal-content">
            <div class="modal-header">
               <div class ="modal-body">
                    <h5>Are you sure you want delete <b>'. $data['content'] .'</b></h5>
               
               </div>
               <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              <div class="modal-footer">
           
               <form id="deleteclassconfirmform" action="confirmed.php" method="POST">
               <input type="hidden" value="'.$id.'" name="writerdeletefirm">
               <button class="btn btn-danger btn-lg text-uppercase btnactivateexaminationconfirm" type="submit">delete</button>
               </form>
            </div>
              </div>';
            }

            if(isset($_POST['icondelete'])){
              $id = $_POST['icondelete'];
              $q = queryDbs("SELECT* FROM icons WHERE id = '$id' ");
              $data = data($q);
              echo '<div class="modal-content">
              <div class="modal-header">
                 <div class ="modal-body">
                      <h5>Are you sure you want delete <b>'. $data['name'] .'</b></h5>
                 
                 </div>
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                <div class="modal-footer">
             
                 <form id="deleteclassconfirmform" action="confirmed.php" method="POST">
                 <input type="hidden" value="'.$id.'" name="icondeletefirm">
                 <button class="btn btn-danger btn-lg text-uppercase btnactivateexaminationconfirm" type="submit">delete</button>
                 </form>
              </div>
                </div>';
              }


              if(isset($_POST['addressedit'])){
                $id = $_POST['addressedit'];
                $q = queryDbs("SELECT* FROM address WHERE id = '$id' ");
                $data = data($q);

                echo ' <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Update Address Settings</h4>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <p class="text-danger uppdateaddresserror"></p>
                  <form id="updateaddressform" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="usr">Phone Number</label>
                      <input type="text" class="form-control" value="'. $data['phone'] .'" name="phone" id="usr">
                  </div>
                  <div class="form-group">
                      <label for="usr">Email Address</label>
                      <input type="email" class="form-control"  value="'. $data['email'] .'" name="email" id="usr">
                  </div>
                  <div class="form-group">
                      <label for="usr">Contact Address:</label>
                      <textarea id="textarea" class="form-control textarea" placeholder="address" name="address">
                      '. html_entity_decode($data['address']) .'
                      </textarea>
                      <input type="hidden" name="updateaddressformconfirm" value="updateaddressform">
                      <input type="hidden" name="id" value="'.$data['id'].'">
                  </div>
                    <button class="btn btn-success btn-lg mr-5 mt-3 float-right">Add contact</button>
                  </form>
                </div>
              </div>';

              }

              if(isset($_POST['addressdelete'])){
                $id = $_POST['addressdelete'];
                $q = queryDbs("SELECT* FROM address WHERE id = '$id' ");
                $data = data($q);
                echo '<div class="modal-content">
                <div class="modal-header">
                   <div class ="modal-body">
                        <h5>Are you sure you want delete <b>'. htmlspecialchars_decode($data['address']) .'</b></h5>
                   
                   </div>
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  <div class="modal-footer">
               
                   <form id="deleteclassconfirmform" action="confirmed.php" method="POST">
                   <input type="hidden" value="'.$id.'" name="addressdeletefirm">
                   <button class="btn btn-danger btn-lg text-uppercase btnactivateexaminationconfirm" type="submit">delete</button>
                   </form>
                </div>
                  </div>';
                }


                if(isset($_POST['addressstatus'])){
                  $id = $_POST['addressstatus'];
                  $q = queryDbs("SELECT* FROM address WHERE id = '$id' ");
                  $data = data($q);
                  echo '<div class="modal-content">
                  <div class="modal-header">
                     <div class ="modal-body">
                          <h5>Are you sure you want enable <b> '. html_entity_decode($data['address']) .'</h5>
                     
                     </div>
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                    <div class="modal-footer">
                 
                     <form id="deleteclassconfirmform" action="confirmed.php" method="POST">
                     <input type="hidden" value="'.$id.'" name="enableaddressstatus">
                     <button class="btn btn-success btn-lg text-uppercase btnactivateexaminationconfirm" type="submit">enable</button>
                     </form>
                  </div>
                    </div>';
                  }
    
?>



<script src="auth.js"></script>
