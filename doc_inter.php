<?php
  session_start();
  $email = $_POST["id"];
  $pass = $_POST["pass"];
  $_SESSION['doc_email']=$email;
  $_SESSION['doc_pass']=$pass;
  $_SESSION['logout_doc']="login_doct.html";
  header("Location:login_doc.php");

 ?>
