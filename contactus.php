<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Icons CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- This CSS file consists of all the CSS styles for the website in common. -->
    <link rel="stylesheet" href="./assets/styles/style.css">

    <title>Life Line | Contact Us</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/styles/style_contactus.css">
    <script src="./assets/js/index.js"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

</head>

<body>
    <!-- navbar -->
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

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-6 mt-4 mb-4">
                <img src="./assets/images/blogging.png" class="img-fluid">
            </div>
            <div class="col-md-6" style="margin-top: 3rem;">
                <h1 class="display-4" style="color:var(--red); font-weight: 500; font-family: poppins;">CONTACT US</h1>
                <h5 class="mt-2" style="color:gray; font-family: poppins;">

                    Drop a mesasge below to approach us <br>or to share your concern.
                </h5>

                <form style="font-family: poppins;">
                    <div class="row mt-3">
                        <div class="col">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">First Name</label>
                                <input placeholder="First Name" type="text" class="form-control" id="firstname"
                                    aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="secondname" class="form-label">Second Name</label>
                                <input placeholder="Second Name" type="text" class="form-control" id="secondname"
                                    aria-describedby="emailHelp">
                            </div>
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" placeholder="Email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <input type="text" class="form-control" id="message" placeholder="Enter your message">
                    </div>

                    <button type="submit" class="btn btn-send btn-lg">Send</button>
                </form>

            </div>
        </div>
    </div>


    <div class="container mt-5 mb-5">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <p><b class="b-icons" style="color:var(--red)"> <i class="fas fa-phone-alt"></i> Phone :</b> 04822 202
                    100</p>
                <hr>
                <p><b class="b-icons" style="color:var(--red)"><i class="fas fa-map-marked-alt"></i> Address :</b>
                    Indian Institute of
                    Information
                    Technology Kottayam,Valavoor, Palai,
                    Kottayam District, Kerala</p>
                <span class="add">Valavoor - Chakkampuzha Rd, Valavoor, Kerala 686635</span>
                <hr>
                <p><b class="b-icons" style="color:var(--red)"><i class="fas fa-envelope"></i> Email :
                    </b>lifelineorg@gmail.com
                <p>
            </div>
            <div class="col-md-6">

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7342949.817358963!2d71.60160699644165!3d13.36244464095378!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b07ce23bc170053%3A0x8757971e61eb21dd!2sIndian%20Institute%20of%20Information%20Technology%20(IIIT)%20Kottayam!5e0!3m2!1sen!2sin!4v1632379324804!5m2!1sen!2sin"
                    style="border:0;width:100%;height:100%" allowfullscreen="" loading="lazy"></iframe>
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
            © 2021 Copyright:Life Line
        </div>
    </footer>



</body>

</html>
