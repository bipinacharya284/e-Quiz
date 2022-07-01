<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reply</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <h1>Comments</h1>
<?php
session_start();
include_once("../connect.php");
$sql = "SELECT * FROM mssg order by Id desc";
$result = mysqli_query($conn2, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       $fname=$row['Firstname'];
       $lname=$row['Lastname'];
       $sub=$row['Subject'];
       $_SESSION['eml']=$row['Email'];
       $msg=$row['Msg'];
       $date=$row['Reg_date'];

echo '<div class="container mt-3">
  <div class="media border p-3">
    <img src="images/logo1.png" alt="" class="mr-3 mt-3 square" style="width:60px;">
    <div class="media-body">
      <h4>'.$fname.' '.$lname.'<small><br><i>'.$date.'</i></small></h4>
      <b>Subject: '.$sub.'</b>
      <p>Message: '.$msg.'</p> 
  </div>
    </div>
      
  </div>
</div>';
if(isset($_POST['rply'])){
$rply =$_POST['rply'];
$sql = "INSERT INTO mssg (Rply)VALUES ('$rply') WHERE Firstname='$fname'";
if (mysqli_query($conn2, $sql)) {
    echo "Message send successfully";
} else {
    echo "Error in sending message";
}

}
   }
} else {
    echo "No Messages till now..";
}
?>
</body>
</html>
 