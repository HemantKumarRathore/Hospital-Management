<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>YOUR HOSPITAL-Patient Login Page</title>
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
      td{
        text-align: center;
        padding: 10px;
      }
      table{
        /* margin: 10%; */
        float: center;
        border-color: purple;
        border-width: 4px;
        background: #DfDfe5;
      }
      caption{
        border: 3px solid purple;
        border-radius: 5px 5px 0px 0px;
        background:#f8f8ff;
      }
      .form{
        box-sizing: border-box;
    		width: 90%;
    		border: 10px solid #FF6F61;
        border-radius:20px;
    		float: left;
    		align-content: center;
    		align-items: center;
        margin: 1% 5%;
        height:95%;
        background: #D3D3D3;
      }
      form {
    		margin: 0 auto;
    		width: 600px;
    	}
      label{
        font-size: 25px;
      }
      input{
        border-radius: 5px;
        width: 50%;
        height: 30px;
      }
      #sub{
        align-self:center;
        background: yellow;
        width:100px;
        height:40px;
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
    <br><br><br>
    <div class="form">
      <form class="" action="assign_doctor_staff_value.php" method="post">
        <h1 align="center">Assing Doctor to Patient</h1>
        <label for="p_addhar">Patient Addhar Number:</label>
        &nbsp;
        <input type="text" name="p_addhar" value="">
        <br><br>
        <label for="d_id">Doctor ID:</label>
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="d_id" value="">
        <br><br>
        <input id="sub" type="button" name="" value="BACK" onclick="goBack()">
        <input id="sub" type="submit" name="" value="SUBMIT" style="background: rgb(1,255,1);">
      </form>
      <script type="text/javascript">
        function goBack() {
          location.replace("login_staff.php");
        }
      </script>
      <br><br>
    </div>

    <?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hospital_management";
    $conn = new mysqli($servername, $username, $password,$dbname);
    $sql1 = "SELECT * FROM patient;";
    $result1 = $conn->query($sql1);
    ?>
    &nbsp;
    <br>
    <table border="1" align='center'>
    <caption>PATIENT RECORD TABLE</caption>
    <tr><th>Addhar no</th><th>Name</th><th>Age</th><th>COVID-19</th><th>Test</th><th>Email</th><th>Doctor ID</th></tr>
    <?php
    if ($result1->num_rows > 0) {
        while($row = $result1->fetch_assoc()) {
          ?>
          <tr>
          <td><?php echo $row["addh_num"]; ?></td>
          <td><?php echo $row["name"]; ?></td>
          <td><?php echo $row["p_age"]; ?></td>
          <!-- <td>
            <?php //echo $row["address"]; ?>
          </td> -->
          <td>
            <?php
              if($row["covid"]==="+VE"){
                echo "POSITIVE";
              }else if($row["covid"]==="-VE"){
                echo "NEGATIVE";
              }else{
                echo "NOT TESTED";
              }
            ?>
          </td>
          <td><?php echo $row["test"]; ?></td>
          <td><?php echo $row["p_email"]; ?></td>
          <td><?php
                if($row["d_id"]===null){
                  echo "NOT ASSINGED";
                }else{
                  echo $row["d_id"];
                }
              ?>
          </td>
          </tr>
          <?php
        }
      }
    ?>
    </table>
    <?php
    $sql2 = "SELECT * FROM doctor;";
    $result2 = $conn->query($sql2);
      ?>
      <br>
      <table border="1" align='center'>
      <caption>DOCTOR RECORD TABLE</caption>
      <tr><th>Doctor ID</th><th>Name</th><th>Mobile</th><th>Departement Number</th><th>Email</th></tr>
      <?php
      if ($result2->num_rows > 0) {
          while($row = $result2->fetch_assoc()) {
            ?>
            <tr>
            <td><?php echo $row["d_id"]; ?></td>
            <td><?php echo $row["d__name"]; ?></td>
            <td><?php echo $row["mobile"]; ?></td>
            <td><?php echo $row["dep_no"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            </tr>
            <?php
          }
      }
      ?>
    </table>

    <?php
    $conn->close();
    ?>
    <br><br>
  </body>
</html>
