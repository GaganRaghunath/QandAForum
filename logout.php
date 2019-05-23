<?php
session_start();
unset($_SESSION);
if(session_destroy()) {
      header("Location: index.php");
      echo '<script language="javascript">';
      echo 'alert("Logout successful")';
      echo '</script>';
      header('Location: index.php');
      exit();
    }
 ?>
