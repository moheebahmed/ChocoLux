<?php
session_start();
include('./inc/functions.php');
$cart = $_SESSION['cart'];
$product_details = json_encode($cart);
$total = 0;
$total_quantity = 0;

// print_r($cart);

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
        <div class="checkout-container">
            <form action="checkout_save.php" method="POST">
                <?php checkForm(); ?>
                <div class="checkout-right">
                    <table>
                        <tbody>
                            <?php
                            totalCheckItem($cart);
                            ?>
                            <tr class="side">
                                <th style="color: green;">Subtotal</th>
                                <td><?php echo $total; ?>$</td>
                            </tr>
                            <tr class="side">
                                <th style="color: green;">Shipping</th>
                                <td>Calculated at next step</td>
                            </tr>
                            <tr class="side">
                                <th style="color: green;">Total</th>
                                <td>USD <?php echo $total; ?>$</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <input type="hidden" name="total" value="<?php echo $total; ?>">
            </form>
        </div>
        <?php
        footer();
        ?>
    </div>
    <?php
    jqueryLink();
    ?>

</body>

</html>