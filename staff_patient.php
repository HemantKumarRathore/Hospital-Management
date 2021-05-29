<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>YOUR HOSPITAL-Patient Login Page</title>
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
        margin-top: 12%;
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
    <?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hospital_management";
    $conn = new mysqli($servername, $username, $password,$dbname);
    $sql1 = "SELECT * FROM patient;";
    $result = $conn->query($sql1);
    ?>
    <table border="1" align='center'>
    <caption>PATIENT RECORD TABLE</caption>
    <tr><th>Addhar no</th><th>Name</th><th>Age</th><th>Gender</th><th>Address</th><th>COVID-19</th><th>Test</th><th>Email</th></tr>
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
          </tr>
          <?php
        }
      }
    ?>
    </table>
    <br><br>
    <button type="button" name="button" onclick="goBack()" style="background: yellow;
                                                                  border-radius: 10px;
                                                                  float:left;
                                                                  margin-left:10%;
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
