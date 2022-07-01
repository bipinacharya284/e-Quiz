<!DOCTYPE html>
<html lang="en">
<head>
  <title>Score card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="ret/bootstrap.min1.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
  <center><h2 class="text-primary">SCORE CARD FOR QUALIFIER ROUND</h2></center> 
  <a href="score_card_final.php"><button type="button" class="btn btn-success">Final Round</button></a>
   <a href="home.php"><button type="button" class="btn btn-success">Back</button></a> 
   <a href="../a.php"><button type="button" class="btn btn-success">Refresh</button></a>             
  <table class="table table-striped">
    <thead>
      <tr>
        <th class="text-secondary">Team</th>
        <th class="text-secondary">General Round</th>
        <th class="text-secondary">Audiovisual Round</th>
        <th class="text-secondary">Rapidfire Round</th>
        <th class="text-secondary">Total Score</th>
      </tr>
    </thead>
    <tbody>
<?php
require_once("../connect.php");
session_start();
//Group A
$sql = "SELECT * FROM scracc order by Total desc ";
$a=$b=$c=$d=$e="";
$result = mysqli_query($conn2, $sql);
if (mysqli_num_rows($result)>0) {
      while($row = mysqli_fetch_assoc($result)) {
$a= $row["Groupname"];
$b=$row['Gr'];
$c=$row['Av'];
$d=$row['Rf'];
$e=$row['Total'];
    echo'<tr>
        <td class="text-primary">'.$a.'</td>
        <td class="text-primary"> '.$b.'</td>
        <td class="text-primary">'.$c.'</td>
        <td class="text-primary">'.$d.'</td>
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