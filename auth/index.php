<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="../bootstrap/bootstrap.min.css"> -->
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> 

    <link rel="stylesheet" href="../bootstrap/animate.css">
    <link rel="stylesheet" href="../fontawesome-free/css/all.css">
    <link rel="stylesheet" href="../style.php">
    <link rel="icon" href="../image/9.jpg">
    <link rel="manifest" href="../manifest.jso"></head>
<body>
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-sm-3 col-md-3">
                  
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title"><h2 class="text-center font-weight-bold">Auth</h2></div>
                            <p class="text-danger text-center error"></p>
                        </div>
                        <div class="card-body">
                    
                    <form id="loginform">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                          </div>
                          <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                      
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                          </div>

                          <!-- <div class="card-footer"> -->
                              <button class="btn btn-block btn-success" id="loginbtn">Login</button>
                          <!-- </div> -->
                    </form> 
                </div>
            </div>

                </div>
                <div class="col-sm-3 col-md-3"></div>
            </div>
        </div>
    </div>

</body>
</html>
<!-- <script src="../jquery/jquery.min.js"></script> -->
<script>
    $(document).ready(function(){
    $('#loginbtn').click(function (event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'login.php',
            data: $('#loginform').serialize(),
            success: function (data) {
                var result = data;
                $(".error").html(result);
                if (result =="<h4 class='text-success'>Login Successfully</h4>") {
                    window.location.assign('dashboard.php');
                }
               
            }
        });
    })
})
</script>