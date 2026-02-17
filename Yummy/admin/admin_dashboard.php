<?php
session_start();
include('./inc/functions.php');
$conn = db_connection();
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
    <link rel="icon" type="image/x-icon" href="./images/af.png">
    <link href="./assets/css/responsive.css" rel="stylesheet" />
    <style>
        body {
            display: flex;
            background: #eef2f7;
        }
    </style>
</head>

<body>

    <div class="dashboard_box">
        <?php
        siderbar();
        ?>
        <div class="main-content">
            <div class="header">
                <h1>Dashboard</h1>
            </div>
            <div class="cards">
                <div class="card">
                    <h2>Total Products</h2>
                    <p>100</p>
                </div>
                <div class="card">
                    <h2>Total Orders</h2>
                    <p>250</p>
                </div>
                <div class="card">
                    <h2>Total Users</h2>
                    <p>500</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>