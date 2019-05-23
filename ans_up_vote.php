<?php
include("databases/connection.php");
session_start();
$answer_id= $_GET['a_id'];
$q=$_GET['q_id'];
$sql="SELECT up_vote FROM answers WHERE answer_id=$answer_id";
$result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
$row = mysqli_fetch_array($result);
$up_vote=$row['up_vote'];
$up_vote=$up_vote+1;

$select_answer_query="UPDATE answers SET up_vote='$up_vote' WHERE answer_id='$answer_id'";
$query_result=mysqli_query($conn, $select_answer_query)  or die(mysqli_error($conn));
header('Location: question_thread.php?q_id='.$q);
?>
