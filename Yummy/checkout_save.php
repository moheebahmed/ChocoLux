<?php
session_start();
include('./inc/functions.php');
$conn = db_connection();

$count_check_sql = "SELECT COUNT(*) AS total_orders FROM orders";
$order_check_result = $conn->query($count_check_sql);
if ($order_check_result->num_rows > 0) {
    $row = $order_check_result->fetch_assoc();
    $order_count = $row['total_orders'];
}

$email = $_POST['email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$company = $_POST['company'];
$address = $_POST['address'];
$city = $_POST['city'];
$apartment = $_POST['apartment'];
$country = $_POST['country'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$phone = $_POST['phone'];
$product_details = $_POST['product_details'];
$order_number = 'order_' . $order_count + 1;
$date = date("Y-m-d H:i:s");
$total = $_POST['total'];
$payment_method = $_POST['payment_method'] ?? 'Cash on delivery';

$sql = "INSERT INTO orders (email, first_name, last_name, company, address, apartment, city, country, state, zip, phone, 
        product_details, order_number, date, total, payment_method)
        VALUES ('$email', '$first_name', '$last_name', '$company', '$address', '$apartment', '$city', '$country', '$state', '$zip', 
        '$phone','$product_details', '$order_number', '$date', '$total', '$payment_method')";

if ($conn->query($sql) === TRUE) {
    unset($_SESSION['cart']);
    header("Location: thank-you.php?order=$order_number");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
