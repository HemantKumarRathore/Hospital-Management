<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>YOUR HOSPITAL-Your Detail</title>
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
        width: 150px;
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
      <table border="1" align='center'>
      <caption>YOUR DETAILS</caption>
      <tr>
        <th style="border-radius: 10px 0px 0px 0px;">Addhar no</th>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Covid</th>
        <th>Test</th>
        <th>Email</th>
        <th>Doctor</th>
        <!-- <th>Ambulance service</th> -->
        <th style="border-radius: 0px 10px 0px 0px;">Pending Bill Amout</th>
      </tr>
      <?php
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc()
          // while($row = $result->fetch_assoc()) {
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
            <td><?php
                  if($row["d_id"]===null){
                    echo "NOT ASSINGED";
                  }else{
                    echo $row["d__name"];
                  }
                ?>
            </td>
            <!-- <td>
              <?php
              // if($row["amb_sno"]===null){
              //   echo "Not required";
              // }else{
              //   echo $row["amb_sno"];
              // }
              ?>
            </td> -->
            <td><?php echo $row["panding_bill"]; ?></td>
            </tr>
            <?php
          // }
      }?>
    </table>
    <p align="center"><font size="+1" color="red">&nbsp;*The bill amount
      dispalyed in the Pending bill amount is the registration fee and other services fee. It may
      increase based on Other servies.*&nbsp;</font>
    </p>
    <?php
    }
    $conn->close();
    ?>

    <button id="bbutton" type="button" name="button" onclick="viewPersonal()" >
    BACK</button>
    <script type="text/javascript">
      function viewPersonal() {
        location.replace("login_pat.php");
      }
    </script>
  </body>
</html>
