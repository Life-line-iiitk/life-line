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

    /* Chrome 10-25, Safari 5.1-6
      background: -webkit-linear-gradient(to bottom right, rgba(245, 87, 108, 1), rgba(245, 87, 108, 1));

       W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+
      background: linear-gradient(to bottom right, rgba(245, 87, 108, 1), rgba(245, 87, 108, 1))*/
      background-color: var(--light);
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
      /*.footer{
        display: none;
      }*/
      .footer{
        margin: 37rem auto;
      }
    }
  </style>

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
                <h1 class="row justify-content-center mb-4 mt-4" style="color: var(--red);">
                  SIGN UP
                </h1>
                <form id="form">


                  <div class="col-md-12 mb-3">
                    <div class="form-outline">
                      <input type="text" placeholder="Full Name" id="fullName" required class="form-control" />
                    </div>

                  </div>

                  <div class="col-md-12 mb-3 d-flex align-items-center">
                    <div class="form-outline datepicker w-100">
                      <input placeholder="Age" type="number" required class="form-control  " id="birthdayDate" />
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
                      <input placeholder="Email" type="email" id="emailAddress" required class="form-control  " />
                    </div>

                  </div>
                  <div class="col-md-12 mb-2 pb-2">

                    <div class="form-outline">
                      <input placeholder="Mobile number" type="tel" id="phoneNumber" required class="form-control  " />
                    </div>

                  </div>


                  <div class="col-md-12 mb-2 pb-2">
                    <div class="form-outline">
                      <input placeholder="Password" type="password" id="password" class="form-control  " required />
                    </div>

                  </div>
                  <div class="col-md-12 pb-2">
                    <div class="form-outline">
                      <input placeholder="Confirm Password" type="password" id="repassword" class="form-control  "
                        required />
                    </div>

                  </div>


                  <div class="mt-3 pt-2 col-md-12" style="text-align: center;">
                    <button type="submit" onclick="validate()" id="submit" name="submit" class="btn btn-block btn-lg"
                      style="background-color:var(--red);color:#fff;">Sign Up</button>
                  </div>
                  <br>
                  <div class="row justify-content-center align-items-center">
                    <p>Have an account?</p>
                    <pre><a href="sign_in.php"> SignIn</a></pre>
                  </div>
                  <div class="col text-center">
                    <p>Or</p>
                  </div>

                  <div class="col text-center">
                    <button class="btn btn" type="button">
                      <img src="./assets/images/google.jpg" style="height:2rem" alt=""> Sign up with Google</button>
                  </div>
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
  <script>

    function validate() {
      var age = document.getElementById("birthdayDate").value;
      var name = document.getElementById("fullName").value;
      var password = document.getElementById("password").value;
      var repassword = document.getElementById("repassword").value;
      if (age < 18 && age != 0) {
        alert("You have to be 18+ to be a donor")

      }
      if (age > 122) {
        alert("Longest lived human being is 122 src. google")

      }
      if (length(password) <= 6) {
        alert("Password should be more than 6 letters");
      }
      if (password != repassword) {
        alert("Passwords don't match")

      }

    }

  </script>

</body>

</html>
