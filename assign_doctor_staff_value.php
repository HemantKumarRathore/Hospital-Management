<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management";
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$add=$_POST["p_addhar"];
$docid=$_POST["d_id"];
$sql1 = "UPDATE patient SET d_id='".$docid."' WHERE addh_num='".$add."';";
if ($conn->query($sql1) === TRUE) {
  echo "<div>&nbsp; You have updated record successfully........</div><br>";
  $conn->close();
  header("Location:assign_doctor_staff.php");
} else {
  echo "Error: " . $sql1 . "!!!!<br>" . $conn->error;
}
$conn->close();
?>
