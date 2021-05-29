<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>YOUR HOSPITAL-Prescription</title>
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
      th{
        color: white;
        background: #704D99;
      }
      table{
        margin: 10%;
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
      <a class="active" href="homepage.html"> <img src="https://surreyandsussex.nhs.uk/wp-content/uploads/2013/11/2013-11_Your-Hospital_Logo-full-PNG24.png" alt="LOGO" width="150" height="48"></a>

      <a class="active"><button type="button" name="button" onclick="logoutpage()">
      Logout</button></a>
      <script type="text/javascript">
        function logoutpage() {
          location.replace("logout_pat.php");
        }
      </script>

    </div>

    <?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hospital_management";
    $conn = new mysqli($servername, $username, $password,$dbname);
    $email=$_SESSION['patient_email'];
    $sql = "SELECT * FROM patient NATURAL JOIN doctor LEFT OUTER JOIN prescription ON patient.addh_num=prescription.p_addh_num where p_email='".$email."';";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <br><br><br>
    <?php
    if($result->num_rows!==0){
      // if($row['pri_ID']!==null) {
        ?>
        <br><br><br>
        <table border="1" align='center' style="margin: 1% 22% 1% 24%; width:50%;">
        <caption>YOUR PRECRIPTION</caption>
        <tr><th>Doctor Name</th><th>Prescription ID</th><th>Prescription</th></tr>
        <?php
        $sql1 = "SELECT * FROM patient NATURAL JOIN doctor LEFT OUTER JOIN prescription ON patient.addh_num=prescription.p_addh_num where p_email='".$email."';";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            while($row = $result1->fetch_assoc()) {
                ?>
                <tr>
                <td style="width:280px;"><?php echo $row["d__name"]; ?></td>
                <td><?php
                  if($row["pri_id"]===null){
                    echo "NOT GIVEN";
                  }else{
                    echo $row["pri_id"];
                  }
                 ?></td>
                 <td><?php
                   if($row["pri_dis"]===null){
                     echo "NOT GIVEN";
                   }else{
                     echo $row["pri_dis"];
                   }
                  ?></td>
                </tr>
                <?php
            }
            ?></table><?php
          }else{
            echo '<br><br><br><br><p align="center">Prescription is not give or uploaded successfully. Please contact to staff.</p><br><br><br>';
          }
      }else{
        echo '<br><br><br><br><p align="center">Doctor is not assinged to you. Please contact to staff.</p><br><br><br>';
      }
    ?>
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
