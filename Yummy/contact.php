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