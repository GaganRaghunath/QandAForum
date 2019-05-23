<?php
include("databases/connection.php");
session_start();
$question_id= $_GET['q_id'];
$sr=$_GET['srn'];
$sql="INSERT INTO report(question_id,srn) VALUES ('$question_id','$sr')";
$result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
header("Location: answer_question.php");
exit();
?>
