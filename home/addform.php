<?php
session_start();
include ("../connect.php");
$rapid_err=$ques_err="";
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
if(isset($_POST['ques']) && isset($_POST['ans']) && isset($_POST['a'])){
$ques=$_POST['ques'];
$ans=$_POST['ans'];
$setno=$_POST['setno'];
$adm=$_SESSION['username'];
if($_POST['a']=='general'){
  $sql1 = "SELECT * FROM general WHERE Question = '$ques'";
        
        if($stmt = mysqli_prepare($conn, $sql1)){
            // Bind variables to the prepared statement as parameters
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) === 1){
                
                  $ques_err="Question is repeted.";
                } elseif(mysqli_stmt_num_rows($stmt) === 0){
            $sql = "INSERT INTO general (Question,Answer,Admin) VALUES ('$ques','$ans','$adm')";
                if (mysqli_query($conn, $sql)) {
                  echo'  <div class="alert alert-success">
                      Record Added sucessfully.
                    </div>';
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        
}

}elseif($_POST['a']=='rapidfire'){
  if($_POST['setno'] > 0){
  $sql1 = "SELECT * FROM rapidfire WHERE Question = '$ques'";
        
        if($stmt = mysqli_prepare($conn, $sql1)){
            // Bind variables to the prepared statement as parameters
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) === 1){
                
                  $ques_err="Question is repeted.";
                } else{
            $sql = "INSERT INTO rapidfire (Set_no, Question, Answer,Admin) VALUES ($setno,'$ques','$ans','$adm')";
                if (mysqli_query($conn, $sql)) {
                  echo'  <div class="alert alert-success">
                      Record Added sucessfully.
                    </div>';
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        
}
}else{
  $rapid_err="Set Number is compuslory";
}

}elseif($_POST['a']=='final'){
  $sql1 = "SELECT * FROM final WHERE Question = '$ques'";
        
        if($stmt = mysqli_prepare($conn, $sql1)){
            // Bind variables to the prepared statement as parameters
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                
                  $ques_err="Question is repeted.";
                } else{
            $sql = "INSERT INTO final (Question,Answer,Admin) VALUES ('$ques','$ans','$adm')";
                if (mysqli_query($conn, $sql)) {
                  echo'  <div class="alert alert-success">
                      Record Added sucessfully.
                    </div>';
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        
}




}else{
echo "Couldnot Add the Question";
}
}

}else{
  header("location: ../index.php");
die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Question Pannel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Question Pannel</h2>
  <form action="" method="POST" refresh='0'>
    <div class="form-group">
      <label for="email">Question</label>
      <textarea class="form-control" id="email" placeholder="Enter Question" name="ques" required></textarea>
       <label><p style="color:Tomato;"><?php echo$ques_err; ?></p></label>
    </div>
    <div class="form-group">
      <label for="pwd">Answer</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter Answer" name="ans" required>
    </div>
    <div class="form-group">
      <label for="pwd">Select Round</label><br>
      <input type="radio" name="a" value="general" required>General Round<br>
      <input type="radio" name="a" value="rapidfire" required>RapidFire Round<br>
            <label><p style="color:Tomato;"><?php echo$rapid_err; ?></p></label>
      <input type="number" class="form-control" id="pwd" placeholder="Enter Set Number" name="setno" min='1'>
      <input type="radio" name="a" value="final" required>Final Round<br>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    <br><a href="audiovisual.php"><button type="submit" class="btn btn-primary">Audio Visual Round</button></a>
    <a href="home.php"><button type="submit" class="btn btn-primary">Back</button></a>
</div>

</body>
</html>
