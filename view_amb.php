<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home Page</title>
    <style>
  body{
    background-color: #ffdfd6;
    font-size: 30px;
  }
  .topnav{
    right: 0%;
    left:0%;
    top: 0%;
    position: fixed;
    display: grid;
    /* grid-template-columns: 180px 94px 196.5px 94px 111.5px 125.5px 128.5px 200px ; */
    grid-template-columns: 180px 94px 196.5px 94px 111.5px 125.5px 128.5px 200px ;

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
    margin-top: 1%;
    /* float: center; */
    align:center;
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
      <a class="active" href="homepage.php"> <img src="https://surreyandsussex.nhs.uk/wp-content/uploads/2013/11/2013-11_Your-Hospital_Logo-full-PNG24.png" alt="LOGO" width="150" height="48"></a>
      <a href="homepage.php"><button type="button" name="button">HOME</button></a>
      <a href="patient.html"><button type="button" name="button">Pasient Registration</button></a>
      <a href="doctor.html"><button type="button" name="button">Doctor</button></a>
      <a href="about.html"><button type="button" name="button">About us</button></a>
      <a href="contact.html"><button type="button" name="button">Contact us</button></a>
      <a class="active" href="ambulance.html"><button type="button" name="button">Ambulance</button></a>
      <a href="login.html"><button type="button" name="button">Login</button></a>
    </div>
    <br><br><br>
    <?php
    session_start();
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
      <caption> Ambulance Status</caption>
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
