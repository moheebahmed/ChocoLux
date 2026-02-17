<?php include('./inc/functions.php'); ?>

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
        <section class="chocolate_section layout_padding">
            <div class="container">
                <div class="heading_container">
                    <h2>Our Chocolate Products</h2>
                    <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their placeholder text.</p>
                </div>
            </div>
            <div class="container">
                <div class="chocolate_container">
                    <?php

                    $conn = db_connection();

                    $query = "SELECT * FROM products";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <div class="box">
                                <div class="img-box">
                                    <img src="<?= $row['product_img']; ?>">
                                </div>
                                <div class="detail-box">
                                    <h6><?= $row['product_name']; ?></h6>
                                    <h5>$<?php echo $row['price']; ?></h5>
                                    <a href="product.php?id=<?php echo $row['id']; ?>" class=" btn">Buy Now</a>

                                </div>
                            </div>
                    <?php
                        }
                    }
                    $conn->close();
                    ?>
                </div>
            </div>
        </section>
        <?php
        footer();
        ?>
    </div>


    <?php
    jqueryLink();
    ?>
    <script>
        $(document).ready(function() {
            $(".nav_search-btn").click(function(e) {
                e.preventDefault();
                $(".search-box").toggle("fast");
            });
        });
    </script>

</body>

</html>