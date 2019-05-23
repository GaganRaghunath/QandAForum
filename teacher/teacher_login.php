<?php
include('../databases/connection.php');
session_start();

if (isset($_POST['login_button_teacher'])) {
    $u_srn_t=strtolower(mysqli_real_escape_string($conn, $_POST['user_srn_teacher']));
    $u_password_t= $_POST['user_password_teacher'];

    if (empty($u_srn_t) || empty($u_password_t)) {
        header("Location: teacher_login_form.php?message=Empty_fields");
        exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $u_srn_t)) {
        header("Location: teacher_login_form.php?message=Invalid_Srn");
        exit();
    } else {

        $sql="SELECT * FROM professor WHERE teacher_id='$u_srn_t'";
        $result=mysqli_query($conn, $sql);
        $result_check=mysqli_num_rows($result);

        if ($result_check<1) {
            header("Location: teacher_login_form.php?message=User_does_not_exists");
            exit();
        } else {
            if ($row=mysqli_fetch_assoc($result)) {
                $hash_password_check=password_verify($u_password_t, $row['teacher_password']);
                if ($hash_password_check==false) {
                    header("Location: teacher_login_form.php?message=invalid_Password_or_username");
                    exit();
                } elseif ($hash_password_check==true) {
                    $_SESSION[teacher_id_session]=$row['teacher_id'];
                    $_SESSION[teacher_name_session]=$row['teacher_name'];
                    $_SESSION[teacher_department_session]=$row['department'];
                    $_SESSION[teacher_email_session]=$row['teacher_email'];
                    $_SESSION[teacher_designation_session]=$row['designation'];
                    $_SESSION[teacher_mobno_session]=$row['teacher_mobno'];
                    $_SESSION[teacher_dob_session]=$row['teacher_dob'];

                    header('location:teacher_home_page.php?message=successfully_logged_in');
                    exit();
                }
            }
        }
    }
}

?>
