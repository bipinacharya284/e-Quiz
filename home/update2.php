<?php
session_start();
$add=$quesno=$ans=$ques="";
include_once("../connect.php");
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
if(isset($_POST['delete'])){
$quesno=$_POST['queno'];
$sql = "DELETE FROM rapidfire WHERE Question_no=$quesno";

if (mysqli_query($conn, $sql)==true) {
   echo '<div class="alert alert-success">
    <strong>Sucessfully</strong> Deleted the data
  </div>';
} else {
   echo'<div class="alert alert-warning">
    <strong>Warning!</strong> Cannot delete the data.
  </div>';
}
}elseif(isset($_POST['edit'])){
  $_SESSION['quesno']=$quesno=$_POST['queno'];
$sql = "SELECT * FROM rapidfire WHERE Question_no=$quesno";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $ques=$row["Question"];
        $_SESSION['ans']=$ans=$row["Answer"];
      }
    }
$add='<div class="form-group">
      <label for="usr">Question</label>
      <input type="text" class="form-control" name="que" required value="'.$ques.'">
    </div>
    <div class="form-group">
      <label for="usr">Answer</label>
      <input type="text" class="form-control" name="ans" required value="'.$ans.'">
    </div>
     <button type="submit" name="save" class="btn btn-primary">Save</button>
    ';
}else{
}
  }else{header("location:../index.php");
  die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Question</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Update Question</h2>
  <form action="" method="POST">
    <div class="form-group">
      <label for="usr">Question Number</label>
      <input type="number" class="form-control" name="queno" min="1" value="<?php echo$quesno;?>" required>
    </div>
    <?php echo$add; 
if(isset($_POST['que']) && isset($_POST['ans'])){
      $quesss=$_POST['que'];
      $ansss=$_POST['ans'];
      $num=$_SESSION['quesno'];
$sql = "UPDATE rapidfire SET Question='$quesss',Answer='$ansss' Where Question_no='$num'";
if (mysqli_query($conn, $sql)) {
  echo '<div class="alert alert-success">
    <strong>Sucessfully</strong> Updated the data
  </div>';
} else {
    echo'<div class="alert alert-warning">
    <strong>Warning!</strong> Cannot update the data.
  </div>';
}
}
    ?>
    <button type="submit" name="delete" class="btn btn-primary">Delete</button>
    <button type="submit" name="edit" class="btn btn-primary">Edit</button> </form><br>
    <a href="rpd_all.php"><button type="submit" class="btn btn-primary">Back</button></a>
 
</div>

</body>
</html>