<?php 
session_start();
include('./db_conn.php');
$id=$_SESSION['user_id'];

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

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- This CSS file consists of all the CSS styles for the website in common. -->
    <link rel="stylesheet" href="./assets/styles/style.css">

    <!-- Styles and JS files exclusive for this page  -->
    <link rel="stylesheet" href="./assets/styles/index_styles.css">
    <script src="./assets/js/index.js"></script>

    <title>Life Line | Home</title>
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
                <li class="nav-item active mt-1">
                    <a class="nav-link" href="#">Home</a>
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


    <div id="carouselExampleControls" class="carousel slide pl-3 pr-3" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row mt-4">
                    <div class="col-md-6" data-aos="fade-right">
                        <img src="./assets/images/blood-hero.png" class="img-fluid" alt="...">
                    </div>
                    <div class="col-md-5 mt-5" data-aos="fade-left">
                        <h1 class="display-4 mt-5">Blood Donation</h1>
                        <h4 class="mt-3">Your droplets of blood may create an ocean of happiness
                            <br><br> "Donte Blood,Save Lives"
                        </h4>

                        <div class="row mt-4 text-center">
                            <div class="col-md-6 mt-2">
                            <?php
                        if(isset($_SESSION['user_id'])){
                            ?>
                       <a href="blood_donor.php" class="btn link-btn">DONATE BLOOD</a>
                        <?php
                        }
                        else{
                            ?>
                            <a href="./sign_in.php" class="btn link-btn">DONATE BLOOD</a>
                            <?php
                        }?>
                                
                            </div>
                            <div class="col-md-6 mt-2">
                            <?php
                        if(isset($_SESSION['user_id'])){
                            ?>
                       <a href="blood_request.php" class="btn link-btn">REQUEST BLOOD</a>
                        <?php
                        }
                        else{
                            ?>
                            <a href="./sign_in.php" class="btn link-btn">REQUEST BLOOD</a>
                            
                            <?php
                        }?>
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row mt-4">
                    <div class="col-md-6">
                        <img src="./assets/images/organ-hero.png" class="img-fluid" alt="...">
                    </div>
                    <div class="col-md-5 mt-5">
                        <h1 class="display-4 mt-5">Alive Organ Donation</h1>
                        <h4 class="mt-3">"The need is constant, the gratification is instant, Donate Organs"</h4>

                        <div class="row mt-4 text-center">
                            <div class="col-md-6 mt-2">
                            <?php
                        if(isset($_SESSION['user_id'])){
                            ?>
                        <a href="organ_donate.php " class="btn link-btn">DONATE ORGANS</a>
                        <?php
                        }
                        else{
                            ?>
                             <a href="./sign_in.php" class="btn link-btn">DONATE ORGANS</a>
                            
                            <?php
                        }?>
                               
                            </div>
                            <div class="col-md-6 mt-2">
                            <?php
                        if(isset($_SESSION['user_id'])){
                            ?>
                        <a href="./organ_request_form.php" class="btn link-btn">REQUEST ORGANS</a>
                        <?php
                        }
                        else{
                            ?>
                            <a href="./sign_in.php" class="btn link-btn">REQUEST ORGANS</a>
                            
                            
                            <?php
                        }?>
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <i class="fas fa-angle-left" style="font-size:2.5rem"></i>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <i class="fas fa-angle-right" style="font-size:2.5rem"></i>
        </a>
    </div>
    <div class="row mt-5">
        <div class="col text-center">
            <a href="#about"><i class="fas fa-angle-down"></i></a>
        </div>
    </div>


    <div class="container-fluid mt-5" id="about">
        <div class="row mt-5">
            <div class="col text-center  mt-5" data-aos="fade-up">
                <h1 class="cause">JOIN THE CAUSE</h1>
                <p class="underline">Join our cause and help us save more lives.</p>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row mt-5 row-odd">
                <div class="col-md-7 mt-5" data-aos="fade-right">
                    <h3 class="mt-5 find"><i class="fas fa-search mr-2"></i>Find
                        Donors
                        in your Area</h3>
                    <p>Get connected in a matter of minutes at zero cost. Our Application ships with a smart system that
                        finds
                        the closest blood and organ
                        donors.You can contact the donors with just a click and as well as the donors can step up to the
                        near by requests.</p>
                </div>
                <div class="col-md-5" data-aos="fade-left">
                    <img src="./assets/images/location.png" class="img-fluid">
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-5" data-aos="fade-right">
                    <img src="./assets/images/notify.svg" class="img-fluid">
                </div>
                <div class="col-md-7 mt-5" data-aos="fade-left">
                    <h3 class="mt-5 find"><i class="fas fa-clock mr-2"></i>Answer to Emergencies</h3>
                    <p>As soon as a new blood request is raised, it is routed among our local volunteer blood donors. We
                        know time matters! So
                        we keep you updated with real-time notifications sent directly to you via SMS or through an
                        email</p>
                </div>
            </div>
            <div class="row mt-5 row-odd">
                <div class="col-md-6 mt-5" data-aos="fade-right">
                    <h3 class="mt-5 find"><i class="fas fa-medal mr-2"></i>You are someone's Hero</h3>
                    <p>In as little as few minutes, you can become someone's unnamed, unknown, but all-important Hero.
                        Donate Blood or donate organs, every form of
                        contribution you make is essential in our shared mission to save lives.</p>
                </div>
                <div class="col-md-6 mt-5" data-aos="fade-left">
                    <img src="./assets/images/hero.jpg" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5 learn">
        <div class="row mt-5" id="about" data-aos="fade-up">
            <div class="col text-center mt-5">
                <h2 class="cause">LEARN ABOUT BLOOD DONATION</h2>
                <p class="underline">There is nothing better than saving a life,Every blood donor is a hero.</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6 mt-5">
                <img src="./assets/images/Blood donation.svg">
            </div>
            <div class="col-md-6">
                <h3 class="text-center mb-4"><u style="color:var(--red);font-weight: bold;">Compatible Blood Type
                        Donors</u>
                </h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Blood Type</th>
                            <th scope="col">Donate Blood To</th>
                            <th scope="col">Receive Blood From</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">A+</th>
                            <td>A+ AB+</td>
                            <td>A+ A- O+ O-</td>

                        </tr>
                        <tr>
                            <th scope="row">O+</th>
                            <td>O+ A+ B+ AB+</td>
                            <td>O+ O-</td>

                        </tr>
                        <tr>
                            <th scope="row">B+</th>
                            <td>B+ AB+</td>
                            <td>B+ B- O+ O-</td>
                        </tr>
                        <tr>
                            <th scope="row">AB+</th>
                            <td>AB+</td>
                            <td>Everyone</td>
                        </tr>
                        <tr>
                            <th scope="row">A-</th>
                            <td>A+ A- AB+ AB-</td>
                            <td>A- O-</td>
                        </tr>
                        <tr>
                            <th scope="row">O-</th>
                            <td>Everyone</td>
                            <td>O-</td>
                        </tr>
                        <tr>
                            <th scope="row">B-</th>
                            <td>B+ B- AB+ AB-</td>
                            <td>B- O-</td>
                        </tr>
                        <tr>
                            <th scope="row">AB-</th>
                            <td>AB+ AB-</td>
                            <td>AB- A- B- O-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="container-fluid mt-5" id="about">
        <div class="row mt-5">
            <div class="col text-center mt-5 underline" data-aos="fade-up">
                <h2 class="cause">TYPES OF DONATIONS</h2>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row mt-5">
                <p>The human body contains five liters of blood, which is made of several useful components i.e.
                    <span>Whole blood, Platelet, and Plasma.</span>
                </p>
                <br>
                <p>
                    Each type of component has several medical uses and can be used for different medical treatments.
                    your blood donation determines the best donation for you to make.
                </p>
                <br>
                <p>
                    For <span>plasma</span> and <span>platelet</span> donation you must have donated whole blood in past
                    two
                    years.
                </p>
            </div>
            <div class="col text-center mt-4">
                <button class="btn clicked tab-links mr-4 mt-2" onclick="openTab(event,'whole')">Whole Blood</button>
                <button class="btn tab-links mr-4 mt-2" onclick="openTab(event,'plasma')">Plasma</button>
                <button class="btn tab-links mr-4 mt-2" onclick="openTab(event,'platelet')">Platelet</button>
            </div>
        </div>
    </div>

    <div class="container mt-2 content" id="whole" style="display: block">
        <div class="row">
            <div class="col-md-4 mt-4">
                <h4>What is it?</h4>
                <small>Blood Collected straight from the donor after its donation usually separated into red blood
                    cells, platelets, and
                    plasma.</small>

                <h4 class="mt-4">Who can donate?</h4>
                <small>You need to be 18-65 years old, weigh 45kg or more and be fit and healthy.</small>
            </div>

            <div class="col-md-4 mt-4">
                <h4>Used For?</h4>
                <small>Stomach disease, kidney disease, childbirth, operations, blood loss, trauma, cancer, blood
                    diseases, haemophilia,
                    anemia, heart disease.</small>

                <h4 class="mt-4">Lasts For?</h4>
                <small>Red cells can be stored for 42 days.</small>

            </div>

            <div class="col-md-4 mt-4">
                <h4>How long does it take?</h4>
                <small>15 minutes to donate.</small>
                <br><br><br>
                <h4>How often can I donate?</h4>
                <small>Every 12 weeks.</small>
            </div>
        </div>
    </div>


    <div class="container mt-2 content" id="plasma">
        <div class="row">
            <div class="col-md-4 mt-4">
                <h4>What is it?</h4>
                <small>The straw-coloured liquid in which red blood cells, white blood cells, and platelets float
                    in.Contains special nutrients
                    which can be used to create 18 different type of medical products to treat many different medical
                    conditions.</small>

                <h4 class="mt-4">Who can donate?</h4>
                <small>
                    You need to be 18-70 (men) or 20-70 (women) years old, weigh 50kg or more and must have given
                    successful whole blood
                    donation in last two years.
                </small>
            </div>

            <div class="col-md-4 mt-4">
                <h4>Used For?</h4>
                <small>Immune system conditions, pregnancy (including anti-D injections), bleeding, shock, burns, muscle
                    and nerve conditions,
                    haemophilia, immunisations.</small>

                <h4 class="mt-5">Lasts For?</h4>
                <small>Plasma can last up to one year when frozen.</small>

            </div>

            <div class="col-md-4 mt-4">
                <h4>How does it work?</h4>
                <small>We collect your blood, keep plasma and return rest to you by apheresis donation.</small>

                <h4 class="mt-2">How long does it take?</h4>
                <small>15 minutes to donate.</small>

                <h4 class="mt-3">How often can I donate?</h4>
                <small>Every 2-3 weeks.</small>
            </div>
        </div>
    </div>


    <div class="container mt-2 content" id="platelet">
        <div class="row">
            <div class="col-md-4 mt-4">
                <h4>What is it?</h4>
                <small>The tiny 'plates' in blood that wedge together to help to clot and reduce bleeding. Always in
                    high demand, Vital for
                    people with low platelet count, like malaria and cancer patients.</small>

                <h4 class="mt-4">Who can donate?</h4>
                <small>
                    You need to be 18-70 years old (men), weigh 50kg or more and have given a successful plasma donation
                    in the past 12
                    months
                </small>
            </div>

            <div class="col-md-4 mt-4">
                <h4>Used For?</h4>
                <small>Cancer, blood diseases, haemophilia, anaemia, heart disease, stomach disease, kidney disease,
                    childbirth, operations,
                    blood loss, trauma, burns.</small>

                <h4 class='mt-4'>Lasts For?</h4>
                <small>Just five days..</small>

            </div>

            <div class="col-md-4 mt-4">
                <h4>How does it work?</h4>
                <small>We collect your blood, keep platelet and return rest to you by apheresis donation.</small>

                <h4 class="mt-1">How long does it take?</h4>
                <small>45 minutes to donate.</small>

                <h4 class="mt-2">How often can I donate?</h4>
                <small>Every 2 weeks</small>
            </div>
        </div>
    </div>

    <div class="col text-center mt-4">
    <?php
                        if(isset($_SESSION['user_id'])){
                            ?>
                            <a href="./blood_donor.php" class="btn link-btn" style="color:var(--white);background-color:var(--red)">DONATE BLOOD</a>
                       
                        <?php
                        }
                        else{
                            ?>
                            <a href="./sign_in.php" class="btn link-btn" style="color:var(--white);background-color:var(--red)">DONATE BLOOD</a>
                            
                            <?php
                        }?>
        
    </div>


    <div class="container-fluid mt-5 learn">
        <div class="row mt-5" id="about">
            <div class="col text-center mt-5" data-aos="fade-up">
                <h2 class="cause">LEARN ABOUT ALIVE ORGAN DONATION</h2>
                <p class="underline">You will live on even after you are gone. Take a simple step, donate your organ.
                </p>
            </div>
        </div>

        <div class="container mt-5">
            <div id="accordion">
                <div class="card mt-3">
                    <button data-aos="fade-right" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                Organs That Can Be Donated While Alive
                            </h5>
                        </div>
                    </button>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <p>You may be able to donate:</p>
                            <ul class="accordion-list">
                                <li>
                                    One of your kidneys.
                                </li>
                                <p>A kidney is the most common donation. Your remaining kidney removes waste from
                                    the body.</p>
                                <li>
                                    One liver lobe.
                                </li>
                                <p>Cells in the remaining lobe grow or refresh until your liver is almost its original
                                    size. This happens in a short amount
                                    of time for both you and the receiving patient.</p>
                                <li>
                                    A lung or part of a lung, part of the pancreas, or part of the intestines.
                                </li>
                                <p>These organs don???t regrow. Both the portion you donate and the portion that remains
                                    function fully.</p>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <button data-aos="fade-left" class="btn btn-link collapsed" data-toggle="collapse"
                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                Tissue That Can Be Donated While Alive
                            </h5>
                        </div>
                    </button>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <p>You may be able to donate:</p>
                            <ul class="accordion-list">
                                <li>
                                    Skin???after surgeries such as a tummy tuck.
                                </li>
                                <li>Bone???after knee and hip replacements.</li>
                                <li>Healthy cells from bone marrow and umbilical cord blood.</li>
                                <li>Amnion ???donated after childbirth.</li>
                            </ul>
                            <p>You can donate blood or bone marrow more than once. They regrow and the body replaces
                                them after you donate.</p>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <button data-aos="fade-right" class="btn btn-link collapsed" data-toggle="collapse"
                        data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                Ability to Donate
                            </h5>
                        </div>
                    </button>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <p>
                                Doctors at a transplant center check you over. They need to be sure you???re a good living
                                donor.
                                <br><br>
                                They don???t want you to suffer any negative physical, or emotional outcome.
                                <br><br>
                                Your body should be in good health. You also shouldn???t have diabetes, cancer, high blood
                                pressure, kidney disease, or
                                heart disease, now or in the past.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <button data-aos="fade-left" class="btn btn-link collapsed" data-toggle="collapse"
                        data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <div class="card-header" id="headingFour">
                            <h5 class="mb-0">
                                Long-Term Effects You Should Expect
                            </h5>
                        </div>
                    </button>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                        <div class="card-body">
                            <p>
                                Transplant centers follow-up with living donors. On average, living donors do well over
                                the long term.
                                There are questions about how stress affects the remaining organ. There could be slight
                                medical problems that don???t
                                develop until many years after you donate. We don???t know the effects at this time.
                                <br><br>
                                Right now, the National Institutes of Health (NIH) is collecting information from living
                                donors. They want to see how
                                they do over time.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col text-center mt-5 mb-5">
        <?php
                        if(isset($_SESSION['user_id'])){
                            ?>
                            <a href="./organ_donor.php" class="btn link-btn" style="color:var(--white);background-color:var(--red)">DONATE ORGANS</a>
                       
                        <?php
                        }
                        else{
                            ?>
                            <a href="./sign_in.php" class="btn link-btn" style="color:var(--white);background-color:var(--red)">DONATE ORGANS</a>
                            
                            <?php
                        }?>
        
        </div>
    </div>
    <div id="latest">
    <?php 
        $q="SELECT u.name,b.*,br.blood_grp FROM users u,blood_donated_users b,blood_requesters br WHERE u.id=b.donor_id AND b.request_id=br.sno ORDER BY date DESC";
        $res=$conn->query($q);
        if($res->num_rows>0)
        {
            while($row=$res->fetch_assoc())
            {
                $blood_grp=$row['blood_grp'];
                $name=$row['name'];
                echo '
        <div class="slideshow-container mb-2 ml-2 p-3" id="slideshow-container">
            <u>
                <h4>Latest Donations</h4>
            </u>
            <div class="mySlides fade">
                <p> <b>Donor:</b> '.$name.'</p>
                <p> <b>Blood Group:</b> '.$blood_grp.'</p>
            </div>
        </div>
    </div>';
            }
        }

        ?>
        
    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            document.getElementById("slideshow-container").style.display = "block";
            var i;
            var slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1 }

            slides[slideIndex - 1].style.display = "block";
            setTimeout(hideSlides, 3000);
        }

        function hideSlides() {
            document.getElementById("slideshow-container").style.display = "none";
            setTimeout(showSlides, 4000);
        }
    </script>
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
<script>
    AOS.init({
        duration: 1600,
    });
</script>

</html>
