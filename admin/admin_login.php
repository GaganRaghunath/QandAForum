<?php
    include("../databases/connection.php");
    session_start();

    if (isset($_POST["admin_name"],$_POST["admin_password"]))
    {
        $a_name=strtolower(mysqli_real_escape_string($conn,$_POST["admin_name"]));
        $a_password=strtolower(mysqli_real_escape_string($conn,$_POST["admin_password"]));
        $sql = "SELECT admin_id FROM admin WHERE admin_name='$a_name' and admin_password = '$a_password'";
        $result=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($result);
        echo "done";

        if($count==1) {
            $_SESSION['admin_name_session']=$a_name;
            $_SESSION['admin_name_session']=$a_password;
            echo "done2";
            header("Location: admin_dashboard.php?message=successfully_logged_in");
            exit();
        }else {
            header("Location: admin_login_form.php?message=login_failed");
            exit();
        }

    }
?>
