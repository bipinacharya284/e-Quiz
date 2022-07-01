<?php
error_reporting(0);
session_start();
include ("../connect.php");
$question=$answer=$msg=$msg1="";
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
if (isset($_POST['a'])){
if ($_POST['a']=='A'){
$grpname='A';
$sql = "INSERT INTO scrgeneral (Id,Groupname,Correct) VALUES ('','$grpname','1')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";
} else {
    $msg1="Cannot Upload it";
}
  
}elseif ($_POST['a']=='B'){
$grpname='B';
$sql = "INSERT INTO scrgeneral (Id,Groupname,Correct) VALUES ('','$grpname','1')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";
} else {
    $msg1="Cannot Upload it";
}
  
}elseif ($_POST['a']=='C'){
$grpname='C';
$sql = "INSERT INTO scrgeneral (Id,Groupname,Correct) VALUES ('','$grpname','1')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";
} else {
    $msg1="Cannot Upload it";
}
  
}elseif ($_POST['a']=='D'){
$grpname='D';
$sql = "INSERT INTO scrgeneral (Id,Groupname,Correct) VALUES ('','$grpname','1')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";
} else {
    $msg1="Cannot Upload it";
}
  
}elseif ($_POST['a']=='E'){
$grpname='E';
$sql = "INSERT INTO scrgeneral (Id,Groupname,Correct) VALUES ('','$grpname','1')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";
} else {
    $msg1="Cannot Upload it";
}
  
}elseif ($_POST['a']=='F'){
$grpname='F';
$sql = "INSERT INTO scrgeneral (Id,Groupname,Correct) VALUES ('','$grpname','1')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";
} else {
    $msg1="Cannot Upload it";
}
}  
}
}else{
header("location: ../index.php");
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
  <meta charset="utf-8">
<body>

<h1>General Round Entry Side </h1><a href="home.php"><button name="">Back</button></a>
<a href="scoe_entry1.php"><button name="">Audio Visual</button></a>
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
  <input type="radio" name="a" value="A" required>
  <span class="checkmark"></span>
</label>
<label class="container">Incorrect
  <input type="radio" name="a" required>
  <span class="checkmark"></span>
</label>
<p><button name="">Update</button></p>
</form>
</div>

<div class="grp">
  <form action="" method="POST">
<h2>Group B</h2>
<label class="container">Correct
  <input type="radio" name="a" value="B" required>
  <span class="checkmark"></span>
</label>
<label class="container">Incorrect
  <input type="radio" name="a" required>
  <span class="checkmark"></span>
</label>
<p><button name="">Update</button></p>
</form>
</div>

<div class="grp">
  <form action="" method="POST">
<h2>Group C</h2>
<label class="container">Correct
  <input type="radio" name="a" value="C" required>
  <span class="checkmark"></span>
</label>
<label class="container">Incorrect
  <input type="radio" name="a" required>
  <span class="checkmark"></span>
</label>
<p><button name="">Update</button></p>
</form>
</div>

<div class="grp">
  <form action="" method="POST">
<h2>Group D</h2>
<label class="container">Correct
  <input type="radio" name="a" value="D" required>
  <span class="checkmark"></span>
</label>
<label class="container">Incorrect
  <input type="radio" name="a" required>
  <span class="checkmark"></span>
</label>
<p><button name="">Update</button></p>
</form>
</div>

<div class="grp">
  <form action="" method="POST">
<h2>Group E</h2>
<label class="container">Correct
  <input type="radio" name="a" value="E" required>
  <span class="checkmark"></span>
</label>
<label class="container">Incorrect
  <input type="radio" name="a" required>
  <span class="checkmark"></span>
</label>
<p><button name="">Update</button></p>
</form>
</div>

<div class="grp">
  <form action="" method="POST">
<h2>Group F<h2>
<label class="container">Correct
  <input type="radio" name="a" value="F" required>
  <span class="checkmark"></span>
</label>
<label class="container">Incorrect
  <input type="radio" name="a" required>
  <span class="checkmark"></span>
</label>
<p><button name="">Update</button></p>
</form>
</div>

</body>
</html>