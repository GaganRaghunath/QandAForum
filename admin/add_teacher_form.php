<!DOCTYPE html>
<?php include('../databases/connection.php');
session_start();
?>
<html lang="en">

<head>
  <title>QandA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="High Edu Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
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
                      <h1> <a href="index.php"><span>Q</span>&A</a></h1>
                    </div>

                    <label for="drop" class="toggle">Menu</label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu mt-2">
                      <li class="active"><a href="admin_dashboard.php">Home</a></li>
                      <li>

                        <!-- First Signin Drop Down -->
                        <label for="drop-2" class="toggle">Teacher<span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                        <a href="#">Teacher <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                        <input type="checkbox" id="drop-2" />
                        <ul>
                          <li><a href="add_teacher_form.php" class="scroll">Add Teacher</a></li>
                        </ul>
                      </li>

                      <li>

                        <!-- First Signin Drop Down -->
                        <label for="drop-3" class="toggle">Remove<span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                        <a href="#">Remove <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                        <input type="checkbox" id="drop-3" />
                        <ul>
                          <li><a href="remove_student_form.php" class="scroll">Remove Student</a></li>
                          <li><a href="remove_teacher_form.php">Remove Teacher</a></li>
                          <li><a href="delete_subject.php">Remove Subject</a></li>
                        </ul>
                      </li>


                      <li>

                        <!-- First Signin Drop Down -->
                        <label for="drop-4" class="toggle">Add<span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                        <a href="#">Add <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                        <input type="checkbox" id="drop-4" />
                        <ul>
                          <li><a href="add_department.php" class="scroll">Add Department</a></li>
                          <li><a href="add_subject.php">Add Subject</a></li>
                        </ul>
                      </li>


                      <li>

                        <!-- First Signin Drop Down -->
                        <label for="drop-5" class="toggle">Profile <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                        <a href="#">Profile <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                        <input type="checkbox" id="drop-5" />
                        <ul>
                          <li> <a href="#" class="scroll">Administrator</a> </li>
                          <li><a href="../logout.php">Logout</a></li>
                        </ul>
                      </li>
                      <li><a href="reset_password_form.php">Reset Password</a></li>

                    </ul>
                </nav>
            </div>
        </header>
    </div>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Register</li>
    </ol>
    <!---->

    <section class="ab-info-main py-md-5 py-4">
        <div class="container py-md-5 py-4">
            <h3 class="tittle text-center mb-lg-5 mb-3"><span class="sub-tittle">Teacher</span> Registeration here</h3>

            <div class="login p-md-5 p-4 mx-auto bg-white mw-100 col-lg-5">
              <form action="add_teacher.php" method="post">
                <div class="form-group">
                  <label>Teacher ID</label>

                    <input type="text" class="form-control" name="teacher_id" placeholder="enter teacher id">
                </div>

                <div class="form-group">
                  <label>Teacher Name</label>

                    <input type="text" class="form-control" name="teacher_name" value="" placeholder="Enter teacher name">
                </div>

                <div class="form-group row">
                  <div class="col-4">
                    <label>Designation</label>

                    <input type="text" class="form-control" name="designation" placeholder="enter designation">
                  </div>

                  <div class="col-4">
                    <label>Phoneno</label>

                    <input type="text" class="form-control" name="teacher_mobno" placeholder="enter phone number">
                  </div>

                  <div class="col-4">
                    <label>Department</label>

                    <select class="form-control" name="department_name_t_id">
                      <?php

                      $select_department_query="SELECT `department_id`,`department_name` from `department`";
                      $department_result=mysqli_query($conn, $select_department_query);
                      //select semester
                      while ($row = mysqli_fetch_array($department_result)) {
                          $display_id=$row['department_id'];
                          $display_name=$row['department_name'];
                          echo '<option value="'.$display_id.'">'.$display_name.'</option>';
                      }
                                                 ?>
                    </select>
                  </div>
                </div>


                <div class="form-group row">
                  <div class="col-6">
                    <label>Email</label>

                    <input type="email" class="form-control" name="teacher_email" placeholder="enter teacher email">
                  </div>

                  <div class="col-6">
                    <label>Date of birth</label>

                    <input class="form-control" class="form-control" type="date" name="teacher_dob"  placeholder="date of birth">
                  </div>
                </div>



                <div class="form-group row">
                  <div class="col-6">
                    <label>Password</label>

                    <input type="password" class="form-control" name="teacher_password" placeholder="enter password">
                  </div>

                <div class="col-6">
                  <label>Confirm Password</label>

                  <input type="password" class="form-control" name="teacher_password_confirm" placeholder="confirm password">
                </div>

                </div>


                <div class="form-group row">
                  <div class="col-6">
                    <label>Security Question</label>

                    <select class="form-control" name="security_question">
                      <option value="">Select Security Question</option>
                      <option value="what_is_your_sibling_name">what_is_your_sibling_name</option>
                      <option value="who_is_your_favorite_actor">who_is_your_favorite_actor</option>
                      <option value="what_is_your_pet_name">what_is_your_pet_name</option>
                      <option value="what_is_your_grandfather_name">what_is_your_grandfather_name</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label>Security Answer</label>

                    <input class="form-control" type="text" name="security_answer"  placeholder="enter the answer">
                  </div>
                </div>

                <button type="submit" name="add_teacher_button" class="btn btn-primary submit mb-4">Add Teacher</button>

              </form>

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
