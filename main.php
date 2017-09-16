<!DOCTYPE html>
<html>
  <head>
    <style>
      table {
          width: 70%;
          border-collapse: collapse;
      }

      table, td, th {
          border: 1px solid black;
      }

      th {text-align: left;}
    </style>
  </head>

  <body>
      <?php
      $q = $_GET['q'];
      echo $q;

      $con = mysqli_connect('localhost','root','root','greenmonster');
      if (!$con) {
          die('Could not connect: ' . mysqli_error($con));
      }

      mysqli_select_db($con,"greenmonster");
      $sql="SELECT * FROM Player WHERE LIST = '".$q."'";
      $result = mysqli_query($con,$sql);

      echo "<table>
      <tr>
      <th>Number</th>
      <th>Name</th>
      <th>POS</th>
      <th>BIRTH PLACE</th>
      <th>IMAGE</th>
      </tr>";

      while($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>" . $row['NO'] . "</td>";
          echo "<td>" . $row['NAME'] . "</td>";
          echo "<td>" . $row['POS'] . "</td>";
          echo "<td>" . $row['BIRTHPLACE'] . "</td>";
          echo "<td><img src=" . "PLAYER_IMAGES/Hanley_Ramirez.png" . " height=30 width=45></td>";
          echo "</tr>";
      }
      echo "</table>";
      mysqli_close($con);
      ?>
  </body>
</html>
