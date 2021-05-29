<?php
  session_start();
  $email = $_POST["id"];
  $pass = $_POST["pass"];
  $_SESSION['patient_email']=$email;
  $_SESSION['patient_pass']=$pass;
  $_SESSION['logout_pat']="login.html";
  // echo $_SESSION['logout_pat'];
  header("Location:login_pat.php");

 ?>
