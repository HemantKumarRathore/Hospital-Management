<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>YOUR HOSPITAL-Your Detail</title>
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
        margin-top: 8%;
        margin-bottom: 2%;
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
    $email = $_SESSION['doc_email'];
    $pass = $_SESSION['doc_pass'];
    $sql1 = "SELECT * FROM doctor natural JOIN department WHERE email='".$email."' AND d_pass='".$pass."';";
    $result = $conn->query($sql1);
    $con=0;
    if ($result->num_rows > 0) {
      $con=1;
    }
    $row = $result->fetch_assoc();
    ?>
    <br>
    <table border="1" align='center'>
    <caption>YOUR INFORMATION</caption>
    <tr><th>ID</th><th>Name</th><th>Mobile</th><th>Departement</th><th>Email</th><th>Address</th></tr>
    <?php
    // if ($result->num_rows > 0) {
    //
    //     while($row = $result->fetch_assoc()) {
          ?>
          <tr>
          <td><?php echo $row["d_id"]; ?></td>
          <td style="width:200px;"><?php echo $row["d__name"]; ?></td>
          <td><?php echo $row["mobile"]; ?></td>
          <td><?php echo $row["dep_name"]; ?></td>
          <td><?php echo $row["email"]; ?></td>
          <td><?php echo $row["d_address"]; ?></td>
          </tr>
          <?php
      //   }
      // }
      ?>
      </table>
      <!-- <button type="button" name="button" onclick="goBack()" style="background: white;
                                                                    float:right;
                                                                    margin-right:10%;
                                                                    font-size:20px;">
      Go Back</button> -->

      <button type="button" name="button" onclick="goBack()" style="background: yellow;
                                                                    border-radius: 10px;
                                                                    width:150px;
                                                                    float:left;
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
