<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>YOUR HOSPITAL-Patient Priscription</title>
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
      .form{
        box-sizing: border-box;
    		width: 90%;
    		border: 10px solid #FF6F61;
        border-radius:20px;
    		float: left;
    		align-content: center;
    		align-items: center;
        margin-top: 7%;
        margin-left: 5%;
        margin-bottom: 2%;
        height:95%;
        background: #D3D3D3;
      }
      form {
    		margin: 0px auto;
    		width: 600px;
    	}
      label{
        font-size: 25px;
      }
      input{
        border-radius: 5px;
        width: 40%;
        height: 30px;
      }
      th{
        color: white;
        background: #704D99;
      }
      td{
        text-align: center;
        padding: 10px;
      }
      table{
        /* margin-top: 15%; */
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
      #bbuttom{
        width:150px;
        background: yellow;
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
    <div class="form">
      <form class="" action="doc_patient_pric_inter.php" method="post">
        <h1 align="center">Patient Priscription</h1>
        <label for="d_id">Doctor ID:</label>
        &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
        &nbsp; &nbsp;&nbsp;&nbsp;
        <input type="text" name="d_id" value="">
        <br><br>
        <label for="padd">Patient Addhar Number:</label>
        &nbsp; &nbsp;
        <input type="text" name="padd" value="">
        <br><br>
        <label for="preID">Prescription ID:</label>
        &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
        &nbsp; &nbsp;&nbsp;
        <input type="text" name="preID" value="">
        <br><br>
        <label for="pre">Prescription:</label>
        &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
        &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        <textarea name="pre" rows="4" cols="32" style="border-radius:10px;"></textarea>
        <!-- <input type="text" name="pre" value=""> -->
        <p><font color='red' size='4'>*Please enter different Prescription ID. If Prescription ID is not unique, then it will override the prescription.*</font></p>
        <input id="bbutton" type="button" name="" value="BACK" onclick="goBack()" >
        <input id="bbutton" type="submit" name="" value="SUBMIT">
        <script type="text/javascript">
          function goBack() {
            location.replace("login_doc.php");
          }
        </script>
      </form>
      <br>
      <br>
    </div>
    <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php
    // session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hospital_management";
    // $email=$_SESSION['doc_email'];
    $conn = new mysqli($servername, $username, $password,$dbname);
    $sql1 = "SELECT * FROM patient LEFT OUTER JOIN prescription on patient.addh_num=prescription.p_addh_num;";
    $result = $conn->query($sql1);
    ?>
    <?php
    if ($result->num_rows > 0) {
      ?>
      <br>
      <table border="1" align='center' align="center" style="width:80%;">
      <caption>Patient Record With Priscription ID</caption>
      <tr><th>Addhar no</th><th>Name</th><th>Age</th><th>Address</th><th>Test</th><th>Email</th><th>Prescription ID</th><th>Prescription</th></tr>
      <?php
        while($row = $result->fetch_assoc()) {
          ?>
          <tr>
          <td><?php echo $row["addh_num"]; ?></td>
          <td><?php echo $row["name"]; ?></td>
          <td><?php echo $row["p_age"]; ?></td>
          <td><?php echo $row["address"]; ?></td>
          <td><?php echo $row["test"]; ?></td>
          <td><?php echo $row["p_email"]; ?></td>
          <td>
            <?php
            if($row["pri_id"]===null){
              echo "No Priscription";
            }else{
              echo $row["pri_id"];
            }
           ?>
         </td>
        <td>
          <?php
          if($row["pri_dis"]===null){
            echo "No Priscription";
          }else{
            echo $row["pri_dis"];
          }
         ?>
        </td>
        </tr>
        <?php
        }
        ?>
        </table>
      <?php
    }else{
      echo "<br><center>Patient Record is empty. Please contact to Software development team.</center>";
    }
      // $sql1 = "SELECT * FROM prescription;";
      // $result = $conn->query($sql1);
      ?>
      <?php
      // if ($result->num_rows > 0) {
        ?>
        <!-- <br>
        <table border="1" align='center'>
        <caption>Patient RECORD TABLE</caption>
        <tr><th>Prescription ID</th><th>Prescription Discription</th><th>d_id</th></tr> -->
        <?php
          // while($row = $result->fetch_assoc()) {
            ?>
            <!-- <tr> -->
            <!-- <td><?php //echo $row["pri_id"]; ?></td>
            <td><?php //echo $row["pri_dis"]; ?></td>
            <td><?php //echo $row["d_id"]; ?></td>
          </tr>-->
            <?php
          //}
          ?>
          <!-- </table> -->
        <?php
        //}
      $conn->close();
    ?>
    <br><br><br>
  </body>
</html>
