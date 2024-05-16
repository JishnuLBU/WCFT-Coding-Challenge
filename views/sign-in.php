<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>Patient Care | Signin</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="../public/assets/css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="../public/assets/css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="../public/assets/css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="../public/assets/css/responsive.css">
   </head>
   <body>
    
        <!-- Sign in Start -->
        <section class="sign-in-page">
          <div id="container-inside">
              <div class="cube"></div>
              <div class="cube"></div>
              <div class="cube"></div>
              <div class="cube"></div>
              <div class="cube"></div>
          </div>
            <div class="container p-0 signincard">
                <div class="row no-gutters height-self-center">
                  <div class="col-sm-12 align-self-center bg-primary rounded">
                    <div class="row m-0">
                      <div class="col-md-6 bg-white sign-in-page-data">
                          <div class="sign-in-from">
                          <div id="infoMessage">
    <?php
    if (isset($_GET['error']) && $_GET['error'] === 'invalid_credentials') {
        echo '<div class="alert alert-danger">Invalid email or password. Please try again.</div>';
    }
    ?>
</div>
                              <h1 class="mb-0 text-center">Sign in</h1>
                              <p class="text-center text-dark">Enter your email address and password to access admin panel.</p>
                              <form class="mt-4" id="loginForm" action="login.php">
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Email address</label>
                                      <input type="email" name="email" class="form-control mb-0" id="exampleInputEmail1" placeholder="Enter email">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Password</label>
                                      <a href="#" class="float-right">Forgot password?</a>
                                      <input type="password" name="password" class="form-control mb-0" id="exampleInputPassword1" placeholder="Password">
                                  </div>
                                  <div class="d-inline-block w-100">
                                      <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                          <input type="checkbox" class="custom-control-input" id="customCheck1">
                                          <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                      </div>
                                  </div>
                                  <div class="sign-info text-center">
                                      <button type="submit" class="btn btn-primary btn-lg d-block w-100 mb-2">Sign in</button>
<!--
                                      <span class="text-dark dark-color d-inline-block line-height-2">Don't have an account? <a href="#">Sign up</a></span>
                                 -->
                                 
                                    </div>


                              </form>
                          </div>
                      </div>
                      <div class="col-md-6 text-center sign-in-page-image">

<img class="" src="../public/assets/images/signin.png"/>
                         
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </section>
        <!-- Sign in END -->
       
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="../public/assets/js/jquery.min.js"></script>
      <script src="../public/assets/js/popper.min.js"></script>
      <script src="../public/assets/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            
            $('#loginForm').submit(function(e){ 
            e.preventDefault();
            var formData = $(this);
            $.ajax({
                url: 'login.php',
                type: 'POST',
                data: formData.serialize(),
                dataType: 'json',
                success: function(response) {
                    let infoMessage = $('#infoMessage');
                    window.location.href = response.redirect_url;
                    if (response.status === 'success') {
                        
                    } else {
                     infoMessage.html('<div class="alert alert-danger">' + response.msg + '</div>');
                    }
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    //formData[0].reset();
                },
                error: function() {
                    $('#infoMessage').html('<div class="alert alert-danger">Invalid Credentials.</div>');
                }
                
            });
        });

        });
    </script>
   </body>
</html>
