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
    <style>
        body {
            background-color: #f4f4f4;
            WIDTH: 20%;
            MARGIN: auto;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include('./inc/functions.php');
    $conn = db_connection();

    $product_id = $_GET['id'] ?? '';
    $query = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($query);
    $product = $result->fetch_assoc();
    ?>
    <div class="main class">
        <form action="product_update.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $product['id'] ?>">

            <label>Product Name:</label>
            <input type="text" name="product_name" value="<?= $product['product_name'] ?>" required>

            <label>Product Image:</label>
            <input type="file" name="img">
            <img src="<?= $product['product_img'] ?>" width="100">

            <label>Price:</label>
            <input type="text" name="price" value="<?= $product['price'] ?>" required>

            <button type="submit">Update Product</button>
        </form>
    </div>
</body>

</html>