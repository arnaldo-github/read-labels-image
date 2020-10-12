<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Devs Social</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Social Devs</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">All posts</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Create Post</a>
          </li>
         

        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      <!-- Masthead Avatar Image -->
      <img class="masthead-avatar mb-5" src="img/avataaars.svg" alt="">

      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">Social Devs</h1>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Masthead Subheading -->
      <form action="search.php" method="post">
      <div class="md-form mt-0">
        <input class="form-control" type="text" name="search" placeholder="Search" aria-label="Search">
      </div>
      </form>

    </div>
  </header>

  <!-- Portfolio Section -->


  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">

      <!-- Contact Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Create post</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Contact Section Form -->
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <form id="contactForm" action="posts.php" method="POST" enctype="multipart/form-data">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>User name</label>
                <input class="form-control" id="name" name="username" type="text" placeholder="User Name" required="required" data-validation-required-message="Please enter your user name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>

            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Description</label>
                <textarea class="form-control" name="description" id="message" rows="5" placeholder="Description" required="required" data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
              </div>
              <div class="custom-file">
                <input type="file" accept=".png, .jpeg, .jpg" class="custom-file-input" name="file" id="file" aria-describedby="inputGroupFileAddon01" required="required" data-validation-required-message="Please upload a file">
                <p class="help-block text-danger"></p>
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl">Post</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>

  <section class="page-section portfolio" id="portfolio">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">All Posts</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Portfolio Grid Items -->
      <div class="row">
        <?php
        include("connection.php");

        $sql = "SELECT * FROM posts";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo ('
              <div class="col-md-6 col-lg-4">
                <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal' .  $row["id"] . '">
                  <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                    <div class="portfolio-item-caption-content text-center text-white">
                      <i class="fas fa-plus fa-3x"></i>
                    </div>
                  </div>
                  <img class="img-fluid" src="' . $row["image_path"] . '" alt="">
                </div>
              </div>
            ');
          }
        } else {
          echo "<h4> 0 Posts </h4>";
        }
        $conn->close();
        
        ?>

      </div>
      <!-- /.row -->

    </div>
  </section>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">

        <!-- Footer Location -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Location</h4>
          <p class="lead mb-0">Maputo
            <br>Standard Bank incubator</p>
        </div>

        <!-- Footer Social Icons -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Around the Web</h4>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-facebook-f"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-twitter"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-linkedin-in"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-dribbble"></i>
          </a>
        </div>

        <!-- Footer About Text -->
        <div class="col-lg-4">
          <h4 class="text-uppercase mb-4">About The author</h4>
          <p class="lead mb-0">Don't let yourself be defined - cheap quote from the Internt
          </p>
        </div>

      </div>
    </div>
  </footer>

  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; Your Website 2019</small>
    </div>
  </section>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <!-- Portfolio Modals -->

  <?php
  include("connection.php");

  $sql = "SELECT * FROM posts";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo ('
            <div class="portfolio-modal modal fade" id="portfolioModal' . $row["id"] . '" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">
                    <i class="fas fa-times"></i>
                  </span>
                </button>
                <div class="modal-body text-center">
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-lg-8">
                        <!-- Portfolio Modal - Title -->
                        <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">' . $row["username"] . '</h2>
                        <!-- Icon Divider -->
                        <div class="divider-custom">
                          <div class="divider-custom-line"></div>
                          <div class="divider-custom-icon">
                            <i class="fas fa-star"></i>
                          </div>
                          <div class="divider-custom-line"></div>
                        </div>
                        <!-- Portfolio Modal - Image -->
                        <img class="img-fluid rounded mb-5" src="' . $row["image_path"] . '" alt="">
                        <!-- Portfolio Modal - Text -->
                        <p class="mb-5">' . $row["labels"] . '</p>
                        <button class="btn btn-primary" href="#" data-dismiss="modal">
                          <i class="fas fa-times fa-fw"></i>
                          Close Window
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            ');
    }
  } else {
    echo "<h4> 0 results </h4>";
  }
  $conn->close();
  ?>



  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>

</body>

</html>