<?php 
    session_start();
    include('db_conn.php');
    if (isset($_POST['submit'])) {
        $otp=$_POST['otp'];
        if($otp==$_SESSION['otp'])
        {
            $email=$_SESSION['mail_to_email'];
            $password=$_SESSION['password'];
            $phone=$_SESSION['phone'];
            $name=$_SESSION['name'];
            $age=$_SESSION['age'];
            $sql = "INSERT INTO `users` (`email`, `password`, `phone`, `name`, `age`) VALUES ('$email', '$password', '$phone', '$name', '$age');";
            if($conn->query($sql) == true )
            {
                 header("location:sign_in.php");
            }
        }
        else
        {
            echo "<script>alert('The otp that you enterted is wrong!!!')</script>";
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

    <title>Life Line | OTP Verification</title>
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
                            <label for="otp">OTP</label>
                            <input type="number" id="otp" class="form-control" name="otp"
                                placeholder="Enter the OTP you recieved!!" required>
                        </div>
                        
                </div>
                <div class="modal-footer">
                    <a href="./register.php" class="btn btn-secondary">Back</a>
                    <button type="submit" name="submit" class="btn" style="background-color: var(--red);color:white">Submit</button>
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