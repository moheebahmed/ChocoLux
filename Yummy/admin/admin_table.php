<?php
session_start();
include('./inc/functions.php');
$conn = db_connection();

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
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
</head>

<body class="cas">
    <div class="dashboard_box">
        <?php
        siderbar();
        ?>
        <div class="main-content">
            <div class="header">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="parent_container">
        <div class="add-button">
            <a href="product_form.php" class="add">ADD</a>
        </div>
        <h2 class="text-center mb-4">Product Table form</h2>
        <?php
        if (isset($_SESSION["message"])) {
            echo $_SESSION["message"];
        };
        session_destroy();
        ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['product_name'] ?></td>
                            <td><img src="<?= $row['product_img'] ?>" width="50"></td>
                            <td>$<?= $row['price'] ?></td>
                            <td>
                                <a href="cart.php?id=<?= $row['id'] ?>" class="btn btn-warning" style="color:#fff;margin-right: 5px;">View</a>
                                <a href="product_edit.php?id=<?= $row['id'] ?>" class="btn btn-primary " style="margin-right: 5px;">Edit</a>
                                <a href="product_delete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                <?php
                    }
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>


</html>