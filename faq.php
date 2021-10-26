<!DOCTYPE html>
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

    <!-- Styles files exclusive for this page  -->
    <link rel="stylesheet" href="./assets/styles/faq_style.css">

    <title>Life Line | FAQs</title>
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

    <div class="container">
        <div class="row" style="margin-top:4.5rem">
            <div class="col-md-6">
                <img src="./assets/images/faq.png" class="img-fluid">
            </div>
            <div class="col-md-6 mt-5">
                <h1 class="display-1 mt-5 text-center">
                    FAQs
                </h1>
                <h4>Here are some of the frequently asked questions</h4>
            </div>

        </div>
    </div>
    
    <div class="container f">
        <div class="faq">
            <div class="question">
                <h3>Who can donate blood ?</h3>

                <svg width="15" height="10" viewbox="0 0 42 25">
                    <path d="M3 3L21 21L39 3" stroke-width="7" stroke-linecap="round" />
                </svg>

            </div>

            <div class="answer">
                <p class="p-3">
                    If you are aged between 18 and 60, you can donate blood, irrespective of your gender.
                    Your body should not weigh less than 45 kg.
                    Your hemoglobin level should be normal – that is, 12.5 gm/cent.
                </p>
            </div>
        </div>



        <div class="faq">
            <div class="question">
                <h3>Who should not donate ?</h3>

                <svg width="15" height="10" viewbox="0 0 42 25">
                    <path d="M3 3L21 21L39 3" stroke-width="7" stroke-linecap="round" />
                </svg>

            </div>

            <div class="answer">
                <p class="p-3">
                    People who have history of various types of cancers such as leukemia, myeloma, lymphoma cannot
                    donate blood.
                    If you have been vaccinated for COVID-19, Cholera, Typhoid, Diphtheria, Tetanus or plague or taken a
                    Gamma Globulin shot within last 15 days, you should not donate blood.
                </p>
            </div>
        </div>



        <div class="faq">
            <div class="question">
                <h3>When shouldn’t women donate blood ?</h3>

                <svg width="15" height="10" viewbox="0 0 42 25">
                    <path d="M3 3L21 21L39 3" stroke-width="7" stroke-linecap="round" />
                </svg>

            </div>

            <div class="answer">
                <p class="p-3">
                    When they have low level of hemoglobin.
                    When they are underweight.
                    When they are pregnant.
                    When they are breastfeeding the baby and baby isn’t weaned out.
                    A minimum wait of 10 days is advised after menstrual period, before donating blood, as body loses
                    high amount of blood and weight during those days.
                </p>
            </div>
        </div>



        <div class="faq">
            <div class="question">
                <h3>What types of Care should I take after donating blood ?</h3>

                <svg width="15" height="10" viewbox="0 0 42 25">
                    <path d="M3 3L21 21L39 3" stroke-width="7" stroke-linecap="round" />
                </svg>

            </div>

            <div class="answer">
                <p class="p-3">
                    Eat and drink something before leaving.
                    Drink more liquids than usual in next 4 hours.
                    Don’t smoke for next 30 minutes.
                    Avoid strenuous work for the 24 hours.
                    If there is bleeding from the phlebotomy site, raise the arm and apply pressure.
                </p>
            </div>
        </div>

        <div class="faq">
            <div class="question">
                <h3>Who can be organ donors?</h3>

                <svg width="15" height="10" viewbox="0 0 42 25">
                    <path d="M3 3L21 21L39 3" stroke-width="7" stroke-linecap="round" />
                </svg>

            </div>

            <div class="answer">
                <p class="p-3">
                    Any person not less than 18 years of age, who voluntarily authorizes the removal of any of his organ and/or tissue, during his or her lifetime, as per prevalent medical practices for therapeutic purposes.
                </p>
            </div>
        </div>

        <div class="faq">
            <div class="question">
                <h3>What organs can be donated?</h3>

                <svg width="15" height="10" viewbox="0 0 42 25">
                    <path d="M3 3L21 21L39 3" stroke-width="7" stroke-linecap="round" />
                </svg>

            </div>

            <div class="answer">
                <p class="p-3">
                    Organs that can be transplanted include the heart, lungs, liver, kidneys, intestine and pancreas.
                </p>
            </div>
        </div>

        <div class="faq">
            <div class="question">
                <h3>How does my age and health affect organ donation?</h3>

                <svg width="15" height="10" viewbox="0 0 42 25">
                    <path d="M3 3L21 21L39 3" stroke-width="7" stroke-linecap="round" />
                </svg>

            </div>

            <div class="answer">
                <p class="p-3">
                    There are no cutoff ages for donating organs. Organs have been successfully transplanted from newborns and people older than 80. It is possible to donate a kidney, heart, liver, lung, pancreas
                </p>
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
    </div>
    <script src="./assets/js/faq.js"></script>
</body>

</html>