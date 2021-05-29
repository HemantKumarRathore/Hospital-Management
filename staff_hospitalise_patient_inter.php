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
$bedID=$_POST["bedID"];
$charges=$_POST["charges"];
$sql_check="SELECT * FROM patient WHERE addh_num='".$a_num."';";
$result_check = $conn->query($sql_check);
$row_check = $result_check->fetch_assoc();
$sql="SELECT * FROM hospital;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if($bedID==='gen111' && $row["o_general"]>=0 && $row["o_general"]<=150 && $row_check["bed_id"]===null){
  $sql1="UPDATE patient SET panding_bill=panding_bill+'".$charges."',bed_id='$bedID' WHERE addh_num='".$a_num."';";
  $sql2="UPDATE hospital SET o_general=o_general+1;";
  if ($conn->query($sql1)===TRUE && $conn->query($sql2)===TRUE) {
    echo "<div>&nbsp; You have updated record successfully........</div><br>";
    $conn->close();
    header("Location:staff_hospitalise_patient.php");
  } else {
    echo "Error: " . $sql1 . "!!!!<br>" . $conn->error;
  }
  $conn->close();
}elseif ($bedID==='icu222' && $row["o_icu"]>=0 && $row["o_icu"]<=50 && $row_check["bed_id"]===null){
  $sql1="UPDATE patient SET panding_bill=panding_bill+'".$charges."',bed_id='$bedID' WHERE addh_num='".$a_num."';";
  $sql2="UPDATE hospital SET o_icu=o_icu+1;";
  if ($conn->query($sql1)===TRUE && $conn->query($sql2)===TRUE) {
    echo "<div>&nbsp; You have updated record successfully........</div><br>";
    $conn->close();
    header("Location:staff_hospitalise_patient.php");
  } else {
    echo "Error: " . $sql1 . "!!!!<br>" . $conn->error;
  }
  $conn->close();
}else {
  $conn->close();
  header("Location:staff_hospitalise_patient.php");
}

?>
