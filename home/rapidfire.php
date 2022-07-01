<style>
.txt{
  margin-top:0px;
}
</style>
<?php
session_start();
include_once('../connect.php');
if (isset($_SESSION['quenorpd'])){
echo'
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Get Question Here</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <div class="jumbotron">
  <table>
    <tr><td><h2 class="text-info" id="txt">Science And Techno Festival 2020</h2></td><td><center><img src="images/arn.png" class="rounded" alt="Cinque Terre" width="100" height="width"></center></td></tr>
    <tr><td>
   </table>
  <h5 class="text-success">Set Number: '.$_SESSION['quenorpd'].'</h5>
    <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="text-danger">Question Number</th>
          <th class="text-danger">Questions</th>
        </tr>
      </thead>';

$quesno=$_SESSION['quenorpd'];
$sql = "SELECT * FROM rapidfire WHERE Set_no='$quesno'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $queno=$row["Question_no"]; 
        $ques=$row["Question"];
    echo '<tbody>
        <tr>
<td>'.$queno.'</td>
<td>'.$ques.'</td>
        </tr>
      </tbody>';
    }
} else {
}
echo '
<a href="delque2.php"><button type="submit" class="btn btn-primary" name="final">Done</button></a>
<td><a href="home.php#testimonials-section"><button type="submit" class="btn btn-primary" name="final">Dismiss</button></a></td>
  </div>   
</div>
</body>
</html>';
}else{
  header("location: home.php#testimonials-section");
}
?>