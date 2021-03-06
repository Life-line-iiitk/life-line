<?php session_start();?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/styles/stylo.css">
    <link rel="stylesheet" href="./assets/styles/dupe.css">
    <link rel="stylesheet" href="./assets/styles/index_styles.css">

    <link rel="stylesheet" href="./assets/styles/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;700;800;900&display=swap"
        rel="stylesheet">


</head>

<body>
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
                <li class="nav-item dropdown active mt-1">
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
<br><br><br>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-6 mt-4 mb-4">
                <img src="./assets/images/about.jpg" class="img-fluid">
            </div>
            <div class="col-md-6 p-5" style="margin-top: 6rem;">
                <h1 class="display-4" style="color:var(--red)">ABOUT US</h1>
                <h5 class="mt-3" style="color:gray">Life-Line is non profit organization committed to <br>help people
                    who are in need of
                    blood or
                    organs.
                </h5>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h1 style="text-align:center;color:var(--red);font-weight: bold;">A BRIEF OUT</h1>
        <div class="row mt-4">
            <div class="col-lg-4 ">

                <center>
                    <div class="images"><img src="./assets/images/images-1.svg" alt="Lights" style="width:100%"></div>
                </center><br>
                <div class="general-headings">
                    What we do ?
                </div>
                <div class="general-texts">
                    <p>We connect blood and organ donors with recipients, without any intermediary such as blood
                        banks, for an efficient and seamless process.</P>
                </div>

            </div>
            <div class="col-lg-4 ">

                <center>
                    <div class="images"> <img src="./assets/images/images-4.svg" alt="Lights" style="width:100%"></div>
                </center>
                <div class="general-headings mt-4">
                    Get notified
                </div>
                <div class="general-texts">
                    <p>Line Line Connect works with network partners to connect nearby blood donars,organ donors and
                        recipients through an automated SMS service,email service
                    <p>
                </div>

            </div>
            <div class="col-lg-4 ">

                <center>
                    <div class="images"><img src="./assets/images/images-2.svg" alt="Lights" style="width:100%"></div>
                </center><br>
                <div class="general-headings">
                    Innovative
                </div>
                <div class="general-texts">
                    <p>Life Line Connect is an innovative approach  address global health. We provide immediate
                        access to blood donors and organ donars.</p>
                </div>

            </div>
            <div class="col-lg-4 ">
                <br>
                <center>
                    <div class="images"><img src="./assets/images/images-5.svg" alt="Lights" style="width:100%"></div>
                </center>
                <div class="general-headings">
                    Totally Free
                </div>
                <div class="general-texts">
                    <p>Life Line Connect's ultimate goal is to provide an easy-to-use, easy-to-access, fast,
                        efficient, and reliable way to get life-saving blood and organ, totally Free of cost.</p>
                </div>

            </div>
            <div class="col-lg-4 ">

                <center>
                    <div class="images"><img src="./assets/images/images-3.svg" alt="Lights" style="width:100%"></div>
                </center><br>
                <div class="general-headings">
                    Network
                </div>
                <div class="general-texts">
                    <p>Life line is the one of several community organizations working together as a network that
                        responds to emergencies in an efficient manner.</p>
                </div>

            </div>
            <div class="col-lg-4 ">

                <center>
                    <div class="images"><img src="./assets/images/images-6.svg" alt="Lights" style="width:100%"></div>
                </center>
                <div class="general-headings">
                    Save Life
                </div>
                <div class="general-texts">
                    <p>We are a non profit foundation and our main objective is to make sure that everything is done
                        to protect vulnerable persons. Help us by making a gift !</p>
                </div>

            </div>
        </div>
    </div>
    <div class="main-button mt-4">
        <button type="button" class="btn btn-lg" style="background-color:var(--red)"><a style="color:white"
                href="./requests.php" style="text-decoration:none;">Start saving lifes</button></a>
    </div><br>
    <div class="general-headings mt-4">Using our service is as simple as saying, Hello!</div>
    <div class="pre-headings mt-3"> As Follows:</div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-6">
                <div class="length">
                    <p>1.<i class='fas fa-sign-in-alt' style='font-size:24px;color:var(--red)'> Register</i></p>
                    <p>2.<i class='fas fa-tint' style='font-size:24px;color:var(--red)'> Post a request</i></p>
                    <p>3.<i class='fas fa-mobile-alt' style='font-size:24px;color:var(--red)'> Get notified</i></p>
                    <p>4.<i class='fas fa-heartbeat' style='font-size:24px;color:var(--red)'> Save a Life</i></p>
                </div>
            </div>
        </div>
    </div>
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
    ?? 2021 Copyright:Life Line
</div>
</footer>
</body>

</html>
