<!-- Session is used to keep track of which user is currently signed in-->
<!-- Get GroupID from session -->
<?php
  session_start();
    if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
      $GroupID = $_SESSION['GroupID']; 
    } 
?>
<!DOCTYPE html>
<html lang="en">
 <!-- Unchanged section -->
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>What's Happening - About</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="assets/css/variables.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: ZenBlog
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Author: BootstrapMade.com
  * License: https:///bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <!-- The title of the webpage is changed from "ZenBlog" to "What's Happening"-->
        <h1>What's Happening</h1>  
      </a>
      <!-- The file extensions are changed from html to php, such as "about.html" to "about.php" etc -->
      <nav id="navbar" class="navbar">
        <ul> 
          <li><a href="index.php">Home</a></li> <!-- The title along the nav bar is changed from "Blog" to "Home"-->
          <!-- The code for title "single-post" is removed"-->
          <!-- The title along the nav bar is changed from "Categories" to "Event"-->
          <li class="dropdown"><a href="events.php"><span>Events</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a> 
            <ul> <!-- The dropdown list is updated -->
            <!-- The drop-down items are changed in order to direct to the specific category when selected-->
              <li><a href="events.php">All Events</a></li>
              <li><a href="events.php?category=Music">Music</a></li>
              <li class="dropdown"><a href="events.php?category=Art+Culture"><span>Art+Culture</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="events.php?category=Sports">Sports</a></li>
              <li><a href="events.php?category=Food">Food</a></li>
              <li><a href="events.php?category=Fund Raiser">Fund Raiser</a></li>
            </ul>
          </li>
          <li><a href="groups.php">Community Groups</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="post.php">Post Event</a></li>
          <li class="dropdown"><a href="login.php"><span>Login</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="login.php">Login</a></li>
              <li><a href="login.php?logout=true">Logout</a></li>
            </ul>
          </li>
        </ul>
      </nav><!-- .navbar -->

      <div class="position-relative">
        <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
        <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
        <a href="#" class="mx-2"><span class="bi-instagram"></span></a>

        <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form action="search-result.html" class="search-form">
            <span class="icon bi-search"></span>
            <input type="text" placeholder="Search" class="form-control">
            <button class="btn js-search-close"><span class="bi-x"></span></button>
          </form>
        </div><!-- End Search Form -->

      </div>

    </div>

  </header><!-- End Header -->

  <main id="main">
    <section>
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <h1 class="page-title">About us</h1>
          </div>
        </div>

        <div class="row mb-5">

          <div class="d-md-flex post-entry-2 half">
            <a href="#" class="me-4 thumbnail">
              <img src="assets/img/post-landscape-2.jpg" alt="" class="img-fluid">
            </a>
            <div class="ps-md-5 mt-4 mt-md-0">
              <div class="post-meta mt-4">About us</div>
              <h2 class="mb-4 display-4">Company History</h2>

              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, perspiciatis repellat maxime, adipisci non ipsam at itaque rerum vitae, necessitatibus nulla animi expedita cumque provident inventore? Voluptatum in tempora earum deleniti, culpa odit veniam, ea reiciendis sunt ullam temporibus aut!</p>
              <p>Fugit eaque illum blanditiis, quo exercitationem maiores autem laudantium unde excepturi dolores quasi eos vero harum ipsa quam laborum illo aut facere voluptates aliquam adipisci sapiente beatae ullam. Tempora culpa iusto illum accusantium cum hic quisquam dolor placeat officiis eligendi.</p>
            </div>
          </div>

          <div class="d-md-flex post-entry-2 half mt-5">
            <a href="#" class="me-4 thumbnail order-2">
              <img src="assets/img/post-landscape-1.jpg" alt="" class="img-fluid">
            </a>
            <div class="pe-md-5 mt-4 mt-md-0">
              <div class="post-meta mt-4">Mission &amp; Vision</div>
              <h2 class="mb-4 display-4">Mission &amp; Vision</h2>

              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, perspiciatis repellat maxime, adipisci non ipsam at itaque rerum vitae, necessitatibus nulla animi expedita cumque provident inventore? Voluptatum in tempora earum deleniti, culpa odit veniam, ea reiciendis sunt ullam temporibus aut!</p>
              <p>Fugit eaque illum blanditiis, quo exercitationem maiores autem laudantium unde excepturi dolores quasi eos vero harum ipsa quam laborum illo aut facere voluptates aliquam adipisci sapiente beatae ullam. Tempora culpa iusto illum accusantium cum hic quisquam dolor placeat officiis eligendi.</p>
            </div>
          </div>

        </div>

      </div>
    </section>

    <section class="mb-5 bg-light py-5">
      <div class="container" data-aos="fade-up">
        <div class="row justify-content-between align-items-lg-center">
          <div class="col-lg-5 mb-4 mb-lg-0">
            <h2 class="display-4 mb-4">Latest News</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, rem eaque vel est asperiores iste pariatur placeat molestias, rerum provident ea maiores debitis eum earum esse quas architecto! Minima, voluptatum! Minus tempora distinctio quo sint est blanditiis voluptate eos. Commodi dolore nesciunt culpa adipisci nemo expedita suscipit autem dolorum rerum?</p>
            <p>At magni dolore ullam odio sapiente ipsam, numquam eius minus animi inventore alias quam fugit corrupti error iste laboriosam dolorum culpa doloremque eligendi repellat iusto vel impedit odit cum. Sequi atque molestias nesciunt rem eum pariatur quibusdam deleniti saepe eius maiores porro quam, praesentium ipsa deserunt laboriosam adipisci. Optio, animi!</p>
            <p><a href="#" class="more">View All Blog Posts</a></p>
          </div>
          <div class="col-lg-6">
            <div class="row">
              <div class="col-6">
                <img src="assets/img/post-portrait-3.jpg" alt="" class="img-fluid mb-4">
              </div>
              <div class="col-6 mt-4">
                <img src="assets/img/post-portrait-4.jpg" alt="" class="img-fluid mb-4">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- The contents under Latest News are deleted till the bottom footere section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">

        <div class="row g-5">
          <div class="col-lg-4">
            <!-- The footer title is changed from "About ZenBlog" to "About What's happening" -->
            <h3 class="footer-heading">About What's happening</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ab, perspiciatis beatae autem deleniti voluptate nulla a dolores, exercitationem eveniet libero laudantium recusandae officiis qui aliquid blanditiis omnis quae. Explicabo?</p>
            <p><a href="about.php" class="footer-link-more">Learn More</a></p>
          </div>
          <!-- The content under Navigation section is modified -->
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">Navigation</h3>
            <ul class="footer-links list-unstyled">
              <li><a href="index.php"><i class="bi bi-chevron-right"></i> Home</a></li>
              <li><a href="events.php"><i class="bi bi-chevron-right"></i> Events</a></li>
              <li><a href="groups.php"><i class="bi bi-chevron-right"></i> Community groups</a></li>
              <li><a href="about.php"><i class="bi bi-chevron-right"></i> About</a></li>
              <li><a href="post.php"><i class="bi bi-chevron-right"></i> Post Event</a></li>
              <li><a href="login.php"><i class="bi bi-chevron-right"></i> Login</a></li>
            </ul>
          </div>
          <div class="col-6 col-lg-2">
            <!-- The title is changed from "Categories" to "Events" -->
            <!-- The content under Events section is modified -->
            <!-- The drop-down items are changed in order to direct to the specific category when selected-->
            <h3 class="footer-heading">Events</h3>
            <ul class="footer-links list-unstyled">
              <li><a href="events.php"><i class="bi bi-chevron-right"></i> 
              All Events </a></li>
              <li><a href="events.php?category=Music"><i class="bi bi-chevron-right"></i> Music</a></li>
              <li><a href="events.php?category=Art+Culture"><i class="bi bi-chevron-right"></i> 
              Art+Culture </a></li>
              <li><a href="events.php?category=Sports"><i class="bi bi-chevron-right"></i> Sports</a></li>
              <li><a href="events.php?category=Food"><i class="bi bi-chevron-right"></i> Food</a></li>
              <li><a href="events.php?category=Fund Raiser"><i class="bi bi-chevron-right"></i> Fund Raiser</a></li>
    
            </ul>
          </div>
          <!-- The content of “Recent Posts is removed” -->
        </div>
      </div>
    </div>
    <!-- The footer is not changed due to copyright purpose -->
    <div class="footer-legal">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
            <div class="copyright">
              © Copyright <strong><span>ZenBlog</span></strong>. All Rights Reserved
            </div>

            <div class="credits">
              <!-- All the links in the footer should remain intact. -->
              <!-- You can delete the links only if you purchased the pro version. -->
              <!-- Licensing information: https://bootstrapmade.com/license/ -->
              <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>

          </div>

          <div class="col-md-6">
            <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

        </div>

      </div>
    </div>

  </footer>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>