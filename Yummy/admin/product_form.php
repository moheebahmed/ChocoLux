<?php
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
        <div class="main class">
            <?php
            session_start();
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>
            <form action="product_save.php" method="POST" enctype="multipart/form-data">
                <h2>Product Form</h2>

                <label>Product Name:</label>
                <input type="text" name="product_name" required>

                <label>Product Images:</label>
                <input name="img" type="file" required />

                <label>Price:</label>
                <input type="text" name="price" required>

                <input name="url_images" type="file" required />

                <input name="url_images" type="file" required />

                <input name="url_images" type="file" required />

                <input name="url_images" type="file" required />

                <button type="submit">Submit</button>
            </form>
        </div>

        <?php
        footer();
        ?>
    </div>
</body>

</html>