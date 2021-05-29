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
$charges=intval($_POST["charges"]);
$sql="SELECT * FROM hospital;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$sql_check="SELECT * FROM patient WHERE addh_num='".$a_num."';";
$result_check = $conn->query($sql_check);
$row_check = $result_check->fetch_assoc();
// if($row_check["bed_id"]!==''){
if($row["o_general"]>0 && $row_check["bed_id"]!==''){
  $sql1="UPDATE patient SET panding_bill=panding_bill+'".$charges."',bed_id=null WHERE addh_num='".$a_num."';";
  $sql2="UPDATE hospital SET o_general=o_general-1;";
  if ($conn->query($sql1)===TRUE && $conn->query($sql2)===TRUE) {
    echo "<div>&nbsp; You have updated record successfully........</div><br>";
    $conn->close();
    header("Location:staff_discharge_patient.php");
  } else {
    echo "Error: " . $sql1 . "!!!!<br>" . $conn->error;
  }
  $conn->close();
}elseif ($row["o_icu"]>0 && $row_check["bed_id"]!==''){
  $sql1="UPDATE patient SET panding_bill=panding_bill+'".$charges."',bed_id=null WHERE addh_num='".$a_num."';";
  $sql2="UPDATE hospital SET o_icu=o_icu-1;";
  if ($conn->query($sql1)===TRUE && $conn->query($sql2)===TRUE) {
    echo "<div>&nbsp; You have updated record successfully........</div><br>";
    $conn->close();
    header("Location:staff_discharge_patient.php");
  } else {
    echo "Error: " . $sql1 . "!!!!<br>" . $conn->error;
  }
  $conn->close();
}else {
  $conn->close();
  header("Location:staff_discharge_patient.php");
}
// }else{}
?>
