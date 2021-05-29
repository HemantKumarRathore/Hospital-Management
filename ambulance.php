<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>AMBULANCE PAGE</title>
    <style>
  body{
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
  }
  table{
    margin-bottom: 5%;
    align:center;
    border-color: purple;
    border-width: 1px;
    background: #DfDfe5;
    border-radius: 0px 0px 5px 5px;
  }
  caption{
    color: rgb(0,120,120);
    font-weight: bold;
    font-family:cursive;
    border: 3px solid purple;
    border-radius: 5px 5px 0px 0px;
    background:#f8f8ff;
  }
  th{
    font-size: 30px;
    color: white;
    background: #704D99;
  }
  </style>
  </head>
  <body>
    <div class="topnav">
      <a class="active" href="homepage.php"> <img src="https://surreyandsussex.nhs.uk/wp-content/uploads/2013/11/2013-11_Your-Hospital_Logo-full-PNG24.png" alt="LOGO" width="150" height="48"></a>
      <a href="homepage.php"><button type="button" name="button">HOME</button></a>
      <a href="patient.html"><button type="button" name="button">PATIENT REGISTRATION</button></a>
      <a href="doctor.php"><button type="button" name="button">DOCTOR</button></a>
      <!-- <a href="about.html"><button type="button" name="button">ABOUT US</button></a> -->
      <a href="contact.html"><button type="button" name="button">CONTACT US</button></a>
      <a class="active" href="ambulance.php"><button type="button" name="button">AMBULANCE</button></a>
      <a href="login.html"><button type="button" name="button">LOGIN</button></a>
    </div>
    <br>
    <p align="center"><img src="https://shantigopalhospitals.com/wp-content/uploads/2015/03/ambulance-banner.png" alt="COVID-19 CASES DISCRIPTION" align="center" style="height:4%; width:80%; border-radius:15px;"></p>

    <p align="center" style="color:green;">24x7 hour Service Avalable.<br><br>
      For Ambulane contact us: 1800 4569 7895 <br>
      Or Mail us for any other emergency: <a href="#">admin@yourhospital.com</a>
    </p>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hospital_management";
    $conn = new mysqli($servername, $username, $password,$dbname);
    $sql1 = "SELECT * FROM ambulance;";
    $result = $conn->query($sql1);
    if ($result->num_rows > 0) {
      ?>
      <br>
      <table border="1" align='center'>
      <caption> PLEASE CHECK AMBULANE AVAILABILITY STATUS</caption>
      <tr><th>Ambulane Serial</th><th>Area</th><th>Status</th></tr>
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
  </body>
</html>
