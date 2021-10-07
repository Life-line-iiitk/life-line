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

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- This CSS file consists of all the CSS styles for the website in common. -->
    <link rel="stylesheet" href="./assets/styles/style.css">

    <link rel="stylesheet" href="./assets/styles/dashboard_styles.css">
    <title>Life Line | Dashboard</title>
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
                    <a class="nav-link" href="donors.php">Donors</a>
                </li>
                <li class="nav-item dropdown mt-1">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pages
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Donate Blood</a>
                        <a class="dropdown-item" href="blood_request.php">Request Blood</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Donate Organs</a>
                        <a class="dropdown-item" href="./organ_request_form.php">Request Organs</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">About Us</a>
                        <a class="dropdown-item" href="./contactus.php">Contact Us</a>
                        <a class="dropdown-item" href="#">FAQ</a>
                    </div>
                </li>

                <a href="./dashboard.php" class="btn sign-in mt-1 ml-2">Dashboard</a>
                <a href="./logout.php" class="btn sign-up mt-1 ml-2">Logout</a>
            </ul>
        </div>
    </nav>

    <!-- If there are no requests -->

    <div class="container text-center">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-5 mt-5">
                <img src="./assets/images/no-data.svg" class="img-fluid">
            </div>

        </div>

        <h2>Uh Oh!We no data to show.</h2>
        <h4>You have not made any donation nor you received any request.</h4>
        <a href="#" class="btn btn-lg link-btn mt-4" style="color:var(--white);background-color:var(--red)">DONATE
            NOW</a>
    </div>

    <!-- User Requests -->
    <div class="container requests">
        <h1 class="display-4 mt-5 text-center">YOUR REQUESTS</h1>

        <div class="row mt-4 p-2">
            <div class="card p-3" style="width:40rem">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h4 class="card-title">Ashok Kumar</h4>
                        </div>
                        <div class="col-md-5">
                            <span class="date">Posted on:
                                13/09/2021</span>
                        </div>
                    </div>
                    <h5 class="card-subtitle mt-2 text-muted">Looking for A+ in Lucknow,Utter Pradesh</h5>
                    <p class="card-text mt-4">O+ blood is needed for open heart surgery.If any donor is available be
                        please
                        contact.
                    </p>

                    <div class="row info p-2">
                        <div class="col-xs-1">
                            <span class="blood-grp">
                                O+
                            </span>
                        </div>
                        <div class="col-xs-3"></div>
                        <div class='col-xs-8 ml-4 mt-3'>
                            <h4>Blood Donors Needed</h4>
                            <p><i class="fas fa-map mr-3"></i>Lucknow,Utter Pradesh</p>

                        </div>
                    </div>
                    <h4 class="mt-4 text-danger">NO RESPONDENTS YET :(</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- If there are some requests -->

    <div class="container requests">
        <h1 class="display-4 mt-5 text-center">REQUESTS</h1>

        <div class="row mt-4 p-2">
            <div class="card p-3" style="width:40rem">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h4 class="card-title">Mitchell Jhonson</h4>
                        </div>
                        <div class="col-md-5">
                            <span class="date">Posted on:
                                10/09/2021</span>
                        </div>
                    </div>

                    <h5 class="card-subtitle mt-2 text-muted">Looking for O+ in Ahmedabad,Gujarat</h5>
                    <p class="card-text mt-4">O+ blood is needed for open heart surgery.If any donor is available be
                        please
                        contact.
                    </p>

                    <div class="row info p-2">
                        <div class="col-xs-1">
                            <span class="blood-grp">
                                O+
                            </span>
                        </div>
                        <div class="col-xs-3"></div>
                        <div class='col-xs-8 ml-4 mt-3'>
                            <h4>Blood Donors Needed</h4>
                            <p><i class="fas fa-map mr-3"></i>Ahmedabad , Gujarat</p>

                        </div>
                    </div>
                    <a href="#" class="btn mt-3 donate">DONATE</a>
                </div>
            </div>
        </div>

        <div class="row mt-4 p-2">
            <div class="card p-3" style="width:40rem">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h4 class="card-title">Santhosh Kumar</h4>
                        </div>
                        <div class="col-md-5">
                            <span class="date">Posted on:
                                13/09/2021</span>
                        </div>
                    </div>

                    <h5 class="card-subtitle mt-2 text-muted">Looking for AB- in Vishakapatnam,Andhra Pradesh</h5>
                    <p class="card-text mt-4">O+ blood is needed for open heart surgery.If any donor is available be
                        please
                        contact.</p>

                    <div class="row info p-2">
                        <div class="col-xs-1">
                            <span class="blood-grp">
                                O+
                            </span>
                        </div>
                        <div class="col-xs-3"></div>
                        <div class='col-xs-8 ml-4 mt-3'>
                            <h4>Blood Donors Needed</h4>
                            <p><i class="fas fa-map mr-3"></i>Vishakapatnam,Andhra Pradesh</p>
                        </div>
                    </div>
                    <a href="#" class="btn mt-3 donate">DONATE</a>
                </div>
            </div>
        </div>
    </div>


    <div class="container requests">
        <h1 class="display-4 mt-5 text-center">HISTORY</h1>

        <div class="row mt-4 p-2">
            <div class="card p-3" style="width:40rem">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h4 class="card-title">Vinay Kumar</h4>
                        </div>
                        <div class="col-md-5">
                            <span class="date">Posted on:
                                05/07/2021</span>
                        </div>
                    </div>


                    <h5 class="card-subtitle mt-2 text-muted">Looking for O+ in Lucknow,Utter Pradesh</h5>
                    <p class="card-text mt-4">O+ blood is needed for open heart surgery.If any donor is available be
                        please
                        contact.
                    </p>

                    <div class="row completed p-2">
                        <div class="col-xs-1">
                            <span class="blood-grp">
                                O+
                            </span>
                        </div>

                        <div class='col-xs-8 ml-4 mt-3'>
                            <h4>Blood Donors Needed</h4>
                            <p><i class="fas fa-map mr-3"></i>Lucknow,Utter Pradesh</p>
                        </div>
                        <div class="col-xs-3 mt-4 ml-4">
                            <h4>You Donated :)</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
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
</body>

</html>
