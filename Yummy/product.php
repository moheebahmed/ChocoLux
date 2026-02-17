<?php
session_start();
include('./inc/functions.php');

$product = getProductDetails();
$slider_images = getSilderDetails();

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


    <section class="chocolate_section layout_padding">
      <div class="container">
        <div class="heading_container">
          <h2>Product Details</h2>
          <p>Check out the details of your selected chocolate product.</p>
        </div>
      </div>
      <div class="container">
        <div class="product-detail">

          <div class="img-box">
            <img id="mainProductImage"
              src="<?php echo $product['img']; ?>"
              alt="<?php echo $product['name']; ?>"
              class="main-product-img">

            <div class="simple-product-slider">
              <?php

              echo '<div>
                  <img src="' . htmlspecialchars($product['img']) . '"
                       onclick="changeMainImage(\'' . htmlspecialchars($product['img']) . '\')"
                       alt="thumbnail">
                </div>';

              foreach ($slider_images as $index => $image) {
                echo '<div>
                    <img src="' . htmlspecialchars($image) . '"
                         onclick="changeMainImage(\'' . htmlspecialchars($image) . '\')"
                         alt="thumbnail">
                  </div>';
              }
              ?>
            </div>
          </div>
          <div class="detail-box">
            <h6><?php echo $product['name']; ?></h6>
            <p><?php echo $product['description']; ?></p>
            <div class="rating">
              <?php
              for ($i = 1; $i <= 5; $i++) {
                echo ($i <= $product['rating']) ?
                  '<i class="fas fa-star"></i>'  :
                  '<i class="far fa-star"></i>';
              }
              ?>
            </div>

            <h5>$<?php echo $product['price']; ?></h5>

            <form action="cart_save.php" method="POST">
              <div class="quantity">
                <input type="number" name="quantity" min="1" value="1">
              </div>

              <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
              <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
              <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
              <input type="hidden" name="img" value="<?php echo $product['img']; ?>">
              <button type="submit" class="btn">Add to Cart</button>
              <a href="#" class="btn">Buy Now</a>
            </form>
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
    function changeMainImage(newSrc) {
      $('#mainProductImage').fadeOut(200, function() {
        $(this).attr('src', newSrc).fadeIn(200);
      });
    }

    $(document).ready(function() {
      $('.simple-product-slider').slick({
        infinite: true,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        centerMode: true,
        centerPadding: '0',
        focusOnSelect: true,
        arrows: false,
        dots: true,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [{
            breakpoint: 768,
            settings: {
              slidesToShow: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1
            }
          }
        ]
      });
    });
  </script>

</body>

</html>