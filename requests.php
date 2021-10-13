<?php 
    session_start();
    include('./db_conn.php');
    $id=$_SESSION['user_id'];
    if(isset($_POST['blood']))
    {        
        $request_id=$_POST['request_id'];
        if(isset($_SESSION['user_id']))
        {
            $sq="SELECT * FROM blood_donors WHERE donor_id='$id'";
            $sres=$conn->query($sq);
            if($sres->num_rows>0)
            {
                $ins1="INSERT INTO blood_responses(`request_id`,`user_id`,`voluntary`) VALUES('$request_id','$id',1)";
                $ires1=$conn->query($ins1);
                echo "<script>alert('THANK YOU!!Your contact is shared with the requester');</script>";
            }
            else
            {
                echo "<script>alert('You are not a donor!!Please register');</script>";
                echo '<script>
                    location.replace("blood_donor.php");
                </script>';
            }
        }
        else
        {
        echo "<script>alert('Please Login before responding!!');</script>";
        echo '<script>
            location.replace("sign_in.php");
            </script>';
        }
        
    }
    
    
    
    if(isset($_POST['organ']))
    {
        $request_id=$_POST['request_id'];
        if(isset($_SESSION['user_id']))
        {
            $sq="SELECT * FROM organ_donors WHERE donor_id='$id'";
            $sres=$conn->query($sq);
            if($sres->num_rows>0)
            {
                $ins1="INSERT INTO organ_responses(`request_id`,`user_id`,`voluntary`) VALUES('$request_id','$id',1)";
                $ires1=$conn->query($ins1);
                echo "<script>alert('THANK YOU!!Your contact is shared with the requester');</script>";
            }
            else
            {
                echo "<script>alert('You are not a donor!!Please register');</script>";
                echo '<script>
                    location.replace("organ_donate.php");
                </script>';
            }
        }
        else
        {
            echo "<script>alert('Please Login before responding!!');</script>";
        
            echo '<script>
            location.replace("sign_in.php");
            </script>';
        }
    }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Leaflet Js CDN -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

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

    <link rel="stylesheet" href="./assets/styles/requests-styles.css">
    <script src="./assets/js/requests.js"></script>
    <title>Life Line | Requests</title>
</head>


<body onload="toggledata()">
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
                <li class="nav-item active mt-1">
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
                        <a class="dropdown-item" href="aboutus.php">About Us</a>
                        <a class="dropdown-item" href="contactus.php">Contact Us</a>
                        <a class="dropdown-item" href="faq.php">FAQ</a>
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

    <div class="container requests">
        <h1 class="mt-5 text-center">LIVE FEED OF REQUESTS</h1>
        <div class="row">
            <div class="col text-center">
                <button onclick='display(event,"blood")' class="btn btn-lg btn-danger tabs mt-2">Blood Requests</button>
                <button onclick='display(event,"organ")' class="btn btn-lg btn-outline-danger tabs mt-2">Organ
                    requests</button>
            </div>
        </div>

        <div class="col content" style="display:block" id="blood">
            <?php
                if(isset($_SESSION['user_id']))
                {
                    $q1="SELECT b.*,u.* FROM blood_requesters b,users u WHERE (u.id=b.requester_id AND u.id <> '$id') ORDER BY b.date DESC";
                }
                else{
                    $q1="SELECT b.*,u.* FROM blood_requesters b,users u WHERE (u.id=b.requester_id) ORDER BY b.date DESC";
                }
                $res1=$conn->query($q1);
                if($res1->num_rows>0)
                {
                    $i=0;
                    while($row1=$res1->fetch_assoc())
                    {
                        $flag=1;
                        $sq="SELECT * FROM blood_donated_users";
                        $sres=$conn->query($sq);
                        if($sres->num_rows>0)
                        {
                           
                           while($srow=$sres->fetch_assoc())
                           {
                                if($srow['request_id']==$row1['sno'])
                                {
                                    $flag=0;
                                    break;
                                }
                           }
                        }

                       if($flag==1)
                       {
                           echo '<div class="row mt-4 p-2" data-aos="fade-up">
                <div class="card p-3" style="width:40rem">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <h4 class="card-title">'.$row1['name'].'</h4>
                            </div>
                            <div class="col-md-5">
                                <span class="date">Posted on:
                                    '.substr($row1['date'],0,10).'</span>
                            </div>
                        </div>
                        <h5 class="card-subtitle mt-2 text-muted">Looking for '.$row1['blood_grp'].' in '.$row1['location'].'</h5>
                        <p class="card-text mt-4">'.$row1['msg'].'
                        </p>';
                        if($row1['lat'])
                        {
                        echo '<div class="container-fluid">
                            <div id="mapid'.$i.'" style="min-height:14rem;"></div>
                        </div>';
                        }

                        echo '<div class="row info p-2 mt-3">';
                        
                        if($row1['urgent']==1){
                            echo '
                            <span class="urgent" style="position: absolute;">URGENT</span>';
                        }
                        echo '
                            <div class="col-xs-1 mt-2">
                                <span class="blood-grp">
                                    '.$row1['blood_grp'].'
                                </span>
                            </div>
                            <div class="col-xs-3"></div>
                            <div class=" col-xs-8 ml-4 mt-3">
                                <h4>Blood Donors Needed</h4>
                                <p><i class="fas fa-map mr-3"></i>'.$row1['location'].'</p>
                            </div>
                        </div>
                        <form method="POST" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
                            <input type="hidden" name="request_id" value="'.$row1['sno'].'">
                            <button type="submit" name="blood" class="btn mt-3 donate">DONATE</button>
                        </form>
                        
                    </div>
                </div>
            </div>';
            if($row1['lat'])
            {
                echo "<script>
                        x = ".$row1['lat'].";
                        y = ".$row1['lon'].";
                        var mymap = L.map('mapid".$i."').setView([x, y], 13);
                        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                            attribution: 'Map data &copy;OpenStreetMa contributors, Imagery © Mapbox',
                            maxZoom: 100,
                            id: 'mapbox/streets-v11',
                            tileSize: 512,
                            zoomOffset: -1,
                            accessToken: 'pk.eyJ1IjoiYmhhbnVrMTkiLCJhIjoiY2tzZWJxZW4yMHl1bzJ1b2RzOXMxd3hkMiJ9.DjdM6ILIjgddBCoERDT_QA'
                        }).addTo(mymap);
                        
                        var markerIcon = L.icon({
                            iconUrl: './assets/images/marker-icon.jpeg',
                                iconSize: [70, 80], 
                                iconAnchor: [22, 94], 
                                popupAnchor: [-3, -76] 
                            });
                        var marker = L.marker([x, y], {
                            icon: markerIcon
                    }).addTo(mymap);
                    marker.bindPopup('<h5>".$row1['blood_grp']."</h5>').openPopup();
                </script>";
                
                       }
                    }
                    $i=$i+1;
                    }
                }            
            ?>
            <div class="col text-center mt-4">
                <h1>Fullfilled Requests</h1>
            </div>
            <?php 
                $q2="SELECT * FROM `blood_donated_users` ORDER BY date DESC";
                $res2=$conn->query($q2);
                if($res2->num_rows>0)
                {
                    while($row2=$res2->fetch_assoc())
                    {
                        $request_id=$row2['request_id'];
                        $donor_id=$row2['donor_id'];

                        $q3="SELECT * FROM users WHERE id='$donor_id'";
                        $res3=$conn->query($q3);
                        $donor_name=$res3->fetch_assoc()['name'];

                        $q4="SELECT * FROM blood_requesters WHERE sno='$request_id'";
                        $res4=$conn->query($q4);
                        
                        if($res4->num_rows>0)
                        {
                            while($row4=$res4->fetch_assoc())
                            {
                                $requester_id=$row4['requester_id'];
                                $q5="SELECT * FROM users WHERE id='$requester_id'";
                                $res5=$conn->query($q5);
                                while($row5=$res5->fetch_assoc())
                                {
                                    echo '<div class="row mt-4 p-2" data-aos="fade-up">
                            <div class="card p-3" style="width:40rem">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h4 class="card-title">'.$row5['name'].'</h4>
                                        </div>
                                        <div class="col-md-5">
                                            <span class="date">Posted on:
                                                '.substr($row4['date'],0,10).'</span>
                                        </div>
                                    </div>
            
            
                                    <h5 class="card-subtitle mt-2 text-muted">Looking for '.$row4['blood_grp'].' in '.$row4['location'].'</h5>
                                    <p class="card-text mt-4">'.$row4['msg'].'
                                    </p>
            
                                    <div class="row completed p-2">
                                        <div class="col-xs-1 mt-2">
                                            <span class="blood-grp">
                                                '.$row4['blood_grp'].'
                                            </span>
                                        </div>
            
                                        <div class="col-xs-8 ml-4 mt-3">
                                            <h4>Blood Donors Needed</h4>
                                            <p><i class="fas fa-map mr-3"></i>'.$row4['location'].'</p>
                                        </div>
                                        <div class="col-xs-3 mt-2 ml-4">
                                            <h4>Donor:</h4>
                                            <h4>'.$donor_name.'</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                                }
                            }

                        }
                    }
                }
            ?>
       
        </div>

        <div class="col content" id="organ">

                <?php
                if(isset($_SESSION['user_id']))
                {
                    $q1="SELECT b.*,u.* FROM organ_requesters b,users u WHERE (u.id=b.requester_id AND u.id <> '$id')";
                }
                else{
                    $q1="SELECT b.*,u.* FROM organ_requesters b,users u WHERE (u.id=b.requester_id)";
                }
                $res1=$conn->query($q1);
                if($res1->num_rows>0)
                {
                    $i=0;
                    while($row1=$res1->fetch_assoc())
                    {
                        $flag=1;
                        $sq="SELECT * FROM organ_donated_users";
                        $sres=$conn->query($sq);
                        if($sres->num_rows>0)
                        {
                           
                           while($srow=$sres->fetch_assoc())
                           {
                                if($srow['request_id']==$row1['sno'])
                                {
                                    $flag=0;
                                    break;
                                }
                           }
                        }

                       if($flag==1)
                       {
                    
                        echo '<div class="row mt-4 p-2" data-aos="fade-up">
                <div class="card p-3" style="width:40rem">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <h4 class="card-title">'.$row1['name'].'</h4>
                            </div>
                            <div class="col-md-5">
                                <span class="date">Posted on:
                                    '.substr($row1['date'],0,10).'</span>
                            </div>
                        </div>

                        <h5 class="card-subtitle mt-2 text-muted">Looking for '.$row1['organs'].' in '.$row1['location'].'</h5>
                        <p class="card-text mt-4">'.$row1['msg'].'
                        </p>
                        ';
                        if($row1['lat'])
                        {
                        echo '<div class="container-fluid">
                            <div id="mapid'.$i.'" style="min-height:14rem;"></div>
                        </div>';
                        }

                        echo '<div class="row info p-2 mt-4">
                            <div class="col-xs-1 mt-3">
                                <span class="organs">
                                    '.$row1['organs'].'
                                </span>
                            </div>
                            <div class="col-xs-3"></div>
                            <div class=" col-xs-8 ml-4 mt-3">
                                <h4>Organ Donors Needed</h4>
                                <p><i class="fas fa-map mr-3"></i>'.$row1['location'].'</p>

                            </div>
                        </div>
                        <form method="POST" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
                            <input type="hidden" name="request_id" value="'.$row1['sno'].'">
                            <button type="submit" name="organ" class="btn mt-3 donate">DONATE</button>
                        </form>
                    </div>
                </div>
            </div>';
            if($row1['lat'])
            {
                echo "<script>
                        x = ".$row1['lat'].";
                        y = ".$row1['lon'].";
                        var mymap = L.map('mapid".$i."').setView([x, y], 13);
                        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                            attribution: 'Map data &copy;OpenStreetMa contributors, Imagery © Mapbox',
                            maxZoom: 100,
                            id: 'mapbox/streets-v11',
                            tileSize: 512,
                            zoomOffset: -1,
                            accessToken: 'pk.eyJ1IjoiYmhhbnVrMTkiLCJhIjoiY2tzZWJxZW4yMHl1bzJ1b2RzOXMxd3hkMiJ9.DjdM6ILIjgddBCoERDT_QA'
                        }).addTo(mymap);
                        
                        var markerIcon = L.icon({
                            iconUrl: './assets/images/marker-icon.jpeg',
                                iconSize: [70, 80], 
                                iconAnchor: [22, 94], 
                                popupAnchor: [-3, -76] 
                            });

                        var marker = L.marker([x, y], {
                            icon: markerIcon
                    }).addTo(mymap);

                    marker.bindPopup('<h5>".$row1['organs']."</h5>').openPopup();

                </script>";
                        }
                $i=$i+1;
                    }
                    }
                }            
            ?>
            <div class="col text-center mt-4">
                <h1>Fullfilled Requests</h1>
            </div>
            <?php 
                $q2="SELECT * FROM `organ_donated_users` ORDER BY date DESC";
                $res2=$conn->query($q2);
                if($res2->num_rows>0)
                {
                    while($row2=$res2->fetch_assoc())
                    {
                        $request_id=$row2['request_id'];
                        $donor_id=$row2['donor_id'];

                        $q3="SELECT * FROM users WHERE id='$donor_id'";
                        $res3=$conn->query($q3);
                        $donor_name=$res3->fetch_assoc()['name'];

                        $q4="SELECT * FROM organ_requesters WHERE sno='$request_id'";
                        $res4=$conn->query($q4);
                        
                        if($res4->num_rows>0)
                        {
                            while($row4=$res4->fetch_assoc())
                            {
                                $requester_id=$row4['requester_id'];
                                $q5="SELECT * FROM users WHERE id='$requester_id'";
                                $res5=$conn->query($q5);
                                while($row5=$res5->fetch_assoc())
                                {
                                    echo '<div class="row mt-4 p-2" data-aos="fade-up">
                            <div class="card p-3" style="width:40rem">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h4 class="card-title">'.$row5['name'].'</h4>
                                        </div>
                                        <div class="col-md-5">
                                            <span class="date">Posted on:
                                                '.substr($row4['date'],0,10).'</span>
                                        </div>
                                    </div>
            
            
                                    <h5 class="card-subtitle mt-2 text-muted">Looking for '.$row4['organs'].' in '.$row4['location'].'</h5>
                                    <p class="card-text mt-4">'.$row4['msg'].'
                                    </p>
            
                                    <div class="row completed p-2">
                                        <div class="col-xs-1 mt-2">
                                            <span class="organs">
                                                '.$row4['organs'].'
                                            </span>
                                        </div>
            
                                        <div class="col-xs-8 ml-4 mt-3">
                                            <h4>Organ Donors Needed</h4>
                                            <p><i class="fas fa-map mr-3"></i>'.$row4['location'].'</p>
                                        </div>
                                        <div class="col-xs-3 mt-2 ml-4">
                                            <h4>Donor:</h4>
                                            <h4>'.$donor_name.'</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                                }
                            }

                        }
                    }
                }
            ?>
            

        </div>
    </div>
    <footer class="text-center mt-5 text-lg-start bg-light text-muted">

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
<script>
    AOS.init(
        {
            duration: 1600,
        }
    );
</script>



</html>
