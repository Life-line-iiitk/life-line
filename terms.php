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

<div class="main-heading">Terms and conditions</div>
<div class="general-texts"><br> <br>


<ul>
<li>People registering on this site (life-line) must understand that the information provided by them on the registration page is available to a person seeking for a particular blood group.</li>
<li>We do not sell contact details of potential donors to any third party or use it in any way for commercial gains.</li>
<li>We does not arrange for blood,organ. We only provide relevant information about potential donors to those in need of blood,organ.</li>
<li>We do not have a blood bank and is not affiliated to any blood bank.</li>
<li>We do not guarantee that a potential donor will agree to donate blood,organ whenever called upon to do so. It is entirely at the discretion of the individual whether or not to donate blood,organ.</li>
<li>We does not claim that potential donors are free from any disease, ailment, or bodily conditions preventing them from donating blood at the time when they are contacted for blood donation. Onus is completely on the individual looking for blood to verify these details from the donor.</li>
<li>We urge you not to make false registrations if you do not seriously wish to donate blood,organ. It is a matter of life and death for those in need of blood,organ in an emergency or otherwise.</li>
<li>We reserves right to inactivate member at any given time in case found wrong information given or misuse of service</li>

</ul>

</div>
<div class="general-headings">Terms of use</div>
<div class="general-texts">If you access any part of the life-line Give Blood,Organ app, you agree:</div>
   <div class="general-texts"><ul>
   <li>To ensure that any details which you supply to us to register for such access are accurate and to update your profile promptly if any of the details which you have supplied to us about you change;</li>
   <li>To keep any personal login name and any password confidential, and to be responsible for any loss or damage resulting from use of your password by any third party;</li>
    <li>That we reserve the right to terminate your access to the Service should we consider that your use of the service is detrimental to the Service or to other users.</li>
    <li>We shall use any personal information you submit to the Service and other information we hold about you in accordance with our Privacy Policy. In particular, we shall use the information (including sensitive personal information relating to your physical health) to provide you with a donor information service as described. By registering for the service through this form, you give your consent to such use of your personal information.</li>
</ul></div>

<div class="general-texts">While we will use our reasonable endeavours to ensure that the information provided by the Service is accurate, the service (including records of blood,organ stocks, your blood type and number of donations) is provided to support your own records and you should always check with an appropriately qualified health professional before donating.</div><br>

<div class="general-headings">Requirements by Donation Type</div>
<center><div class="general-texts">To ensure the safety of both patients and donors, these are some of the requirements donors must meet to be eligible to donate blood based on their donation type.
</div></center>

<div class="side-headings">Whole Blood Donation</div>
<div class="general-texts"><ul>
<li>Donation frequency: Every 56 days* </li>
<li>You must be in good health and feeling well**</li>
<li>You must be at least 16 years old in most states</li>
<li>You must weigh at least 110 lbs</li>
</ul>
</div>
<div class="side-headings">Power Red Donation</div>
<div class="general-texts">
<ul>
<li>Donation frequency: Every 112 days, up to 3 times/year*</li>
<li>You must be in good health and feeling well**</li>
<li>Male donors+ must be at least 17 years old in most states, at least 5'1" tall and weigh at least 130 lbs</li>
<li>Female donors+ must be at least 19 years old, at least 5'5" tall and weigh at least 150 lbs</li>
</ul>
</div>
<div class="side-headings">Platelet Donation</div>
<div class="general-texts">
<ul>
<li>Donation frequency: Every 7 days, up to 24 times/year*</li>
<li>You must be in good health and feeling well**</li>
<li>You must be at least 17 years old in most states </li>
<li>You must weigh at least 110 lbs</li>
</ul>
</div>
<div class="side-headings">AB Elite Plasma Donation</div>
<div class="general-texts">
<ul>
<li>Donation frequency: Every 28 days, up to 13 times/year</li>
<li>You must have type AB blood</li>
<li>You must be in good health and feeling well**</li>
<li>You must be at least 17 years old</li>
<li>You must weigh at least 110 lbs</li>
</ul>

</div>
<div class="general-headings">Rules on organ donation</div>
<div class="general-texts">
<ul>

<li>Just about anyone, at any age, can become an organ donor. Anyone younger than age18 needs to have the consent of a parent or guardian.</li>

<li>For organ donation after death, a medical assessment will be done to determine what organs can be donated. Certain conditions, such as having HIV, actively spreading cancer, or severe infection would exclude organ donation.</li>

<li>Having a serious condition like cancer, HIV, diabetes, kidney disease, or heart disease can prevent you from donating as a living donor.</li>

<li>Let your transplant team know about any health conditions you have at the beginning of the process. Then they can decide whether you're a good candidate.</li>
<li>It's easier to transplant an organ if the donor and recipient are a good match. The transplant team will give you a series of tests to determine whether your blood and tissue types are compatible with the recipient's.</li>
<li>Some medical centers can transplant an organ even if the donor's and recipient's blood and tissue types don't match. In that case, the recipient will receive special treatments to prevent their body from rejecting the donor organ.</li>


</ul>
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
