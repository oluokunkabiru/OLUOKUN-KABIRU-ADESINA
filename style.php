<?php
header("Content-type: text/css; charset: UTF-8"); 
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
$abt = queryDbs("SELECT* FROM about WHERE status='enabled'");
$about = data($abt);
$aboutbackgroundimage = $about['background_picture'];
 ?>

.navbar-brand img{
    /* height: 50px; */
    width: 40px;
}
.nav-item a.nav-link{
    font-size: 20px;
    margin: 10px;
    color: <?php echo $text ?>;
    
    
}
.navbar{
  background-color:  <?php echo $navbar ?> ;

  
}
.nav-item .active{
    border-bottom: rgb(11, 151, 86) 2px dotted;
}
a.nav-link:hover{
    
    border-bottom: 5px  <?php echo reversecolor($navbar) ?> solid;
}
.top{
    margin-top: 30px;
}
/* sidebar style */
.wrapper {
    width: 100%;
}
  
  #sidebar {
    border-radius:200px;
    border: <?php echo $navbar ?> 5px dotted;
    min-width: 90px;
    max-width: 180px;
    height: min-content;
     background: #fff; 
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
    position: fixed;
    z-index: 1;
    top: 200px;
     }
    
    #sidebar.active {
      margin-left: -120px; }
      #sidebar.active .custom-menu {
        margin-right: -50px; }
      #sidebar.active .btn.btn-prima:before {
        content: "\f053";
        font-family: "FontAwesome";
        left: 2px !important; }
      #sidebar.active .btn.btn-prima:after {
        display: none; }
    

    #content {
        width: 100%;
        padding: 0;
        min-height: 100vh;
        -webkit-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
       }
        #sidebar ul li a{
          color:<?php echo reversecolor($text) ?>
          
        }
        #sidebar ul li a:hover {
        background-color:<?php echo reversecolor($text) ?>;
        color:<?php echo $text ?>;
          border-bottom: 1px solid  <?php echo reversecolor($navbar) ?>;
           }

      #sidebar ul li.active > a {
        background: transparent;
        color: #fff; }
        #sidebar ul li.active > a:hover {
          background:  <?php echo $navbar ?>;
          border-bottom: 1px solid  <?php echo reversecolor($navbar) ?>; }
    @media (max-width: 991.98px) {
      #sidebar {
        margin-left: -120px;
       
    }
        #sidebar.active {
          margin-left: 0; }
        #sidebar .custom-menu {
          margin-right: -60px !important;
          top: 10px !important; } }
    #sidebar .custom-menu {
      display: inline-block;
      position: absolute;
      top: 20px;
      right: 0;
      margin-right: -35px;
      -webkit-transition: 0.3s;
      -o-transition: 0.3s;
      transition: 0.3s; }
      @media (prefers-reduced-motion: reduce) {
        #sidebar .custom-menu {
          -webkit-transition: none;
          -o-transition: none;
          transition: none; } }
      #sidebar .custom-menu .btn.btn-prima {
        background:  <?php echo $navbar ?>;
        border-color: transparent;
        position: relative;
        color: <?php echo $text ?>;
        width: 30px;
        height: 30px; }
        #sidebar .custom-menu .btn.btn-prima:after, #sidebar .custom-menu .btn.btn-prima:before {
          position: absolute;
          top: 0px;
          left: 0;
          right: 0;
          bottom: 0;
          font-family: "FontAwesome";
          color: #fff; }
        #sidebar .custom-menu .btn.btn-prima:after {
          content: "\f053";
          right: 2px; }
  
  
    
  @media (max-width: 991.98px) {
    #sidebarCollapse span {
      display: none; 
    } 
    }
    
     #content {
        width: 100%;
        padding: 0;
        min-height: 100vh;
        -webkit-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s; }
      
      .btn.btn-prima {
        background:  <?php echo $navbar ?>;
        border-color:  <?php echo $navbar."77" ?>; }
        .btn.btn-primary:hover, .btn.btn-primary:focus {
          background:  <?php echo $navbar ?> !important;
          border-color:  <?php echo reversecolor($navbar) ?> !important; 
        }
        
  .userimage{
    background-image: linear-gradient( <?php echo $navbar."66" ?>,  <?php echo $navbar."66" ?>), url(<?php echo "auth/".$aboutbackgroundimage ?>);
    background-size: 100%;
  }
  .introduction{
    background-image: linear-gradient( <?php echo $navbar."66" ?>,  <?php echo reversecolor($navbar)."66" ?>);
    background-size: 100%;
    border-radius: 100px;
  }
  @media screen and (max-width:768px){
    .introduction h1{
      font-size: 20px;
    }
    .introduction h3{
      font-size: 18px;
      padding-top: 12px;
    }
    .introduction h4{
      font-size: 16;
    }
    .introduction h5{
      font-size: 14px;
      border-radius: 100px;
    }
    .top{
      margin-top: 60px;
    }
    .nav-item a.nav-link{
      font-size: 20px;
      margin: 10px;
      color: <?php echo $text ?>;
      
  }
  }