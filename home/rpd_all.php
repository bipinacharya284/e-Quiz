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
  <h2>Rapidfire Round</h2>            
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Question Number</th>
        <th>Set Number</th>
        <th>Question</th>
        <th>Answer</th>
        <th>Admin</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
<?php
session_start();
include_once("../connect.php");
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
$sql = "SELECT * FROM rapidfire";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $quesno=$row["Question_no"];
        $setno=$row["Set_no"];
        $ques=$row["Question"];
        $ans=$row["Answer"];
        $adm=$row["Admin"];
         echo '<tr>
         <td>'.$quesno.'</td>
        <td>'.$setno.'</td>
        <td>'.$ques.'</td>
        <td>'.$ans.'</td>
        <td>'.$adm.'</td>
        <td> <a href="update2.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-trash"></span> Update
        </a></td>
      </tr>';
    }
} else {
}
}else{
  header("location:../index.php");
  die();
}
?>
     
    </tbody>
  </table>
</div>

</body>
</html>
