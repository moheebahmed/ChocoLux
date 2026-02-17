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


        <?php
        footer();
        ?>
    </div>
    <?php
    jqueryLink()
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