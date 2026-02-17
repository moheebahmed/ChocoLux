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

function getProductDetails()
{
    $conn = db_connection();
    $product_id = isset($_GET['id']) ? $_GET['id'] : '';

    $query = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($query);

    $product = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $product['id']          = $row['id'];
            $product['name']        = $row['product_name'];
            $product['img']         = $row['product_img'];
            $product['price']       = $row['price'];
            $product['rating']      = $row['rating'];
            $product['description'] = $row['description'];
        }
    }
    return  $product;
}
function getSilderDetails()
{
    $conn = db_connection();
    $slider_images = [];
    $product_id = isset($_GET['id']) ? $_GET['id'] : '';
    $image_slide_query = "SELECT url_images FROM slider_images WHERE product_id = $product_id";
    $image_result = $conn->query($image_slide_query);

    if ($image_result->num_rows > 0) {
        $row = $image_result->fetch_assoc();
        $slider_images = json_decode($row['url_images']);
    }
    return $slider_images;
}

function postCart()
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $img = $_POST['img'];
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += $quantity;
    } else {
        $_SESSION['cart'][$id] = [
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'img' => $img,
            'quantity' => $quantity
        ];
    }
    header("Location: cart.php");
    exit();
}

function removeItem()
{
    if (isset($_GET['id'])) {
        $cart_id = $_GET['id'];
        if (isset($_SESSION['cart'][$cart_id])) {
            unset($_SESSION['cart'][$cart_id]);
        }
    }
    header("Location: cart.php");
    exit();
}
function destroyCart()
{
    session_start();
    unset($_SESSION['cart']);
    session_destroy();
    header("Location: cart.php");
    exit;
}

function totalItem()
{
    $total = 0;

    foreach ($_SESSION['cart'] as $id => $item) {
        $subtotal = $item['price'] * $item['quantity'];
        $total += $subtotal;

        echo "<tr>
              <td><img src='{$item['img']}'> {$item['name']}</td>
              <td>{$item['price']}$</td>
              <td>{$item['quantity']}</td>
              <td>{$subtotal}$</td>
              <td><a href='remove_item.php?id={$id}'>❌</a></td>
              <td><a href='product.php?id={$id}'>Edit</a></td>
              </tr>";
    }
}

function totalCheckItem($cart)
{
    $total = 0;
    $total_quantity = 0;

    foreach ($cart as $item) {
        $subtotal = $item['price'] * $item['quantity'];
        $total += $subtotal;
        $total_quantity += $item['quantity'];

        echo "<tr>";
        echo "<td><img src='{$item['img']}' class='product-img'></td>";
        echo "<td>{$item['name']}</td>";
        echo "<td>({$item['quantity']})</td>";
        echo "<td>\${$subtotal}</td>";
        // echo "<td><a href='remove_item.php?id={$id}'>❌</a></td>";
        echo "</tr>";
    }
}

function testimonialSlider()
{
    $sliders = [
        [
            'heading' => 'Chocolate <br><span>Yummy</span>',
            'image' => './assets/images/slider-img.png',
            'link' => '#',
            'arrow_image' => './assets/images/white-arrow.png'
        ],
        [
            'heading' => 'Chocolate <br><span>Yummy</span>',
            'image' => './assets/images/slider-img.png',
            'link' => '#',
            'arrow_image' => './assets/images/white-arrow.png'
        ],
        [
            'heading' => 'Chocolate <br><span>Yummy</span>',
            'image' => './assets/images/slider-img.png',
            'link' => '#',
            'arrow_image' => './assets/images/white-arrow.png'
        ]
    ];

    foreach ($sliders as $index => $slider) {
        $active_class = $index == 0 ? 'active' : '';
        echo '<div class="carousel-item ' . $active_class . '">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail_box">
                        <h1>' . $slider['heading'] . '</h1>
                        <a href="' . $slider['link'] . '">
                            <span>Read More</span>
                            <img src="' . $slider['arrow_image'] . '" alt="Arrow">
                        </a>
                    </div>
                </div>
                <div class="col-md-4 ml-auto">
                    <div class="img-box">
                        <img src="' . $slider['image'] . '" alt="Slider Image">
                    </div>
                </div>
            </div>
        </div>
    </div>';
    }
}


function testimonialsDataSLider()
{
    $testimonialsData = [
        [
            'name'  => 'Gero Miliya',
            'text'  => 'long established fact that a reader will be distracted by the readable content of a page when looking at its layout. 
            The point of using Lorem Ipsum is that it haslong established fact that a reader will be distracted by the readable content of a page when looking at its layout.
             The point of using Lorem Ipsum is that it haslong established fact that a reader will be distracted by the readable content of a page when looking at its layout.
              The point of using Lorem Ipsum is that it has',
            'image' => './assets/images/client-img.jpg'
        ],
        [
            'name'  => 'John Doe',
            'text'  => 'long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
             The point of using Lorem Ipsum is that it haslong established fact that a reader will be distracted by the readable content of a page when looking at its layout. 
             The point of using Lorem Ipsum is that it haslong established fact that a reader will be distracted by the readable content of a page when looking at its layout. 
             The point of using Lorem Ipsum is that it has',
            'image' => './assets/images/client-img.jpg'
        ],
        [
            'name'  => 'Jane Smith',
            'text'  => 'long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
             The point of using Lorem Ipsum is that it haslong established fact that a reader will be distracted by the readable content of a page when looking at its layout. 
            The point of using Lorem Ipsum is that it haslong established fact that a reader will be distracted by the readable content of a page when looking at its layout. 
            The point of using Lorem Ipsum is that it has',
            'image' => './assets/images/client-img.jpg'
        ]
    ];

    foreach ($testimonialsData as $idx => $testimonial) {
        $activeClass = ($idx === 0) ? 'active' : '';
        echo '<div class="carousel-item ' . $activeClass . '">';
        echo '<div class="box">';
        echo '<div class="img-box">';
        echo '<img src="' . $testimonial['image'] . '" alt="' . $testimonial['name'] . '">';
        echo '</div>';
        echo '<div class="detail-box">';
        echo '<h4>' . $testimonial['name'] . '</h4>';
        echo '<p>' . $testimonial['text'] . '</p>';
        echo '<i class="fa fa-quote-left" aria-hidden="true"></i>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}


function checkForm()
{
    echo '<div class="checkout-left">
                    <h3>Contact Information</h3>
                    <textarea name="product_details" style="display: none;"><?php echo $product_details; ?></textarea>
<input type="email" name="email" placeholder="Email">
<div class="top">
    <h3>Shipping Address</h3>
</div>
<div class="name-fields">
    <input type="text" name="first_name" placeholder="First Name" required>
    <input type="text" name="last_name" placeholder="Last Name" required>
</div>
<input type="text" name="company" placeholder="Company (optional)">
<input type="text" name="address" placeholder="Address" required>
<input type="text" name="apartment" placeholder="Apartment, suite, etc. (optional)">
<input type="text" name="city" placeholder="City" required>

<div class="address-fields">
    <select name="country" required>
        <option value="United States">Pakistan</option>
        <option value="Germany">Germany</option>
        <option value="UK">United Kingdom</option>
        <option value="Canada">Canada</option>
    </select>
    <select name="state" required>
        <option value="State">Sindh</option>
        <option value="Berlinn">Berlin</option>
        <option value="London">London</option>
        <option value="Toronto">Toronto</option>
    </select>
    <input type="text" name="zip" placeholder="ZIP Code" required>
</div>
<input type="tel" name="phone" placeholder="Phone (optional)">
<div class="align">
    <button class="continue-btn" type="submit">Check in</button>
</div>

</div>';
}
function jqueryLink()
{
echo '
<script src="./assets/js/jquery-3.4.1.min.js"></script>
<script src="./assets/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>
<script src="./assets/js/custom.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
</script> ';
}
function headlink()
{
echo '

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
    <link href="./assets/css/responsive.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="./assets/images/af.png">
</head>';
}