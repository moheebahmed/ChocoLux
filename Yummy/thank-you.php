<?php
session_start();
include('./inc/functions.php');
$conn = db_connection();

$order_number = $_GET['order'] ?? '';
$sql = "SELECT * FROM orders WHERE order_number = '$order_number'";
$result = $conn->query($sql);
$order = array();
if ($result->num_rows > 0) {
    $order = $result->fetch_assoc();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<?php
headlink();
?>

<body>
    <div class="main_body_content">
        <?php
        headerbar();
        ?>

        <div class="tocontainer">
            <div class="main-thank_you">
                <p>Thank you for the chocolate for event or day.</p>
            </div>

            <div class="thank-you">
                <h1>Thank you for your order! :)</h1>
            </div>

            <div class="order-details">
                <div>
                    <p>Order number:<br><?php echo $order['order_number']; ?></p>
                </div>
                <div>
                    <p>Date:<br><?php echo $order['date']; ?></p>
                </div>
                <div>
                    <p>Total:<br>$<?php echo $order['total']; ?></p>
                </div>
                <div>
                    <p>Payment method:<br><?php echo $order['payment_method']; ?></p>
                </div>
            </div>

            <div class="last-para">
                <?php echo '<p>Pay with cash upon delivery.</p>' ?>
            </div>
        </div>
        <?php
        footer();
        ?>
    </div>
</body>

</html>