<?php
include('./inc/functions.php');
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

        <div class="hero_area">
            <section class="slider_section">
                <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        testimonialSlider()
                        ?>
                    </div>
                </div>
                <div class="carousel_btn-box">
                    <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </section>
        </div>

        <section class="about_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="detail-box">
                            <div class="heading_container">
                                <h2>About Our Company</h2>
                            </div>
                            <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web pagend web page editors now use Lorem Ipsum as their default model text,</p>
                            <a href="#">
                                <span>Read More</span>
                                <img src="./assets/images/color-arrow.png">
                            </a>

                        </div>
                    </div>
                    <div class=" col-md-6">
                        <div class="img-box">
                            <img src="./assets/images/about-img.png">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="chocolate_section layout_padding" id="chocolate_section">
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

        <section class="offer_section layout_padding">
            <div class="container">
                <div class="box">
                    <div class="detail-box">
                        <h2>Offers on chocolates</h2>
                        <h3>Get 5% Offer <br> any Chocolate items</h3>
                        <a href="#">Buy Now</a>

                    </div>
                    <div class="img-box">
                        <img src="./assets/images/offer-img.png">

                    </div>
                </div>
                <div class="btn-box">
                    <a href="#">
                        <span>See More</span>
                        <img src="./assets/images/color-arrow.png">
                    </a>

                </div>
            </div>
        </section>

        <section class="client_section layout_padding">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 ml-auto">
                        <div class="img-box sub_img-box">
                            <img src="./assets/images/client-chocolate.png" alt="Client Chocolate">
                        </div>
                    </div>
                    <div class="col-lg-6 px-0">
                        <div class="client_container">
                            <div class="heading_container">
                                <h2>Testimonial</h2>
                            </div>
                            <div id="customCarousel2" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php
                                    testimonialsDataSLider()
                                    ?>
                                </div>
                                <div class="carousel_btn-box">
                                    <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
                                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact_section layout_padding">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5 col-lg-4 offset-md-1 offset-lg-2">
                        <div class="form_container">
                            <div class="heading_container">
                                <h2>Contact Us</h2>
                            </div>
                            <form action="">
                                <div>
                                    <input type="text" placeholder="Full Name" />
                                </div>
                                <div>
                                    <input type="text" placeholder="Phone number" />
                                </div>
                                <div>
                                    <input type="email" placeholder="Email" />
                                </div>
                                <div>
                                    <input type="text" class="message-box" placeholder="Message" />
                                </div>
                                <div class="d-flex">
                                    <button type="submit">SEND NOW</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 px-0">
                        <div class="map_container">
                            <div class="map">
                                <div id="googleMap" style="width:100%;height:400px;"></div>'
                            </div>
                        </div>
                    </div>
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