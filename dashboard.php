<?php 
session_start();
include('./db_conn.php');
$id=$_SESSION['user_id'];
if(isset($_POST['blood']))
{
    $request_id=$_POST['request_id'];
    $ins1="INSERT INTO blood_responses(`request_id`,`user_id`,`voluntary`) VALUES('$request_id','$id',1)";
    $ires1=$conn->query($ins1);
    echo "<script>alert('THANK YOU!!Your contact is shared with the requester');</script>";
}

if(isset($_POST['organ']))
{
    $request_id=$_POST['request_id'];
    $ins2="INSERT INTO organ_responses(`request_id`,`user_id`,`voluntary`) VALUES('$request_id','$id',1)";
    $ires2=$conn->query($ins2);
    echo "<script>alert('THANK YOU!!Your contact is shared with the requester');</script>";

}

if(isset($_POST['blood_accept']))
{
    $request_id=$_POST['request_id'];
    $donor_id=$_POST['donor_id'];
    $ins3="INSERT INTO blood_donated_users(`request_id`,`donor_id`) VALUES('$request_id','$donor_id')";
    $ires3=$conn->query($ins3);   

    $sql = "DELETE FROM blood_responses WHERE request_id='$request_id'";
    $conn->query($sql);
}

if(isset($_POST['organ_accept']))
{
    $request_id=$_POST['request_id'];
    $donor_id=$_POST['donor_id'];
    $ins4="INSERT INTO organ_donated_users(`request_id`,`donor_id`) VALUES('$request_id','$donor_id')";
    $ires4=$conn->query($ins4); 
    
    $sql = "DELETE FROM organ_responses WHERE request_id='$request_id'";
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
    <?php
        $flag=0;
        $history=0;
        $personal=0;
        $requests=0;
        $q1="SELECT b.*,u.*,b.sno as requestid FROM blood_requesters b,users u WHERE (b.requester_id='$id' AND u.id='$id')";
        $res1=$conn->query($q1);
        if($res1->num_rows!=0)
        {
            while($row1=$res1->fetch_assoc())
            {
                $sq="SELECT request_id FROM blood_donated_users";
                $sres=$conn->query($sq);
                if($sres->num_rows!=0)
                {
                    $temp=0;
                    while($srow=$sres->fetch_assoc())
                    {
                        if($srow['request_id']==$row1['requestid'])
                        {
                            $temp=1;
                            break;
                        }
                       
                    }
                    if($temp==0)
                    {
                        $flag=1;
                        $personal=1;
                    }
                }
            }  
        }

        $q2="SELECT o.*,u.*,o.sno as requestid FROM organ_requesters o,users u WHERE (o.requester_id='$id' AND u.id='$id')";
        $res2=$conn->query($q2);
        if($res2->num_rows!=0)
        {
           while($row2=$res2->fetch_assoc())
            {
                $sq="SELECT request_id FROM organ_donated_users";
                $sres=$conn->query($sq);
                if($sres->num_rows!=0)
                {
                    $temp=0;
                    while($srow=$sres->fetch_assoc())
                    {
                        if($srow['request_id']==$row2['requestid'])
                        {
                            $temp=1;
                            break;
                        }
                       
                    }
                    if($temp==0)
                    {
                        $flag=1;
                        $personal=1;

                    }
                }
            }
        }

        $q3="SELECT * FROM `blood_responses` WHERE (user_id='$id' AND voluntary=0) ORDER BY date DESC";
        $res3=$conn->query($q3);
        if($res3->num_rows!=0)
        {
            $flag=1;
            $requests=1;
        }

        $q4="SELECT * FROM `organ_responses` WHERE (user_id='$id' AND voluntary=0) ORDER BY date DESC";
        $res4=$conn->query($q4);
        if($res4->num_rows!=0)
        {
            $flag=1;
            $requests=1;
        }

        $q5="SELECT * FROM `blood_donated_users` WHERE donor_id='$id' ORDER BY date DESC";
        $res5=$conn->query($q5);
        if($res5->num_rows!=0)
        {
            $flag=1;
            $history=1;
        }

        $q6="SELECT * FROM `organ_donated_users` WHERE donor_id='$id' ORDER BY date DESC";
        $res6=$conn->query($q6);
        if($res6->num_rows!=0)
        {
            $flag=1;
            $history=1;
        }

        $q7="SELECT * FROM blood_requesters WHERE (requester_id='$id' AND sno IN (SELECT request_id FROM blood_donated_users))";
        $res7=$conn->query($q7);
        if($res7->num_rows!=0)
        {
            $flag=1;
            $history=1;    
        }

        $q8="SELECT * FROM organ_requesters WHERE (requester_id='$id' AND sno IN (SELECT request_id FROM organ_donated_users))";
        $res8=$conn->query($q8);
        if($res8->num_rows!=0)
        {
            $flag=1;
            $history=1;    
        }
        
        if($flag==0)
        {
    ?>
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
    <?php
    }
    if($personal==1){?>
    <!-- User Requests -->
    <div class="container requests">
        <h1 class="display-4 mt-5 text-center">YOUR REQUESTS</h1>

        <div class="row mt-4 p-2">
            <?php 
            if($res1->num_rows!=0)
            {
                $res1=$conn->query($q1);
                while($row1=$res1->fetch_assoc())
                {
                    $sq="SELECT request_id FROM blood_donated_users";
                    $sres=$conn->query($sq);
                    if($sres->num_rows!=0)
                    {
                    $temp=0;
                    while($srow=$sres->fetch_assoc())
                    {
                        if($srow['request_id']==$row1['requestid'])
                        {
                            $temp=1;
                            break;
                        }
                       
                    }
                    if($temp==0)
                    {
                        $name = $row1['name'];
                    $date=substr($row1['date'],0,10);
                    $location=$row1['location'];
                    $msg=$row1['msg'];
                    $blood_grp=strtoupper($row1['blood_grp']);
                    echo '<div class="card p-3 mt-4" style="width:40rem;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h4 class="card-title">'.$name.'</h4>
                        </div>
                        <div class="col-md-5">
                            <span class="date">Posted on:
                                '.$date.'</span>
                        </div>
                    </div>
                    <h5 class="card-subtitle mt-2 text-muted">Looking for '.$blood_grp.' in '.$location.'</h5>
                    <p class="card-text mt-4">'.$msg.'
                    </p>

                    <div class="row info p-2">
                        <div class="col-xs-1">
                            <span class="blood-grp">
                                '.$blood_grp.'
                            </span>
                        </div>
                        <div class="col-xs-3"></div>
                        <div class="col-xs-8 ml-4 mt-3">
                            <h4>Blood Donors Needed</h4>
                            <p><i class="fas fa-map mr-3"></i>'.$location.'</p>

                        </div>
                    </div>
                    ';
                    $request_id=$row1['requestid'];

                    $subq="SELECT b.*,u.* FROM blood_responses b,users u WHERE (b.request_id='$request_id' AND u.id=b.user_id AND b.voluntary=1)";
                    $subres=$conn->query($subq);
                    if($subres->num_rows==0)
                    {
                        echo '<h4 class="mt-4 text-danger">NO RESPONDENTS YET :(</h4>
                        </div>
                    </div>';
                    }
                    else
                    {
                        while($subrow=$subres->fetch_assoc())
                        {
                            $name=$subrow['name'];
                            echo '<h5 class="mt-4 text-danger">'.$name.'</h5>
                                    <h6>Contact:'.$subrow['phone'].'</h6>
                                    <form method="POST" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
                                    <input type="hidden" name="request_id" value="'.$request_id.'">
                                    <input type="hidden" name="donor_id" value="'.$subrow['id'].'">
                                    <button type="submit" name="blood_accept" class="btn mt-3 donate">Accept</button>
                                </form>
                            ';
                            
                        }
                        
                    }
                    echo '</div>
                        </div>';
                    }
                    }
                }  
                
            }


            if($res2->num_rows!=0)
            {
                $res2=$conn->query($q2);
                while($row2=$res2->fetch_assoc())
            {
                $sq="SELECT request_id FROM organ_donated_users";
                $sres=$conn->query($sq);
                if($sres->num_rows!=0)
                {
                    $temp=0;
                    while($srow=$sres->fetch_assoc())
                    {
                        if($srow['request_id']==$row2['requestid'])
                        {
                            $temp=1;
                            break;
                        }
                       
                    }
                    if($temp==0)
                    {
                        $name = $row2['name'];
                    $date=substr($row2['date'],0,10);
                    $location=$row2['location'];
                    $organs=$row2['organs'];
                    $msg=$row2['msg'];
                    $blood_grp=strtoupper($row2['blood_grp']);
                    echo '<div class="card p-3 mt-4" style="width:40rem">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h4 class="card-title">'.$name.'</h4>
                        </div>
                        <div class="col-md-5">
                            <span class="date">Posted on:
                                '.$date.'</span>
                        </div>
                    </div>
                    <h5 class="card-subtitle mt-2 text-muted">Looking for '.$organs.' in '.$location.'</h5>
                    <p class="card-text mt-4">'.$msg.'
                    </p>

                    <div class="row info p-2">
                        <div class="col-xs-1 mt-2">
                            <span class="organs">
                                '.$organs.'
                            </span>
                        </div>
                        <div class="col-xs-3"></div>
                        <div class="col-xs-8 ml-4 mt-3">
                            <h4>Blood Donors Needed</h4>
                            <p><i class="fas fa-map mr-3"></i>'.$location.'</p>

                        </div>
                    </div>
                    ';
                    $request_id=$row2['requestid'];

                    $subq="SELECT b.*,u.* FROM organ_responses b,users u WHERE (b.request_id='$request_id' AND u.id=b.user_id AND b.voluntary=1)";
                    $subres=$conn->query($subq);
                    if($subres->num_rows==0)
                    {
                        echo '<h4 class="mt-4 text-danger">NO RESPONDENTS YET :(</h4>
                        </div>
                    </div>';
                    }
                    else
                    {
                        while($subrow=$subres->fetch_assoc())
                        {
                            $name=$subrow['name'];
                            echo '<h5 class="mt-4 text-danger">'.$name.'</h5>
                                    <h6>Contact:'.$subrow['phone'].'</h6>
                                
                                <form method="POST" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
                                    <input type="hidden" name="request_id" value="'.$request_id.'">
                                    <input type="hidden" name="donor_id" value="'.$subrow['id'].'">
                                    <button type="submit" name="organ_accept" class="btn mt-3 donate">Accept</button>
                                </form>
                            ';
                            
                        }
                        echo '</div>
                        </div>';
                    }
                    }
                }
            }
            }   
            ?>
            
        </div>
    </div>
    <!-- If there are some requests -->
    <?php
        }
        if($requests==1)
        {
            
    ?>
    <div class="container requests">
        <h1 class="display-4 mt-1 text-center">REQUESTS</h1>
        <?php 
            if($res3->num_rows!=0)
            {
                while($row3=$res3->fetch_assoc())
                {
                    $request_id=$row3['request_id'];

                    $sq="SELECT b.*,u.* FROM blood_requesters b,users u WHERE b.sno='$request_id' AND u.id=b.requester_id";
                    $sres=$conn->query($sq);
                    if($sres->num_rows>0)
                    {
                     while($srow=$sres->fetch_assoc())
                     {
                        $name=$srow['name'];
                        $date=substr($srow['date'],0,10);
                        $location=$srow['location'];
                        $msg=$srow['msg'];
                        $blood_grp=strtoupper($srow['blood_grp']);
                        echo '<div class="row mt-4 p-2">
            <div class="card p-3 mt-3" style="width:40rem">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h4 class="card-title">'.$name.'</h4>
                        </div>
                        <div class="col-md-5">
                            <span class="date">Posted on:
                                '.$date.'</span>
                        </div>
                    </div>

                    <h5 class="card-subtitle mt-2 text-muted">Looking for '.$blood_grp.' in '.$location.'</h5>
                    <p class="card-text mt-4">'.$msg.'
                    </p>

                    <div class="row info p-2">
                        <div class="col-xs-1">
                            <span class="blood-grp">
                                '.$blood_grp.'
                            </span>
                        </div>
                        <div class="col-xs-3"></div>
                        <div class="col-xs-8 ml-4 mt-3">
                            <h4>Blood Donors Needed</h4>
                            <p><i class="fas fa-map mr-3"></i>'.$location.'</p>

                        </div>
                    </div>
                    <form method="POST" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
                        <input type="hidden" name="request_id" value="'.$request_id.'">
                        <button type="submit" name="blood" class="btn mt-3 donate">DONATE</button>
                    </form>
                </div>
            </div>
        </div>';
                     }
                    }
                }
            }

            if($res4->num_rows!=0)
            {
                while($row4=$res4->fetch_assoc())
                {
                    $request_id=$row4['request_id'];

                    $sq2="SELECT o.*,u.* FROM organ_requesters o,users u WHERE o.sno='$request_id' AND u.id=o.requester_id";
                    $sres2=$conn->query($sq2);
                    if($sres2->num_rows>0)
                    {
                     while($srow2=$sres2->fetch_assoc())
                     {
                        $name=$srow2['name'];
                        $date=substr($srow2['date'],0,10);
                        $location=$srow2['location'];
                        $msg=$srow2['msg'];
                        $organs=strtoupper($srow2['organs']);
                        echo '<div class="row mt-4 p-2">
            <div class="card p-3 mt-3" style="width:40rem">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h4 class="card-title">'.$name.'</h4>
                        </div>
                        <div class="col-md-5">
                            <span class="date">Posted on:
                                '.$date.'</span>
                        </div>
                    </div>

                    <h5 class="card-subtitle mt-2 text-muted">Looking for '.$organs.' in '.$location.'</h5>
                    <p class="card-text mt-4">'.$msg.'
                    </p>

                    <div class="row info p-2">
                        <div class="col-xs-1">
                            <span class="organs">
                                '.$organs.'
                            </span>
                        </div>
                        <div class="col-xs-3"></div>
                        <div class="col-xs-8 ml-4 mt-3">
                            <h4>Blood Donors Needed</h4>
                            <p><i class="fas fa-map mr-3"></i>'.$location.'</p>

                        </div>
                    </div>
                   <form method="POST" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
                        <input type="hidden" name="request_id" value="'.$request_id.'">
                        <button type="submit" name="organ" class="btn mt-3 donate">DONATE</button>
                    </form>
                </div>
            </div>
        </div>';

                     }
                    }
                }
            }
        ?>
        

        
    </div>

    <?php }
    if($history==1){
    ?>

    <div class="container requests">
        <h1 class="display-4 mt-1 text-center">HISTORY</h1>
        <?php 
        if($res5->num_rows!=0)
        {
            while($row5=$res5->fetch_assoc())
            {
                $request_id=$row5['request_id'];

                $sq="SELECT b.*,u.* FROM blood_requesters b,users u WHERE b.sno='$request_id' AND u.id=b.requester_id ORDER BY b.date DESC";
                $sres=$conn->query($sq);
                if($sres->num_rows>0)
                {
                 while($srow=$sres->fetch_assoc())
                 {
                    $name=$srow['name'];
                    $date=substr($srow['date'],0,10);
                    $location=$srow['location'];
                    $msg=$srow['msg'];
                    $blood_grp=strtoupper($srow['blood_grp']);
                    echo '<div class="row mt-4 p-2">
            <div class="card p-3" style="width:40rem">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h4 class="card-title">'.$name.'</h4>
                        </div>
                        <div class="col-md-5">
                            <span class="date">Posted on:
                                '.$date.'</span>
                        </div>
                    </div>


                    <h5 class="card-subtitle mt-2 text-muted">Looking for '.$blood_grp.' in '.$location.'</h5>
                    <p class="card-text mt-4">'.$msg.'
                    </p>

                    <div class="row completed p-2">
                        <div class="col-xs-1">
                            <span class="blood-grp">
                                '.$blood_grp.'
                            </span>
                        </div>

                        
                        <div class="col-xs-3 mt-4 ml-4">
                            <h3>You Donated :)</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
                 }
                }
            }
        }


        if($res6->num_rows!=0)
        {
            while($row6=$res6->fetch_assoc())
            {
                $request_id=$row6['request_id'];

                $sq="SELECT o.*,u.* FROM organ_requesters o,users u WHERE o.sno='$request_id' AND u.id=o.requester_id ORDER BY o.date DESC";
                $sres=$conn->query($sq);
                if($sres->num_rows>0)
                {
                 while($srow=$sres->fetch_assoc())
                 {
                    $name=$srow['name'];
                    $date=substr($srow['date'],0,10);
                    $location=$srow['location'];
                    $msg=$srow['msg'];
                    $organs=strtoupper($srow['organs']);
                    echo '<div class="row mt-4 p-2">
            <div class="card p-3" style="width:40rem">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h4 class="card-title">'.$name.'</h4>
                        </div>
                        <div class="col-md-5">
                            <span class="date">Posted on:
                                '.$date.'</span>
                        </div>
                    </div>


                    <h5 class="card-subtitle mt-2 text-muted">Looking for '.$organs.' in '.$location.'</h5>
                    <p class="card-text mt-4">'.$msg.'
                    </p>

                    <div class="row completed p-2">
                        <div class="col-xs-1 mt-2">
                            <span class="organs">
                                '.$organs.'
                            </span>
                        </div>

                        
                        <div class="col-xs-3 mt-4 ml-4">
                            <h3>You Donated :)</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
                 }
                }
            }
        }


        if($res7->num_rows!=0)
        {
            while($row7=$res7->fetch_assoc())
            {
                $request_id=$row7['sno'];
                $sq="SELECT u.*,b.request_id,b.donor_id,b.date FROM users u,blood_donated_users b WHERE (u.id=b.donor_id AND b.request_id='$request_id') ORDER BY b.date DESC";
                $sres=$conn->query($sq);
                if($sres->num_rows>0)
                {
                    while($srow=$sres->fetch_assoc())
                    {
                        $name=$srow['name'];
                        
                        $date=substr($row7['date'],0,10);
                        $location=$row7['location'];
                        $msg=$row7['msg'];
                        $blood_grp=strtoupper($row7['blood_grp']);
                        $date=substr($row7['date'],0,10);
                        echo '<div class="row mt-4 p-2">
            <div class="card p-3" style="width:40rem">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h4 class="card-title">Your Request</h4>
                        </div>
                        <div class="col-md-5">
                            <span class="date">Posted on:
                                '.$date.'</span>
                        </div>
                    </div>


                    <h5 class="card-subtitle mt-2 text-muted">Looking for '.$blood_grp.' in '.$location.'</h5>
                    <p class="card-text mt-4">'.$msg.'
                    </p>

                    <div class="row completed p-2">
                        <div class="col-md-2">
                            <span class="blood-grp">
                                '.$blood_grp.'
                            </span>
                        </div>

                        <div class="col-md-10 mt-4">
                            <h3>'.$name.' Donated :)</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>';

                    }

                }
            }
        }



        if($res8->num_rows!=0)
        {
            while($row8=$res8->fetch_assoc())
            {
                $request_id=$row8['sno'];
                $sq="SELECT u.*,b.request_id,b.donor_id FROM users u,organ_donated_users b WHERE (u.id=b.donor_id AND b.request_id='$request_id') ORDER BY b.date DESC";
                $sres=$conn->query($sq);
                if($sres->num_rows>0)
                {
                    while($srow=$sres->fetch_assoc())
                    {
                        $name=$srow['name'];
                        
                        $date=substr($row8['date'],0,10);
                        $location=$row8['location'];
                        $msg=$row8['msg'];
                        $organs=strtoupper($row8['organs']);
                        $date=substr($row8['date'],0,10);
                        echo '<div class="row mt-4 p-2">
            <div class="card p-3" style="width:40rem">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h4 class="card-title">Your Request</h4>
                        </div>
                        <div class="col-md-5">
                            <span class="date">Posted on:
                                '.$date.'</span>
                        </div>
                    </div>


                    <h5 class="card-subtitle mt-2 text-muted">Looking for '.$organs.' in '.$location.'</h5>
                    <p class="card-text mt-4">'.$msg.'
                    </p>

                    <div class="row completed p-2">
                        <div class="col-md-4">
                            <span class="organs">
                                '.$organs.'
                            </span>
                        </div>

                        <div class="col-md-8 mt-3">
                            <h3>'.$name.' Donated :)</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>';

                    }

                }
            }
        }
        ?>
        
    </div>
    <?php }?>
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
