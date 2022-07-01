<?php
session_start();
error_reporting(0);
$availablegen=$notavailablegen=$availableaud=$notavailableaud=$availablerpd=$notavailablerpd=$availablefnl=$notavailablefnl=$getgen="";
$getaud=$getrpd=$getfnl="";
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
// Include config file
require_once "../connect.php";

// Define variables and initialize with empty values
if (isset($_POST['general'])){
$quesnogen = $question = "";
$quesno_err = "";
$_SESSION['tblname']="general";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["quesnogen"]))){
        $quesno_err = "Please enter Question Number.";
    } else{
        $_SESSION['quenogen']=$quesnogen = trim($_POST["quesnogen"]);
    }

    // Validate credentials
    if(empty($quesno_err)){
        // Prepare a select statement
        $sql = "SELECT * FROM general WHERE Question_no = $quesnogen";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       $_SESSION['genqn']= $row["Question"];

     $_SESSION['genans']= $row["Answer"];
    }
    $availablegen ='Question Verified.';
    $getgen='<a href="general.php">Get Question</a>';
    //header("location: home.php#work-section");
} else {
    $notavailablegen = "No result Found";
//header("location: home.php#work-section");
}

}
}

}elseif (isset($_POST['audiovis'])){
$quesnogen = $question = "";
$quesno_err = "";
$_SESSION['tblname']="audiovisual";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["quesnoaud"]))){
        $quesno_err = "Please enter Question Number.";
    } else{
        $_SESSION['quenoaud']=$quesnogen = trim($_POST["quesnoaud"]);
    }

    // Validate credentials
    if(empty($quesno_err)){
        // Prepare a select statement
        $sql = "SELECT * FROM audiovisual WHERE Question_no = $quesnogen";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       $_SESSION['audqn']= $row["Question"];

     $_SESSION['audans']= $row["Answer"];
    }
    $availableaud ='Question Verified.';
    $getaud='<a href="retaudvis.php">Get Question</a>';
} else {
    $notavailableaud = "No result Found";
}

}
}

}elseif (isset($_POST['rapidfire'])){
$quesnogen = $question = "";
$quesno_err = "";
$_SESSION['tblname']="rapidfire";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["quesnorpd"]))){
        $quesno_err = "Please enter Question Number.";
    } else{
        $_SESSION['quenorpd']=$quesnogen = trim($_POST["quesnorpd"]);
    }

    // Validate credentials
    if(empty($quesno_err)){
        // Prepare a select statement
        $sql = "SELECT * FROM rapidfire WHERE Set_no = $quesnogen";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0 ) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    }
    $availablerpd ='Question Verified.';
    $getrpd='<a href="rapidfire.php">Get Question</a>';
} else {
    $notavailablerpd = "No result Found";
}

}
}
}elseif (isset($_POST['final'])){
$quesnogen = $question = "";
$quesno_err = "";
$_SESSION['tblname']="final";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["quesnofnl"]))){
        $quesno_err = "Please enter Question Number.";
    } else{
        $_SESSION['quenofnl']=$quesnogen = trim($_POST["quesnofnl"]);
    }

    // Validate credentials
    if(empty($quesno_err)){
        // Prepare a select statement
        $sql = "SELECT * FROM final WHERE Question_no = $quesnogen";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       $_SESSION['finqn']= $row["Question"];

     $_SESSION['finans']= $row["Answer"];
    }
    $availablefnl ='Question Verified.';
    $getfnl='<a href="final.php">Get Question</a>';
} else {
    $notavailablefnl = "No result Found";
}

}
}

}




}else{
  header("location: ../index.php");
  die();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>e-Quiz</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- External CSS link-->
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="extra/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="retrive_css/bootstrap.min.css">

<!-- External Javascript link-->
    <script src="extra/jquery.min.js"></script>
    <script src="extra/popper.min.js"></script>
    <script src="extra/bootstrap.min.js"></script> 
      <script src="retrive_css/jquery.min.js"></script>
  <script src="retrive_css/popper.min.js"></script>
  <script src="retrive_css/bootstrap.min.js"></script>
  </head>
  <body>



  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo"><a href="home.php" class="text-uppercase"><img src="images/logo1.png" height="50" width="100"></a></div>
          <div>
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-xl-block">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li><a href="#work-section" class="nav-link">General Round</a></li>
                <li><a href="#process-section" class="nav-link">Audio-Visual Round</a></li>
                <li><a href="#testimonials-section" class="nav-link">Rapidfire Round</a></li>
              </ul>
            </nav>
          </div>
          <div class="ml-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-xl-block">
                <li><a href="#services-section" class="nav-link">Final Round</a></li>
                <li class="cta"><a href="../logout.php" class="nav-link"><span class="border bg-danger rounded text-white border-danger">Logout</span></a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-xl-none site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
    
    </header>

    <div class="intro-section custom-owl-carousel" id="home-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 mr-auto" data-aos="fade-up">

            <div class="owl-carousel slide-one-item-alt-text">
              <div class="slide-text">
                <h1>B&D Stationery</h1>
                <p class="mb-5"></p>
              </div>
              <div class="slide-text">
                <h1>Arniko International Secondary School And College</h1>
                <p class="mb-5"></p>
              </div>
              <div class="slide-text">
                <h1>Science And Techno Club</h1>
                <p class="mb-5"></p>
              </div>
              <div class="slide-text">
                <h1>B&B Inventors</h1>
                <p class="mb-5"></p>
              </div>
            </div>

          </div>
          <div class="col-lg-6 ml-auto"  data-aos="fade-up" data-aos-delay="100">
                        
            <div class="owl-carousel slide-one-item-alt">
              <img src="images/img_1.jpg" alt="Image" class="img-fluid">
              <img src="images/arn.jpg" alt="Image" class="img-fluid">
              <img src="images/club.jpg" alt="Image" class="img-fluid">
              <img src="images/2.jpg" alt="Image" class="img-fluid">
            </div>

            <div class="owl-custom-direction">
              <a href="#" class="custom-prev"><span class="icon-keyboard_arrow_left"></span></a>
              <a href="#" class="custom-next"><span class="icon-keyboard_arrow_right"></span></a>
            </div>

          </div>
        </div>
      </div>
    </div>


    <div class="site-section section-1">
      
    
      <div class="container">
        <div class="row">
          <div class="col-lg-5 mr-auto mb-5"  data-aos="fade-up">

            <div class="mb-5">
              <h2 class="section-title">e-Quiz</h2>
              <p>e-Quiz is one of the event being held at Arniko Int'll S.S and College held by Science And Techno Culb.</p>
              <p class="mb-5">You are warmly welcomed here to participate in this event.<b> The main motto of this event is to connect information technoloy(IT) with education. </b></p>
              <ul class="ul-check list-unstyled success">
                <li>Questions Based on G.K, I.Q, Mathematics and Current Affairs are asked</li>
                <li>Semi Computer Based Test (CBT)</li>
                <li>Let's Entertain and learn...</li>
              </ul>
            </div>
          </div>

          <div class="col-lg-6"  data-aos="fade-up" data-aos-delay="100">
            <div class="image-absolute-box">
              <div class="box">
                <div class="icon-wrap"><span class="flaticon-vector"></span></div>
                <h3>SCIECNE AND TECHNO FESTIVAL 2020</h3>
                <p>CONNECTING IT WITH EDUCATION IS OUR GOAL.</p>
                <p class="mb-0"><a href="http:\\www.arniko.edu.np" class="text-danger">About College</a></p>
              </div>
              <img src="images/logo.jpg" alt="Image" class="img-fluid" height="100" width="300">
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="container section-counter">
      <div class="row">
        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="">
          <div class="counter d-flex align-items-start mb-5">
            <div class="icon-wrap"><span class="flaticon-reload text-primary"></span></div>

            <div class="counter-text">
              <strong class="number" data-number="20">0</strong>
              <span>E-Quiz</span>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
          <div class="counter d-flex align-items-start">
            <div class="icon-wrap"><span class="flaticon-download text-primary"></span></div>
            <div class="counter-text">
              <strong class="number" data-number="25">0</strong>
              <span>Project Exhibition </span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
          <div class="counter d-flex align-items-start mb-5">
            <div class="icon-wrap"><span class="flaticon-monitor text-primary"></span></div>
            <div class="counter-text">
              <strong class="number" data-number="40">0</strong>
              <span>Chess</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
          <div class="counter d-flex align-items-start">
            <div class="icon-wrap"><span class="flaticon-chat text-primary"></span></div>
            <div class="counter-text">
              <strong class="number" data-number="100">0</strong>
              <span>Pubg Mobile</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section section-2" id="work-section" data-aos="fade">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5">
            <h2 class="section-title">General Round</h2>
              <form action="" method="POST">
                <div class="form-group">
                  <label for="email">Question Number</label>
                  <input type="number" class="form-control" id="email" placeholder="Enter Question Number" name="quesnogen" min="1" required>
                  <p style="color:Tomato;"><?php echo $notavailablegen; ?></p>
                  <p style="color:MediumSeaGreen;"><?php echo $availablegen; ?></p>
                  <br>
                  <button type="submit" class="btn btn-primary" name="general">Verfiy Question</button>
                   </form>
                 <?php echo $getgen;?>
                </div>
          </div>    
        </div>
      </div>
    </div>
    </div>
<div class="site-section section-2" id="process-section" data-aos="fade">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5">
            <h2 class="section-title">Audio-Visual Round</h2>
              <form action="" method="POST">
                <div class="form-group">
                  <label for="email">Question Number</label>
                  <input type="number" class="form-control" id="email" placeholder="Enter Question Number" name="quesnoaud" min="1" required>
                  <p style="color:Tomato;"><?php echo $notavailableaud; ?></p>
                  <p style="color:MediumSeaGreen;"><?php echo $availableaud; ?></p>
                  <br>
                  <button type="submit" class="btn btn-primary" name="audiovis">Verfiy Question</button>
                  <?php echo $getaud;?>
                </div>
              </form>
          </div>    
        </div>
      </div>
    </div>
    <div class="site-section section-2" id="testimonials-section" data-aos="fade">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5">
            <h2 class="section-title">Rapidfire Round</h2>
              <form action="" method="POST">
                <div class="form-group">
                  <label for="email">Set Number</label>
                  <input type="number" class="form-control" id="email" placeholder="Enter Set Number" name="quesnorpd" min="1" required>
                  <p style="color:Tomato;"><?php echo $notavailablerpd; ?></p>
                  <p style="color:MediumSeaGreen;"><?php echo $availablerpd; ?></p>
                  <br>
                  <button type="submit" class="btn btn-primary" name="rapidfire">Verfiy Question</button>
                  <?php echo $getrpd;?>
                </div>
              </form>
          </div>    
        </div>
      </div>
    </div>
    <div class="site-section section-2" id="services-section" data-aos="fade">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5">
            <h2 class="section-title">Final Round</h2>
              <form action="" method="POST">
                <div class="form-group">
                  <label for="email">Question Number</label>
                  <input type="number" class="form-control" id="email" placeholder="Enter Question Number" name="quesnofnl" min="1" required>
                  <p style="color:Tomato;"><?php echo $notavailablefnl; ?></p>
                  <p style="color:MediumSeaGreen;"><?php echo $availablefnl; ?></p>
                  <br>
                  <button type="submit" class="btn btn-primary" name="final">Verfiy Question</button>
                  <?php echo $getfnl;?>
                </div>
              </form>
          </div>    
        </div>
      </div>
    </div>
    <div class="site-section" id="contact-section"  data-aos="fade">
      <div class="container">

        <div class="row align-items-center">
          <div class="col-md-5 order-1 order-md-2 mb-5 mb-md-0">
            <img src="images/about_1.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6 mr-auto order-2 order-md-1">
            <form action="mssgr.php" method="POST">
            <h2 class="section-title mb-3">Contact (only for admin)</h2>
            <p class="mb-5">If any problems are seen in this website then you can leave a message over here.</p>
          <p style="color:Tomato;">*Any unwanted messages will not be entertained.</p>
                   <p style="color:Tomato;"> <?php echo $_SESSION['msg1']; ?></p>
                   <p style="color:MediumSeaGreen;"><?php echo $_SESSION['msg']; ?></p>
                   <?php $_SESSION['msg1']=$_SESSION['msg']="";?>
              <div class="form-group row" id="mssgr">
                <div class="col-md-6 mb-4">
                  <input type="text" class="form-control" name="fst" placeholder="First name" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="lst" placeholder="Last name" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" class="form-control" name="sub" placeholder="Subject"required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="email" class="form-control" name="eml" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <textarea class="form-control" id="" cols="30" name="msg" rows="10" placeholder="Write your message here."required></textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  
                  <input type="submit" class="btn btn-primary py-3 px-5 btn-block" name="send" value="Send Message">
                </div>
              </div>
            </form>
             <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="rply.php"></iframe>
  </div>
            <form method="POST" action="mssgr.php">
          </div>
          
        </div>
      </div>
    </div>

  
     
    <footer class="footer-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3>About Us</h3>
            <p>This site is especially developed for the e-Quiz and the information about the website is related to the true facts about the progams and the the details of the programmer<a href="https://www.facebook.com/acharya.bipin.9"> Bipin Acharya</a>.</p>
          </div>

          <div class="col-md-3 ml-auto">
            <h3>More</h3>
            <ul class="list-unstyled footer-links">
              <li><a href="addform.php" class="smoothscroll">Add Question</a></li>
              <li><a href="score_card.php" class="smoothscroll">Score Card</a></li>
              <li><a href="scoe_entry.php" class="smoothscroll">Score Entry Pannel</a></li>
              <li><a href="all_qn.php" class="smoothscroll">All Questions</a></li>
              <li><a href="#home-section" class="smoothscroll">Goto Top</a></li>
            </ul>
          </div>
           <center><a class="nav-link">Administrator: <span class="border bg-danger rounded text-white border-danger"><?php echo$_SESSION['username'];?></span></p></center>

          <div class="col-md-4">
            <h3>Supported By: </h3>
            <p>No One</p>
          </div>

        </div>

        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;Bipin Acharya <br><script>document.write(new Date().getFullYear());</script> All rights reserved<i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="images/2.jpg" target="_blank" >B&B Inventors</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            
            </div>
          </div>
          
        </div>
      </div>
    </footer>

  
    
  </div> <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/main.js"></script>
    
  
  </body>
</html>