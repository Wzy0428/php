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

  <title>WHat's Happening - Events</title>
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
    <section>
      <div class="container">
        <div class="row">

          <div class="col-md-9" data-aos="fade-up">
          <!-- The heading title is changed from "Category: BUSINESS" to "Category: ADD" -->
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
              //The SQL query selects data from the Events table along with additional information from the Groups and eventtypes tables by using inner joins based on their respective IDs
              $myquery = "SELECT events.*, groups.GroupName, groups.GroupImage, eventtypes.EventType 
                        FROM `Events`
                        INNER JOIN `Groups` ON events.GroupID = groups.GroupID
                        INNER JOIN eventtypes ON events.EventTypeID = eventtypes.EventTypeID
                        WHERE events.EventDate > NOW() 
                        ORDER BY events.EventDate ASC";
                        
              //Execute the query and store the result
              $result = $conn->query($myquery);
              
              //Check if the query execution was successful and loop through each row of the result
              if($result = $conn->query($myquery)){
                //Determine the category based on the $_GET parameter
                $Category_user = "";
                  if(empty($_GET["category"])) {
                    $Category_user = "all";
                  } else {
                    if( $_GET["category"] == "Art Culture"){
                      $Category_user = str_replace(" ","+", $_GET["category"]);
                    } else{
                      $Category_user = $_GET["category"];
                    }
                }
                
                echo <<<HEREDOCIDENTIFIER
                  <h3 class="category-title">Category: $Category_user</h3>
                HEREDOCIDENTIFIER;
                
                while($row = $result->fetch_assoc()){
                  $Number = $row['EventID'];
                  $Name = $row['GroupName'];
                  $Category = $row['EventType'];
                  $Date = date("d-M-y h:i A", strtotime($row['EventDate']));
                  $Event = $row['EventTitle'];
                  $Description = $row['EventDesc'];
                  $EventImage = $row['EventImage']; 
                  $GroupImage = $row['GroupImage'];
                
                //Check if the event category matches the category specified in the URL parameter ($_GET["category"]) or if the parameter is "all"
                //Output HTML code for displaying event details using HEREDOC syntax
                if($Category_user == $Category || $Category_user == "all"){
                  echo <<<HEREDOCIDENTIFIER
                    <div class="d-md-flex post-entry-2 half">
                      <a href="single-post.php?event=$Number" class="me-4 thumbnail">
                        <img src="$EventImage" alt=" " class="img-fluid">
                      </a>
                    <div>
                    <div class="post-meta">
                      <span class="date">$Category</span> <span class="mx-1">&bullet;</span> <span>$Date</span>
                    </div>
                      <h3><a href="single-post.php?event=$Number">$Event</a></h3>
                    <div class="d-flex align-items-center author">
                      <div class="photo">
                        <img src="$GroupImage" alt="" class="img-fluid">
                      </div>
                    <div class="name">
                      <h3 class="m-0 p-0">$Name</h3>
                    </div>
                    </div>
                  </div>
                </div>
              
HEREDOCIDENTIFIER;
                }
              }
            }else{
              echo "Nothing here to display! Sorry!";
            }
            // Close the database connection
            $conn->close();
            ?>
          
            <div class="text-start py-4">
              <div class="custom-pagination">
                <a href="#" class="prev">Prevous</a>
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#" class="next">Next</a>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <!-- ======= Sidebar ======= -->
            <div class="aside-block">
              <!-- The column of the side bar is changed to "Upcoming" and "Latest Added", and "Trending" column is deleted -->
              <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-upcoming-tab" data-bs-toggle="pill" data-bs-target="#pills-upcoming" type="button" role="tab" aria-controls="pills-upcoming" aria-selected="true">Upcoming</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-latest" type="button" role="tab" aria-controls="pills-latest" aria-selected="false">Latest Added</button>
                </li>
              </ul>

              <div class="tab-content" id="pills-tabContent">

            <!-- upcoming -->
          <div class="tab-pane fade show active" id="pills-upcoming" role="tabpanel" aria-labelledby="pills-upcoming-tab">
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
              // Fetch upcoming events 
                $upcoming_query = "SELECT events.EventID, events.EventTitle, events.EventDate, groups.GroupName, eventtypes.EventType FROM `Events` 
                  INNER JOIN `Groups` ON events.GroupID = groups.GroupID 
                  INNER JOIN `EventTypes` ON events.EventTypeID = eventtypes.EventTypeID 
                  WHERE events.EventDate > NOW() 
                  ORDER BY events.EventDate ASC";
                $upcoming_result = $conn->query($upcoming_query);
                
                if ($upcoming_result->num_rows > 0) {
                  // Output upcoming events
                  while ($row = $upcoming_result->fetch_assoc()) {
                    $event_title = $row['EventTitle'];
                    $event_date = date("d-M-Y", strtotime($row['EventDate']));
                    $group_name = $row['GroupName'];
                    $event_type = $row['EventType'];

                    echo <<<HEREDOCIDENTIFIER
                      <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">$event_type</span> <span class="mx-1">&bullet;</span> <span>$event_date</span></div>
                          <h2 class="mb-2"><a href="single-post.php?event={$row['EventID']}">$event_title</a></h2>
                          <span class="author mb-3 d-block">$group_name</span>
                        </div>
HEREDOCIDENTIFIER;
                  }
                } else {
                  echo "No upcoming events";
                }
                ?>
          </div>
                
            <!-- Latest -->
          <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
            <?php
              $latest_added_query = "SELECT events.EventID, events.EventTitle, events.SubmitDate, groups.GroupName, eventtypes.EventType FROM `Events` 
                  INNER JOIN `Groups` ON events.GroupID = groups.GroupID 
                  INNER JOIN `EventTypes` ON events.EventTypeID = eventtypes.EventTypeID 
                  ORDER BY events.SubmitDate DESC";
              $latest_added_result = $conn->query($latest_added_query);
                  
                if ($latest_added_result->num_rows > 0) {
                  // Output latest added events
                  while ($row = $latest_added_result->fetch_assoc()) {
                    $event_title = $row['EventTitle'];
                    $submit_date = date("d-M-Y", strtotime($row['SubmitDate']));
                    $group_name = $row['GroupName'];
                    $event_type = $row['EventType'];
                        
                  echo <<<HEREDOCIDENTIFIER
                      <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">$event_type</span> <span class="mx-1">&bullet;</span> <span>$submit_date</span></div>
                          <h2 class="mb-2"><a href="single-post.php?event={$row['EventID']}">$event_title</a></h2>
                          <span class="author mb-3 d-block">$group_name</span>
                        </div>
HEREDOCIDENTIFIER;
                  }
                } else {
                  echo "No upcoming events";
                }
                ?>
          </div> <!-- End Latest -->
        </div>
      </div>
            <!-- The video and image sections are removed on the side bar -->

            <!-- The "Categoties" heading is chnaged to "Events" and the following content names are modified -->
            <div class="aside-block">
              <h3 class="aside-title">Events</h3>
              <ul class="aside-links list-unstyled">
                <li><a href="events.php"><i class="bi bi-chevron-right"></i> All Events</a></li>
                <li><a href="events.php?category=Music"><i class="bi bi-chevron-right"></i> Music</a></li>
                <li><a href="events.php?category=Art+Culture"><i class="bi bi-chevron-right"></i> Art+Culture</a></li>
                <li><a href="events.php?category=Sports"><i class="bi bi-chevron-right"></i> Sports</a></li>
                <li><a href="events.php?category=Food"><i class="bi bi-chevron-right"></i> Food</a></li>
                <li><a href="events.php?category=Fund Raiser"><i class="bi bi-chevron-right"></i> Fund Raiser</a></li>
              </ul>
            </div><!-- End Categories -->
            <!-- The Tags contents are also modified to the same as in the Events section above -->
            <div class="aside-block">
              <h3 class="aside-title">Tags</h3>
              <ul class="aside-tags list-unstyled">
                <li><a href="events.php">All Events</a></li>
                <li><a href="events.php?category=Music">Music</a></li>
                <li><a href="events.php?category=Art+Culture">Art+Culture</a></li>
                <li><a href="events.php?category=Sports">Sports</a></li>
                <li><a href="events.php?category=Food">Food</a></li>
                <li><a href="events.php?category=Fund Raiser">Fund Raiser</a></li>
              </ul>
            </div><!-- End Tags -->

          </div>

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

        </div>
      </div>
    </div>

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