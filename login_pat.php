<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>YOUR HOSPITAL-Welcome Patient</title>
    <style>
      body{
        color: rgb(0,120,120);
        /* margin-left: 10%; */
        font-size:27px;
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
        margin-top: 4%;
        width:90%;
        /* float: center; */
        /* align:center; */
        border-color: purple;
        border-width: 4px;
        background: #DfDfe5;
        border-radius: 0px 0px 10px 10px;
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
        width: 380px;
        background: yellow;
      }
      .message{
        /* align-items: center;
        align:center;
        align-self: center;
        background: white;
        border-radius: 10px;
        border: 3px solid black; */
        /* box-sizing: border-box; */
    		width: 90%;
    		border: 5px solid #FF6F61;
        border-radius:20px;
    		float: left;
    		align-content: center;
    		align-items: center;
        margin: 0% 5%;
        /* height:95%; */
        background: #D3D3D3;
      }
      h1{
        color: green;
      }
  </style>
  </head>
  <body>
    <?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hospital_management";
    $conn = new mysqli($servername, $username, $password,$dbname);
    $email = $_SESSION['patient_email'];
    $pass = $_SESSION['patient_pass'];
    $sql1 = "SELECT * FROM patient LEFT OUTER JOIN doctor ON patient.d_id=doctor.d_id WHERE patient.p_email='".$email."' AND patient.p_pass='".$pass."';";
    $result = $conn->query($sql1);
    $con=0;
    if ($result->num_rows > 0) {
      $con=1;
    }
    if($con==1){
      ?>
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
      <br>
      <br>

      <?php
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <h1 align="center">"Patience is a bitter plant, but its fruit is sweet."<h1>
        <h2 align="center">Welcome, <?php  echo $row["name"];?></h2>
        <br></b>
        <?php
      }?>

    <button id="bbutton" type="button" name="button" onclick="viewPersonal()" >
    Check Your Personal Details</button>
    <script type="text/javascript">
      function viewPersonal() {
        location.replace("patient_detail.php");
      }
    </script>
    <button id="bbutton" type="button" name="button" onclick="viewpricription()" >
    View Pricription</button>
    <script type="text/javascript">
      function viewpricription() {
        location.replace("patient_pricription.php");
      }
    </script>
    <br><br>
    <button id="bbutton" type="button" name="button" onclick="viewHospitalise()" >
    View Hospital Admit Details</button>
    <script type="text/javascript">
      function viewHospitalise() {
        location.replace("patient_hospitalise.php");
      }
    </script>
    <?php
    }else {
        // unset();
        unset($_SESSION["patient_email"]);
        unset($_SESSION["patient_pass"]);
        session_destroy();
      ?>
      <div class="topnav" style="grid-template-columns: 180px 94px 243.99px 117px 153.5px 150px 200px ;">
        <a class="active" href="homepage.php"> <img src="https://surreyandsussex.nhs.uk/wp-content/uploads/2013/11/2013-11_Your-Hospital_Logo-full-PNG24.png" alt="LOGO" width="150" height="48"></a>
        <a href="homepage.php"><button type="button" name="button">HOME</button></a>
        <a href="patient.html"><button type="button" name="button">PATIENT REGISTRATION</button></a>
        <a href="doctor.php"><button type="button" name="button">DOCTOR</button></a>
        <!-- <a href="about.html"><button type="button" name="button">ABOUT US</button></a> -->
        <a href="contact.html"><button type="button" name="button">CONTACT US</button></a>
        <a href="ambulance.php"><button type="button" name="button">AMBULANCE</button></a>
        <a class="active" href="login.html"><button type="button" name="button">LOGIN</button></a>
      </div>
      <br><br><br>
      <?php
      echo "<br><br><br><br><center>Email ID or Password is incorrect. Please try again or contact to hospital helpline number or email us on <a href='#'>admin@yourhospital.com</a>.</center><br><br><br>";
      ?>
      <form class="" action="login.html" method="post" align="center">
        <input type="submit" name="" value="Try Again"  style="height:40px; font-size: 20px; background:yellow; border-radius:10px;">
      </form>

      <?php
    }
    $conn->close();
    ?>
  </body>
</html>
