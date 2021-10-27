<?php 
    session_start();
    include('db_conn.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email=$_SESSION['user_email_address'];
        $name=$_SESSION['user_first_name']." ".$_SESSION['user_last_name'];
        $phno=$_POST['phno'];
        $age=(int)$_POST['age'];
        $gender=$_POST['gender'];

        $q="INSERT INTO users(`email`,`phone`,`name`,`age`) VALUES ('$email','$phno','$name','$age')";
        if ($conn->query($q) === TRUE)
        {
            $q2="SELECT * FROM `users` WHERE email='$email'";
            $res = $conn->query($q2);
            if ($res->num_rows > 0)
            {
                while($row = $res->fetch_assoc())
                {
                    $_SESSION['user_id']=$row['id'];
                }
            }
        ?><script>
            location.replace("dashboard.php");
            </script>
        <?php
        } else {
            echo "<script>console.log('$conn->error');</script>";
        }
        
        
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

    <link rel="stylesheet" href="./assets/styles/style.css">

    <title>Life Line | Sign Up</title>
</head>
<style>
    label {
        color: var(--red);
        font-weight: 510
    }
</style>

<body>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle" style="color:var(--red)">You are just one step
                        away!!</h4>

                    <a href="./index.php"><span aria-hidden="true" class="btn-danger btn" style="font-weight:bold;font-size:1.3rem">&times;</span></a>

                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group">
                            <label for="email">Phone Number</label>
                            <input type="tel" class="form-control" di="email" name="phno"
                                placeholder="Enter your Phone number" required>
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" name="age" class="form-control" id="age" placeholder="Enter your age" required>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                            <label class="form-check-label" for="other">Other</label>
                        </div>

                </div>
                <div class="modal-footer">
                    <a href="./register.php" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn" style="background-color: var(--red);color:white">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>

        $(window).on('load', function () {
            $('#myModal').modal('show');
        });

    </script>
</body>

</html>
