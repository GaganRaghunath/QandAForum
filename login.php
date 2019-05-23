<?php

session_start();

if (isset($_POST['login_button'])) {
    include 'databases/connection.php';
    $u_srn=strtolower(mysqli_real_escape_string($conn, $_POST['user_srn']));
    $u_password=mysqli_real_escape_string($conn, $_POST['user_password']);

    if (empty($u_srn) || empty($u_password)) {
        header("Location: index.php?message=Empty_fields");
        exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $u_srn)) {
        header("Location: index.php?message=Invalid_Srn");
        exit();
    } else {
        $sql="SELECT * FROM student_table WHERE srn='$u_srn'";
        $result=mysqli_query($conn, $sql);
        $result_check=mysqli_num_rows($result);


        if ($result_check<1) {
            header("Location: index.php?message=User_does_not_exists");
            exit();
        } else {
            if ($row=mysqli_fetch_array($result)) {
                $hash_password_check=password_verify($u_password, $row['password']);
                if ($hash_password_check==false) {
                    header("Location: index.php?message=invalid_Password_or_username");
                    exit();
                } elseif ($hash_password_check==true) {
                    $_SESSION[user_srn_session]=$row['srn'];
                    $_SESSION[user_name_session]=$row['name'];
                    $_SESSION[user_department_session]=$row['department'];
                    $_SESSION[user_semester_session]=$row['semester'];
                    $_SESSION[user_section_session]=$row['section'];
                    $_SESSION[user_email_session]=$row['email'];
                    $_SESSION[user_dob_session]=$row['dob'];
                    header('location:student/student_home_page.php?message=successfully_logged_in');
                    exit();
                }
            }
        }
    }
}
