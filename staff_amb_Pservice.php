<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>YOUR HOSPITAL-Patient Ambulace Pickup</title>
    <style>
      body{
        color: rgb(0,120,120);
        /* margin-left: 10%; */
        font-size: 30px;
        background-color: #ffdfd6;
      }
      .topnav{
        right: 0%;
        left:0%;
        top: 0%;
        height: 53px;
        position: fixed;
        display: grid;
        grid-template-columns: 93.5% auto ;

      }
      .topnav,button {
        background-color: #640000;
        overflow: hidden;
      }
      .topnav a button{
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 20px;
        text-decoration: none;
        font-size: 17px;
      }
      .topnav a:hover button{
        background-color: #f70d10;
        color: black;
      }
      .topnav a.active button{
        background-color: #b20000;
        color: white;
      }
      .form{
        box-sizing: border-box;
    		width: 90%;
    		border: 10px solid #FF6F61;
        border-radius:20px;
    		float: left;
    		align-content: center;
    		align-items: center;
        margin-top: 7%;
        margin-left: 5%;
        margin-bottom: 2%;
        height:95%;
        background: #D3D3D3;
      }
      form {
    		margin: 0px auto;
    		width: 600px;
    	}
      label{
        font-size: 25px;
      }
      input{
        border-radius: 5px;
        width: 40%;
        height: 30px;
      }
      #button{
        background: yellow;
        align-self:center;
        width:110px;
        height:40px;

      }
      caption{
        border: 3px solid purple;
        border-radius: 5px 5px 0px 0px;
        background:#f8f8ff;
      }
      table{
        margin: 0%;
        /* left: 0px; */
        /* width:90%; */
        /* float: center; */
        /* align:center; */
        border-color: purple;
        border-width: 4px;
        background: #DfDfe5;
        border-radius: 0px 0px 10px 10px;
      }
      th{

        color: white;
        background: #704D99;
      }

  </style>
  </head>
  <body>
    <div class="topnav">
      <a class="active" href="login_staff.php"> <img src="https://surreyandsussex.nhs.uk/wp-content/uploads/2013/11/2013-11_Your-Hospital_Logo-full-PNG24.png" alt="LOGO" width="150" height="48"></a>
      <a class="active"><button type="button" name="button" onclick="logoutpage()">
      Logout</button></a>
      <script type="text/javascript">
        function logoutpage() {
          location.replace("logout_staff.php");
        }
      </script>
    </div>
    <div class="form">
      <form class="" action="staff_amb_Pservice_inter.php" method="post">
        <h1 align="center">Patient Ambulace Pickup Forms</h1>
        <label for="amb_num">Ambulance Serail Number:</label>
        <input type="text" name="amb_num" value="">
        <br><br>
        <label for="padd">Patient Addhar Number:</label>
        &nbsp; &nbsp;
        <input type="text" name="padd" value="">
        <br><br>
        <label for="charges">Ambulance Charge:</label>
        &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
        <input type="text" name="charges" value="">
        <br><br>
        <input id="button" type="button" name="" value="BACK" onclick="goBack()">
        <!-- <input id="button" type="button" name="" value="STATUS PAGE" onclick="Statuspage()"> -->
        <input id="button" type="submit" name="" value="SUBMIT" style="background: rgb(1,255,1);">
        <script type="text/javascript">
          // function Statuspage() {
          //   location.replace("staff_amb_status.php");
          // }
          function goBack() {
            location.replace("login_staff.php");
          }
        </script>
      </form>
      <br>
      <br>
    </div>
    &nbsp;
    <br>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hospital_management";
    $conn = new mysqli($servername, $username, $password,$dbname);
    $sql1 = "SELECT * FROM patient;";
    $result1 = $conn->query($sql1);
    ?>
    <br>
    <table border="1" >
    <caption>PATIENT RECORD TABLE</caption>
    <tr><th>Addhar no</th><th>Name</th><th>Age</th><th>Address</th><th>Test</th><th>Email</th><th>Doctor ID</th><th>Ambulance Serial number</th><th>Pending Bill Amout</th></tr>
    <?php
    if ($result1->num_rows > 0) {
        while($row = $result1->fetch_assoc()) {
          ?>
          <tr>
          <td><?php echo $row["addh_num"]; ?></td>
          <td><?php echo $row["name"]; ?></td>
          <td><?php echo $row["p_age"]; ?></td>
          <td><?php echo $row["address"]; ?></td>
          <td><?php echo $row["test"]; ?></td>
          <td><?php echo $row["p_email"]; ?></td>
          <td><?php
          if($row["d_id"]===null){
            echo "NOT ASSINGED";
          }else{
            echo $row["d_id"];
          }
          ?></td>
          <td><?php
          if($row["amb_sno"]===null){
            echo "NOT REQUIRED";
          }else{
            echo $row["amb_sno"];
          }
          ?></td>
          <td><?php echo $row["panding_bill"]; ?></td>
          </tr>
          <?php
        }
      }
    ?>
    </table>
    <br>
    <?php
    $sql1 = "SELECT * FROM ambulance;";
    $result = $conn->query($sql1);
    if ($result->num_rows > 0) {
      ?>
      <table border="1" style="margin:1% 35% 1% 35%;
      width:30%;">
      <caption> AMBULANCE STATUS</caption>
      <tr><th>Ambulane Serial</th><th>Area</th><th>Availability</th></tr>
      <?php
        while($row = $result->fetch_assoc()) {
          ?>
          <tr>
          <td><?php echo $row["amb_sno"]; ?></td>
          <td><?php echo $row["amb_area"]; ?></td>
          <td><?php echo $row["amb_avalable"]; ?></td>
          </tr>
          <?php
        }
        ?>
      </table>
        <?php
      }
    $conn->close();
    ?>
    <br><br>
  </body>
</html>
