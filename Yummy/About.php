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
        <section class="about_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="detail-box">
                            <div class="heading_container">
                                <h2>About Our Company</h2>
                            </div>
                            <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here,
                                making it look like readable English. Many desktop publishing packages and web pagend web page editors now use Lorem Ipsum as their default model text,</p>
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