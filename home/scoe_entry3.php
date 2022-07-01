<?php
session_start();
require_once("../connect.php");
$msg=$msg1="";
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){  
if (isset($_POST['c'])){
if ($_POST['c']=='A' || $_POST['c']=='Aa'){
$grpname='A';
if($_POST['c']=='A'){
$sql = "INSERT INTO scrfinal (Id,Groupname,Correct) VALUES ('','$grpname','1')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";
} else {
    $msg="Cannot Upload it";
}
  
}elseif($_POST['c']=='Aa'){
$sql = "INSERT INTO scrfinal (Id,Groupname,Incorrect) VALUES ('','$grpname','1')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";
} else {
    $msg="Cannot Upload it";
}
}
}elseif ($_POST['c']=='B' || $_POST['c']=='Bb'){
$grpname='B';
if($_POST['c']=='B'){
$sql = "INSERT INTO scrfinal (Id,Groupname,Correct) VALUES ('','$grpname','1')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";
} else {
    $msg="Cannot Upload it";
}
  
}elseif($_POST['c']=='Bb'){
$sql = "INSERT INTO scrfinal (Id,Groupname,Incorrect) VALUES ('','$grpname','1')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";
} else {
    $msg="Cannot Upload it";
}
}
}elseif ($_POST['c']=='C' || $_POST['c']=='Cc'){
$grpname='C';
if($_POST['c']=='C'){
$sql = "INSERT INTO scrfinal (Id,Groupname,Correct) VALUES ('','$grpname','1')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";
} else {
    $msg="Cannot Upload it";
}
  
}elseif($_POST['c']=='Cc'){
$sql = "INSERT INTO scrfinal (Id,Groupname,Incorrect) VALUES ('','$grpname','1')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";
} else {
    $msg="Cannot Upload it";
}
}
}elseif ($_POST['c']=='D' || $_POST['c']=='Dd'){
$grpname='D';
if($_POST['c']=='D'){
$sql = "INSERT INTO scrfinal (Id,Groupname,Correct) VALUES ('','$grpname','1')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";
} else {
    $msg="Cannot Upload it";
}
  
}elseif($_POST['c']=='Dd'){
$sql = "INSERT INTO scrfinal (Id,Groupname,Incorrect) VALUES ('','$grpname','1')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";
} else {
    $msg="Cannot Upload it";
}
}
}elseif ($_POST['c']=='E' || $_POST['c']=='Ee'){
$grpname='E';
if($_POST['c']=='E'){
$sql = "INSERT INTO scrfinal (Id,Groupname,Correct) VALUES ('','$grpname','1')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";
} else {
    $msg="Cannot Upload it";
}
  
}elseif($_POST['c']=='Ee'){
$sql = "INSERT INTO scrfinal (Id,Groupname,Incorrect) VALUES ('','$grpname','1')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";
} else {
    $msg="Cannot Upload it";
}
}
}elseif ($_POST['c']=='F' || $_POST['c']=='Ff'){
$grpname='F';
if($_POST['c']=='F'){
$sql = "INSERT INTO scrfinal (Id,Groupname,Correct) VALUES ('','$grpname','1')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";
} else {
    $msg="Cannot Upload it";
}
  
}elseif($_POST['c']=='Ff'){
$sql = "INSERT INTO scrfinal (Id,Groupname,Incorrect) VALUES ('','$grpname','1')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";
} else {
    $msg="Cannot Upload it";
}
}
}


}
}else{
  header("location:../index.php");
  die();
}

?>
<!DOCTYPE html>
<html>
<style>
/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
.grp{
  background-color:#CACFD2;
}
button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

</style>
<body>

<h1>Final Round Entry Side </h1><a href="scoe_entry2.php"><button name="">Back</button></a>
<div class="alert alert-success">
    <p style="color:MediumSeaGreen"><?php echo $msg;?></p>
  </div>
    <div class="alert alert-danger">
  <p style="color:Tomato"><?php echo $msg1; ?></p>
  </div>
<div class="grp">
  <form action="" method="POST">
<h2>Group A</h2>
<label class="container">Correct
  <input type="radio" name="c" value="A" required>
  <span class="checkmark"></span>
</label>
<label class="container">Incorrect
  <input type="radio" name="c" value="Aa" required>
  <span class="checkmark"></span>
</label>
<p><button name="">Update</button></p>
</form>
</div>

<div class="grp">
  <form action="" method="POST">
<h2>Group B</h2>
<label class="container">Correct
  <input type="radio" name="c" value="B" required>
  <span class="checkmark"></span>
</label>
<label class="container">Incorrect
  <input type="radio" name="c" value="Bb" required>
  <span class="checkmark"></span>
</label>
<p><button name="">Update</button></p>
</form>
</div>

<div class="grp">
  <form action="" method="POST">
<h2>Group C</h2>
<label class="container">Correct
  <input type="radio" name="c" value="C" required>
  <span class="checkmark"></span>
</label>
<label class="container">Incorrect
  <input type="radio" name="c" value="Cc" required>
  <span class="checkmark"></span>
</label>
<p><button name="">Update</button></p>
</form>
</div>

<div class="grp">
  <form action="" method="POST">
<h2>Group D</h2>
<label class="container">Correct
  <input type="radio" name="c" value="D" required>
  <span class="checkmark"></span>
</label>
<label class="container">Incorrect
  <input type="radio" name="c" value="Dd" required>
  <span class="checkmark"></span>
</label>
<p><button name="">Update</button></p>
</form>
</div>

<div class="grp">
  <form action="" method="POST">
<h2>Group E</h2>
<label class="container">Correct
  <input type="radio" name="c" value="E" required>
  <span class="checkmark"></span>
</label>
<label class="container">Incorrect
  <input type="radio" name="c" value="Ee" required>
  <span class="checkmark"></span>
</label>
<p><button name="">Update</button></p>
</form>
</div>

<div class="grp">
  <form action="" method="POST">
<h2>Group F<h2>
<label class="container">Correct
  <input type="radio" name="c" value="F" required>
  <span class="checkmark"></span>
</label>
<label class="container">Incorrect
  <input type="radio" name="c" value="Ff" required>
  <span class="checkmark"></span>
</label>
<p><button name="">Update</button></p>
</form>
</div>

</body>
</html>