<?php 
    session_start();
    include('./signin_config.php');
    include('./db_conn.php');

    $login_button="";
    if(isset($_GET["code"]))
    {
        $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

        if(!isset($token['error']))
        {
            $google_client->setAccessToken($token['access_token']);
            $_SESSION['access_token'] = $token['access_token'];

            $google_service = new Google_Service_Oauth2($google_client);
            $data = $google_service->userinfo->get();
            
            if(!empty($data['email']))
            {
                $_SESSION['user_email_address'] = $data['email'];
            }
        }
    }


    if(!isset($_SESSION['access_token']))
    {
        $login_button = '<div class="glg mt-3 text-center">
                        <small><b>Or</b></small>
                        <br>
                        <a href="'.$google_client->createAuthUrl().'" class="btn btn-google"><img src="./assets/images/google.jpg" style="height:2rem" alt=""> Sign In with Google</a>
                        </div>';
    }
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Icons CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;700;800;900&display=swap"
        rel="stylesheet">


    <!-- This CSS file consists of all the CSS styles for the website in common. -->
    <link rel="stylesheet" href="./assets/styles/style.css">

    <!-- Styles and JS files exclusive for this page  -->
    <link rel="stylesheet" href="./assets/styles/sign_in_styles.css">
    <script src="./assets/js/sign_in.js"></script>

    <title>Life Line | Login</title>
</head>
<style>
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
</style>
<body class="bg">
    <div class="container-fluid">
        <div class="container" style="margin-top:5rem;">
            <div class="row" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color: white;">
                <div class="col-md-6 mobile">
                    <img src="./assets/images/signin.gif" class="img-fluid" alt="login image" style="height:100%;">
                </div>
                <div class=" col-md-6 right" style="background-color: white;">
                    <div class="title mt-3">
                        <h1>Sign In</h1>
                    </div>
                    <hr>

                    <form class="mt-5" action="" method="post">
                        <div class="input">
                            <i class="fa fa-envelope" style="color: var(--red);"></i>
                            <input type="email" id="email" name="email" placeholder="Enter your Email Id">
                        </div>
                        <div class="input mt-2">
                            <i class="fa fa-lock" style="color: var(--red);"></i>
                            <input type="password" name="password" id="password" placeholder="Enter your password">
                        </div>
                        <div class="input">
                            <input type="checkbox" onclick="Toggle()"> <span
                                style="color: var(--red);font-family:'Raleway', sans-serif;font-size: 18px;text-align: left;">Show
                                Password</span>
                        </div>

                        <div class="col text-center">
                            <button class="btn btn-lg ml-3" type="submit">Sign In</button>
                        </div>
                    </form>

                    
                        <?php
                        if($login_button == '')
                        {
                            $email=$_SESSION['user_email_address'];
                            $q="SELECT * FROM `users` WHERE email='$email'";
                            $res = $conn->query($q);
                            if (!($res->num_rows > 0))
                            {
                                $google_client->revokeToken();

                                session_destroy();
                                ?>
                                 <script>
                                alert("THIS EMAIL ADDRESS DOES NOT EXIST!!!");
                                
                                location.replace("register.php");
                                </script>
                            <?php
                            }
                            else
                            {
                                $row = $res->fetch_assoc();
                                $_SESSION['user_id'] = $row['id'];
                                ?>
                                <script>
                                    location.replace("dashboard.php");
                                </script>
                            <?php
                            }
                        }
                        else
                        {
                            echo $login_button;
                        }
                        ?>
                    <p class="text-center mt-2" style="font-weight: 510;">Are you a new user? <a
                            href="register.php">signup</a> </p>
                    </div>


                </div>
            </div>
        </div>

        <div class="footer">
            <!-- Footer -->
            <footer class="text-center text-lg-start bg-light text-muted mt-4">

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
                        <a href="https://github.com/Life-line-iiitk" class="me-4 text-reset p-3">
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
                                    <a href="index.php" class="text-reset">Home</a>
                                </p>
                                <p>
                                    <a href="aboutus.php" class="text-reset">About Us</a>
                                </p>
                                <p>
                                    <a href="contactus.php" class="text-reset">Contact Us</a>
                                </p>

                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">
                                    <b>Useful links</b>
                                </h6>
                                <p>
                                    <a href="#!" class="text-reset">Donate Blood</a>
                                </p>
                                <p>
                                    <a href="blood_request.php" class="text-reset">Request Blood</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">Donate Organs</a>
                                </p>
                                <p>
                                    <a href="organ_request_form.php" class="text-reset">Request Organs</a>
                                </p>
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
    </div>
</body>

</html>