<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>YOUR HOSPITAL-Welcome Doctor</title>
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
        width: 420px;
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
    $email = $_SESSION['doc_email'];
    $pass = $_SESSION['doc_pass'];
    $sql1 = "SELECT * FROM doctor WHERE email='".$email."' AND d_pass='".$pass."';";
    $result = $conn->query($sql1);
    $con=0;
    if ($result->num_rows > 0) {
      $con=1;
    }
    if($con==1){
        $row = $result->fetch_assoc();
        ?>
        <div class="topnav">
          <a class="active" href="login_doc.php"> <img src="https://surreyandsussex.nhs.uk/wp-content/uploads/2013/11/2013-11_Your-Hospital_Logo-full-PNG24.png" alt="LOGO" width="150" height="48"></a>

          <a class="active"><button type="button" name="button" onclick="logoutpage()">
          Logout</button></a>
          <script type="text/javascript">
            function logoutpage() {
              location.replace("logout_doc.php");
            }
          </script>

        </div>
        <br>
        <h2 align="center" style="color:green;">Welcome, <?php  echo $row["d__name"];?></h2>
        <div class="message">

          <h3 style="color:rgb(255,1,1);" align='center'>Message</h3>
          <hr>
        <?php
        $sql2 = "SELECT * FROM message;";
        $result2 = $conn->query($sql2);
        ?>
        <ul>
        <?php
        if ($result2->num_rows > 0) {
            while($row = $result2->fetch_assoc()) {
         ?>
          <li><?php echo $row["message_discription"]; ?></li>
        <?php
            }
        }
         ?>
         </ul>
         </div>
         &nbsp;
         <br>
        <button id="bbutton" type="button" name="button" onclick="viewPersonal()" >
        Check Your Personal Details</button>
        <script type="text/javascript">
          function viewPersonal() {
            location.replace("doc_detail.php");
          }
        </script>
        <button id="bbutton" type="button" name="button" onclick="viewPatient()" >
        View Your's Patient Details</button>
        <script type="text/javascript">
          function viewPatient() {
            location.replace("doc_patient.php");
          }
        </script>
        <br>
        <button id="bbutton" type="button" name="button" onclick="viewCovPatient()" >
        View COVID-19 Tested Patient Details</button>
        <script type="text/javascript">
          function viewCovPatient() {
            location.replace("doc_Covpatient.php");
          }
        </script>

        <button id="bbutton" type="button" name="button" onclick="viewNonCovPatient()" >
        View Patient Details Without COVID-19 Test</button>
        <script type="text/javascript">
          function viewNonCovPatient() {
            location.replace("doc_NonCovpatient.php");
          }
        </script>
        <br>

        <button id="bbutton" type="button" name="button" onclick="viewUassistant()" >
        View Staff details under you</button>
        <script type="text/javascript">
          function viewUassistant() {
            location.replace("doc_assistant_staff.php");
          }
        </script>

        <button id="bbutton" type="button" name="button" onclick="pricription()" >
        Patient Prescription </button>
        <script type="text/javascript">
          function pricription() {
            location.replace("doc_patient_pric.php");
          }
        </script>
        <br>
        <button id="bbutton" type="button" name="button" onclick="patient_pricription()" >
        View Patient Pricription</button>
        <script type="text/javascript">
          function patient_pricription() {
            location.replace("doc_viewpatient_pric.php");
          }
        </script>
      <?php
    }else {
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
      echo "<br><br><br><center>Email ID or Password is incorrect. Please try again or contact to software development team.</center><br><br><br>";
      ?>

      <form class="" action="login_doct.html" method="post" align="center">
        <input type="submit" name="" value="Try Again" style="height:40px; font-size: 20px; background:yellow; border-radius:10px;">
      </form>
      <?php
    }
    $conn->close();
    ?>
  </body>
</html>
