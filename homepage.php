<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>YOUR HOSPITAL-Home</title>
    <style>
      body{
        background-color: #ffdfd6;
      }
      .topnav{
        right: 0%;
        left:0%;
        top: 0%;
        position: fixed;
        display: grid;
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
      caption{
        border: 3px solid purple;
        border-radius: 10px 10px 0px 0px;
        background:#f8f8ff;
      }
      table{
        font-size: 22px;
        /* padding:10px */
        margin-top: 2.5%;
        /* left: 0px; */
        /* width:90%; */
        /* float: center; */
        /* align:center; */
        border-color: purple;
        border-width: 4px;
        background: #DfDfe5;
        border-radius: 0px 0px 10px 10px;
      }
  </style>
  </head>
  <body>
    <div class="topnav">
      <a class="active" href="homepage.php"> <img src="https://surreyandsussex.nhs.uk/wp-content/uploads/2013/11/2013-11_Your-Hospital_Logo-full-PNG24.png" alt="LOGO" width="150" height="48"></a>
      <a class="active" href="homepage.php"><button type="button" name="button">HOME</button></a>
      <a href="patient.html"><button type="button" name="button">PATIENT REGISTRATION</button></a>
      <a href="doctor.php"><button type="button" name="button">DOCTOR</button></a>
      <!-- <a href="about.html"><button type="button" name="button">ABOUT US</button></a> -->
      <a href="contact.html"><button type="button" name="button">CONTACT US</button></a>
      <a href="ambulance.php"><button type="button" name="button">AMBULANCE</button></a>
      <a href="login.html"><button type="button" name="button">LOGIN</button></a>
    </div>
    <br><br>
    <h1 align="center">
      <span style="background:rgb(40,255,40); font-size:60px; font-family: cursive; border-radius:15px;">&nbsp;Y&nbsp;</span>
      <span style="background:rgb(255,40,40,0.9); font-size:60px; font-family: fantasy; border-radius:15px;">&nbsp;O&nbsp;</span>
      <span style="background:rgb(100,100,255); font-size:60px; font-family: monospace; border-radius:15px;">&nbsp;U&nbsp;</span>
      <span style="background:rgb(0,255,255); font-size:60px;font-family: sans-serif; border-radius:15px;">&nbsp;R&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;
      <span style="background:rgb(204,0,204); font-size:60px; font-family: cursive; border-radius:15px;">&nbsp;H&nbsp;</span>
      <span style="background:rgb(255,150,150); font-size:60px; font-family: fantasy; border-radius:15px;">&nbsp;O&nbsp;</span>
      <span style="background:rgb(255,51,119); font-size:60px; font-family: serif; border-radius:15px;">&nbsp;S&nbsp;</span>
      <span style="background:rgb(255,255,102); font-size:60px; font-family: monospace; border-radius:15px;">&nbsp;P&nbsp;</span>
      <span style="background:rgb(212,0,255); font-size:60px; font-family: serif; border-radius:15px;">&nbsp;I&nbsp;</span>
      <span style="background:rgb(255,204,102); font-size:60px; font-family: sans-serif; border-radius:15px;">&nbsp;T&nbsp;</span>
      <span style="background:rgb(200,255,20); font-size:60px; font-family: cursive; border-radius:15px;">&nbsp;A&nbsp;</span>
      <span style="background:rgb(255,145,229); font-size:60px; font-family: monospace; border-radius:15px;">&nbsp;L&nbsp;</span>
    </h1>
    <a href="https://www.covid19india.org/"><img src="https://www.catawbavalleyhealth.org/images/Coronavirus-Webpage-graphic-revised.jpg" alt="COVID-19 CASES DISCRIPTION" style="height:5%; width:100%; border-radius:15px;"></a>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hospital_management";
    $conn = new mysqli($servername, $username, $password,$dbname);
    $sql1 = "SELECT * FROM hospital NATURAL JOIN doctor;";
    $result1 = $conn->query($sql1);
    ?>
    <table border="1" cellspacing='10px' align="center">
    <caption>Hospital Status </caption>
    <tr>
      <th style="background:purple; color:white;" align='center'>Hospital Incharge</th>
      <th style="background:orange; color:white;" align='center'>Total General Beds</th>
      <th style="background:red; color:white;" align='center'>Occupied General Beds</th>
      <th style="background:green; color:white;" align='center'>Vaccant General Beds</th>
      <th style="background:orange; color:white;" align='center'>Total ICU Beds</th>
      <th style="background:red; color:white;" align='center'>Occupied ICU Beds</th>
      <th style="background:green; color:white;" align='center'>Vaccant ICU Beds</th>
    </tr>
    <?php
    if ($result1->num_rows > 0) {
        $row = $result1->fetch_assoc();
        ?>
        <tr>
        <td style="background:purple; color:white;" align='center'><?php echo $row["d__name"]; ?></td>
        <td style="background:orange; color:white;" align='center'><?php echo $row["t_general"]; ?></td>
        <td style="background:red; color:white;" align='center'><?php echo $row["o_general"]; ?></td>
        <td style="background:green; color:white;" align='center'><?php echo $row["t_general"]-$row["o_general"]; ?></td>
        <td style="background:orange; color:white;" align='center'><?php echo $row["t_icu"]; ?></td>
        <td style="background:red; color:white;" align='center'><?php echo $row["o_icu"]; ?></td>
        <td style="background:green; color:white;" align='center'><?php echo $row["t_icu"]-$row["o_icu"]; ?></td>
        </tr>
        <?php
      }
    ?>
    </table>
    <?php
    $conn->close();
    ?>
  </body>
</html>
