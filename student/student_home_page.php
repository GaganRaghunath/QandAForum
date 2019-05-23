<!DOCTYPE html>
<?php include('../databases/connection.php');
session_start();
?>
<html lang="en">

<head>
  <title>QandA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="../css/courses.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
    <link href="../css/font-awesome.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700i" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,800" rel="stylesheet">
    <!-- //Fonts -->
</head>

<body>
  <div class="">

    <?php if(!strlen(@$_GET['message'])=="")
        {
          ?>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"> Message</li>
              <li class="breadcrumb-item active"><?php echo $_GET['message'] ;?></li>
          </ol>
      <?php
    }
    ?>

  </div>


    <div class="banner-content inner" id="home">
        <!-- header -->
        <header class="header">
            <div class="container-fluid px-lg-5">
                <!-- nav -->
                <nav class="py-4">
                    <div id="logo">
                      <h1> <a href="../index.php"><span>Q</span>&A</a></h1>
                    </div>

                    <label for="drop" class="toggle">Menu</label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu mt-2">
                      <li class="active"><a href="student_home_page.php">Home</a></li>
                      <li><a href="student_ask_question.php">Ask Question</a></li>
                      <li><a href="my_questions.php">My question</a></li>
                      <li>

                        <!-- First Signin Drop Down -->
                        <label for="drop-2" class="toggle">Profile <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                        <a href="#">Profile <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                        <input type="checkbox" id="drop-2" />
                        <ul>
                          <li> <a href="#" class="scroll"> <?php echo $_SESSION['user_name_session']; ?>  </a> </li>
                          <li><a href="student_profile_page.php" class="">Profile Details</a></li>
                          <li><a href="../logout.php">Logout</a></li>
                        </ul>
                      </li>
                      <li><a href="student_explore.php">Explore</a></li>

                    </ul>
                </nav>
            </div>
        </header>
    </div>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Student Dashboard</li>
    </ol>
    <!---->

    <section class="hand-crafted bg-light py-5">
      <div class="container py-xl-5 py-lg-3">
        <div class="row banner-grids">
          <div class="col-md-6 banner-image">
            <div class="effect-w3">
              <img src="../images/img.jpg" alt="" class="img-fluid image1">

            </div>

          </div>
          <div class="col-md-6 last-img pl-lg-5 p-3">
            <h3 class="tittle my-lg-5 my-3"><span class="sub-tittle"> Now You can get </span>The Best Answers for Your Question</h3>
            <p class="mb-4">University Question and Answer forum is a question-and-answer website where questions are asked, answered, edited, and organized by its community of lecturers in the form of opinions</p>
            <p class="mb-4">University Question and Answer forum’s mission is to share and grow the Students's knowledge. A vast amount of the knowledge that would be valuable to many students is currently only available to a few.</p>
            <div class="ban-buttons">
              <a href="about.php" class="btn">Read More</a>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- //hand-crafted -->

    <!--/ab -->
    <section class="about py-lg-5 py-md-5 py-3">
      <div class="container">
        <div class="inner-sec-w3ls py-lg-5 py-3">
          <h3 class="tittle text-center mb-lg-5 mb-3"><span class="sub-tittle">About.</span> Our question categories</h3>
          <div class="feature-grids row mb-lg-5 my-3">
            <div class="col-md-4 p-0">
              <div class="bottom-gd p-lg-5 p-4">
                <span class="fa fa-laptop" aria-hidden="true"></span>
                <h3 class="my-3"> Computer Applications</h3>
                <p>Questions related to BCA and Computer Science Engineering.</p>
              </div>
            </div>
            <div class="col-md-4 p-0">
              <div class="bottom-gd2-active p-lg-5 p-4">
                <span class="fa fa-clone" aria-hidden="true"></span>
                <h3 class="my-3"> Business</h3>
                <p>Commerce students are more likely to be curious about entrepreneur.</p>
              </div>
            </div>
            <div class="col-md-4 p-0">
              <div class="bottom-gd p-lg-5 p-4">
                <span class="fa fa-flask" aria-hidden="true"></span>
                <h3 class="my-3"> Science</h3>
                <p>Physics, Math, Chemistry, Eletronics and the list goes on.</p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- //ab -->
    <!--/counter-->
    <section class="stats py-lg-5 py-4">
      <div class="container">
        <div class="row text-center">
          <div class="col">
            <div class="counter">
              <h3 class="timer count-title count-number"> <?php
  $sql="SELECT count(*) FROM student_table";
  $result=mysqli_query($conn,$sql);
  $result_check=mysqli_num_rows($result);
  echo $result_check;         ?> </h3>
              <p class="count-text ">Students</p>
            </div>
          </div>
          <div class="col">
            <div class="counter">
              <h3 class="timer count-title count-number"><?php $sql="SELECT * FROM questions";
              $result=mysqli_query($conn,$sql);
              $result_check=mysqli_num_rows($result);
              echo $result_check;         ?></h3>
              <p class="count-text ">Questions</p>
            </div>
          </div>
          <div class="col">
            <div class="counter">
              <h3 class="timer count-title count-number"><?php $sql="SELECT * FROM answers";
              $result=mysqli_query($conn,$sql);
              $result_check=mysqli_num_rows($result);
              echo $result_check;         ?></h3>
              <p class="count-text ">Answers</p>
            </div>
          </div>
          <div class="col">
            <div class="counter">
              <h3 class="timer count-title count-number"><?php $sql="SELECT * FROM professor";
              $result=mysqli_query($conn,$sql);
              $result_check=mysqli_num_rows($result);
              echo $result_check;         ?></h3>
              <p class="count-text ">Professors</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--//counter-->
    <!-- middle section -->

    <!-- //middle section -->

    <!--//team -->
    <section class="banner-bottom py-lg-5 py-4">
      <div class="container">
        <div class="inner-sec-w3ls py-lg-5 py-4">
          <h3 class="tittle text-center my-lg-5 my-3"><span class="sub-tittle">Amazing</span> Project members</h3>
          <div class="row mt-lg-5 mt-4">
            <div class="col-md-4 team-gd text-center">
              <div class="team-img mb-4">
                <img src="../images/team.jpg" class="img-fluid rounded-circle" alt="user-image">
              </div>
              <div class="team-info">
                <h3 class="mt-md-4 mt-3"><span class="sub-tittle-team">Android Developer</span> Gagan Kumar R</h3>
                <p>From BCA final Semester.</p>
                <ul class="social_section_1info mt-md-4 mt-3">
                </ul>
              </div>
            </div>

            <div class="col-md-4 team-gd second text-center">
              <div class="team-img mb-4">
                <img src="../images/team1.jpg" class="img-fluid rounded-circle" alt="user-image">
              </div>
              <div class="team-info">
                <h3 class="mt-md-4 mt-3"><span class="sub-tittle-team">Designer</span> Balaji N</h3>
                <p>From BCA final Semester.</p>
                <ul class="social_section_1info mt-md-4 mt-3">
                </ul>
              </div>
            </div>
            <div class="col-md-4 team-gd text-center">
              <div class="team-img mb-4">
                <img src="../images/team2.jpg" class="img-fluid rounded-circle" alt="user-image">
              </div>
              <div class="team-info">
                <h3 class="mt-md-4 mt-3"><span class="sub-tittle-team">PHP developer</span> Dhanush BL</h3>
                <p>From BCA final Semester.</p>
                <ul class="social_section_1info mt-md-4 mt-3">
                </ul>
              </div>
            </div>
          </div>


        </div>
      </div>
    </section>
    <!-- portfolio -->


    <!-- /hand-crafted -->
    <section class="hand-crafted py-lg-4 py-5">
      <div class="container py-xl-5 py-lg-3">
        <div class="row banner-grids">
          <div class="col-md-6 banner-image">
            <div class="effect-w3">
              <img src="../images/img2.jpg" alt="" class="img-fluid image1">
            </div>
          </div>
          <div class="col-md-6 last-img pl-lg-5 p-3">
            <h3 class="tittle text-white my-lg-5 my-3"><span class="sub-tittle">welcome to </span>Reva University</h3>
            <p class="mb-4">REVA University has been established under the REVA University Act, 2012. The University is located in Bengaluru on a sprawling green campus, spread over 45 acres of land, built with state-of-the-art
               infrastructure creating an environment conducive to higher learning and research.</p>
            <p class="mb-4">REVA University is alive with the confluence of different minds and energies. The exchange and intermingling of these vivacities characterizes life at REVA.</p>
            <div class="ban-buttons">
              <a href="https://reva.edu.in/" class="btn">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- //hand-crafted -->


    <section class="py-lg-5 portfolio-flyer py-4" id="gallery">
      <div class="container py-lg-5">
        <h3 class="tittle text-center my-lg-5 my-3"><span class="sub-tittle"> Recent Pics </span>Our Gallery</h3>

        <div class="row news-grids pb-lg-5 mt-3 text-center">
          <div class="col-md-4 gal-img">
            <a href="#gal1"><img src="../images/n1.jpg" alt="High Edu" class="img-fluid"></a>
          </div>
          <div class="col-md-4 gal-img">
            <a href="#gal2"><img src="../images/g2.jpg" alt="High Edu" class="img-fluid"></a>
          </div>
          <div class="col-md-4 gal-img">
            <a href="#gal3"><img src="../images/g3.jpg" alt="High Edu" class="img-fluid"></a>
          </div>
          <div class="col-md-4 gal-img mt-lg-4">
            <a href="#gal4"><img src="../images/g4.jpg" alt="High Edu" class="img-fluid"></a>
          </div>
          <div class="col-md-4 gal-img mt-lg-4">
            <a href="#gal5"><img src="../images/n9.jpg" alt="High Edu" class="img-fluid"></a>
          </div>
          <div class="col-md-4 gal-img mt-lg-4">
            <a href="#gal6"><img src="../images/g5.jpg" alt="High Edu" class="img-fluid"></a>
          </div>
          <div class="col-md-4 gal-img mt-lg-4">
            <a href="#gal7"><img src="../images/n7.jpg" alt="High Edu" class="img-fluid"></a>
          </div>
          <div class="col-md-4 gal-img mt-lg-4">
            <a href="#gal8"><img src="../images/g1.jpg" alt="High Edu" class="img-fluid"></a>
          </div>
          <div class="col-md-4 gal-img mt-lg-4">
            <a href="#gal9"><img src="../images/n6.jpg" alt="High Edu" class="img-fluid"></a>
          </div>
        </div>
      </div>
    </section>


    <footer>
      <section class="footer footer_1its py-5">
        <div class="container py-md-4">
          <div class="row footer-top mb-md-5 mb-4">
            <div class="col-lg-4 col-md-6 footer-grid_section_1its">
              <div class="footer-title-w3ls">
                <h3>Address</h3>
              </div>
              <div class="footer-text">
                <p>Address : Rukmini Knowledge Park, Kattigenahalli,Yelahanka, Bangalore - 560064</p>
                <p>Phone : +91- 95388 74444</p>
                <p>Email : <a href="mailto:info@reva.edu.in">info@reva.edu.in</a></p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-md-0 mt-4 footer-grid_section_1its">
              <div class="footer-title-w3ls">
                <h3>Quick Links</h3>
              </div>
              <div class="row">
                <ul class="col-6 links">
                  <li><a href="../index.php">Home </a></li>
                  <li><a href="#about">About </a></li>
                  <li><a href="../explore.php">Explore</a></li>
                  <li><a href="../registerform.php">Register</a></li>
                  <li><a href="../index#loginform">Sign in </a></li>
                </ul>
                <ul class="col-6 links">
                  <li><a href="../about.php">About Us </a></li>
                  <li><a href="../Synopsis.pdf">Synopsis </a></li>
                  <li><a href="https://reva.edu.in/faq">Faq's </a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 mt-lg-0 mt-4 col-sm-12 footer-grid_section_1its">
              <div class="footer-title-w3ls">
                <h3>Newsletter</h3>
              </div>
              <div class="footer-text">
                <p>By subscribing to our mailing list you will always get latest news and updates from us.</p>
                <form action="subscribe.php" method="post">
                  <input type="email" name="subscriber" placeholder="Enter your email..." required="">
                  <button type="submit" class="btn1 btn"><span class="fa fa-paper-plane-o" aria-hidden="true"></span></button>
                  <div class="clearfix"> </div>
                </form>
              </div>
            </div>
          </div>
          <div class="footer-grid_section text-center">
            <div class="footer-title-w3ls mb-3">
              <a href="index.php"><span>Q</span>&A</a>
            </div>
            <div class="footer-text">
              <p>University Question and Answer forum is a web
  application project developed for university students to share
  their questions, learn and gain knowledge regarding a particular
  subject.
  University professors and lecturers visit the web application
  each day to solve problems related to a subject, share ideas
  and resources to the students.</p>
            </div>
            <ul class="social_section_1info">
              <li class="mb-2 facebook"><a href="#"><span class="fa fa-facebook mr-1"></span>facebook</a></li>
              <li class="mb-2 twitter"><a href="#"><span class="fa fa-twitter mr-1"></span>twitter</a></li>
              <li class="google"><a href="#"><span class="fa fa-google-plus mr-1"></span>google</a></li>
              <li class="linkedin"><a href="#"><span class="fa fa-linkedin mr-1"></span>linkedin</a></li>
            </ul>
          </div>
          <div class="move-top-w3layouts text-center mt-3">
            <a href="#home" class="move-top"> <span class="fa fa-angle-up  mb-3" aria-hidden="true"></span></a>
          </div>

        </div>
      </section>
    </footer>
    <!-- //footer -->

    <!-- copyright -->
    <div class="cpy-right text-center py-3">
      <p class="">© 2019 Q&A. All rights reserved | Design by Gagan and Team.
      </p>
    </div>
    <!-- //copyright -->

</body>

</html>
