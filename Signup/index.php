<?php
session_start();
if (isset($_POST['submit'])) {
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "php_practice";

    $con = mysqli_connect($host, $user, $password, $database);

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone_no = mysqli_real_escape_string($con, $_POST['phone_number']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $repeat_password = mysqli_real_escape_string($con, $_POST['repeat_password']);

    $pass_has = password_hash($password, PASSWORD_BCRYPT);
    $repass_has = password_hash($repeat_password, PASSWORD_BCRYPT);
    $emailVerifyQuery = "SELECT * FROM `registration_form` WHERE `Email Address`='$email' OR `Username`='$username'";
    $runEmailQuery = mysqli_query($con, $emailVerifyQuery);
    $emailCount = mysqli_num_rows($runEmailQuery);
    if ($emailCount > 0) {
?>
        <script>
            alert('Sorry Email or Username is already registered use different Email address or Username ...!!!');
        </script>
        <?php
    } else {
        if ($password === $repeat_password) {

            $query = "INSERT INTO `registration_form` (`Username`, `Email Address`, `Phone Number`, `Password`, `Repeat Password`) VALUES ('$username', '$email', '$phone_no', '$pass_has', '$repass_has')";
            $run = mysqli_query($con, $query);

            if ($run) {
        ?>
                <script>
                    alert('Successfully registered...!!!');
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert('Password Didnt Matched...!!!');
            </script>
<?php
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="name" placeholder="User Name" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" />
                            </div>
                            <div class="form-group">
                                <label for="phone_number"><i class="zmdi zmdi-phone"></i></label>
                                <input type="number" name="phone_number" id="phone_number" placeholder="Mobile Number" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="repeat_password" id="re_pass" placeholder="Repeat your password" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="../Login" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>



    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>