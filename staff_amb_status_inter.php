<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management";
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$a_num=$_POST["amb_num"];
$status=$_POST["status"];
$sql1 = "UPDATE ambulance SET amb_avalable='".$status."' WHERE amb_sno='".$a_num."';";
if ($conn->query($sql1) === TRUE) {
  echo "<div>&nbsp; You have updated record successfully........</div><br>";
  $conn->close();
  header("Location:staff_amb_status.php");
} else {
  echo "Error: " . $sql1 . "!!!!<br>" . $conn->error;
}
$conn->close();
?>
