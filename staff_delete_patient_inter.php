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
$sql1 = "DELETE FROM patient WHERE addh_num='".$a_num."';";
if ($conn->query($sql1) === TRUE) {
  echo "<div>&nbsp; You have updated record successfully........</div><br>";
  $conn->close();
  header("Location:staff_delete_patient.php");
} else {
  echo "Error: " . $sql1 . "!!!!<br>" . $conn->error;
  $conn->close();
}

?>
