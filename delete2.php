<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
input[type=reset] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=reset]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
.ch{
  font-size:30px;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
<?php
session_start();
include ("connect.php");
$question=$answer="";
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
echo'
<h3>Update Question</h3>

<div class="container">
  <form action="" method="POST">

    <label for="lname">Question Number</label>
    <input type="text" id="lname" name="lastname" placeholder="Write Question Number" required>

    <label for="country"><b class="ch">Choose Action</b></label><br>
   <input type="radio" name="a" value="edit" required>Edit<br>
       <input type="radio" name="a" value="delete" required>Delete<br>

    

    <input type="submit" value="Submit"><br>
    </form>
    <a href="home1.php"><input type="submit" class="btn btn-primary" value="Back"></a>
  
</div>
';
if(isset($_POST['lastname']) && isset($_POST['a'])){
    $quesno=$_POST['lastname'];

$tablename='rapidfire';
if($_POST['a']=='delete'){
$sql = "DELETE FROM $tablename WHERE Question_no=$quesno";

if (mysqli_query($conn, $sql)) {
    echo "Data deleted";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
}elseif($_POST['a']=='edit'){
echo'
<h3>Edit Question</h3>

<div class="container">
  <form action="" method="POST">
  <label for="lname">Question Number</label>
    <input type="text" id="lname" name="lastname" placeholder="Write Question Number" required>
    <label for="subject">Question</label>
    <textarea id="subject" name="upqn"style="height:200px" required></textarea>

    <label for="lname">Answer</label>
    <input type="text" id="lname" name="upans" required>

    <input type="submit" value="Submit">
    <input type="reset" value="Reset"><br>
    </form>
    <a href="home1.php"><input type="submit" class="btn btn-primary" value="Back"></a>
  
</div>
';
}else{

}

}else{

}

}else{
  header("location: login.php");
    exit;
}
 if (isset($_POST['upqn']) && isset($_POST['upans'])){
$upqn=$_POST['upqn'];
$upans=$_POST['upans'];
$quesno=$_POST['lastname'];
$sql = "UPDATE rapidfire SET Question='$upqn' WHERE Question_no=$quesno";
$sql1 = "UPDATE rapidfire SET Answer='$upans' WHERE Question_no=$quesno";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

if (mysqli_query($conn, $sql1)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}else{
}
?>
</body>
</html>







