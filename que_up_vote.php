<?php
include("databases/connection.php");
session_start();
$question_id= $_GET['q_id'];
$sql="SELECT up_vote FROM questions WHERE question_id=$question_id";
$result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
$row = mysqli_fetch_array($result);
$up_vote=$row['up_vote'];
$up_vote=$up_vote+1;

$select_question_query="UPDATE questions SET up_vote='$up_vote' WHERE question_id='$question_id'";
$query_result=mysqli_query($conn, $select_question_query)  or die(mysqli_error($conn));
header('Location: question_thread.php?q_id='.$question_id);
exit();
?>
