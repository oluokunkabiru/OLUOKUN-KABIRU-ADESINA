<?php
header("Content-type: text/css; charset: UTF-8"); 
$navcolor = "#cacccc";

 ?>

.navbar-brand img{
    /* height: 50px; */
    width: 40px;
}
.nav-item a.nav-link{
    font-size: 20px;
    margin: 10px;
    color: white;
    
}
.navbar{
  background-color:  <?php echo $navcolor ?> ;
}
.nav-item .active{
    border-bottom: rgb(11, 151, 86) 2px dotted;
}
a.nav-link:hover{
    
    /* border-bottom: 5px rgb(0, 162, 255) solid; */
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
    border: green 5px dotted;
    min-width: 90px;
    max-width: 180px;
    height: min-content;
     background: #ffffff; 
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
      #sidebar.active .btn.btn-primary:before {
        content: "\f053";
        font-family: "FontAwesome";
        left: 2px !important; }
      #sidebar.active .btn.btn-primary:after {
        display: none; }
    

    #content {
        width: 100%;
        padding: 0;
        min-height: 100vh;
        -webkit-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s; }
        #sidebar ul li a:hover {
          color: #fff;
          background: #000000;
          border-bottom: 1px solid #2f89fc; }

      #sidebar ul li.active > a {
        background: transparent;
        color: #fff; }
        #sidebar ul li.active > a:hover {
          background: #2f89fc;
          border-bottom: 1px solid #2f89fc; }
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
      #sidebar .custom-menu .btn.btn-primary {
        background: #2ffcbe;
        border-color: transparent;
        position: relative;
        color: #000;
        width: 30px;
        height: 30px; }
        #sidebar .custom-menu .btn.btn-primary:after, #sidebar .custom-menu .btn.btn-primary:before {
          position: absolute;
          top: 0px;
          left: 0;
          right: 0;
          bottom: 0;
          font-family: "FontAwesome";
          color: #fff; }
        #sidebar .custom-menu .btn.btn-primary:after {
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
      
      .btn.btn-primary {
        background: #2f89fc;
        border-color: #2f89fc; }
        .btn.btn-primary:hover, .btn.btn-primary:focus {
          background: #2f89fc !important;
          border-color: #2f89fc !important; 
        }
        
  .userimage{
    background-image: linear-gradient(rgba(85, 233, 238, 0.4), rgba(30, 60, 90, 0.267)), url(image/20.jpg);
    background-size: 100%;
  }
  .introduction{
    background-image: linear-gradient(rgba(70, 74, 78, 0.4), rgba(70, 70, 73, 0.66));
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
      color: black;
      
  }
  }