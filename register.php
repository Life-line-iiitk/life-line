<?php 
//session_start();
include('./register_config.php');
include('./db_conn.php');
$login_button = '';


if(isset($_GET["code"]))
{
  $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

  if(!isset($token['error']))
  {
 
    $google_client->setAccessToken($token['access_token']);
    $_SESSION['access_token'] = $token['access_token'];


    $google_service = new Google_Service_Oauth2($google_client);
    $data = $google_service->userinfo->get();

 
    if(!empty($data['given_name']))
    {
      $_SESSION['user_first_name'] = $data['given_name'];
    }

    if(!empty($data['family_name']))
    {
      $_SESSION['user_last_name'] = $data['family_name'];
    }

    if(!empty($data['email']))
    {
      $_SESSION['user_email_address'] = $data['email'];
    }
 }
}


if(!isset($_SESSION['access_token']))
{
$login_button ='<a href="'.$google_client->createAuthUrl().'" class="btn btn-google"><img src="./assets/images/google.jpg" style="height:2rem" alt=""> Sign up with Google</a>';
}

?>

<?php
$insert = false;
if(isset($_POST['signup']))
{
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $repass=$_POST['repassword'];
    
    $password = password_hash($pass, PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $flag=1;
    if ($age < 18 && $age != 0)
    {
    $flag=0;      ?>
    <script>                        
        alert("You have to be 18+ to be a donor");
        location.replace("register.php");
    </script>
    <?php
    }
       
      if ($age > 122)
      {$flag=0;?>
    <script>                        
        alert("Longest lived human being is 122 src. google");
        location.replace("register.php");
    </script>
    <?php
    }
          
      if (strlen($pass) <= 6) {$flag=0;?>
    <script>                        
        alert("Password should be more than 6 letters");
        location.replace("register.php");
    </script>
    <?php
    }
      if ($pass != $repass) {$flag=0;?>
    <script>                        
        alert("Passwords did not match");
        location.replace("register.php");
    </script>
    <?php
    }
  
    $sql1 = "SELECT * FROM users WHERE email='$email'";
    $r=$conn->query($sql1);

    
    if($r->num_rows >0)
    {?>
    <script>                        
        alert("Entered email address already enters");
        location.replace("register.php");
    </script>
    <?php
    }

    
    else
    {
      $sql = "INSERT INTO `users` (`email`, `password`, `phone`, `name`, `age`) VALUES ('$email', '$password', '$phone', '$name', '$age');";
    }

    if($flag==1){
    if($conn->query($sql) == true )
    {
        $insert = true;
        header("location:sign_in.php");
    }}
}
?>



<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- This CSS file consists of all the CSS styles for the website in common. -->
  <link rel="stylesheet" href="./assets/styles/style.css">
  <title>Life Line | Sign Up</title>
</head>

<body>
  <style>
    body {
      background-color: var(--light);
    }

    .btn-google
    {
      border:2px solid var(--red);
      color:var(--red);
      font-weight:bold;
    }

    .btn-google:hover
    {
      background-color:var(--red);
      color:var(--white);
      font-weight:bold;
    }
    .card-registration .select-input.form-control[readonly]:not([disabled]) {
      font-size: 1rem;
      line-height: 2.15;
      padding-left: .75em;
      padding-right: .75em;
    }

    .card-registration .select-arrow {
      top: 13px;
    }

    @media screen and (max-width: 768px) {
      
      .footer{
        margin: 37rem auto;
      }
    }
  </style>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top pl-5">
        <a class="navbar-brand ml-4" href="#">
            <h3 class="brand-name">Life Line</h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="toggle-btn"></div>
            <div class="toggle-btn"></div>
            <div class="toggle-btn"></div>
        </button>
        <div class="collapse navbar-collapse mr-5" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mt-1">
                    <a class="nav-link" href="./index.php">Home</a>
                </li>
                <li class="nav-item mt-1">
                    <a class="nav-link" href="./requests.php">Requests</a>
                </li>
                <li class="nav-item mt-1">
                    <a class="nav-link" href="./donors.php">Donors</a>
                </li>
                <li class="nav-item dropdown mt-1">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pages
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                        if(isset($_SESSION['user_id'])){
                            ?>
                        <a class="dropdown-item" href="./blood_donor.php">Donate Blood</a>
                        <?php
                        }
                        else{
                            ?>
                            <a class="dropdown-item" href="./sign_in.php">Donate Blood</a>
                            <?php
                        }?>
                        <?php
                        if(isset($_SESSION['user_id'])){
                            ?>
                        <a class="dropdown-item" href="./blood_request.php">Request Blood</a>
                        <?php
                        }
                        else{
                            ?>
                            <a class="dropdown-item" href="./sign_in.php">Request Blood</a>
                            <?php
                        }?>
                        <div class="dropdown-divider"></div>
                        <?php
                        
                        if(isset($_SESSION['user_id'])){
                            ?>
                        <a class="dropdown-item" href="./organ_donate.php">Donate Organs</a>
                        <?php
                        }
                        else{
                            ?>
                            <a class="dropdown-item" href="./sign_in.php">Donate Organs</a>
                            <?php
                        }?>
                        <?php
                        if(isset($_SESSION['user_id'])){
                            ?>
                        <a class="dropdown-item" href="./organ_request_form.php">Request Organs</a>
                        <?php
                        }
                        else{
                            ?>
                            <a class="dropdown-item" href="./sign_in.php">Request Organs</a>
                            <?php
                        }?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="./aboutus.php">About Us</a>
                        <a class="dropdown-item" href="./contactus.php">Contact Us</a>
                        <a class="dropdown-item" href="./faq.php">FAQ</a>
                    </div>
                </li>
                <?php 
                    if(isset($_SESSION['user_id'])){    
                ?>
                <a href="./dashboard.php" class="btn sign-up mt-1 ml-2">Dashboard</a>
                <a href="./logout.php" class="btn sign-up mt-1 ml-2">Logout</a>
                <?php 
                    }
                    else{
                ?>
                <a href="register.php" class="btn sign-up mt-1 ml-2">Sign Up</a>
                <a href="sign_in.php" class="btn sign-in mt-1 ml-2">Sign In</a>
                <?php 
                    }
                ?>
            </ul>
        </div>
    </nav>


  <section>

    <div class="container py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="row">
              <div class="col-md-6 mt-5">
                <img class="img-fluid mt-5" src="./assets/images/Mobile-login.jpg" alt="">
              </div>
              <div class="col-md-6">
                <h1 class="row justify-content-center mb-4 mt-4" style="color: var(--red);font-weight:bold">
                  SIGN UP
                </h1>

                <?php

                  if(@$_GET['Email_err']==true)
                  {
                ?>
                <div class="alert-light text-danger text-center py-3" style="font-weight:bold;"><?php echo $_GET['Email_err'] ?></div>
                <?php
                  }
                ?>
                

                <form id="form" method="post" action="register.php">


                  <div class="col-md-12 mb-3">
                    <div class="form-outline">
                      <input type="text" placeholder="Full Name" id="name" name="name" required class="form-control" />
                    </div>

                  </div>

                  <div class="col-md-12 mb-3 d-flex align-items-center">
                    <div class="form-outline datepicker w-100">
                      <input placeholder="Age" type="number" required class="form-control  " id="age" name="age" />
                    </div>

                  </div>
                  <div class="col-md-12 mb-3">
                    <h6 class="mb-2 pb-1">Gender: </h6>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender"
                        value="option1" checked />
                      <label class="form-check-label" for="femaleGender">Female</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender"
                        value="option2" />
                      <label class="form-check-label" for="maleGender">Male</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender"
                        value="option3" />
                      <label class="form-check-label" for="otherGender">Other</label>
                    </div>

                  </div>


                  <div class="col-md-12 mb-2 pb-2">
                    <div class="form-outline">
                      <input placeholder="Email" type="email" id="email" name="email" required class="form-control  " />
                    </div>

                  </div>
                  <div class="col-md-12 mb-2 pb-2">

                    <div class="form-outline">
                      <input placeholder="Mobile number" type="tel" id="phone" name="phone" required class="form-control  " />
                    </div>

                  </div>


                  <div class="col-md-12 mb-2 pb-2">
                    <div class="form-outline">
                      <input placeholder="Password" type="password" id="password" name="password" class="form-control  " required />
                    </div>

                  </div>
                  <div class="col-md-12 pb-2">
                    <div class="form-outline">
                      <input placeholder="Confirm Password" type="password" id="repassword" name="repassword" class="form-control"
                        required />
                    </div>

                  </div>


                  <div class="mt-3 pt-2 col-md-12" style="text-align: center;">
                    <button type="submit" id="signup" name="signup" class="btn btn-block btn-lg"
                      style="background-color:var(--red);color:#fff;">Sign Up</button>
                  </div>
                  <br>
                  <div style="font-weight:bold" class="row justify-content-center align-items-center">
                    <p>Have an account?</p>
                    <pre><a href="sign_in.php"> Sign In</a></pre>
                  </div>
                  <div class="col text-center">
                    <p>Or</p>
                  </div>
                   <?php
                      if($login_button == '')
                      {
                        $email=$_SESSION['user_email_address'];
                        $q="SELECT * FROM `users` WHERE email='$email'";
                        $res = $conn->query($q);
                        if ($res->num_rows > 0)
                        {
                        ?>
                          <script>
                            alert("THIS EMAIL ADDRESS ALREADY EXISTS!!!");
                            location.replace("logout.php");
                          </script>
                        <?php
                        }
                        else{
                        ?>
                        <script>
                          location.replace("google_signup.php");
                        </script><?php } 
                      }
                      
                      else
                      {
                        echo '<div class="col text-center">'.$login_button . '</div>';
                      }
                    
                    ?>
                  
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <p id="test"></p>
  </section>
  <section>
    <div class="footer">
      <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">

<section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
    </div>

    <div>
        <a href="" class="me-4 text-reset p-3">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 text-reset p-3">
            <i class="fab fa-twitter"></i>
        </a>

        <a href="" class="me-4 text-reset p-3">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 text-reset p-3">
            <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="me-4 text-reset p-3">
            <i class="fab fa-github"></i>
        </a>
    </div>
</section>

<section class="">
    <div class="container text-center text-md-start mt-5">
        <div class="row mt-3">
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                <h5 class="text-uppercase fw-bold mb-4" style="color:var(--red);font-weight:bold">
                    LIFE LINE
                </h5>
                <p>
                    Life-Line is non profit organization committed to help
                    people who are in need of
                    blood or organs.
                </p>
            </div>

            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                <h6 class="text-uppercase fw-bold mb-4">
                    <b>QUICK LINKS</b>
                </h6>
                
                <p>
                    <a href="./index.php" class="text-reset">Home</a>
                </p>
                <p>
                    <a href="./aboutus.php" class="text-reset">About Us</a>
                </p>
                <p>
                    <a href="./contactus.php" class="text-reset">Contact Us</a>
                </p>

            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase fw-bold mb-4">
                    <b>Useful links</b>
                </h6>
                <?php
                if(isset($_SESSION['user_id'])){
                    ?>
                <p>
                    <a href="./blood_donor.php" class="text-reset">Donate Blood</a>
                </p>
                <?php
                }
                else{
                    ?>
                    <p>
                    <a href="./sign_in.php" class="text-reset">Donate Blood</a>
                </p>
                    <?php
                }?>
                <?php
                if(isset($_SESSION['user_id'])){
                    ?>
                <p>
                    <a href="./blood_request.php" class="text-reset">Request Blood</a>
                </p>
                <?php
                }
                else{
                    ?>
                    <p>
                    <a href="./sign_in.php" class="text-reset">Request Blood</a>
                </p>
                    <?php
                }?>
                <?php
                if(isset($_SESSION['user_id'])){
                    ?>
                <p>
                    <a href="./organ_donate.php" class="text-reset">Donate Organs</a>
                </p>
                <?php
                }
                else{
                    ?>
                    <p>
                    <a href="./sign_in.php" class="text-reset">Donate Organs</a>
                </p>
                    <?php
                }?>
                <?php
                if(isset($_SESSION['user_id'])){
                    ?>
               <p>
                    <a href="./organ_request_form.php" class="text-reset">Request Organs</a>
                </p>
                <?php
                }
                else{
                    ?>
                    <p>
                    <a href="./sign_in.php" class="text-reset">Request Organs</a>
                </p>
                    <?php
                }?>
                
                
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                <h6 class="text-uppercase fw-bold mb-4">
                    <b>Contact</b>
                </h6>
                <p><i class="fas fa-home me-3"></i> IIIT Kottayam</p>
                <p>
                    <i class="fas fa-envelope me-3"></i>
                    lifelinesupport@gmail.com
                </p>
                <p><i class="fas fa-phone me-3"></i>+91 9347619384</p>
            </div>
        </div>
    </div>
</section>
<div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:Life Line
</div>
</footer>
  </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

</body>

</html>
