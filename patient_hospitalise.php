<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>YOUR HOSPITAL-Hospitalization details</title>
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
        align-self:center;
        width:100px;
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
      #bbutton{
        background: white;
        float:center;
        border-radius: 10px;
        margin-left:10%;
        margin-right:10%;
        font-size:20px;
        width: 150px;
        background: yellow;
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
          location.replace("logout_pat.php");
        }
      </script>
    </div>
    <br><br>
    <?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hospital_management";
    $conn = new mysqli($servername, $username, $password,$dbname);
    $email = $_SESSION['patient_email'];
    $pass = $_SESSION['patient_pass'];
    $sql1 = "SELECT * FROM patient NATURAL JOIN doctor WHERE patient.p_email='".$email."' AND patient.p_pass='".$pass."';";
    $result1 = $conn->query($sql1);
    ?>
    <br>
    <?php
    if ($result1->num_rows > 0) {
        while($row = $result1->fetch_assoc()){
          ?>
          <table border="1" style="margin:1% 20% 1% 20%; width:60%;" cellpadding='7.5px'>
          <caption>Hospitalization Details</caption>
          <tr><th>Name</th><th>Test</th><th>Doctor Name</th><th>Ambulance Serial number</th><th>Bed Type</th></tr>
          <tr>
          <td><?php echo $row["name"]; ?></td>
          <td><?php echo $row["test"]; ?></td>
          <td><?php echo $row["d__name"]; ?></td>
          <td><?php
          if($row["amb_sno"]===null){
            echo "NOT REQUIRED";
          }else{
            echo $row["amb_sno"];
          }
          ?></td>
          <td><?php
          if($row["bed_id"]===null){
            echo "NOT REQUIRED";
          }elseif ($row["bed_id"]==='icu222'){
            echo "ICU";
          }else{
            echo "GENERAL";
          }
          ?></td>
          </tr>
          <?php
        }
      }else{
        echo "<br><br><br><center>Doctor is not assinged to you. Plase contact reception staff.</center><br><br><br>";
      }
    ?>
  </table>
  <br>
  <button id='bbutton' type="button" name="button" onclick="goBack()" >
  Go Back</button>
  <script type="text/javascript">
    function goBack() {
      location.replace("login_pat.php");
    }
  </script>
    <?php

    $conn->close();
    ?>

  </body>
</html>
