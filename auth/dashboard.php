<?php
session_start();
if (!empty($_SESSION['loginsuccess'])) {
  $user  = $_SESSION['loginsuccess'];
  include('db.php');

  $colo ="#fff000";
  $newcolor="";
  function revcolor($data){
    $re = str_replace("#", "", $data);
    $r = substr($re, 0,2);
    $g = substr($re, 2,2);
    $b = substr($re, 4,2);
    $r1 = base_convert($r,16,10);
    $g1 = base_convert($g,16,10);
    $b1 = base_convert($b,16,10);
    $r2 = 255-$r1;
    $g2 = 255-$g1;
    $b2 = 255-$b1;
    $r3 = str_pad(base_convert($r2,10,16), 2,"0");
    $g3 = str_pad(base_convert($g2,10,16), 2,"0");
    $b3 = str_pad(base_convert($b2,10,16), 2,"0");

    $orinal ="rgb($r1, $g1, $b1)";
    $new = "#".$r3.$g3.$b3;
  }
  $color = revcolor($colo);
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- <link rel="stylesheet" href="../bootstrap/bootstrap.min.css"> -->
    
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> 
  <!-- include summernote css/js -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    
    <link rel="stylesheet" href="../bootstrap/animate.css">
    <link rel="stylesheet" href="../fontawesome-free/css/all.css">
    <!-- <link rel="stylesheet" href="summernote/summernote-bs4.css"> -->
    <link rel="stylesheet" href="../style.php">
    <link rel="icon" href="../image/9.jpg">
    <link rel="manifest" href="../manifest.jso">
  </head>
  </head>

  <body>
    <div class="container-fluid">
      <div class="jumbotron">
        <nav class="navbar navbar-expand-md">
          <!-- Brand -->
          <!-- Toggler/collapsibe Button -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon text-light">Menu</span>
          </button>

          <!-- Navbar links -->
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="nav nav-pills  nav-justified " role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#home">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#about">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#services">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#recentproject">Recent Project</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#contact">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#appearance">Appearance</a>
              </li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Others</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" data-toggle="pill" href="#writer">Writer</a>
                <a class="dropdown-item" data-toggle="pill" href="#icon">Icons</a>
                <a class="dropdown-item" data-toggle="pill" href="#androidapp">Android</a>
                <a class="dropdown-item" data-toggle="pill" href="#address">Address and Contact</a>
              </div>
            </li>
              <li class="nav-item">
                <a class="nav-link ml-5" href="../">Home</a>
              </li>
            </ul>
          </div>
        </nav>
        <h1><?php echo $color ?></h1>
        <!-- Tab panes -->
        <div class="tab-content">
          <div id="home" class="container tab-pane active">

            <div class="card">
              <div class="card-header">
                <div class="card-title">
                  <h3 class="text-center text-uppercase">Home settings</h3>
                </div>
              </div>
              <div class="card-body">
                <a href="#addhomedescription" data-toggle="modal" class="btn btn-primary p-2 text-uppercase">add home settings</a>
                <table class="table table-bordered table-striped table-hover table-responsive">
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Greet</th>
                      <th>Description</th>
                      <th>Profile Picture</th>
                      <th>Status</th>
                      <th>Date Added</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $ho = 1;
                    $h = queryDbs("SELECT* FROM home");
                    while ($home = data($h)) {


                    ?>
                      <tr>
                        <td><?php echo $ho; ?></td>
                        <td><?php echo html_entity_decode($home['greet']); ?></td>
                        <td><?php echo html_entity_decode($home['description']); ?></td>
                        <td><img src="<?php echo $home['profile_picture']; ?>" style="width: 30%;" alt=""></td>

                        <td>
                          <?php
                          if ($home['status'] == "enabled") {
                          ?>

                            <h4> <a href="#homestatus" class="text-success" data-toggle="modal" home="<?php echo $home['id'] ?>">Enabled<span class="text-success mr-2 fa fa-check"></span></a></h4>
                          <?php
                          } else {
                          ?>
                            <h4> <a href="#homestatus" class="text-danger" data-toggle="modal" home="<?php echo $home['id'] ?>">Disabled<span class="text-danger mr-2 fa fa-window-close"></span></a></h4>

                          <?php } ?>
                        </td>
                        <td><?php echo $home['reg_date']; ?></td>
                        <td>


                          <a href="#homeedit" class=" btn btn-primary" data-toggle="modal" home="<?php echo $home['id'] ?>"><span class="p-2 m-1 fa fa-edit"></span></a>
                          <a href="#homedelete" class=" btn btn-danger" data-toggle="modal" home="<?php echo $home['id'] ?>"><span class="p-2 m-1 fa fa-trash"></span></a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>


              </div>
            </div>
            <div class="modal" id="addhomedescription">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Add Home Descripion</h4>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <p class="text-danger homedformerror"></p>
                    <form id="homeform" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="usr">Greeting:</label>
                        <input type="text" name="greet" class="form-control" id="usr">
                      </div>
                      <div class="form-group">
                        <label for="comment">Description:</label>
                        <textarea class="form-control textarea" name="description" rows="5" id="comment"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="usr">Profile Picture:</label>
                        <input type="file" class="form-control" name="profilepicture" id="usr">
                      </div>
                      <button class="btn btn-success btn-lg mr-5 mt-3 float-right">Add</button>
                    </form>
                  </div>
                </div>
              </div>

            </div>


          </div>
          <div id="about" class="container tab-pane fade">
            <div class="card">
              <div class="card-header">
                <div class="card-title">
                  <h3 class="text-center text-uppercase">About settings</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="card-body">
                  <a href="#addabout" data-toggle="modal" class="btn btn-primary p-2 text-uppercase">add home settings</a>
                  <table class="table table-bordered table-striped table-hover table-responsive">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Background Picture</th>
                        <th>Profile Picture</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Date Added</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $ho = 1;
                      $h = queryDbs("SELECT* FROM about");
                      while ($home = data($h)) {


                      ?>
                        <tr>
                          <td><?php echo $ho; ?></td>
                          <td><img src="<?php echo $home['background_picture']; ?>" style="width: 30%;" alt=""></td>

                          <td><img src="<?php echo $home['profile_picture']; ?>" style="width: 30%;" alt=""></td>
                          <td><?php echo html_entity_decode($home['description']); ?></td>
                          <td>
                            <?php
                            if ($home['status'] == "enabled") {
                            ?>

                              <h4> <a href="#aboutstatus" class="text-success" data-toggle="modal" about="<?php echo $home['id'] ?>">Enabled<span class="text-success mr-2 fa fa-check"></span></a></h4>
                            <?php
                            } else {
                            ?>
                              <h4> <a href="#aboutstatus" class="text-danger" data-toggle="modal" about="<?php echo $home['id'] ?>">Disabled<span class="text-danger mr-2 fa fa-window-close"></span></a></h4>

                            <?php } ?>
                          </td>
                          <td><?php echo $home['reg_date']; ?></td>
                          <td>


                            <a href="#aboutedit" class=" btn btn-primary" data-toggle="modal" about="<?php echo $home['id'] ?>"><span class="p-2 m-1 fa fa-edit"></span></a>
                            <a href="#aboutdelete" class=" btn btn-danger" data-toggle="modal" about="<?php echo $home['id'] ?>"><span class="p-2 m-1 fa fa-trash"></span></a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>


                </div>
              </div>
              <div class="modal" id="addabout">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Add About Settings</h4>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <p class="text-danger aboutformerror"></p>
                      <form id="aboutform" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="usr">Profile Picture:</label>
                          <input type="file" class="form-control" name="profilepicture" id="usr">
                        </div>
                        <div class="form-group">
                          <label for="usr">Background Picture:</label>
                          <input type="file" class="form-control" name="backgroundpicture" id="usr">
                        </div>

                        <div class="form-group">
                          <label for="comment">Description Messages:</label>
                          <textarea class="form-control textarea" name="description" rows="5" id="comment"></textarea>
                        </div>

                        <button class="btn btn-success btn-lg mr-5 mt-3 float-right">Add About</button>
                      </form>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div id="services" class="container tab-pane fade">
            <div class="card">
              <div class="card-header">
                <div class="card-title">
                  <h3 class="text-center text-uppercase">Services settings</h3>
                </div>
              </div>
              <div class="card-body">
                <a href="#addservices" data-toggle="modal" class="btn btn-primary text-uppercase">add services</a>
                <table class="table table-bordered table-striped table-hover table-responsive">
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Technology</th>
                      <th>Category</th>
                      <th>Status</th>
                      <th>Date Added</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      $ho = 1;
                      $h = queryDbs("SELECT* FROM services");
                      while ($home = data($h)) {


                      ?>
                    <tr>
                      <td><?php echo $ho  ?></td>
                      <td><?php echo ucwords($home['technology']) ?></td>
                      <td><?php echo ucwords ( $home['category'])  ?></td>
                      <td>
                            <?php
                            if ($home['status'] == "enabled") {
                            ?>

                              <h4 class="text-success ">Enabled<span class="mr-2 fa fa-check"></span></h4>
                            <?php
                            } else {
                            ?>
                              <h4 class="text-danger "> Disabled<span class="mr-2 fa fa-window-close"></a></h4>

                            <?php } ?>
                          </td>
                          <td><?php echo $home['reg_date']; ?></td>
                          <td>

                          <?php
                            if ($home['status'] != "enabled") {
                            ?>

                              <h4> <a href="#servicestatus" class="text-success m-2" data-toggle="modal" service="<?php echo $home['id'] ?>">Enabled</a></h4>
                            <?php
                            } else {
                            ?>
                              <h4> <a href="#servicestatusdisable" class="text-danger m-2" data-toggle="modal" servicedisabled="<?php echo $home['id'] ?>">Disabled</span></a></h4>

                            <?php } ?>

                            <a href="#serviceedit" class=" btn btn-primary" data-toggle="modal" service="<?php echo $home['id'] ?>"><span class="p-2 m-1 fa fa-edit"></span></a>
                            <a href="#servicedelete" class=" btn btn-danger" data-toggle="modal" service="<?php echo $home['id'] ?>"><span class="p-2 m-1 fa fa-trash"></span></a>
                          </td>


                        </tr>
                      <?php } ?>
                  </tbody>
                </table>

                <div class="modal" id="addservices">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Add Services</h4>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>

                      <!-- Modal body -->
                      <p class="serviceformerror text-danger text-center"></p>
                      <div class="modal-body">
                        <form id="serviceform">
                          <label for="">Technology Category</label>
                          <select class="form-control" name="category">
                            <option value="">Select Category</option>
                            <option value="frontend">Front End</option>
                            <option value="backend">Backend</option>
                            <option value="framework">Framework</option>
                          </select>

                          <div class="form-group">
                            <label for="usr">Technology:</label>
                            <input type="text" class="form-control" name="technology" id="usr">
                          </div>
                          <button class="btn btn-success btn-lg mr-5 mt-3 float-right">Add Services</button>
                        </form>
                      </div>
                    </div>
                  </div>

                </div>

              </div>
            </div>
          </div>
          <div id="recentproject" class="container tab-pane fade">
            <div class="card">
              <div class="card-header">
                <div class="card-title">
                  <h3 class="text-center text-uppercase">Recent Project settings</h3>
                </div>
              </div>
              <div class="card-body">
                <a href="#addproject" data-toggle="modal" class="btn btn-primary text-uppercase">add services</a>
                <table class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Project Name</th>
                      <th>Project Picture</th>
                      <th>Description</th>
                      <th>Status</th>
                      <th>Date Added</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      $ho = 1;
                      $h = queryDbs("SELECT* FROM projects");
                      while ($home = data($h)) {


                      ?>
                    <tr>
                      <td><?php echo $ho  ?></td>
                      <td><?php echo ucwords($home['project_name']) ?></td>
                      <td> <img src="<?php echo $home['pictures'] ?>" class="card-iimg w-25" alt=""></td>
                      <td><?php echo html_entity_decode($home['description'])  ?></td>
                      <td>
                            <?php
                            if ($home['status'] == "enabled") {
                            ?>

                              <h4 class="text-success ">Enabled<span class="mr-2 fa fa-check"></span></h4>
                            <?php
                            } else {
                            ?>
                              <h4 class="text-danger "> Disabled<span class="mr-2 fa fa-window-close"></a></h4>

                            <?php } ?>
                          </td>
                          <td><?php echo $home['reg_date']; ?></td>
                          <td>

                          <?php
                            if ($home['status'] != "enabled") {
                            ?>

                              <h4> <a href="#projectstatus" class="text-success m-2" data-toggle="modal" project="<?php echo $home['id'] ?>">Enabled</a></h4>
                            <?php
                            } else {
                            ?>
                              <h4> <a href="#projectstatusdisable" class="text-danger m-2" data-toggle="modal" projectdisabled="<?php echo $home['id'] ?>">Disabled</span></a></h4>

                            <?php } ?>

                            <a href="#projectedit" class=" btn btn-primary" data-toggle="modal" project="<?php echo $home['id'] ?>"><span class="p-2 m-1 fa fa-edit"></span></a>
                            <a href="#projectdelete" class=" btn btn-danger" data-toggle="modal" project="<?php echo $home['id'] ?>"><span class="p-2 m-1 fa fa-trash"></span></a>
                          </td>
                    </tr>
                            <?php
                          $ho++;
                          } ?>
                  </tbody>
                </table>

                <div class="modal" id="addproject">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Add Recent Project</h4>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <p class="text-danger projectformerror"></p>
                        <form id="addprojectform" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="usr">Project Picture:</label>
                            <input type="file" class="form-control" name="picture" id="usr">
                          </div>
                          <div class="form-group">
                            <label for="usr">Project Picture:</label>
                            <input type="text" class="form-control" name="name" id="usr">
                          </div>

                          <div class="form-group">
                            <label for="comment">Project Description:</label>
                            <textarea class="form-control textarea" name="description" rows="5" id="comment"></textarea>
                          </div>
                          <button class="btn btn-success btn-lg mr-5 mt-3 float-right">Add Recent Project</button>
                        </form>
                      </div>
                    </div>
                  </div>

                </div>

              </div>
            </div>
          </div>
          <div id="contact" class="container tab-pane fade">
            <div class="card">
              <div class="card-header">
                <div class="card-title">
                  <h3 class="text-center text-uppercase">Contact settings</h3>
                </div>
              </div>
              <div class="card-body">
                <a href="#addcontact" data-toggle="modal" class="btn btn-primary text-uppercase">add services</a>
                <table class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Icon</th>
                      <th>Link</th>
                      <th>Name</th>
                      <th>Date Added</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      $ho = 1;
                      $h = queryDbs("SELECT* FROM contacts");
                      while ($home = data($h)) {


                      ?>
                    <tr>
                      <td><?php echo $ho  ?></td>
                      <td> <span class="<?php echo $home['icon'] ?>"></span></td>
                      <td><a href="<?php echo $home['link'] ?>" target="_blank" rel="noopener noreferrer"><?php echo $home['link'] ?></a> </td>
                      <td><a href="<?php echo $home['link'] ?>" class="nav-link" target="_blank" rel="noopener noreferrer"><?php echo ucwords($home['name']) ?></a></td>
                     
                          <td><?php echo $home['reg_date']; ?></td>
                          <td>

                         

                            <a href="#contactedit" class=" btn btn-primary" data-toggle="modal" contact="<?php echo $home['id'] ?>"><span class="p-2 m-1 fa fa-edit"></span></a>
                            <a href="#contactdelete" class=" btn btn-danger" data-toggle="modal" contact="<?php echo $home['id'] ?>"><span class="p-2 m-1 fa fa-trash"></span></a>
                          </td>
                    </tr>
                            <?php
                          $ho++;
                          } ?>
                 
                  </tbody>
                </table>

                <div class="modal" id="addcontact">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Add Contact</h4>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <p class="contactformerror text-danger"></p>
                        <form id="addcontactform">
                          <label for="">Contact Icon</label>
                          <select class="form-control" name="icon">
                            <option value="">Select Category</option>
                            <?php 
                            $ic = queryDbs("SELECT* FROM icons");
                            while($ico = data($ic)){
                              $icons = $ico['icons'];
                              $iconname = $ico['name'];

                            
                            ?>
                            <option value="<?php echo $icons ?>"><?php echo ucwords($iconname) ?></option>
                            <?php } ?>

                          </select>
                          <div class="form-group">
                            <label for="usr">Name:</label>
                            <input type="text" class="form-control" name="name" id="usr">
                          </div>
                          <div class="form-group">
                            <label for="usr">Link:</label>
                            <input type="text" class="form-control" name="link" id="usr">
                          </div>
                          <button class="btn btn-success btn-lg mr-5 mt-3 float-right">Add Services</button>
                        </form>
                      </div>
                    </div>
                  </div>

                </div>

              </div>
            </div>
          </div>
          <div id="appearance" class="container tab-pane fade">
            <div class="card">
              <div class="card-header">
                <div class="card-title">
                  <h3 class="text-center text-uppercase">Appearance settings</h3>
                </div>
              </div>
              <div class="card-body">
                <a href="#addappearance" data-toggle="modal" class="btn btn-primary text-uppercase">add appearance</a>
                <table class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th rowspan="2">S/N</th>
                      <th colspan="3">Group</th>
                      <th rowspan="2">Status</th>
                      <th rowspan="2">Date Added</th>
                      <th rowspan="2">Action</th>
                    </tr>
                    <tr>
                      <th>Part</th>
                      <th>Color Code</th>
                      <th>Color Result</th>
                    </tr>

                  </thead>
                  <tbody>
                  <?php
                      $ho = 1;
                      $h = queryDbs("SELECT* FROM appearances ");
                      while ($appearance = data($h)) {
                          $bgcolor = $appearance['bgcolor'];
                          $text = $appearance['text'];
                          $body = $appearance['body'];
                          $navbar = $appearance['navbar'];
                          $status = $appearance['status'];
                          $date = $appearance['reg_date'];
                          $id = $appearance['id'];

                      ?>
                    <tr>
                      <td rowspan="5"><?php echo $ho ?></td>
                      <td colspan="3"></td>
                      <td>
                      <?php 
                      if ($status == "enabled") {
                            ?>

                              <h4> <a href="#appearancestatus" class="text-success" data-toggle="modal" appearance="<?php echo $id ?>">Enabled<span class="text-success mr-2 fa fa-check"></span></a></h4>
                            <?php
                            } else {
                            ?>
                              <h4> <a href="#appearancestatus" class="text-danger" data-toggle="modal" appearance="<?php echo $id ?>">Disabled<span class="text-danger mr-2 fa fa-window-close"></span></a></h4>

                            <?php } ?>
                          </td>
                          <td><?php echo $date; ?></td>
                          <td>


                            <a href="#appearanceedit" class=" btn btn-primary" data-toggle="modal" appearance="<?php echo $id ?>"><span class="p-2 m-1 fa fa-edit"></span></a>
                            <a href="#appearancedelete" class=" btn btn-danger" data-toggle="modal" appearance="<?php echo $id?>"><span class="p-2 m-1 fa fa-trash"></span></a>
                          </td>
                    </tr>
                    <tr>
                      <td>Body</td>
                      <td><?php echo $bgcolor ?></td>
                      <td><span class="badge badge-pill badge-dark p-2" style="color: <?php echo $body ?>;"><span style="font-size: 2em;" class="fa fa-circle"></span></span></td>
                    </tr>
                    <tr>
                      <td>Text</td>
                      <td><?php echo $text ?></td>
                      <td><span class="badge badge-pill badge-dark p-2" style="color: <?php echo $text ?>;"><span style="font-size: 2em;" class="fa fa-circle"></span></span></td>
                    </tr>
                    <tr>
                      <td>Navbar</td>
                      <td><?php echo $navbar ?></td>
                      <td><span class="badge badge-pill badge-dark p-2" style="color: <?php echo $navbar ?>;"><span style="font-size: 2em;" class="fa fa-circle"></span></span></td>
                    </tr>
                    <tr>
                      <td>Background Color</td>
                      <td><?php echo $bgcolor ?></td>
                      <td><span class="badge badge-pill badge-dark p-2" style="color: <?php echo $bgcolor ?>;"><span style="font-size: 2em;" class="fa fa-circle"></span></span></td>
                    </tr>

                    
                    <?php 
                      $ho++;
                      }
                     ?>



                  </tbody>
                </table>

                <div class="modal" id="addappearance">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Add Appearance</h4>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <p class="text-danger apperanceformerror"></p>
                        <form id="addapperanceform">
                          <div class="form-group">
                            <label for="usr">Body:</label>
                            <input type="color" class="form-control" name="body" id="usr">
                          </div>
                          <div class="form-group">
                            <label for="usr">Text:</label>
                            <input type="color" class="form-control" name="text" id="usr">
                          </div>
                          <div class="form-group">
                            <label for="usr">Navigtion Bar:</label>
                            <input type="color" class="form-control" name="navbar" id="usr">
                          </div>
                          <div class="form-group">
                            <label for="usr">Background Color:</label>
                            <input type="color" class="form-control" name="backgroundcolor" id="usr">
                          </div>
                          <button class="btn btn-success btn-lg mr-5 mt-3 float-right">Add Appearance</button>
                        </form>
                      </div>
                    </div>
                  </div>

                </div>

              </div>
            </div>
          </div>
          <div id="writer" class="container tab-pane fade">
            <div class="card">
              <div class="card-header">
                <div class="card-title">
                  <h3 class="text-center text-uppercase">Writer settings</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="card-body">
                  <a href="#addwriter" data-toggle="modal" class="btn btn-primary p-2 text-uppercase">add home settings</a>
                  <table class="table table-bordered table-striped table-hover table-responsive">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Writer</th>
                        <th>Date Added</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $ho = 1;
                      $h = queryDbs("SELECT* FROM writer");
                      while ($home = data($h)) {


                      ?>
                        <tr>
                          <td><?php echo $ho; ?></td>
                         <td><?php echo html_entity_decode($home['content']); ?></td>
                         
                          <td><?php echo $home['reg_date']; ?></td>
                          <td>
                            <a href="#writerdelete" class=" btn btn-danger" data-toggle="modal" writer="<?php echo $home['id'] ?>"><span class="p-2 m-1 fa fa-trash"></span></a>
                          </td>
                        </tr>
                      <?php 
                    $ho++;
                    } ?>
                    </tbody>
                  </table>


                </div>
              </div>
              <div class="modal" id="addwriter">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Add Writer Settings</h4>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <p class="text-danger addwritererror"></p>
                      <form id="addwriterform" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="usr">Writer Content:</label>
                          <input type="text" class="form-control" name="writercontent" id="usr">
                      </div>
                        <button class="btn btn-success btn-lg mr-5 mt-3 float-right">Add writer</button>
                      </form>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div id="icon" class="container tab-pane fade">
            <div class="card">
              <div class="card-header">
                <div class="card-title">
                  <h3 class="text-center text-uppercase">Icon settings</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="card-body">
                  <a href="#addicon" data-toggle="modal" class="btn btn-primary p-2 text-uppercase">add icons settings</a>
                  <table class="table table-bordered table-striped table-hover table-responsive">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Icon Code</th>
                        <th>Icon Name</th>
                        <th>Date Added</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $ho = 1;
                      $h = queryDbs("SELECT* FROM icons");
                      while ($home = data($h)) {


                      ?>
                        <tr>
                          <td><?php echo $ho; ?></td>
                          <td><?php echo html_entity_decode($home['icons']); ?> <span class="ml-3 p-2"><i class="<?php echo $home['icons']?>" ></i></span></td>
                          <td><?php echo ucwords($home['name']); ?></td>
                         
                          <td><?php echo $home['reg_date']; ?></td>
                          <td>
                            <a href="#icondelete" class=" btn btn-danger" data-toggle="modal" icon="<?php echo $home['id'] ?>"><span class="p-2 m-1 fa fa-trash"></span></a>
                          </td>
                        </tr>
                      <?php 
                    $ho++;
                    } ?>
                    </tbody>
                  </table>


                </div>
              </div>
              <div class="modal" id="addicon">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Add Icon Settings</h4>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <p class="text-danger addiconerror"></p>
                      <form id="addiconform" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="usr">Icon Name:</label>
                          <input type="text" class="form-control" name="name" id="usr">
                      </div>
                      <div class="form-group">
                          <label for="usr">Icon Code:</label>
                          <input type="text" class="form-control" name="icon" id="usr">
                      </div>
                        <button class="btn btn-success btn-lg mr-5 mt-3 float-right">Add Icon</button>
                      </form>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <div id="address" class="container tab-pane fade">
            <div class="card">
              <div class="card-header">
                <div class="card-title">
                  <h3 class="text-center text-uppercase">Address and Contact</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="card-body">
                  <a href="#addaddress" data-toggle="modal" class="btn btn-primary p-2 text-uppercase">add icons settings</a>
                  <table class="table table-bordered table-striped table-hover table-responsive">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Date Added</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $ho = 1;
                      $h = queryDbs("SELECT* FROM address");
                      while ($home = data($h)) {    
                        $phone = $home['phone'];
                        $email = $home['email'];
                        $address = $home['address'];
                        $status = $home['status'];
                        $ids =$home['id'];                        
                      ?>
                        <tr>
                          <td><?php echo $ho; ?></td>
                          <td><?php echo html_entity_decode($address); ?> </td>
                          <td><?php echo $email; ?></td>
                          <td><?php echo html_entity_decode($phone); ?> </td>
                          <td><?php echo $home['reg_date']; ?></td>
                          <td>
                          <?php 
                      if ($status == "enabled") {
                            ?>

                              <h4> <a href="#addressstatus" class="text-success" data-toggle="modal" address="<?php echo $ids ?>">Enabled<span class="text-success mr-2 fa fa-check"></span></a></h4>
                            <?php
                            } else {
                            ?>
                              <h4> <a href="#addressstatus" class="text-danger" data-toggle="modal" address="<?php echo $ids ?>">Disabled<span class="text-danger mr-2 fa fa-window-close"></span></a></h4>

                            <?php } ?>
                          </td>
                          <td>


                            <a href="#addressedit" class=" btn btn-primary" data-toggle="modal" address="<?php echo $ids ?>"><span class="p-2 m-1 fa fa-edit"></span></a>
                            <a href="#addressdelete" class=" btn btn-danger" data-toggle="modal" address="<?php echo $ids ?>"><span class="p-2 m-1 fa fa-trash"></span></a>
                          </td>
                        </tr>
                      <?php 
                    $ho++;
                    } ?>
                    </tbody>
                  </table>


                </div>
              </div>
              <div class="modal" id="addaddress">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Add Address Settings</h4>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <p class="text-danger addaddresserror"></p>
                      <form id="addaddressform" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="usr">Phone Number</label>
                          <input type="text" class="form-control" name="phone" id="usr">
                      </div>
                      <div class="form-group">
                          <label for="usr">Email Address</label>
                          <input type="email" class="form-control" name="email" id="usr">
                      </div>
                      <div class="form-group">
                          <label for="usr">Contact Address:</label>
                          <textarea id="textarea" class="form-control textarea" placeholder="address" name="address"></textarea>

                      </div>
                        <button class="btn btn-success btn-lg mr-5 mt-3 float-right">Add contact</button>
                      </form>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div id="androidapp" class="container tab-pane fade">
            <div class="card">
              <div class="card-header">
                <div class="card-title">
                  <h3 class="text-center text-uppercase">Android Application</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="card-body">
                  <a href="#addandroidapp" data-toggle="modal" class="btn btn-primary p-2 text-uppercase">add new app</a>
                  <table class="table table-bordered table-striped table-hover table-responsive">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>App Name</th>
                        <th>Version</th>
                        <th>Link</th>
                        <th>Date Added</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $ho = 1;
                      $h = queryDbs("SELECT* FROM application");
                      while ($home = data($h)) {    
                        $name = $home['name'];
                        $version = $home['version'];
                        $apk = $home['apk'];
                        $status = $home['status'];
                        $ids =$home['id'];                        
                      ?>
                        <tr>
                          <td><?php echo $ho; ?></td>
                          <td><?php echo html_entity_decode($name); ?> </td>
                          <td><?php echo $version; ?></td>
                          <td> <a href="<?php echo html_entity_decode($apk); ?>" download><?php echo html_entity_decode($name); ?></a> </td>
                          <td><?php echo $home['reg_date']; ?></td>
                          <td>
                          <?php 
                      if ($status == "enabled") {
                            ?>

                              <h4> <a href="#androidstatus" class="text-success" data-toggle="modal" android="<?php echo $ids ?>">Enabled<span class="text-success mr-2 fa fa-check"></span></a></h4>
                            <?php
                            } else {
                            ?>
                              <h4> <a href="#androidstatus" class="text-danger" data-toggle="modal" android="<?php echo $ids ?>">Disabled<span class="text-danger mr-2 fa fa-window-close"></span></a></h4>

                            <?php } ?>
                          </td>
                          <td>


                            <a href="#androiddelete" class=" btn btn-danger" data-toggle="modal" android="<?php echo $ids ?>"><span class="p-2 m-1 fa fa-trash"></span></a>
                          </td>
                        </tr>
                      <?php 
                    $ho++;
                    } ?>
                    </tbody>
                  </table>


                </div>
              </div>
              <div class="modal" id="addandroidapp">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Add New Android Application</h4>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <p class="text-danger addandroiderror"></p>
                      <form id="addandroidform" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="usr">Name</label>
                          <input type="text" class="form-control" name="name" id="usr">
                      </div>
                      <div class="form-group">
                          <label for="usr">Version</label>
                          <input type="text" class="form-control" name="version" id="usr">
                      </div>
                      <div class="form-group">
                          <label for="usr">Upload APK</label>
                          <input type="file" class="form-control" name="apk" id="usr">
                      </div>
                     
                        <button class="btn btn-success btn-lg mr-5 mt-3 float-right">Add App</button>
                      </form>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
    <!-- home status -->
    <div id="homestatus" class="modal">
      <div class="modal-dialog">
        <div class="homestatus">

        </div>
      </div>
    </div>

    <!-- home delete -->
    <div id="homedelete" class="modal">
      <div class="modal-dialog">
        <div class="homedelete">

        </div>
      </div>
    </div>

    <!-- home edit -->
    <div id="homeedit" class="modal">
      <div class="modal-dialog">
        <div class="homeedit">

        </div>
      </div>
    </div>



    <!-- about -->
    <div id="aboutstatus" class="modal">
      <div class="modal-dialog">
        <div class="aboutstatus">

        </div>
      </div>
    </div>
     <!-- writer -->
     <div id="writerdelete" class="modal">
      <div class="modal-dialog">
        <div class="writerdelete">

        </div>
      </div>
    </div>

    <!-- home delete -->
    <div id="aboutdelete" class="modal">
      <div class="modal-dialog">
        <div class="aboutdelete">

        </div>
      </div>
    </div>

    <!-- home edit -->
    <div id="aboutedit" class="modal">
      <div class="modal-dialog">
        <div class="aboutedit">

        </div>
      </div>
    </div>

    <!-- appearance -->
    <div id="appearancestatus" class="modal">
      <div class="modal-dialog">
        <div class="appearancestatus">

        </div>
      </div>
    </div>

    <!-- home delete -->
    <div id="appearancedelete" class="modal">
      <div class="modal-dialog">
        <div class="appearancedelete">

        </div>
      </div>
    </div>

    <!-- home edit -->
    <div id="appearanceedit" class="modal">
      <div class="modal-dialog">
        <div class="appearanceedit">

        </div>
      </div>
    </div>

     <!-- service -->
     <div id="servicestatus" class="modal">
      <div class="modal-dialog">
        <div class="servicestatus">

        </div>
      </div>
    </div>

    <!-- service -->
    <div id="servicestatusdisable" class="modal">
      <div class="modal-dialog">
        <div class="servicestatusdisable">

        </div>
      </div>
    </div>

    <!-- ervices delete -->
    <div id="servicedelete" class="modal">
      <div class="modal-dialog">
        <div class="servicedelete">

        </div>
      </div>
    </div>

    <!-- service edit -->
    <div id="serviceedit" class="modal">
      <div class="modal-dialog">
        <div class="serviceedit">

        </div>
      </div>
    </div>

         <!-- project -->
         <div id="projectstatus" class="modal">
      <div class="modal-dialog">
        <div class="projectstatus">

        </div>
      </div>
    </div>

    <!-- service -->
    <div id="projectstatusdisable" class="modal">
      <div class="modal-dialog">
        <div class="projectstatusdisable">

        </div>
      </div>
    </div>

    <!-- ervices delete -->
    <div id="projectdelete" class="modal">
      <div class="modal-dialog">
        <div class="projectdelete">

        </div>
      </div>
    </div>

    <!-- service edit -->
    <div id="projectedit" class="modal">
      <div class="modal-dialog">
        <div class="projectedit">

        </div>
      </div>
    </div>


    <!-- contact -->
     <!-- ervices delete -->
     <div id="contactdelete" class="modal">
      <div class="modal-dialog">
        <div class="contactdelete">

        </div>
      </div>
    </div>

    <!-- service edit -->
    <div id="contactedit" class="modal">
      <div class="modal-dialog">
        <div class="contactedit">

        </div>
      </div>
    </div>

    <div id="icondelete" class="modal">
      <div class="modal-dialog">
        <div class="icondelete">

        </div>
      </div>
    </div>

      <div id="addressdelete" class="modal">
      <div class="modal-dialog">
        <div class="addressdelete">

        </div>
      </div>
      </div>

      <div id="addressedit" class="modal">
      <div class="modal-dialog">
        <div class="addressedit">

        </div>
      </div>
      </div>

      <div id="addressstatus" class="modal">
      <div class="modal-dialog">
        <div class="addressstatus">

        </div>
      </div>
      </div>

      <div id="androiddelete" class="modal">
      <div class="modal-dialog">
        <div class="androiddelete">

        </div>
      </div>
      </div>

      <div id="androidstatus" class="modal">
      <div class="modal-dialog">
        <div class="androidstatus">

        </div>
      </div>
      </div>


  </body>

  </html>

<?php
} else {
  header("location:../");
}
?>

<!-- <script src="../jquery/jquery.min.js"></script> -->
<!-- <script src="../jquery/popper.js"></script> -->
<!-- <script src="../bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- <script src="summernote/summernote-bs4.min.js"></script> -->
<script src="auth.js"></script>
<script>

</script>