<?php
$servername="localhost";
$username="root";
$password="";
$dbname="equiz";
$dbname2="logger";

// creating connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
$conn2 = mysqli_connect($servername,$username,$password,$dbname2);
// check connection
if (!$conn){

	die ("Connection Failed");
}else{
}
if (!$conn2){

	die ("Connection Failed");
}else{
}
?>