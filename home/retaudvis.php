<?php
session_start();
require_once "../connect.php";

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  if (isset($_SESSION['quenoaud'])){
$ques=$_SESSION['audqn'];
$ans=$_SESSION['audans'];
$quesno=$_SESSION['quenoaud'];

        $sql = "SELECT * FROM audiovisual WHERE Question_no = $quesno";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       $location= $row["Question_target"];
    }
}
}else{
  header("location: home.php#process-section");
  die();
}
}else{
    header("location: ../index.php");
    die();
}

    // Close connection
    mysqli_close($conn2);
       ?>
       <!DOCTYPE html>
<html lang="en">
<head>
  <title>Get Question Here</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="ret/bootstrap.min.css">
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
    <tr><td><video width="300" height="200" controls>
  <source src='<?php echo $location ?>'type="video/mp4">
  </video> </td></tr>       
    <tr><td><h3 class="text-info"><?php echo $ques; ?></h3><td></tr>
   <tr><td><h3 class="text-warning" id="demo" onclick="myFunction()">Answer</h3></td></tr>
<tr><td><a href="delque1.php"><button type="submit" class="btn btn-primary" name="final">Done</button></a></td>
<td><a href="home.php#process-section"><button type="submit" class="btn btn-primary" name="final">Dismiss</button></a></td></tr>
  </div>   
</div>


<script>
function myFunction() {
  document.getElementById("demo").innerHTML = "<?php echo $ans; ?>";
}
</script>

</body>
</html>