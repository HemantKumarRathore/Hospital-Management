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
$amb_snum=$_POST["padd"];
$charges=intval($_POST["charges"]);
$sql1 = "UPDATE patient SET amb_sno='".$a_num."',panding_bill=panding_bill+'".$charges."' WHERE addh_num='".$amb_snum."';";
$sql2 = "UPDATE ambulance SET amb_avalable='Not Available' WHERE amb_sno='".$a_num."';";
if ($conn->query($sql1) === TRUE && $conn->query($sql2)) {
  echo "<div>&nbsp; You have updated record successfully........</div><br>";
  $conn->close();
  header("Location:staff_amb_Pservice.php");
} else {
  echo "Error: " . $sql1 . "!!!!<br>" . $conn->error;
  $conn->close();
}

?>
