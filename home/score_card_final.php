<!DOCTYPE html>
<html lang="en">
<head>
  <title>Score card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
  <center><h2 class="text-primary">SCORE FOR FINAL ROUND</h2></center>
  <a href="score_card.php"><button type="button" class="btn btn-success">Back</button></a>
  <a href="../scr_final.php"><button type="button" class="btn btn-success">Refresh</button></a>             
  <table class="table table-striped">
    <thead>
      <tr>
        <th class="text-secondary">Team</th>
        <th class="text-secondary">Total Score</th>
      </tr>
    </thead>
    <tbody>
<?php
require_once("../connect.php");
session_start();
//Group A
$sql = "SELECT * FROM scraccfinal order by Total desc ";
$a=$b=$c=$d=$e="";
$result = mysqli_query($conn2, $sql);
if (mysqli_num_rows($result)>0) {
      while($row = mysqli_fetch_assoc($result)) {
$a= $row["Groupname"];
$e=$row['Total'];
    echo'<tr>
        <td class="text-primary">'.$a.'</td>
        <td class="text-primary">'.$e.'</td>
      </tr>';
   }
   }
   echo' </tbody>
  </table>
</div>

</body>
</html>';
?>