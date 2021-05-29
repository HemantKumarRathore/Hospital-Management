<?php
  session_start();
  $email = $_POST["id"];
  $pass = $_POST["pass"];
  $_SESSION['logout_staff']="login_staff.html";
  $_SESSION['staff_email']=$email;
  $_SESSION['staff_pass']=$pass;
  header("Location:login_staff.php");
 ?>
