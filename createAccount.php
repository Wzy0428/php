<!-- Session is used to keep track of which user is currently signed in-->
<!-- Get GroupID from session -->
<?php
  session_start();
    if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
      $GroupID = $_SESSION['GroupID']; 
    } 

  //Database connection parameters
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
  
  $errorMsg = "";
  //Check if the form is submitted via POST method
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $groupName = $_POST['name'];
    $groupType = $_POST['type'];
    $contactName = $_POST['contactName'];
    $contactEmail = $_POST['contactEmail'];
    $groupImage = "files/images/events/" . $_POST["image"];
    $description = $_POST['description'];
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $boolean = true;

    //Password must be at least 7 characters
    if (!preg_match('/^.{7,}$/', $password)) {
        $errorMsg .= "Error! Password needs at least 7 characters.<br>";
        $boolean = false;
    }

    //Password must contain at least 1 special characters 
    if (!preg_match('/[^a-zA-Z0-9]/', $password)) {
        $errorMsg .= "Error! Password needs 1 special character.<br>";
        $boolean = false;
    }

    //Password must contain at least one uppercase letter
    if (!preg_match('/[A-Z]/', $password)) {
        $errorMsg .= "Error! Password needs at least 1 Capital Letter.<br>";
        $boolean = false;
    }

    //Password must contain at least one number
    if (!preg_match('/[0-9]/', $password)) {
        $errorMsg .= "Error! Password needs at least 1 number.<br>";
        $boolean = false;
    }
    //If the password does not meet all of these rules – print all appropriate error message
    if ($boolean) {
      $errorMsg .= "Password Successful!<br>";
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  //Check if the username already exists
    $checkUsernameSQL = "SELECT COUNT(*) AS count FROM `Login` WHERE Username = ?";
    $checkUsernameStatement = $conn->prepare($checkUsernameSQL);
    $checkUsernameStatement->bind_param("s", $username);
    $checkUsernameStatement->execute();
    $checkUsernameResult = $checkUsernameStatement->get_result();
    $row = $checkUsernameResult->fetch_assoc();
    
  //If username already exists, display error message, otherwise, insert new group into Groups table and insert login information into Login table
  if($row['count'] > 0) {
    echo "Username already exists. Please try again.";
    exit();
  } else {
      $insertGroupSQL = "INSERT INTO `Groups` (GroupName, GroupImage, GroupType, GroupDesc, ContactName, ContactEmail) VALUES (?, ?, ?, ?, ?, ?)";
      $insertGroupStatement = $conn->prepare($insertGroupSQL);
      $insertGroupStatement->bind_param("ssssss", $groupName, $groupImage, $groupType, $description, $contactName, $contactEmail);
      $insertGroupStatement->execute();
        
    //Get the newly created GroupID using the function "mysqli_insert_id"
    $groupID = mysqli_insert_id($conn);

    $insertLoginSQL = "INSERT INTO `Login` (GroupID, Username, Password) VALUES (?, ?, ?)";
    $insertLoginStatement = $conn->prepare($insertLoginSQL);
    $insertLoginStatement->bind_param("iss", $groupID, $username, $hashed_password);
    $insertLoginStatement->execute();

    //Set login session variables
    $_SESSION['login'] = true;
    $_SESSION['AccountID'] = mysqli_insert_id($conn); 
    $_SESSION['GroupID'] = $groupID;
    $_SESSION['GroupName'] = $groupName;
    
    //Redirect to post.php after successful sign-up
    header("Location: post.php");
    exit();
    } 
  }
  }
  //Close the database connection
  $conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>What's Happening - createAccount</title>
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
    <section id="contact" class="contact mb-5">
      <div class="container" data-aos="fade-up">
        <!-- The title is changed from "Contact us" to "Login" -->
        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <h1 class="page-title">Post New Event</h1>
          </div>
        </div>
        <!-- The top rows(address, phone number and email) are removed -->
        <!--Use POST to get the information from the form, then update the file using this form data-->
        <!--The page is adapted from the post.php which the form requires the new user to input a group name, a group type, a description, a filename to use as their group image, a contact name and contact email. -->
        <div class="form mt-5">
          <form action="createAccount.php" method="POST" role="form" class="php-email-form">
            <div class="row">
              <p><b>Tell us about your group:</b></p>
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Community Group" required>
              </div>
              <div class="form-group">
              <input type="text" class="form-control" name="type" id="type" placeholder="What type of group are you?" required>
            </div>
              <div class="form-group">
                <input type="text" class="form-control" name="contactName" id="contactName" placeholder="Provide a Contact Name for your group" required>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="contactEmail" id="contactEmail" placeholder="Provide a Contact Email for your group" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="image" id="image" placeholder="Group Image Name" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="description" id="description" rows="2" placeholder="Tell us about your group" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <!-- Login Information -->
            <!-- Two more form inputs are implemented for new user to create an account -->
            <p><b>Create an Account:</b></p>
            <div class="form-group">
              <input type="text" class="form-control" name="username" id="username" placeholder="Create a Username" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password" id="password" placeholder="Create a Password" required>
            </div>
            <!-- The button name is changed from "Send Message" to "Login" -->
            <div class="text-center"><button type="submit">Submit</button></div>
            <div align="center">
              <?php echo $errorMsg; ?>
            </div>
          </form>
        </div><!-- End Contact Form -->
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