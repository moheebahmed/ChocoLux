<?php
function db_connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "e_commerce";

    $mysql_conn = new mysqli($servername, $username, $password, $database);
    if ($mysql_conn->connect_error) {
        die("Connection failed: " . $mysql_conn->connect_error);
    }
    return $mysql_conn;
}
function admin_url()
{
    return realpath(dirname(__FILE__) . '/../');
}

// ----sidebar_function_code----//
function siderbar()
{
    $admin_url = admin_url();
    include($admin_url . '/layouts/siderbar.php');
}

// ----header_function_code----//                   
function headerbar()
{
    $admin_url = admin_url();
    include($admin_url . '/layouts/header.php');
}

// ----footer_function_code----//
function footer()
{
    $admin_url = admin_url();
    include($admin_url . '/layouts/footer.php');
}


function loginDB()
{
    $conn = db_connection();
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM login_from WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($password == $row['password']) {
            $_SESSION['admin_email'] = $email;
            header("Location: admin_dashboard.php");
            exit();
        }
    }
    echo "Invalid email or password!";
}


function deleteProduct()
{
    $conn = db_connection();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM products WHERE id = $id";

        if (mysqli_query($conn, $sql)) {
            $_SESSION["message"] = "<div style='color: green; font-size: 18px; padding-bottom: 1%;'>Product deleted successfully!</div>";
        }
        header("Location: admin_table.php");
        exit();
    }
}

function productUpdate()
{
    $conn = db_connection();
    $id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];

    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (!empty($_FILES['img']['name'])) {
        $product_img = basename($_FILES['img']['name']);
        $target_file = $target_dir . $product_img;
        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
        $sql = "UPDATE products SET product_name='$product_name', price='$price', product_img='$target_file' WHERE id=$id";
    } else {
        $sql = "UPDATE products SET product_name='$product_name', price='$price' WHERE id=$id";
    }

    if ($conn->query($sql)) {
        $_SESSION["message"] = "<div style='color: green; font-size: 18px; padding-bottom: 1%;'>Product updated successfully!</div>";
        header("Location: admin_table.php");
        exit;
    } else {
        echo "Error updating product: " . $conn->error;
    }
}

function productSaveCode()
{
    $conn = db_connection();

    $product_name = $_POST['product_name'] ?? '';
    $price = $_POST['price'] ?? '';

    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $product_img = basename($_FILES['img']['name']);
    $target_file = $target_dir . $product_img;

    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        // echo "File uploaded successfully!";
    }

    $slider_images = [];

    if (!empty($_FILES['slider_img']['name'][0])) {
        foreach ($_FILES['slider_img']['name'] as $key => $name) {
            $tmpFilePath = $_FILES['slider_img']['tmp_name'][$key];
            $newFilePath = $target_dir . basename($name);

            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                $slider_images[] = $newFilePath;
            }
        }
    }

    $slider_images_data = json_encode($slider_images);

    $sql = "INSERT INTO products (product_name, product_img, price, rating, description) 
        VALUES ('$product_name', '$target_file', '$price', '0', '')";


    if (mysqli_query($conn, $sql)) {
        $product_id = mysqli_insert_id($conn);

        $sql_slider_images = "INSERT INTO slider_images (product_id, url_images) 
        VALUES ('$product_id', '$slider_images_data')";

        mysqli_query($conn, $sql_slider_images);

        $_SESSION['message'] = "<p>Product added successfully!</p>";
        header("Location: product_form.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
