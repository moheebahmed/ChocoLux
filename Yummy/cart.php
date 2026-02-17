<?php
session_start();
include('./inc/functions.php');
$conn = db_connection();
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
        <div class="main_shopping_view">
            <h1>Shopping Cart</h1>

            <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                <table>
                    <thead>
                        <tr>
                            <th style="color:#007bff;">Products</th>
                            <th style="color: #28a745;">Price $</th>
                            <th style="color:#17a2b8;">Quantity</th>
                            <th style="color: #ffc107;">Subtotal $</th>
                            <th style="color:red">Remove</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        totalItem();
                        ?>
                    </tbody>
                </table>

                <div class="flex_front">
                    <div class="one_front">
                        <a href="clear_cart.php" class="clear">Clear Cart</a>
                    </div>
                    <div class="two_front">
                        <h3>Total: <?php echo $total; ?>$</h3>
                        <a href="check_out.php" class="check">Check out</a>
                        <a href="./admin/product_table.php" class="clear">Back to Table</a>
                    </div>
                </div>

            <?php else: ?>
                <div class="empty_cart_message">
                    <p style="text-align:center; color: red; font-size: 20px;">
                        Your cart is empty.
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <?php
        footer();
        ?>
    </div>
</body>

</html>