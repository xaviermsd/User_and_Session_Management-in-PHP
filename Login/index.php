<?php

session_start();
if (isset($_POST['login'])); {
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "php_practice";

    $con = mysqli_connect($host, $user, $password, $database);

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    // Check if a user exists with given username & password
    $loginQuery = "Select `Password` from `registration_form` WHERE `Email Address`='$email'";
    $runLoginQuery = mysqli_query($con, $loginQuery);
    // Count the number of user/rows returned by query 
    $user_matched = mysqli_num_rows($runLoginQuery);
    echo $user_matched;

    // Check If user matched/exist
    if ($user_matched ==1) {

        // $_SESSION["email"] = $email;
        $row = mysqli_fetch_assoc($runLoginQuery);                                                                       
        echo $row['Password'];
        if (password_verify($password, $row['Password'])) {
            $_SESSION["email"] = $email;
            header("location: userProfile.php");
            // echo "Password Verified";
        }
        else{
            echo "Wrong Password";
        }
    }
     else {
        echo "Password does not match";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="main">
        <!-- Login in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="../Signup/" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login </h2>
                        <form method="POST" class="register-form" id="login-form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                            <div class="form-group">
                                <label for="your_email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email" id="your_name" placeholder="Your Email" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="login" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>