<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "hospital_management";
  $conn = new mysqli($servername, $username, $password,$dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $d_id=$_POST["d_id"];
  $preID=$_POST["preID"];
  $pre=$_POST["pre"];
  $a_num=$_POST["padd"];
  $con=FALSE;
  $sql = "SELECT * FROM prescription where pri_id='".$preID."';";
  $result1 = $conn->query($sql);
  if ($result1->num_rows > 0) {
      $con=TRUE;
  }
  if($con===TRUE){
    $sql1 = "UPDATE prescription SET pri_dis='".$pre."',d_id='".$d_id."',p_addh_num='".$a_num."' WHERE pri_id='".$preID."';";
    if ($conn->query($sql1) === TRUE) {
      echo "<div>&nbsp; You have updated record successfully........</div><br>";
      $conn->close();
      header("Location:doc_patient_pric.php");
    } else {
      echo "Error: " . $sql1 . "!!!!<br>" . $conn->error;
      $conn->close();
    }
  }else {
    $sql1 = "INSERT INTO prescription(pri_id,pri_dis,d_id,p_addh_num) VALUES ('".$preID."','".$pre."','".$d_id."','".$a_num."');";
    if ($conn->query($sql1) === TRUE) {
      echo "<div>&nbsp; You have updated record successfully........</div><br>";
      $conn->close();
      header("Location:doc_patient_pric.php");
    } else {
      echo "Error: " . $sql1 . "!!!!<br>" . $conn->error;
      $conn->close();
    }
  }

?>
