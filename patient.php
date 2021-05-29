<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Patient detail</title>
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
        position: fixed;
        display: grid;
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
      th{
        color: white;
        background: #704D99;
      }
      table{
        float: left;
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
      <a class="active" href="homepage.php"> <img src="https://surreyandsussex.nhs.uk/wp-content/uploads/2013/11/2013-11_Your-Hospital_Logo-full-PNG24.png" alt="LOGO" width="150" height="45"></a>
      <a href="homepage.php"><button type="button" name="button">HOME</button></a>
      <a class="active" href="patient.html"><button type="button" name="button">Pasient Registration</button></a>
      <a href="doctor.php"><button type="button" name="button">Doctor</button></a>
      <a href="about.html"><button type="button" name="button">About us</button></a>
      <a href="contact.html"><button type="button" name="button">Contact us</button></a>
      <a href="ambulance.php"><button type="button" name="button">Ambulance</button></a>
      <a href="login.html"><button type="button" name="button">Login</button></a>
    </div>
    <br>
    <br>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hospital_management";
    $conn = new mysqli($servername, $username, $password,$dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $addhar = $_POST["addhNo"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    if($_POST["gender"]==='m'){
      $gen = "M";
    }else if($_POST["gender"]==='f'){
      $gen = "F";
    }else{
      $gen = $_POST["gender"];
    }
    $cov = strtoupper($_POST["covid"]);
    $address = strtoupper($_POST["add"]);
    $test = strtoupper($_POST["tname"]);
    $email = $_POST["eml"];
    $pass = $_POST["pass"];
    $pending = 500;
    $sql2 = "SELECT * FROM patient WHERE addh_num='".$addhar."';";
    $result = $conn->query($sql2);
    $con=0;
    if ($result->num_rows > 0) {
      $con=1;
    }
    if($con==0){
      // $sql1 = "INSERT INTO patient (addh_num,name,p_age,p_gender,address,test,p_email,p_pass,d_id,panding_bill,covid) VALUES ('".$addhar."','".$name."','".$age."','".$gen."','".$address."','".$test."','".$email."','".$pass."','".$doc_no."','".$pending."','".$cov."');";
      $sql1 = "INSERT INTO patient(addh_num, name, p_age, p_gender, address, test, p_email, p_pass, d_id, panding_bill, covid,amb_sno,bed_id)
      VALUES ('".$addhar."','".$name."','".$age."','".$gen."','".$address."','".$test."','".$email."','".$pass."',null,'".$pending."','".$cov."',null,null);";
      if ($conn->query($sql1) === TRUE) {
        echo "<div>&nbsp; You have registered successfully........</div><br>";
      } else {
        echo "Error: " . $sql1 . "!!!!<br>" . $conn->error;
      }
      $sql2 = "SELECT * FROM patient WHERE addh_num='".$addhar."';";
      $result = $conn->query($sql2);
      // $sql1=mysqli_query($conn,"SELECT * FROM student WHERE addh_num='$addhar'");
      // $row=mysqli_fetch_array($sql1);
      ?>
      <br>
      <table border="1" align='center'>
      <caption>Patient RECORD TABLE</caption>
      <tr><th>Addhar no</th><th>Name</th><th>Age</th><th>Gender</th><th>Address</th><th>Covid</th><th>Test</th><th>Email</th><th>Password</th><th>Pending Bill Amout</th></tr>
      <?php
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            ?>
            <tr>
            <td><?php echo $row["addh_num"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["p_age"]; ?></td>
            <td><?php echo $row["p_gender"]; ?></td>
            <td><?php echo $row["address"]; ?></td>
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
            <td><?php echo $row["p_pass"]; ?></td>
            <td><?php echo $row["panding_bill"]; ?></td>
            </tr>
            <?php
          }
      }
      ?>
      </table>
      <p align="center"><font size="+1" color="red">&nbsp;*The bill amount
        dispalyed in the Pending bill amount is the registration fee. It may
        increase based on Other servies.*&nbsp;</font>
      </p>
      <?php

    }else {
      $error="<p align='center'>The given Addhar number of Patient is already registered, please <a href='patient.html'>try</a> to enter Addhar number properly or contact reception staff <br><br> or <br><br> This page has been refresed. Please <a href='login.html'>login</a> to check your details.</p>";
      echo $error;
    }
    $conn->close();
    ?>
    <!-- <h1>Hello there!</h1> -->
  </body>
</html>
