<?php
session_start();
$msg=$msg1="";
include_once("../connect.php");
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
if (isset($_POST['a']) && isset($_POST['aa'])){
$grpname='A';
$correct=$_POST['a'];
$Incorrect=$_POST['aa'];
$sql = "INSERT INTO scrrapidfire (Id,Groupname,Correct,Incorrect) VALUES ('','$grpname','$correct','$Incorrect')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";
} else {
    $msg="Cannot Upload it";
}
  

  
}elseif(isset($_POST['b']) && isset($_POST['bb'])){
$grpname='B';
$correct=$_POST['b'];
$Incorrect=$_POST['bb'];
$sql = "INSERT INTO scrrapidfire (Id,Groupname,Correct,Incorrect) VALUES ('','$grpname','$correct','$Incorrect')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";

} else {
    $msg="Cannot Upload it";
}

}elseif(isset($_POST['c']) && isset($_POST['cc'])){
$grpname='C';
$correct=$_POST['c'];
$Incorrect=$_POST['cc'];
$sql = "INSERT INTO scrrapidfire (Id,Groupname,Correct,Incorrect) VALUES ('','$grpname','$correct','$Incorrect')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";
} else {
    $msg="Cannot Upload it";
}

}elseif (isset($_POST['d']) && isset($_POST['dd'])){
$grpname='D';
$correct=$_POST['d'];
$Incorrect=$_POST['dd'];
$sql = "INSERT INTO scrrapidfire (Id,Groupname,Correct,Incorrect) VALUES ('','$grpname','$correct','$Incorrect')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";
} else {
    $msg="Cannot Upload it";
}

}elseif (isset($_POST['e']) && isset($_POST['ee'])){
$grpname='E';
$correct=$_POST['e'];
$Incorrect=$_POST['ee'];
$sql = "INSERT INTO scrrapidfire (Id,Groupname,Correct,Incorrect) VALUES ('','$grpname','$correct','$Incorrect')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";
} else {
    $msg="Cannot Upload it";
}

}elseif (isset($_POST['f']) && isset($_POST['ff'])){
$grpname='F';
$correct=$_POST['f'];
$Incorrect=$_POST['ff'];
$sql = "INSERT INTO scrrapidfire (Id,Groupname,Correct,Incorrect) VALUES ('','$grpname','$correct','$Incorrect')";
if (mysqli_query($conn2, $sql)) {
    $msg="Uploaded Sucessfully";
} else {
    $msg="Cannot Upload it";
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

<h1>Rapidfire Round Entry Side </h1><a href="scoe_entry1.php"><button name="">Back</button></a>
<a href="scoe_entry3.php"><button name="">Final Round</button></a>
<div class="alert alert-success">
    <p style="color:MediumSeaGreen"><?php echo $msg;?></p>
  </div>
    <div class="alert alert-danger">
  <p style="color:Tomato"><?php echo $msg1; ?></p>
  </div>
<div class="grp">
  <form action="" method="POST">
<h2>Group A</h2>
<label>Correct</label>
  <input type="number" name="a" required min='0'>
<label>Incorrect</label>
  <input type="number" min='0' name="aa" required>
<p><button name="">Update</button></p>
</form>
</div>

<div class="grp">
  <form action="" method="POST">
<h2>Group B</h2>
<label>Correct</label>
  <input type="number" name="b" required min='0'>
<label>Incorrect</label>
  <input type="number" name="bb" required min='0'>
<p><button name="">Update</button></p>
</form>
</div>

<div class="grp">
  <form action="" method="POST">
<h2>Group C</h2>
<label>Correct</label>
  <input type="number" name="c" required min='0'>
<label>Incorrect</label>
  <input type="number" name="cc" required min='0'>
<p><button name="">Update</button></p>
</form>
</div>

<div class="grp">
  <form action="" method="POST">
<h2>Group D</h2>
<label>Correct</label>
  <input type="number" name="d" required min='0'>
<label>Incorrect</label>
  <input type="number" name="dd" required min='0'>
<p><button name="">Update</button></p>
</form>
</div>

<div class="grp">
  <form action="" method="POST">
<h2>Group E</h2>
<label>Correct</label>
  <input type="number" name="e" required min='0'>
<label>Incorrect</label>
  <input type="number" name="ee" required min='0'>
<p><button name="">Update</button></p>
</form>
</div>

<div class="grp">
  <form action="" method="POST">
<h2>Group F</h2>
<label>Correct</label>
  <input type="number" name="f" required min='0'>
<label>Incorrect</label>
  <input type="number" name="ff" required min='0'>
<p><button name="">Update</button></p>
</form>
</div>

</body>
</html>