<?php
session_start();
include('./inc/functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />
    <link href="./assets/css/slick-theme.css" rel="stylesheet" />
    <link href="./assets/css/FOnt_icons.css" rel="stylesheet" />
    <link href="./assets/css/style.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="./assets/images/af.png">
    <link href="./assets/css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="main_body_content">

        <?php
        headerbar();
        ?>

        <div class="login-container">
            <a class="navbar-brand" href="index.php">ChocoLux</a>
            <h2>Please fill in your unique admin login details below</h2>
            <form action="login_db.php" method="post">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group password-wrapper">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                    <span onclick="togglePassword()">👁️</span>
                </div>
                <a href="#" class="forgot-password">Forgot password?</a>
                <button type="submit" class="login-btn">Log In</button>
            </form>
        </div>

        <?php
        footer();
        ?>


        <script>
            function togglePassword() {
                let pass = document.getElementById("password");
                if (pass.type === "password") {
                    pass.type = "text";
                } else {
                    pass.type = "password";
                }
            }
        </script>

</body>

</html>