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

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>What's Happening - Groups</title>
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
  <!-- The file extensions are changed from html to php, such as "contact.html" to "login.php" etc -->
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
          <li><a href="events.php?category=Fund+Raiser">Fund Raiser</a></li>
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
    
    <!-- The contents above the original heading "Our Team" are removed -->
    <section>
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <div class="row justify-content-center">
              <div class="col-lg-6">
              <!-- The heading is changed from "Our Team" to "Our Community Groups" -->
                <h2 class="display-4">Our Community Groups</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil sint sed, fugit distinctio ad eius itaque deserunt doloribus harum excepturi laudantium sit officiis et eaque blanditiis. Dolore natus excepturi recusandae.</p>
              </div>
            </div>
          </div>
      
      <?php
        //Database connection parameters as requested 
        $db_hostname = '127.0.0.1';
        $db_username = 'root';
        $db_password = 'root';
        $db_database = 'whats_happening';
        
        //Establish a connection to the database "whats_happening"
        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        
        //Check if the connection is successful. if not, terminate with an error message
        if($conn->connect_error){
          die("Connection failed!" . $conn->connect_error);
        }
        
        //SQL query to select all columns from the "Groups" table in the database
        $myquery = "SELECT * FROM `Groups`";
        //Execute the query and store the result
        $result = $conn->query($myquery);
        
        //Check if the query execution was successful and loop through each row of the result
        if($result = $conn->query($myquery)){
          while($row = $result->fetch_assoc()){
            $Name = $row['GroupName'];
            $Type = $row['GroupType'];
            $Description = $row['GroupDesc'];
            $Image = $row['GroupImage'];
          
        //Output context for each group using HEREDOC syntax
        echo <<<HEREDOCIDENTIFIER
        <div class="col-lg-4 text-center mb-5">
            <img src="$Image" alt="" class="img-fluid rounded-circle w-50 mb-4">
            <h4>$Name</h4>
            <span class="d-block mb-3 text-uppercase">$Type</span>
            <p>$Description</p>
        </div>
        
HEREDOCIDENTIFIER;
          }  //If there are no rows in the result, display a message
        }else{
          echo "Nothing here to display! Sorry!";
        }
        //Close the database connection
        $conn->close();
      ?>
    </div>
  </div>
</section>
          

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">

        <div class="row g-5">
          <div class="col-lg-4">
          <!-- The footer title is changed from "About ZenBlog" to "About What's happening" -->
            <h3 class="footer-heading">About What's Happening</h3>
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
              <li><a href="about.php"><i class="bi bi-chevron-right"></i> About </a></li>
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