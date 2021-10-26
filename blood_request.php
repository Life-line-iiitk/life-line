<?php
session_start();
include('./db_conn.php');
$id=$_SESSION['user_id'];
if(isset($_POST['submit']))
{
    $msg=$_POST['purpose'];
    $blood_grp=$_POST['blood_group'];
    if(isset($_POST['urgent']))
    {
        $urgent=1;
    }
    else
    {
        $urgent=0;
    }
    //$type=$_POST['type'];
    $location=$_POST['location'];
    if($_POST['lat']!="0")
    {
        echo "<script>console.log('$id,$msg,$blood_grp,$location,$type');</script>";

        $lat=$_POST['lat'];
        $lon=$_POST['lon'];
        $sql = "INSERT INTO blood_requesters (`requester_id`,`msg`,`blood_grp`,`urgent`,`type`,`location`,`lat`,`lon`) VALUES ('$id','$msg','$blood_grp','$urgent','$type','$location','$lat','$lon');";
    }
    else
    {
        $sql = "INSERT INTO blood_requesters (`requester_id`,`msg`,`blood_grp`,`urgent`,`type`,`location`) VALUES ('$id','$msg','$blood_grp','$urgent','$type','$location')";
    }
    $conn->query($sql);
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

    <!--Data Aos-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;700;800;900&display=swap"
        rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- This CSS file consists of all the CSS styles for the website in common. -->
    <link rel="stylesheet" href="./assets/styles/style.css">

    <link rel="stylesheet" href="./assets/styles/blood_request_styles.css">
    <title>Life Line | Blood Request Form</title>
</head>

<body>
    <div class="container">
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

    </div>
    <br>
    <br>
    <br>

    <!--img-->
    <div class="container text-center">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-5 mt-5">
                <img src="./assets/images/blood_request.jpg" class="img-fluid">
            </div>

        </div>
    </div>

    <br>
    <br>
    <!--Title-->
    <div class="text-center title" data-aos="zoom-in-up" data-aos-duration="3000">
        <h1 class="display-4" style="color:var(--red)">Blood Request form</h1>
    </div>
    <hr class="line">
    <div class="text-center note">
        <h5>Note: <span style="color: var(--red); font-size: 2rem;">*</span> (required field)</h5>
    </div>


    <!--form starts-->
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
<<<<<<< HEAD
                <form class="needs-validation" method="post" action="blood_request.php" novalidate >
=======
                <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" novalidate>
>>>>>>> eb2d2054dccb242751df6f859b22a327a555310c
                    <div class="form-group">
                        <label for="type" class="form-label" ><b>Type<span
                                    style="color: red; font-size: 1.rem;">*</span></b></label>
                        <select class="form-control ib" name="type" id="type" required>
                            <option selected disabled value="">Choose Required Type...</option>
                            <option value="blood" class="opt">Blood</option>
                            <option value="plasma">Plasma</option>
                            <option value="platelets">Platelets</option>
                        </select>
                        <div class="invalid-feedback">
                            Please fill this field.
                        </div>
                    </div>


                    <div class="form-group">

                        <label for="blood_group" class="form-label"><b>Blood Group<span
                                    style="color: red; font-size: 1.rem;">*</span></b></label>
                        <select class="form-control ib" name="blood_group" id="blood_group" required>
                            <option selected disabled value="">Choose required Blood Group...</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                        <div class="invalid-feedback">
                            Please fill this field.
                        </div>

                    </div>

                    <div class="form-group">

                        <label for="location"><b>Location<span
                                    style="color: red; font-size: 1.rem;">*</span></b></label>
                        <input type="text" class="form-control ib" name="location" id="location"
                            placeholder="Eg: Guntur, AndhraPradesh" required>
                        <div class="invalid-feedback">
                            Please fill this field.
                        </div>

                    </div>

                    <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input ib" onclick="getlocation()" type="checkbox" name="presentLocation" id="coordinates">
                            <b>Use
                                My Current Coordinates</b>
                        </label>
                    </div>
                    <input type="hidden" value="0" name="lat" id="lat">
                    <input type="hidden" value="0" name="lon" id="lon">

                    <div class="form-group">

                        <label for="purpose"><b>Purpose<span style="color: red; font-size: 1.rem;">*</span></b></label>
                        <input type="text" class="form-control ib" name="purpose" id="purpose"
                            placeholder="Eg: My friend met with a road accident" required>
                        <div class="invalid-feedback">
                            Please fill this field.
                        </div>

                    </div>

                    <div class="tgl container-fluid">
                        <ul>
                            <li>
                                <div class="form-group form-check">
                                    <label class="form-check-label pl-10 switch">
                                        <input class="checkbox ib" type="checkbox" name="urgent" id="urgent" required>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <b class="ml-2">URGENT</b>
                            </li>
                        </ul>
                    </div>

                    <div class="form-group form-check">
                        <label class="form-check-label pl-10">
                            <input class="form-check-input ib" type="checkbox" name="remember" required><b
                                style="color: var(--red);">I
                                agree on </b><a href="terms.php" target="_blank"> terms and conditions. </a><span
                                style="color: red; font-size: 1.rem;">*</span>
                            <!-- <div class="valid-feedback">Valid.</div> -->
                            <div class="invalid-feedback">Check this checkbox to continue.</div>
                        </label>
                    </div>

                    <div class="">
                        <button type="submit" name="submit" id="submit" class="btn mb-4 btn-lg b">Submit </button>
                    </div>

                </form>
            </div>
        </div>
    </div>



    

    <!-- Footer -->
    <div class="footer">
        <footer class="text-center text-lg-start bg-light mt-5 text-muted">

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
                                <a href="aboutus.php" class="text-reset">About Us</a>
                            </p>
                            <p>
                                <a href="contactus.php" class="text-reset">Contact Us</a>
                            </p>

                        </div>

                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
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
                                <a href="./organ_request_form.php" class="text-reset">Request Organs</a>
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

    <script>
        AOS.init();

        function getlocation()
        {
            var checkbox = document.getElementById('coordinates');
            if (checkbox.checked != false) {
	            if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                }
                else
                {
                    alert("Geolocation is not supported by this browser.");
                }
            }
        }

        function showPosition(position) {
            var x,y;
            x=position.coords.latitude ;
            y=position.coords.longitude;
            document.getElementById("lat").value=x;
            document.getElementById("lon").value=y;
            }
    </script>
</body>

</html>
