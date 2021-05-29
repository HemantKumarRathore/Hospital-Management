<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>YOUR HOSPITAL-Prescription Record</title>
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
        margin-top: 8%;
        margin-bottom: 5%;
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
  </style>
  </head>
  <body>
    <div class="topnav">
      <a class="active" href="homepage.html"> <img src="https://surreyandsussex.nhs.uk/wp-content/uploads/2013/11/2013-11_Your-Hospital_Logo-full-PNG24.png" alt="LOGO" width="150" height="48"></a>

      <a class="active"><button type="button" name="button" onclick="logoutpage()">
      Logout</button></a>
      <script type="text/javascript">
        function logoutpage() {
          location.replace("logout_doc.php");
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
    $sql1 = "SELECT * FROM patient NATURAL JOIN doctor LEFT OUTER JOIN prescription ON patient.addh_num=prescription.p_addh_num;";
    $result = $conn->query($sql1);
    if($result->num_rows!==0){
      if ($result->num_rows > 0) {
        ?>
        <br>
        <table border="1" align='center'>
        <caption>Patient Prescriptions Record</caption>
        <tr><th>Doctor</th><th>Patient Addhar Number</th><th>Patient Name</th><th>Prescription ID</th><th>Prescription</th></tr>
        <?php
          while($row = $result->fetch_assoc()) {
            ?>
            <tr>

            <td style="width:200px;"><?php echo $row["d__name"]; ?></td>
            <td><?php echo $row["addh_num"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php
              if($row["pri_id"]===null){
                echo "Not given";
              }else{
                echo $row["pri_id"];
              }
             ?></td>
             <td><?php
               if($row["pri_dis"]===null){
                 echo "Not given";
               }else{
                 echo $row["pri_dis"];
               }
              ?></td>
            </tr>
            <?php
          }
          ?></table><?php
        }
      }else {
        echo "<br><br><br><br><center>The prescription record is empty<br>or<br> <font color='red'>If prescription is given by any doctor, then doctor is not assinged to the patient</font>. Please contact to staff.</center><br><br><br><br>";
      }
        ?>

      <button type="button" name="button" onclick="goBack()" style="background: yellow;
                                                                    float:left;
                                                                    border-radius: 10px;
                                                                    margin-bottom: 5%;
                                                                    margin-left:10%;
                                                                    font-size:20px;">
      Go Back</button>
      <script type="text/javascript">
        function goBack() {
          location.replace("login_doc.php");
        }
      </script>
      <?php
    $conn->close();
    ?>
  </body>
</html>
