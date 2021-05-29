<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>YOUR HOSPITAL-Incharge Detail</title>
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
        margin-bottom: 7.5%;
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
    <?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hospital_management";
    $email=$_SESSION['staff_email'];
    $conn = new mysqli($servername, $username, $password,$dbname);
    $sql1 = "SELECT DISTINCT(d_id),d__name,mobile,dep_name FROM staff NATURAL join doctor natural join department where staff.s_email='".$email."';";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
        ?>
        <br>
        <table border="1" align='center'>
        <caption>YOUR INCHARGE INFORMATION</caption>
        <tr><th>Doctor ID</th><th>Doctor Name</th><th>Mobile</th><th>Departement Name</th></tr>
        <?php
        while($row = $result1->fetch_assoc()) {
          ?>
          <tr>
          <td><?php echo $row["d_id"]; ?></td>
          <td><?php echo $row["d__name"]; ?></td>
          <td><?php echo $row["mobile"]; ?></td>
          <td><?php echo $row["dep_name"]; ?></td>
          </tr>
          <?php
        }
        ?></table><?php
      }else{
        echo "<br><br><br><center> You are not assigned under any doctor. Please contact Software Development team.</center><br><br><br>";
      }
    ?>

    <button type="button" name="button" onclick="goBack()" style="background: YELLOW;
                                                                  float:left;
                                                                  border-radius: 10px;;
                                                                  margin-left:10%;
                                                                  margin-bottom: 2%;
                                                                  font-size:20px;">
    Go Back</button>
    <script type="text/javascript">
      function goBack() {
        location.replace("login_staff.php");
      }
    </script>
    <?php
    $conn->close();
    ?>
    <br><br>
  </body>
</html>
