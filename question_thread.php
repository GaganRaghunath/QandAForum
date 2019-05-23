<!DOCTYPE html>

<?php
include("databases/connection.php");
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
            window.scrollTo(0, 200);
        }

    </script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/courses.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700i" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,800" rel="stylesheet">
    <!-- //Fonts -->
    <?php
        $rowperpage = 5;
                   $row = 0;

                   // Previous Button
                   if(isset($_POST['but_prev'])){
                       $row = $_POST['row'];
                       $row -= $rowperpage;
                       if( $row < 0 ){
                           $row = 0;
                       }
                   }

                   // Next Button
                   if(isset($_POST['but_next'])){
                       $row = $_POST['row'];
                       $allcount = $_POST['allcount'];

                       $val = $row + $rowperpage;
                       if( $val < $allcount ){
                           $row = $val;
                       }
                   }?>
</head>

<body>
  <div class="">

    <?php if (!strlen(@$_GET['message'])=="") {
    ?>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"> Message</li>
              <li class="breadcrumb-item active"><?php echo $_GET['message'] ; ?></li>
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
                      <li class="active"><a href="index">Home</a></li>
                      <li><a href="about.php">About</a></li>
                      <li><a href="explore.php">Explore</a></li>
                      <li>

                        <!-- First Signin Drop Down -->
                        <label for="drop-2" class="toggle">Sign In <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                        <a href="#">Login <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                        <input type="checkbox" id="drop-2" />
                        <ul>
                          <li><a href="index.php#loginform" class="scroll">Student Login</a></li>
                          <li><a href="admin/admin_login_form.php">Admin Login</a></li>
                          <li><a href="teacher/teacher_login_form.php">Teacher Login</a></li>
                        </ul>
                      </li>
                      <li><a href="registerform.php">Register</a></li>

                    </ul>
                </nav>
            </div>
        </header>
    </div>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Question Thread</li>
    </ol>
    <!---->

    <section class="ab-info-main py-md-5 py-4">
        <div class="container py-md-5 py-4">
            <h3 class="tittle text-center mb-lg-5 mb-3"><span class="sub-tittle">Your Questions</span>Answers</h3>
          <div class="speak">
            <div class="row mt-lg-5 mt-4">

                <div class="col-md-12 events-info my-3">

                  <?php

                  $question_id= $_GET['q_id'];
                  $select_question_query="SELECT * FROM questions WHERE question_id='$question_id'";
                  $query_result=mysqli_query($conn, $select_question_query);

                  $count_rows=mysqli_num_rows($query_result);
                  if($count_rows>0){
                    $row = mysqli_fetch_array($query_result);
                          $question_content=$row['question_content'];
                          $question_by=$row['srn'];
                          $question_sub=$row['subject_id'];
                          $up_vote=$row['up_vote'];
                          $question_date=$row['question_date'];


                          $sq="SELECT subject_name FROM subjects WHERE subject_id=$question_sub";
                          $r=mysqli_query($conn,$sq);
                          $ro=mysqli_fetch_array($r);

                          $question_sub=$ro['subject_name'];

                   ?>
                    <h3><span class="sub-tittle">01</span> <?php echo $question_sub ?> </h3>
                    <h4 class="my-3"><a href="#" class="text-dark"> <?php echo $question_content ?> </a></h4>
                    <p><?php echo $question_by; ?></p>
                    <ul class="team-icons new-inf mt-md-4 mt-3 d-flex">
                        <li><a href="#"><span class="fa fa-calendar"></span></a> <?php echo $question_date; ?> </li>
                        <li><?php echo '<a href="que_up_vote.php?q_id='.$question_id.'">'?><span class="fa fa-heart-o"></span> <?php echo $up_vote; ?> </a></li>
                    </ul>
                </div>

            </div>
          </div>

      <?php } ?>


<?php

include_once 'includes/Pagination.class.php';


// Set some useful configuration
$baseURL = 'question_thread.php';
$limit = 5;

// Paging limit & offset
$offset = !empty($_GET['page'])?(($_GET['page']-1)*$limit):0;

$sql   ="SELECT COUNT(*) AS rowNum FROM questions";
$result =  mysqli_query($conn, $sql);
$row= mysqli_fetch_array($result);
$rowCount= $row['rowNum'];

$pagConfig = array(
    'baseURL' => $baseURL,
    'totalRows'=>$rowCount,
    'perPage'=>$limit
);
$pagination =  new Pagination($pagConfig);

          $select_answer_query="SELECT * FROM answers WHERE question_id=$question_id ORDER BY answer_id DESC LIMIT $offset,$limit";
          $ans_query_result=mysqli_query($conn, $select_answer_query);

          $count_rows=mysqli_num_rows($ans_query_result);
          if($count_rows>0){
            $i=0;
            while ($row = mysqli_fetch_array($ans_query_result)) {
              $i=$i+1;
              $ans_id=$row['answer_id'];
                    $ans_content=$row['answer_content'];
                    $ans_by=$row['teacher_id'];
                    $ans_down_vote=$row['down_vote'];
                    $ans_up_vote=$row['up_vote'];
                    $ans_date=$row['answer_date'];

 ?>

 <div class="media py-5">
     <div class="media-body">
         <div class="media mt-5">
             <a class="pr-3" href="#">
                 <img src="images/te1.jpg" class="img-fluid rounded-circle" alt="image">
             </a>
             <div class="media-body">
                 <h5 class="mt-0"> <?php echo $ans_by ?> </h5>
                 <p class="mt-2">  <?php echo $ans_content ?> </p>
             </div>
             <ul class="team-icons new-inf mt-md-4 mt-3 d-flex">
                 <li><a href="#"><span class="fa fa-calendar"></span></a> <?php echo $ans_date; ?> </li>
                 <li><?php echo '<a href="ans_down_vote.php?a_id='.$ans_id."&q_id=".$question_id.'">'?><span class="fa fa-thumbs-down mx-1"></span> <?php echo $ans_down_vote ?></a></li>
                 <li><?php echo '<a href="ans_up_vote.php?a_id='.$ans_id."&q_id=".$question_id.'">'?><span class="fa fa-heart-o"></span> <?php echo $ans_up_vote; ?> </a></li>
             </ul>
         </div>
     </div>
 </div>
<?php
}
}
 ?>

 <?php echo $pagination->createLinks();?>


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
                  <li><a href="index.php">Home </a></li>
                  <li><a href="#about">About </a></li>
                  <li><a href="explore.php">Explore</a></li>
                  <li><a href="registerform.php">Register</a></li>
                  <li><a href="#loginform">Sign in </a></li>
                </ul>
                <ul class="col-6 links">
                  <li><a href="about.php">About Us </a></li>
                  <li><a href="Synopsis.pdf">Synopsis </a></li>
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
