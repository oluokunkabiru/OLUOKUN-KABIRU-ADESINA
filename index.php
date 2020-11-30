<?php
include('auth/db.php');
$b  = queryDbs("SELECT* FROM appearances WHERE status='enabled' ");
$data = data($b);
$body = $data['body'];
$navbar = $data['navbar'];
$bgcolor = $data['bgcolor'];
$text = $data['text'];
function reversecolor($data){
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
    $new = "#".$r3.$g3.$b3;
  return $new;
}

$and = queryDbs("SELECT* FROM application WHERE status='enabled' ");
$android = data($and);
$androidapp = $android['apk'];
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>OLUOKUN KABIRU ADESINA</title>


<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/animate.css">
<link rel="stylesheet" href="fontawesome-free/css/all.css">
<link rel="stylesheet" href="style.php">
<link rel="icon" href="image/9.jpg">
<link rel="manifest" href="manifest.jso">

</head>
<body>
    <!-- navigation bar -->
  <h2 class="text-center">OLUOKUN KABIRU ADESINA</h2>
   <!-- /navigation bar -->
   <nav class="navbar navbar-expand-sm  sticky-top">
    <a class="navbar-brand" href="#">
      <img src="image/12.jpg" class="rounded-circle" alt="logo">
  </a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-ico" style="color:<?php echo $text ?>;">Menu</span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#home">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#about">About</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#skill">Skills</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#project">Recent Project</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#contact">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="auth/<?php echo $androidapp ?>" download>Download APK</a>
      </li>
      
     
      
    </ul>

  </nav>
  
   <!-- sidebar -->
   <div class="wrapper d-flex align-items-stretch top">
   <section>
    
        <div class="fix">
       <nav id="sidebar"style="" class="">
         <div class="custom-menu">
           <button type="button" id="sidebarCollapse" class="btn btn-prima" value="Menu">
              <span class="navbar-toggler-icon" ></span>
           </button>
           
        </div>
         <ul class="list-unstyled components mb-5">
           <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
           <?php
           $c = queryDbs("SELECT* FROM contacts");
           while($contact = data($c)){
            $link = $contact['link'];
            $icon = $contact['icon'];
           ?>
            <li class="nav-item">
                     <a class="nav-link" href="<?php echo $link ?>"  target="_blank"><span><i style="font-size: 30px" class="<?php echo $icon; ?> m-2"></i></span></a>
                   </li>
           <?php } ?>
                  
       </nav>    
     </div>
         
   </section>
   <!-- /sidebar -->


   <!-- content -->
   <div id="content" class="">
    <div class="container-fluid " id="container">
      <!-- home -->
      <section id="home">
        <div class="container-fluid" >
          <div id="slide">
            <div class="container mt-md-5 mt-sm-1">
              <?php 
              $pr = queryDbs("SELECT* FROM home WHERE status='enabled'");
              $profile = data($pr);
              ?>
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4 col-sm-6">

                  <div class="mt-sm-1 wow bounceInDown">
                    <img src="auth/<?php echo $profile['profile_picture'] ?>" class="m-md-5 m-sm-1 card-img rounded-circle" alt="OLUOKUN KABIRU">
                  </div>
                </div>
                <div class="col-md-1"></div>
               <div class="col-md-5 introduction">
                <!-- <h4 class="text-cente text-light font-weight-bold mt-sm-5 bg-info p-1 rounded" id="greet" ></h4> -->
                <h3 class="text-center font-weight-bold mt-sm-5  wow slideInLeft" style="color: <?php echo $text ?>;" ><?php echo $profile['greet'] ?></h3>
                <span class="text-center font-weight-bold p-2  wow slideInLeft"  data-wow-delay="0.7s"><?php echo html_entity_decode($profile['description']) ?></span>
                <!-- <h4 class="text-light text-center p-3 ">I'm a Creative Software Developer</h4> -->
                <hgroup class="wow fadeInUp">
                  <?php
                  $str = "[";
                    $wr = queryDbs("SELECT* FROM writer ORDER BY id DESC");
                  while($k = data($wr)){
                    $str.="&quot;".$k['content']."&quot;".",";
                  }
                  
                  $gen =rtrim($str," , ");
                  $fin = $gen."]";
                  $test = $fin;
                 
                  ?>
                 
                <h2 class="text-center rounded text-monospace font-weight-bold p-2" style="background-color:<?php echo $navbar ?> ; color:<?php echo reversecolor($navbar) ?>"><span class="typewrite text-capitalize" data-period="2000"
                        data-type= '<?php echo $test ?>'></span></h2>
               </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /home -->

<!-- about -->
      <section>
          <div class="container">
            <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-4 wow bounceInLeft">
                  <h3 id="about" style="background-color:<?php echo $navbar ?>; color:<?php echo reversecolor($navbar) ?>" class="text-center text-center rounded-circle p-5 font-weight-bold" >About</h3>
              </div>
              <div class="col-md-4"></div>
            </div>
            <?php
            $abt = queryDbs("SELECT* FROM about WHERE status='enabled'");
            $about = data($abt);
            $profileimage = $about['profile_picture'];
            ?>
            <div class="card-deck">
              <div class="card wow bounceInUp">
                <div class="card-body text-center userimage">     
                   <img src="auth/<?php echo $profileimage ?>" style="width: 70%;" class="card-img img-fluid rounded-circle" alt=" OLUOKUN KABIRU ADESINA">
                </div>
              </div>
              <div class="card wow bounceInDown">
                <div class="card-body">
                <?php echo htmlspecialchars_decode($about['description']) ?>
                </div>
              </div>
              
            </div>
          </div>
      </section>
      <!-- /about -->
      
      <!-- skill -->
      <section>
        <div class="container">
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4  wow bounceInRight">
                <h3 id="skill" style="background-color: <?php echo $navbar ?>; color:<?php echo reversecolor($navbar) ?>;" class="text-center text-center rounded-circle p-5 font-weight-bold">Skills</h3>
            </div>
            <div class="col-md-4"></div>
          </div>
            <div class="card-deck">
              <?php
                $fro = queryDbs("SELECT * FROM services WHERE category='frontend'");
                $fron = data($fro);
                $frontend = $fron['category'];
                $bac = queryDbs("SELECT * FROM services WHERE category='backend'");
                $back = data($bac);
                $backend = $back['category'];
                $fra = queryDbs("SELECT * FROM services WHERE category='framework'");
                $frame = data($fra);
                $framework = $frame['category'];
              ?>
              <?php
                if($frontend){
              ?>
              <div class="card p-1  wow rollIn">
                <div class="card-title text-center p-2" style="background-color: <?php echo reversecolor($navbar) ?>; color:<?php echo $navbar  ?>;"><h3>Front-End</h3></div>
                <div class="card-body text-center"> 
                  <ul class="list-group">
                    <?php 
                    $sk = queryDbs("SELECT* FROM services WHERE category='frontend'");
                    while($front = data($sk)){

                    
                    ?>
                    <li class="list-group-item text-uppercase"><?php echo $front['technology'] ?></li>
                    <?php } ?>
                  </ul> 
                </div>
              </div>
                <?php } ?>

                <?php
                if($backend){
              ?>
              <div class="card p-1 ">
                <div class="card-title text-center p-2" style="background-color: <?php echo reversecolor($navbar) ?>; color:<?php echo $navbar  ?>;"><h3>Back-End</h3></div>
                <div class="card-body text-center"> 
                  <ul class="list-group">
                    <?php 
                    $sk = queryDbs("SELECT* FROM services WHERE category='backend'");
                    while($front = data($sk)){

                    
                    ?>
                    <li class="list-group-item text-uppercase"><?php echo $front['technology'] ?></li>
                    <?php } ?>
                  </ul> 
                </div>
              </div>
                <?php } ?>

                <?php
                if($framework){
              ?>
              <div class="card p-1 wow rollIn ">
                <div class="card-title text-center p-2" style="background-color: <?php echo reversecolor($navbar) ?>; color:<?php echo $navbar  ?>;"><h3>FrameWork</h3></div>
                <div class="card-body text-center"> 
                  <ul class="list-group">
                    <?php 
                    $sk = queryDbs("SELECT* FROM services WHERE category='framework'");
                    while($front = data($sk)){

                    
                    ?>
                    <li class="list-group-item text-uppercase"><?php echo $front['technology'] ?></li>
                    <?php } ?>
                  </ul> 
                </div>
              </div>
                <?php } ?>

              
              </div>
          </div>
        </div>
      </section>

      <!-- recent project -->
      <div class="container" id="project">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4 wow slideInLeft">
              <h3 style="background-color:<?php echo $navbar ?>; color:<?php echo reversecolor($navbar) ?>" class="text-center text-center rounded-circle p-5 font-weight-bold" >Recent Project</h3>
          </div>
          <div class="col-md-4"></div>
        </div>
        <div id="demo" class="carousel slide wow slideInUp" data-ride="carousel">
        <div class="carousel-inner">
          <!-- Indicators -->
          <?php 
           $prfi = queryDbs("SELECT* FROM projects WHERE status='enabled' ");
           $projec = data($prfi);
           $names = $projec['project_name'];
           $descrs = $projec['description'];
           $projectpictures = "auth/". $projec['pictures'];
        ?>
           <div class="carousel-item active">
           <img src="<?php echo $projectpictures ?>" class="card-img" alt="<?php echo $names ?>">
              <div class="carousel-caption">
              <h3><?php echo $names ?></h3>
              <?php echo ucfirst(htmlspecialchars_decode($descrs)) ?>
              </div>
            </div>
        <?php
        $pro = queryDbs("SELECT* FROM projects WHERE status='enabled' ORDER BY id DESC");
        while($project = data($pro)){
          $name = $project['project_name'];
          $descr = $project['description'];
          $projectpicture = "auth/". $project['pictures'];
        ?>
        
          <!-- The slideshow -->
         
            <div class="carousel-item">
              <img src="<?php echo $projectpicture ?>" class="card-img" alt="<?php echo $name ?>">
              <div class="carousel-caption">
              <h3><?php echo $name ?></h3>
              <?php echo ucfirst(htmlspecialchars_decode($descr)) ?>
            </div>
            </div>
      <?php } ?>
           
        </div>
          <!-- Left and right controls -->
          <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        
        </div>
      </div>
      <!-- /recent project -->
   </div>
   </div>
   
      <!--/skill -->

      <!-- contact -->
      <section>
        <div class="container-fluid" style="background-color:<?php echo $navbar ?>">
          <footer class="p-5" id="contact">
              <div class="row">
                  <div class="col-lg col-md-6 ml-5">
                      <h3 class="footer-title  text-white">Contact Us</h3>
                      <div class="alert alert-success alert-dismissible" style="display:none">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Opps !</strong> Please check below
                        <p class="text-danger contactmeerror"></p>
                      </div>
                      <div class="">
                          <form id="contactme" method="post">
                                      <div class="form-group">
                                      <label for="usr" class="text-center" style="color:<?php echo $text ?>">Your name in full</label>
                                          <input class="form-control" type="text" name="name" placeholder="Name">
                                      </div>
                                      <div class="form-group">
                                      <label for="usr" class="text-center" style="color:<?php echo $text ?>">Your email address</label>
                                          <input class="form-control" type="email" name="email" placeholder="Email">
                                      </div>
                                      <div class="form-group">
                                      <label for="usr" class="text-center" style="color:<?php echo $text ?>">Your beautiful message</label>
                                          <textarea id="textarea" class="form-control" placeholder="message" name="message"></textarea>
                                      </div>
                                      <div class="mx-auto mt-3">
                                          <button class="form-control btn btn-light btn-block btn-lg p-2" type="submit">Submit</button>
                                      </div>
                               
                          </form>
                      </div>
                  </div>
                  <?php
                    $cad = queryDbs("SELECT* FROM address WHERE status='enabled'");
                    $cont = data($cad);
                    $caddress= $cont['address'];
                    $cphone = $cont['phone'];
                    $cemail = $cont['email'];
                  
                  ?>
                  <div class="col-lg-6 col-md-6 footer-grid-wthree foot-top ml-4">
                      <h3 class="footer-title  text-white mb-4 mt-sm-3">Address</h3>
                      <div class="contact-info">
                          <div class="footer-style-w3ls">
                              <h4 style="color:<?php echo $text  ?>" class="mb-2">Phone</h4>
                              <p style="color:<?php echo $text ?>"><?php echo $cphone  ?></p>
                          </div>
                          <div class="footer-style-w3ls my-4">
                              <h4 style="color: <?php echo $text  ?>;" class=" mb-2">Email </h4>
                              <p><a href="<?php echo $cemail  ?>" style="text-decoration: none; color: <?php echo $text  ?>;"><?php echo $cemail  ?></a></p>
                          </div>
                          <div class="footer-style-w3ls">
                              <h4 style="color: <?php echo $text  ?>;" class="mb-2">Location</h4>
                              <span class="" style="color:<?php echo $text  ?>;"><?php echo htmlspecialchars_decode($caddress)  ?></span>
                          </div>
                          <table class="ml-5 mr-3">
                         
                            <tr>
                             <?php
                            $c = queryDbs("SELECT* FROM contacts");
                            while($contact = data($c)){
                              $link = $contact['link'];
                              $icon = $contact['icon'];
                            ?>
                              <td><a href="<?php echo $link ?>"  target="_blank"><span style="color:<?php echo $text ?>"><i class="<?php echo $icon ?> m-2" style="font-size: 30px"></i></span></a></td>

                              <?php } ?>
                               </tr>
                        </table>
                      </div>
                  </div>
              </div>
              <div class="copy-right-top border-top mt-5">
                  <p class="copy-right text-center text-white pt-xl-5 pt-4">&copy; <span id="y"></span> . All Rights Reserved | Design by
                      <a href="https://github.com/oluokunkabiru" target="_blank" style="text-decoration: none; color: white;"> <u> Oluokun Kabiru Adesina </u> </a>
                  </p>
              </div>
          </footer>
      </div>
      </section>
      <!-- /contact -->
    </div>

   </div>
  <?php
  // $bgslider =[];
  $bgimg = "[";
  $wr = queryDbs("SELECT* FROM projects ORDER BY id DESC");
while($k = data($wr)){
  $bgimg.="&quot;auth/".$k['pictures']."&quot;".",";
}

$im =rtrim($bgimg," , ");
$mig = $im."]";
$image = htmlspecialchars_decode($mig);
?>
  

   <!-- /content -->
</div>
</body>
</html>
<script src="jquery/jquery.min.js"></script>
<script src="jquery/wow.min.js"></script>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
<script src="app.js"></script>

<script>
  $(document).ready(function(){
    
    $('#contactme').submit(function(e){
        // alert(xmlh.status);
      e.preventDefault();
      var datas = new FormData(this);
    
      $.ajax({
        type:'POST',
      url:'contactme.php',
        data: datas,
        contentType:false,
        cache:false,
        processData:false,
        // dataType:"JSON",
        success: function (response) {
          
          if (response) {
            $('.contactmeerror').html(response);
            $('.alert').show();
          } 
          if (response =="Message has been sent") {

            window.location.assign('thanks.php'); 
             }
        },
    
      });
    
    })


   $(document).ready(setInterval(slider, 2000));
  function slider(){
    var imag = <?php echo $image ?>;
    var ok = document.getElementById('slide');
    var image = imag.sort(function(a, b){return 0.5 - Math.random()});
    ok.style.backgroundImage = "linear-gradient(rgba(85, 233, 238, 0.4), rgba(30, 60, 90, 0.267)), url('"+image[0]+"')";
    ok.style.backgroundSize = "100%";
    ok.style.backgroundRepeat ="no-repeat"; 
    
  }
  function year(){
  var y = document.getElementById('y');
  var d = new Date();
  y.innerHTML = d.getFullYear();
  }
  $(document).ready(year);


  var wow = new WOW(
    {
      boxClass:     'wow',      // animated element css class (default is wow)
      animateClass: 'animated', // animation css class (default is animated)
      offset:       0,          // distance to the element when triggering the animation (default is 0)
      mobile:       true,       // trigger animations on mobile devices (default is true)
      live:         true,       // act on asynchronously loaded content (default is true)
      callback:     function(box) {
        // the callback is fired every time an animation is started
        // the argument that is passed in is the DOM node being animated
      },
      scrollContainer: null,    // optional scroll container selector, otherwise use window,
      resetAnimation: true,     // reset animation on end (default is true)
    }
  );
  wow.init();
})

</script>


<!-- <td><a href="https://www.facebook.com/oluokunkabir.adeshina/"  target="_blank"><span class="text-light"><i class="fab fa-facebook-square m-2" style="font-size: 30px"></i></span></a></td>
                                <td><a href="https://wa.me/+2348130584550"><span class="text-light"><i class="fab fa-whatsapp-square m-2" style="font-size: 30px"></i></span></a></td>
                                <td><a  href="https://twitter.com/DevKabirOluokun" target="_blank"><span class="text-light"><i class="fab fa-twitter-square m-2" style="font-size: 30px"></i></span></a></td>
                                <td><a  href="https://github.com/oluokunkabiru" target="_blank" ><spa
 -->