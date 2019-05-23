<?php
include('../databases/connection.php');
session_start();

if (isset($_POST['add_teacher_button'])) {
    $t_id=strtolower(mysqli_real_escape_string($conn, $_POST['teacher_id']));
    $t_name=strtolower($_POST['teacher_name']);
    $t_department=strtolower($_POST['department_name_t_id']);
    $t_email=strtolower($_POST['teacher_email']);
    $t_password=$_POST['teacher_password'];
    $t_password_confirm=$_POST['teacher_password_confirm'];
    $t_designation=strtolower($_POST['designation']);
    $t_mobno=strtolower($_POST['teacher_mobno']);
    $t_security_question=$_POST['security_question'];
    $t_security_answer=$_POST['security_answer'];
    $t_dob=date('Y-m-d',strtotime($_POST['teacher_dob']));




if (empty($t_id) || empty($t_name) || empty($t_department) || empty($t_email) || empty($t_password) || empty($t_password_confirm) || empty($t_designation)
||  empty($t_mobno) || empty($t_security_question) || empty($t_security_answer) || empty($t_dob)) {
    header("Location: add_teacher_form.php?message=Empty_fields");
    exit();
} elseif (!(preg_match("/^[a-zA-Z ]*$/", $t_name)|| preg_match("/^[1-0]*$/",$t_mobno) || preg_match("/^[a-zA-Z ]*$/",$t_designation))) {
    header("Location: add_teacher_form.php?message=invalid_fields");
    exit();
} else {
    $sql="SELECT * FROM professor WHERE teacher_id='$t_id'";
    $result=mysqli_query($conn, $sql);

    $result_check=mysqli_num_rows($result);
    if ($result_check > 0) {
        header("Location: add_teacher_form.php?message=user_already_exists");
        exit();
    } elseif ($t_password!=$t_password_confirm) {
          header("Location: add_teacher_form.php?message=check_password");
    }else {
        $hash_password= password_hash($t_password, PASSWORD_DEFAULT);//encrypt the password before saving in the database

        $query = "INSERT INTO professor (teacher_id, teacher_name, department, teacher_email, teacher_password, designation, teacher_mobno, security_question, security_answer, teacher_dob) VALUES('$t_id', '$t_name', '$t_department', '$t_email', '$hash_password', '$t_designation', '$t_mobno', '$t_security_question', '$t_security_answer', '$t_dob')";
        $result=mysqli_query($conn, $query);

        if($result){
          header("Location: add_teacher_form.php?message=successfully_registered_teacher");
        }else{

            header("Location: add_teacher_form.php?message=Unsuccessful");
            exit();
        }


    }
}
}
?>
