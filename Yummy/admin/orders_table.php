<?php
session_start();
include('./inc/functions.php');
$conn = db_connection();

$sql = "SELECT * FROM orders";
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
    <link rel="icon" type="image/x-icon" href="./assets/images/af.png">
    <link href="./assets/css/responsive.css" rel="stylesheet" />
</head>

<body class="left">
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
        <h2 class="text-center mb-4">Orders List</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Product Details</th>
                    <th>Total Price</th>
                    <th>Address</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $product_details = json_decode($row['product_details']);
                        $orderId = $row['order_number'];
                ?>
                        <tr>
                            <td><?= $row['order_number']; ?></td>
                            <td><?= $row['first_name'] . ' ' . $row['last_name']; ?></td>
                            <td>
                                <button onclick="openModal('product<?= $orderId; ?>')" class="none">View Product</button>

                                <div id="product<?= $orderId; ?>" class="modal">
                                    <div class="modal-content">
                                        <span class="close" onclick="closeModal('product<?= $orderId; ?>')">&times;</span>
                                        <h3>Product Details</h3>
                                        <table border="1">
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($product_details as $product) { ?>
                                                    <tr>
                                                        <td><?= $product->name; ?></td>
                                                        <td><?= $product->price; ?>$</td>
                                                        <td><?= $product->quantity; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </td>
                            <td><?= $row['total']; ?>$</td>
                            <td>
                                <button onclick="openModal('address<?= $orderId; ?>')" class="none two">View Address</button>

                                <div id="address<?= $orderId; ?>" class="modal">
                                    <div class="modal-content">
                                        <span class="close" onclick="closeModal('address<?= $orderId; ?>')">&times;</span>
                                        <h3>Address Details</h3>
                                        <p><?= $row['address']; ?></p>
                                    </div>
                                </div>
                            </td>
                            <td><?= $row['date']; ?></td>
                        </tr>
                <?php
                    }
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function openModal(modalId) {
            let modal = document.getElementById(modalId);
            if (modal) {
                modal.style.display = "flex";
                setTimeout(() => (modal.style.opacity = "1"), 10);
            }
        }

        function closeModal(modalId) {
            let modal = document.getElementById(modalId);
            if (modal) {
                modal.style.opacity = "0";
                setTimeout(() => (modal.style.display = "none"), 300);
            }
        }
    </script>


</body>

</html>