<header class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <?php echo '<a class="navbar-brand" href="index.php">ChocoLux</a>'; ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <?php echo '<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>'; ?>
                    </li>
                    <li class="nav-item">
                        <?php echo '<a class="nav-link" href="about.php">About</a>'; ?>
                    </li>
                    <li class="nav-item">
                        <?php echo '<a class="nav-link" href="chocolate.php">Chocolates</a>'; ?>
                    </li>
                    <li class="nav-item">
                        <?php echo '<a class="nav-link" href="testimonial.php">Testimonial</a>'; ?>
                    </li>
                    <li class="nav-item">
                        <?php echo '<a class="nav-link" href="contact.php">Contact Us</a>'; ?>
                    </li>
                </ul>
                <div class="quote_btn-container">
                    <form class="form-inline">
                        <button class="btn my-2 my-sm-0 nav_search-btn" type="button">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                        <div class="search-box" style="display:none;">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search here" aria-label="Search">
                        </div>
                    </form>
                    <a href="#">
                        <?php echo '<i class="fa fa-user" aria-hidden="true"></i>'; ?>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>