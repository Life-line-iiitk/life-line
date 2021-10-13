<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Life Line | Organ Donor Form </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;700;800;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="./assets/styles/style.css">

    <!-- js -->
    <script src="./assets/js/index.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .submit {
            background-color: var(--red);
            color: white;
        }

        .submit:hover {
            background-color: var(--red);
            color: white;
        }
    </style>


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
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item mt-1">
                    <a class="nav-link" href="#">Requests</a>
                </li>
                <li class="nav-item mt-1">
                    <a class="nav-link" href="#">Donors</a>
                </li>
                <li class="nav-item dropdown mt-1 active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pages
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Donate Blood</a>
                        <a class="dropdown-item" href="#">Request Blood</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item active" href="#">Donate Organs</a>
                        <a class="dropdown-item" href="organ_request_form.php" target="_blank">Request Organs</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="./aboutus.php">About Us</a>
                        <a class="dropdown-item" href="#">Contact Us</a>
                        <a class="dropdown-item" href="#">FAQ</a>
                    </div>
                </li>
                <!-- <li class="nav-item mt-1">
                <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item mt-1">
                <a class="nav-link" href="#">Contact Us</a>
            </li> -->
                <a href="#" class="btn sign-up mt-1 ml-2">Sign Up</a>
                <a href="sign_in.php" class="btn sign-in mt-1 ml-2">Sign In</a>
            </ul>
        </div>
    </nav>

    <script>
        $('.navbar-collapse a').click(function () {
            $(".navbar-collapse").collapse('hide');
        });
    </script>

    <div class="container mt-5 ">
        <div class="row justify-content-center">
            <div class="col-sm">

            </div>
            <div class="col-md-6 mt-5">
                <img src="./assets/images/1908.i121.076..isometric human internal organs donor illustration.jpg
          " class="image-responsive" width="100%" height="100%" alt="">

            </div>
            <div class="col-sm">

            </div>
        </div>
        <form action="/action_page.php">
            <div class="form-group">
                <h1 style="color:rgb(230, 81, 81);font-weight: bold;" class="text-center"> Organ Donor Form </h1>
            </div>
            <div class="form-group">
                <label for="organ"><b>Organ you want to donate :</b></label>
                <input type="text" class="form-control" id="organ" placeholder="Enter organ you want to donate"
                    name="organ" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="validationCustom04" class="form-label"><b>Blood Group:</b></label>
                <select class="form-control" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>

            </div>


            <div class="loc">
                <div class="form-group">
                    <label for="location"> <b> Location </b></label>
                    <input type="text" class="form-control" id="loc" placeholder="Eg: Kottayam, Kerala" name="location"
                        required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
            </div>


            <div class="form-group form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember" required> I agree on <a href="">
                        terms and conditions.</a>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Check this checkbox to continue.</div>
                </label>
            </div>

            <div class="text-center">
                <button type="submit" class="btn  mb-4 btn-lg submit ">Submit </button>
            </div>

        </form>
    </div>
    <!-- jquery -->
    <script>
        function myFunction() {
            $(document).ready(function () {
                $(".present-location").click(function () {
                    $(".loc").toggle();
                });
            });



        }
    </script>
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
                            <a href="#!" class="text-reset">Home</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">About Us</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Contact Us</a>
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
                            <a href="#!" class="text-reset">Request Blood</a>
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
</body>

</html>