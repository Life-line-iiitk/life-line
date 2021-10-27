<?php 
    session_start();
    include('./db_conn.php');
    if(isset($_SESSION['user_id']))
    {
        $user_id=$_SESSION['user_id'];
    }
    {
        $user_id=0;
    }
    
    if(isset($_POST['blood']))
    {
    if(isset($_SESSION['user_id']))
    {
        echo "<script>console.log('Uf');</script>";

        $user_id=$_SESSION['user_id'];
        $q="SELECT * FROM blood_requesters WHERE requester_id='$user_id' ORDER BY date DESC LIMIT 1";
        $r=$conn->query($q);
        if($r->num_rows>0)
        {
            while($row=$r->fetch_assoc())
            {
                $request_id=$row['sno'];
            }
            $sq="SELECT * FROM `blood_donated_users` WHERE request_id='$request_id'";
            $sr1=$conn->query($sq);
            if($sr1->num_rows>0)
            {    
                echo "<script>alert('Your request is already fullfilled!!');</script>";
            }
            else{
            $donor_id=$_POST['donor_id'];
            $ins1="INSERT INTO blood_responses(`request_id`,`user_id`,`voluntary`) VALUES('$request_id','$donor_id',0)";
            $ires1=$conn->query($ins1);
            echo "<script>alert('THANK YOU!!Your contact is shared with the donor');</script>";
            }
        }
        else
        {
            echo "<script>alert('No request found!!Please register');</script>";
            echo '<script>
                    location.replace("blood_request.php");
                </script>';
        }

    }
    else
    {
        echo "<script>alert('Please Login before responding!!');</script>";
        echo '<script>
            location.replace("sign_in.php");
            </script>';
    }}

    if(isset($_POST['organ']))
    {    
    if(isset($_SESSION['user_id']))
    {
        $user_id=$_SESSION['user_id'];
        $q="SELECT * FROM organ_requesters WHERE requester_id='$user_id' ORDER BY date DESC LIMIT 1";
        $r=$conn->query($q);
        if($r->num_rows>0)
        {
            while($row=$r->fetch_assoc())
            {
                $request_id=$row['sno'];
            }
            $sq="SELECT * FROM `organ_donated_users` WHERE request_id='$request_id'";
            $sr1=$conn->query($sq);
            if($sr1->num_rows>0)
            {    
                echo "<script>alert('Your request is already fullfilled!!');</script>";
            }
            else{
            $donor_id=$_POST['donor_id'];
            $ins1="INSERT INTO organ_responses(`request_id`,`user_id`,`voluntary`) VALUES('$request_id','$donor_id',0)";
            $ires1=$conn->query($ins1);
            echo "<script>alert('THANK YOU!!Your contact is shared with the donor');</script>";
            }
        }
        else
        {
            echo "<script>alert('No request found');</script>";
        }

    }
    else
    {
        echo "<script>alert('Please Login before responding!!');</script>";
        echo '<script>
            location.replace("sign_in.php");
            </script>';
    }}
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

    <script src="./assets/js/donors.js"></script>
    <link rel="stylesheet" href="./assets/styles/donors.css">
    <title>Life Line | Donors</title>
</head>

<body>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button btn-danger" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>

                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div id="mapid"></div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
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
                <li class="nav-item active mt-1">
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


    <div class="container requests">
        <h1 class="mt-5 text-center">LIST OF DONORS AVAILABLE</h1>
        <div class="row">
            <div class="col text-center">
                <button onclick='display(event,"blood")' class="btn btn-lg btn-danger tabs mt-2">Blood Donors</button>
                <button onclick='display(event,"organ")' class="btn btn-lg btn-outline-danger tabs mt-2">Organ
                    Donors</button>
            </div>
        </div>
        <div class="col text-center mt-3" id="mapbtn">
            <button class="btn donate mt-2" data-toggle="modal" data-target="#myModal">
                VIEW ON MAP
            </button>
        </div>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST" class="mt-4" id="filterbtn">
            <select class="form-control" name="filter" id="validationCustom04" required>
                <option selected disabled value="">Filter by Blood Group</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>
            <div class="col text-center">
                <button name="filter-btn" class="btn mt-2 btn-success">Apply</button>
            </div>
        </form>
    </div>
    
   

    <div class="col content" style="display:block" id="blood">
        <?php 
        if(isset($_POST['filter-btn']))
        {
            $filter = $_POST['filter'];
            echo "<script>console.log('$filter');</script>";
            $q="SELECT o.*,u.* FROM blood_donors o,users u WHERE (u.id=o.donor_id AND blood_grp='$filter')";
        }
        else{
            $q="SELECT o.*,u.* FROM blood_donors o,users u WHERE (u.id=o.donor_id)";}
            $res=$conn->query($q);
            
            if($res->num_rows>0)
            {
                while($row=$res->fetch_assoc())
                {
                    $rr=$row['donor_id'];
                    $sq="SELECT * FROM blood_donated_users t WHERE date = (select max(date) from blood_donated_users t1 where t1.donor_id = t.donor_id)";
                    $sres=$conn->query($sq);
                    $flag=0;
                    if($sres->num_rows>0)
                    {
                        while($srow=$sres->fetch_assoc())
                        {
                            if($srow['donor_id']==$rr)
                            {
                                $date1=substr($srow['date'],0,10);
                                $date2=date("Y-m-d");
                                $date1_ts = strtotime($date1);
                                $date2_ts = strtotime($date2);
                                $diff = $date2_ts - $date1_ts;
                                $ans=round($diff / 86400);
                                if($ans<=180)
                                {
                                    $flag=1;
                                    break;
                                }
                                
                            }
                        }
                    }
                    if($flag==0)
                    {
                        $lat=array();
                        $lon=array();
                        $blood_grp=array();
                        $phone=$row['phone'];
                        if($row['lat'])
                        {
                            array_push($lat,$row['lat']);
                            array_push($lon,$row['lon']);
                            array_push($blood_grp,$row['blood_grp']);
                        }
                        
                        echo '<div class="row mt-4 p-2">
            <div class="card p-3" style="width:35rem">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h4 class="card-title">'.$row['name'].'</h4>
                        </div>

                    </div>

                    <div class="row info mt-3 ">
                        <div class="col-xs-1 mt-1 pl-3">
                            <span class="blood-grp">
                                '.$row['blood_grp'].'
                            </span>
                        </div>
                        <div class=" col-xs-8 ml-4 mt-2">
                            <p style="font-size:large;font-weight: 500;"><i
                                    class="fas fa-map mr-3"></i>'.$row['location'].'a</p>
                            <p style="font-family: Arial;">Phno:'.$row['phone'].'</p>
                        </div>
                    </div>
                    ';
                    if($user_id!=$rr)
                    {
                        echo '<form method="POST" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
                            <input type="hidden" name="donor_id" value="'.$rr.'">
                            <button type="submit" name="blood" class="btn mt-3 donate">REQUEST</button>
                            <a target="blank" style="margin-left:auto;margin-right:auto;display:block;width: 35%;border-radius: 4rem;font-weight: bold;" class="btn btn-outline-primary mt-2" href="https://wa.me/+91'.$phone.'">Chat</a>
                            </form>
                            </div>
                    </div>
                    </div>';
                    }
                    else
                    {
                        echo '</div>
                    </div>
                    </div>
                    </div>';
                    }
                
                    }
                }
            }
            else
            {
                echo "<h1 class='text-center'>NO DONORS FOUND</h1>";
            }
        ?>
        

    </div>
        
    <div class="col content" id="organ">
        <?php 
            $q="SELECT o.*,u.* FROM organ_donors o,users u WHERE (u.id=o.donor_id)";
            $res=$conn->query($q);
            
            if($res->num_rows>0)
            {
                while($row=$res->fetch_assoc())
                {
                   $rr=$row['donor_id'];

                    $sq="SELECT * FROM organ_donated_users";
                    $sres=$conn->query($sq);
                    $flag=0;
                    if($sres->num_rows>0)
                    {
                        while($srow=$sres->fetch_assoc())
                        {
                            if($srow['donor_id']==$rr)
                            {
                                $flag=1;
                                break;
                            }
                        }
                    }
                    $phone=$row['phone'];
                    if($flag==0)
                    {
                        echo '<div class="row mt-4 p-2">
            <div class="card p-3" style="width:35rem">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h4 class="card-title">'.$row['name'].'</h4>
                        </div>

                    </div>

                    <div class="row info">

                        <div class="col-xs-1 mt-3 pl-3">
                            <span class="oragns">
                                '.$row['organs'].'
                            </span>
                        </div>

                        <div class="col-xs-8 mt-2 ml-4">
                            <p style="font-size:large;font-weight: 500;"><i class="fas fa-map mr-3"></i>'.$row['location'].'</p>
                            <p style="font-family: Arial;">Phno:'.$row['phone'].'</p>
                        </div>
                    </div>';
                   
                    if($_SESSION['user_id']!=$rr)
                    {
                        echo '<form method="POST" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
                            <input type="hidden" name="donor_id" value="'.$rr.'">
                            <button type="submit" name="organ" class="btn mt-3 donate">REQUEST</button>
                            <a target="blank" style="margin-left:auto;margin-right:auto;display:block;width: 35%;border-radius: 4rem;font-weight: bold;" class="btn btn-outline-primary mt-2" href="https://wa.me/+91'.$phone.'">Chat</a>

                            </form>
                            </div>
                    </div>
                    </div>';
                    }
                     else
                    {
                        echo '</div>
                    </div>
                    </div>
                    </div>';
                    }

                    }
                }
            }
                  
        ?>

        

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

<script>
    var mymap = L.map('mapid').setView([<?php echo $lat[0] ?>, <?php echo $lon[0] ?>], 13);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 510,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoiYmhhbnVrMTkiLCJhIjoiY2tzZWJxZW4yMHl1bzJ1b2RzOXMxd3hkMiJ9.DjdM6ILIjgddBCoERDT_QA'
    }).addTo(mymap);
    // L.setView(center, 1);
    var redIcon = L.icon({
        iconUrl: './assets/images/blood-drop.jpeg',
        iconSize: [70, 80],
        iconAnchor: [22, 94],
        popupAnchor: [-3, -76]
    });

    <?php
        for($i = 0; $i < count($lat); $i++) {
            $x=$lat[$i];
            $y=$lon[$i];
            $bg=$blood_grp[$i];
            ?>
        var marker=L.marker([<?php echo $x ?>, <?php echo $y ?>], { icon: redIcon }).addTo(mymap);
        marker.bindPopup("<h4><?php echo $bg ?></h4>").openPopup();
       <?php }
    ?>
</script>

</html>
