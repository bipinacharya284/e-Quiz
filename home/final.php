<?php
session_start();
if (isset($_SESSION['finqn'])){
$quesno=$_SESSION['quenofnl'];
$ques=$_SESSION['finqn'];
$ans=$_SESSION['finans'];
}else{
  header("location:home.php#services-section");
  die();
}
?>
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
    <tr><td><h2 class="text-info">Science And Techno Festival 2020</h2></td><td><center><img src="images/arn.png" class="rounded" alt="Cinque Terre" width="100" height="width"></center></td></tr>
    <tr><td>
    <h5 class="text-success">Question Number: <?php echo $quesno; ?></h5></td></tr>      
    <tr><td><h3 class="text-info"><?php echo $ques; ?></h3><td></tr>
   <tr><td><h3 class="text-warning" id="demo" onclick="myFunction()">Answer</h3></td></tr>
<tr><td><a href="delque3.php"><button type="submit" class="btn btn-primary" name="final">Done</button></a></td>
<td><a href="home.php#services-section"><button type="submit" class="btn btn-primary" name="final">Dismiss</button></a></td>
</tr></table>
  </div>   
</div>



<script>
function myFunction() {
  document.getElementById("demo").innerHTML = "<?php echo $ans; ?>";
}
</script>

</body>
</html>
