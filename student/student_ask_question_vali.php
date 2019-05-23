<?php
include('../databases/connection.php');
session_start();
if (isset($_POST['question_content_student_btn'],$_POST['question_subject_id'])) {
    $question_content_var=$_POST["question_content_student"];
    $question_subject_var=$_POST['question_subject_id'];
    $question_srn_var=$_SESSION['user_srn_session'];
    $question_date_var=date("Y-m-d H:i:s");
    $question_upvote_var=0;

    // validation
    if (empty($question_content_var) || empty($question_subject_var) || empty($question_srn_var)) {
        header('Location: student_ask_question.php?message=Empty_fields');
        exit();
    }

    $sql = "INSERT INTO `questions` (`question_content`,`question_date`,`srn`,`subject_id`,`up_vote`) VALUES
    ('$question_content_var','$question_date_var','$question_srn_var','$question_subject_var','$question_upvote_var')";
    $result=mysqli_query($conn, $sql);

    if (!$result) {
        echo '<script language="javascript">';
        echo 'alert("Something went wrong try again")';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Successfully inserted the question")';
        echo '</script>';
    }
}
 ?>
