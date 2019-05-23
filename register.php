<?php
include('databases/connection.php');
session_start();

if (isset($_POST['register_button'])) {
    $s_srn=strtolower(mysqli_real_escape_string($conn, $_POST['student_srn']));
    $s_name=strtolower($_POST['student_name']);
    $s_department=mysqli_real_escape_string($conn, $_POST['student_department']);
    $s_semester=mysqli_real_escape_string($conn, $_POST['student_semester']);
    $s_section=strtolower(mysqli_real_escape_string($conn, $_POST['student_section']));
    $s_email=strtolower($_POST['student_email']);
    $s_password=$_POST['student_password'];
    $s_confirm_password=$_POST['student_confirm_password'];
    $s_security_question=strtolower($_POST['student_security_question']);
    $s_security_answer=strtolower($_POST['student_security_answer']);
    $s_dob=date('Y-m-d',strtotime($_POST['student_dob']));
}

if (empty($s_srn) || empty($s_name) || empty($s_department) || empty($s_semester) || empty($s_section) || empty($s_email)
|| empty($s_password) || empty($s_confirm_password)|| empty($s_security_question)|| empty($s_security_answer)|| empty($s_dob)) {
    header("Location: registerform.php?message=empty_fields");
    exit();
} elseif(!$s_password==$s_confirm_password){
  header("Location: registerform.php?message=Password_didnt_match");
  exit();
}elseif (!preg_match("/^[a-zA-Z]*$/", $s_name)) {
    header("Location: registerform.php?message=invalid_username");
    exit();
} else {
    $sql="SELECT * FROM student_table WHERE srn='$s_srn'";
    $result=mysqli_query($conn, $sql);

    $result_check=mysqli_num_rows($result);
    if ($result_check > 0) {
        header("Location: registerform.php?message=Registeration_failed");
        exit();
    } else {
        $hash_password= password_hash($s_password, PASSWORD_DEFAULT);//encrypt the password before saving in the database

        $query = "INSERT INTO student_table (srn, name, department,semester,section,email,password,security_question,security_answer,dob)
         VALUES('$s_srn', '$s_name', '$s_department', '$s_semester', '$s_section', '$s_email', '$hash_password', '$s_security_question', '$s_security_answer','$s_dob')";
        $result=mysqli_query($conn, $query);
        if (!$result) {
          echo $s_srn." ".$s_name." ".$s_department." ".$s_semester." ".$s_section." ".$s_email.$hash_password." ".$s_security_question." ".$s_security_answer." ".$s_dob;
            die(mysqli_connect_error());
        }
        header("Location: registerform.php?message=register_success");
        echo '<script language="javascript">';
        echo 'alert("Successfully registered")';
        echo '</script>';
        exit();
    }
}
