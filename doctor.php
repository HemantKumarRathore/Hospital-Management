<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>YOUR HOSPITAL-Doctor Page</title>
    <style>
      body{
        font-size: 25px;
        background-color: #ffdfd6;
      }
      .topnav{
        right: 0%;
        left:0%;
        top: 0%;
        position: fixed;
        display: grid;
        height: 53px;
        /* grid-template-columns: 180px 94px 196.5px 94px 111.5px 125.5px 128.5px 200px ; */
        /* grid-template-columns: 180px 94px 243.99px 117px 131px 153.5px 150px 200px ; */
        grid-template-columns: 180px 94px 243.99px 117px 153.5px 150px 200px ;

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
        color: #32174d;
        text-align: center;
        padding: 10px;
        font-weight: bold;
      }
      th{
        color: white;
        background: #704D99;
      }
      table{
        margin: 10%;
        float: center;
        border-color: purple;
        border-width: 0.5px;
        background: #DfDfe5;
        border-radius: 0px 0px 10px 10px;
      }
      caption{
        color: rgb(0,120,120);
        font-weight: bold;
        font-family:cursive;
        border: 3px solid purple;
        border-radius: 5px 5px 0px 0px;
        background:#f8f8ff;
      }
    </style>
  </head>
  <body>
    <div class="topnav">
      <a class="active" href="homepage.php"> <img src="https://surreyandsussex.nhs.uk/wp-content/uploads/2013/11/2013-11_Your-Hospital_Logo-full-PNG24.png" alt="LOGO" width="150" height="48"></a>
      <a href="homepage.php"><button type="button" name="button">HOME</button></a>
      <a href="patient.html"><button type="button" name="button">PATIENT REGISTRATION</button></a>
      <a class="active" href="doctor.php"><button type="button" name="button">DOCTOR</button></a>
      <!-- <a href="about.html"><button type="button" name="button">ABOUT US</button></a> -->
      <a href="contact.html"><button type="button" name="button">CONTACT US</button></a>
      <a href="ambulance.php"><button type="button" name="button">AMBULANCE</button></a>
      <a href="login.html"><button type="button" name="button">LOGIN</button></a>
    </div>
    <br>
    <p align="center"><img src="https://th.bing.com/th/id/R0d9fcb4968a4384b2392838b2b630d10?rik=LjDs%2frlsQJKx4w&riu=http%3a%2f%2foneclinic.shearwaterasia.com%2fwp-content%2fuploads%2f2017%2f05%2fDOCTORS_BANNER-1.jpg&ehk=FXngiibGDt4BEpRw0KkZQNtc9LBSxqdPId71dqTWr68%3d&risl=&pid=ImgRaw" alt="COVID-19 CASES DISCRIPTION" align="center" style="height:3%; width:90%; border-radius:15px;"></p>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hospital_management";
    $conn = new mysqli($servername, $username, $password,$dbname);
    $sql1 = "SELECT * FROM doctor RIGHT OUTER JOIN department on doctor.d_id=department.spe_d_id;";
    $result = $conn->query($sql1);
    $con=0;
    if ($result->num_rows > 0) {
      $con=1;
    }
    // $row = $result->fetch_assoc();
    ?>
    <br>
    <table border="1" align='center' style="width:60%; margin:0.5% 20% 1% 20%;">
    <caption>OUR SPECIALIST DOCTOR</caption>
    <tr><th>Name</th><th>Departement</th><th>Email</th></tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          ?>
          <tr>
          <td style="width:300px;"><?php echo $row["d__name"]; ?></td>
          <td><?php echo $row["dep_name"]; ?></td>
          <td><?php echo $row["email"]; ?></td>
          </tr>
          <?php
        }
      }
      ?>
      </table>

      <?php
      $sql2 = "SELECT * from doctor natural join department where doctor.d_id not in (select spe_d_id from department);";
      $result2 = $conn->query($sql2);
      // $row = $result->fetch_assoc();
      ?>
      <br>
      <table border="1" align='center' style="width:60%; margin:0% 20% 5% 20%;">
      <caption>OUR ALL BEST EXPERIANCED DOCTORS</caption>
      <tr><th>Name</th><th>Departement</th><th>Email</th></tr>
      <?php
      if ($result2->num_rows > 0) {
          while($row = $result2->fetch_assoc()) {
            // if($row["spec_d_id"]===null){
            // echo ($row["spec_d_id"]===null);
              ?>
              <tr>
              <td style="width:300px;"><?php echo $row["d__name"]; ?></td>
              <td><?php echo $row["dep_name"]; ?></td>
              <td><?php echo $row["email"]; ?></td>
              </tr>
              <?php
            // }
          }
        }
      ?>
      </table>
      <?php
    $conn->close();
    ?>
  </body>
</html>
